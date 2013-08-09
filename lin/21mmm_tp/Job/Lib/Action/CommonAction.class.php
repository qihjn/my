<?php
class CommonAction extends Action {
	var $m = null;
	public function __construct(){
		parent::__construct();
		$this->m = D($this->getActionName()); //实例化model
		
	}
	
	public function msg($result,$text = '',$url=''){
		if(false !== $result){
			$this->success($text."成功");
		}else{
			$this->error($text."失败");
		}
	}
		function _initialize() {
		// 用户权限检查
		if (C ( 'USER_AUTH_ON' ) && !in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE')))) {
			import ( 'ORG.Util.RBAC' );
			if (! RBAC::AccessDecision ()) {
				//检查认证识别号
				if (! $_SESSION [C ( 'USER_AUTH_KEY' )]) {
					//跳转到认证网关
					redirect ( PHP_FILE . C ( 'USER_AUTH_GATEWAY' ) );
				}
				// 没有权限 抛出错误
				if (C ( 'RBAC_ERROR_PAGE' )) {
					// 定义权限错误页面
					redirect ( C ( 'RBAC_ERROR_PAGE' ) );
				} else {
					if (C ( 'GUEST_AUTH_ON' )) {
						$this->assign ( 'jumpUrl', PHP_FILE . C ( 'USER_AUTH_GATEWAY' ) );
					}
					// 提示错误信息
					$this->error ( L ( '_VALID_ACCESS_' ) );
				}
			}
		}
	}
	
	public function index() {
		//列表过滤器，生成查询Map对象
		$map = $this->_search ();
		if (method_exists ( $this, '_filter' )) {
			$this->_filter ( $map );
		}
		$name=$this->getActionName();
		$model = D ($name);
		if (! empty ( $model )) {
			$this->_list ( $model, $map );
		}
		$this->display ();
		return;
	}
	
	//有连接表显示列表
	public function indexLink($option=array()) {
		//列表过滤器，生成查询Map对象
		$map = $this->_search ();
		if (method_exists ( $this, '_filter' )) {
			$this->_filter ( $map );
		}
		$name=$this->getActionName();
		$model = D ($name);
		if (! empty ( $model )) {
			if($option['join']){
				$this->_listLink ( $model, $map,$option );
			}else{
				$this->_list($model,$map);
			}
		}
		$this->display ();
		return;
	}
	
	/**
     +----------------------------------------------------------
	 * 取得操作成功后要返回的URL地址
	 * 默认返回当前模块的默认操作
	 * 可以在action控制器中重载
     +----------------------------------------------------------
	 * @access public
     +----------------------------------------------------------
	 * @return string
     +----------------------------------------------------------
	 * @throws ThinkExecption
     +----------------------------------------------------------
	 */
	function getReturnUrl() {
		return __URL__ . '?' . C ( 'VAR_MODULE' ) . '=' . MODULE_NAME . '&' . C ( 'VAR_ACTION' ) . '=' . C ( 'DEFAULT_ACTION' );
	}

	/**
     +----------------------------------------------------------
	 * 根据表单生成查询条件
	 * 进行列表过滤
     +----------------------------------------------------------
	 * @access protected
     +----------------------------------------------------------
	 * @param string $name 数据对象名称
     +----------------------------------------------------------
	 * @return HashMap
     +----------------------------------------------------------
	 * @throws ThinkExecption
     +----------------------------------------------------------
	 */
	protected function _search($name = '') {
		//生成查询条件
		if (empty ( $name )) {
			$name = $this->getActionName();
		}
		$name=$this->getActionName();
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
     +----------------------------------------------------------
	 * 根据表单生成查询条件
	 * 进行列表过滤
     +----------------------------------------------------------
	 * @access protected
     +----------------------------------------------------------
	 * @param Model $model 数据对象
	 * @param HashMap $map 过滤条件
	 * @param string $sortBy 排序
	 * @param boolean $asc 是否正序
     +----------------------------------------------------------
	 * @return void
     +----------------------------------------------------------
	 * @throws ThinkExecption
     +----------------------------------------------------------
	 */
	protected function _list($model, $map, $sortBy = '', $asc = false) {
		//排序字段 默认为主键名
		if (isset ( $_REQUEST ['_order'] )) {
			$order = $_REQUEST ['_order'];
		} else {
			$order = ! empty ( $sortBy ) ? $sortBy : $model->getPk ();
		}
		//排序方式默认按照倒序排列
		//接受 sost参数 0 表示倒序 非0都 表示正序
		//$setOrder = setOrder(array(array('viewCount', 'a.view_count'), 'a.id'), $orderBy, $orderType, 'a');
		if (isset ( $_REQUEST ['_sort'] )) {
			$sort = $_REQUEST ['_sort'] ? 'asc' : 'desc';
		} else {
			$sort = $asc ? 'asc' : 'desc';
		}
		//取得满足条件的记录数
		$pk = $model->getPk();
		$count = $model->where ( $map )->count ( $pk );
		if ($count > 0) {
			import ( "ORG.Util.XPage" );
			//创建分页对象
			if (! empty ( $_REQUEST ['listRows'] )) {
				$listRows = $_REQUEST ['listRows'];
			} else {
				$listRows = '';
			}
			$p = new XPage ( $count, $listRows );
			//echo C('PAGE_STYLE');exit;
			$p->style = C('PAGE_STYLE');//设置风格
			//分页查询数据

			$voList = $model->where($map)->order( "`" . $order . "` " . $sort)->limit($p->firstRow . ',' . $p->listRows)->findAll ( );
			//echo $model->getlastsql();
			//分页跳转的时候保证查询条件
			foreach ( $map as $key => $val ) {
				if (! is_array ( $val )) {
					$p->parameter .= "$key=" . urlencode ( $val ) . "&";
				}
			}
			//分页显示
			$page = $p->show ();
			//列表排序显示
			$sortImg = $sort; //排序图标
			$sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列'; //排序提示
			$sort = $sort == 'desc' ? 1 : 0; //排序方式
			//模板赋值显示
			$this->assign ( 'list', $voList );
			$this->assign ( 'sort', $sort );
			$this->assign ( 'order', $order );
			$this->assign ( 'sortImg', $sortImg );
			$this->assign ( 'sortType', $sortAlt );
			$this->assign ( "page", $page );
		}
		Cookie::set ( '_currentUrl_', __SELF__ );
		return;
	}

	/**
     +----------------------------------------------------------
	 * 连接查询列表显示
	 * 进行列表过滤
     +----------------------------------------------------------
	 * @access protected
     +----------------------------------------------------------
	 * @param Model $model 数据对象
	 * @param HashMap $map 过滤条件
	 * @param string $sortBy 排序
	 * @param boolean $asc 是否正序
     +----------------------------------------------------------
	 * @return void
     +----------------------------------------------------------
	 * @throws ThinkExecption
     +----------------------------------------------------------
	 */
	protected function _listLink($model,$map,$option=array(),  $sortBy = '', $asc = false) {
		
		extract($option);
		
		$field || $field = "*";
		$table || $table = $model->getTableName();
		//$table = "{$this->trueTableName} j";
		//$r = $this->table($table)->field($field)->join($join)->where($map)->count();
		
		//dump($r);
		//return $r;
		
		//排序字段 默认为主键名
		if (isset ( $_REQUEST ['_order'] )) {
			$order = $_REQUEST ['_order'];
		} else {
			$order = ! empty ( $sortBy ) ? $sortBy : $model->getPk ();
		}
		//排序方式默认按照倒序排列
		//接受 sost参数 0 表示倒序 非0都 表示正序
		//$setOrder = setOrder(array(array('viewCount', 'a.view_count'), 'a.id'), $orderBy, $orderType, 'a');
		if (isset ( $_REQUEST ['_sort'] )) {
			$sort = $_REQUEST ['_sort'] ? 'asc' : 'desc';
		} else {
			$sort = $asc ? 'asc' : 'desc';
		}
		
		//取得满足条件的记录数
		if($sql){
			$sqlCount = getCountSql($sql);
			//处理map查询条件
			$count = $db->query($sqlCount);
		}else{
			$pk = $model->getPk();
			$count = $model->table($table)->field($field)->join($join)->where($map)->count( $pk );
		}
		if ($count > 0) {
			import ( "ORG.Util.XPage" );
			//创建分页对象
			if (! empty ( $_REQUEST ['listRows'] )) {
				$listRows = $_REQUEST ['listRows'];
			} else {
				$listRows = '';
			}
			$p = new XPage ( $count, $listRows );
			//echo C('PAGE_STYLE');exit;
			//$s =  rand(1,25);echo $s;
			$p->style = C('PAGE_STYLE');//设置风格
			//分页查询数据
			if ($sql) {
				//处理map查询条件
				$voList = $model->query(sql. "`" . $order . "` " . $sort.$p->firstRow . ',' . $p->listRows);
			}else{
				$voList = $model->table($table)->field($field)->join($join)->where($map)->order( "`" . $order . "` " . $sort)->limit($p->firstRow . ',' . $p->listRows)->findAll ( );
			}
			//echo $model->getlastsql();
			
			
			//高亮关键字
			if(C('highLightKeyword') && $_REQUEST['keyword']){
				$keyword = $_REQUEST['keyword'];
				foreach($voList as $k => $v){
					$voList[$k]['jtitle'] = hightLightKeyword($v['jtitle'],$keyword);
					$voList[$k]['request'] = hightLightKeyword($v['request'],$keyword);
					$voList[$k]['ctitle'] = hightLightKeyword($v['ctitle'],$keyword);
				}
			}
			//分页跳转的时候保证查询条件
			foreach ( $map as $key => $val ) {
				if (! is_array ( $val )) {
					$p->parameter .= "$key=" . urlencode ( $val ) . "&";
				}
			}
			//分页显示
			$page = $p->show ();
			//列表排序显示
			$sortImg = $sort; //排序图标
			$sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列'; //排序提示
			$sort = $sort == 'desc' ? 1 : 0; //排序方式
			//模板赋值显示
			$this->assign ( 'list', $voList );
			$this->assign ( 'sort', $sort );
			$this->assign ( 'order', $order );
			$this->assign ( 'sortImg', $sortImg );
			$this->assign ( 'sortType', $sortAlt );
			$this->assign ( "page", $page );
		}
		Cookie::set ( '_currentUrl_', __SELF__ );
		return;
	}
	
	function advancedList($model,$map,$join,$field="*",$table="",  $sortBy = '', $asc = false) {
		
		$option['join'] = $join; //有查询条件，开启连接查询
		
		$field || $field = "*";
		$table || $table = $model->getTableName();
		//$table = "{$this->trueTableName} j";
		//$r = $this->table($table)->field($field)->join($join)->where($map)->count();
		
		//dump($r);
		//return $r;
		
		//排序字段 默认为主键名
		if (isset ( $_REQUEST ['_order'] )) {
			$order = $_REQUEST ['_order'];
		} else {
			$order = ! empty ( $sortBy ) ? $sortBy : $model->getPk ();
		}
		//排序方式默认按照倒序排列
		//接受 sost参数 0 表示倒序 非0都 表示正序
		//$setOrder = setOrder(array(array('viewCount', 'a.view_count'), 'a.id'), $orderBy, $orderType, 'a');
		if (isset ( $_REQUEST ['_sort'] )) {
			$sort = $_REQUEST ['_sort'] ? 'asc' : 'desc';
		} else {
			$sort = $asc ? 'asc' : 'desc';
		}
		
		//取得满足条件的记录数
		$pk = $model->getPk();
		
		if ($option['num'] ){ //限制取几条记录，直接返回指定条记录
			if($sql){
				$voList = $model->query($sql);	
			}elseif($option['join']){
				$voList = $model->table($table)->field($field)->join($join)->where($map)->order( "`" . $order . "` " . $sort)->limit($p->firstRow . ',' . $p->listRows)->findAll ( );
			}else{
				$voList = $model->where($map)->order( "`" . $order . "` " . $sort)->limit($p->firstRow . ',' . $p->listRows)->findAll ( );
			}
			return $voList;
		}else{ //分页
		
			if($sql){
				$count = $count = $model->query(getCountSql($sql));
				$count = $count[0];
			}elseif($option['join']){
				$count = $model->table($table)->field($field)->join($join)->where($map)->count( $pk );
				
			}else{
				$count = $model->where ( $map )->count ( $pk );
			}
			if($count<0) return;
			import ( "ORG.Util.XPage" );
			//创建分页对象
			if (! empty ( $_REQUEST ['listRows'] )) {
				$listRows = $_REQUEST ['listRows'];
			} else {
				$listRows = '';
			}
			$p = new XPage ( $count, $listRows );
			//echo C('PAGE_STYLE');exit;
			//$s =  rand(1,25);echo $s;
			$p->style = C('PAGE_STYLE');//设置风格
			//分页查询数据

			if($sql){
				$voList = $model->query($sql);	
			}elseif($option['join']){
				$voList = $model->table($table)->field($field)->join($join)->where($map)->order( "`" . $order . "` " . $sort)->limit($p->firstRow . ',' . $p->listRows)->findAll ( );
			}else{
				$voList = $model->where($map)->order( "`" . $order . "` " . $sort)->limit($p->firstRow . ',' . $p->listRows)->findAll ( );
			}
			
			//高亮关键字
			if(C('highLightKeyword') && $_REQUEST['keyword']){
				$keyword = $_REQUEST['keyword'];
				foreach($voList as $k => $v){
					$voList[$k]['jtitle'] = hightLightKeyword($v['jtitle'],$keyword);
					$voList[$k]['request'] = hightLightKeyword($v['request'],$keyword);
					$voList[$k]['ctitle'] = hightLightKeyword($v['ctitle'],$keyword);
				}
			}
			//分页跳转的时候保证查询条件
			foreach ( $map as $key => $val ) {
				if (! is_array ( $val )) {
					$p->parameter .= "$key=" . urlencode ( $val ) . "&";
				}
			}
			//分页显示
			$page = $p->show ();
			//列表排序显示
			$sortImg = $sort; //排序图标
			$sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列'; //排序提示
			$sort = $sort == 'desc' ? 1 : 0; //排序方式
			//模板赋值显示
			$this->assign ( 'list', $voList );
			$this->assign ( 'sort', $sort );
			$this->assign ( 'order', $order );
			$this->assign ( 'sortImg', $sortImg );
			$this->assign ( 'sortType', $sortAlt );
			$this->assign ( "page", $page );
		}
		Cookie::set ( '_currentUrl_', __SELF__ );
		return;
	}
	
	function insert() {
		//B('FilterString');
		$name=$this->getActionName();
		$model = D ($name);
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}
		//保存当前数据对象
		$list=$model->add ();
		//echo $model->getLastSql();exit;
		if ($list!==false) { //保存成功
			$this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
			$this->success ('新增成功!');
		} else {
			//失败提示
			$this->error ('新增失败!');
		}
	}

	public function add() {
		$this->display ();
	}

	function read() {
		$this->edit ();
	}

	function edit() {
		$name=$this->getActionName();
		$model = M ( $name );
		$id = $_REQUEST [$model->getPk ()];
		$vo = $model->getById ( $id );
		$this->assign ( 'vo', $vo );
		$this->display ();
	}

	function update() {
		//B('FilterString');
		$name=$this->getActionName();
		$model = D ( $name );
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}
		// 更新数据
		$list=$model->save ();
		if (false !== $list) {
			//成功提示
			$this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
			$this->success ('编辑成功!');
		} else {
			//错误提示
			$this->error ('编辑失败!');
		}
	}
	/**
     +----------------------------------------------------------
	 * 默认删除操作
     +----------------------------------------------------------
	 * @access public
     +----------------------------------------------------------
	 * @return string
     +----------------------------------------------------------
	 * @throws ThinkExecption
     +----------------------------------------------------------
	 */
	public function delete() {
		//删除指定记录
		$name=$this->getActionName();
		$model = M ($name);
		if (! empty ( $model )) {
			$pk = $model->getPk ();
			$id = $_REQUEST [$pk];
			if (isset ( $id )) {
				$condition = array ($pk => array ('in', explode ( ',', $id ) ) );
				$list=$model->where ( $condition )->setField ( 'status', - 1 );
				if ($list!==false) {
					$this->success ('删除成功！' );
				} else {
					$this->error ('删除失败！');
				}
			} else {
				$this->error ( '非法操作' );
			}
		}
	}
	public function foreverdelete() {
		//删除指定记录
		$name=$this->getActionName();
		$model = D ($name);
		if (! empty ( $model )) {
			$pk = $model->getPk ();
			$id = $_REQUEST [$pk];
			if (isset ( $id )) {
				$condition = array ($pk => array ('in', explode ( ',', $id ) ) );
				if (false !== $model->where ( $condition )->delete ()) {
					//echo $model->getlastsql();
					$this->success ('删除成功！');
				} else {
					$this->error ('删除失败！');
				}
			} else {
				$this->error ( '非法操作' );
			}
		}
		$this->forward ();
	}

	public function clear() {
		//删除指定记录
		$name=$this->getActionName();
		$model = D ($name);
		if (! empty ( $model )) {
			if (false !== $model->where ( 'status=1' )->delete ()) {
				$this->assign ( "jumpUrl", $this->getReturnUrl () );
				$this->success ( L ( '_DELETE_SUCCESS_' ) );
			} else {
				$this->error ( L ( '_DELETE_FAIL_' ) );
			}
		}
		$this->forward ();
	}
	/**
     +----------------------------------------------------------
	 * 默认禁用操作
	 *
     +----------------------------------------------------------
	 * @access public
     +----------------------------------------------------------
	 * @return string
     +----------------------------------------------------------
	 * @throws FcsException
     +----------------------------------------------------------
	 */
	public function forbid() {
		$name=$this->getActionName();
		$model = D ($name);
		$pk = $model->getPk ();
		$id = $_REQUEST [$pk];
		$condition = array ($pk => array ('in', $id ) );
		$list=$model->forbid ( $condition );
		if ($list!==false) {
			$this->assign ( "jumpUrl", $this->getReturnUrl () );
			$this->success ( '状态禁用成功' );
		} else {
			$this->error  (  '状态禁用失败！' );
		}
	}
	public function checkPass() {
		$name=$this->getActionName();
		$model = D ($name);
		$pk = $model->getPk ();
		$id = $_GET [$pk];
		$condition = array ($pk => array ('in', $id ) );
		if (false !== $model->checkPass( $condition )) {
			$this->assign ( "jumpUrl", $this->getReturnUrl () );
			$this->success ( '状态批准成功！' );
		} else {
			$this->error  (  '状态批准失败！' );
		}
	}

	public function recycle() {
		$name=$this->getActionName();
		$model = D ($name);
		$pk = $model->getPk ();
		$id = $_GET [$pk];
		$condition = array ($pk => array ('in', $id ) );
		if (false !== $model->recycle ( $condition )) {

			$this->assign ( "jumpUrl", $this->getReturnUrl () );
			$this->success ( '状态还原成功！' );

		} else {
			$this->error   (  '状态还原失败！' );
		}
	}

	public function recycleBin() {
		$map = $this->_search ();
		$map ['status'] = - 1;
		$name=$this->getActionName();
		$model = D ($name);
		if (! empty ( $model )) {
			$this->_list ( $model, $map );
		}
		$this->display ();
	}

	/**
     +----------------------------------------------------------
	 * 默认恢复操作
	 *
     +----------------------------------------------------------
	 * @access public
     +----------------------------------------------------------
	 * @return string
     +----------------------------------------------------------
	 * @throws FcsException
     +----------------------------------------------------------
	 */
	function resume() {
		//恢复指定记录
		$name=$this->getActionName();
		$model = D ($name);
		$pk = $model->getPk ();
		$id = $_GET [$pk];
		$condition = array ($pk => array ('in', $id ) );
		if (false !== $model->resume ( $condition )) {
			$this->assign ( "jumpUrl", $this->getReturnUrl () );
			$this->success ( '状态恢复成功！' );
		} else {
			$this->error ( '状态恢复失败！' );
		}
	}


function saveSort() {
		$seqNoList = $_POST ['seqNoList'];
		if (! empty ( $seqNoList )) {
			//更新数据对象
		$name=$this->getActionName();
		$model = D ($name);
			$col = explode ( ',', $seqNoList );
			//启动事务
			$model->startTrans ();
			foreach ( $col as $val ) {
				$val = explode ( ':', $val );
				$model->id = $val [0];
				$model->sort = $val [1];
				$result = $model->save ();
				if (! $result) {
					break;
				}
			}
			//提交事务
			$model->commit ();
			if ($result!==false) {
				//采用普通方式跳转刷新页面
				$this->success ( '更新成功' );
			} else {
				$this->error ( $model->getError () );
			}
		}
	}
	
	protected function msgText($nextModel,$nextModelText,$id){
		$app = __APP__;
		$url = __URL__;
		
		return "发布成功!  <a href='$app/$nextModel/add'>发布{$nextModelText}信息</a> <a href='$url/edit/id/$id'>返回修改信息</a> <a href='$url/'>返回列表</a>";
	}
	
	public function show(){
    	$this->display();
    }
	
}
?>