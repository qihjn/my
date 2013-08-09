<?php 
class ucUser{
		protected $times = 0;	
		function __construct(){
			//$this->conn=P('conn');
			require_once(APP_PATH."/../api/config.inc.php");
			require_once(APP_PATH.'/../uc_client/client.php');
		}
		
		
		function addUserByRadom($u){
			//dump($u);echo "<hr />";
			$uid = uc_user_register($u['username'], $u['password'], $u['email']);
			if($uid > 0){
				return $uid;
			}
			elseif($this->times < 3){
				addUserByRadom($u);
			}
			$i++;
		}
		
		function register(){
			//在UCenter注册用户信息
			$username = '';
			
			//若用户检测从ucenter则此步可去。
			/*if(uc_get_user($_POST['username']) && !$this->conn->sql_one("SELECT uid FROM u_user WHERE username='{$_POST[username]}'")) { //注册时跳转到激活
				return $_POST['username']; 
			}*/
			
			//exit($_POST['password']);
			if(!$_POST['email']){
				$_POST['email'] = '21mmm@123.com';
			}
			$uid = uc_user_register($_POST['username'], $_POST['password'], $_POST['email']);
			
			if($uid <= 0) {
				if($uid == -1) {
					echo '用户名不合法';
				} elseif($uid == -2) {
					echo '包含要允许注册的词语';
				} elseif($uid == -3) {
					echo '用户名已经存在';
				} elseif($uid == -4) {
					echo 'Email 格式有误';
				} elseif($uid == -5) {
					echo 'Email 不允许注册';
				} elseif($uid == -6) {
					echo '该 Email 已经被注册';
				} else {
					echo '未定义';
				}
			} else {
				$username = $_POST['username'];
			}
			
			//exit('a='.$username);
			if($username) {
				//注册成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
				//setcookie('Example_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
				return $username;
			}	
		}
		
		//激活，也就是在本应用程序中注册用户
		function activation($u, $p, $email,$utype){
			$salt=substr(md5(createrandnum()),0,4);
			$pass=md5(md5($p).$salt);
			$sql="insert into u_user(username,password,email,gender,nickname,birthday,regip,salt,ctime,u_type,place)
				values('{$u}','{$pass}','{$email}','{$gender}','{$nickname}','{$birthday}','".get_client_ip()."','{$salt}',".mktime().",'{$utype}','{$place}')";
			//echo $sql;
			if($this->conn->sql_query($sql)){
				$uid=$this->conn->last_insertid();
				$this->conn->sql_query("insert into u_{$utype} set uid='{$uid}',ctime='".time()."'");
				//$this->user_login($u,$p,$utype);
			}else{
				return "操作失败";
			}
		}
		function login(){
			//通过接口判断登录帐号的正确性，返回值为数组
			//echo "ri";exit;
			//var_dump($_POST);
			//var_dump(uc_user_login($_POST['username'], $_POST['password']));
			//echo "p1:".$_POST['password'];
			list($uid, $username, $password, $email) = uc_user_login($_POST['username'], $_POST['password']);
			//setcookie('Example_auth', '', -86400);
			//exit($email);
			//var_dump($_POST);
			//exit("bbb:".$uid);
			if($uid > 0) {
				
				/*$r = $this->conn->sql_one("SELECT id,username FROM think_user WHERE username='$username'");
				if(!$r['username']) {
					//判断当前应用程序用户是否存在于用户表，不存在则跳转到激活页面
					$this->activation($username, $_POST['password'], $email, $_POST['u_type']);
					
				}*/
				//用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
				//echo  uc_authcode($uid."\t".$username, 'ENCODE');
				//setcookie('Example_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
				//echo $_COOKIE['Example_auth'];
				//exit;
				//生成同步登录的代码
				$ucsynlogin = uc_user_synlogin($uid);
				//echo $uid;exit;
				return array('userid'=>$uid,'username'=>$username,'email'=>$email);
				//echo '登录成功'.$ucsynlogin.'<br><a href="'.$_SERVER['PHP_SELF'].'">继续</a>';
				//exit;
			} elseif($uid == -1) {
				echo '用户不存在,或者被删除';
			} elseif($uid == -2) {
				echo '密码错';
			} else {
				echo '未定义';
			}	
		}
		
		function logout(){
			//生成同步退出的代码
			$ucsynlogout = uc_user_synlogout();
		}
		
		function edit($username){
			if($_POST['password'] != $_POST['againpass']){
				return '两次密码不一致';
			}
			$ucresult = uc_user_edit($username, $_POST['oldpassword'], $_POST['againpass'], $_POST['emailnew']);
			if($ucresult == -1) {
				return '旧密码不正确';
			} elseif($ucresult == -4) {
				return 'Email 格式有误';
			} elseif($ucresult == -5) {
				return 'Email 不允许注册';
			} elseif($ucresult == -6) {
				return '该 Email 已经被注册';
			}

		}
		
		function del($usernmae,$uid=''){
			uc_user_delete($username);
		}
		
		//用户图像
		function avatar($uid){
			uc_avatar($uid);
		}
	}
?>