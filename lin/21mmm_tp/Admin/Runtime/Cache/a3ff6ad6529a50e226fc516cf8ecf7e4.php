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
<script language="javascript" type="text/javascript" src="/Public/Js/Job/cate.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/Job/city.js"></script>
<!-- 查询区域 -->
<table width="100%" border="1" cellpadding="3" cellspacing="3" id="search-table"><form method="get" action="__URL__">
		<tr>
		  <th width="8%">简历ID</th><td width="25%"><input name="pid" type="text" id="pid" value="<?php echo ($q["pid"]); ?>"></td>
		  <th width="9%">用户ID</th>
		  <td width="31%"><input name="uid" type="text" id="uid" value="<?php echo ($q["uid"]); ?>" /></td>
		  <th width="10%">用户名</th>
		  <td width="17%"><input name="username" type="text" disabled="disabled" id="username" value="<?php echo ($q["username"]); ?>" size="20" /></td>
		  </tr>
		<tr>
		  <th>姓名</th><td><input name="realname" type="text" id="realname" value="<?php echo ($q["realname"]); ?>"></td>
		  <th>简历名称</th>
		  <td><input name="resumename" type="text" id="resumename" value="<?php echo ($q["resumename"]); ?>" /></td>
		  <th>Email</th>
		  <td><input name="email" type="text" id="email" size="20" /></td>
		  </tr>
		<tr>
		  <th>求职地区</th><td><select name="province" id="province"></select><select name="city" id="city"></select></td>
		  <th>行业类别</th>
		  <td><select name="firstRequest" id="firstRequest">
		      <option value="">不限</option>
		  	  </select>
          <select name="job_request" id="secondRequest">
		      <option value="">不限</option>
		  </select></td>
		  <th>照片简历</th>
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
	</div>
	

	
<!--  功能操作区域  -->
<div class="operate" >
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="add" value="新增" onclick="add()" class="add imgButton"></div>
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="edit" value="编辑" onclick="edit()" class="edit imgButton"></div>
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="delete" value="删除" onclick="foreverdel()" class="delete imgButton"></div>
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="delete" value="投递" onclick="foreverdel()" class="delete imgButton"></div>
选择简历->选择公司


</div>
<!-- 功能操作区域结束 -->

<!-- 列表显示区域 一共100%,还有8px指定给了checkbox,所以总共是100%+8px  -->
<div class="list" >
<!-- 列表 -->
<table id="checkList" class="list" cellpadding=0 cellspacing=0 ><tr><td height="5" colspan="11" class="topTd" ></td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('checkList')"></th><th width="5%"><a href="javascript:sortBy('pid','<?php echo ($sort); ?>','index')" title="按照编号<?php echo ($sortType); ?> ">编号<?php if(($order)  ==  "pid"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="5%"><a href="javascript:sortBy('realname','<?php echo ($sort); ?>','index')" title="按照姓名<?php echo ($sortType); ?> ">姓名<?php if(($order)  ==  "realname"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="15%"><a href="javascript:sortBy('resumename','<?php echo ($sort); ?>','index')" title="按照标题<?php echo ($sortType); ?> ">标题<?php if(($order)  ==  "resumename"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="20%"><a href="javascript:sortBy('job_request','<?php echo ($sort); ?>','index')" title="按照求职意向<?php echo ($sortType); ?> ">求职意向<?php if(($order)  ==  "job_request"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="15%"><a href="javascript:sortBy('local','<?php echo ($sort); ?>','index')" title="按照工作地<?php echo ($sortType); ?> ">工作地<?php if(($order)  ==  "local"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('email','<?php echo ($sort); ?>','index')" title="按照邮箱<?php echo ($sortType); ?> ">邮箱<?php if(($order)  ==  "email"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="5%"><a href="javascript:sortBy('uid','<?php echo ($sort); ?>','index')" title="按照用户ID<?php echo ($sortType); ?> ">用户ID<?php if(($order)  ==  "uid"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="10%"><a href="javascript:sortBy('ctime','<?php echo ($sort); ?>','index')" title="按照发表时间<?php echo ($sortType); ?> ">发表时间<?php if(($order)  ==  "ctime"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="5%"><a href="javascript:sortBy('status','<?php echo ($sort); ?>','index')" title="按照状态<?php echo ($sortType); ?> ">状态<?php if(($order)  ==  "status"): ?><img src="__PUBLIC__/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width=10%>操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): ++$i;$mod = ($i % 2 )?><tr class="row" onmouseover="over(event)" onmouseout="out(event)" onclick="change(event)" ><td><input type="checkbox" name="key"	value="<?php echo ($user["pid"]); ?>"></td><td><?php echo ($user["pid"]); ?></td><td><a href="javascript:edit('<?php echo (addslashes($user["pid"])); ?>')"><?php echo ($user["realname"]); ?></a></td><td><?php echo ($user["resumename"]); ?></td><td><?php echo (getEnumTitle($user["job_request"])); ?></td><td><?php echo ($user["local"]); ?></td><td><?php echo ($user["email"]); ?></td><td><?php echo ($user["uid"]); ?></td><td><?php echo (toDate($user["ctime"],'y-m-d')); ?></td><td><?php echo (getStatus($user["status"])); ?></td><td> <?php echo (showStatus($user["status"],$user['id'])); ?>&nbsp;<a href="javascript:edit('<?php echo ($user["pid"]); ?>')">编辑</a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td height="5" colspan="11" class="bottomTd"></td></tr></table>
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

<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/Inc/Enum.js"></script>

<script language="" type="text/javascript">


//创建select
function createSelect(name,egroup,valueKey){
	if(!name) name = 'job_request';
	if(!valueKey) valueKey = "evalue";
	//if(!egroup) egroup = "";
	//var egroup = 'job_category';
	//var html = '<select name="'+name+'" id="'+name+'">';
	var i = 1;
	for(var k in data){
		if(data[k]['egroup']==egroup){
			document.getElementById(name).options[i] = new Option(data[k]['ename'],data[k][valueKey]);
			i++;
			//html += '<option value="'+data[k][valueKey]+'">'+data[k]['ename']+'</option>';
		}
		
	}
	//html += '</select>';
	//return html;
}

//获取当前code
function getCode(value,egroup,valueKey){
	if(!valueKey) valueKey = 'evalue';
	//alert(egroup);
	for(var k in data){
		if(data[k]['egroup']==egroup && data[k][valueKey] == value){
			return data[k]['code'];
		}
	}
}


//alert(first());
createSelect("firstRequest","job_category");
createSelect("secondRequest",getCode('<?php echo ($_GET['firstRequest']); ?>'));

document.getElementById("firstRequest").onchange = function(){
	//alert(this.value);
	//alert(getCode(this.value,'job_category'));
	createSelect("secondRequest",getCode(this.value,'job_category'))
	
}


//选中select
var op = document.getElementById("firstRequest").options;
for(var i =0; i< op.length; i++){
	if(op[i].value  == '<?php echo ($_GET['firstRequest']); ?>'){
		//alert(i);
		document.getElementById("firstRequest").selectedIndex = i;
		//e.selectedIndex = 2;
	}
}
document.getElementById("realname").value = "<?php echo ($_GET['realname']); ?>";

//其它参数选中
selectByValue("up",'<?php echo ($_GET['up']); ?>');
selectByValue("top",'<?php echo ($_GET['top']); ?>');
selectByValue("status",'<?php echo ($_GET['status']); ?>');

//结果排序选中
selectByValue("up",'<?php echo ($_GET['_order']); ?>');
selectByValue("top",'<?php echo ($_GET['_sort']); ?>');
selectByValue("status",'<?php echo ($_GET['listRows']); ?>');

//行业选中
selectByValue("up",'<?php echo ($_GET['firstRequest']); ?>');
selectByValue("top",'<?php echo ($_GET['job_request']); ?>');

loadProvinceCicy("province","city");

//showCity("city","安徽省");
</script>