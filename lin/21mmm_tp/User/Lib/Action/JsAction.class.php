<?php
// 后台用户模块
class JsAction extends CommonAction {
	function index(){
		//exit;
		createJsPublicVar();
		$this->success('生成成功');       
	}
}
?>