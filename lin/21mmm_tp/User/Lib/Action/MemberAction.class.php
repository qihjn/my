<?php
// 后台用户模块
class MemberAction extends CommonAction {
	function _filter(&$map){
		  $map['id'] = array('egt',2);
		$map['username'] = array('like',"%".$_POST['username']."%");
	}
	// 检查帐号
	public function checkAccount() {
        if(!preg_match('/^[a-z]\w{4,}$/i',$_POST['username'])) {
            $this->error( '用户名必须是字母，且5位以上！');
        }
		$user = M("User");
        // 检测用户名是否冲突
        $name  =  $_REQUEST['username'];
        $result  =  $user->getByAccount($name);
        if($result) {
        	$this->error('该用户名已经存在！');
        }else {
           	$this->success('该用户名可以使用！');
        }
    }

	// 插入数据
	public function insert() {
		// 创建数据对象
		$user	 =	 D("User");
		if(!$user->create()) {
			$this->error($user->getError());
		}else{
			// 写入帐号数据
			if($result	 =	 $user->add()) {
				$this->addRole($result);
				$this->success('用户添加成功！');
			}else{
				$this->error('用户添加失败！');
			}
		}
	}

	protected function addRole($userId) {
		//新增用户自动加入相应权限组
		$RoleUser = M("RoleUser");
		$RoleUser->user_id	=	$userId;
        // 默认加入网站编辑组
        $RoleUser->role_id	=	3;
		$RoleUser->add();
	}

    //重置密码
    public function resetPwd()
    {
    	$id  =  $_POST['id'];
        $password = $_POST['password'];
        if(''== trim($password)) {
        	$this->error('密码不能为空！');
        }
        $user = M('User');
		$user->password	=	md5($password);
		$user->id			=	$id;
		$result	=	$user->save();
        if(false !== $result) {
            $this->success("密码修改为$password");
        }else {
        	$this->error('重置密码失败！');
        }
    }
	
	public function register(){
		
		$this->display();
	}
	
	public function login(){
		
		$this->display();
	}
	
	public function checkLogin(){
		import ( '@.ORG.ucUser' ); 
		$uc = new ucUser();
		$userInfo = $uc->login();
		if(!$userInfo){
			//echo $username;
			$this->redirct('/member/register',array(),1,'该用户不存在，请先注册');
		}
		//保存登录信息
		$user	=	M('Member');
		$ip		=	get_client_ip();
		$time	=	time();
		$data = array();
		$data['id']	=	$authInfo['id'];
		$data['last_login_time']	=	$time;
		$data['login_count']	=	array('exp','login_count+1');
		$data['last_login_ip']	=	$ip;
		$user->save($data);

		$r = $user->where("username='{$userInfo['username']}'")->select();
		//echo $user->getLastSql();
		//dump($r);
		// 缓存访问权限
		//RBAC::saveAccessList();
		$r['u_type'] = "person";
		$utype = $r['u_type'];
		$this->getUserAccess($utype);
		exit;
		switch($utype){
			case "unit":
				//转到comapny/index
				break;
			case "person":
				//转到person/index
				break;
			case "school":
				//写原来cookie，跳转到老程序
				break;
				
		}
		
		$this->success('登录成功！');
	}
	
	
	public function getUserAccess($utype){
		
		$role = D('Role');
		$roleID = $role->where("ename='{$utype}'")->getField('id');
		$access = D("Access");
		$r = $access->where("role_id = {$roleID}")->select();
		dump($r);
		//echo $rose->getLastSql();
		//dump($r);
	}
	
}
?>