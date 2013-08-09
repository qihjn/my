<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图吧</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/Photo/tuba.css" />
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
			<div class="flashbox" align="center">
				<div id=SwitchBigPic>
                <?php if(is_array($qiehuan)): $i = 0; $__LIST__ = $qiehuan;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank"  title="<?php echo ($vo["title"]); ?>"><img class="pic" alt="《玩命快递3》最新动作大片" src="<?php echo ($vo["thumb"]); ?>" /></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<ul id=SwitchNav>
                <?php if(is_array($qiehuan)): $i = 0; $__LIST__ = $qiehuan;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank"  title="<?php echo ($vo["title"]); ?>"><STRONG><?php echo (mb_strcut($vo["title"],0,30,'utf-8')); ?></STRONG><?php echo (mb_strcut(($vo["intro"])?($vo["intro"]):"这条信息的文字介绍这条信息的文字介绍这条信息的文字介绍",0,30,'utf-8')); ?></a> </li><?php endforeach; endif; else: echo "" ;endif; ?>	
				</ul>
			</div>
			<div class="newsph">
				<div class="newsphbt"><h1>最新排行</h1><img src="__PUBLIC__/Skin/Photo/news_r.jpg" /></div>
				<ul>
                	<?php if(is_array($listnewest)): $i = 0; $__LIST__ = $listnewest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$up): ++$i;$mod = ($i % 2 )?><li><a href="__URL__/show/id/<?php echo ($up["id"]); ?>" target="_blank"  title="<?php echo ($up["title"]); ?>"><?php echo (mb_strcut($up["title"],0,48,'utf-8')); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</ul>
			</div>
			<div class="clear"></div>
			<div class="title1"style="margin-top:10px"><h1><?php echo ($cline1["title"]); ?></h1><span><a href="__URL__/lists/cid/<?php echo ($cline1["id"]); ?>" target="_blank" title="<?php echo ($cline1["title"]); ?>">更多>></a></span></div>
			<ul class="mfhf">
				<?php if(is_array($line1)): $i = 0; $__LIST__ = $line1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a><p><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank"  title="<?php echo ($vo["title"]); ?>"><?php echo (mb_strcut($vo["title"],0,30,'utf-8')); ?></a></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<div class="title2"><h1><?php echo ($cline2z["title"]); ?></h1></div>
			<div class="content_l">
				<ul class="mrfh">
					<?php if(is_array($line2z)): $i = 0; $__LIST__ = $line2z;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a><p><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank"  title="<?php echo ($vo["title"]); ?>"><?php echo (mb_strcut($vo["title"],0,30,'utf-8')); ?></a></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="content_r">
				<div class="title3"><h1><?php echo ($cline2ys["title"]); ?></h1><span><a href="__URL__/lists/cid/<?php echo ($cline2yz["id"]); ?>" target="_blank" title="<?php echo ($cline1["title"]); ?>">更多>></a></span></div>
				<ul>
                
                    <?php if(is_array($line2ys)): $i = 0; $__LIST__ = $line2ys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a><p><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank"  title="<?php echo ($vo["title"]); ?>"><?php echo (mb_strcut($vo["title"],0,30,'utf-8')); ?></a></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
                
				</ul>
				<div class="title3"><h1><?php echo ($cline2yz["title"]); ?></h1><span><a href="__URL__/lists/cid/<?php echo ($cline2yz["id"]); ?>" target="_blank" title="<?php echo ($cline1["title"]); ?>">更多>></a></span></div>
				<ul>
					<?php if(is_array($line2yz)): $i = 0; $__LIST__ = $line2yz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a><p><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank"  title="<?php echo ($vo["title"]); ?>"><?php echo (mb_strcut($vo["title"],0,30,'utf-8')); ?></a></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<div class="title3"><h1><?php echo ($cline2yx["title"]); ?></h1><span><a href="__URL__/lists/cid/<?php echo ($cline2yx["id"]); ?>" target="_blank" title="<?php echo ($cline1["title"]); ?>">更多>></a></span></div>
				<ul>
				
                    <?php if(is_array($line2yx)): $i = 0; $__LIST__ = $line2yx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a><p><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank"  title="<?php echo ($vo["title"]); ?>"><?php echo (mb_strcut($vo["title"],0,30,'utf-8')); ?></a></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
				
                </ul>
			</div>
			<div class="banner"><img src="__PUBLIC__/Skin/Photo/banner.jpg" alt="我是广告"/></div>
			<div class="content_l">
				<div class="title4"><h1><?php echo ($cline3z["title"]); ?></h1></div>
				<ul class="czsj">
                <?php if(is_array($line3z)): $i = 0; $__LIST__ = $line3z;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a><p><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank"  title="<?php echo ($vo["title"]); ?>"><?php echo (mb_strcut($vo["title"],0,30,'utf-8')); ?></a></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="content_r">
				<div class="title1"><h1><?php echo ($cline3ys["title"]); ?></h1><span><a href="__URL__/lists/cid/<?php echo ($cline3ys["id"]); ?>" target="_blank" title="<?php echo ($cline3ys["title"]); ?>">更多>></a></span></div>
				<ul>
					<?php if(is_array($line3ys)): $i = 0; $__LIST__ = $line3ys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a><p><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank"  title="<?php echo ($vo["title"]); ?>"><?php echo (mb_strcut($vo["title"],0,30,'utf-8')); ?></a></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<div class="title1"><h1><?php echo ($cline3yz["title"]); ?></h1><span><a href="__URL__/lists/cid/<?php echo ($line3yz["id"]); ?>" target="_blank" title="<?php echo ($line3yz["title"]); ?>">更多>></a></span></div>
				<ul>
					<?php if(is_array($line3yz)): $i = 0; $__LIST__ = $line3yz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a><p><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank"  title="<?php echo ($vo["title"]); ?>"><?php echo (mb_strcut($vo["title"],0,30,'utf-8')); ?></a></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<div class="title1"><h1><?php echo ($cline3yx["title"]); ?></h1><span><a href="__URL__/lists/cid/<?php echo ($cline3yx["id"]); ?>" target="_blank" title="<?php echo ($cline3yx["title"]); ?>">更多>></a></span></div>
				<ul>
					<?php if(is_array($line3yx)): $i = 0; $__LIST__ = $line3yx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a><p><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>" target="_blank"  title="<?php echo ($vo["title"]); ?>"><?php echo (mb_strcut($vo["title"],0,30,'utf-8')); ?></a></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
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
<script type="text/javascript" src="__PUBLIC__/Js/prototype.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/changimages.js"></script>
<SCRIPT>
	var bigswitch = new SwitchPic(
		{
			bigpic:"SwitchBigPic",
			switchnav:"SwitchNav",
			selectstyle:"selected",
			objname:"bigswitch"
		}
	) ;
	bigswitch.goSwitch(bigswitch,0);
	bigswitch.autoSwitchTimer = setTimeout("bigswitch.autoSwitch(bigswitch) ;", 3000);
	</SCRIPT>