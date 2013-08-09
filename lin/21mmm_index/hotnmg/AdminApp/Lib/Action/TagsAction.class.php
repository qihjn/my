<?php 
/**
 * 
 * Tags(公共)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: TagsAction.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

class TagsAction extends GlobalAction
{
    public $dao;
	function _initialize()
	{
		parent::_initialize();
		parent::_checkPermission('Tags');
		$this->dao = D('Tags');
	}

	/**
     * 列表
     *
     */
	public function index()
	{
		$condition = array();
		$tagName = formatQuery($_GET['tagName']);
		$module = trim($_GET['module']);
		$orderBy = trim($_GET['orderBy']);
		$orderType = trim($_GET['orderType']);
		$setOrder = setOrder(array(array('viewCount', 'view_count'), 'id'), $orderBy, $orderType);
		$pageSize = trim($_GET['pageSize']);
		$tagName &&  $condition['tag_name'] = array('like', '%'.$tagName.'%');
		$module &&  $condition['model'] = array('eq', $module);
		$count = $this->dao->where($condition)->count();
		$listRows = empty($pageSize) ? 15 : $pageSize ;
		$p = new page($count, $listRows);
		$dataList = $this->dao->Where($condition)->Order($setOrder)->Limit($p->firstRow.','.$p->listRows)->findAll();
		$page = $p->show();
		if($dataList !== false)
		{
			$this->assign('pageBar', $page);
			$this->assign('dataList', $dataList);
		}
		parent::_sysLog('index');
		$this->display();
	}


	/**
     * 批量操作
     *
     */
	public function doCommand()
	{
		if(getMethod() == 'get'){
            $operate = trim($_GET['operate']);
        }elseif(getMethod() == 'post'){
            $operate = trim($_POST['operate']);
        }else{
            parent::_message('error', '只支持POST,GET数据');
        }
		switch ($operate){
			case 'delete': parent::_delete();break;
			default: parent::_message('error', '操作类型错误') ;
		}

	}
}
