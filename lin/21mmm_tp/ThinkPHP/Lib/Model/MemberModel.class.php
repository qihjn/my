<?php
// 用户模型
class MemberModel extends CommonModel {
	protected $trueTableName = 'u_user'; 
	protected $userTable = "21mmm_ucenter.uc_members";
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
	
	/**
	 * 得到用户信息
	 * 个人用户操作表:ucenter用户验证表，用户表，简历表
	 * 企业用户操作表:ucenter用户验证表，用户表，公司表，还可以附加职位表
	 */
	function getUserInfo($id = ''){
		
		if(!$id){
			 $id = $_COOKIE['FSQ_uid'];
		}
		if($id){
			$r = $this->find($id);
			
			
			if($r['u_type'] == 'unit'){ //供求里好像使用了$u['utype']
				$c = D('Company');
				$a = $c->where("uid = $id")->find();
				$u = array_merge($a,$r);
				
				//内容整理
				if($u['title']){
					$u['LXname'] = $u['title'];       //公司名,学校名
				}elseif($u['contacter']){
					$u['LXname'] = $u['contacter'];  //公司联系人
				}elseif($u['people']){
					$u['LXname'] = $u['people'];      //学校联系人
				}elseif($u['realname']){ 
					$u['LXname'] = $u['realname'];   //简历名，真实姓名
				}elseif($u['nickname']){ 
					$u['LXname'] = $u['nickname'];   //用户昵称
				}elseif($u['username']){ 
					$u['LXname'] = $u['username'];   //用户名
				}
				//dump($u);exit;
				
				
				if($u['mobile']){
					$u['LXtel'] = $u['mobile'];
				}elseif($r['phone']){
					$u['LXtel'] = $u['phone'];
				}elseif($r['faq']){
					$u['LXtel'] = $u['faq'];
				}
				
				if($u['qq']){
					$u['qq'] = $u['qq'];
				}
				
				if($u['email']){
					$u['LXemail'] = $u['email'];
				}
			}elseif($r['u_type'] == 'person'){
				$c = D('Resume');
				$a = $c->where("uid = $id")->find();
				$u = array_merge($a,$r);
				//内容整理
				
			}elseif($r['u_type'] == 'school'){
				$c = D('School');
				$a = $c->where("uid = $id")->find();
				$u = array_merge($a,$r);
				//内容整理
			}
			
			
			//return $u;
			
			
			
			
			
			return $u;
		}
	}
	
	/**
	 * 得到多用户信息
	 I
	 */
	public function getUsersInfo($w){
		//$tables = "from {$this->trueTableName} as u ";
		$where ="where uc.uid=u.id and uc.uid=c.uid";
		$limit = "limit 0,30";
		switch($w['userType']){
			case "unit" : 
				$tables .= "from {$this->trueTableName} as u,u_unit as c,{$this->userTable} as uc ";
				$sql = "select * $tables $where $order $limit";
				break;
			case "person" :
				$tables .= "from {$this->trueTableName} as u,u_person as c,{$this->userTable} as uc ";
				$sql = "select * $tables $where";
				break;
			case "school" :
				$tables .= "from {$this->trueTableName} as u,u_school as c,{$this->userTable} as uc,u_school as c ";
				$sql = "select * $tables $where";
				break;
		}
		
		$r = $this->query($sql);
		//dump($r);
	}
	
	/**
	 * 指定用户类型得到用户信息
	 */
	public function getLoginUserInfo($utype = ''){
		$uid = getUserId();
		$r = $this->getUserInfo($uid);
		if($utype && $r['utype'] == $utype){
			return $r;
		}else{
			//不是该类型用户。
		}
	}
	
	/**
	 * 得到企业用户信息通过职位id，此情况就是公司的uid字段必须有值
	 */
	public function getUserInfoByJid($jid){
		$sql = "select u_user.email, u_unit.uid, u_unit.title as unit, u_unit.phone as phone, u_unit.mobile as mobile, n_job.title as job from n_job
		  left join u_unit on u_unit.uid=n_job.uid
		  left join u_user on u_user.id=u_unit.uid 
		  where n_job.id='{$jid}'";
			//echo $sql;exit;
		$r = $this->queryOne($sql);
		return $r;
	}
	
	/**
	 * 得到企业用户信息通过职位id，此情况就是公司的uid字段必须有值
	 */
	public function getUserInfoByPid($pid){
		$sql = "select u_user.email, u_user.username, u_person.uid, u_person.realname,u_person.local,u_person.job_request from u_user
		 left join u_person on u_person.uid=u_user.id 
		 where u_person.pid='{$pid}' limit 1";
			//echo $sql;exit;
		$r = $this->query($sql);
		return $r;
	}	
	
	
	
	
	/**
	 * 检查用户是否登录
	 */
	public function checkUser() {
		if(!isset($_SESSION[C('USER_AUTH_KEY')])) {
			$this->assign('jumpUrl','Public/login');
			$this->error('没有登录');
		}
	}

	/*
	 * 用户注册
	 */
	public function register(){
		if(chkUser()){
			$this->redirect('/');
		}else{
			$this->display();
		}
		
		//ri($_COOKIE);
		/*if(!chkUser()){
			$this->display();
		}else{
			//$this->redirect('/');
			$this->redirect('http://user.'.DOMAIN);
		}*/
	}
	
	
		
		
	
	
	/*
	 *  用户登出
	 */ 
    public function logout()
    {
        if(Cookie::get(C('USER_AUTH_KEY'))) {
			Cookie::delete(C('USER_AUTH_KEY'));
			Cookie::delete('utype');
			Cookie::delete('username');
			Cookie::delete('nickname');
			Cookie::delete('email');
			Cookie::delete('lastLoginTime');
			Cookie::delete('loginCount');
			
			
            $this->assign("jumpUrl",'/');
            $this->success('登出成功！');
        }else {
            $this->error('已经登出！');
        }
    }

	/*
	 *  登录处理
	 */  
	public function checkLogin() {
		import ( '@.ORG.ucUser' ); 
		$uc = new ucUser();
		list($uid, $username, $password, $email) = uc_user_login($_POST['username'], $_POST['password']);
			//setcookie('Example_auth', '', -86400);
		//$userInfo = $uc->login();
		var_dump($uid);
		if(!$userInfo){
			//echo $username;
			$this->redirct('/user/register',array(),1,'该用户不存在，请先注册');
		}
		
		
		
		/*if(empty($_POST['username'])) {
			$this->error('帐号错误！');
		}elseif (empty($_POST['password'])){
			$this->error('密码必须！');
		}elseif (empty($_POST['verify'])){
			$this->error('验证码必须！');
		}*/
		/*if($_SESSION['verify'] != md5($_POST['verify'])) {
			$this->error('验证码错误！');
		}*/
		
        //生成认证条件
        $map            =   array();
		// 支持使用绑定帐号登录
		$map['username']	= $_POST['username'];
        //$map["status"/*
	}
	
	/**
	  * 处理用户注册
	  */
	public function chkregister(){
		if($_SESSION['verify'] != md5($_POST['verify'])) {
			$this->error('验证码错误！');
		}
		if(!$_POST['utype']){
			$this->error('用户类型不能为空');
		}
		import ( '@.ORG.ucUser' ); 
		$uc = new ucUser();
		$username = $uc->register();
		//$username='bbbb';
		if($username){
			//主程序用户表
			$u = M("User");
			$data['username'] = $_POST['username'];
			$salt=substr(md5(createRand()),0,4);
			$data['password'] = md5(md5($_POST['password']).$salt);
			$data['salt'] = $salt;
			$data['email'] = $_POST['email'];
			$type['utype'] = $_POST['utype'];
			
			$id = $u->add($data);
			
			if(false !== $id){
				$this->success('注册成功');
			}else{
				$this->error('注册失败');
			}
		}else{
			$this->error('注册失败');
		}
		
	}
	
	/*
	 * 激活
	 */
	public function activation(){
		$this->display();
	}
	
	/*
	 * 处理激活
	 */
	public function chkactivation(){
		
		//$this-error('用户类型不能为空');
		if(!$_POST['utype']){
			$this->error('用户类型不能为空');
		}
		import ( '@.ORG.ucUser' ); 
		$uc = new ucUser();
		$userInfo = $uc->login();
		
		//echo $username;
		//$username='bbbb';
		if($userInfo){
			$u = M("User");
			$data['username'] = $userInfo['username'];
			$salt=substr(md5(createRand()),0,4);
			$data['password'] = md5(md5($_POST['password']).$salt);
			$data['salt'] = $salt;
			$data['email'] = $userInfo['email'] ? $userInfo['email'] : '';
			$type['utype'] = $_POST['utype'];
			
			$id = $u->add($data);
			//ri($u->getLastSql());
			//var_dump($data);
			if($id){
				$this->setUserCookie($u->find($id));
				$this->redirect('/');		
			}else{
				$this->error('激活失败');
			}
		}else{
			$this->error('没有这样的用户或密码不正确，请注册或重新激活。');
		}
	}

	/*
	 * 用户登录页面
	 */ 
	public function login() {
	//	=	array('gt',0);
		
		import ( 'ORG.Util.RBAC' );
        $authInfo = RBAC::authenticate($map);
		ri($authInfo);
        //使用用户名、密码和状态的方式进行认证
        if(!$authInfo) {
            //$this->error('帐号不存在或已禁用！');
			$this->redirect('/public/activation',array(),1,'该用户需要激活');
        }else {
            /*if($authInfo['password'] != md5(md5($_POST['password']).$authInfo['salt'])) {
            	$this->error('密码错误！');
            }*/
            /*$_SESSION[C('USER_AUTH_KEY')]	=	$authInfo['id'];
            $_SESSION['email']	=	$authInfo['email'];
            $_SESSION['loginUserName']		=	$authInfo['nickname'];
            $_SESSION['lastLoginTime']		=	$authInfo['last_login_time'];
			$_SESSION['login_count']	=	$authInfo['login_count'];
            if($authInfo['username']=='admin') {
            	$_SESSION['administrator']		=	true;
            }*/
			//ri(C('USER_AUTH_KEY'));
			//$cookieTime = 3600;setcookie("rinimabi","cc");

			$this->setUserCookie($authInfo);
           /*$_COOKIE['loginUserName']		=	$authInfo['nickname'];
		   $_COOKIE['lastLoginTime']		=	$authInfo['last_login_time'];
			$_COOKIE['login_count']	=	$authInfo['login_count'];
            if($authInfo['username']=='admin') {
            	$_COOKIE['administrator']		=	true;
            }*/
            //保存登录信息
			$User	=	M('User');
			$ip		=	get_client_ip();
			$time	=	time();
            $data = array();
			$data['id']	=	$authInfo['id'];
			$data['last_login_time']	=	$time;
			$data['login_count']	=	array('exp','login_count+1');
			$data['last_login_ip']	=	$ip;
			$User->save($data);

			// 缓存访问权限
            RBAC::saveAccessList();
			
			//ri($_COOKIE);
			//redirect('__APP__/supply/add');
			$this->success('登录成功！');

		}
	}
	
	/*
	 * 设置cookie
	 */
	public function setUserCookie($authInfo){
			Cookie::set(C('USER_AUTH_KEY'),$authInfo['id'],$cookieTime);
			Cookie::set('utype',$authInfo['utype'],$cookieTime);
            Cookie::set('username',$authInfo['username'], $cookieTime);
			Cookie::set('nickname',$authInfo['nickname'], $cookieTime);
			Cookie::set('email',$authInfo['email'], $cookieTime);
			Cookie::set('lastLoginTime',date('Y-m-d',$authInfo['last_login_time']), $cookieTime);
			Cookie::set('loginCount',$authInfo['login_count'], $cookieTime);/**/
            
	}
    // 更换密码
    public function changePwd()
    {
		$this->checkUser();
        //对表单提交处理进行处理或者增加非表单数据
		if(md5($_POST['verify'])	!= $_SESSION['verify']) {
			$this->error('验证码错误！');
		}
		$map	=	array();
        $map['password']= pwdHash($_POST['oldpassword']);
        if(isset($_POST['username'])) {
            $map['username']	 =	 $_POST['username'];
        }elseif(isset($_SESSION[C('USER_AUTH_KEY')])) {
            $map['id']		=	$_SESSION[C('USER_AUTH_KEY')];
        }
        //检查用户
        $User    =   M("User");
        if(!$User->where($map)->field('id')->find()) {
            $this->error('旧密码不符或者用户名错误！');
        }else {
			$User->password	=	pwdHash($_POST['password']);
			$User->save();
			$this->success('密码修改成功！');
         }
    }
	
	/*
	 * 处理ajax用户检测
	 */
	public function chkuser(){
		$username = $_GET['username'];
		if($username){
			$u = new Model();
			$u = $u->query("select uid from 21mmm_ucenter.uc_members where username='$username'");
			//echo "select uid from 21mmm_ucenter.uc_members where username='$username'";
			//var_dump($u);
			if($u){
				echo "y";
			}
		}
	}
	
	public function profile() {
		$this->checkUser();
		$User	 =	 M("User");
		$vo	=	$User->getById($_SESSION[C('USER_AUTH_KEY')]);
		$this->assign('vo',$vo);
		$this->display();
	}
	 public function verify()
    {
		$type	 =	 isset($_GET['type'])?$_GET['type']:'gif';
        import("@.ORG.Image");
        Image::buildImageVerify(4,1,$type);
    }
	
	// 修改资料
	public function change() {
		$this->checkUser();
		$User	 =	 D("User");
		if(!$User->create()) {
			$this->error($User->getError());
		}
		$result	=	$User->save();
		if(false !== $result) {
			$this->success('资料修改成功！');
		}else{
			$this->error('资料修改失败!');
		}
	}
	
	public function chk(){
		//setcookie("userid",'1');
		//ri($_COOKIE);
		if(!$_COOKIE[C('USER_AUTH_KEY')]){
			redirect('public/login/');
		}
	}
	
	/**
	 * 得到用户角色访问的权限列表
	 * @param string $utype 角色类型
	 */
	public function getUserAccess($utype){
		
		$role = D('Role');
		$roleID = $role->where("ename='{$utype}'")->getField('id');
		$access = D("Access");
		$r = $access->where("role_id = {$roleID}")->select();
		return $r;
		//echo $rose->getLastSql();
		//dump($r);
	}
	
	public function insert($u){
		$data['id'] = $u['uid'];
		$data['username'] = $u['username'];
		//$salt=substr(md5(createRand()),0,4);
		//$data['password'] = md5(md5($u['password']).$salt);
		//$data['salt'] = $salt;
		$data['email'] = $u['email'];
		$data['u_type'] = $u['utype'];
		
		if($this->add($data)){
			return true;
		}
	}
	
	
	/**
	 * 随机创建用户
	 */
	public function addUserByRandom($utype = PERSON){
		import ( 'ORG.Util.ucUser' ); 
		$uc = new ucUser();
		$u['password'] = md5(rand().time());
		$u['username'] = substr($u['password'],0,8);
		$u['email'] = $u['username'].'@21mmm.com';
		
		if($uid = $uc->addUserByRadom($u)){
			$u['uid'] = $uid;
			$u['utype'] = $utype;
			$this->insert($u);
			//dump($u);
			return $uid;
		}
		return false;
	}
}






?>