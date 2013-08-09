<?php
// 用户模型
class SchoolModel extends CommonModel {
	//protected $trueTableName = 'nmg_discuz.cdb_uc_members'; 
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
	
	function getLoignInfo(){
		
		if($id = $_COOKIE['FSQ_uid']){
			
			$r = $this->find($id);
			if(!$r['realname']){
				$r['realname'] = $r['username'];
			}
			
			if($r['utype'] == COMPANY){
				$c="";
			}elseif($r['utype'] == PERSON){
				$c="";
			}elseif($r['utype'] == SCHOOL){
				$c="";
			}
			return $r;
		}
	}
}
?>