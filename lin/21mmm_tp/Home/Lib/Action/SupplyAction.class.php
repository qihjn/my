<?php
class SupplyAction extends CommonAction {
	
	var $enum;
	var $c;
	var $u;
	function __construct(){
		parent::__construct();
		$this->c = D('Category');
		$this->enum = D('Enum');
		
		$this->u['uid'] = $_COOKIE['FSQ_uid'];
		
		if(false !== strpos(C('USER_AUTH_ACTION'),ACTION_NAME)){
			if(!chkCuser()){
				redirect('http://user.'.DOMAIN);
				//redirect("/public/login",1,'您不是企业用户');
				//echo '您不是企业用';
			}
		}
	}
	
	function index(){
		
		//供应热门
		$c['hot'] = 1;
		$c['infotype'] = 1;
		$saleHot = $this->getList($c);
		$this->assign('saleHot',$saleHot);
		
		//最新供应
		$sale = $this->getList(array('infotype' => 1),6);
		$this->assign('sale',$sale);
		
		//求购热门
		$c['hot'] = 1;
		$c['infotype'] = 2;
		$buyHot = $this->getList($c);
		$this->assign('buyHot',$buyHot);
		
		//最新求购
		$r = $this->getList(array('infotype' => 2),6);
		$this->assign('buy',$r);
		
		//热门关注
		$hot = $this->getList(array('hot' =>1),20);
		$this->assign('hot',$hot);
		
		//图片推荐
		$upimg = $this->getList(array('up' => 1,'thumb'=>array('neq','')),5);
		
		$this->assign('upimg',$upimg);
		
		//新奇特
		$xqtHot = $this->getList(array('hot' =>1,'property' => 142),1);
		//echo $this->m->getLastSql();
		$this->assign('xqtHot',$xqtHot);
		$xqt = $this->getList(array('property' => 142),8);
		$this->assign('xqt',$xqt);
		
		//特价产品
		$tejHot = $this->getList(array('hot' =>1,'property' => 143),1);
		$this->assign('tejHot',$tejHot);
		$tej = $this->getList(array('property' => 143),8);
		$this->assign('tej',$tej);
		
		//紧急求购
		$jjqgHot = $this->getList(array('hot' =>1,'property' => 146),1);
		$this->assign('jjqgHot',$jjqgHot);
		$jjqg = $this->getList(array('property' => 146),8);
		$this->assign('jjqg',$jjqg);
		
		//常期求购
		$cqqgHot = $this->getList(array('hot' =>1,'property' => 145),1);
		$this->assign('cqqgHot',$cqqgHot);
		$cqqg = $this->getList(array('property' => 145),8);
		$this->assign('cqqg',$cqqg);
		
		//精选推荐
		$jxtj = $this->getList(array('up' => 1,'thumb'=>array('neq','')),4);
		//echo $this->m->getLastSql();
		//ri($jxtj);
		$this->assign('jxtj',$jxtj);
		
		$r = $this->getCategoryList();
		$this->assign('category',$r);
		$pageTitle = "美容化妆品供应,求购,采购,美容美体化妆瘦身产品_".C('SITE_TITLE');
		$this->assign('pageTitle',$pageTitle);
		$this->display();
		//dump($r);
		
	}
	
	function lists(){
		/*$infotype = $_REQUEST['infotype'];
		$cateID = $_REQUEST['cateID'];
		$r = $this->getList(infotype,$cateID);
		var_dump($r);
		$this->assign('list',$r);
		$this->display();*/
		//echo $this->c->getTitle($_REQUEST['secondtype']);
		//dump($_SERVER);
		if($_REQUEST['infotype'] == 1){
			$infotype = '供应产品';
		}else{
			$infotype = "求购产品";
		}
		$this->assign('infotype',$infotype);
		$firsttype = $this->c->getTitle($_REQUEST['firsttype']);
		$this->assign('firsttype',$firsttype);
		$secondtype = $this->c->getTitle($_REQUEST['secondtype']);
		$this->assign('secondtype',$secondtype);
		//列表过滤器，生成查询Map对象
		$map = $this->_search ();
		if (method_exists ( $this, '_filter' )) {
			$this->_filter ( $map );
		}
		if($_REQUEST['secondtype']){
			$map['secondtype'] = array('like',"%{$_REQUEST['secondtype']}%");
		}
		$name=$this->getActionName();
		$model = D ($name);
		if (! empty ( $model )) {
			$this->_list ( $model, $map );
		}
		
		$r = $this->getCategoryList();
		$this->assign('category',$r);
		
		$pageTitle = $firsttype."_".$secondtype."_".C('SITE_TITLE');
		$this->assign('pageTitle',$pageTitle);
		$this->display ();
		return;
		
	}
	
	function show(){
		$id = $_GET['id'];
		$r = $this->m->find($id);
		$arr['infotype'] = $r['infotype'];
		//$arr['firsttype'] = $r['firsttype'];
		
		if($r['infotype'] == 1){
			$r['infotype'] = '供应产品';
		}else{
			$r['infotype'] = "求购产品";
		}
		
		$r['firsttype'] = $this->c->getTitle($r['firsttype']);
		$r['secondtype'] = $this->c->getTitle($r['secondtype']);
		$e = D("Enum");
		//echo $r['property'];
		$r['property'] = $e->getTitle($r['property']);
		$r['period'] = $e->getTitle($r['period']);
		$r['content'] = strToHtml($r['content']);
		
		//得到大图
		$tid = $r['id'];
		$f = M('File');
		$img = $f->where("type='Supply' and tid = $tid")->find();
		//dump($img);
		//echo $r['thumb'];
		$r['img'] = $img['imgurl'];
		$this->assign('vo',$r);
		$infouid = $r['uid'];
		$this->assign('infouid',$infouid);
		
		
		$company = 
		//标题
		$pageTitle = $r['title'].'_'.C('SITE_TITLE').'供求信息';
		$this->assign('pageTitle',$pageTitle);
		
		//$filename = "show_".$r['id'];
		//$arr['top'] =1;
		
		$r = $this->getList(array_merge($arr,array('top' => 1)),10);
		$this->assign('top',$r);
		
		$r = $this->getList(array_merge($arr,array('up' => 1)),10);
		$this->assign('up',$r);
		
		$r = $this->getList(array_merge($arr,array('hot' => 1)),10);
		$this->assign('hot',$r);
		
		//联系方式
		//dump($r['uid']);
		
		//提问会员信息
		$user = D('user');
		//dump($user);
		$r = $user->getUserInfo();
		//dump($r);
		$this->assign('u',$r);
		$this->display();
		//$this->buildHtml($filename,"./supply/");
		
	}
	
	function viewcount(){
		$id = $_GET['id'];
		echo 'document.write("'.$this->m->where("id=$id")->getField('viewcount').'")';
		$this->m->setInc('viewcount',"id = $id");
		exit;
	}
	
	//过滤查询字段
	function _filter(&$map){
		$map['title'] = array('like',"%".$_POST['name']."%");
	}
	
	protected function replacePublic($r){
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
		
		if(!$r['uid']){
			$r['uid'] = $this->u['uid'];
		}
		return $r;
	}
	
	function add(){
		$p = A("Public");
		//$p->chk($p);
		$r = $this->replacePublic(array());
		$r['action'] = "insert";
		$this->assign("vo",$r);
		$this->display("add");
	}
	
	function insert(){
		//ri(filterHtml($_POST['content']));
		//import("ORG.Util.Input");
		
		//echo Input::deleteHtmlTags($_POST['content']);exit;
		if(false !== $this->m->insert()){
			//echo $this->m->getLastSql();exit;
			redirect('/'.strtolower($this->getActionName()).'/ulist');
		}else{
			$this->error("出错");
		}
	}
	
	//编辑页面
	function edit($id){
		$id = $_GET['id'];
		if($id){
			$this->replacePublic();
			$r = $this->m->read($id);
			$r = $this->replacePublic($r);
			$r['fhash'] = urlencode(s_encrypt($r['thumb']));
			$r['action'] = "update";
			$r['content'] = deFilterStr($r['content']);
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
			//echo $this->m->getLastSql();
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
	
	protected function getList($condition = array(),$num = 1){
		if($num === 1){
			//
			return $this->m->where($condition)->order('ctime desc')->find();
		}
		return $this->m->where($condition)->order('ctime desc')->limit($num)->select();
	}
	
	protected function getSpecial($infotype = '',$property = 'up'){
		$condition['hot'] = 1;
		$condition['infotype'] = $infotype;
		$saleHot = $this->m->where($condition)->find();
	}
	
	/**
	 * 得到右侧分类列表
	 */
	protected function getCategoryList(){
		$r = $this->c->getAll();
		$arr = array();
		foreach($r as $k => $v){
			if($v['parentid'] == 16){
				$arr[$k]['self'] =$v;
				foreach($r as $kc => $vc){
					if($vc['parentid'] == $v['id']){
						$arr[$k]['child'][] = $vc; 
					}
				}
			}
		}
		return $arr;
	}
	
	/**
	 * 得到右侧省列表
	 */
	protected function getCityList(){
		
	}
	
	/*function ulist(){
		$r = $this->m->where("uid = {$this->u['uid']}")->order('ctime desc')->select();
		$this->assign('list',$r);
		$this->display();
	}*/
	
	/*
	 用户列表
	 */
	function ulist() {
		//列表过滤器，生成查询Map对象
		$map = $this->_search ();
		if (method_exists ( $this, '_filter' )) {
			$this->_filter ( $map );
		}
		//echo "ss".$this->u['uid'];exit;
		$map['uid'] = $this->u['uid'];
		$name=$this->getActionName();
		$model = D ($name);
		if (! empty ( $model )) {
			$this->_list ( $model, $map );
		}
		$this->display ();
		return;
	}
	
}
?>