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

<link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/Job/common.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/page.css" />

<style>
#lvl a{text-decoration:none; line-height:1.8; float:left; width:160px; color:#454545; overflow:hidden;}
#lvl a:hover{background-color:#f90; text-decoration:none;}
.contact td{ border-bottom:solid 1px #ccc;}
.STYLE2 {color: #FF0000}
.STYLE4 {
	font-weight: bold;
	font-size: 12px;
	color: #FF00CC;
}
</style>
				<div class="ad"><a href="http://user.21mmm.com/register.php?type=person" target="_blank"><img src="__PUBLIC__/Skin/Job/ad_42.gif" width="930" border="0"/></a></div>
				<div class="left">
					<div class="login">
						<h1><span class="zb"><a href="javascript:;">所有招聘职位</a></span><span style="float:right;"><a href="/company/show_<?php echo ($vo["uid"]); ?>.html">更多</a></span></h1>
						<div class="clear"></div>
						<ul class="xahn">
							<?php if(is_array($alljob)): $i = 0; $__LIST__ = $alljob;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href='<?php echo (jurl($vo["id"])); ?>' class='tdl'><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				  <div class="login">
						<h1><span class="zb"><a href="#">快速搜索</a></span></h1>
						<div class="clear"></div>
						<div class="zhiyese">
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
		document.getElementById("fSo").action = "/"+this.value+"/";
	}
}
</script>
						</div>
				        <h1><span class="zb"><a href="#">求职帮助</a></span></h1>
		      <p align="left"><br />
					      ·点“<span style="color:#f00;">立即申请职位</span>”，企业会收到您简历并约您面试 </p>
					    <p>　</p>
					    <p align="left">·如果招聘单位收取押金、报名费、存档费、保证金等均属违法行为，请求职者注意规避。</p>
					    <p align="left">&nbsp;</p>
					    <p align="left">·正规网站应聘.<span style="color:#f00;">求职有保障</span>,欢迎举报.如遇不法企业.请<a href="http://www.21mmm.com/help/most/27.html" target="_blank">联系我们</a></p>
					    <p align="left">&nbsp;</p>
				    <p align="left">·<a href="http://user.21mmm.com/register.php?type=person" target="_blank">一分钟注册简历,<span style="color:#f00;">好职位,相伴一生</span></a><br />
					      <br />
		            </p>
				  </div>
				</div>
				<div class="zhigou">
					<div class="men" >
						<div class="jt">
							<div class="men_left"><img src="__PUBLIC__/Skin/Job/bj_20.jpg" /></div>
							<div class="men_ce">
								<ul class="huiyi">
									<li><a href="#" class=set>招聘职位</a></li>
									<li><a href="/company/show_<?php echo ($vo["uid"]); ?>.html" >企业介绍</a></li>
								</ul>
							</div>
							<div class="men_left"><img src="__PUBLIC__/Skin/Job/bj_21.jpg" /></div>
						</div>
						<div class="balei">
							<div class="qywyd">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      				<tr><td bgcolor="#ff811e" height="2"></td></tr>
									<tr> 
										<td height="25" bgcolor="#ffeee0" class="font-14"><Font color="#000000">&nbsp;<b><?php echo ($vo["title"]); ?> - <?php echo ($vo["company"]); ?></b></Font></td>
									</tr>
                    				<tr> 
                      					<td>
											<table width="100%" border="0" cellspacing="1" cellpadding="4">
												<tr>
													<td width="15%" height="23" align="left" bgcolor="f9f9f9">职位类型：</td>
													<td width="35%" height="23" bgcolor="#FFFFFF"><?php echo ($vo["emtype"]); ?></td>
													<td width="15%" height="23" align="left" bgcolor="f9f9f9">薪金待遇：</td>
													<td width="35%" height="23" bgcolor="#FFFFFF"><?php echo ($vo["money"]); ?></td>
												</tr>
												<tr><td height="1" colspan="4" bgcolor="#dddddd"></td></tr>
												<tr> 
												  <td width="15%" height="23" align="left" bgcolor="f9f9f9">职位：</td>
												  <td width="35%" height="23" bgcolor="#FFFFFF"><?php echo (getEnumTitle($vo["category_id"])); ?></td>
												  <td width="15%" height="23" align="left" bgcolor="f9f9f9">招聘人数：</td>
												  <td width="35%" height="23" bgcolor="#FFFFFF"><?php echo ($vo["num"]); ?></td>
												</tr>
												<tr> 
												  <td height="1" colspan="4" bgcolor="#dddddd"></td>
												</tr>
												<tr> 
												  <td height="23" align="left" bgcolor="f9f9f9">发布日期：</td>
												  <td height="23" bgcolor="#FFFFFF"><?php echo (date('Y-m-d',$vo["ctime"])); ?></td>
												  <td height="23" align="left" bgcolor="f9f9f9">有效期：</td>
												  <td height="23" bgcolor="#FFFFFF"><?php echo (getEnumTitle($vo["worklife"],'worklife')); ?></td>
												</tr>
												<tr> 
												  <td height="1" colspan="4" bgcolor="#dddddd"></td>
												</tr>
												<tr> 
												  <td height="23" align="left" bgcolor="f9f9f9">工作地区：</td>
												  <td height="23" bgcolor="#FFFFFF"><?php echo ($vo["workplace"]); ?></td>
												  <td height="23" align="left" bgcolor="f9f9f9"></td>
												  <td height="23" bgcolor="#FFFFFF"></td>
												</tr>
												<tr> 
												  <td height="1" colspan="4" bgcolor="#dddddd"></td>
												</tr>
												<tr> 
												  <td height="23" align="left" bgcolor="f9f9f9">学历要求：</td>
												  <td height="23" bgcolor="#FFFFFF"><?php echo ($vo["study"]); ?></td>
												  <td height="23" align="left" bgcolor="f9f9f9">工作经验：</td>
												  <td height="23" bgcolor="#FFFFFF"><?php echo ($vo["experience"]); ?></td>
												</tr>
												<tr> 
												  <td height="1" colspan="4" bgcolor="#dddddd"></td>
												</tr>
												<tr> 
												  <td height="23" align="left" bgcolor="f9f9f9">性别要求：</td>
												  <td height="23" bgcolor="#FFFFFF"><?php echo (sex($vo["sex"])); ?></td>
												  <td height="23" align="left" bgcolor="f9f9f9">年龄:</td>
												  <td height="23" bgcolor="#FFFFFF"><?php echo ($vo["age"]); ?></td>
												</tr>
												<tr> 
												  <td height="1" colspan="4" bgcolor="#dddddd"></td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
									<tr><td height="5"></td></tr>
								</table>
								<table width="100%" border="0" cellspacing="0" cellpadding="4">
									<tr><td style="line-height:20px;"><strong>职位描述：</strong><br> <?php echo ($vo["request"]); ?> </td></tr>
								</table>
                                <div id="contact"></div>
                               
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr><td height="5"></td></tr>
							  </table>
								<table width="100%" border="0" cellspacing="1" cellpadding="0">
									<tr>
										<td height="30" align="center"><a href="#" onclick="apply('<?php echo ($vo["id"]); ?>');"><img src="__PUBLIC__/Skin/Job/job_bt1.gif" width="140" height="36" border="0"></a>&nbsp;&nbsp;<a href="http://user.21mmm.com/person/resume.php" target="_blank" ><img src="__PUBLIC__/Skin/Job/job_bt2.gif" width="140" height="36" border="0"></a>&nbsp;&nbsp;<a href="#" onclick="a();" ><img src="__PUBLIC__/Skin/Job/job_bt3.gif" width="140" height="36" border="0"></a>&nbsp;&nbsp;</a> </td>
									</tr>
									<tr>
										<td height="25" align="center"> <p>　</p>
										  <p><a href="#"  onclick="fav(<?php echo ($vo["id"]); ?>);" style="color:#0066FF; text-decoration:underline;">『加入职位收藏夹』</a>&nbsp;&nbsp; <a href="#" style="color:#0066FF; text-decoration:underline;">『推荐给好友』</a> &nbsp;<span class="STYLE2">&nbsp; </span><a href="#" class="STYLE4" style="text-decoration:underline;">『在线咨询』</a> </p></td>
									</tr>
								</table>
							</div>
							
							
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


<script language="javascript" type="text/javascript">

function a(){
	var url = URL+"/contact/uid/<?php echo ($vo["uid"]); ?>/workplace/<?php echo ($vo["workplalce"]); ?>/category_id/<?php echo ($vo["category_id"]); ?>";
	contact(url); 

}
</script>