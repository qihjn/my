<?php
// 用户模型
class JobCollectModel extends CommonModel {
	protected $trueTableName = 'n_colle'; 
	
	public function insert(){
		// 收藏职位
			if($u['u_type'] != 'unit') msg('您不是企业会员', '/');
			foreach($ids as $id) {
			$job = $this->queryOne("select u_unit.uid, u_unit.title from u_unit left join n_job on n_job.uid=u_unit.uid where n_job.id='{$id}' limit 1");
			if($line) continue;
			
			$fav = $this->queryOne("select count(*) from u_p_fav where uid='{$u['uid']}' and jid='{$id}'");
			if($fav) continue;
			
			$sql = "insert into u_p_favor(uid, jid, cid, company, ctime) values('{$u['uid']}', '{$id}', '{$job['uid']}', '{$job['title']}', '{$time}')";
			if($this->query($sql)) ++$sum;
		}
		

	}
	
	
}
?>