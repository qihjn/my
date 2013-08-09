<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title>shuguangCMS 提示信息</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<base target="_self" />
<style type="text/css" media="screen,print" >
#content{width:80%;height:500;background:#F5FFF7;border:1px solid #69BA26;margin:40px;padding:35px;font-size:14px;text-align:left;}
a{color:#61C422;}
.span{ font-size:14px;color:#F00; font-family:Tahoma, Geneva, sans-serif}
a:link,a:visited{text-decoration:none;}
a:hover,a:active{text-decoration:none;}
</style>
</head>
<body>
<center>
<div id="content">

<h3><a style="">系统发生错误</a></h3>
<span class="span"><a style="color:#F00"><?php echo $e['message'];?></a></span>    
<?php if(isset($e['file'])) {?>
<span class="span">　FILE: <?php echo $e['file'] ;?><br />
　LINE: <?php echo $e['line'];?></span>  
<?php }?>

<?php if(isset($e['trace'])) {?>
<h3><a style="">TRACE</a></h3>
<span class="span">
<?php echo nl2br($e['trace']);?>
</span>  
<?php }?>


    

</div>
</center>
</body>
</html>