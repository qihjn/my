<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>top</title>

<link href="__PUBLIC__/Skin/admin/css/base.css" rel="stylesheet" type="text/css">
<script language='javascript'>
var preFrameW = '206,*';
var FrameHide = 0;
var curStyle = 1;
var totalItem = 9;
/*function ChangeMenu(way){
	var addwidth = 10;
	var fcol = top.document.all.btFrame.cols;
	if(way==1) addwidth = 10;
	else if(way==-1) addwidth = -10;
	else if(way==0){
		if(FrameHide == 0){
			preFrameW = top.document.all.btFrame.cols;
			top.document.all.btFrame.cols = '0,*';
			FrameHide = 1;
			return;
		}else{
			top.document.all.btFrame.cols = preFrameW;
			FrameHide = 0;
			return;
		}
	}
	fcols = fcol.split(',');
	fcols[0] = parseInt(fcols[0]) + addwidth;
	top.document.all.btFrame.cols = fcols[0]+',*';
}*/


function mv(selobj,moveout,itemnum)
{
   if(itemnum==curStyle) return false;
   if(moveout=='m') selobj.className = 'itemsel';
   if(moveout=='o') selobj.className = 'item';
   return true;
}

function changeSel(itemnum)
{
  curStyle = itemnum;
  for(i=1;i<=totalItem;i++)
  {
     if(document.getElementById('item'+i)) document.getElementById('item'+i).className='item';
  }
  document.getElementById('item'+itemnum).className='itemsel';
}

</script>
<style>
body { padding:0px; margin:0px; }
#tpa {
	color: #009933;
	margin:0px;
	padding:0px;
	float:right;
	padding-right:10px;
}

#tpa dd {
	margin:0px;
	padding:0px;
	float:left;
	margin-right:2px;
}

#tpa dd.ditem {
	margin-right:8px;
}

#tpa dd.img {
  padding-top:6px;
}

div.item
{
  text-align:center;
	background:url(__PUBLIC__/Skin/admin/images/frame/topitembg.gif) 0px 3px no-repeat;
	width:82px;
	height:26px;
	line-height:28px;
}

.itemsel {
  width:80px;
  text-align:center;
  background:#226411;
	border-left:1px solid #c5f097;
	border-right:1px solid #c5f097;
	border-top:1px solid #c5f097;
	height:26px;
	line-height:28px;
}

*html .itemsel {
	height:26px;
	line-height:26px;
}

a:link,a:visited {
 text-decoration: underline;
}

.item a:link, .item a:visited {
	font-size: 12px;
	color: #ffffff;
	text-decoration: none;
	font-weight: bold;
}

.itemsel a:hover {
	color: #ffffff;
	font-weight: bold;
	border-bottom:2px solid #E9FC65;
}

.itemsel a:link, .itemsel a:visited {
	font-size: 12px;
	color: #ffffff;
	text-decoration: none;
	font-weight: bold;
}

.itemsel a:hover {
	color: #ffffff;
	border-bottom:2px solid #E9FC65;
}

.rmain {
  padding-left:10px;
  /* background:url(__PUBLIC__/Skin/admin/images/frame/toprightbg.gif) no-repeat; */
}
</style>

<base target="main" />
</head>
<body bgColor='#ffffff'>
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="__PUBLIC__/Skin/admin/images/frame/topbg.gif">
  <tr>
    <td width='20%' height="60"><img src="__PUBLIC__/Skin/admin/images/frame/logo.gif" /></td>
    <td width='80%' align="right" valign="bottom">
    	<table width="750" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td align="right" height="26" style="padding-right:10px;line-height:26px;">
        	<div class="nav">
	<?php echo ($_SESSION['loginUserName']); ?>，欢迎您使用本系统。
	<a href="__URL__/password/"><img src="__PUBLIC__/images/checked_out.png" width="16" height="16" border="0" alt="" align="absmiddle"> 修改密码</a> <a href="__URL__/profile/"><img SRC="__PUBLIC__/images/write.gif" WIDTH="17" HEIGHT="16" BORDER="0" ALT="" align="absmiddle"> 修改资料</a> <a href="__URL__/logout/" target="_top"><img SRC="__PUBLIC__/images/error.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="" align="absmiddle"> 退 出</a></div>
      </td>
      </tr>
      <tr>
        <td align="right" height="34" class="rmain">
		<dl id="tpa">
        
		<dd><div class='itemsel' id='item1' onMouseMove="mv(this,'move',1);" onMouseOut="mv(this,'o',1);"><a href="#" onclick="changeSel(1)" target="menu">主菜单</a></div></dd>
		<dd><div class='item' id='item2' onMouseMove="mv(this,'m',2);" onMouseOut="mv(this,'o',2);"><a href="#" onclick="changeSel(2)" target="menu">内容发布</a></div></dd>
		<dd><div class='item' id='item8' onMouseMove="mv(this,'m',8);" onMouseOut="mv(this,'o',8);"><a href="#" onclick="changeSel(8)" target="menu">插件模块</a></div></dd>
		<dd><div class='item' id='item4' onMouseMove="mv(this,'m',4);" onMouseOut="mv(this,'o',4);"><a href="#" onclick="changeSel(4)" target="menu">HTML更新</a></div></dd>
		<dd><div class='item' id='item5' onMouseMove="mv(this,'m',5);" onMouseOut="mv(this,'o',5);"><a href="#" onclick="changeSel(5)" target="menu">系统设置</a></div></dd>
		<dd><div class='item' id='item9' onMouseMove="mv(this,'m',9);" onMouseOut="mv(this,'o',9);"><a href="#" onclick="changeSel(9)" target="main">后台主页</a></div></dd>
		</dl>
		</td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>