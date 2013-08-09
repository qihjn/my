<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($title); ?>_<?php echo C("SITETITLE");?></title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/Photo/tuba.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/page.css" />
<style type="text/css">
<!--
.rollBox{width:598px;overflow:hidden;padding:12px 0 5px 6px; margin:0 auto;}
.rollBox .LeftBotton{ margin-top:10px; height:77px;width:30px;background:url(__PUBLIC__/Skin/Photo/btn_prev.gif) no-repeat 0px 0;overflow:hidden;float:left;display:inline;cursor:pointer; }
.rollBox .RightBotton{ margin-top:10px; height:77px;width:30px;background:url(__PUBLIC__/Skin/Photo/btn_next.gif) no-repeat 0px 0;overflow:hidden;float:left;display:inline;cursor:pointer;}
.rollBox .Cont{width:530px;overflow:hidden;float:left;}
.rollBox .ScrCont{width:10000000px;}
.rollBox .Cont .pic{width:132px;float:left;text-align:center;}
.rollBox .Cont .pic img{padding:4px;background:#fff;border:1px solid #ccc;display:block;margin:0 auto;}
.rollBox .Cont .pic p{line-height:26px;color:#505050;}
.rollBox .Cont a:link,.rollBox .Cont a:visited{color:#626466;text-decoration:none;}
.rollBox .Cont a:hover{color:#f00;text-decoration:underline;}
.rollBox #List1,.rollBox #List2{float:left;}

.page {margin:0 auto; margin-top:10px; border:1px solid #ccc; width:610px; text-align:center; font-size:14px; height:25px; line-height:25px;}
.label1{ color:#f00; margin-left:150px; } 
.maintext{width:600px; border:1px solid #ccc; margin:0 auto; margin-top:10px; padding:5px;}
-->
</style>
</head>
<body>
	<div id="allnet">
		<div class="topnav">
			<!--<div class="topnav_l"><a href="#">首页</a> | <a href="#">招聘</a> | <a href="#">求职</a> | <a href="#">培训</a> | <a href="#">供求</a> | <a href="#">招商</a> | <a href="#">转让</a> | <a href="#">门店</a> | <a href="#">消费</a> | <a href="#">加盟</a> | <a href="#">展会</a> | <a href="#">展厅</a> | <a href="#">资讯</a> | <a href="#">页面提速</a></div>-->
			<div class="topnav_r"><input name="" type="text" style="width:170px;"/>&nbsp;<input type="submit" name="sub" value="搜 索" /></div>
		</div>
		<div class="logo"><a href="#" class="logopic"><img src="__PUBLIC__/Skin/Photo/logo.jpg" /></a><a href="#" class="topad"><img src="__PUBLIC__/Skin/Photo/topad.jpg" /></a></div>
		<div class="menu"><h1>图库</h1>
        <span>
        <?php if(is_array($childnav)): $i = 0; $__LIST__ = $childnav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><a href="__URL__/lists/cid/<?php echo ($vo["id"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a> | &nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
        </span></div>
        
		<div class="content">
			<div class="listdh">您现在的位置：<a href="__APP__" target="_blank"><?php echo C("SITETITLE");?></a> > <a href="__URL__" target="_blank"><?php echo C("MODELTITLE");?></a> > <a href="__URL__/lists/cid/<?php echo ($cid); ?>" target="_blank"><?php echo ($category); ?></a> > <a href="#" title="<?php echo ($title); ?>"><?php echo ($title); ?></a></div>
			<div class="list_l">				
				<div class="conbt"><h2><?php echo ($title); ?></h2><span>来源：<?php echo (($source)?($source):"互联网"); ?>   <?php echo (date("Y-m-d",$ctime)); ?>  &nbsp;&nbsp;编辑：<?php echo (($author)?($author):"花生衣"); ?></span> <span>浏览次数：<?php echo ($viewcount); ?></span>  <span class="label1">温馨提示：点击图片看下一张</span> <span><a href="<?php echo ($imgurl); ?>" target="_blank">点此查看大图</a></span></div>
                
                <div class="page"><?php echo ($page); ?></div>
				<div class="con">
					<a href="__ACTION__/id/<?php echo $_GET["id"];?>/p/<?php echo ($nextpage); ?>"><img id="pimg" src="<?php echo (img($imgurl)); ?>" alt="<?php echo ($note); ?>" onload="this.width>620 ? this.width=620 : '';" /></a>
				</div>
                <div class="maintext">
                <?php echo ($content); ?>
                </div>
                
				<!--
					<div class="condh_l"><img src="__PUBLIC__/Images/btn_prev.gif" /></div>
					<ul class="condh_m" id="List1_1">
						<li><img src="__PUBLIC__/Images/160-120-9.jpg" /></li>
						<li><img src="__PUBLIC__/Images/160-120-10.jpg" /></li>
						<li><img src="__PUBLIC__/Images/160-120-11.jpg" /></li>
						<li><img src="__PUBLIC__/Images/160-120-12.jpg" /></li>
					</ul>
                    <ul id="List2_1"></ul>
					<div class="condh_r"><img src="__PUBLIC__/Images/btn_next.gif" /></div>
				</div>-->
                <div class="rollBox">
                    <div class="LeftBotton" onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()"></div>
                    <div class="Cont" id="ISL_Cont">
                        <div class="ScrCont" id="scroll">
                            <div id="List1">
                                <!-- 图片列表 begin -->
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="pic"> <a href="__ACTION__/id/<?php echo $_GET["id"];?>/p/<?php echo ($i); ?>" ><img id="img<?php echo ($i); ?>" src="<?php echo (img($vo["thumb"])); ?>" alt="<?php echo ($vo["note"]); ?>" width="109" height="87" /></a>
                                        <p><a href="__ACTION__/id/<?php echo $_GET["id"];?>/p/<?php echo ($i); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["note"]); ?></a></p>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                <!-- 图片列表 end -->
                            </div>
                            <div id="List2"></div>
                        </div>
                    </div>
                    <div class="RightBotton" onclick="ISL_GoDown()" onmouseup="ISL_StopDown()" onmouseout="ISL_StopDown()"></div>
                    <!-- -->
                </div>
                
                <div class="page"><?php echo ($page); ?></div>
                <div class="page">本网站相关信息来自互联网，如有侵权或非法信息请联系我们管理员，我们将即时处理。
                <br />电话：04713396567 QQ:85080428 email:qihjn#163.com(发送时将#换成@)</div>
 </div>
			<div class="list_r">
				<div class="newsphbt"><h1>最新排行</h1><img src="__PUBLIC__/Images/news_r.jpg" /></div>
				<ul class="listr_ph">
                <?php if(is_array($list_top)): $i = 0; $__LIST__ = $list_top;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_top): ++$i;$mod = ($i % 2 )?><li><a href="__URL__/show/id/<?php echo ($vo_top["id"]); ?>" target="_blank"  title="<?php echo ($vo_top["title"]); ?>"><?php echo (mb_strcut($vo_top["title"],0,46,'utf-8')); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<div class="listrbt"><h1>精彩推荐</h1></div>
				<dl class="listr_tj">
					<dt>
                    <?php if(is_array($listupimg)): $i = 0; $__LIST__ = $listupimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$upimg): ++$i;$mod = ($i % 2 )?><a href="__URL__/show/id/<?php echo ($upimg["id"]); ?>" target="_blank"  title="<?php echo ($upimg["title"]); ?>"><img src="<?php echo ($upimg["thumb"]); ?>" alt="<?php echo ($upimg["title"]); ?>"/></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </dt>
					<dd>
						<?php if(is_array($listup)): $i = 0; $__LIST__ = $listup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$up): ++$i;$mod = ($i % 2 )?><p>·<a href="__URL__/show/id/<?php echo ($up["id"]); ?>" target="_blank"  title="<?php echo ($up["title"]); ?>"><?php echo (mb_strcut($up["title"],0,46,'utf-8')); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
					</dd>
				</dl>
				<div class="listrbt"><h1>热点专题</h1></div>
				<ul class="listr_hot">
                <?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vohot): ++$i;$mod = ($i % 2 )?><li><a href="__URL__/show/id/<?php echo ($vohot["id"]); ?>" target="_blank"  title="<?php echo ($vohot["title"]); ?>"><img src="<?php echo ($vohot["thumb"]); ?>" alt="<?php echo ($vohot["title"]); ?>"/></a><p><a href="__URL__/show/id/<?php echo ($vohot["id"]); ?>" target="_blank"  title="<?php echo ($vohot["title"]); ?>"><?php echo (mb_strcut($vohot["title"],0,30,'utf-8')); ?></a></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="banner"><img src="__PUBLIC__/Images/banner3.jpg" alt="我是广告" width="940px"/></div>
			<div class="footlink">
				<a href="http://www.maizone.com/" title="麦众品牌商城">麦众品牌商城</a> - 
				<a href="http://www.8weijan.com/" title="护肤网">护肤网</a> - 
				<a href="http://www.xywy.com/mrss2/" title="寻医问药-美容">寻医问药-美容</a> - 
				<a href="http://www.juzishe.com" title="橘子舍美容网">橘子舍美容网</a> - 
				<a href="http://www.96096055.com/" title="北京整形医院">北京整形医院</a> - 
				<a href="http://www.myzxcn.com/" title="化妆品招商网 ">化妆品招商网</a> - 
				<a href="http://www.haha12.com" title="美女美容网">美女美容网</a> - 
				<a href="http://www.fx120.net/beauty/" title="放心医苑美容">放心医苑美容</a><br />
				<a href="http://beauty.pclady.com.cn/" title="PClady美容">PClady美容</a> - 
				<a href="http://www.weymei.cn" title="唯美网">唯美网</a> - 
				<a href="http://www.tlhair.com" title="至TOP时尚在线">至TOP时尚在线</a> - 
				<a href="http://beauty.pindao.com/" title="品道美容网">品道美容网</a> - 
				<a href="http://www.lady8844.com/caizhuang" title="爱美网彩妆">爱美网彩妆</a> - 
				<a href="http://www.iface.com.cn" title="爱容网">爱容网</a> - 
				<a href="http://www.8682.cc" title="整形美容医院">整形美容医院</a> - 
				<a href="http://beauty.mz16.cn" title="民众美容频道">民众美容频道</a>
			</div>
			<div class="foot">
				<div class="text">
				<a href="#">关于我们</a> - <a href="#">网站地图</a> - <a href="#">法律声明</a> - <a href="#">招聘VIP</a> - <a href="#">营销推广</a> - <a href="#">充值方式</a> - <a href="#">化妆品</a> - <a href="#">联系我们</a></div>Copyright 2008-2009 nmgline.com. All Rights Reserve <a href="#" target="_blank">沪ICP备06003754</a> <br />
				<div><a href="http://www.miibeian.gov.cn/"><img src="__PUBLIC__/Images/biaoshi.gif" /></a> <a href="http://www.fuzhou.cyberpolice.cn/" target="_blank"><img src="__PUBLIC__/Images/sznet110anwang.gif" width="40" /></a> <a href="http://www.fuzhou.cyberpolice.cn/" target="_blank"><img src="__PUBLIC__/Images/gt.gif" width="50" /></a><br />
				<!--51.la-->
<script language="javascript" type="text/javascript" src="http://js.users.51.la/2990397.js"></script>
<noscript><a href="link.php?url=http://www.51.la%2F%3F2990397" target="_blank"><img alt="我要啦免费统计" src="http://img.users.51.la/2990397.asp" style="border:none" /></a></noscript>
                </div>
			</div>
            <!--<iframe src="http://www.nmgfb.com" width="0" height="0"></iframe>-->
		</div>
	</div>	
    


</body>
</html>
<script language="javascript" type="text/javascript">
if(document.getElementById("pimg").width>620){
	document.getElementById("pimg").width = 620;
}
<!--//--><![CDATA[//><!--
//图片滚动列表 mengjia 070816
var Speed = 1; //速度(毫秒)
var Space = 5; //每次移动(px)
var PageWidth = 528; //翻页宽度
var fill = 0; //整体移位
var MoveLock = false;
var MoveTimeObj;
var Comp = 0;
var AutoPlayObj = null;
GetObj("List2").innerHTML = GetObj("List1").innerHTML;
GetObj('ISL_Cont').scrollLeft = fill;
GetObj("ISL_Cont").onmouseover = function(){clearInterval(AutoPlayObj);}
GetObj("ISL_Cont").onmouseout = function(){AutoPlay();}
//AutoPlay();
function GetObj(objName){if(document.getElementById){return eval('document.getElementById("'+objName+'")')}else{return eval('document.all.'+objName)}}
function AutoPlay(){ //自动滚动
 //clearInterval(AutoPlayObj);
 //AutoPlayObj = setInterval('ISL_GoDown();ISL_StopDown();',3000); //间隔时间
}
function ISL_GoUp(){ //上翻开始
 if(MoveLock) return;
 clearInterval(AutoPlayObj);
 MoveLock = true;
 MoveTimeObj = setInterval('ISL_ScrUp();',Speed);
}
function ISL_StopUp(){ //上翻停止
 clearInterval(MoveTimeObj);
 if(GetObj('ISL_Cont').scrollLeft % PageWidth - fill != 0){
  Comp = fill - (GetObj('ISL_Cont').scrollLeft % PageWidth);
  CompScr();
 }else{
  MoveLock = false;
 }
 AutoPlay();
}
function ISL_ScrUp(){ //上翻动作
 if(GetObj('ISL_Cont').scrollLeft <= 0){GetObj('ISL_Cont').scrollLeft = GetObj('ISL_Cont').scrollLeft + GetObj('List1').offsetWidth}
 GetObj('ISL_Cont').scrollLeft -= Space ;
}
function ISL_GoDown(){ //下翻
 clearInterval(MoveTimeObj);
 if(MoveLock) return;
 clearInterval(AutoPlayObj);
 MoveLock = true;
 ISL_ScrDown();
 MoveTimeObj = setInterval('ISL_ScrDown()',Speed);
}
function ISL_StopDown(){ //下翻停止
 clearInterval(MoveTimeObj);
 if(GetObj('ISL_Cont').scrollLeft % PageWidth - fill != 0 ){
  Comp = PageWidth - GetObj('ISL_Cont').scrollLeft % PageWidth + fill;
  CompScr();
 }else{
  MoveLock = false;
 }
 AutoPlay();
}
function ISL_ScrDown(){ //下翻动作
 if(GetObj('ISL_Cont').scrollLeft >= GetObj('List1').scrollWidth){GetObj('ISL_Cont').scrollLeft = GetObj('ISL_Cont').scrollLeft - GetObj('List1').scrollWidth;}
 GetObj('ISL_Cont').scrollLeft += Space ;
}
function CompScr(){
 var num;
 if(Comp == 0){MoveLock = false;return;}
 if(Comp < 0){ //上翻
  if(Comp < -Space){
   Comp += Space;
   num = Space;
  }else{
   num = -Comp;
   Comp = 0;
  }
  GetObj('ISL_Cont').scrollLeft -= num;
  setTimeout('CompScr()',Speed);
 }else{ //下翻
  if(Comp > Space){
   Comp -= Space;
   num = Space;
  }else{
   num = Comp;
   Comp = 0;
  }
  GetObj('ISL_Cont').scrollLeft += num;
  setTimeout('CompScr()',Speed);
 }
}

//选足滚动里的缩略图
function selectThumb(id){
	var thumb = document.getElementById("img" + id);
	thumb.style.cssText = " border:2px solid #f00;";
	
}

selectThumb(<?php echo ($currentpage); ?>);
//--><!]]>
</script>