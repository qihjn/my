<?php 
/**
 * 
 * Label(标签调用)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: LabelAction.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

class LabelAction extends GlobalAction
{
    public $dao;
	function _initialize()
	{
		parent::_initialize();
		parent::_checkPermission('Label');
		$this->dao = D('Label');
	}
	
	/**
     * 列表
     *
     */
	public function index()
	{
		$this->display();
	}
	
	/**
     * 列表
     *
     */
	public function lists()
	{
		$count = $this->dao->where($condition)->count();
		$listRows = 15 ;
		$p = new page($count,$listRows);
		$dataList = $this->dao->Order($setOrder)->Where($condition)->Limit($p->firstRow.','.$p->listRows)->findAll();
		$Label = $p->show();
		if($dataList !== false){
			$this->assign('pageBar', $Label);
			$this->assign('dataList', $dataList);
		}
		parent::_sysLog('index');
		$this->display();
	}
	
	/**
     * 提交录入
     *
     */
	public function doInsert()
	{
		parent::_setMethod('post');
		if($daoCreate = $this->dao->create())
		{
			$daoAdd = $this->dao->add();
			if(false !== $daoAdd)
			{
				parent::_sysLog('insert', "提交录入:$daoAdd");
				parent::_message('success', '录入成功');
			}else
			{
				parent::_message('error', '录入失败');
			}
		}else
		{
			parent::_message('error', $this->dao->getError());
		}
	}
	
	/**
     * 编辑
     *
     */
	public function modify()
	{
		$item = intval($_GET["id"]);
		$record = $this->dao->where('id='.$item)->find();
		if (empty($item) || empty($record)) parent::_message('error', '记录不存在');
		$this->assign('vo', $record);
		$this->display();
	}

	/**
     * 提交编辑
     *
     */
	public function doModify()
	{
		parent::_setMethod('post');
		$item = intval($_POST['id']);
		empty($item) && parent::_message('error', 'ID获取错误,未完成编辑');
		if($daoCreate = $this->dao->create())
		{
			$daoSave = $this->dao->save();
			if(false !== $daoSave)
			{
				parent::_sysLog('modify', "编辑:$item");
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
			case 'update': parent::_batchModify(0, $_POST, array('title', 'link_label'));break;
			default: parent::_message('error', '操作类型错误') ;
		}
	}
}
