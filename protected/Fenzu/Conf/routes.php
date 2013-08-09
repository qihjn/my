<?php
return array(
	// 常规路由测试
	'system'=>array('Admin.Index','routes1','id'),
    // 泛路由测试 路由名称是
	'abc@'=>array(
		array('/^\/(\d+)(\/p\/\d)?$/','Admin.Index','routes2','id'),
        array('/^\/(\d+)\/(\d+)/','Admin.Index','routes2','year,month'),
	),
);
?>