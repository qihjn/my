<?php
// 后台用户模块
class UserAction extends CommonAction {
	/*function __construct(){
		if(!$_COOKIE['userid']){
			echo "未登录,跳转到登录页";
		}
	}*/
	
	function _filter(&$map){
		$map['id'] = array('egt',2);
		$map['username'] = array('like',"%".$_POST['username']."%");
	}
	// 检查帐号
	public function checkAccount() {
        if(!preg_match('/^[a-z]\w{4,}$/i',$_POST['username'])) {
            //$this->error( '用户名必须是字母，且5位以上！');
        }
		$User = M("User");
        // 检测用户名是否冲突
        $name  =  $_REQUEST['username'];
        $result  =  $User->getByUsername($name);
        if($result) {
        	$this->error('该用户名已经存在！');
        }else {
           	$this->success('该用户名可以使用！');
        }
    }

	// 插入数据
	public function insert() {
		//在UCenter注册用户信息
		$username = '';
		if(!empty($_POST['activation']) && ($activeuser = uc_get_user($_POST['activation']))) {
			list($uid, $username) = $activeuser;
		} else {
			if(uc_get_user($_POST['username']) && !$db->result_first("SELECT uid FROM {$tablepre}members WHERE username='$_POST[username]'")) {
				//判断需要注册的用户如果是需要激活的用户，则需跳转到登录页面验证
				echo '该用户无需注册，请激活该用户<br><a href="'.$_SERVER['PHP_SELF'].'?example=login">继续</a>';
				exit;
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
		}
		if($username) {
			// 创建数据对象
			$User	 =	 D("User");
			if(!$User->create()) {
				$this->error($User->getError());
			}else{
				// 写入帐号数据
				if($result	 =	 $User->add()) {
					$this->addRole($result);
					$this->success('用户添加成功！');
				}else{
					$this->error('用户添加失败！');
				}
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
        $User = M('User');
		$User->password	=	md5($password);
		$User->id			=	$id;
		$result	=	$User->save();
        if(false !== $result) {
            $this->success("密码修改为$password");
        }else {
        	$this->error('重置密码失败！');
        }
    }
}
?>