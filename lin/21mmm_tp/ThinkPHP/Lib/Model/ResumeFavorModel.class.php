<?php
class ResumeFavorModel extends CommonModel {
	protected $trueTableName = 'n_colle'; 

	/**
	  * 收藏简历
	  *
	  */
	public function insert($uid = ''){
		
		$ids = validExplode(',', $_REQUEST['id']);
		if(!ids) return;
		$time = time();
		$sum = 0;
		foreach($ids as $id) {
				$line = $this->queryOne("select pid from u_person where pid='{$id}' limit 1");
				if(!$line['pid']) continue;
				
				$fav = $this->queryOne("select id from u_unit_favor where uid='{$uid}' and person_id='{$id}'");	// u_person.pid
				
				if($fav){ //已收藏则更新时间
					$sql = "update u_unit_favor set ctime = $time where  uid='{$uid}' and person_id='{$id}'";
				}else{
					$sql = "insert into u_unit_favor(uid, person_id, ctime) values('$uid', '{$id}', '{$time}')";
				}
				//ri($this->execute($sql));
				if($this->execute($sql)){
					++$sum;
					
				}
			}
		//echo $sum;
		if($sum){
			return true;
		}
		
	}
	
	
}
?>