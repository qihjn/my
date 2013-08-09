<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo ($keywords); ?>" />
<meta name="description" content="<?php echo ($description); ?>" />
<title><?php echo ($pageTitle); ?></title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/plugin/lightbox/css/lightbox.css" /><link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/Job/resume.css" />
<script type="text/javascript" src="__PUBLIC__/Js/publicVar.js"></script>
<script language="JavaScript">
<!--
//指定当前组模块URL地址 
var URL = '__URL__';
var APP	 =	 '__APP__';
var PUBLIC = '__PUBLIC__';

//-->
</script>
</head>
<body>
<div id="allnet">
<div id="school">
<div id="star">
<div class="bj_live">
    <p>
    <div class="bj_live_left" id="loginbar">
        <style>
			.bj_live_left form * {vertical-align:middle;}
			</style>
        <form action="http://u.<?php echo constant("DOMAIN");?>/user.php/public/chklogin" method="POST">
            <span style="font-weight:bold; color:#333;">通行证：</span>
            <input name="username" id="username" type="text" style="width:70px;"/>
            <span style="font-weight:bold; color:#333;">密码：</span>
            <input name="password" id="password" type="password" style="width:70px;"/>
            <!--<span style="padding-left:3px;">
            <select name="u_type">
                <option value="school">请选择</option>
                <option value="school">培训机构</option>
                <option value="unit">企业用户</option>
                <option value="person">个人用户</option>
            </select>
            </span>--> <span style="vertical-align:middle;">
            <input type="image" value="登录" src="__PUBLIC__/Skin/unit_web/nmdl.jpg" />
            </span> <span style="padding-left:3px; vertical-align:middle;"><a href="http://user.21mmm.cn/register.php"><img src="__PUBLIC__/Skin/unit_web/zhuce.jpg" /></a></span> <span style="padding-left:3px;"><a href="http://user.21mmm.cn/fetchpwd.php">忘记密码</a></span>
        </form>
    </div>
    <ul class="bj_live_right">
        <li>·<a href="<?php echo C("WWW_URL");?>/help/most/38.html" target="_blank"><font color="#FF0000">升级会员</font></a></li>
        <!--<li>·<a href="<?php echo C("WWW_URL");?>/help/most/37.html" target="_blank">付款</a></li>-->
        <li>·<a href="<?php echo C("WWW_URL");?>/help/most/27.html" target="_blank">客服</a></li>
        <li>·<a href="<?php echo C("WWW_URL");?>/help/most/31.html" target="_blank">导航</a></li>
        <li>·<a href="javascript:;" onclick="window.external.addFavorite(window.location.href, '中华美容网');">收藏</a></li>
        <li>·<a href="javascript:;" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage(window.location.href);">主页</a></li>
        <li><img src="http://public.21mmm.com/links/index/dh.gif" width="87" height="22" border="0" /></li>
    </ul>
    </p>
</div>
<div class="clear"></div>
<div class="logo">
    <div class="logo_vi"><a href="#"><img src="__PUBLIC__/Skin/school_web/logo.jpg" /></a></div>
    <div class="logo_ad">
        <div class="logo_ad_left"><img src="__PUBLIC__/Skin/school_web/l_1.jpg" /></div>
        <ul class="logo_center">
            <li><a href="<?php echo C("WWW_URL");?>/" target="_self">首页</a></li>
            <li><a href="http://job.21mmm.com" target="_self">招聘主页</a></li>
            <li><a href="http://job.21mmm.com/promo/person/fast_person/" target="_self">最新人才</a></li>
            <li><a href="http://job.21mmm.com/promo/person/fast_job/" target="_self">最新职位</a></li>
            <li><a href="http://school.21mmm.cn/" target="_self">培训课程</a></li>
            <li><a href="http://pindao.huoban.taobao.com/tms/channel/beauty.htm?pid=mm_15250694_0_0&amp;eventid=101328" target="_blank">购化妆品</a></li>
            <li><a href="http://www.21mmm.com/help/faq/71.html" target="_self">记住我们</a></li>
            <li>
                <script type='text/javascript' src='http://chat.53kf.com/kf.php?arg=linqiu9999&style=1'></script>
            </li>
        </ul>
        <div class="logo_ad_left"><img src="__PUBLIC__/Skin/school_web/r_1.jpg" /></div>
    </div>
</div>


<style>
/*下面导航css*/
#lvl a {
	text-decration:none;
	line-height:1.8;
	float:left;
	width:160px;
	color:#454545;
	overflow:hidden;
}
#lvl a:hover {
	background-color:#f90;
	text-decoration:none;
}
.STYLE1 {
	color: #FF00FF
}
.STYLE2 {
	color: #FF0000
}
.STYLE3 {
	color: #000000;
	font-weight: bold;
}
</style>
<div class="menu">
            <div class="menu_name"><a href="/"><img src="__PUBLIC__/Skin/Job/nav.jpg" /></a></div>
            <div class="menu_caidan">
                <ul style="margin-top:13px;">
                    <li><a href="/" target="_blank">人才主页</a> | </li>
                    <li>职位分类 | </li>
                    <li>人才分类 | </li>
                    <li><a href="/<?php echo ($a_name); ?>/promo/unit/fast_job/" target="_blank">职位列表</a> | </li>
                    <li><a href="/<?php echo ($a_name); ?>/promo/person/fast_person/" target="_blank">人才列表</a> | </li>
                    <li><a href="/<?php echo ($a_name); ?>/promo/unit/faish_job/" target="_blank">诚信招聘</a> | </li>
                    <li><a href="/<?php echo ($a_name); ?>/promo/person/faith_person/" target="_blank">诚信求职</a> | </li>
                    <li>相片人才 | </li>
                </ul>
                <ul>
                    <li> 热门地区：<a href="/shanghai"> 上海 </a> |<a href="/beijing"> 北京 </a> |<a href="/guangdong"> 广东 </a> |<a href="/jiangsu"> 江苏</a> |<a href="/zhejiang"> 浙江 |</a><a href="/hubei"> 湖北 </a>| <a href="/fujian"> 福建 </a>|<a href="/sichuan"> 四川 </a> |<a href="/liaoning"> 辽宁 </a> |<a href="http://public.21mmm.com/links/job/qun.gif" target="_blank"><span style="color:#f00;">加入美容美发美甲QQ群</span> </a></li>
                </ul>
            </div>
        </div>

<style type="text/css">
.gray{ background-color:#999;}
</style>
<div class="ad"><img src="__PUBLIC__/Skin/Job/ad_4.jpg" width="940" border="0"/></div>
    <div class="left">
        
        
        
        <div class="box">
            <div class="title">快速搜索</div>
            <div class="content" style="padding:0;">
                					<table width="100%" border="1" bordercolor="#9CBDE6" style=" border-collapse:collapse;">
                    <form action='/job/index/' method=get target="_blank" id="fSo">
                        <!--<tr>
                            <td width="30%" height="25">关键字</td>
                            <td align="left"><input type="text" name="txt" id="txt" /></td>
                        </tr>-->
                        <tr>
                            <td height="25" align="center">地区选择</td>
                            <td align="left"><select name="workplace" id="workplace"  style="width:90px;">
                              <option value=''>请选择</option>
                              <option value=''>全国</option>
                              <option value='上海市'>上海市</option>
                              <option value='北京市'>北京市</option>
                              <option value='广东省'>广东省</option>
                              <option value='江苏省'>江苏省</option>
                              <option value='浙江省'>浙江省</option>
                              <option value='湖北省'>湖北省</option>
                              <option value='湖南省'>湖南省</option>
                              <option value='山东省'>山东省</option>
                              <option value='陕西省'>陕西省</option>
                              <option value='四川省'>四川省</option>
                              <option value='辽宁省'>辽宁省</option>
                              <option value='福建省'>福建省</option>
                              <option value='天津市'>天津市</option>
                              <option value='河南省'>河南省</option>
                              <option value='河北省'>河北省</option>
                              <option value='山西省'>山西省</option>
                              <option value='内蒙古'>内蒙古</option>
                              <option value='吉林省'>吉林省</option>
                              <option value='黑龙江'>黑龙江</option>
                              <option value='安徽省'>安徽省</option>
                              <option value='江西省'>江西省</option>
                              <option value='广西'>广西</option>
                              <option value='海南省'>海南省</option>
                              <option value='重庆市'>重庆市</option>
                              <option value='贵州省'>贵州省</option>
                              <option value='云南省'>云南省</option>
                              <option value='西藏'>西藏</option>
                              <option value='甘肃省'>甘肃省</option>
                              <option value='青海省'>青海省</option>
                              <option value='宁夏'>宁夏</option>
                              <option value='新疆'>新疆</option>
                              <option value='台湾省'>台湾省</option>
                              <option value='香港'>香港</option>
                              <option value='澳门'>澳门</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td height="25" align="center">职位选项</td>
                            <td align="left"><select name="category_id" id="category_id" style=" width:90px;" >
                              <option value=''>请选择</option>
                              <option value=''>所有</option>
                              <option value='1'>美容类</option>
                              <option value='2'>美发类</option>
                              <option value='3'>美甲类</option>
                              <option value='4'>化妆造型类</option>
                              <option value='5'>纹绣类</option>
                              <option value='6'>中医保健类</option>
                              <option value='7'>医疗整型类</option>
                              <option value='8'>日化商场类</option>
                              <option value='9'>美容学校类</option>
                              <option value='10'>销售市场类</option>
                              <option value='11'>健身瑜伽类</option>
                              <option value='12'>经营管理类</option>
                              <option value='13'>生产管理类</option>
                              <option value='14'>后勤储备类</option>
                              <option value='15'>客户服务类</option>
                              <option value='16'>人事行政类</option>
                              <option value='17'>会务营销类</option>
                              <option value='18'>财务类</option>
                              <option value='20'>模特类</option>
                              <option value='244'>市场营销类</option>
                            </select></td>
                        </tr>
                       <!-- <tr>
                            <td height="25">选择日期</td>
                            <td align="left"><?php echo ($worklife_slt); ?></td>
                        </tr>-->
                    
                        <tr>
                            <td height="25" colspan="2" align="center"><input name="sotype" type="radio" value="job" checked="checked"/>职位 <input name="sotype" type="radio" value="resume" />人才 <input type=image src="__PUBLIC__/Skin/Job/icon-go.gif" style="vertical-align:inherit;" /></td>
                        </tr>
                    </form>
                    </table>
<script language="javascript" type="text/javascript">
var radios = document.getElementsByName("sotype");
for(var i = 0; i < radios.length; i++){
	radios[i].onclick = function(){
		document.getElementById("fSo").action = "/"+this.value+"";
	}
}
</script>
            </div>
        </div>
        
        <div class="box">
            <div class="title">招聘帮助</div>
            <div class="content">
                <h1>&nbsp;</h1>
                <div class="clear"></div>
                <ul class="zhaopinhui">
                    <li><strong>提示1：</strong><a href="http://www.21mmm.com/help/unit/56.html" target="_blank" class="STYLE3"><span style="color:#f00;">VIP会员</span></a>点击简历下方<span style="color:#cc0000;">邀请面试</span>，对方即能收到您的邀请</li>
                    <li><strong>提示2：</strong>如果求职者在外地，建议使用QQ远程视频，进行初步面试</li>
                    <li><strong>提示3：</strong>该简历已通过基本审核，但因互联网不可控因素，本站无法完全保证简历的真实性。敬请单位注意规避招聘风险。</li>
                    <li><strong>提示4:</strong> 如发现有非法信息或虚假简历,请通过页部底部的投诉与建议,将简历网址提交给我们,以便核实删除;良好的招聘环境需要我们共同的维护~!</li>
                    <li><a href="http://www.21mmm.com/help/unit/72.html" target="_blank"><strong>提示5：</strong><span style="color:#f00;">怎么招聘最划算，不浪费？&ldquo;自助式招聘&rdquo;-想招就招，招满就停！</span></a></li>
                </ul>
                <p>&nbsp;</p>
            </div>
        </div>
        
        <div class="box">
            <div class="title">以下人才适合您</div>
            <div class="content">
                <table  width="100%" border="0"  cellpadding="3" cellspacing="1">
                    
                    <?php if(is_array($match)): $i = 0; $__LIST__ = $match;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): ++$i;$mod = ($i % 2 )?><tr class="bg_fa">
                        <td width="20%" height="20"><a href="<?php echo (rurl($m["pid"])); ?>" target="_blank" class="red"><?php echo ($m["realname"]); ?></a></td>
                        <td width="10%"><?php echo (sex($m["gender"])); ?></td>
                        <td><?php echo (msubstr(getEnumTitle($m["job_request"]),0,17)); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                <p>&nbsp;</p>
            </div>
        </div>
        <div class="box">
            <div class="title">您感兴趣的-地区人才</div>
            <div class="content">
                <?php if(is_array($area)): $i = 0; $__LIST__ = $area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): ++$i;$mod = ($i % 2 )?><li>·点击进入>>><a href="/<?php echo ($key); ?>" > <?php echo ($a); ?> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        
    </div>
    
    
    <div class="resume">
        <div class="r_top"></div>
        <div class="r_name"><?php echo ($vo["realname"]); ?>  -- 个人简历</div>
        <div class="r_box">
            <div class="r_title"><span class="r_base">基本资料</span></div>
            <div class="r_content" style="position:relative; padding-bottom:8px;">
            <div class="photoborder"></div>
            <table width="100%" align="center" cellpadding="0" cellspacing="0">
							<tr>
							  <td width="30%" height="24" align="left">名称：<?php echo ($vo["realname"]); ?></td>
							  <td width="40%" align="left">性别：<?php echo (sex($vo["gender"])); ?></td>
							  <td width="30%" rowspan="7" align="center">
							  	<table border="0" cellpadding="3" cellspacing="2" >
									<tr>
									  <td><img src="<?php echo ($vo["thumb"]); ?>"  height="150px" width="120px" border=0  /></td>
									</tr>
							  	</table>
							  </td>
					</tr>
							<tr align="left">
							  <td height="24">生日：<?php echo (df($vo["birthday"])); ?></td>
							  <td width="43%">身高：<?php echo ($vo["high"]); ?>[厘米]</td>
							</tr>
							<tr align="left">
							  <td height="24">体重：<?php echo ($vo["weight"]); ?>[公斤]</td>
							  <td width="43%">学历程度：<?php echo ($vo["study"]); ?></td>
							</tr>

							
							<tr align="left">
							  	<td height="24">户口所在地：<?php echo ($vo["household"]); ?></td>
								<td width="43%">婚姻情况：<?php echo ($vo["marriage"]); ?></td>
						    </tr>
							<tr align="left">
							  <td height="24">现居住地：<?php echo ($vo["inplace"]); ?></td>
							  <td width="43%">更新日期：<?php echo (df($vo["ctime"])); ?></td>
							</tr>
                            
						
			    </table>
            </div>
        </div>
        <div class="r_box">
            <div class="r_title"><span class="r_base2">详细信息·求职意向</span></div>
            <div class="r_content">
            			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							
							<tr align="left">
							  <td height="24" colspan="2" align="left">期望工作地区：<?php echo ($vo["local"]); ?></td>
							</tr>
							<tr align="left">
							  <td height="24" colspan="2" align="left">期望从事行业：<?php echo (getEnumTitle($vo["job_request"])); ?></td>
							</tr>
							<tr align="left">
							  <td height="24" align="left">期望工作性质:<?php echo ($vo["em_type"]); ?></td>
							  <td align="left">证件号码：<?php echo ($vo["card"]); ?></td>
							</tr>
							 <tr align="left">
							  <td height="24"align="left">到岗时间：<?php echo (df($vo["topos"])); ?></td>
                              <td align="left">期望薪水：<?php echo ($vo["money"]); ?></td>
							</tr>
                            <tr align="left">
						          <td height="24"align="left">住房要求：<?php echo ($vo["housing"]); ?></td>
						          <td align="left">证书名称：<?php echo ($vo["certificate"]); ?></td>
				            </tr>
						      <tr align="left">
						          <td height="24"align="left">外语：<?php echo ($vo["foreign_language"]); ?></td>
						          <td align="left">水平：<?php echo ($vo["foreign_level"]); ?></td>
					          </tr>
						  </table>
            </div>
        </div>
        
        <?php if(!empty($vo["work"])): ?><div class="r_box">
            <div class="r_title"><span class="r_base">工作经历</span></div>
            <div class="r_content">
            <?php echo ($vo["work"]); ?>
            </div>
        </div><?php endif; ?>
        
        <?php if(!empty($vo["skill"])): ?><div class="r_box">
            <div class="r_title"><span class="r_base">技能专长</span></div>
            <div class="r_content">
            <?php echo ($vo["skill"]); ?>
            </div>
        </div><?php endif; ?>
        
        <?php if(!empty($vo["edu"])): ?><div class="r_box">
            <div class="r_title"><span class="r_base">教育经历</span></div>
            <div class="r_content">
            <?php echo ($vo["edu"]); ?>
            </div>
        </div><?php endif; ?>
        
        <?php if(!empty($vo["other"])): ?><div class="r_box">
            <div class="r_title"><span class="r_base">自我简介</span></div>
            <div class="r_content">
            <?php echo ($vo["other"]); ?>
            </div>
        </div><?php endif; ?>
        
        
        
        <?php if(!empty($figure)): ?><div class="r_box">
            <div class="r_title"><span class="r_base">个人风采</span></div>
            <div class="r_content">
            <div id="gallery">
                                <ul>
                                    <?php if(is_array($figure)): $i = 0; $__LIST__ = $figure;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pvo): ++$i;$mod = ($i % 2 )?><li>
                                        <a href="<?php echo ($pvo["imgurl"]); ?>" title="">
                                            <img src="<?php echo ($pvo["thumb"]); ?>" width="120" height="160"  alt="" />
                                        </a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
            </div>
        </div><?php endif; ?>
        
        
        <div class="r_box">
            <div class="r_title"><span class="r_base">联系方法</span></div>
            <div class="r_content" id="contact">
                             	
                    <div style="margin:10px 5px 5px 20px;">
                                  <p>·您是VIP会员请[<a href="http://user.21mmm.com/login.php" target="_blank" class="STYLE1"><span style="color:#f00;">登录</span></a>]；您还没有<a href="http://user.21mmm.com/register.php?type=unit" target="_blank" class="STYLE1">注册</a>，请<a href="http://user.21mmm.com/register.php?type=unit" target="_blank" class="STYLE1"><span style="color:#f00;">注册</span></a>；如有问题<a href="http://www.21mmm.com/help/most/27.html" target="_blank"><span style="color:#f00;">联系我们</span></a></p>
                                  <p>·只有<a href="http://www.21mmm.com/help/unit/56.html" target="_blank" class="STYLE1"><span style="color: #990066;">招聘VIP会员</span></a>才能查看人才联系信息，邀请人才面试,<a href="http://www.21mmm.com/help/unit/56.html" target="_blank"><span style="color:#f00;">如何升级成为招聘会员?</span></a></p>
                                  
                </div>
			</div>
        	
        </div>
         <div class="ba">
            <a onclick="applyResume(<?php echo ($vo["pid"]); ?>)" >邀请面试</a>
            <a onclick="favResume(<?php echo ($vo["pid"]); ?>)" >简历收藏</a>
            <a href="#" style="color:#FFC;">在线咨询</a>
         </div>
        
    </div>
    <div class="clear"></div>
<div id="sb"></div>



<textarea id="tplContact" style="display:none;">
<#macro contact data>  
<ul  class="contact">
    <li>手机：<span>${data.mobile}</span></li>
    <li>Email：<span>${data.email}</span></li>
    <li>Q  Q：<span>${data.qq}</span></li>
    <li>电话：<span>${data.phone}</span></li>
</ul>
</#macro>
</textarea>
<textarea id="tplJob" style="display:none;">
<#macro jobs data> 
<table id="jobs">
	<#if (data.list.length > 0)>
        <caption>${data.caption}</caption>
      <#list data.list as list>
        <tr <#if (list_index % 2)>class="gray"</#if>>
          
          <td><input type="radio" id="id_${list_index + 1}" name="id[]" value="${list.id}" /></td>
          <td>${list_index + 1}</td>
          <td class="bold"><a href="${list.uid}">${list.title}</a></td>
          <td></td>
          
        </tr>
      </#list>
    <#elseif (data.list.length > 0)>
        <tr><td colspan="4">${data.list.length}</td></tr>
    <#else>
        <tr><td colspan="5">没有数据</td></tr>
    </#if>
</table>
</#macro>
</textarea>
<div class="footlink">
<span style="color:#990000;"><a href="http://www.21mmm.com/help/most/27.html" target="_blank">申请友情链接</a></span>-<a href="http://www.job592.com/hot-shanghai/" target="_blank">上海招聘网-广州招聘</a>-<a href="http://sz.58.com/jianzhi.shtml" target="_blank">深圳兼职</a>-<a href="http://tj.58.com/job.shtml" target="_blank">天津找工作</a>-<a href="http://www.51meirong.com/" target="_blank">中国美容整形网</a>-<a href="http://www.hx355.com" target="_blank">海西商务网</a>-<a href="http://www.56ml.com" target="_blank">中国美频道美发网</a>-<a href="http://www.352200.com" target="_blank">玉田在线</a>-<a href="http://www.43job.com" target="_blank">上海美容人才网</a>-<a href="http://www.jzwomen.com" target="_blank">精致女人</a>-<a href="http://hzpk.39.net" target="_blank">39护肤品</a>-<a href="http://www.zhennvren.cn" target="_blank">真女人</a>-<a href="http://www.cbiw.com.cn/" title="麦中国美容产业网" target="_blank">中国美容产业网</a>-<a href="http://www.meirongquan.com" target="_blank">美容圈</a>-<a href="http://shop.21mmm.com" target="_blank" _fcksavedurl="http://21mmm.taobao.com">美甲产品工具批发,OPI批发</a>
</div>

<div class="foot">
					<div class="text">
					<a href="http://www.21mmm.com/help/most/28.html" target="_blank">关于我们</a> - <a href="http://www.21mmm.com/help/most/31.html" target="_blank">网站地图</a> - <a href="http://www.21mmm.com/help/most/29.html" target="_blank">法律声明</a> - <a href="http://www.21mmm.com/help/most/38.html" target="_blank">升级会员</a>- <a href="http://www.21mmm.com/help/most/37.html" target="_blank">付款方式</a> - <a href="http://www.21mmm.com/help/most/27.html" target="_blank">联系我们</a>- <a href="http://www.21mmm.com/complain/add" target="_blank">投诉建议</a></div>
                    <div>
                     客服热线：400-600-2939 传真：021-51069297  
                    QQ客服：<a href="tencent://message/?uin=78746365&amp;Site=&amp;Menu=yes">78746365</a> <a href="tencent://message/?uin=723259607&amp;Site=&amp;Menu=yes">723259607 </a> </div>
					Copyright 2004-2010 21mmm.com. All Rights Reserve <a href="http://www.miibeian.gov.cn/" target="_blank">国家信息产业部备案-沪ICP备06003754</a><br />
					<div><img src="http://public.21mmm.com/images/index/biaoshi.gif" /><img src="http://public.21mmm.com/images/index/sznet110anwang.gif" width="40" /> <img src="http://public.21mmm.com/images/index/gt.gif" width="50" /><br />
			<script src="http://s3.cnzz.com/stat.php?id=1756359&web_id=1756359&show=pic1" language="JavaScript" charset="gb2312"></script>
            </div>
				</div>
	</div>
</body>
</html>
<script type="text/javascript" src="__PUBLIC__/Js/jq.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/base.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Job/job_common.js"></script>

<script language="javascript" type="text/javascript">
//ajax不能跨域
//document.domain = '<?php echo constant("DOMAIN");?>';
url = '/public/ajaxGetLoginBar'; 
$.get(url,'',function(data){
	if(data){
		$('#loginbar').html(data);
	}
	//alert(data);
});

</script>
<script language="javascript" type="text/javascript">

//$.get('/ajax/cuserInfo.php?uid=<?php echo ($infouid); ?>&'+Math.random(),{},function(db){
//															document.getElementById("contact").innerHTML = db;
//});
//


//常用问题

</script>


<script src="/resume/counter/id/<?php echo ($vo["pid"]); ?>"></script>
<script type="text/javascript" src="__PUBLIC__/plugin/lightbox/js/jq.lightbox.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyTemplate.js"></script><script type="text/javascript" src="__PUBLIC__/plugin/dialog/jq.dialog.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/plugin/dialog/screen.css" /><link rel="stylesheet" type="text/css" href="__PUBLIC__/plugin/dialog/example.css" />
<script type="text/javascript">
$(function() {
	$('#gallery a').lightBox();
});

//联系方式
var url = "/resume/contact/id/<?php echo ($vo["pid"]); ?>/workplace/<?php echo ($vo["local"]); ?>/category_id/<?php echo ($vo["job_request"]); ?>";
$.get(url, function(data){
	if(data){
		data = eval("("+data+")");
		if(typeof(data) != "object") return;
		var template = G('tplContact').value;
		var x = easyTemplate(template,data);
		G('contact').innerHTML = x;
	}
});

//var pid = '<?php echo ($vo["pid"]); ?>';


</script>