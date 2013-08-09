<?php
// 用户模型
class ResumeModel extends CommonModel {
	protected $trueTableName = 'u_person'; 
	protected $pk = "pid";
	public $baseOption = array(); //基本查询条件
	public $validBase = array(); //有效简历基本条件
	public $photoBase = array('type'=>'job','utype'=>'person_face','thumb'=>array('neq','')); //个人照片查询基本条件 //若u_person有thumb字段引起冲突可改成'img_base.thumb'=>array('neq','')
	public $mienBase = array('utype'=>'person'); //个人风采查询基本条件
	//protected $_map = array('id'=>'pid');
	//protected $fields = array('_pk'=>'pid');
	/*public $_validate	=	array(
		array('username','/^[a-z]\w{3,}$/i','帐号格式错误'),
		array('password','require','密码必须'),
		array('nickname','require','昵称必须'),
		array('repassword','require','确认密码必须'),
		array('repassword','password','确认密码不一致',self::EXISTS_VAILIDATE,'confirm'),
		array('username','','帐号已经存在',self::EXISTS_VAILIDATE,'unique',self::MODEL_INSERT),
		);

	public $_auto		=	array(
		array('password','pwdHash',self::MODEL_BOTH,'callback'),
		array('create_time','time',self::MODEL_INSERT,'function'),
		array('update_time','time',self::MODEL_UPDATE,'function'),
		);

	protected function pwdHash() {
		if(isset($_POST['password'])) {
			return pwdHash($_POST['password']);
		}else{
			return false;
		}
	}*/
	public function __construct(){
		parent::__construct();
		$this->baseOption['join'] = "img_base on img_base.tid=u_person.pid "; //联合查询，简历连接图片表，公司连接图片表，职位表
		$this->baseOption['map'] = array('status'=>'1','setdefault'=>'1'); 
		$table = $this->getTableName();
		//$this->baseOption['table'] = "$table";
	}
	public function insert(){
		
		if(!$_POST[$this->getPk()]){
			//插入
			//修改post数据
			//ri($_POST);
			if($vo = $this->create()) {
				$id = $this->add();
				//echo $this->getLastSql();exit;
			}
			if($id){
				$f = D("File");
				$tid = $_POST['tid']; //个人形象
				$tempid = $_POST['tempid']; //个人风采
				$f->where("tid = '$tid' or tid = '$tempid'")->setField('tid',$id);
				//echo $f->getLastSql();exit;
				//ri($_POST);
				//$f->where("tid = $tempid")->setField('tid',$id);
				
				//由傻屄pid字段引起的兼容问题
				//$this->where("pid=$id")->setField('id',$id);
				
				return true;
				
			}
		}else{
			//更新
			if($vo = $this->create()) {
				$this->save();
				$id = $vo[$this->getPk()];
				$f = D("File");
				$tid = $_POST['tid']; //个人形象
				$tempid = $_POST['tempid']; //个人风采
				$f->where("tid = '$tid' or tid = '$tempid'")->setField('tid',$id);
				//echo $this->getLastSql();exit;
				return true;
			}
		}
	}

	public function delete() {
		//删除数据
		//删除标志图片
		//删除形象图片
		//删除图片表的数据
	}
	
	/**
	 * 返回默简历
	 */	 
	public function getDefault($uid){
		if(!$uid){
			//$resume = D('Resume');
			$r = $this->where("uid = '$uid' and realname<>'' and setdefault=1")->find(); //$sql="select pid, realname from u_person where uid=$u[id] and realname<>'' and setdefault=1 limit 1";
			if($r){
				return $r;
			}else{
				return L('no_default_resume');
			}
			
			
		}
	}
	
	/**
	 * $this->getOwnInfo($uid)
	 
	public function getResumesByUid($uid){
		
	}
	*/
	
	/**
	 * 得到一条记录
	 * @param $id 主键
	 */
	public function getOne($id){
		if(!is_numeric($id)) return;
			$r = $this->find($id);
			//$u = D('Member');
			//$r['place'] = $u->where("id = {$r['uid']}")->getField('place');
			$a = explode('-',$r['age']);
			$r['startage'] = $a[0];
			$r['endage'] = $a[1];
			$p = explode('/',$r['workplace']);
			//dump($r);
			$r['province'] = $p[0];
			$r['city'] = $p[1];
			//dump($r);
			return $r;
	}
	
	/**
	 * 得到照片简历人才
	 * 为与原表兼容，所以要连接查询
	 * 不能分页，分页需调用action里的_listLink()方法，貌似_listLink里也包含了该方法的主要语句
	 * @param $map 必须为字符串 
	 * @param $num
	 */
	public function getPhotoList($map='',$num = 5){
		//$this->getList(array_merge($w,array('status'=>1,'thumb'=>array("neq",""))),10); //由于原来表里没有thumb,故不可如此使用
		//SELECT * FROM `u_person` left join img_base on img_base.tid=u_person.pid where  img_base.type='job' and img_base.utype='person_face'
		
		if(is_array($map)){
			$this->baseOption['map'] = array_merge($this->baseOption['map'],$map,$this->photoBase);
		}/*else{
			foreach($map as $k => $v){
				$option['map'] .= " and $k = '$v'";
			}
		}*/
		$this->baseOption['num'] = $num;
		return $this->link($this->baseOption);
		//return $r;
		
		
	}
	
	/**
	 *通过区域，类别来 匹配人才
	 *
	 * @param 省 $province 
	 * @param 类别 $cate
	 * @param 数量 $num
	 */
	function match($province, $cate = '',$num = 10){
		//匹配省
		if($province && $province != '中国' && $province != '全国'){
			$province = explode(',',$province);
			foreach ($province as $k => $v){
				/*$temp = explode('/',$v);
				if($temp[0]){
					$pwhere .= " or local like '%$temp[0]%'"; //匹配同省的
				}*/
				$local[] = array('like',"%$v%");
			}
			$local[] = 'or';
		}
		
		if($cate && $cate != -1){
			if(substr($cate,-1,1) == ','){
				$cate = substr($cate,0,-1);
			}
			$e = D('Enum');
			$cate = explode(",",$cate);
			foreach($cate as $k => $v){
				$all .= "$v,";
				$childs = $e->getChilds($v);
				if($childs)
					$all .= "$childs,";
			}
			//if(substr($cate,-1,1) == ','){
				$cate = substr($all,0,-1);
			//}
		}
		
		return $this->getList(array("local"=>$local,"job_request"=>array("in",$cate)),$num);
	}
	
	public function getImg($id){
		//$r['logo'] = $this->m->getLogo($id);//logo
    		$f = D('File');
    		return $f->where(array_merge(array("tid"=>$id),$this->photoBase))->getField('thumb');
    		
	}
	
	public function couter($id){
		$this->setInc('brows_num',array('pid'=>$id));
	}
}
?>