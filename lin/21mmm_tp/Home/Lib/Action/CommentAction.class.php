<?php
class CommentAction extends CommonAction{
	
	

	
	//======================================前台操作
	
	/**
	 * 添加页面
	 */
	function add(){
		//
	}
	
	/**
	 * 添加页面
	 */
	function insert(){
		if(true === $this->m->insert()){
			$this->success('留言成功');
		}
	}
	
	/**
	 * 添加页面
	 */
	function edit(){
		//
	}
	
	/**
	 * 添加页面
	 */
	function update(){
		//
	}
	
	/**
	 * 添加页面
	 */
	function delete(){
		//
	}
	
	//首页
	function index(){
		$title = "恭喜，收到一份供求咨询";
		$body = file_get_contents('./Public/Email/supply.html');
		//ri($body);
		//$to = "78746365@qq.com";
		$to = "f4f8@qq.com";
		$toname = "自己";
			$msg = sendmail($title,$body,$to,$toname); 
			if($msg === true){
				echo "邮件发送成功";
			}else{
				echo $msg;
			}
			

		$num = $i;
		//echo __URL__;
		//redirect("{&WWW_URL}/home.php/comment/?num=$num", 1, 'redi');
	}
	
	//首页
	function lists(){
		$this->display();
	}
	
	//首页
	function show(){
		$this->display();
	}
}
?>