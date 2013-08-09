<?php

class ResumeAction extends CommonAction{
	public function _filter(&$map){
		//dump($map);
		//dump($_REQUEST);
		//$map = $_REQUEST;
		//用户简历搜索
		if(isset($_REQUEST['workplace'])){
			unset($map['workplace']);
			$map['local'] = array("like","%{$_REQUEST['workplace']}%");
			//$map['place'] ='';		
		}
		if(isset($_REQUEST['category_id'])){
			unset($map['category_id']);
			$enum = D('Enum');
			$childs = $enum->getChilds($_REQUEST['category_id'],"job_category");
			$map['job_request'] = array("in",$childs);
				
		}
		if(isset($_REQUEST['keyword'])){
			//unset($map['workplace']);
			//and (j.title='%$keyword%' or 'j.request like' or c.title like '%key%'  )
			$keyword = $_REQUEST['keyword'];
			$where['realname'] = array("like","%$keyword%");
			$where['request'] = array("like","%$keyword%");
			$where['resumetitle'] = array("like","%$keyword%");
			$where['_logic'] = "or";
			$map['_complex'] = $where;
			//$map['j.workplace'] = array("like","%{$_REQUEST['workplace']}%");
					
		}
		
		//图片简历连接查询基本条件
		//if ($_REQUEST['map']) {
		$map = array_merge($map,$this->m->baseOption['map']);
		//}
		//dump($_REQUEST);
		//dump($map);
		//return $map;
	}
	
	public function _before_index(){
		//左侧推荐
    	$up = $this->m->getList(array("up"=>1),20);
    	$this->assign('up',$up);
	}
    public function index2(){
    	//dump($_GET);
    	
    	$pageTitle = $firsttype."_".$secondtype."_".C('SITE_TITLE');
		$this->assign('pageTitle',$pageTitle);
		
    	//$join = "u_unit as c on c.uid=j.uid";
    	//$field = "*, j.title as jtitle,c.title as ctitle";		
		//$table = $this->m->getTableName();
		//$table = "$table j";
		//$map['j.title'] = array('like','%业务代表%');
		//$map['workplace'] = "上海市/";
		$option['sql'] = "SELECT *,(select thumb from img_base where tid=pid and type='job' and utype='person_face') as th FROM `u_person` WHERE 1";
		
    	$this->indexLink($option);
    	
    	
    	//$r = $this->m->getListByLink("",20);
    	//$this->assign("list",$r);
    	//$this->display();
    }
    
    /**
     * 图片简历列表页
     */
	public function indexp(){
    	//dump($_GET);
    	$sql = "SELECT * FROM 21mmm.u_person LEFT JOIN img_base on img_base.tid=u_person.pid WHERE ( img_base.type = 'job' ) AND ( img_base.utype = 'person_face' ) ORDER BY `pid` desc LIMIT 0,10 
    	";
    	echo getCountSql($sql);
    	
    	$pageTitle = $firsttype."_".$secondtype."_".C('SITE_TITLE');
		$this->assign('pageTitle',$pageTitle);
		
    	$join = "u_unit as c on c.uid=j.uid";
    	//$field = "*, j.title as jtitle,c.title as ctitle";		
		//$table = $this->m->getTableName();
		//$table = "$table j";
		$map['j.title'] = array('like','%业务代表%');
		$map['workplace'] = "上海市/";
		
		$_REQUEST['map'] = $this->m->baseOption['map'];//dump($this->baseOption);
    	$this->indexLink($this->m->baseOption['join'],$field,$table);
    	
    	//$r = $this->m->getListByLink("",20);
    	//$this->assign("list",$r);
    	//$this->display();
    }
    
    public function show(){
    	$id = $_GET['id'];
    	$r = $this->m->getOne($id);  	
    	if(!is_array($r)) $this->error(L('no_record'));
    	
    	if(!$r['thumb']){
    		$r['thumb'] = $this->m->getImg($r['pid']);
    	}
    	$pageTitle = "{$r['resumename']}_{$r['local']}, 招聘".getEnumTitle($r['job_request']).",  求职 /  "."_".C('SITE_TITLE');
    	$this->assign("pageTitle",$pageTitle);
    	$this->assign('vo',$r);
    	
    	//形象照片
    	$f = D('File');//$mienBase
    	$p = $f->where("utype ='person' and tid={$id}")->select();
    	$this->assign('figure',$p);
    	
    	//匹配人才
    	$m = $this->m->match($r['local'],$r['job_request'],10);
    	$this->assign('match',$m);
    	
    	//相关区域
    	//echo is_array(array());
    	$area = getProvincePingying($r['local']);//dump($area);
    	$this->assign('area',$area);
    	$this->display();
    }
    
	/**
	 * 申请
	 */
	public function apply(){
		$u = getUserAuth();
		//dump($u);
		if ($u['utype'] != COMPANY) {
			$this->error(L('no_login_company'));
		}
		$ra = D('ResumeApply');
		/*if($vo = $ra->create()){
			$id = $ra->add();
		}*/
		//$id = $ra->insert();
		if (true === $ra->insert()) {
			$this->success(L(_OPERATION_SUCCESS_),$_REQUEST['ajax']);
			
		}else{
			$this->error(L(_OPERATION_FAIL_),$_REQUEST['ajax']);
			
		}
		
	}
	
	/**
	 * 收藏
	 */
	public function fav(){
		$rf = D('ResumeFavor');
		$u = getUserAuth();
		//dump($u);
		if ($u['utype'] != COMPANY) {
			$this->error(L('no_login_company'));
		}
		if(true === $rf->insert($u['uid'])){
			$this->success(L(_OPERATION_SUCCESS_),$_REQUEST['ajax']);
		}else{
			$this->error(L(_OPERATION_FAIL_),$_REQUEST['ajax']);
		}
	}
	
	/**
	 * 联系方式
	 */
	public function contact(){
		//登录了，是企业用户，并且拥有相应服务，显示联系方式
		$uid = getUserId();//dump($uid);
		/* @var  $so serviceown*/
		$so = D('ServiceOwn');
		$own = $so->ownpersonsersvice($uid,$_GET['workplace'],$_GET['category_id']);
		//dump($own);
		//$str = '无';//L('please_send_resume');
		if($own ===true){
			//$c = D('Company');
			
			//$r = $this->m->getOne($_GET['id']);
			$r = $this->m->field("phone,mobile,qq,email")->find($_GET['id']);
			//echo $this->m->getLastSql();
		}else{
			//$r['contacter'] = $r['phone'] = $r['mobile'] = $r['faq'] = $r['qq'] = $r['email'] = $r['addr'] = $str;
		}
		foreach ($r as $k => $v) {
			if (!$v) {
				$r[$k] = '无';
			}
		}
		$this->assign('vo',$r);
		//echo $this->fetch("contact");
		//$r = $this->m->getOne($id);
		//echo $this->m->getLastSql();
		//dump($r);
		if($r){
		//header('Content-Type:text/html;charset=utf-8'); 
		echo json_encode($r);
		
		}
		//echo '{"a":"b"}';
	}
	
	public function counter(){
		$id = $_GET['id'];
		if ($id) {
			$this->m->couter($id);
		}
		
	}
	
	
}
?>