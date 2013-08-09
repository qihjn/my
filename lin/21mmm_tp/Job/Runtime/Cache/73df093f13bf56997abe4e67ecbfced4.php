<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo ($keywords); ?>" />
<meta name="description" content="<?php echo ($description); ?>" />
<title><?php echo ($pageTitle); ?></title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/Job/common.css" /><link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/page.css" />
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
<!--
.STYLE1 {
	color: #FF0000
}
.job_name {
	font-weight:bold;
}
.job_name a {
	font-size:20px;
	color:#000;
}
.job_detail {
	padding:10px 10px 0px 5px;
}
.magin_10 {
	margin-bottom:8px;
}
.jl {
	float:left;
	width:77px;
	height:100px;
	border:1px solid #ccc;
	text-align:center;
}
.jl img {
	width:75px;
	height:100px;
}
.jr {
	float:right;
	width:530px;
	border:0px solid #f00;
}
-->
</style>
<div class="ad"><img src="__PUBLIC__/Skin/Job/ad_4.jpg" width="930" border="0"/></div>
<div class="left">
    <div class="login">
        <h1><span class="zb"><a href="#">推荐职业</a></span></h1>
        <div class="clear"></div>
        <?php if(is_array($up)): $i = 0; $__LIST__ = $up;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class='swck'>
                <h2><span class='dx'><a href='<?php echo (rurl($vo["jid"])); ?>' target='_blank'><?php echo ($vo["realname"]); ?></a></span></h2>
                <p><?php echo (getEnumTitle($vo["job_request"])); ?></p>
                <p><?php echo (df($vo["ctime"])); ?></p>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<div class="zhigou">
    <div class="zjms" style="padding-top:10px;">
        <style>
							.zhigou .zjms .gw * {vertical-align:middle;}
						</style>
                            <form action='__APP__/job/' method=get id="fso">
                        <!--<tr>
                            <td width="30%" height="25">关键字</td>
                            <td align="left"><input type="text" name="txt" id="txt" /></td>

                            <td height="25">选择日期</td>
                            <td align="left"><?php echo ($worklife_slt); ?></td>
						!-->
                        <div>
                        	地区选择
                                <select name="workplace" id="workplace">
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
                                </select>
职位选项
<select name="category_id" id="category_id" >
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
                            </select>
                            关键字：<input type="text" id="keyword" name="keyword" />
                            <input name="sotype" type="radio" value="job" checked="checked" id="job"/>
                            职位
                            <input name="sotype" type="radio" value="resume" id="resume" />
                            人才
                            <input type=image src="__PUBLIC__/Skin/Job/icon-go.gif" style="vertical-align:inherit;" />
                        </div>
                        {__NOTOKEN__}
                    </form>
<script language="javascript" type="text/javascript">
var radios = document.getElementsByName("sotype");
for(var i = 0; i < radios.length; i++){
	radios[i].onclick = function(){
		document.getElementById("fSo").action = "/"+this.value+"";
	}
}
//var ex = /sotype\/[resume|job]/;
//var reg = new RegExp(ex,"i");
var ref = document.URL;//alert(document.URL);//(/sotype\/job/).exec(ref)
if((/sotype\/job/).exec(ref)){
	//alert("job");
	document.getElementById("job").checked = true;
}else if((/sotype\/resume/).exec(ref)){
	document.getElementById("resume").checked = true;
	//alert("resume");
}

</script> </div>
    <div class="men" >
        <div class="jt">
            <div class="men_left"><img src="__PUBLIC__/Skin/Job/bj_20.jpg" /></div>
            <div class="men_ce">
                <ul class="huiyi">
                    <li><a href="#" target="_blank" style="background-image:url(__PUBLIC__/Skin/Job/bj_23.jpg); color:#23548a;">搜索结果</a></li>
                </ul>
            </div>
            <div class="men_left"><img src="__PUBLIC__/Skin/Job/bj_21.jpg" /></div>
        </div>
        <form  method="post" name="job" id="job" action="__APP__/jobapply/insert">
            <div class="bg_fa" id="page_top"> </div>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div style="margin:10px auto;border-bottom:1px solid #ccc;width:95%;padding-bottom:10px; text-align:left;">
                    <div class="job_name">
                        <input type="checkbox" id="id[]" name="id[]" value="<?php echo ($vo["pid"]); ?>" />
                        <a href="/resume/<?php echo ($vo["pid"]); ?>/show.html" target=_blank style="font-size:18px;color:#0c63e4"><?php echo ($vo["realname"]); ?></a> </div>
                    <div class="job_detail" >
                        <div class="jl"><a href="/resume/<?php echo ($vo["pid"]); ?>/show.html" target="_blank" style="font-size:13px;color:#f80"><img src="<?php echo (img($vo["thumb"])); ?>" /></a></div>
                        <div class="jr">
                            <div class="magin_10">
                                <div>简历名称: <a href="/resume/<?php echo ($vo["pid"]); ?>/show.html" target="_blank" style="font-size:13px;color:#f80"> <?php echo ($vo["resumename"]); ?> </a><span >性别: <?php echo (sex($vo["gender"])); ?> </span> | <span >学历:<?php echo ($vo["study"]); ?> </span> <span class="chense" style="margin-left:100px;">日期：<?php echo (df($vo["ctime"])); ?></span> </div>
                            </div>
                            <div class="magin_10"  style="color:#2A2A2A;"> <span class="bold">求职地点</span>:<?php echo ($vo["local"]); ?> </div>
                            <div>希望职位:<span style="color:#f00;"><?php echo (getEnumTitle($vo["job_request"])); ?></span> </div>
                            <div> 简介:<?php echo ($vo["other"]); ?> </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <div id="page_bottom" class="bg_fa"> <a onclick="chkall('id[]')" style='cursor:pointer;'>全选</a> <a onclick="chkallno('id[]')" style='cursor:pointer;'> 取消全选</a> <a onclick="applyResume();">邀请面试</a> <a onclick="favResume();">放入收藏夹</a>
                <!-- 每页显示：<select name=""><option>10条</option></select> <select name=""><option>按时间发布顺序排列</option></select>
										</span>									
						-->
                <?php echo ($page); ?></div>
            <!--<input name="" type="submit" />-->
        </form>
        <div class="yema"> </div>
    </div>
</div>
<div class="clear"></div>
<textarea id="tplJob" style="display:none;">
<#macro jobs data> 
<table id="jobs">
	<#if (data.list.length > 0)>
        <caption>${data.caption}</caption>
      <#list data.list as list>
        <tr <#if (list_index % 2)>class="gray"</#if>>
          
          <td><input type="radio" id="id_${list_index + 1}" name="id[]" value="${list.id}" <#if (list_index == 0)>checked="checked" </#if> /></td>
          <td>${list_index + 1}</td>
          <td class="bold"><a href="${list.uid}">${list.title}</a></td>
          <td></td>
          
        </tr>
      </#list>
    <#elseif (data.list.length > 0)>
        <tr><td colspan="5">${data.list.length}</td></tr>
    <#else>
        <tr><td colspan="5">N/A</td></tr>
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


<script type="text/javascript" src="__PUBLIC__/plugin/lightbox/js/jq.lightbox.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyTemplate.js"></script><script type="text/javascript" src="__PUBLIC__/plugin/dialog/jq.dialog.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/plugin/dialog/screen.css" /><link rel="stylesheet" type="text/css" href="__PUBLIC__/plugin/dialog/example.css" />

<script>




//showPopWin("sb",200,200);
window.onload = function(){
	document.getElementById("page_top").innerHTML = document.getElementById("page_bottom").innerHTML;
	$('#workplace').val('<?php echo $_GET["workplace"];?>');
	$('#category_id').val('<?php echo $_GET["category_id"];?>');
	$('#keyword').val('<?php echo $_GET["keyword"];?>');
}
</script>
<loads href="__PUBLIC__/Js/logininfo2.js" />