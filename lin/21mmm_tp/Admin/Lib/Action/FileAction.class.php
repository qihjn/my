<?php
class FileAction extends CommonAction {
	
	//删除，支持批量
	function delete(){
		$id = $_GET['id'];
		if(empty($id)){
			$this->error("删除项不存在");
		}
		//echo "ri";exit;
		import("Home.Model.FileModel");
		$file = D("File");
		$r = $file->del($id);
		if($r){
			echo "成功";
		}else{
			echo "失败";
		}
	}
	
	//更新,支持批量
	function update(){
		//var_dump($_POST);
		import("Home.Model.FileModel");
		$f = D('File');
		if(true === $f->update($_POST)){
			$this->success('成功');
		}
	}
	
	//添加新图片
	function add(){
		//import("Home.Model.FileModel");
		$this->display();

	}
	
	function insert(){
		
		if($_POST){
			$this->m->insert();
		}
	}
	
	//更新
	function up(){}
	
}
?>