<?php
class JobApplyModel extends CommonModel {
	protected $trueTableName = 'n_app'; 
	
	public function insert(){
		//ri($_POST);
		$u = D('Member');
		
					
		$pids = $_REQUEST['uid']; //按理应为uid,可数据表里用了uid，所以此处pid实为uid的内容
		is_string($pids) && $pids = validExplode(',', $pids);		//$pids=array(18007);
		
		//根据uid得到默认的简历id
		//$r = D('Resume');
		//$pid = $r->getDefaultResume($uid);
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
			$resume = $u->getUserInfo($pid); 
			foreach($jids as $jid) {
				//$fav = $conn->sql_one("select count(*) as c from n_app where uid='{$uid}' and jid='{$jid}' and ctime>'{$last}'");
				$c = $this->where("jid = $jid and uid = $pid")->count();//uid改为pid更合适
				if($c){ // 已投过的则更新时间
					$this->where("jid = $jid and uid = $pid")->setField("ctime",time()); 
					$id = true;
				}else{
					$data['uid'] = $pid; //用户id
					//$data['pid'] = $pid;
					$data['jid'] = $jid;
					$data['ctime'] = time();//dump($data);
					$id = $this->add($data); //echo $this->getLastSql(); //$sql = "insert into n_app(uid,pid, jid, ctime)  values($uid,$pid,$jid,$ctime)";
				}
				if($id){ //投递成功则提醒企业
					$line = $u->getUserInfoByJid($jid); //查出申请的职位的企业的信息
					if(!$line) continue;
					
					$person = $resume['realname'] ? $resume['realname'] : $resume['username'];
					$this->warnCompany($jid,$pid,$person,$line); //发信息
				}
			
				++$sum;
				//$msg .= $pid.':'.L('no_default_resume')."<br />";
			}
		}
		return true;
		
		
	}
	
	protected function warnCompany($jid,$pid,$person,$line){
		
		
		// 发送邮件
		if($line['email']) {
			
			$link = "http://job.{".DOMAIN."}/resume/{$pid}/show.html";
			
			$v = new View();
			$v->assign('unit',$line['unit']);
			$v->assign('job',$line['job']);
			$v->assign('person',$person);
			$v->assign('link',$link);
			$v->assign('URL_PUBLIC',"http://public.".DOMAIN);
			$v->assign('mainurl',"mainurl");
			$v->assign('date',date('Y-m-d'));
			
			$body = $v->fetch('./Public/Email/person/job_app.html');
			//echo $body;
			$msg = sendmail("恭喜你，收到一封 {$person} 的应聘简历----中华美容网",$body,$line['email'], $line['unit']);
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
		$reg = "/\d{11}/";
		if(preg_match($reg,$line['mobile'])){
			$mobile = $line['mobile'];
		}elseif(preg_match($reg,$line['phone'])){
			$mobile = $line['phone'];
		}
		$content = "个人投企业职位:你好,现有 {$person}应聘贵公司{$line['job']}职位,请及时登录邮箱(或网站)查收,邀请面试----中华美容网  www.21mmm.com ";
		if($mobile){
			@ini_set("display_errors","On");
			@error_reporting(E_ALL & ~E_NOTICE);
			$DataArry['mobile']=$mobile;
			$DataArry['message']=$content;
			$backMsg = SendSms($DataArry);
			//echo $backMsg;


		}
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