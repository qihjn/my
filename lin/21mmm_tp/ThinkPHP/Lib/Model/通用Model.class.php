<?php
class 通用Model extends CommonModel {
	protected $trueTableName = '21mmm.u_unit'; 
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
		
	
	public function insert(){
		if(!$_POST[$this->getPk()]){
			//添加数据
			//个人形象，1张
			//个人风采,n张
		}else{
			//更新数据
			//个人形象，1张
			//个人风采,n张
		}
	}
	
	public function delete(){
		//删除数据
		//删除照片
	}
	/**
	 * 得到一条记录
	 * @param unknown_type $id 
	 */
	public function getOne(&$id){
			$r = $this->find($id);
			$p = explode('/',$r['location']);
			$r['province'] = $p[0];
			$r['city'] = $p[1];
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
	 * 得到标志性图片
	 * @param unknown_type $uid
	 */
	public function getLogo($uid){
		
	}
	
}
?>