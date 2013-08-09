<?php
/**
 * 
 * Config(系统配置)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: ConfigAction.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

class ConfigAction extends GlobalAction
{
    private $dbconfig,$dao;
    function _initialize()
    {
        parent::_initialize();
        $this->dbconfig = getContent('db.config.php', '.');
        $this->dao = D('Config');
    }

    /**
	 * 系统配置
	 *
	 */
    public function index()
    {
        parent::_checkPermission();
        $record = $this->dao->where('id=1')->find();
        $this->assign('vo', $record);
        parent::_sysLog('index');
        $this->display();
    }

    /**
     * 提交编辑
     *
     */
    public function doModify()
    {
        parent::_checkPermission('Config_modify');
        parent::_setMethod('post');
        $id = intval($_POST['id']);
        empty($id) && parent::_message('error', '记录不存在');
        if($daoCreate = $this->dao->create())
        {
            $this->dao->sys_log_ext = empty($_POST['sys_log_ext']) ? '' : implode(',', $_POST['sys_log_ext']);
            $daoSave = $this->dao->save();
            if(false !== $daoSave)
            {
                $configHeader = "<?php\n/** \n* cms.config.php\n*\n* @package      	shuguangCMS_Corp\n* @author     shuguang QQ:5565907 <web@sgcms.cn>\n* @copyright  Copyright (c) 2008-2010  (http://www.sgcms.cn)\n* @license    http://www.sgcms.cn/license.txt\n*/\n\nif (!defined('SHUGUANGCMS')) exit();\n\nreturn array(\r\n";
                $configFooter .= ');';
                $_POST['sys_log_ext'] = empty($_POST['sys_log_ext']) ? '' : implode(',', $_POST['sys_log_ext']);
                foreach((array)$_POST as $key => $value)
                {
                    //过滤无关POST key
                    if (in_array($key, array('submit', 'id'))) continue ;
                    if(strtolower($value) == "true" || strtolower($value) == "false" || is_numeric($value)){
                        $configBody .= "    '".$key."' => ".dadds($value).",\r\n";
                    }else{
                        $configBody .= "    '".$key."' => '".dadds($value)."',\r\n";
                    }
                }
                $configData = $configHeader . $configBody . $configFooter;
                putContent($configData, 'cms.config.php', '.');
                parent::_sysLog('modify', "编辑系统配置");
                parent::_message('success', '更新成功');
            }else
            {
                parent::_message('error', '更新失败');
            }
        }else
        {
            parent::_message('error', $this->dao->getError());
        }
    }

    /**
     * 内核配置
     *
     */
    public function core()
    {
        parent::_checkPermission('Config_core');
        $this->assign($this->dbconfig);
        $this->display();
    }

    /**
     * 提交内核配置
     *
     */
    public function doCore()
    {
        parent::_setMethod('post');
        parent::_checkPermission('Config_coreModify');
        $config = $this->dbconfig;
        $configHeader = "<?php\n/** \n* db.config.php\n*\n* @package      	shuguangCMS_Corp\n* @author     shuguang QQ:5565907 <web@sgcms.cn>\n* @copyright  Copyright (c) 2008-2010  (http://www.sgcms.cn)\n* @license    http://www.sgcms.cn/license.txt\n*/\n\nif (!defined('SHUGUANGCMS')) exit();\n\nreturn array(\r\n";
        $configFooter .= ');';
        $config['APP_DEBUG'] = trim($_POST['APP_DEBUG']);
        $config['URL_ROUTER_ON'] = trim($_POST['URL_ROUTER_ON']);
        $config['URL_DISPATCH_ON'] = trim($_POST['URL_DISPATCH_ON']);
        $config['URL_MODEL'] = trim($_POST['URL_MODEL']);
        $config['URL_PATHINFO_DEPR'] = trim($_POST['URL_PATHINFO_DEPR']);
        $config['URL_HTML_SUFFIX'] = trim($_POST['URL_HTML_SUFFIX']);
        $config['TMPL_CACHE_ON'] = trim($_POST['TMPL_CACHE_ON']);
        $config['TMPL_CACHE_ON'] = trim($_POST['TMPL_CACHE_ON']);
        $config['TOKEN_NAME'] = trim($_POST['TOKEN_NAME']);
        $config['TMPL_CACHE_ON'] = trim($_POST['TMPL_CACHE_ON']);
        $config['TMPL_CACHE_TIME'] = trim($_POST['TMPL_CACHE_TIME']);
        foreach((array)$config as $key => $value)
        {
            if($value === true || $value == 'true'){
                $configBody .= "    '".$key."' => true,\r\n";
            }else if($value === false || $value == 'false'){
                $configBody .= "    '".$key."' => false,\r\n";
            } else if(is_numeric($value)){
                $configBody .= "    '".$key."' => $value,\r\n";
            }else{
                $configBody .= "    '".$key."' => '$value',\r\n";
            }
        }

        $configData = $configHeader . $configBody . $configFooter;
        putContent($configData, 'db.config.php', '.');
        parent::_sysLog('modify', "编辑内核配置");
        parent::_message('success', '内核更新成功');
    }
}
