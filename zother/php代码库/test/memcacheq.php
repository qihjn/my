<?php
session_start();
$memcache_obj = new Memcache;
$memcache_obj->connect('10.240.128.84', 21201) or die ("连接MemcacheQ服务器失败");
if($_GET['a'] == "s"){
	if(!$_SESSION['i']){
		$_SESSION['i'] = 1;
	}else {
		$_SESSION['i']++;
	}
	echo "加入消息队列(入栈):".$_SESSION['i'];
	memcache_set($memcache_obj, 'test',$_SESSION['i'], 0, 0);
}else{
	/* consume a message from 'demoqueue1' */
	echo "读出消息队列(出栈)".memcache_get($memcache_obj, 'test');
}
memcache_close($memcache_obj);
?>
