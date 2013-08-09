<?php
// 用户模型
class ResumeApplyModel extends CommonModel {
	protected $trueTableName = 'u_unit_please'; 
//	public $_auto		=	array(
//		array('ctime','time',self::MODEL_BOTH,'function'),
//		
//	);
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
		$u = D('Member');
		$j = D('Job');
		$r = D('Resume');
		//$u = $u->getUserInfo(COMPANY);//企业用户
		
		//dump($_REQUEST);exit;
		$pids = $_REQUEST['pid']; //
		is_string($pids) && $pids = validExplode(',', $pids);		//$pids=array(18007);
		if(count($pids) < 1){
			return L('no_resume');
		}		
		
		//用到$_REQUEST,理应放在action里
		$jids = $_REQUEST['jid'];
		if (is_string($jids)) {
			$jids = validExplode(',', $jids);
		}				
		if(count($jids) < 1) return L('no_job');
		
		$msg = "";
		$last = time() - (24 * 3600);	// 24小时后可以从新投递简历 "select count(*) as c from n_app where uid='{$uid}' and jid='{$jid}' and ctime>'{$last}'"
		$sum = 0;
		foreach ($pids as $pid) {
			$resume = $r->find($pid); 
			foreach($jids as $jid) {
				$jc = $j->getCompanyInfo($jid); //职位-公司连接查询
				$c = $this->where("job_id = $jid and person_id = $pid")->count();//uid改为pid更合适
				if($c){ // 已投过的则更新时间
					$this->where("job_id = $jid and person_id = $pid")->setField("ctime",time()); 
					$id = true;
				}else{
					//$uid = $j->getOwner($jid); //echo $uid;
					//$u = $u->getUserInfo($uid); //只为获取uid和公司联系人就要做2次查询
					
					$data['unit_id'] = $jc['uid']; //用户id
					if($jc['contacter'])
						$data['uname'] = $jc['contacter']; //公司联系人
					$data['job_id'] = $jid;
					$data['person_id'] = $pid;
					if($_REQUEST['content'])
						$data['content'] = $_REQUEST['content'];
					//$data['facetime'] = $pid;
					
					//ri($data);
					$data['ctime'] = time();//dump($data);
					$id = $this->add($data); //echo $this->getLastSql(); //$sql = "insert into n_app(uid,pid, jid, ctime)  values($uid,$pid,$jid,$ctime)";
				}
				//ri($resume);
				if($id){ //成功则提醒个人
					if(!$resume) continue; //被申请人的信息为空，则不提醒。
					//$applicant = $u->getUserInfoByjid($jid); //申请人信息
					//$applicant['linkman'] = $applicant['realname'] ? $applicant['realname'] : $applicant['username'];
					//$applicant['uid'] = $uid;
					$this->warn($jid,$pid,$jc,$resume); //发信息
				}
			
				++$sum;
				//$msg .= $pid.':'.L('no_default_resume')."<br />";
			}
		}
		if($sum){
			return true;
		}
		
		
	}
	
	protected function warn($jid,$pid,$applicant,$line){
		
		
		// 发送邮件
		if($line['email']) {
			
			$jurl = "http://job.".DOMAIN."/job/show_{$jid}.html";
			$curl = "http://job.".DOMAIN."/company/show_{$applicant['uid']}.html";
			$v = new View();
			$vo['unit'] = $applicant['contacter'];
			$vo['curl'] = $curl;
			$vo['jtitle'] = $applicant['jtitle'];
			$vo['jurl'] = $jurl;
			$vo['mainurl'] = DOMAIN;
			$vo['date'] = date('Y-m-d');
			
			//$vo['unit'] = $applicant['title'];
			$v->assign('vo',$vo);
			//$v->assign('unit',$line['unit']);
//			$v->assign('job',$line['job']);
//			$v->assign('person',$person);
//			$v->assign('link',$link);
//			$v->assign('URL_PUBLIC',"http://public.".DOMAIN);
			
			//echo file_get_contents('./Public/Email/unit/job_inv.html');exit;
			$body = $v->fetch('./Public/Email/unit/job_inv.html');
			//echo $body;exit;
			//$line['email'] = 'f4f8@qq.com';
			$msg = sendmail("您有新的面试邀请!----中华美容网",$body,$line['email'], $line['realname']);
			if($msg === true){
				//echo "邮件发送成功";
			}else{
				//echo $msg;
			}		
			// 添加记录 愚蠢之极，造成大量垃圾文件，导致系统缓慢
			/*$dir = ROOT_CACHE."/mail/person/job/";
			casmkdir($dir);
			$f = $dir. "app_{$id}.html";
			file_put_contents($f, $body);*/
		}
		
		//发短信
		//$reg = "/\d{11}/";
//		if(preg_match($reg,$line['mobile'])){
//			$mobile = $line['mobile'];
//		}elseif(preg_match($reg,$line['phone'])){
//			$mobile = $line['phone'];
//		}
//		$content = "个人投企业职位:你好,现有 {$person}应聘贵公司{$line['job']}职位,请及时登录邮箱(或网站)查收,邀请面试----中华美容网  www.21mmm.com ";
//		if($mobile){
//			@ini_set("display_errors","On");
//			@error_reporting(E_ALL & ~E_NOTICE);
//			$DataArry['mobile']=$mobile;
//			$DataArry['message']=$content;
//			$backMsg = SendSms($DataArry);
//			//echo $backMsg;
//
//
//		}
	} 
	
	public function getOne($id){
			$r = $this->find($id);
			//$u = D('Member');
			//$r['place'] = $u->where("id = {$r['uid']}")->getField('place');
			$a = explode('-',$r['age']);
			$r['startage'] = $a[0];
			$r['endage'] = $a[1];
			$p = explode('/',$r['workplace']);
			dump($r);
			$r['province'] = $p[0];
			$r['city'] = $p[1];
			//dump($r);
			return $r;
	}
	
	
}
?>