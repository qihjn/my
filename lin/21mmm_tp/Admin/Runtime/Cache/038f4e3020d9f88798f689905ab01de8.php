<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理平台 <?php echo (THINK_VERSION); ?></title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/style.css" />
<script type="text/javascript" src="__PUBLIC__/Js/publicVar.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Base.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Ajax/ThinkAjax.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Form/CheckForm.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
<script language="JavaScript">
<!--
//指定当前组模块URL地址 
var URL = '__URL__';
var APP	 =	 '__APP__';
var PUBLIC = '__PUBLIC__';

//-->
</script>
</head>

<body >

<!-- 菜单区域  -->

<!-- 主页面开始 -->
<div id="main" class="main" >

<!-- 主体内容  -->
<div class="content" >
<div class="title">数据列表</div>
<!--  功能操作区域  -->
<div class="operate" >
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="add" value="新增" onclick="add()" class="add imgButton"></div>
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="edit" value="编辑" onclick="edit()" class="edit imgButton"></div>
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="delete" value="删除" onclick="foreverdel()" class="delete imgButton"></div>
<!-- 查询区域 -->
<div class="fRig">
<form method='post' action="__URL__">
<div class="fLeft"><span id="key"><input type="text" name="name" title="组名" class="medium" ></span></div>
<div class="impBtn hMargin fLeft shadow" ><input type="submit" id="" name="search" value="查询" onclick="" class="search imgButton"></div>

<!-- 高级查询区域 -->
<div  id="searchM" class=" none search cBoth" >
</div>
</form>
</div>
</div>
<!-- 功能操作区域结束 -->

<!-- 列表显示区域  -->
<div class="list" >
<!-- 列表 -->
<table id="checkList" class="list" cellpadding=0 cellspacing=0 ><tr><td height="5" colspan="11" class="topTd" ></td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('checkList')"></th><th width="5%"><a href="javascript:sortBy('id','<?php echo ($sort); ?>','index')" title="按照编号<?php echo ($sortType); ?> ">编号<?php if(($order)  ==  "id"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('title','<?php echo ($sort); ?>','index')" title="按照职位<?php echo ($sortType); ?> ">职位<?php if(($order)  ==  "title"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('title','<?php echo ($sort); ?>','index')" title="按照标题<?php echo ($sortType); ?> ">标题<?php if(($order)  ==  "title"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('job_request','<?php echo ($sort); ?>','index')" title="按照求职意向<?php echo ($sortType); ?> ">求职意向<?php if(($order)  ==  "job_request"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('local','<?php echo ($sort); ?>','index')" title="按照工作地<?php echo ($sortType); ?> ">工作地<?php if(($order)  ==  "local"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('mobile','<?php echo ($sort); ?>','index')" title="按照手机<?php echo ($sortType); ?> ">手机<?php if(($order)  ==  "mobile"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('email','<?php echo ($sort); ?>','index')" title="按照邮箱<?php echo ($sortType); ?> ">邮箱<?php if(($order)  ==  "email"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('ctime','<?php echo ($sort); ?>','index')" title="按照发表时间<?php echo ($sortType); ?> ">发表时间<?php if(($order)  ==  "ctime"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('status','<?php echo ($sort); ?>','index')" title="按照状态<?php echo ($sortType); ?> ">状态<?php if(($order)  ==  "status"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width=10%>操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): ++$i;$mod = ($i % 2 )?><tr class="row" onmouseover="over(event)" onmouseout="out(event)" onclick="change(event)" ><td><input type="checkbox" name="key"	value="<?php echo ($user["id"]); ?>"></td><td><?php echo ($user["id"]); ?></td><td><a href="javascript:edit('<?php echo (addslashes($user["id"])); ?>')"><?php echo ($user["title"]); ?></a></td><td><?php echo ($user["title"]); ?></td><td><?php echo ($user["job_request"]); ?></td><td><?php echo ($user["local"]); ?></td><td><?php echo ($user["mobile"]); ?></td><td><?php echo ($user["email"]); ?></td><td><?php echo (toDate($user["ctime"],'y-m-d')); ?></td><td><?php echo (getStatus($user["status"])); ?></td><td> <?php echo (showStatus($user["status"],$user['id'])); ?>&nbsp;<a href="javascript:edit('<?php echo ($user["id"]); ?>')">编辑</a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td height="5" colspan="11" class="bottomTd"></td></tr></table>
<!--  系统列表组件结束 -->
 
</div>
<!--  分页显示区域 -->
<div class="page"><?php echo ($page); ?></div>
<!-- 列表显示区域结束 -->
</div>
<!-- 主体内容结束 -->
</div>
<!-- 主页面结束 -->

 <style>
 body{font-family:tahoma}
 div.footer{ clear:both; padding:8px 0px; width:98%; text-align:center; font:normal normal normal 11px Verdana,Geneva,Arial,Helvetica,sans-serif; background-color:#464646; border-top:2px solid silver; color:silver}
div.footer a{color:white; text-decoration:none; border-bottom:1px dotted}
div.footer a:hover{color:silver; text-decoration:none; border-bottom:1px dotted}
.think_run_time{text-align:center; width:100%;font-size:12px;}
</style>
<!-- 版权信息区域 -->
<!--<div id="footer" class="footer" >Powered by qihjn <?php echo (THINK_VERSION); ?> | Template designed by <a target="_blank" href="http://www.wzrun.com">TopThink</a> <span id="run"></span>
</div>-->
</body>
</html>
<script type="text/javascript" src="__PUBLIC__/Js/Base.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Ajax/ThinkAjax.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Form/CheckForm.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>