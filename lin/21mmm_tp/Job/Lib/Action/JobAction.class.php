<?php

class JobAction extends CommonAction{
	public function _filter(&$map){
		//dump($map);
		//dump($_REQUEST);
		//$map = $_REQUEST;
		//用户简历搜索
		if(isset($_REQUEST['workplace'])){
			unset($map['workplace']);
			if ($_REQUEST['workplace'] != '中国' && $_REQUEST['workplace'] != '全国') {
				$map['j.workplace'] = array("like","%{$_REQUEST['workplace']}%");
			}
			
			//$map['place'] ='';		
		}
		if(isset($_REQUEST['category_id'])){
			unset($map['category_id']);
			if ($_REQUEST['category_id'] != -1) {
				$enum = D('Enum');
				$childs = $enum->getChilds($_REQUEST['category_id'],"job_category");
				$map['j.category_id'] = array("in",$childs);
			}
			
				
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
		if (isset($_REQUEST['up'])) {
			unset($map['up']);
			$map['c.up'] = 1;
		}
		//dump($map);
		//return $map;
	}
    public function index(){
    	//dump($_GET);
    	$pageTitle = L('job_so_title')."_".C('SITE_TITLE');
		$this->assign('pageTitle',$pageTitle);
		//echo (curl($vo["nid"]));
		//左侧
		$r = $this->m->listLink(array("c.up"=>1),8);
		$this->assign('up',$r);
		
    	$option['join'] = "u_unit as c on c.uid=j.uid";
    	$option['field'] = "*, j.title as jtitle,c.title as ctitle";		
		$table = $this->m->getTableName();
		$option['table'] = "$table j";
		$map['j.title'] = array('like','%业务代表%');
		$map['workplace'] = "上海市/";
    	$this->indexLink($option);
    	
    	//$r = $this->m->getListByLink("",20);
    	//$this->assign("list",$r);
    	//$this->display();
    }
    
    /**
     * 图片列表
     */
	public function indexp(){
    	//dump($_GET);
    	$pageTitle = $firsttype."_".$secondtype."_".C('SITE_TITLE');
		$this->assign('pageTitle',$pageTitle);
		
		//左侧
		$r = $this->m->listLink(array("c.up"=>1),8);
		$this->assign('up',$r);
		
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
    	$r = $this->m->getOne($id);
    	$this->assign('vo',$r);
    	//dump($r);
    	$uid=$r['uid'];
    	$alljob = $this->m->getListByUid($uid);
    	$this->assign('alljob',$alljob);
    	//echo "sb".getEnumTitle(3,'period');
    	
	    
		$pageTitle = str_replace('/', '|', $r['workplace'])."|{$r['category']}|{$r['company']} 招聘{$r['title']} ---中华美容网-21mmm.com.";
		$this->assign('pageTitle',$pageTitle);
    	$this->display();
    }
    
	public function jobApply(){
		$ja = D('JobApply');
		//$ja->apply("1233");
		
		$keywords = preg_split ("/[\s,]+/", "hypertext language, programming");
		//var_dump($keywords);
		
	}
	
	/**
	 * 联系方式
	 */
	public function contact(){
		//$r = $_GET;
		/* @var  $so serviceown*/
		$so = D('ServiceOwn');
		$own = $so->ownpersonsersvice($_GET['uid'],$_GET['workplace'],$_GET['category_id']);
		
		$str = L('please_send_resume');
		if($own ===true){
			$c = D('Company');
			$r = $c->getOneByUid($_GET['uid']);
			
		}else{
			$r['contacter'] = $r['phone'] = $r['mobile'] = $r['faq'] = $r['qq'] = $r['email'] = $r['addr'] = $str;
		}
		foreach ($r as $k => $v) {
			if (!$v) {
				$r[$k] = '无';
			}
		}
		$this->assign('vo',$r);
		echo $this->fetch("contact");
		//header('Content-Type:text/html;charset=utf-8'); 
		//echo json_encode($r);
		//echo '{"a":"b"}';
	}
	
	/**
	 * 得到会员发布的职位
	 * @param unknown_type $uid
	 */
	public function ajaxGetJobs(){
		$uid = getUserId();
		$r = $this->m->getListByUid($uid);
		echo json_encode($r);
	}
	
	
	public function apply(){
		$m = D('Member');
		$ja = D('JobApply');
		//$r = $u->getUserInfo(24600);
		//dump($r);
		
		$u = $m->getLoginUserInfo(PERSON);
		$uid = $u['uid'];//getUserId(); 不可直接读出uid，必须是个人用户id
		//$uid = 10;
		$_REQUEST['uid'] || $_REQUEST['uid'] = $uid; //没有传uid,取当前登录的个人用户uid
		if(!$uid)
			$this->error(L('no_login_person')); //若开启rbac，则此可不用。
		$r = $ja->insert();
		if($r === true){
			echo L('_OPERATION_SUCCESS_');
		}else{
			echo $r;
		}
	}
	
	public function fav(){
		$m = D('Member');
		$jc = D('JobCollect');
		//$r = $u->getUserInfo(24600);
		//dump($r);
		
		
		$u = $m->getLoginUserInfo(PERSON);
		$uid = $u['uid'];//getUserId(); 不可直接读出uid，必须是个人用户id
		$uid = 10;
		if(!$uid)
			$this->error(L('no_login_peson')); //若开启rbac，则此可不用。
		$r = $jc->insert();
		if($r === true){
			echo L('_OPERATION_SUCCESS_');
		}else{
			echo $r;
		}
	}
}
?>