<?php
$st = gettimeofday(1);
    mysql_connect("10.240.130.87", "root", "2144testmysql") or
        die("Could not connect: " . mysql_error());
    mysql_select_db("app_2144_cn");

    $result = mysql_query("SELECT * FROM t_comment where f_image <>'' order by f_id desc limit 10");
	
	$data = array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        if($row['f_image']){
			$pr = mysql_query("select flower from t_photo where topicid={$row['f_comment_id']}");
			if($r1 = mysql_fetch_row($pr,MYSQL_ASSOC)){
				$row['flower'] = $r1['flower'];
			}
			$data[] = $row;
		}
		$data[] = $row;
    }
    mysql_free_result($result);
	//var_dump($data);
echo "<hr />";
echo gettimeofday(1)-$st; //执行时间 0.034759044647217

$st = gettimeofday(1);
    mysql_connect("10.240.130.87", "root", "2144testmysql") or
        die("Could not connect: " . mysql_error());
    mysql_select_db("app_2144_cn");

    $result = mysql_query("SELECT t_comment.*,t_photo.flower FROM t_comment,t_photo where f_image <>'' and topicid =  f_comment_id order by f_id desc limit 10");
	$data = array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$data[] = $row;
    }
    mysql_free_result($result);
	//var_dump($data);
echo "<hr />";
echo gettimeofday(1)-$st; //执行时间 0.0041599273681641 

?> 