<?php
class EmailAction extends CommonAction {
	
	/*
	 *收集企业，个人，邮箱
	 */
	function collect(){
		
	}
	
	/*
	 * 发送邮件
	 */
	function send(){
		$u = D('Member');
		$u->getUsersInfo(array('userType' => 'unit'));
		$this->display();
	}
	
	/*
	 * 处理发送
	 */
	function sendHander(){
		$title = "恭喜，收到一份供求咨询";
		$body = file_get_contents('./Public/Email/supply.html');
		//ri($body);
		//$to = "78746365@qq.com";
		$to = "f4f8@qq.com";
		$toname = "自己";
		$num = $_GET['num'] ? $_GET['num'] : 0;
		$add = 2;
		for($i = $num; $i < $num+$add; $i++){
			$msg = sendmail($title,$body,$to,$toname); 
			if($msg === true){
				echo "邮件发送成功";
			}else{
				echo $msg;
			}
		}
		$num = $i;
		redirect(__SELF__."/?num=$num", 1, 'redi');
	}
	function insert() {
		//B('FilterString');
		$name=$this->getActionName();
		$model = D ($name);
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}
		$list=$model->batchAdd();
		if ($list!==false) { 
			$this->_after_update();
			$this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
			$this->success ('新增成功!');
		} else {
			$this->error ('新增失败!');
		}
	}
	
	public function update(){
		$name=$this->getActionName();
		$model = D ( $name );
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}
		// 更新数据
		$list=$model->save ();
		if (false !== $list) {
			$this->_after_update();
			$this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
			$this->success ('编辑成功!');
		} else {
			//错误提示
			$this->error ('编辑失败!');
		}
	}
	
	public function _after_insert(){}
	
	public function _after_update(){
		$this->m->createCache();
		$this->m->createAllSelectHTML();
		
	}
}
?>