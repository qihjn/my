<?php
// 后台用户模块
class CompanyAction extends CommonAction {
	
	var $enum;
	var $c;
	function __construct(){
		parent::__construct();
		$this->c = D('Category');
		$this->enum = D('Enum');
	}
	
	function _filter(&$map){
		//dump($_GET);
		//echo getEnumTitle(282,'profesion');
		if (isset($map['thumb'])) {
			$map['thumb'] = array("neq",'');
		}
		if (isset($_GET['firstRequest']) && !isset($map['job_request'])) {
			$childs = $this->enum->getChilds($_GET['firstRequest'],"job_category");
			$map['job_request'] = array("in",$childs);
		}
		if (isset($_GET['province']) && $_GET['province'] != "全国") {
			$local = $_GET['province'];
			if(isset($_GET['city']) && $_GET['city'] !='不限'){
				$local .= '/'. $_GET['city'];
			}	
			$map['location'] = areaCondition($local);
		}
		//return $map;
	}
	
	function replacePublic($r = array()){
		//形象
		$f = D("File");
		$rf = $f->where("tid = '{$r[uid]}' and type='figure'")->select();
		$n = count($rf);
		while($n < 5){
			$rf[$n] = array("thumb" => "");
			$n++;
		}
		$this->assign('p',$rf);
		
		
		$r['category_id'] = $this->enum->getSelect("profesion",'category_id',$r['category_id'],'value');
		$r['scale'] = $this->enum->getSelect("scale",'',$r['scale'],'name');
		$r['nature'] = $this->enum->getSelect("nature",'',$r['nature'],'name');
		return $r;
	}
	
	function add(){
		
		
		$r = $this->replacePublic();
		$uid = $_REQUEST['uid'] ? $_REQUEST['uid'] : getUserId();
		if(!$uid){
			//随机创建用户
			$m = D('Member');
			//addUserByRandom
			$uid = $m->addUserByRandom(COMPANY);			
		}
		//echo $uid;
		$r['uid'] = $uid;
		//$r['tid'] = mt_rand(); //用于上传的随机tid //由于公司用uid标识，故不需要这个tid
		$this->assign('vo',$r);
		$this->display();
	}
	
	function insert(){
		
		if($id = $this->m->insert()){
			//echo $this->msgText('Job','职位',$id);exit;
			redirect($this->getReturnUrl(),2,$this->msgText('Job','职位',$id));
		}else{
			$this->error("失败");
		}
	}
	
	function edit(){
		if($id = $_GET['id']){
			$r = $this->m->getOne($_GET['id']);
			
			$r = $this->replacePublic($r);
			
			$r['pubtime'] = date('Y-m-d',$r['pubtime']);
			$r['referurl'] = $_SERVER['HTTP_REFERER'];
			//dump($r);
			//echo $_SERVER['HTTP_REFERER'];
			/*$f = D("File");
			$r['tid'] = $r['id'];
			$r['thumb'] = $f->where("tid = $id and type='job' and utype='person_face'")->getField('thumb');
			*/
			$this->assign('vo',$r);
			
			
			
			$this->display("add");
		}
		
	}
	
	function update(){
		$this->m->update();
	}
}
?>