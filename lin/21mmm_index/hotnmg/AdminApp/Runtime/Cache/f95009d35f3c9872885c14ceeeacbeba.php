<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>shuguangCMS 企业网站管理中心</title>
<link id="mastercss" rel="stylesheet" href="__PUBLIC__/Admin/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="__PUBLIC__/Js/colorpicker/colorpicker.css" type="text/css">

<script type="text/javascript">
<!--
//指定当前组模块URL地址
var URL = '__URL__';
var APP	 =	 '__APP__';
var PUBLIC = '__PUBLIC__';
var ROOT = '__ROOT__';
//-->
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/Jquery/jquery.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/Jquery/jquery.validate.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/Jquery/cmxforms.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/script_common.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/colorpicker/colorpicker.js"/></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/My97DatePicker/WdatePicker.js"/></script>

</head>
<body>
<div id='loader' style='color:#ffffff;font-size:12px;background-color: #0099CC; width:140px; padding:2px 4px; height:20px; position: fixed;right:0px;top:2px; display:none'>提交中，请稍后...</div>
	<div id="wrap">
		<div id="header">
			<h2><a href="__APP__" title="shuguangCMS"><img src="__PUBLIC__/Admin/logo.gif" alt="shuguangCMS" /></a></h2>
			
			<div id="topmenu" class="gray">
			<span style="font-weight:bold">当前用户：<img src="__PUBLIC__/Admin/user.gif" alt="shuguangCMS" align="absmiddle"/><?php echo ($username); ?></span> 　 
				<a href="<?php echo U('Admin/modify',array('id'=>$adminId, 'jumpUri'=>'run' ));?>"><img src="__PUBLIC__/Admin/user_modify.gif" alt="shuguangCMS" align="absmiddle"/>我的帐户</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Public/logout');?>"><img src="__PUBLIC__/Admin/logout.gif" alt="shuguangCMS" align="absmiddle"/>退出系统</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo ($frontUrl); ?>" target="_blank"><img src="__PUBLIC__/Admin/home_25.gif" alt="shuguangCMS" align="absmiddle"/>前台首页</a>
			</div>
			<ul id="menu" style="display:none">
				<li><a href="Admin.php">管理平台</a></li>
				<li><a href="Admin.php?ac=$value"><?php echo ($_TPL[menunames][$value]); ?></a></li>
			</ul><div id="later" style="position:fixed"></div>
		</div>
		<div id="content">
<div class="mainarea">
<div class="maininner">
<script type="text/javascript">
    $(document).ready(function() {
        $("#mainFrom").validate({
            rules: {
                title: "required",
                content: "fckeditor",
                link_label: {
                    required: true,
                    english: true
                }
            },
            messages: {
                title: "标题必须填写",
                content: "内容必须填写",
                link_label: {
                    required: "标识必须填写",
                    english: '标识必须为英文字母或数字的组合'
                }
            }
        });
    });
</script>
<div class="block style4">
  <table cellspacing="3" cellpadding="3">
    <tr>
      <th style="width:50px; text-align:center"><a href="http://www.sgcms.cn/manual.php?app=shuguangCorp&module=<?php echo ($moduleName); ?>" target="_blank"><img src="__PUBLIC__/Admin/help_1.gif" alt="" align="absmiddle" /><br />
        帮助</a></th>
      <td>1.单页标识必须填写，并且只能为英言语字母或数字的组合。<br />
        2.若不上传图片附件，请不要选择文件和填写宽和高。指定宽和高则系统会按照指定的尺寸生成缩略图</td>
    </tr>
    </table>
</div>
<form method="post" action="<?php echo U("Page/doInsert");?>" enctype="multipart/form-data" id="mainFrom">
	<div class="body_content">
		<div class="top_action"><a href="__URL__">返回列表</a></div>
		<table cellspacing="0" cellpadding="0" id="maintable" class="formtable">
		<tr>
		  <th style="width:8em;"><label for="title">标　　题</label></th>
		<td><input name="title" id="title" size="60"></td></tr>
		
        <tr>
		  <th style="width:8em;">链接标识</th>
		<td><input name="link_label" type="text"   id="link_label" size="10"/></td></tr>
        
        
        
        <tr>
		  <th style="width:8em;">单页内容</th>
		<td> </td></tr>
        
        <tr>
		  <th colspan="2" >
		   <textarea name="content" cols="50" rows="4" id="content"></textarea>
<script src="__PUBLIC__/Js/FCKeditor/fckeditor.js"></script>
<script>
	var oFCKeditor = new FCKeditor('content') ;
	oFCKeditor.BasePath = '__PUBLIC__/Js/FCKeditor/';
	oFCKeditor.Width = '100%';
	oFCKeditor.Height = '400';
	oFCKeditor.ToolbarSet = 'Default';
	oFCKeditor.ReplaceTextarea();
</script></th>
		</tr>
        
         <tr>
		  <th colspan="2" style="width:8em;">以下为选填内容</th>
		</tr>
        <tr>
          <th style="width:8em;">图　　片</th>
          <td> <input name="attach_file" type="file" id="attach_file" /></td></tr>
          <tr>
            <th style="width:8em;">关 键 字</th>
          <td><input name="keyword" id="keyword" size="60"></td></tr>
         <tr>
           <th style="width:8em;"><label for="template">模　　板</label></th>
           <td><input name="template" id="template" value="" />没定义请留空，默认为 detail 不需要填写<span style="color:#F00">.html</span></td>
         </tr>
         <tr>
		  <th style="width:8em;">内容摘要</th>
		<td><textarea name="description" cols="60" rows="5"  id="description"></textarea></td></tr>
		<td></td>
		  </tr>
		</tbody>
		</table>
	</div>
	<div class="foot_action">
		<input type="submit" name="submit" value="提交录入" class="submit">
        <input type="reset" name="button" id="button" value="还原重填" class="submit"/>
	</div>
	</form>
</div>
</div>
<div class="side">
	<div class="block style1">
		<h2>常规设置</h2>
		<ul class="folder">
        <li class="Index"><a href="<?php echo U("Index/index");?>">后台首页</a></li>
		<li class="Config"><a href="<?php echo U("Config/index");?>">系统配置</a></li>
        <li class="Module"><a href="<?php echo U("Module/index");?>">系统模块</a></li>
        <li class="Theme"><a href="<?php echo U("Theme/index");?>">风格模板</a></li>
        <li class="Admin"><a href="<?php echo U("Admin/index");?>">管理员管理</a></li>
        <li class="AdminRole"><a href="<?php echo U("AdminRole/index");?>">角色管理</a></li>
		</ul>
	</div>

	<div class="block style1">
		<h2>模块管理</h2>
		<ul class="folder" style="overflow-y:auto;height:280px;">
          <?php if(is_array($leftBar)): $i = 0; $__LIST__ = $leftBar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lb): ++$i;$mod = ($i % 2 )?><li class="<?php echo ($lb['module_name']); ?>"><a href='<?php echo U($lb['module_name']."/index");?>'><?php echo ($lb["module_title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	

	<div class="block style1">
		<h2>高级应用</h2>
		<ul class="folder">
        <li class="Tools"><a href="<?php echo U("Tools/index");?>">工具箱</a></li>
        <li class="Label"><a href="<?php echo U("Label/index");?>">数据调用</a></li>
		<li class="Database"><a href="<?php echo U("Database/index");?>">数据库管理</a></li>
		<li class="AdminLog"><a href="<?php echo U("AdminLog/index");?>">操作日志</a></li>
        <li><a href="http://www.sgcms.cn/manual.php" target="_blank">帮助中心</a></li>
		</ul>
	</div>

</div>
</div>
<div id="footer">
	<p>Powered by shuguang <a  href="http://license.sgcms.cn/?host=<?php echo ($appHost); ?>" target="_blank">Licensed</a>, Copyright 2008-2010 <a href="http://www.sgcms.cn/" target="_blank">shuguangCMS.</a>
</p>
</div>
</div>
<script type="text/javascript">
$(function(){ 
    $(".<?php echo ($moduleName); ?>").addClass("active");
    $(".confirmSubmit").click(function() {
        return confirm('本操作不可恢复，确定继续？');
    });
}); 
</script>
</body>
</html>