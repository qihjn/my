<?php
// 后台用户模块
class ResumeAction extends CommonAction {
	
	var $enum;
	var $c;
	function __construct(){
		parent::__construct();
		$this->c = D('Category');
		$this->enum = D('Enum');
	}
	
	function add(){
		
		$r['marriage'] = $this->enum->getRadio("marriage",'','未婚','name');
		$r['housing'] = $this->enum->getRadio("housing",'','2','value');
		$r['toposi'] = $this->enum->getSelect("toposi",'','2','value');
		$r['job_request_text'] = "请选择求职意向";
		
		$this->assign('vo',$r);
		$this->display();
	}
	
	function insert(){
		if($this->m->insert()){
			$this->success('成功');
		}else{
			$this->error("失败");
		}
	}
	
	function edit(){
		if($id = $_GET['id']){
			$r = $this->m->find($_GET['id']);
			$r['marriage'] = $this->enum->getRadio("marriage",'','未婚','name');
			$r['housing'] = $this->enum->getRadio("housing",'','2','value');
			$r['toposi'] = $this->enum->getSelect("toposi",'','2','value');
			!$r['job_request'] ? $r['job_request_text'] = "请选择求职意向" : '';
			$r['job_request'] = "40,";
			$this->assign('vo',$r);
			$f = D("File");
			
			$r = $f->where("tid = $id and type='job' and utype='person_face'")->select();
			dump($r);
			$this->assign('p',$r);
			$this->display("add");
		}
	}
	
	function update(){
		$this->m->update();
	}
}
?>