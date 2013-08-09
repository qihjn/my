<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<base target="_self">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/admin/css/base.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/admin/css/main.css" />
</head>
<body leftmargin="8" topmargin='8' style="background-color:#F7FFFB;">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div style='float:left'> <img height="14" src="__PUBLIC__/Skin/admin/images/frame/book1.gif" width="20" />&nbsp;欢迎您使用中华美容网管理系统。 </div>
      <div style='float:right;padding-right:8px;'>
        <!--  //保留接口  -->
      </div></td>
  </tr>
  <tr>
    <td height="1" background="__PUBLIC__/Skin/admin/images/frame/sp_bg.gif" style='padding:0px'></td>
  </tr>
</table>
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
  <tr>
    <td background="__PUBLIC__/Skin/admin/images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'><span>消息</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;</td>
  </tr>
</table>
<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px">
  <tr>
    <td colspan="2" background="__PUBLIC__/Skin/admin/images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'>
    	<div style='float:left'><span>快捷操作</span></div>
    	<div style='float:right;padding-right:10px;'></div>
   </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="30" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td width="15%" height="31" align="center"><img src="__PUBLIC__/Skin/admin/images/frame/qc.gif" width="90" height="30" /></td>
          <td width="85%" valign="bottom"><div class='icoitem'>
              <div class='ico'><img src='__PUBLIC__/Skin/admin/images/frame/addnews.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>文档列表</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='__PUBLIC__/Skin/admin/images/frame/menuarrow.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>评论管理</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='__PUBLIC__/Skin/admin/images/frame/manage1.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>内容发布</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='__PUBLIC__/Skin/admin/images/frame/file_dir.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>栏目管理</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='__PUBLIC__/Skin/admin/images/frame/part-index.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>更新系统缓存</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='__PUBLIC__/Skin/admin/images/frame/manage1.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>修改系统参数</u></a></div>
            </div></td>
        </tr>
      </table></td>
  </tr>
</table>



<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px">
	
	<tr class="row" ><th colspan="2" class="title"  background="__PUBLIC__/Skin/admin/images/frame/wbg.gif">系统信息</th></tr>
	<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><tr class="row"  ><td width="15%" bgcolor="#FFFFFF"><?php echo ($key); ?></td><td bgcolor="#FFFFFF"><?php echo ($v); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
	
</table>

<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC">
  <tr bgcolor="#EEF4EA">
    <td colspan="2" background="__PUBLIC__/Skin/admin/images/frame/wbg.gif" class='title'><span>使用帮助</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="32">官方交流网站：</td>
    <td><a href="http://www.21mmm.com" target="_blank"><u>http://www.21mmm.com</u></a></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="25%" height="32">更多后台模板：</td>
    <td width="75%"><a href="http://www.21mmm.com/admin-templates" target="_blank"><u>http://www.21mmm.com</u></a><a href="http://www.865171.cn/admin-templates" target="_blank"><u>/admin-templates</u></a></td>
  </tr>
</table>
</body>
</html>