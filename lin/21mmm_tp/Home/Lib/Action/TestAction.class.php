<?php

class TestAction extends CommonAction{

	public function index(){
		$this->m->t();
		$this->display("Index:index");
	}
	
	public function resume(){
		$r = D('Resume');
		$r->_filter();
	}

}
?>