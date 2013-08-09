<?php
/**
 * 复制原来的程序的，所以很多地方没有按标准来
 * @author Administrator
 *
 */
class ServiceOwnModel extends CommonModel {
	protected $trueTableName = 'serviceown'; 
	//protected $pk = "pid";
	//public $baseOption = array();
	//protected $_map = array('id'=>'pid');
	//protected $fields = array('_pk'=>'pid');
	protected $e = NULL;
	protected static $cate = NULL;
	function __construct() {
		
		parent::__construct();
		$this->e = D('Enum');
		$this->cate = $this->e->getOneArray('job_category');
	}
	
	
	
	function add($post = ''){
		$consumenum = include(ROOT_CONFIG.'consume/consumenum.php'); //每天消费金币数的配置
		$startday = include(ROOT_CONFIG.'consume/startday.php'); //起购天数配置
		$code = include(ROOT_CONFIG.'consume/code.php');  //服务代码
		extract($_POST);
		$len=0;
		foreach($buydays as $v){
			if($v){
				$len++;
			}
		}
			
		if($len<1){
			msg("不能为空","vip.mgr.php"); //or msg="...."
		}
		
		$sqlc="";
		
		$alltotalprice=0; //所有服务的总价格
		for($i=0; $i<$len; $i++){
			
			$ctime=time();
			$pkey=$sltpcode[$i]; //省key
			$ikey=$slticode[$i]; //行业key
			
			$unitprice=$consumenum[$pkey][$ikey];
			if($unitprice<1){
				//msg("非法数字","vip.mgr.php");
				continue;
			}
			
			$dbbuydays = fil_str($buydays[$i],2);
			if($dbbuydays > 0 && ($dbbuydays < $startday[$pkey][$ikey])){
				msg("不能小于最小起购天数","vip.mgr.php");
			}
			
			$servicecode=$code[$pkey][$ikey];
			if(!$servicecode){
				msg("服务代码为空",$_SERVER['HTTP_REFERER']);
				continue;
			}
			$totalprice=$unitprice*$dbbuydays;
			$alltotalprice+=$totalprice;
			$sqlc .= ",($uid,$pkey,$ikey,'$servicecode',$dbbuydays,$ctime,$unitprice,$totalprice,$ctime)";
			$pausenum = getpausenum($dbbuydays);
			//生成更新用户相应服务的sql
			$sql="select id from serviceown where uid=$uid and pcode=$pkey and firstcate=$ikey ";
			$r=$this->queryOne($sql);
			
			/*暂停和未过期的直接+相应天数，*/
			if($r['id']){
				if($this->isvalid($r)){
					$arrsql[]="update serviceown set ownday=ownday+$dbbuydays,pausenum=pausenum+$pausenum, ctime = $ctime where id={$r['id']} "; //原来的天数加上新增的天数
				}
				else{ //已过期,相当于重新激活
					$arrsql[]="update serviceown set startdate = $ctime, ownday=$dbbuydays,pausenum=$pausenum, ctime = $ctime where id={$r['id']} "; //原来的天数加上新增的天数
				}
			}
			else{
				$arrsql[]="insert into serviceown(uid,pcode,firstcate,ownday,startdate,pausenum,ctime) values($uid,$pkey,$ikey,$dbbuydays,$ctime,$pausenum,$ctime)"; //新记录
			}
		
		}
		if($_POST['admin'] != -1){
			$u = $this->queryOne("select golden from u_user where id = $uid");
			if($u['golden']<$alltotalprice){
				msg("您的金币不够哦，请先充值","../pay.php");
				exit;
			}
		}
		
		$sqlc = substr($sqlc,1,strlen($sqlc));
		
		//更新用户服务购买表
		$sql="insert into servicebuy(uid,pcode,firstcate,servicecode,buydays,buydate,unitprice,totalprice,ctime) values $sqlc";
		
		if(!$this->query($sql)){
			msg("你购买的服务没有成功，不过并没有扣除你金币。","vip.mgr.php");
		}
		//echo $sql;
		//更改用户拥有的服务
		//var_dump($arrsql);
		foreach($arrsql as $v){
			if(!($this->query($v))){
				msg("出错了，请联系网站服务人员","vip.mgr.php");
			}
		}
		
		//减去该用户的相应金币数
		if($_POST['admin'] != -1){
			$sql="update u_user set golden=golden-$alltotalprice where id=$uid";
		}
		if(!$this->query($sql)){
			msg("出错了，请联系网站服务人员","vip.mgr.php"); //没有扣除相应的金币，但购买记录已经有了
		}
		
		return true;
		
		if(status){
			//
		}
		else{
			//报错
			//将用户填写的内容，写入到文本框里，减少用户重复劳动
		}
	}
	function modify($post){
		//$this->upfile($_FILES['thumb']); //上传图片
		extract($post);
		//var_dump($post);
		$pl=loadmodel("place","control");
		$province=$pl->get($address,"province");
		$city=$pl->get($address_city,"city");
		$area=$pl->get($address_area,"area");
		$add=$province['title']."/".$city['title']."/".$area[title];
		$thumb=$this->thumb;
		$sql="update {__TABLE__} set infotype=$infotype,name='$name',proinfoname='$proinfoname',firsttype=$firsttype,secondtype=$secondtype,proname='$proname',address='$add',etime=$etime,username='$username',tel='$tel',thumb='$thumb',content='$content',ctime=".time()." where id=$jid";
		//echo "<br>sql=".$sql;
		$r=$this->query($sql);
		//$this->updateimgtable(); //更新图片数据库
		return $r;
	}
	
	
	/**
	 * 得到剩下天数
	 *
	 * @param unknown_type $num 数量
	 * @param unknown_type $id 记录ID
	 */
	function getsurplus($v){
		if($v['pause'] == 1){
			$surplus = $v['ownday'];
		}else{
			$daysecond = 3600*24;
			$span = ($v['startdate'] + $v['ownday'] * $daysecond) - time();
			$surplus = round($span / $daysecond);
			if($surplus<0){
				$surplus = 0;
			}
		}
		
		return $surplus;
	}
	
	/** 
	 * 得到拥有的服务列表
	 *
	 * @param unknown_type $num 数量
	 * @param unknown_type $id 记录ID
	 */
	function getlist($viptype = '', $pagesize=15,$query='?') {
		
		/*if ($id) {
			$where = " and id=$id";
		}*/
		$order = " order by s.id desc";
		//1 正在使用的用户
		//2 暂停的用户
		//3 已过期的用户
		switch($viptype){
			case 1 :
				$time = time();
				$where .= " and s.ownday * 24 * 3600 + s.startdate >= $time";
				break;
			case 2 :
				$where .= " and pause =1 ";
				break;
			case 3 :
				$time = time();
				$where .= " and s.ownday * 24 * 3600 + s.startdate < $time  and pause = 0";
				break;
			default : "";
			
		}
		$where = " where 1=1 and u.id = s.uid and c.uid = s.uid  $where  $order ";
		
		
		$sql = "select s.id from {__TABLE__} as s,u_user as u, u_unit as c".$where;
		//echo $sql;
		if ($num) {
			$limit = " limit $num";
		} else{
			$limit = $this->getpage($sql,$pagesize,$query);
		}
		
		
		$sql = "select s.*, c.title as ctitle, u.username as username from {__TABLE__} as s,u_user as u, u_unit as c $where  limit $limit";
		//echo $sql;
		$r = $this->query ( $sql );
		if($r){
			$province = getprovince (); //省列表
			$industrybigcate = getindustrybigcate (); //人才类别列表
			foreach( $r as $k => $v ) {
				$r[$k]['pcode'] = $province[$v['pcode']];
				
				if($v['firstcate'] == -1){
					$r[$k]['firstcate'] = '不限';
				} else {
					$r[$k]['firstcate'] = $industrybigcate[$v['firstcate']]['title'];
				}
				if(!$r[$k]['pause']){
					$r[$k]['valid'] = ($v['ownday']*24*3600 + $v['startdate']) > time() ? true : false;
				}else{
					$r[$k]['valid'] = false;
				}
				$r[$k]['surplus'] = $this->getsurplus($v);
				$r[$k]['startdate'] = date('Y-m-d',$v['startdate']);
				$r[$k]['ctime'] = date('Y-m-d',$v['ctime']);
			}
			
		}
		
		
		return  array('list'=>$r,'page'=>$this->page);
	}
	
	function pastduePrompt(){
		$province = getprovince (); //省列表
		$industrybigcate = getindustrybigcate (); //人才类别列表
		$sql = "select s.*,u.email, u.username from serviceown as s,u_user as u where u.id=s.uid ";
		$r = $this->query($sql);
		foreach($r as $k => $v){
			$surplus = $this->getsurplus($v);
			$text = $this->getprovince($v).$this->getfirstcate($v).'服务';
			if(($v['email_num'] ==0 && $surplus < 10 && $surplus > 5) || ($v['email_num'] == 1 && $surplus <= 5 && $surplus > 0)){
				$content = "您的 [".$text."] 美容招聘VIP会员服务将于".$surplus."天后过期请及时续费.以免影响招聘工作的开展<br>结束前续费,享受9折优惠的机会";
				$this->promptEmail("您的[".$text."]将于".$surplus."天后过期，现在续费将打9折---中华美容网 ", $content, $v);
				$this->query("update serviceown set email_num = email_num + 1 where id = {$v['id']}");
				
				//echo "update servceown set email_num = email_num + 1 where id = {$v['id']}";
			} elseif($v['email_num'] == 2 && $surplus <=0 ){
				$content = "您的 [".$text."]美容招聘VIP会员服务已过期，谢谢您的使用。";
				$this->promptEmail("您的[".$text."]美容招聘VIP会员服务已过期---中华美容网", $content, $v);
				$this->query("update serviceown set email_num = email_num + 1 where id = {$v['id']}");
			}
		}
	}
	function promptEmail($text,$content,$line){
		$body = @file_get_contents(ROOT_VIEW.'/template/mail/unit/vip_notif.html');
		global $mainurlcfg;
		$body =  str_replace('{$content}',$content,str_replace('{$mainurl}', $mainurlcfg, str_replace('{URL_PUBLIC}', URL_PUBLIC, str_replace('{$date}', date('Y年m月d日'), $body))));

		$msg = sendmail("$text",$body,$line['email'], $line['username']);
		echo $msg;
	}
	function getfirstcate($v){
		$industrybigcate = getindustrybigcate (); //人才类别列表
		if($v['firstcate'] == -1){
			return '不限';
		}
		return $industrybigcate[$v['firstcate']]['title'];
	}
	
	
	function getprovince($v){
		$province = getprovince (); //省列表
		return $province[$v['pcode']];
	}
	/**
	 * 得到拥有服务列表，通过UID
	 *
	 * @param unknown_type $uid
	 * @return 返回服务列表,并且增加标识相应的服务是否有效的字段
	 */
	function getlistbyuid($uid) {
		//echo $uid;
		$sql = "select * from __TABLE__ where uid = $uid";
		//echo $sql;
		$r = $this->query ( $sql );
		
		
		//$industrybigcate = $this->cate;//getindustrybigcate (); //人才类别列表
		//dump($industrybigcate);
		if($r){
			foreach( $r as $k => $v ) {
				$r[$k]['pcode'] = getProvinceByKey($v['pcode']);
				
				$r[$k]['firstcate'] = $v['firstcate'];//echo $r[$k]['firstcate'];
				if(!$r[$k]['pause']){
					$r[$k]['valid'] = ($v['ownday']*24*3600 + $v['startdate']) > time() ? true : false;
				}else{
					$r[$k]['valid'] = false;
				}
				$r[$k]['leaveday'] = $this->getsurplus($v);
			}
		}
		//dump($r);exit;
		return  $r;
	}
	
	/**
	 * 判断用户是否拥有指定的服务
	 */
	function ownpersonsersvice($cid, $local, $cateids){
		//将所有类别转成父id,并保证以逗号分隔
		
		$cateids = explode(',',$cateids); //解开
		foreach($cateids as $k=>$v){
			$parent = $this->e->getParent($v);
			if($parent){
				$cateids[$k] = $parent;
			}
		}
		$cateids = array_unique($cateids); //去重复
		$cateids = implode(',',$cateids); //合并
		
		$servicelist = $this->getlistbyuid($cid);//dump($servicelist);
		//判断是否拥有此类服务
		if (!is_array($servicelist)){
			return false;
		}
		foreach ($servicelist as $k => $v) {
			if (!$v['valid']) {
				continue;
			}
			if($v['pcode'] == '中国' || is_int(strpos($local,$v['pcode']))){
				if($v['firstcate'] == -1 || is_int(strpos($cateids,$v['firstcate']))){
					return  true;
				}
			}
		}
	}
	
	/**
	 * 判断用户是否拥有指定的服务
	 */
	function ownpersonsersvice2($cid, $local, $cateid){
		$cate = $this->e->getOneArray('job_category');
		if($cate[$cateid]['parentid']){
			$cateid = $cate[$cateid]['parentid'];
		}
		
		$servicelist = $this->getlistbyuid($cid);
	
		//判断是否拥有此类服务
		if (is_array($servicelist)) 
		foreach ($servicelist as $k => $v) {
			if (!$v['valid']) {
				continue;
			}
			if($v['pcode'] == '中国' || is_int(strpos($local,$v['pcode']))){
				if($v['firstcate'] == -1 || $v['firstcate'] == $cateid){
					return  true;
				}
			}
		}
	}
	
	/**
	 * 暂停
	 */
	function pause($id){
		$r = $this->queryOne("select * from serviceown where id=$id");
		if(!is_array($r)){
			return "没有此服务记录";
		}
		$daysecond = 3600*24;
		//echo $v['startdate'] + $v['ownday'] * $daysecond;
		$span = ($r['startdate'] + $r['ownday'] * $daysecond) - time();
		//echo $span;
		if($r['pausenum'] >0 && $span>0){
			$time = time();
			$ownday = round($span / $daysecond);
			$sql = "update serviceown set startdate = $time,ctime = $time, pausedate = $time, pausenum = pausenum-1, pause=1, ownday = $ownday where id = $id";
			//echo $sql;
			$r = $this->query($sql);
			if($r){
				return "成功";
			}else{
				return '数据操作出错';
			}
		}else{
			return "暂停次数已用完或该服务已过期";
		}
		//exit('hi');
		//$sql = "update "
	}
	
	/**
	 * 取消暂停
	 */
	function unpause($id){
		$time = time();
		$r = $this->query("update serviceown set pause=0,startdate = $time where id = $id");
		if($r){
			return "成功";
		}else{
			return '数据操作出错';
		}
		
	}
	
	/**
	 * 服务是否过期
	 */
	function isvalid($v){
		if(!$v['pause']){
			return ($v['ownday']*24*3600 + $v['startdate']) > time() ? true : false;
		}
		
	}
	
	function getpage($sql,$psize=15, $query = ""){
		//分页处理

		$pno=fil_str($_GET['page'],2); //当前要显示的页码
		if($pno<1) //页码小于1则为1
			$pno=1;
		$count=$this->sql_num($sql); //查询得到总页数
		//echo $count;
		$this->p->load($pno,$psize,$count,$query);
		$this->page = $this->p->show();
		$num=($pno-1)*$psize.",".$psize;
		return $num;
	}
	
	

}
?>