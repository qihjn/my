<?php

class CompanyAction extends CommonAction{
	public function _filter(&$map){
		//dump($map);
		//dump($_REQUEST);
		//$map = $_REQUEST;
		//用户简历搜索
		if(isset($_REQUEST['workplace'])){
			unset($map['workplace']);
			$map['j.workplace'] = array("like","%{$_REQUEST['workplace']}%");
			//$map['place'] ='';		
		}
		if(isset($_REQUEST['category_id'])){
			unset($map['category_id']);
			$enum = D('Enum');
			$childs = $enum->getChilds($_REQUEST['category_id'],"job_category");
			$map['j.category_id'] = array("in",$childs);
				
		}
		if(isset($_REQUEST['keyword'])){
			//unset($map['workplace']);
			//and (j.title='%$keyword%' or 'j.request like' or c.title like '%key%'  )
			$keyword = $_REQUEST['keyword'];
			$where['j.title'] = array("like","%$keyword%");
			$where['j.request'] = array("like","%$keyword%");
			$where['c.title'] = array("like","%$keyword%");
			$where['_logic'] = "or";
			$map['_complex'] = $where;
			//$map['j.workplace'] = array("like","%{$_REQUEST['workplace']}%");
					
		}
		//dump($map);
		//return $map;
	}
    public function index(){
    	//dump($_GET);
    	$pageTitle = $firsttype."_".$secondtype."_".C('SITE_TITLE');
		$this->assign('pageTitle',$pageTitle);
		
    	$join = "u_unit as c on c.uid=j.uid";
    	$field = "*, j.title as jtitle,c.title as ctitle";		
		$table = $this->m->getTableName();
		$table = "$table j";
		$map['j.title'] = array('like','%业务代表%');
		$map['workplace'] = "上海市/";
    	$this->indexLink($join,$field,$table);
    	
    	//$r = $this->m->getListByLink("",20);
    	//$this->assign("list",$r);
    	//$this->display();
    }
    
    public function show(){
    	$id = $_GET['id'];
    	$r = $this->m->getOneByUid($id);
    	if(!is_array($r)) $this->error(L('no_record'));
    	$r['logo'] = $this->m->getLogo($id);//企业logo
    	$this->assign('vo',$r);
    	$pageTitle = "{$r['title']}-{$r['manage']} 招聘--".C('SITE_TITLE');
		$this->assign('pageTitle',$pageTitle);
    	
    	//形象照片
    	$f = D('File');
    	$r = $f->where("type='figure' and tid={$id}")->select();
    	$this->assign('figure',$r);
    	
    	
    	
    	//$uid=$r['uid'];
    	$j = D('job');
    	$r = $j->getListByUid($id);
    	$this->assign('alljob',$r);
    	$jid = $r[0]['id'];
    	$this->assign('jid',$jid);
    	
    	$this->display();
    }
    
	public function jobApply(){
		$ja = D('JobApply');
		//$ja->apply("1233");
		
		$keywords = preg_split ("/[\s,]+/", "hypertext language, programming");
		var_dump($keywords);
		
	}
}
?>