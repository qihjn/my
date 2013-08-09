<?php
class PuserAction extends UserAction{
	function __construct(){
		if($_COOKIE['utype'] != 'person'){
			echo "不是个人用户，请登录成个人用户。";
		}
	}
	//首页
	function index(){
		$this->display();
	}
	
	function menu(){}
	
	
}
?>