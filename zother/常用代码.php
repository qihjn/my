<?php 

//文件缓存
$g_img_cache = "./cache_g_img.php";
$cachetime = 20;
if(file_exists($g_img_cache) && (time()-filemtime($g_img_cache) < $cachetime) ){
		$imgs = include($g_img_cache);
		//$imgs = unserialize($imgs);
		return $imgs[$id];
	}else{
		$sql = "select id, pic, pic_1, sortid from flash_flash  ";
		$r = sql_fetch($sql);
		$imgs = array();
		foreach($r as $k => $v){
			$imgs[$v['id']] = $v;
		}
		
		$reValue = $imgs[$id];
		$imgs = var_export($imgs,true);
		//serialize($imgs);
		//var_dump($imgs);
		
		$c = '<?php return '.$imgs.'?>';
		@file_put_contents($g_img_cache,$c);
		return $reValue;
	}
	
	
	
	
	
//json返回
if($v){
	$data['error'] = 0;
	$data['img'] = $v;
}else{
	$data['error'] = 1;
	$data['img'] = $defalutImg;
	$data['msg'] = '没有图片';
}

$jsonp = $_GET['jsoncallback'];
echo "$jsonp(".json_encode($data).");";



	
?>