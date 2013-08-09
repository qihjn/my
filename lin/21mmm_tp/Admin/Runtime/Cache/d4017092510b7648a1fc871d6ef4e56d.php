<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理平台 <?php echo (THINK_VERSION); ?></title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/style.css" />
<script type="text/javascript" src="__PUBLIC__/Js/publicVar.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Base.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Ajax/ThinkAjax.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Form/CheckForm.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
<script language="JavaScript">
<!--
//指定当前组模块URL地址 
var URL = '__URL__';
var APP	 =	 '__APP__';
var PUBLIC = '__PUBLIC__';

//-->
</script>
</head>

<body >

<link href="__PUBLIC__/Skin/admin/company/list.css" rel="stylesheet" type="text/css" />

<div class="allnet">
    <div style="float:none; width:720px; display:inline; margin-top:10px;">
        <div style="text-align:left; font-size:15px; font-weight:bold; border-bottom:1px solid #CCC; color:#f90; margin-bottom:10px;">企业信息</div>
        <form action="__URL__/insert" method="post" name="descform" id="descform" style="border:1px solid #eee;">
            <div id="pictureinfuture">
                <div>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>机构名称:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <input type=text value='<?php echo ($vo["title"]); ?>' name=title exp="[\W\w]{1,30}|名称不为空" />
                        <font color="red">(*必填)</font></div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#eee;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>机构所在地:</div>
                    <div style='float:left;margin-bottom:5px;'>
                    	<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/Job/city.js"></script>
						<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/Job/place.js" charset="utf-8"></script>
                        <script>areao.load('location','<?php echo ($vo["province"]); ?>','<?php echo ($vo["city"]); ?>','',2);</script>
                        <font color="red">(*必填)</font> </div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#fff;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>行业分类:</div>
                    <div style='float:left;margin-bottom:5px;'>
                       <?php echo ($vo["category_id"]); ?>
                    </div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#fff;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>公司规模:</div>
                    <div style='float:left;margin-bottom:5px;'><?php echo ($vo["scale"]); ?></div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#eee;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>经营品牌:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <input type=text name=manage value='<?php echo ($vo["manage"]); ?>' id="manage" exp="[\W\w]+|品牌不为空" /><!--下拉列或弹出表形式，没有可自己填写-->
                        <font color="red">(*必填)</font> <font color="red">品牌间用“，”号隔开,如:自然美,倩碧</font></div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#fff;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>联系人:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <input type=text name=contacter value='<?php echo ($vo["contacter"]); ?>' id=contacter exp="[\W\w]+|联系人不为空" />
                        <font color="red">(*必填)</font></div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#eee;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>联系电话:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <input type=text name=phone value='<?php echo ($vo["phone"]); ?>' id="phone" />
                        如：021-51089999</div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#fff;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>联系地址:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <input type=text name=addr value='<?php echo ($vo["addr"]); ?>' id="addr" exp="[\W\w]{1,50}|地址不为空"/>
                        <font color="red">(*必填)</font></div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#fff;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>电子邮件:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <input type=text name=email value='<?php echo ($vo["email"]); ?>' id="email" exp="[\W\w]{1,100}|Email不为空" />
                        <font color="red">(*必填，否则如果招聘人才将无法接收简历)</font></div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#eee;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>传真:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <input type=text name=faq id="faq" value='<?php echo ($vo["faq"]); ?>' />
                        如：021-51089999</div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#fff;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>手机:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <input type=text name=mobile value='<?php echo ($vo["mobile"]); ?>' id="mobile"  />
                    </div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#fff;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>QQ:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <input type=text name=qq value='<?php echo ($vo["qq"]); ?>' id="qq" />
                    </div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#fff;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>MSN:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <input type=text name=msn value='<?php echo ($vo["msn"]); ?>' id="msn"  />
                    </div>
                    <div style='clear:both;'></div>
                </div>
                
                <div style='background:#eee;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>创建时间:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <input type=text name=pubtime id="pubtime" value="<?php echo ($vo["pubtime"]); ?>" onclick="calendar();" onfocus="calendar();" style="width:70px;" /><script language="javascript" src="__PUBLIC__/Js/Util/calendar.js" ></script>
                        如: 2009-01-01</div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#fff;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>企业性质:</div>
                    <div style='float:left;margin-bottom:5px;'><?php echo ($vo["nature"]); ?></div>
                    <div style='clear:both;'></div>
                </div>
                
                <div style='background:#eee;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>注册资金:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <input type=text name=capital id="capital" value='<?php echo ($vo["capital"]); ?>' />
                        万人民币</div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#fff;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>公司网址:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <input type=text name=domain id="domain" value='<?php echo ($vo["domain"]); ?>' />
                    </div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#fff;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>企业Logo:</div>
                    <div style='float:left;margin-bottom:5px;'><?php echo ($vo["nature"]); ?></div>
                    <div style='clear:both;'></div>
                </div>
                <div style='background:#eee;'>
                    <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>企业介绍:</div>
                    <div style='float:left;margin-bottom:5px;'>
                        <textarea name="content" id="content" style="width:580px; height:160px;"><?php echo ($vo["content"]); ?></textarea>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                
                <div style='background:#fff; height:210px;'>
                   <div style='float:left;width:15%;font-weight:bold;margin:2px 0;'>企业形象:</div>
                    <div style='float:left;margin-bottom:5px;'>
                       
                    </div>
                    <div style="clear:both;"></div> 
                </div>
                
                <div>
                	<input type="hidden" name="id" id="id" value="<?php echo ($vo["id"]); ?>" />
                    <input type="hidden" name="logo" id="thumb" value="<?php echo ($vo["logo"]); ?>" />
                    <input type="hidden" name="nid" id="nid" value="<?php echo ($vo["nid"]); ?>" /><!--若不用旧程序时，此处可去-->
                    <input type="hidden" name="uid" id="uid" value="<?php echo ($vo["uid"]); ?>" />
                    <input type="hidden" name="tid" id="tid" value="<?php echo ($vo["uid"]); ?>" /> <!--图片表是用uid做标识的，并不是公司的id-->
                    <input type="hidden" name="referurl" id="referurl" value="<?php echo ($vo["referurl"]); ?>" />
                    <input type="submit" value='确认' class="btn" style='border:1px solid #aaa;background:none;padding:3px;width:120px;' />
                </div>
            </div>
        </form>
        
        <div style="position:absolute; left: 642px; top: 27px; width: 283px; height: 93px; border: 1px none #000000;">

    <form action="<?php echo C("IMG_URL");?>upload/upload_one.php?tid=<?php echo ($vo["uid"]); ?>" enctype="multipart/form-data" method="post" target="up" onsubmit="clearCut();" id="upFrom" >

<input name="img" type="file" id="img" size="15" />
<input type="submit" name="button" id="submit" value="上传企业logo" />
<input type="hidden" name="model" id="model" value="CompanyLogo" />
<input type="hidden" name="type" id="type" value="face" />
<input type="hidden" name="utype" id="utype" value="" />
<input type="hidden" name="thumb" id="thumb_999" value="<?php echo ($vo["logo"]); ?>" />
<input name="k" value="999" type="hidden" /><!--thumb后缀，用于返回js无法区分多个相同的thumb-->
<input type="hidden" name="tid" id="tid" value="<?php echo ($vo["uid"]); ?>" />

<input type="hidden" name="upThumb" id="upThumb" /><!--可无,若不加返回的js会出现没有该对象的错误-->
<input type="hidden" name="upTid" id="upTid" /><!--可无-->

</form>
<iframe name="up" style="display:none;"></iframe>
<div id="preview"><img src="<?php echo (img($vo["logo"])); ?>" /></div>
<div id="p2"></div>
</div>

<div style="position:absolute; left: 245px; top: 721px; width: 250px; height: 25px; border: 0px solid #000000; z-index:2; width:621px; height:153px;">
	<table><tr>
			<?php if(is_array($p)): $k = 0; $__LIST__ = $p;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): ++$k;$mod = ($k % 2 )?><td valign="bottom">
            	<img id="img_<?php echo ($k); ?>" src="<?php if(empty($img["thumb"])): ?>err/nohave.gif<?php else: ?><?php echo (img($img["thumb"])); ?><?php endif; ?>" width="100" />
                <!--<a id="editPhoto">编辑</a>-->
                
               
            <form id="form_<?php echo ($k); ?>" action="<?php echo C("IMG_URL");?>upload/upload_one.php?tid=<?php echo ($vo["uid"]); ?>" enctype="multipart/form-data" method="post" target="fr<?php echo ($k); ?>">
            <input name="file1" type="file" id="file1" size="1" onchange="fileChange(<?php echo ($k); ?>,this);" />
            <input name="k" value="<?php echo ($k); ?>" type="hidden" />
            <?php if(!empty($$img["thumb"])): ?><a href="/file/del/id/<?php echo ($img["id"]); ?>" urn="">删除</a><?php endif; ?>
            <input type="hidden" id="thumb_<?php echo ($k); ?>" name="thumb" value="<?php echo ($img["thumb"]); ?>" />
            <input type="hidden" id="model" name="model" value="ComapnyFigure" />
            <input type="hidden" id="type" name="type" value="figure" />
            <input type="hidden" id="utype" name="utype" value="" />
            <input type="hidden" id="tempid" name="tempid" value="<?php echo ($vo["uid"]); ?>" />
            <input type="hidden" id="noUpdateParentThumb" name="noUpdateParentThumb" value="1" />
            <input type="hidden" id="desPreview" name="desPreview" value="mult" />
            
            <iframe name="fr<?php echo ($k); ?>" style="display:none;"></iframe>
            </form>
            </td><?php endforeach; endif; else: echo "" ;endif; ?>
           <div style="display:none" id="mult"></div>
            
            
         </tr></table>
</div>
        
    </div>
    </div>
    
    

 <style>
 body{font-family:tahoma}
 div.footer{ clear:both; padding:8px 0px; width:98%; text-align:center; font:normal normal normal 11px Verdana,Geneva,Arial,Helvetica,sans-serif; background-color:#464646; border-top:2px solid silver; color:silver}
div.footer a{color:white; text-decoration:none; border-bottom:1px dotted}
div.footer a:hover{color:silver; text-decoration:none; border-bottom:1px dotted}
.think_run_time{text-align:center; width:100%;font-size:12px;}
</style>
<!-- 版权信息区域 -->
<!--<div id="footer" class="footer" >Powered by qihjn <?php echo (THINK_VERSION); ?> | Template designed by <a target="_blank" href="http://www.wzrun.com">TopThink</a> <span id="run"></span>
</div>-->
</body>
</html>
<script type="text/javascript" src="__PUBLIC__/Js/Base.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Ajax/ThinkAjax.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Form/CheckForm.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
<script type="text/javascript">
//alert(document.getElementsByName("thumb").item(1).value);
document.domain = "21mmm.cn";
	document.getElementById("descform").onsubmit=function(){
		for(i=0;i<this.length;i++){
			var ep=this[i].getAttribute("exp");
			if(ep){
				var ea=ep.split("|");
				if(!this[i].value){
					alert(ea[1]);
					this[i].focus();
					return false;
				}
			}
		}
		return true;
	}
	
	
</script>