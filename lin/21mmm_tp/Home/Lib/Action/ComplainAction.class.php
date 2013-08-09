<?php
class ComplainAction extends CommonAction{
	//首页
	/*function index(){
		$this->display();
	}*/
	
	function insert() {
		//B('FilterString');
		$_POST['ctime'] = time();
		$_POST['ip'] = get_client_ip();
		$name=$this->getActionName();
		$model = D ($name);
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}
		//保存当前数据对象
		$list=$model->add ();
		if ($list!==false) { //保存成功
			//echo Cookie::get ( '_currentUrl_' );exit;
			//$this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
			redirect(C('WWW_URL'),2,'think you');
			//$this->success ('新增成功!');
		} else {
			//失败提示
			$this->error ('新增失败!');
		}
	}
	
	
}
?>