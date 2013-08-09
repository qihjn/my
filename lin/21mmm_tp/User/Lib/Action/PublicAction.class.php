<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://domain All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: name
// +----------------------------------------------------------------------

class PublicAction extends CommonAction {
	// 检查用户是否登录

	protected function checkUser() {
		if(!isset($_SESSION[C('USER_AUTH_KEY')])) {
			$this->assign('jumpUrl','Public/login');
			$this->error('没有登录');
		}
	}

	// 顶部页面
	public function top() {
		C('SHOW_RUN_TIME',false);			// 运行时间显示
		C('SHOW_PAGE_TRACE',false);
		$model	=	M("Group");
		$list	=	$model->where('status=1')->getField('id,title');
		$this->assign('nodeGroupList',$list);
		$this->display();
	}
	// 尾部页面
	public function footer() {
		C('SHOW_RUN_TIME',false);			// 运行时间显示
		C('SHOW_PAGE_TRACE',false);
		$this->display();
	}
	// 菜单页面
	public function menu() {
        $this->checkUser();
        if(isset($_SESSION[C('USER_AUTH_KEY')])) {
            //显示菜单项
            $menu  = array();
            if(isset($_SESSION['menu'.$_SESSION[C('USER_AUTH_KEY')]])) {

                //如果已经缓存，直接读取缓存
                $menu   =   $_SESSION['menu'.$_SESSION[C('USER_AUTH_KEY')]];
            }else {
                //读取数据库模块列表生成菜单项
                $node    =   M("Node");
				$id	=	$node->getField("id");
				$where['level']=2;
				$where['status']=1;
				$where['pid']=$id;
                $list	=	$node->where($where)->field('id,name,group_id,title')->order('sort asc')->select();
                $accessList = $_SESSION['_ACCESS_LIST'];
                foreach($list as $key=>$module) {
                     if(isset($accessList[strtoupper(APP_NAME)][strtoupper($module['name'])]) || $_SESSION['administrator']) {
                        //设置模块访问权限
                        $module['access'] =   1;
                        $menu[$key]  = $module;
                    }
                }
                //缓存菜单访问
                $_SESSION['menu'.$_SESSION[C('USER_AUTH_KEY')]]	=	$menu;
            }
            if(!empty($_GET['tag'])){
                $this->assign('menuTag',$_GET['tag']);
            }
			//dump($menu);
            $this->assign('menu',$menu);
		}
		C('SHOW_RUN_TIME',false);			// 运行时间显示
		C('SHOW_PAGE_TRACE',false);
		$this->display();
	}

    // 后台首页 查看系统信息
    public function main() {
        $info = array(
            '操作系统'=>PHP_OS,
            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式'=>php_sapi_name(),
            'ThinkPHP版本'=>THINK_VERSION.' [ <a href="http://domain" target="_blank">查看最新版本</a> ]',
            '上传附件限制'=>ini_get('upload_max_filesize'),
            '执行时间限制'=>ini_get('max_execution_time').'秒',
            '服务器时间'=>date("Y年n月j日 H:i:s"),
            '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
            '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
            '剩余空间'=>round((@disk_free_space(".")/(1024*1024)),2).'M',
            'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
            'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
            'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
            );
        $this->assign('info',$info);
        $this->display();
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
	}
	
	
	/*
	 * 处理用户注册
	 */
	public function chkregister(){
		/*if($_SESSION['verify'] != md5($_POST['verify'])) {
			$this->error('验证码错误！');
		}*/
		
		$utype = $_POST['utype'];
		if(!$utype){
			$this->error('用户类型不能为空');
		}
		import ( '@.ORG.ucUser' ); 
		$uc = new ucUser();
		$userInfo = $uc->register();
		//dump($userInfo);
		//$username='bbbb';
		if($userInfo['userid']){
			//主程序用户表
			$u = D("Member");
			/*$data['username'] = $_POST['username'];
			$salt=substr(md5(createRand()),0,4);
			$data['password'] = md5(md5($_POST['password']).$salt);
			$data['salt'] = $salt;
			$data['email'] = $_POST['email'];*/
			
			$data['id'] = $userInfo['userid'];
			$data['username'] = $userInfo['username'];
			$data['u_type'] = $utype;
			$u->add($data);
			unset($data);
			//echo $u->getLastSql();//exit;
			//用户-角色表
			$role = M('role');
			$roleID = $role->where("ename='{$utype}'")->getField('id');		
			$data['role_id'] = $roleID;
			$data['user_id'] = $userInfo['userid'];
			$role_user = M('RoleUser');
			$role_user->add($data);
			//echo $role_user->getLastSql();
			if(false !== $userInfo['userid']){
				$this->chkLogin($_POST);
				//$this->redirect('/public/login','',2,'注册成功');
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
		//ri($_COOKIE);
		if(!chkUser()){
			$this->display();
		}else{
			//$this->redirect('/');
			$this->redirect('http://user.'.DOMAIN);
		}
		
	}
	
	/*
	 * 用户登录页面
	 */
	/*public function tepchklogin(){
		
	}*/


	/*
	 *  登录处理
	 */  
	
	public function chkLogin($post= array()){
		//if(count(post)<1) $post = $_POST;
		import ( 'ORG.Util.ucUser' ); 
		$uc = new ucUser();
		$userInfo = $uc->login($post);
		if(!$userInfo){
			//echo $username;
			$this->redirect('/public/register',array(),1,'该用户不存在，请先注册');
		}
		
		//获取完整的用户信息
		$u	=	D('Member');
		$r = $u->where("username='{$userInfo['username']}'")->find();
		//echo $u->getLastSql();
		$userInfo = array_merge($r,$userInfo);
		
		//保存验证凭证
		//setUserAuth($userInfo); //自动判断是用cookie还是session
		$_SESSION[C('USER_AUTH_KEY')]	=	$userInfo['id']; //session凭证
		$this->setUserCookie($userInfo); //cookie凭证
		
		// 缓存访问权限
		import ( 'ORG.Util.RBAC' );
		//RBAC::saveAccessList();
		RBAC::saveAccessList('','unit');
		//dump($_SESSION['_ACCESS_LIST']);
		
		
		//保存登录信息
		$ip		=	get_client_ip();
		$time	=	time();
		$data = array();
		$data['id']	=	$userInfo['id'];
		$data['lastlogontime']	=	$time;
		$data['logontimes']	=	array('exp','logontimes+1');
		$data['lastlogonip']	=	$ip;
		$u->save($data);
		//echo $u->getLastSql();
		
		//跳转
		redirect('http://user.21mmm.com',0,'');
		//echo COMPANY;
		switch($userInfo['u_type']){
			case COMPANY:
				//转到comapny/index
				redirect(__APP__.'/Index/cindex',1,'跳转');
				break;
			case PERSON:
				redirect(__APP__.'/Index',1,'跳转');//person/index
				break;
			case SCHOOL:
				//写原来cookie，跳转到老程序
				break;
				
		}
		//$this->success('登录成功！');
	}
	public function checklogin_old() {
		import ( '@.ORG.ucUser' ); 
		$uc = new ucUser();
		$userInfo = $uc->login();
		if(!$userInfo){
			//echo $username;
			$this->redirct('/public/register',array(),1,'该用户不存在，请先注册');
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
        //$map["status"]	=	array('gt',0);
		
		import ( 'ORG.Util.RBAC' );
        $userInfo = RBAC::authenticate($map);
		//ri($userInfo);
        //使用用户名、密码和状态的方式进行认证
        if(!$userInfo) {
            //$this->error('帐号不存在或已禁用！');
			$this->redirect('/public/activation',array(),1,'该用户需要激活');
        }else {
            /*if($userInfo['password'] != md5(md5($_POST['password']).$userInfo['salt'])) {
            	$this->error('密码错误！');
            }*/
            /*$_SESSION[C('USER_AUTH_KEY')]	=	$userInfo['id'];
            $_SESSION['email']	=	$userInfo['email'];
            $_SESSION['loginUserName']		=	$userInfo['nickname'];
            $_SESSION['lastLoginTime']		=	$userInfo['last_login_time'];
			$_SESSION['login_count']	=	$userInfo['login_count'];
            if($userInfo['username']=='admin') {
            	$_SESSION['administrator']		=	true;
            }*/
			//ri(C('USER_AUTH_KEY'));
			//$cookieTime = 3600;setcookie("rinimabi","cc");
			
			$_SESSION[C('USER_AUTH_KEY')]	=	$userInfo['id'];
			$this->setUserCookie($userInfo);
           /*$_COOKIE['loginUserName']		=	$userInfo['nickname'];
		   $_COOKIE['lastLoginTime']		=	$userInfo['last_login_time'];
			$_COOKIE['login_count']	=	$userInfo['login_count'];
            if($userInfo['username']=='admin') {
            	$_COOKIE['administrator']		=	true;
            }*/
            //保存登录信息
			$u	=	M('User');
			$ip		=	get_client_ip();
			$time	=	time();
            $data = array();
			$data['id']	=	$userInfo['id'];
			$data['last_login_time']	=	$time;
			$data['login_count']	=	array('exp','login_count+1');
			$data['last_login_ip']	=	$ip;
			$u->save($data);

			// 缓存访问权限
            RBAC::saveAccessList();
			
			//ri($_COOKIE);
			//redirect('__APP__/supply/add');
			$this->success('登录成功！');

		}
	}

	public function index()
	{
		//如果通过认证跳转到首页
		redirect(__APP__);
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
			
			dsetcookie('uname');
			dsetcookie('utype');
			dsetcookie('uid');
			
            $this->assign("jumpUrl",'/');
            $this->success('登出成功！');
        }else {
            $this->error('已经登出！');
        }
    }
	
	/*
	 * 设置cookie
	 */
	public function setUserCookie($userInfo){
			
			
			Cookie::set(C('USER_AUTH_KEY'),$userInfo['id'],$cookieTime);
			Cookie::set('utype',$userInfo['utype'],$cookieTime);
            Cookie::set('username',$userInfo['username'], $cookieTime);
			Cookie::set('nickname',$userInfo['nickname'], $cookieTime);
			Cookie::set('email',$userInfo['email'], $cookieTime);
			Cookie::set('lastLoginTime',date('Y-m-d',$userInfo['last_login_time']), $cookieTime);
			Cookie::set('loginCount',$userInfo['login_count'], $cookieTime);/**/
			
			//设置旧程序cookie
			dsetcookie('uname',$userInfo['username'], 86400);
			dsetcookie('utype',$userInfo['utype'], 86400);
			dsetcookie('uid',$userInfo['id'],86400);//exit;
            
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
        $u    =   M("User");
        if(!$u->where($map)->field('id')->find()) {
            $this->error('旧密码不符或者用户名错误！');
        }else {
			$u->password	=	pwdHash($_POST['password']);
			$u->save();
			$this->success('密码修改成功！');
         }
    }
	
	/*
	 * 处理ajax用户检测
	 */
	public function chkUser(){
		$username = $_GET['username'];
		if($username){
			$u = new Model();
			$u = $u->query("select uid from 21mmm_ucenter.uc_members where username='$username'");
			//echo "select uid from 21mmm_ucenter.uc_members where username='$username'";
			//var_dump($u);
			if($u){
				exit("用户名已被注册");
			}else{
				exit("用户名可以使用|pass");
			}
		}else{
			exit("用户名为空");
		}
	}
	
	public function profile() {
		$this->checkUser();
		$u	 =	 M("User");
		$vo	=	$u->getById($_SESSION[C('USER_AUTH_KEY')]);
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
		$u	 =	 D("User");
		if(!$u->create()) {
			$this->error($u->getError());
		}
		$result	=	$u->save();
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
	  * 登录后的登录框内容
	  */
	public function loginedbar(){
		//ECHO COOKIE::get(C('USER_AUTH_KEY'));
		$r = getUserInfo();
		if(is_array($r)){
			$this->assign('u',$r);
			echo $this->fetch();
		}
	}
}
?>