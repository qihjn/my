<?php
	$sql = "select  *  	 FROM     t_photo as p, flash_flash as f, my_2144_cn.uchome_member  as m where p.gid=f.id 
	and p.uid=m.uid order by id desc limit 10";
	$sql = preg_replace('/select .* from (.*) where (.*) .*/i',"select count(*) from $1 where $2",$sql);
	echo $sql;
?>