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
	
	/*function index(){ //thinkcms 的查询系统
		$condition = array();
        $title = formatQuery($_GET['title']);
        $orderBy = trim($_GET['orderBy']);
        $orderType = trim($_GET['orderType']);
        $recommend = intval($_GET['recommend']);
        $categoryId = intval($_GET['categoryId']);
        $userId = intval($_GET['userId']);
        $status =  intval($_GET['status']);
        $istop = intval($_GET['istop']);
        $createTime = trim($_GET['createTime']);
        $createTime1 = trim($_GET['createTime1']);
        $viewCount = intval($_GET['viewCount']);
        $viewCount1 = intval($_GET['viewCount1']);
        $setOrder = setOrder(array(array('viewCount', 'a.view_count'), 'a.id'), $orderBy, $orderType, 'a');
        $setTime = setTime($createTime, $createTime1);
        $setViewCount = setViewCount($viewCount, $viewCount1);
        $pageSize = intval($_GET['pageSize']);
        $title &&  $condition['a.title'] = array('like', '%'.$title.'%');
        $recommend && $condition['a.recommend'] = array('eq', $recommend);
        $categoryId &&  $condition['a.category_id'] = array('eq', $categoryId);
        $status && $condition['a.status'] = array('eq', $status);
        $userId && $condition['a.user_id'] = array('eq', $userId);
        $istop && $condition['a.istop'] = array('eq', $istop);
        $createTime1 && $condition['a.create_time'] = array('between', $setTime);
        $viewCount1 && $condition['a.view_count'] = array('between', $setViewCount);
        $count = $this->dao->where($condition)->count();
        $listRows = empty($pageSize) || $pageSize > 100 ? 15 : $pageSize ;
        $p = new page($count, $listRows);
        $dataList = $this->dao->Table(C('DB_PREFIX').'news a')->Join(C('DB_PREFIX').'category b on a.category_id=b.id')->Field('a.*,b.title as category')->Order($setOrder)->Where($condition)->Limit($p->firstRow.','.$p->listRows)->findAll();
        $page = $p->show();
        if ($list !== false)
        {
            $this->assign('pageBar', $page);
            $this->assign('dataList', $dataList);
        }
        parent::_sysLog('index');
        $this->display();
	}*/
	
	function _filter(&$map){
		//dump($_GET);
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
			$map['local'] = areaCondition($local);
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
		
		$r['marriage'] = $this->enum->getRadio("marriage",'',$r['marriage'],'name');
		$r['housing'] = $this->enum->getRadio("housing",'',$r['housing'],'value');
		$r['toposi'] = $this->enum->getRadio("toposi",'',$r['toposi'],'value');
		$r['em_type'] = $this->enum->getRadio("emtype",'',$r['em_type'],'name');
		return $r;
	}
	
	function add(){
		
		$r = $this->replacePublic();
		$r['job_request_text'] = "请选择求职意向";
		$r['tid'] = mt_rand();
		$this->assign('vo',$r);
		
		//风采
		//$r = $f->where("tid = $id and utype='person'")->select();
		$r = array();
		$n = count($r);
		while($n < 5){
			$r[$n] = array("thumb" => "");
			$n++;
		}
		$this->assign('p',$r);
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
			$this->replacePublic();
			
			!$r['job_request'] ? $r['job_request_text'] = "请选择求职意向" : '';
			$r['job_request'] = "40,";
			$f = D("File");
			$r['tid'] = $r['id'];
			$r['thumb'] = $f->where("tid = $id and type='job' and utype='person_face'")->getField('thumb');
			//dump($r);
			$this->assign('vo',$r);
			
			//风采
			$r = $f->where("tid = $id and utype='person'")->select();
			$n = count($r);
			while($n < 5){
				$r[$n] = array("thumb" => "");
				$n++;
			}
			$this->assign('p',$r);
			$this->display("add");
		}
		
	}
	
	
}
?>