<?php
// 用户模型
class CompanyModel extends CommonModel {
	protected $trueTableName = 'u_unit'; 
	public $_auto		=	array(
		array('ctime','time',self::MODEL_BOTH,'function'),
		
		);
	//protected $pk  = 'id'; //sb nid引起
	//protected $_map = array('id'=>'nid');
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
		
	/*创建随机用户*/
	function createUser(){
		//随机用户名
		//调用ucenter创建用户，
		$uid = uc.createuser();
		if(!$uid){
			//再次创建随机用户名，直到成功。
			createUser();
		}
		return $uid;
	}
	
	public function insert(){
		//ri($_POST);
		if(!$_POST[$this->getPk()]){
			//插入
			
			
			
			//修改post数据
			
			if($vo = $this->create()) {
				$id = $this->add();
				//echo $this->getLastSql();exit;
			}
			if($id){
				//图片表用uid标识，而uid原来值已正确，故不用再更新
				/*$u = D('Member');
				$f = M("File");
				$tid = $_POST['tid']; //个人形象
				$tempid = $_POST['tempid']; //个人风采
				$f->where("tid = '$tid' or tid = '$tempid'")->setField('tid',$id);*/
				//echo $f->getLastSql();
				//ri($_POST);
				//$f->where("tid = $tempid")->setField('tid',$id);
				
				//===由傻屄nid字段引起的兼容问题,若不用旧程序时，此处可写为$this->add();
				//$this->where("nid=$id")->setField('id',$id);
				
				return $id;
				
			}
		}else{
			//更新
			if($vo = $this->create()) {
				//dump($vo);
				$this->save();
				//$id = $vo[$this->getPk()];
				$id = $vo['uid'];
				$f = D("File");
				$tid = $_POST['tid']; //个人形象
				$tempid = $_POST['tempid']; //个人风采
				$f->where("tid = '$tid' or tid = '$tempid'")->setField('tid',$id);
				
				return $vo[$this->getPk()];
			}
		}
	}
	
	/**
	 * 得到一条记录
	 * @param unknown_type $id 
	 */
	public function getOne($id){
			if(!is_numeric($id)) return;
			$r = $this->find($id);
			//$u = D('Member');
			//$r['place'] = $u->where("id = {$r['uid']}")->getField('place');
			$p = explode('/',$r['location']);
			//dump($p);
			$r['province'] = $p[0];
			$r['city'] = $p[1];
			//dump($r);
			return $r;
	}
	
	/**
	 * 通过uid得到一条记录
	 * @param unknown_type $uid
	 */
	public function getOneByUid($uid){
		$r = $this->getList(array("uid"=>$uid));
		$this->standardizeData($r);
		//dump($r);
		return $r;
	}
	
	/**
	 * 标准化数据
	 * @param unknown_type $r
	 */
	protected function standardizeData(&$r){
		$p = explode('/',$r['location']);
		//dump($p);
		$r['province'] = $p[0];
		$r['city'] = $p[1];
		
		$r['pubtime'] = date('Y-m-d',$r['pubtime']);
		$r['ctime'] = date('Y-m-d',$r['ctime']);
	}
	
	/**
	 * 得到企业logo
	 * @param unknown_type $uid
	 */
	public function getLogo($uid){
		$r = $this->where("logo <>'' and uid = $uid")->getField('logo');
		if($r){
			return $r;
		}else{
			$sql = "SELECT face FROM `u_unit` left join u_user on u_unit.uid=u_user.id where face<>'' where u_unit.uid = $uid";
			$r = $this->queryOne($sql);
			
			return $r['face'];
		}
	}
	
}
?>