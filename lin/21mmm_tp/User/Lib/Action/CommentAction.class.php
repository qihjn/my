<?php
class CommentAction extends CommonAction {
	
	var $enum;
	var $c;
	function __construct(){
		parent::__construct();
		$this->c = D('Category');
		$this->enum = D('Enum');
	}
	
	//过滤查询字段
	function _filter(&$map){
		$map['title'] = array('like',"%".$_POST['name']."%");
	}
	
	function replacePublic($r){
		$r['model'] = $this->getActionName();
		$r['data'] = $this->c->getJson();;
		$r['property'] = $this->enum->getSelect('property', 'property', $r['property']);
		$r['period'] = $this->enum->getSelect('period', 'period', $r['period']);
		$r['infotype'] = $this->enum->getRadio('supply_infotype','infotype', $r['infotype']);
		if(!$r['firsttype']){
			$r['firsttype'] = '17';
		}
		if(!$r['secondtype']){
			$r['secondtype'] = '';
		}
		return $r;
	}
	
	function add(){
		$r = $this->replacePublic(array());
		$r['action'] = "insert";
		$this->assign("vo",$r);
		$this->display();
	}
	
	/*function insert(){
		//ri($_POST);
		if(false !== $this->m->insert()){
			$this->success("成功");
		}else{
			$this->error("出错");
		}
	}*/
	
	//编辑页面
	function edit($id){
		$id = $_GET['id'];
		if($id){
			$this->replacePublic();
			$r = $this->m->read($id);
			$r = $this->replacePublic($r);
			$r['fhash'] = urlencode(s_encrypt($r['thumb']));
			$r['action'] = "update";
			$this->assign("vo",$r);
			$this->display('add');
			echo s_decrypt(urldecode($r['fhash']));
		}else{
			$this->error('id必须是数字');
		}
	}
	
	function update(){
		//var_dump($_POST);exit;
		if(false !== $this->m->update()){
			$this->success("修改成功");
		}else{
			$this->error('修改失败');
		}
		
	}
	
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
	
	
	//移动图片到指定主题下
	function move(){
		$f = D("File","Home");
		if(true === $f->move($_GET['id'],$_GET['tid'])){
			echo "成功";
		}else{
			echo "失败";
		}
	}
	

	
}
?>