<?php
// 用户模型
class JobModel extends CommonModel {
	protected $trueTableName = 'n_job'; 
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
		//ri($_POST);
		$_POST['age'] = $_POST['startage'].'-'.$_POST['endage'];
		if(!$_POST[$this->getPk()]){
			//插入
			//修改post数据
			
			if($vo = $this->create()) {
				$id = $this->add();
				//echo $this->getLastSql();exit;
			}
			if($id){
				$u = D('Member');
				//$place = $_POST['place'];
				//$u->where("id=$id")->setField('place',$place);
				$f = M("File");
				$tid = $_POST['tid']; //个人形象
				$tempid = $_POST['tempid']; //个人风采
				$f->where("tid = '$tid' or tid = '$tempid'")->setField('tid',$id);
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
				//echo $this->getLastSql();exit;
				/*$id = $vo[$this->getPk()];
				$f = D("File");
				$tid = $_POST['tid']; //个人形象
				$tempid = $_POST['tempid']; //个人风采
				$f->where("tid = '$tid' or tid = '$tempid'")->setField('tid',$id);
				*/				
				return $vo[$this->getPk()];
			}
		}
	}
	
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
	
	public function listLink($map,$num){
		
		$this->initLink();
		if(is_array($map)){
			$this->baseOption['map'] = array_merge($this->baseOption['map'],$map);
		}
		//dump($map);
		$this->baseOption['num'] = $num;
		return $this->link($this->baseOption);
	}
	
	public function getListByUid($id,$num){
		return $this->getList(array("uid"=>$id),0);
	}
	
	public function getCompanyInfo($jid){
		$sql = "SELECT j.id as jid,j.title as jtitle,c.nid as cid,c.title as ctitle,c.uid,contacter FROM n_job as j left join u_unit as c on j.uid=c.uid where j.id = $jid";
		return $this->queryOne($sql);
		//return $r[0];
	}
	
	/**
	 * 得到信息的所有者
	 * @param $id 主键
	 */
	public function getOwner($id,$field="uid"){
		return  $this->where($this->getPk()."= $id")->getField($field);//
		
	}
}
?>