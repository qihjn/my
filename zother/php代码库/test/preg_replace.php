<?php
	$path = 'upload/2011/05/30/4de31bcb77d2e.jpg';
	$path = preg_replace("/(.+)\.(jpg|png|gif|jpeg)/", '$1'.'_s.'.'$2', $path);
	
	$str = '板凳,是啊，因为右边的房间的东西想过去都死掉了。怎么办？？？？？？？？？#图片#？？？？？？？？？[:疑:][:疑问:][:疑:][:晕问:][:s问:],25无能为力了.......,音乐非常GOOD！！！,[:疑问:]好多不会玩的！求助！';
	$str = preg_replace("/(\[:.+?:\])/",'',$str);
	$str = str_replace("#图片#",'',$str);
	echo $str;
?>