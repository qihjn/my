<?php
class PhotoModel extends CommonModel {
	//protected $trueTableName = 'n_job'; 
	protected $baseSql = "SELECT *,p.id as pid FROM t_photo AS p,t_comment as c";
	protected $baseWhere = " c.f_game_id = p.gid and c.f_comment_id = p.topicid and c.f_hide=0 and p.hide=0";
	protected $baseOrder = "p.flower";
	
	public function __construct(){
		parent::__construct();
	}
	
	public $_auto		=	array(
		array('ctime','time',self::MODEL_BOTH,'function'),
		
	);
	public $baseOption = array("status"=>1);
	
	public function initLink(){
		//parent::__construct();
		$this->baseOption['join'] = "u_unit as c on c.uid=j.uid";
		$this->baseOption['field'] = "*, j.title as jtitle,c.title as ctitle";
		$this->baseOption['map'] = array();
		$table = $this->getTableName();
		$this->baseOption['table'] = "$table as j";
	}

	
	//添加，修改
	public function insert(){
		//ri($_POST);
		$_POST['age'] = $_POST['startage'].'-'.$_POST['endage'];
		
		//插入
		if(!$_POST[$this->getPk()]){
			if($vo = $this->create()) {
				$id = $this->add();
				//echo $this->getLastSql();exit;
			}
			if($id){
				$u = D('Member');
				$f = M("File");
				$tid = $_POST['tid']; //个人形象
				$tempid = $_POST['tempid']; //个人风采
				$f->where("tid = '$tid' or tid = '$tempid'")->setField('tid',$id);
				
				return $id;
				
			}
		}else{ //更新
			if($vo = $this->create()) {
				return $vo[$this->getPk()];
			}
		}
	}
	

	
	/**
	 * 得到多条数据，一般用于首页及左右则的无分页列表
	 * @param $id 主键
	 */
	public function getList($num){
		$sql = "select * from t_photo as p, flash_flash as f, my_21mmm_cn.uchome_member  as m
				where p.gid=f.id and p.uid=m.uid";
		$list	=	$this->order('id desc')->limit(12)->select(); //图片路径不为空 并且评论是审核通过的，是指定分类下的
		$this->standardData($list);
		return $list;
	}
	
	/**
	 * 得到分页列表
	 * @param array $list 
	 */
	public function getListPage($arr){
		//$arr = array(当前页码，每页记录数，总记录数，);
		//列表过滤器，生成查询Map对象
		$map = $this->_search ();
		if (method_exists ( $this, '_filter' )) {
			$this->_filter ( $map );
		}
		$name=$this->getModelName();
		$model = D ($name);
		if (! empty ( $model )) {
			$sql = "select * from t_photo as p, flash_flash as f, my_21mmm_cn.uchome_member  as m
				where p.gid=f.id and p.uid=m.uid";
			$r = $this->_list ( $model, $map );
			foreach($r['list'] as $k => $v){
				$r['list'][$k]['filepath'] = C('COMMENT_IMG_URL').$v['filepath'];
				$r['list'][$k]['gameurl'] = C('GAME_URL').'一级标签id/'.$v['gid'];
			}
			return $r;
		}
		/*$this->display ();
		return;
		
		return array(
			"list" => $list,
			"page" => $page,
		);*/
	}
	
	
	/**
	 * 得到一条记录
	 * @param $id 主键
	 */
	public function getOne($id){
		if(!is_numeric($id)) return;
		$r = $this->find($id);
		standardData($list);
		return $r;
	}
	
	/**
	 * 标准化数据,供getList,getOne调用
	 * @param array $list 
	 */
	public function standardData($list){
		//if(one)
		//标准化单条数据 $arr
		
		//标准化多条数据$arr[0...n]
		foreach($list as $k => $v){
			
			$list[$k]['thumb'] = C('COMMENT_IMG_URL').$this->getThumb($v['filepath']);
			$list[$k]['filepath'] = C('COMMENT_IMG_URL').$v['filepath'];
			$list[$k]['gameurl'] = C('GAME_URL')."{$v['sortid']}/{$v['gid']}/";
			//$list[$k]['title'] = $v['title'];
			$list[$k]['spaceurl'] = C('SPACE_URL').'?'.$v['f_uid'];
			$list[$k]['time'] = $v['f_time'];
			$list[$k]['totalIndex'] = ++$this->totalIndex;
			//$list[$k]['flower'] = $v['gid'];
		}
		return $list;
	}
	
	/**
	 * 手动连接查询得到列表
	 * @param array $list 
	 */
	public function listLink($map,$num){
		
		$this->initLink();
		if(is_array($map)){
			$this->baseOption['map'] = array_merge($this->baseOption['map'],$map);
		}
		//dump($map);
		$this->baseOption['num'] = $num;
		return $this->link($this->baseOption);
	}
	
	/**
	 * 通过sql查询得到列表及分页 
	 * @param array $para
	 * 
	 * example:
	 * $para['sql'] = "SELECT * FROM t_photo AS p,t_comment as c, flash_flash AS f ";
	 * $para['where'] = "p.gid = f.id and c.f_game_id = p.gid and c.f_comment_id = p.topicid";
	 */
	public function getListPageBySql($para){
		extract($para);
		$tag = $_REQUEST['tag'];
		$r = $this->getGameIds($tag);
		$gids = $r['ids'];
		$glist = $r['r'];
		if($pid = intval($_GET['pid'])){
			 $where .= " and p.id=$pid";
		}
		$where .= " and gid in ($gids)";
		
		$where = $this->whereToStr($this->baseWhere.$where);
		$sql = $this->baseSql;
		$count = $this->getCount($sql.$where);
		//echo "countSql:$count <br />";
		if($count < 1) return;
		
		
		//分页
		import ( "ORG.Util.Page" ); 
		if (! empty ( $_REQUEST ['listRows'] )) {
			$listRows = $_REQUEST ['listRows'];
		} else {
			$listRows = $pagesize ? $pagesize : 12;
		}
		//echo $listRows;
		$p = new Page ( $count, $listRows );
		
		$order = $this->getOrder('p.flower');
		$limit = "  limit {$p->firstRow}  , {$p->listRows}";
		$voList = $this->query($sql.$where.$order.$limit); //分页查询数据
		//var_dump($voList);
		$this->mergeGameInfo($glist, $voList);
		
		//分页跳转的时候保证查询条件
		foreach ( $map as $key => $val ) {
			if (! is_array ( $val )) {
				$p->parameter .= "$key=" . urlencode ( $val ) . "&";
			}
		}
		
		$p->setConfig('theme','%upPage%  %linkPage% %downPage% ');
		$page = $p->show ();//分页显示
		//$totalPage = $p->getTotalPage();
		
		//列表排序显示
		$sortImg = $sort; //排序图标
		$sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列'; //排序提示
		$sort = $sort == 'desc' ? 1 : 0; //排序方式
	
		
		$arr = array(
			"list" => $voList,
			"page" => $page,
			"sort" => $sort,
			"order" => $order,
			"sortImg" => $sortImg,
			"sortType" => $sortType,
			"totalPage" => ceil($count/$listRows),
		);
		Cookie::set ( '_currentUrl_', __SELF__ );
		
		return $arr;
	}

	
	public function getListByUid($id,$num){
		return $this->getList(array("uid"=>$id),0);
	}
	
	public function getCompanyInfo($jid){
		$sql = "SELECT j.id as jid,j.title as jtitle,c.nid as cid,c.title as ctitle,c.uid,contacter FROM n_job as j left join u_unit as c on j.uid=c.uid where j.id = $jid";
		return $this->queryOne($sql);
	}
	
	/**
	 * 得到信息的所有者
	 * @param $id 主键
	 */
	public function getOwner($id,$field="uid"){
		return  $this->where($this->getPk()."= $id")->getField($field);//
		
	}
	
	//排序
	public function getOrder($sortBy = ''){
		//排序字段 默认为主键名
		if (isset ( $_REQUEST ['_order'] )) {
			$order = $_REQUEST ['_order'];
		} else {
			$order = ! empty ( $sortBy ) ? $sortBy : $this->getPk ();
		}
		//排序方式默认按照倒序排列
		//接受 sost参数 0 表示倒序 非0都 表示正序
		if (isset ( $_REQUEST ['_sort'] )) {
			$sort = $_REQUEST ['_sort'] ? 'asc' : 'desc';
		} else {
			$sort = $asc ? 'asc' : 'desc';
		}
		
		return " order by " . $order . " " . $sort;
	}
	
	/**
	 * 得到总记录数
	 * @param $id 主键
	 */
	public function getCount($sql){
		$sqlCount = getCountSql($sql);
		$r = $this->query($sqlCount);
		return $r[0]['count'];
	}

	//数组转成查询条件
	public function whereToStr($map){
		if(is_array($map)){
			$where = ' where 1';
			foreach($map as $k => $v){
				$where .= " and $k = $v";
			}
			return $where;
		}
		return ' where '.$map;
	}
	
	/**
	 * 搜索条件过滤
	 * @param $id 主键
	 */
	protected function _search($name = '') {
		//生成查询条件
		if (empty ( $name )) {
			$name = $this->getModelName();
		}
		//$name=$this->getModelName();
		$model = D ( $name );
		$map = array ();
		foreach ( $model->getDbFields () as $key => $val ) {
			if (isset ( $_REQUEST [$val] ) && $_REQUEST [$val] != '') {
				$map [$val] = $_REQUEST [$val];
			}
		}
		return $map;
	}

	
	/**
	 * 得到某用户的所有鲜花数
	 * @param int $uid 用户id
	 */
	public function getThumb($path){
		return preg_replace("/(.+)\.(jpg|png|gif|jpeg)/", '$1'.'_s.'.'$2', $path);
	}
	
	
	
}
?>