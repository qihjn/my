<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo ($keywords); ?>" />
<meta name="description" content="<?php echo ($description); ?>" />
<title><?php echo ($pageTitle); ?></title>

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
        <form action="http://u.<?php echo constant("DOMAIN");?>/public/chklogin" method="POST">
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

<link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/Job/city.css" />


        
        <div class="left">
            <div class="login_s"> <a href="http://public.21mmm.com/links/job/jlbz.gif" target="_blank"><img src="__PUBLIC__/Skin/Job/zgz.jpg" border="0"/></a>
                <p><a href="http://public.21mmm.com/links/job/jlbz.gif" target="_blank"><span style="color:#f00;">一份简历，给您一个明亮的未来  >>> </span></a></p>
                <a href="http://user.21mmm.com/register.php"><img src="__PUBLIC__/Skin/Job/zrc.jpg" border="0"/></a>
                <p><a href="http://www.21mmm.com/help/unit/75.html" target="_blank" class="STYLE3">招聘美容人才，为什么选我们？</a></p>
                <a href="#"><img src="__PUBLIC__/Skin/Job/cxlm.jpg"/></a> </div>
            <div class="clear"></div>
            <div class="login_x">
                <p>公告/客服</p>
                <div>
                    <p><font style="font-weight:400"><span style="color:#f00;">客服专线：400-600-2939</span> </font></p>
                    <p><font style="font-weight:400">客服QQ:<a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=723259607&amp;Site=http://www.21mmm.com/" target="_blank">723259607</a> <a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=78746365&amp;Site=http://www.21mmm.com/" target="_blank">78746365</a></font> </p>
                    <p><font style="font-weight:400">客服传真：021—51069297</font> </p>
                    <p><font style="font-weight:300">客服短信：13564093536 </font></p>
                    <p><font style="font-weight:200">MSN:www.21mmm.com@hotmail.com</font></p>
                    <p><font style="font-weight:400">客服邮箱：admin@21mmm.com</font></p>
                </div>
            </div>
            <div class="login" style="margin-top:6px; text-align:center;">
            <?php if(is_array($adlist)): $i = 0; $__LIST__ = $adlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><a href="<?php echo ($vo["link"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php echo (img($vo["thumb"])); ?>" width="220" /></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="middle">
            <h1><span class="tit"><a href="/" target="_blank">人才栏目</a></span></h1>
            <div class="middle_c">
                <p><a href="http://www.21mmm.com/help/unit/72.html" target="_blank"><strong><font color="#990066">&gt;&gt;五年专业服务，按需招聘，想招就招，招满即停</font></strong></a>  </p>
                <p><a href="http://public.21mmm.com/links/job/jlbz.gif" target="_blank"><font color="#990066">我要了解怎么找工作.过程图解&gt;&gt;</font></a> <a href="http://public.21mmm.com/links/index/zptj.gif" target="_blank"><font color="#990066">我该怎么招聘人才.过程图解&gt;&gt;</font></a></p>
                <div class="local">
                    <p><a href="/shanghai"><font color="#FF0000">上海</font></a><font color="#FF0000"> </font><a href="/beijing"><font color="#FF0000">北京</font></a> <a href="/jiangsu"><font color="#FF0000">江苏</font></a><font color="#FF0000"> </font><a href="/zhejiang"><font color="#FF0000">浙江</font></a><font color="#FF0000"> </font><a href="/beijing"></a><font color="#FF0000"> </font><a href="/guangdong"><font color="#FF0000">广东</font></a><font color="#FF0000"> </font><a href="/hubei"><font color="#FF0000">湖北</font></a> <a href="/shangdong">山东</a> <a href="/sichuan">四川</a> <a href="/liaoning">辽宁</a></p>
                    <p>
                        <!-- align="justify"<a href="/?code=410000">河南</a> <a href="/?code=230000">黑龙江</a> <a href="/?code=220000">吉林</a><br />
						<a href="/?code=340000">安微</a> <a href="/?code=360000">江西</a> <a href="/?code=450000">广西</a> <a href="/?code=520000">贵州</a> <a href="/?code=530000">云南</a> <a href="/?code=460000">海南</a> <a href="/?code=620000">甘肃</a> <a href="/?code=140000">山西</a> <a href="/?code=150000">内蒙古</a><br/>
						<a href="/?code=640000">宁夏</a> <a href="/?code=630000">青海</a> <a href="/?code=650000">新疆</a> <a href="/?code=540000">西藏</a> <a href="/?code=710000">台湾</a> <a href="/?code=810000">香港</a> <a href="/?code=820000">澳门</a>-->
                        <span class="STYLE1"><span class="STYLE2"><a href="/guangdong"> 广州 </a><a href="/zhejiang">杭州</a> <a href="/guangdong">深圳</a> <a href="/zhejiang"> 宁波</a> <a href="/jiangsu">南京</a> <a href="/jiangsu">苏州</a></span> <a href="/hubei">武汉 </a></span><a href="/zhejiang">温州</a> <a href="/jiangsu">无锡</a> </p>
                    <p><a href="/sichuan"></a><a href="/fujian">福建</a>&nbsp;<a href="/hunan">湖南</a> <a href="/henan" target="_self">河南</a> <a href="/jiangxi">江西</a> <a href="/tianjin">天津</a> <a href="/chongqing" target="_self"> 重庆</a> <a href="/shangxi">西安</a> <a href="/heilongjiang" target="_self"> 黑龙江</a> <a href="http://www.21mmm.com/help/most/31.html" target="_self"><span style="color:#f00;">更多</span></a> </p>
                    <span class="scrollword">
                    <marquee onMouseOut=start(); onMouseOver=stop(); scrollamount=3 >
                    <a href="http://www.21mmm.com/help/unit/56.html" target="_blank"><font color="#d87103" size="1px"><span style="color:#f00;">自助式招聘，想招就招，招满即停，不受节假，休假影响，点击了解》》》专注区域性人才输送，五年持续精心服务美容行业，按区域或按分类查看所需要的简历，针地性强，点击了解》》</font></font></a>
                    </marquee>
                    </span> </div>
                <div class="localpic"><img src="__PUBLIC__/Skin/Job/citylogo/<?php echo ($provinceCode); ?>.jpg" />所在地区：<?php echo ($province); ?></div>
            </div>
            <div class="middle_b"><img src="__PUBLIC__/Skin/Job/bj_8.jpg" /></div>
        </div>
        <div class="right">
            <h1><span class="tit" style="padding-top:6px;"><a href="#" target="_blank">快速搜索</a></span></h1>
            <div class="right_c"> 					<table width="100%" border="1" bordercolor="#9CBDE6" style=" border-collapse:collapse;">
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
		document.getElementById("fSo").action = "/"+this.value+"/";
	}
}
</script> <br />
                <br />
                <div><img src="__PUBLIC__/Skin/Job/btn_geren_bg.jpg" title="人才行情"/></div>
                <br />
                <span>招聘企业：<strong style="color:#cc0000;"><?php echo ($sum["company"]); ?></strong>家 招聘职位：<strong style="color:#cc0000;"><?php echo ($sum["job"]); ?></strong>个<br />
                人才简历：<strong style="color:#cc0000;"><?php echo ($sum["resume"]); ?></strong>份</span> </div>
        </div>
        <div class="zhigou">
            <div class="ad"><a href="/company/show_34540.html" target="_blank"><img src="__PUBLIC__/Skin/Job/ad_1.jpg" width="693" border="0" /></a></div>
            <div class="zhigou_box">
                <div class="zhigou_bt"><span>
                    <h1><a href="/resume/index/province/<?php echo ($province); ?>" target="_blank">诚信求职</a> </h1>
                    </span></div>
                <div class="zhigou_box_bk">
                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                        <?php if(is_array($cxqz)): $i = 0; $__LIST__ = $cxqz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr align='left'>
                            <td width='39%' align='center'><a href="/resume/<?php echo ($vo["pid"]); ?>/show.html" target='_blank' class='manname'><?php if(empty($vo['resumename'])): ?><?php echo (msubstr($vo["realname"],0,5)); ?><?php else: ?><?php echo (msubstr($vo["resumename"],0,5)); ?><?php endif; ?></a></td>
                            <td width='11%' align='center'><?php echo (sex($vo["gender"])); ?></td>
                            <td width="8%" align='center'><?php echo ($vo["local2"]); ?></td>
                            <td width='42%' align='center' ><?php echo (msubstr(getEnumTitle($vo["job_request"]),0,12)); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr>
                            <td colspan="3" align="left"><a href="http://user.21mmm.com/person/resume.php" style="color:#23548A;">我要发布</a><span></span></td>
                            <td width="42%" colspan="1" align="right"><a href="/resume/index/province/<?php echo ($province); ?>" target="_blank" style="color:#FC4716;">更多>></a></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            				<div class="zhigou_box" style="margin-left:5px;">
                <div class="zhigou_bt"><span>
                    <h1><a href="/resume/index/province/<?php echo ($province); ?>/up/1"  target="_blank">推荐人才</a></h1>
                    </span></div>
                <div class="zhigou_box_bk">
                <table width="95%" border="0" cellspacing="0" cellpadding="0">
                        <?php if(is_array($tjrc)): $i = 0; $__LIST__ = $tjrc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr align='left'>
                            <td width='39%' align='center'><a href="/resume/<?php echo ($vo["pid"]); ?>/show.html" target='_blank' class='manname'><?php if(empty($vo['resumename'])): ?><?php echo (msubstr($vo["realname"],0,5)); ?><?php else: ?><?php echo (msubstr($vo["resumename"],0,5)); ?><?php endif; ?></a></td>
                            <td width='11%' align='center'><?php echo (sex($vo["gender"])); ?></td>
                            <td width="8%" align='center'><?php echo ($vo["local2"]); ?></td>
                            <td width='42%' align='center' ><?php echo (msubstr(getEnumTitle($vo["job_request"]),0,12)); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr>
                            <td colspan="3" align="left"><a href="http://user.21mmm.com/person/resume.php" style="color:#23548A;">我要发布</a><span></span></td>
                            <td width="42%" colspan="1" align="right"><a href="/resume/index/province/<?php echo ($province); ?>/up/1<?php echo ($provice); ?>" target="_blank" style="color:#FC4716;">更多>></a></td>
                        </tr>
                    </table>
                    </div>
            </div>
            
              
            <div class="pic_rc">
                <div class="zhigou_bt"><span>
                    <h1><a href="/resume/indexp/code/<?php echo ($province); ?>"  target="_blank">照片人才</a></h1>
                    </span></div>
                <ul>
                	<?php if(is_array($zprc)): $i = 0; $__LIST__ = $zprc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href='/resume/<?php echo ($vo["pid"]); ?>/show.html' target='_blank'><img src='<?php echo ($vo["thumb"]); ?>' style='width:100px;height:100px;'/></a>
                        <p><a href='/resume/<?php echo ($vo["pid"]); ?>/show.html' target='_blank'><?php echo ($vo["realname"]); ?> - <?php echo (cateSub($vo["job_request"],5)); ?></a></p>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    
                </ul>
            </div>
            <div style="clear:both;"></div>
            <div class="zhigou_box">
                <div class="zhigou_bt"><span>
                    <h1><a href="/job/index/workplace/<?php echo ($province); ?>"  target="_blank">诚信招聘</a> </h1>
                    </span></div>
                <div class="zhigou_box_bk">
                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                        <?php if(is_array($cxzp)): $i = 0; $__LIST__ = $cxzp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr align='left'>
                            <td><a href='/company/show_<?php echo ($vo["nid"]); ?>.html' class='manname' target='_blank'><?php echo ($vo["ctitle"]); ?></a></td>
                            <td><a href='/job/show_<?php echo ($vo["id"]); ?>.html' target='_blank'>诚聘<?php echo ($vo["jtitle"]); ?></a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr align="left">
                            <td colspan="1" align="left"><a href="http://user.21mmm.com/unit/job_pub.php" style="color:#23548A;">我要发布</a><span></td>
                            <td colspan="1" align="right"><a href="/job/index/workplace/<?php echo ($province); ?>" style="color:#FC4716;"  target="_blank">更多>></a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="zhigou_box" style="margin-left:5px;">
                <div class="zhigou_bt"><span>
                    <h1><a href="/job/index/workplace/<?php echo ($province); ?>/up/1"  target="_blank">推荐公司</a></h1>
                    </span></div>
                <div class="zhigou_box_bk">
                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                        <?php if(is_array($tjgs)): $i = 0; $__LIST__ = $tjgs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr align='left'>
                            <td><a href='/company/show_<?php echo ($vo["nid"]); ?>.html' class='manname' target='_blank'><?php echo ($vo["title"]); ?></a></td>
                            <td><a href='/job/show_<?php echo ($vo["id"]); ?>.html' target='_blank'>诚聘<?php echo ($vo["jtitle"]); ?></a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr align="left">
                            <td colspan="1" align="left"><a href="http://user.21mmm.com/unit/job_pub.php" style="color:#23548A;">我要发布</a><span></td>
                            <td colspan="1" align="right"><a href="/job/index/workplace/<?php echo ($province); ?>/up/1" style="color:#FC4716;"  target="_blank">更多>></a></td>
                        </tr>
                    </table>
                </div>
            </div>
            	<div class="zhigou_box">
                <div class="zhigou_bt"><span>
                    <h1><a href="/resume/index/province/<?php echo ($province); ?>/emtype/1"  target="_blank">实习职位</a></h1>
                    </span></div>
                <div class="zhigou_box_bk">
                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                        <?php if(is_array($sxzw)): $i = 0; $__LIST__ = $sxzw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr align='left'>
                            <td width='50%'><a href='/job/<?php echo ($vo["id"]); ?>/show.html' target='_blank'  class='manname'><?php echo ($vo["jtitle"]); ?></a></td>
                            <td width='50%'><a href='/company/show_<?php echo ($vo["uid"]); ?>.html' target='_blank'><?php echo ($vo["ctitle"]); ?></a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr align="left">
                            <td colspan="1" align="left"><a href="http://user.21mmm.com/unit/job_pub.php" style="color:#23548A;">我要发布</a><span></td>
                            <td colspan="1" align="right"><a href="/resume/index/province/<?php echo ($province); ?>/emtype/1" style="color:#FC4716;"  target="_blank">更多</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            				<div class="zhigou_box" style="margin-left:5px;">
                <div class="zhigou_bt"><span>
                    <h1><a href="/resume/index/province/<?php echo ($province); ?>/em_type/1"  target="_blank">实习人才</a></h1>
                    </span></div>
                <div class="zhigou_box_bk">
                <table width="95%" border="0" cellspacing="0" cellpadding="0">
                        <?php if(is_array($sxrc)): $i = 0; $__LIST__ = $sxrc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr align='left'>
                            <td width='39%' align='center'><a href="/resume/<?php echo ($vo["pid"]); ?>/show.html" target='_blank' class='manname'><?php if(empty($vo['resumename'])): ?><?php echo (msubstr($vo["realname"],0,5)); ?><?php else: ?><?php echo (msubstr($vo["resumename"],0,5)); ?><?php endif; ?></a></td>
                            <td width='11%' align='center'><?php echo (sex($vo["gender"])); ?></td>
                            <td width="8%" align='center'><?php echo ($vo["local2"]); ?></td>
                            <td width='42%' align='center' ><?php echo (msubstr(getEnumTitle($vo["job_request"]),0,12)); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr>
                            <td colspan="3" align="left"><a href="http://user.21mmm.com/person/resume.php" style="color:#23548A;">我要发布</a><span></span></td>
                            <td width="42%" colspan="1" align="right"><a href="/resume/index/province/<?php echo ($province); ?>/em_type/1<?php echo ($provice); ?>" target="_blank" style="color:#FC4716;">更多>></a></td>
                        </tr>
                    </table>
                    </div>
            </div>
        </div>
        <div class="clear"></div>
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