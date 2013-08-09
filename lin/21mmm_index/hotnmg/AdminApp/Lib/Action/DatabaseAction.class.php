<?php
/**
 * 
 * Database(数据库)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: DatabaseAction.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

class DatabaseAction extends GlobalAction{
    protected $db = NULL;
    protected $bakupDir =  './CmsData/Bakup/';
    function _initialize()
    {
        parent::_initialize();
        $this->db = Db::getInstance();
    }

    /**
     * 数据表
     *
     */
    public function index()
    {
        parent::_checkPermission();
        $module = new model();
        $dataList = $this->db->query("SHOW TABLE STATUS LIKE '".C('DB_PREFIX')."%'");
        //dump($dataList);
        foreach ($dataList as $row){
            $total += $row['Data_length'];
        }
        $this->assign('totalSize', $total);
        $this->assign("dataList", $dataList);
        parent::_sysLog('index');
        $this->display();
    }

    /**
     * 查询分析器
     *
     * @param unknown_type $sql
     */
    public function excuteQuery($sql='')
    {
        if(MAGIC_QUOTES_GPC) {
            $sql = stripslashes($sql);
        }
        if(empty($sql)) {
            echo 'SQL不能为空！';
            exit();
        }
        $queryType = 'INSERT|UPDATE|DELETE|REPLACE|CREATE|DROP|LOAD DATA|SELECT .* INTO|COPY|ALTER|GRANT|TRUNCATE|REVOKE|LOCK|UNLOCK';
        if (preg_match('/^\s*"?(' . $queryType . ')\s+/i', $sql)) {
            $data['result'] = $this->db->execute($sql);
            $data['type'] = 'execute';
        }else {
            $data['result'] = $this->db->query($sql);
            $data['type'] = 'query';
        }
        $data['dbError'] = $this->db->error();
        return $data;
    }


    /**
     * 执行SQL
     *
     */
    public function query(){
        parent::_checkPermission();
        $data['uploadTips'] = ini_get('file_uploads') ? '系统允许上传:'.ini_get('upload_max_filesize').' 请不要上传超过此范围文件。推荐2M以内': 'PHP环境配置为：禁止上传';
        $this->assign($data);
        $this->display();
    }

    /**
     * 提交SQL执行
     *
     */
    public function doQuery($sql = '')
    {
        parent::_checkPermission('Database_query');
        parent::_setMethod('post');
        $runSql = empty($sql) ? trim($_POST['runSql']) : $sql ;
        $formatSql = splitsql($runSql);
        foreach ($formatSql as $fSql){
            if (empty($fSql)) continue;
            $resultData = $this->excuteQuery($fSql);
            if(false !== $resultData['result']) {
                if($resultData['type'] == 'query') {
                    if(empty($resultData['result'])) {
                        echo "<span style='color:red'>SQL执行完成</span>";
                        //exit();
                    }
                    $fields = array_keys($resultData['result'][0]);
                    $this->assign('fields', $fields);
                    $this->assign('dataList', $resultData['result']);
                    echo  $this->fetch();
                    //exit();
                }else {
                    echo "<span style='color:red'>SQL执行完成</span>";
                    //exit();
                }
            }else {
                echo "<span style='color:red'>SQL执行错误:</span><br />{$fSql}<br /><span style='color:red'>错误信息：<br />{$resultData['dbError']}</span>";
                exit();
            }
        }
    }

    /**
     * 备份
     *
     */
    public function export()
    {
        parent::_checkPermission();
        //$tables = $this->db->getTables();
        $tables = $this->db->query("SHOW TABLE STATUS LIKE '".C('DB_PREFIX')."%'");
       // dump($tables);
        
        $fileName = date('YmdH').'_'.rand_string(10);
        $this->assign('fileName', $fileName);
        $this->assign('dataList', $tables);
        $this->display();
    }

    /**
     * 提交备份
     *
     */
    public function doExport() {
        parent::_checkPermission('Database_export');
        parent::_setMethod('post');
        $date = date('Y-m-d H:i:s');
        $tableName = $_POST['tableName'];
        $fileName = trim($_POST['fileName']);
        $dropTable = trim($_POST['dropTable']);
        $fileSize = intval($_POST['fileSize']);
        if(empty($tableName)) {
            // 默认导出所有表
            $tables = $this->db->getTables();
        }else{
            // 导出指定表
            $tables = $tableName;
        }
        // 组装导出SQL
        $sql = "-- shuguangCMS SQL Dump\n"
        ."-- QQ:5565907\n-- Email:web@sgcms.cn\n"
        ."-- Time:{$date}\n"
        ."-- http://www.sgcms.cn \n\n";
        foreach($tables as $key=>$table) {
            $sql .= "-- \n-- 表的结构 `$table`\n-- \n";
            $dropTable &&  $sql .= "DROP TABLE IF EXISTS `$table`;\n";
            $info = $this->db->query("SHOW CREATE TABLE  $table");
            $sql .= $info[0]['Create Table'];
            $sql .= ";\n-- \n-- 导出表中的数据 `$table`\n--\n";
            $result = $this->db->query("SELECT * FROM $table ");
            foreach($result as $key=>$val) {
                foreach ($val as $k=>$field){
                    if(is_string($field)) {
                        $val[$k] = '\''. $this->db->escape_string($field).'\'';
                    }elseif(empty($field)){
                        $val[$k] = 'NULL';
                    }
                }
                $sql .= "INSERT INTO `$table` VALUES (".implode(',', $val).");\n";
            }
        }
        $filename = empty($fileName)? date('YmdH').'_'.rand_string(10) : $fileName;
        file_put_contents($this->bakupDir . $filename.'.sql', trim($sql));
        parent::_sysLog('modify', "备份数据库");
        parent::_message('success', '备份完成');
    }

    /**
     * 导入
     *
     */
    public function import()
    {
        parent::_checkPermission();
        $fileList = getFile($this->bakupDir);
        foreach ((array)$fileList as $listName){
            $fileSize = filesize($this->bakupDir.$listName);
            $fileTime= filemtime($this->bakupDir.$listName);
            $files[] = array('fileName' => $listName, 'fileSize' => $fileSize, 'fileTime' => $fileTime);
        }
        $data['dataList'] = $files;
        $this->assign($data);
        parent::_sysLog('index');
        $this->display();
    }

    /**
     * 提交导入
     *
     */
    public function doImport()
    {
        parent::_checkPermission('Database_import');
        $sqlFile = trim($_GET['fileName']);
        $sqlFile = $this->bakupDir . safe_b64decode($sqlFile);
        $sqlContent = file_get_contents($sqlFile);
        $formatSql = splitsql($sqlContent);
        foreach ($formatSql as $fSql){
            if (empty($fSql)) continue;
            // echo $fSql.'<br><br>';
            $resultData = $this->excuteQuery($fSql);
            if(false === $resultData['result']) {
                parent::_message('error', "<span style='color:red'>SQL执行错误:</span><br />SQL:{$sql}<br /><span style='color:red'>错误信息：<br />{$resultData['dbError']}</span>");
            }
        }
        parent::_message('success', '执行完成');
    }

    /**
     * 上传执行
     *
     */
    public function doUploadImport()
    {
        parent::_checkPermission('Database_import');
        $sqlFile = $_FILES['sqlFile']['name'];
        if(!empty($sqlFile)) {
            // 判断文件后缀
            $pathinfo = pathinfo($_FILES['sqlFile']['name']);
            $ext = $pathinfo['extension'];
            if(!in_array($ext, array('sql', 'gz', 'txt'))) {
                parent::_message('error', '文件格式不符合(sql,txt,gz)');
            }
            // 导入SQL文件
            $runSql = file_get_contents($_FILES['sqlFile']['tmp_name']);
        }else{
            parent::_message('error', '选择要导入的文件');
        }
        $runSql = str_replace("\r\n", "\n", $runSql);
        //$runSql = auto_charset($runSql, 'gbk', 'utf-8');
        @unlink($_FILES['sqlFile']['tmp_name']);
        $formatSql = splitsql($runSql);
        foreach ($formatSql as $fSql){
            if (empty($fSql)) continue;
            $resultData = $this->excuteQuery($fSql);
            if(false === $resultData['result']) {
                parent::_message('error', "<span style='color:red'>SQL执行错误:</span><br />SQL:{$sql}<br /><span style='color:red'>错误信息：<br />{$resultData['dbError']}</span>");
            }
        }
        parent::_message('success', '执行完成');
    }

    /**
     * Enter description here...
     *
        优化optimzeTable
        检查checkTable
        分析analyzeTable
        修复repairTable
     */
    public function doCommand()
    {
        parent::_checkPermission('Database_index');
        $postData = trim($_POST['postData']);
        $command = trim($_POST['command']);
        switch ($command)
        {
            case 'optimzeTable':$this->doQuery("OPTIMIZE TABLE {$postData}"); break;
            case 'checkTable':$this->doQuery("CHECK TABLE {$postData}");break;
            case 'analyzeTable': $this->doQuery("ANALYZE TABLE {$postData}"); break;
            case 'repairTable':$this->doQuery("REPAIR TABLE {$postData}"); break;
            case 'showTable':
                $table = explode(',', $postData);
                foreach ((array)$table as $tb){
                    $this->doQuery("SHOW COLUMNS FROM {$tb}");
                }
                break;
            default:
                echo '请选择操作类型';
                exit();
                break;
        }
    }
}
