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
<script type="text/javascript">
    $(document).ready(function() {
        $("#mainFrom").validate({
            rules: {
                title: "required",
                content: "fckeditor",
                view_count: {
                    required: true,
                    number: true
                },
                display_order: {
                    required: true,
                    number: true
                }
            },
            messages: {
                title: "标题必须填写",
                content: "内容必须填写",
                view_count: {
                    required: "浏览次数必须填写",
                    number: '浏览次数必须为数字'
                },
                display_order: {
                    required: "排序必须填写",
                    number: '排序必须为数字'
                }
            }
        });
        colorPicker();
    });
</script>
<div class="mainarea">
<div class="maininner">


<form method="post" action="<?php echo U("News/doInsert");?>" enctype="multipart/form-data" id="mainFrom">
	<div class="body_content">
		<div class="top_action"><a href="__URL__">浏览新闻</a> | <a href="<?php echo U("Category/index");?>">分类管理</a></div>
		<table cellspacing="0" cellpadding="0" id="maintable" class="formtable">
		<tr>
		  <th style="width:8em;"><label for="title">新闻标题</label></th>
		<td><input name="title" id="title" size="60" ></td></tr>
		
        <tr>
		  <th style="width:8em;">标题样式</th>
		<td><div style=" display:block; float:left" title="点击取颜色" class="color_picker" id="color_picker" onclick="colorPicker()">&nbsp;</div>颜色<input class="input" type="hidden" value="#ffffff" name="style_color" id="style_color" size="10"/>&nbsp;
             <input name="style_bold" type="checkbox" id="style_bold" value="bold" />
             加粗<input name="style_underline" type="checkbox" id="style_underline" value="underline" />
           下划线</td></tr>
        
        <tr>
		  <th style="width:8em;"><label for="category_id">新闻类别</label></th>
		<td><select name="category_id"  id="select"  >
                 <?php echo (buildSelect($category,$parentId)); ?>
            
                </select></td></tr>
        
        <tr>
		  <th style="width:8em;"><label for="attach_file">新闻图片</label></th>
		<td> <input name="attach_file" type="file" id="attach_file" /></td></tr>
          <tr>
		  <th style="width:8em;"><label for="description">内容摘要</label></th>
		<td><textarea name="description" cols="60" rows="5"  id="description"></textarea></td></tr>
        
        <tr>
		  <th style="width:8em;">新闻内容</th>
		<td> </td></tr>
        
        <tr>
		  <th colspan="2" >
		   
<textarea name="content" cols="50" rows="4" id="content"><?php echo ($vo["content"]); ?></textarea>
<script src="__PUBLIC__/Js/FCKeditor/fckeditor.js"></script>
<script>
	var oFCKeditor = new FCKeditor('content') ;
	oFCKeditor.BasePath = '__PUBLIC__/Js/FCKeditor/';
	oFCKeditor.Width = '100%';
	oFCKeditor.Height = '400';
	oFCKeditor.ToolbarSet = 'Default';
	oFCKeditor.ReplaceTextarea();
</script>

           </th>
		</tr>
        
         <tr>
		  <th colspan="2" style="width:8em;">以下为选填内容</th>
		</tr>
        
         <tr>
           <th style="width:8em;">模　　板</th>
           <td><input name="template" id="template" value="" />没定义请留空，默认为 detail 不需要填写<span style="color:#F00">.html</span></td>
         </tr>
         <tr>
           <th style="width:8em;">标　　签</th>
           <td><input name="tags" id="tags" size="50" />
            标签之间用 ，隔开</td>
         </tr>
         <tr>
		  <th style="width:8em;">关 键 字</th>
		<td><input name="keyword" id="keyword" size="60"></td></tr>
        
       
         <tr>
		  <th style="width:8em;">外链地址</th>
		<td><input name="link_url" id="link_url" size="60"></td></tr>
        
        <tr>
		  <th style="width:8em;">来　　源</th>
		<td><input name="copy_from" id="copy_from"></td></tr>
        <tr>
		  <th style="width:8em;">来源链接</th>
		<td><input name="from_link" id="from_link" size="60"></td></tr>
        
		<tr>
        <th style="width:8em;">其它参数</th>
		  <td><select name="recommend" id="recommend">
					      <option value="0" selected="selected">默认不推荐</option>
					      <option value="1">推荐</option>
				        </select><select name="status" id="status">
				          <option value="0" selected="selected">默认显示</option>
				          <option value="1">隐藏</option>
                        </select><select name="istop" id="istop">
				          <option value="0">默认不置顶</option>
				          <option value="1">置顶</option>
              </select>浏览
<input name="view_count" type="text" id="view_count" value="0" size="5" maxlength="12"  />
排序
<input name="display_order" type="text" id="display_order" value="0" size="5" maxlength="12"  /></td>
		</tr>
		<tr>
		  <th style="width:8em;">录入时间</th>
		  <td><input name="create_time" type="text" class="Wdate" id="create_time" style="width:160px"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',isShowClear:false,readOnly:true,isShowToday:true})" value="<?php echo date('Y-m-d ')?>"/></td>
		  </tr>
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