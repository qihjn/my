<?php
/**
 * 
 * Global(全局)
 *
 * @package      	shuguangCMS
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: GlobalAction.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

class GlobalAction extends Action
{
    public $globalCategory, $globalMenu, $sysConfig;
    /**
     * 初始化
     *
     */
    function _initialize()
    {
        //取配置
        if(fileExit('./cms.config.php')){
            $this->sysConfig = @require_once('./cms.config.php');
        }else{
            $this->sysConfig = M('Config')->where('id=1')->find();
        }

        //检测是否停止
        $this->assign('sysConfig', $this->sysConfig);
        if($sysConfig['web_status'] == 1){
            $this->display('Public:stop');
            exit();
        }
        //取分类
        $this->globalCategory = getCache('Category');

        //取导航
        $this->globalMenu = getCache('Menu');
        $this->assign('globalMenu', $this->globalMenu);

        //导入函数
        Load('extend');
        //导入分页类
        import("ORG.Util.Page");
        $this->assign('moduleName', MODULE_NAME);
    }

	
    /**
     * 数据列表
     *
     * @param $conditions 条件
     * @param $orders 排序
     * @param $listRows 每页显示数量
     * @param $joind 是否表关联
     * @param $table 关联表
     * @param $join 
     * @param $fields 取字段
     */
    public function getList($conditions = '', $orders = '' , $listRows = '')
    {
        $condition = !empty($conditions) ? $conditions : '' ;
        $pageCount = $this->dao->where($condition)->count();
        $listRows = empty($listRows) ? 15 : $listRows;
        $orderd = empty($orders) ? 'id DESC' : $orders;
        $paged = new page($pageCount, $listRows);
        $dataContentList = $this->dao->Where($condition)->Order($orderd)->Limit($paged->firstRow.','.$paged->listRows)->select();
        $pageContentBar = $paged->show();
        $this->assign('dataContentList', $dataContentList);
        $this->assign('pageContentBar', $pageContentBar);
        $this->display();
    }

    /**
     * 数据列表,表关联
     *
     * @param $conditions 条件
     * @param $orders 排序
     * @param $listRows 每页显示数量
     * @param $joind 是否表关联
     * @param $table 关联表
     * @param $join 
     * @param $fields 取字段
     */
    public function getJoinList($conditions = '', $orders = '' , $listRows = '', $table = '', $join = '', $fields = '')
    {
        $condition = !empty($conditions) ? $conditions : '' ;
        $pageCount = $this->dao->Where($condition)->Table($table)->Join($join)->Field($fields)->count();
        $listRows = empty($listRows) ? 15 : $listRows;
        $orderd = empty($orders) ? 'id DESC' : $orders;
        $paged = new page($pageCount, $listRows);
        $dataContentList = $this->dao->Table($table)->join($join)->field($fields)->Where($condition)->Order($orderd)->Limit($paged->firstRow.','.$paged->listRows)->select();
        $pageContentBar = $paged->show();
        $this->assign('dataContentList', $dataContentList);
        $this->assign('pageContentBar', $pageContentBar);
        $this->display();
    }

    /**
     * 数据集
     *
     * @param $conditions 条件
	 *
     */
    public function getDetail($conditions = '', $viewCount = false)
    {
        empty($conditions) && self::_message('errorUri', '查询条件丢失', U('Index/index'));
        $contentDetail = $this->dao->Where($conditions)->find();
        empty($contentDetail) && self::_message('errorUri', '记录不存在', U('Index/index'));
		//更新查看次数
		$viewCount && $this->dao->setInc($viewCount, $conditions);
        $this->assign('contentDetail', $contentDetail);
        $this->display($contentDetail['template']);
    }

    /**
     * 数据集,表关联
     * 此处查询条件可能为数组
     * @param $conditions 条件
     * @param $joind 是否表关联
     * @param $table 关联表
     * @param $join 
     * @param $fields 取字段
     */
    public function getJoinDetail($conditions = '', $viewCount = false, $table = '', $join = '', $fields = '')
    {
        empty($conditions) && self::_message('errorUri', '查询条件丢失', U('Index/index'));
		
		$condition1 = is_array($conditions) ? $conditions[0] : $conditions;
		$condition2 = is_array($conditions) ? $conditions[1] : $conditions;

        $contentDetail = $this->dao->Table($table)->Join($join)->Field($fields)->Where($condition1)->find();
        empty($contentDetail) && self::_message('errorUri', '记录不存在', U('Index/index'));
		//更新查看次数
		$viewCount && $this->dao->setInc($viewCount, $condition2);
        $this->assign('contentDetail', $contentDetail);
        $this->display($contentDetail['template']);
    }
	
    /**
     * 验证码
     *
     */
    function verify()
    {
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }

    /**
     * 输出信息
     *
     * @param $type
     * @param $content
     * @param $jumpUrl
     * @param $time
     * @param $ajax
     */
    protected function _message($type = 'success', $content = '更新成功', $jumpUrl = __URL__, $time = 3, $ajax = false)
    {
        $jumpUrl = empty($jumpUrl) ? __URL__ : $jumpUrl ;
        switch ($type){
            case 'success':
                $this->assign('jumpUrl', $jumpUrl);
                $this->assign('waitSecond', $time);
                $this->success($content, $ajax);
                break;
            case 'error':
                $this->assign('jumpUrl', 'javascript:history.back(-1);');
                $this->assign('waitSecond', $time);
                $this->assign('error', $content);
                $this->error($content, $ajax);
                break;
            case 'errorUri':
                $this->assign('jumpUrl', $jumpUrl);
                $this->assign('waitSecond', $time);
                $this->assign('error', $content);
                $this->error($content, $ajax);
                break;
            default:
                die('error type');
                break;
        }
    }
}

