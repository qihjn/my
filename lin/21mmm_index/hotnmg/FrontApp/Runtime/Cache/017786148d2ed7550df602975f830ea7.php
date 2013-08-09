<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(isset($moduleTitle)): ?><?php echo ($moduleTitle); ?>-<?php endif; ?><?php if(isset($contentDetail)): ?><?php echo ($contentDetail["title"]); ?>-<?php endif; ?><?php echo ($sysConfig["site_name"]); ?> </title>
<meta name="keywords" content="<?php echo (($contentDetail["keyword"])?($contentDetail["keyword"]):$sysConfig['seo_keyword']); ?>" />
<meta name="description" content="<?php echo (($contentDetail["description"])?($contentDetail["description"]):$sysConfig['seo_description']); ?> " />
<link href="__PUBLIC__/Front/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#childNav{ position:relative; }
.childNav{ position:absolute; left:200px;  height:22px; line-height:22px; background:url(/Public/Front/1px_bg.gif);   display:none; padding:0 10px;}
.childNav a{ color:#36C; font-size:13px; font-weight:bold;}
</style>

<script src="__PUBLIC__/Front/jquery-1.3.2.min.js"></script> 
<script src="__PUBLIC__/Front/jquery.tools.min.js"></script>

<script type="text/javascript" >
$(function(){
	$("#verifyImage").click(function(){
		resetVerifyCode();						
	})
})
function resetVerifyCode()
{
	$("#verifyImage").attr('src', "<?php echo U('Index/verify',0,0,0);?>__"+ Math.random());
}

</script>

</head>

<body>
<?php echo ($sysConfig["header_content"]); ?>
<!--<div id="top_menu">
<ul>
<?php if(is_array($globalMenu)): $i = 0; $__LIST__ = $globalMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): ++$i;$mod = ($i % 2 )?><?php if(($row['status'])  ==  "0"): ?><li><a href="<?php echo ($row["link_url"]); ?>" target="<?php echo ($row["target"]); ?>" style="<?php echo ($row["title_style"]); ?>"><?php echo ($row["title"]); ?></a></li><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>-->
<!--头部以及菜单-->
<div id="header">
<div id="logo"><a href="__ROOT__" id="top"><img src="__PUBLIC__/Front/logo.jpg" /></a></div>
<div id="nav">
  <ul>
<li><a href="__APP__" class="<?php echo (a2bc($moduleName,"Index","nav_select")); ?>">首 页</a></li>

<li><a href="<?php echo U('Page/detail',array('item'=>'about'));?>"  urn="childNav_zxjj">中心简介</a></li>

<li><a href="<?php echo U('News/index');?>"  urn="childNav_xwdt">新闻动态</a></li>

<li><a href="<?php echo U('Download/index');?>"  urn="childNav_kctx">课程体系</a></li>

<li><a href="<?php echo U('Product/index');?>"  urn="childNav_zjsc">早教商城</a></li>

<li><a href="<?php echo U('Feedback/index');?>"   urn="childNav_jmcy">加盟创业</a></li>

<li><a href="<?php echo U('Job/index');?>" urn="childNav_rczp">人才招聘</a></li>

<li><a href="<?php echo U('Tags/index');?>"  urn="childNav_lxwm">联系我们</a></li>
</ul>
</div>

<div id="childNav">
    <div id="childNav_zxjj" class="childNav">
        <a href="<?php echo U('Page/detail',array('item'=>'ppdw'));?>" target="_blank">品牌定位</a>
        <a href="<?php echo U('Page/detail',array('item'=>'ppwh'));?>" target="_blank">品牌文化</a>
        <a href="<?php echo U('Page/detail',array('item'=>'mrjz'));?>" target="_blank">名人见证</a>
        <a href="<?php echo U('Page/detail',array('item'=>'jtjs'));?>" target="_blank">集团介绍</a>
    </div>
    
    <div id="childNav_xwdt" class="childNav">
        <a href="<?php echo U('Page/detail',array('category'=>'5'));?>" target="_blank">集团新闻</a>
        <a href="<?php echo U('Page/detail',array('category'=>'4'));?>" target="_blank">市场活动</a>
        <a href="<?php echo U('Page/detail',array('category'=>'3'));?>" target="_blank">加盟动态</a>
        <a href="<?php echo U('Page/detail',array('category'=>'2'));?>" target="_blank">行业新闻</a>
    </div>
    
    <div id="childNav_kctx" class="childNav">
        <a href="<?php echo U('Page/detail',array('item'=>'kctx'));?>" target="_blank">课程体系</a>
        <a href="<?php echo U('Page/detail',array('item'=>'kcys'));?>" target="_blank">课程优势</a>
        <a href="<?php echo U('Page/detail',array('item'=>'kkxx'));?>" target="_blank">开课信息</a>
        <a href="<?php echo U('Page/detail',array('item'=>'zxzx'));?>" target="_blank">在线咨询</a>
    </div>
    
    <div id="childNav_zjsc" class="childNav">
        <a href="<?php echo U('Page/detail',array('item'=>'msjj'));?>" target="_blank">蒙氏教具</a>
        <a href="<?php echo U('Page/detail',array('item'=>'mswj'));?>" target="_blank">蒙氏玩具</a>
        <a href="<?php echo U('Page/detail',array('item'=>'jjzl'));?>" target="_blank">早教资料</a>
        <a href="<?php echo U('Page/detail',array('item'=>'gmzx'));?>" target="_blank">购买咨询</a>
    </div>
    
    <div id="childNav_jmcy" class="childNav">
        <a href="<?php echo U('Page/detail',array('item'=>'ppjs'));?>" target="_blank">品牌介绍</a>
        <a href="<?php echo U('Page/detail',array('item'=>'jmdt'));?>" target="_blank">加盟动态</a>
        <a href="<?php echo U('Page/detail',array('item'=>'jmys'));?>" target="_blank">加盟优势</a>
        <a href="<?php echo U('Page/detail',array('item'=>'jmlc'));?>" target="_blank">加盟流程</a>
        <a href="<?php echo U('Page/detail',array('item'=>'cgal'));?>" target="_blank">成功案例</a>
    </div>
    
    <div id="childNav_rczp" class="childNav">
        <a href="<?php echo U('Page/detail',array('item'=>'qyjs'));?>" target="_blank">企业介绍</a>
        <a href="<?php echo U('Page/detail',array('item'=>'zxzp'));?>" target="_blank">最新招聘</a>
        
    </div>
    
    <div id="childNav_lxwm" class="childNav">
        <a href="<?php echo U('Page/detail',array('item'=>'jtzb'));?>" target="_blank">集团总部</a>
        <a href="<?php echo U('Page/detail',array('item'=>'fycx'));?>" target="_blank">分园查询</a>
        <a href="<?php echo U('Page/detail',array('item'=>'schz'));?>" target="_blank">市场合作</a>
    </div>
</div>
<script language="javascript" type="text/javascript">
var coord, currentShow;
function mouseCoords(ev) { 
  if(ev.pageX || ev.pageY){ 
  	return {x:ev.pageX, y:ev.pageY}; 
  } 
  
  return { 
	x:ev.clientX + document.body.scrollLeft - document.body.clientLeft, 
	y:ev.clientY + document.body.scrollTop - document.body.clientTop 
  }; 
} 

$('#nav a').each(function(){
	 this.onmouseover = function(e){
		
		e =e || window.event;
		coord = mouseCoords(e);
		showChildNav(this.getAttribute('urn'), coord);
	};
	
	 this.onmouseout = function(e){
		//showChildNav(this.getAttribute('urn'), coord);
		//$(currentShow).css('display','none');
	};
});

function showChildNav(parent,coord){
	
	if(currentShow){
		currentShow.css('display','none'); //清除上一个显示
	}
	
	//显示
	currentShow = $('#' + parent)
	if(currentShow){
		currentShow.css('left',coord.x-50);
		currentShow.css('display','block');
	}
	
	//$('<a href="http://www.baidu.com">bbb</a>').appendTo('#childNav');
}
</script>
</div>
<script src="__ROOT__/Public/Front/jquery-1.3.2.min.js"></script> 
<script src="__ROOT__/Public/Front/jquery.tools.min.js"></script>
<!--JS幻灯片-->
<div id="ishow" class="clear"><!--定位-->
<div class="tab">
<a class="backward">prev</a>
  <div class="images">
<?php $condition = 'category_id=33 and status=0'; $order = 'id DESC'; $limit = '5'; if(!isset($Ad)) : $AdDao = M('Ad'); endif; if(!isset($ad)) :$ad = $AdDao->Where($condition)->Order($order)->Limit($limit)->findAll();endif; if(is_array($ad)): $i = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): ++$i;$mod = ($i % 2 )?><div><a href="<?php echo ($row["link_url"]); ?>" target="_blank"><img src="__ROOT__/Uploads/<?php echo ($row["attach_file"]); ?>" alt="<?php echo ($row["title"]); ?>"/></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
    
  </div>
  <a class="forward">next</a> 
<div class="tabs clear"> 
    <a href="#"></a> 
    <a href="#"></a> 
    <a href="#"></a> 
</div>
<script type="text/javascript">
$("div.tabs").tabs(".images > div", { 
        effect: 'fade', 
        fadeOutSpeed: "slow", 
        rotate: true 
    }).slideshow();
$("div.tabs").tabs().play();
    </script></div>
</div>

<!--首页内容主体-->
<div id="index_main" class="clear">
<!--新闻-->
<div id="news"><h3>行业新闻<em>news</em></h3>
<ul>
<?php $condition = ''; $order = 'id DESC'; $limit = '15'; if(!isset($News)) : $NewsDao = M('News'); endif; if(!isset($news)) :$news = $NewsDao->Where($condition)->Order($order)->Limit($limit)->findAll();endif; if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo U('News/detail',array('item'=>$row['id']));?>" target="_blank"><?php echo ($row["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
<!--联系-->
<div id="Contact"><a href="<?php echo U('Page/detail',array('item'=>'contact'));?>" class="us">联系我们</a><a href="<?php echo U('Feedback/index');?>" class="fb">客户反馈</a><a href="<?php echo U('News/index');?>" class="m">媒体报道</a></div>
<!--产品-->
<div id="Products"><h3>早教商城<em>Shop</em></h3>
<ul>
<?php $condition = 'attach=1'; $order = 'id DESC'; $limit = '3'; if(!isset($Product)) : $ProductDao = M('Product'); endif; if(!isset($productList)) :$productList = $ProductDao->Where($condition)->Order($order)->Limit($limit)->findAll();endif; if(is_array($productList)): $i = 0; $__LIST__ = $productList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo U('Product/detail',array('item'=>$row['id']));?>" target="_blank"><img src="__ROOT__/Uploads/<?php echo ($row["attach_thumb"]); ?>" width="115" height="87" align="left" /></a>
  <h4><a href="<?php echo U('Product/detail',array('item'=>$row['id']));?>" target="_blank"><?php echo ($row["title"]); ?></a></h4><p><?php echo (msubstr($row["description"],0,50)); ?></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>

</div>

<!--友情链接-->
<div id="friend"><h3>友情链接<em>Link</em></h3>
<div>
<?php $condition = 'link_type=\'image\''; $order = 'id DESC'; $limit = '10'; if(!isset($Link)) : $LinkDao = M('Link'); endif; if(!isset($linkImage)) :$linkImage = $LinkDao->Where($condition)->Order($order)->Limit($limit)->findAll();endif; if(is_array($linkImage)): $i = 0; $__LIST__ = $linkImage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): ++$i;$mod = ($i % 2 )?><?php if(($row['link_type'])  ==  "image"): ?><a href="<?php echo ($row["link_url"]); ?>"><img src="__ROOT__/Uploads/<?php echo ($row["attach_image"]); ?>" width="88" height="31" /></a><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div>
<?php $condition = 'link_type=\'text\''; $order = 'id DESC'; $limit = '10'; if(!isset($Link)) : $LinkDao = M('Link'); endif; if(!isset($linkText)) :$linkText = $LinkDao->Where($condition)->Order($order)->Limit($limit)->findAll();endif; if(is_array($linkText)): $i = 0; $__LIST__ = $linkText;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rowTxt): ++$i;$mod = ($i % 2 )?><?php if(($rowTxt['link_type'])  ==  "text"): ?><a href="<?php echo ($rowTxt["link_url"]); ?>"><?php echo ($rowTxt["title"]); ?></a><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>

</div>
</div>

<!--底部-->
<div id="footer">
<div class="fline"><span><?php echo ($sysConfig["site_name"]); ?></span></div>
Copyright © 2008-2010 <a href="http://www.hotnmg.com" target="_blank">hotnmg</a> <a href="http://www.miibeian.gov.cn" target="_parent"><?php echo ($sysConfig["icp"]); ?></a>版权所有 hotnmg.cn </div>
<?php echo ($sysConfig["footer_content"]); ?>
</body>
</html>