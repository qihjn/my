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
<table width="100%" border="1" cellpadding="3" cellspacing="3" id="search-table"><form method="get" action="__URL__">
		<tr>
		  <th>公司ID</th><td><input name="nid" type="text" id="nid" value="<?php echo ($q["pid"]); ?>"></td>
		  <th>用户ID</th>
		  <td><input name="uid" type="text" id="uid" value="<?php echo ($q["uid"]); ?>" /></td>
		  <th>用户名</th>
		  <td><input name="username" type="text" disabled="disabled" id="username" value="<?php echo ($q["usernaem"]); ?>" /></td>
		  </tr>
		<tr>
		  <th>联系人</th><td><input name="realname" type="text" id="realname" value="<?php echo ($q["realname"]); ?>"></td>
		  <th>公司名称</th>
		  <td><input name="title" type="text" id="title" value="<?php echo ($q["title"]); ?>" /></td>
		  <th>Email</th>
		  <td><input type="text" name="email" id="email" /></td>
		  </tr>
		<tr>
		  <th>公司所在地</th><td><select name="province" id="province">
          </select>
		      <select name="city" id="city">    </select></td>
		  <th>行业</th>
		  <td><select name="firstRequest" id="firstRequest">
		      <option value="">不限</option>
		  	  </select>
          <select name="job_request" id="secondRequest">
		      <option value="">不限</option>
		  </select></td>
		  <th>其它</th>
		  <td><input name="thumb" type="checkbox" id="thumb" /></td>
		</tr>
		<tr>
		    <th>其它参数</th><td>
		        <select name="up" id="up">
		            <option value="" selected="selected">未推荐</option>
		            <option value="1">已推荐</option>
		            </select>
		        <select name="top" id="top">
		                    <option value="" selected="selected">未置顶</option>
		                    <option value="1">已置顶</option>
		                    </select>
		        <select name="status" id="status">
		            <option value="" selected="selected">显示中</option>
		            <option value="1">隐藏中</option>
		            </select></td>
		    <th>结果排序</th>
		    <td><select name="_order" id="_order">
		        <option value="" selected="selected">默认排序</option>
		        <option value="viewCount">点击数排序</option>
		        </select>
		        <select name="_sort" id="_sort">
		            <option value="0" selected="selected">递减</option>
		            <option value="asc">递增</option>
                </select>
		        <select name="listRows" id="listRows">
		            <option value="15">默认15个</option>
		            <option value="20">每页显示20个</option>
		            <option value="50">每页显示50个</option>
		            <option value="100">每页显示100个</option>
		            </select>
		       
		        <script type="text/javascript">
/*
	设定选择值
*/

setValue("pid",'<?php echo $_GET["pid"];?>');
setValue("uid",'<?php echo $_GET["uid"];?>');
setValue("username",'<?php echo $_GET["username"];?>');
setValue("realname",'<?php echo $_GET["realname"];?>');
setValue("resumename",'<?php echo $_GET["resumename"];?>');
setValue("email",'<?php echo $_GET["email"];?>');
/*selectByValue("province",'安徽省');
showCity("city","安徽省");
selectByValue("city",'巢湖市');*/
	//$("#firstRequest").val('<?php echo ($_GET['firstRequest']); ?>');
//	$("#categoryId").val('<?php echo ($_GET['categoryId']); ?>');
//	$("#userId").val('<?php echo ($_GET['userId']); ?>');
//	$("#createTime").val('<?php echo ($_GET['createTime']); ?>');
//	$("#createTime1").val('<?php echo ($_GET['createTime1']); ?>');
//	$("#recommend").val('<?php echo ($_GET['recommend']); ?>');
//	$("#status").val('<?php echo ($_GET['status']); ?>');
//	$("#istop").val('<?php echo ($_GET['istop']); ?>');
//	$("#viewCount").val('<?php echo ($_GET['viewCount']); ?>');
//	$("#viewCount1").val('<?php echo ($_GET['viewCount1']); ?>');
//	$("#orderType").val('<?php echo ($_GET['orderType']); ?>');
//	$("#orderBy").val('<?php echo ($_GET['orderBy']); ?>');
//	$("#pageSize").val('<?php echo ($_GET['pageSize']); ?>');
	
	//document.getElementById("email").value="sb";
//	alert(document.getElementById("email").value);
	
                </script></td>
		    <th><input type="submit" name="submit" value="搜索" class="submit" id="submit" /></th>
		    <td> 要查询均为精确查找 <a href="__URL__" >默认 </a></td>
		    </tr>
		</form></table>
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
<table id="checkList" class="list" cellpadding=0 cellspacing=0 ><tr><td height="5" colspan="9" class="topTd" ></td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('checkList')"></th><th width="8%"><a href="javascript:sortBy('nid','<?php echo ($sort); ?>','index')" title="按照编号<?php echo ($sortType); ?> ">编号<?php if(($order)  ==  "nid"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('title','<?php echo ($sort); ?>','index')" title="按照机构名称<?php echo ($sortType); ?> ">机构名称<?php if(($order)  ==  "title"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('location','<?php echo ($sort); ?>','index')" title="按照机构所在地<?php echo ($sortType); ?> ">机构所在地<?php if(($order)  ==  "location"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('category_id','<?php echo ($sort); ?>','index')" title="按照行业<?php echo ($sortType); ?> ">行业<?php if(($order)  ==  "category_id"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('contacter','<?php echo ($sort); ?>','index')" title="按照联系人<?php echo ($sortType); ?> ">联系人<?php if(($order)  ==  "contacter"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('ctime','<?php echo ($sort); ?>','index')" title="按照发表时间<?php echo ($sortType); ?> ">发表时间<?php if(($order)  ==  "ctime"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('status','<?php echo ($sort); ?>','index')" title="按照状态<?php echo ($sortType); ?> ">状态<?php if(($order)  ==  "status"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width=10%>操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): ++$i;$mod = ($i % 2 )?><tr class="row" onmouseover="over(event)" onmouseout="out(event)" onclick="change(event)" ><td><input type="checkbox" name="key"	value="<?php echo ($user["nid"]); ?>"></td><td><?php echo ($user["nid"]); ?></td><td><a href="javascript:edit('<?php echo (addslashes($user["nid"])); ?>')"><?php echo ($user["title"]); ?></a></td><td><?php echo ($user["location"]); ?></td><td><?php echo (getEnumTitle($user["category_id"],'profesion')); ?></td><td><?php echo ($user["contacter"]); ?></td><td><?php echo (toDate($user["ctime"],'y-m-d')); ?></td><td><?php echo (getStatus($user["status"])); ?></td><td> <?php echo (showStatus($user["status"],$user['id'])); ?>&nbsp;<a href="javascript:edit('<?php echo ($user["nid"]); ?>')">编辑</a>&nbsp;<a href="javascript:jobAdd('<?php echo ($user["nid"]); ?>')">添加职位</a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td height="5" colspan="9" class="bottomTd"></td></tr></table>
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
<script language="javascript" src="__PUBLIC__/Js/Job/city.js"></script>
<script language="javascript">
function jobAdd(id){
		var keyValue;
		if (id)
		{
			keyValue = id;
		}else {
			keyValue = getSelectCheckboxValue();
		}
		if (!keyValue)
		{
			alert('请选择编辑项！');
			return false;
		}
		location.href =  APP+"/Job/add/cid/"+keyValue;
	}
	
	loadProvinceCicy("province","city");
</script>