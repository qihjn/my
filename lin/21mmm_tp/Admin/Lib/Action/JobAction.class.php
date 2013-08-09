<?php
class JobAction extends CommonAction {
	
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
			$map['local'] = array(array("like","%$local%"),array("like",'全国'),'or');
		}
		//return $map;
	}
	
	function replacePublic($r = array()){
		//形象
		/*$f = D("File");
		$rf = $f->where("tid = '{$_GET[id]}' and type='figure'")->select();
		$n = count($rf);
		while($n < 5){
			$rf[$n] = array("thumb" => "");
			$n++;
		}
		$this->assign('p',$rf);*/
		
		
		$r['experience'] = $this->enum->getSelect("experience",'',$r['experience'],'name');
		$r['eatcheck'] = $this->enum->getRadio("eatcheck",'',$r['eatcheck'],'value');
		$r['sex'] = $this->enum->getRadio("sex",'',$r['sex'],'value');
		$r['emtype'] = $this->enum->getRadio("emtype",'',$r['emtype'],'name');
		$r['money'] = $this->enum->getSelect("income",'money',$r['money'],'name');
		$r['worklife'] = $this->enum->getRadio("period",'worklife',$r['worklife'],'value');
		//$r['']
		//dump($r);
		return $r;
	}
	
	function add(){
		
		$r = $this->replacePublic();
		
		//dump($r['category_id']);
		
		$r['tid'] = mt_rand();
		$this->assign('vo',$r);
		$this->display();
	}
	
	function insert(){
		
		if($id = $this->m->insert()){
			//echo $this->msgText('Job','职位',$id);exit;
			redirect(__URL__,2,$this->msgText('Job','职位',$id));
		}else{
			$this->error("失败");
		}
	}
	
	function edit(){
		if($id = $_GET['id']){
			$r = $this->m->getOne($_GET['id']);
			
			$r = $this->replacePublic($r);
			
			$r['pubtime'] = date('Y-m-d',$r['pubtime']);
			
			/*$f = D("File");
			$r['tid'] = $r['id'];
			$r['thumb'] = $f->where("tid = $id and type='job' and utype='person_face'")->getField('thumb');
			*/
			$this->assign('vo',$r);
			
			
			
			$this->display("add");
		}
		
	}
}
?>