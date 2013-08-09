<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo ($keywords); ?>" />
<meta name="description" content="<?php echo ($description); ?>" />
<title><?php echo ($pageTitle); ?></title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/plugin/lightbox/css/lightbox.css" /><link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/Job/common.css" />
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

<style>
/*#lvl a{text-decoration:none; line-height:1.8; float:left; width:160px; color:#454545; overflow:hidden;}
#lvl a:hover{background-color:#f90; text-decoration:none;}
.contact td{ border-bottom:solid 1px #ccc;}
.STYLE2 {color: #FF0000}
.STYLE4 {
	font-weight: bold;
	font-size: 12px;
	color: #FF00CC;
}*/
</style>

    

				
				<div class="ad"><img src="__PUBLIC__/Skin/Job/ad_4.jpg" width="930" border="0"/></div>
				<div class="left">
					<div class="login">
						<h1><span class="zb"><a href="javascript:;">所有招聘职位</a></span></h1>
						<div class="clear"></div>
						<ul class="xahn">
							<?php if(is_array($alljob)): $i = 0; $__LIST__ = $alljob;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$j): ++$i;$mod = ($i % 2 )?><li><a href='<?php echo (jurl($j["id"])); ?>' class='tdl'><?php echo ($j["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					<div class="login">
						<h1><span class="zb"><a href="#"></a></span></h1>
						<div class="clear"></div>
					  <div class="zhiyese"></div>
					</div>
				</div>
				<div class="zhigou">
					<div class="men" >
						<div class="jt">
							<div class="men_left"><img src="__PUBLIC__/Skin/Job/bj_20.jpg" /></div>
							<div class="men_ce">
								<ul class="huiyi">
									<li><a href="javascript:void(0);" class=set>企业介绍</a></li>
									<li><a href="/job/show_<?php echo ($jid); ?>.html" >招聘职位</a></li>
								</ul>
							</div>
							<div class="men_left"><img src="__PUBLIC__/Skin/Job/bj_21.jpg" /></div>
						</div>
						<div class="balei">
							<div class="qywyd">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr><td height="25"><strong style="color:#e17704; font-size:13px;"><?php echo ($vo["title"]); ?></strong> &nbsp;&nbsp; [<a href="http://www.baidu.com/s?wd=<?php echo ($vo["title"]); ?>" style="color:#454545; text-decoration:none;" target="_blank">百度一下</a>]</td></tr>
									<tr>
										<td>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td width="322">
														<table width="100%" border="0" cellspacing="1" cellpadding="0">
															<tr bgcolor="#FFFFFF"> 
																<td width="67" height="25" align="left">经营品牌：</td>
																<td width="252" height="25"><?php echo ($vo["manage"]); ?></td>
															</tr>
															<tr bgcolor="#FFFFFF"> 
																<td width="67" height="25" align="left">所在地区：</td>
																<td width="252" height="25"><?php echo ($vo["location"]); ?></td>
															</tr>
															<tr bgcolor="#FFFFFF"> 
																<td width="67" height="25" align="left">注册日期：</td>
																<td width="252" height="25"><?php echo ($vo["pubtime"]); ?></td>
															</tr>
															<tr bgcolor="#FFFFFF"> 
																<td width="67" height="25" align="left">企业性质：</td>
																<td height="25"><?php echo ($vo["nature"]); ?></td>
															</tr>
															<tr bgcolor="#FFFFFF"> 
																<td width="67" height="25" align="left">所属行业：</td>
																<td height="25"><?php echo (getEnumTitle($vo["category_id"])); ?></td>
															</tr>
															<tr bgcolor="#FFFFFF"> 
																<td width="67" height="25" align="left">注册资金：</td>
																<td height="25"><?php echo ($vo["capital"]); ?> 万元人民币</td>
															</tr>
															<tr bgcolor="#FFFFFF"> 
																<td width="67" height="25" align="left">员工人数：</td>
																<td height="25"><?php echo ($vo["scale"]); ?></td>
															</tr>
															<tr bgcolor="#FFFFFF"> 
																<td width="67" height="25" align="left">联系地址：</td>
																<td height="25"><?php echo ($vo["addr"]); ?></td>
															</tr>
														</table>													</td>
													<td align="center" valign="top"><img src="<?php echo (img($vo["logo"])); ?>" width="160" height="128" /></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td height="10"></td></tr>
								</table>
							</div>
							<div class="qywyd" style="margin-top:5px;">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr><td style=" line-height:20px;"><?php echo ($vo["content"]); ?></td></tr>
									<tr id="content2" style="display:none;"><td style="line-height:20px;"><?php echo ($vo["content2"]); ?></td></tr>
									<tr><td height="10"></td></tr>
								</table>
							</div>
							<div>
								
                                
							</div>
                            
                            <div id="gallery">
                                <ul>
                                    <?php if(is_array($figure)): $i = 0; $__LIST__ = $figure;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pvo): ++$i;$mod = ($i % 2 )?><li>
                                        <a href="<?php echo ($pvo["imgurl"]); ?>" title="">
                                            <img src="<?php echo ($pvo["thumb"]); ?>" width="120" height="160"  alt="" />
                                        </a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                            
							<div class="buyZonePrice">	
								<table  width="100%" border="0"  cellpadding="5" cellspacing="1">
									<tr>
										<th width="36"></th>
										<th width="200">职位</th>
										<th width="101">工作地点</th>
										<th width="99">发布日期</th>
									    <th width="93">有效期</th>
									    <th width="99">招聘人数</th>
									</tr>
									<?php if(is_array($alljob)): $i = 0; $__LIST__ = $alljob;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$j): ++$i;$mod = ($i % 2 )?><tr {if $key%2==0}class='bg_fa'{/if}{if $key%2!=0}class='bg_e7'{/if}>
										<td align='center'><?php echo ($key+1); ?></td>
										<td align='cneter'><a href='<?php echo (jurl($j["id"])); ?>'  style='text-decoration:underline; color:#333;'><?php echo ($j["title"]); ?></a></td>
										<td align='center'><?php echo ($j["workplace"]); ?></td>
										<td align='center'><?php echo (df($j["ctime"])); ?></td>
									    <td align='center'><?php echo (getEnumTitle($j["worklife"],'worklife')); ?></td>
									    <td align='center'><?php echo ($j["num"]); ?></td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>        
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


<script type="text/javascript" src="__PUBLIC__/plugin/lightbox/js/jq.lightbox.js"></script>
<script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>