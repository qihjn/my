<?php
/**
 * 
 * install.php (install)
 *
 * @package      	shuguangCMS
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: install.php v2.0 2010-01-01 00:00:00 shuguang $

 */

date_default_timezone_set('PRC');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@set_time_limit(1000);
set_magic_quotes_runtime(0);
header('Content-Type: text/html; charset=UTF-8');

define('SHUGUANG', str_replace('\\', '/', dirname(__FILE__)));
define('CMS_ROOT', str_replace('\\', '/', dirname(__FILE__)));
define('CMS_DATA', './CmsData/');
$phpv = phpversion() < 5 ? '<font color=red>不支持</font>' : phpversion();
if(phpversion()<5){
    die('本系统需要PHP5+MYSQL >=4.1环境，当前PHP版本为：'.phpversion());
}
$os = PHP_OS;
$soft = $_SERVER['SERVER_SOFTWARE'];
$remoteAddr = (empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_HOST'] : $_SERVER['REMOTE_ADDR']);
$uri = $_SERVER['SERVER_NAME'];
$server = $_SERVER['SERVER_NAME'];
$urlOpen = (ini_get('allow_url_fopen') ? '开启' : '<font color=red>关闭</font>');
$safeMode = (ini_get('safe_mode') ? '开启' : '关闭');
$mysql = (function_exists('mysql_connect') ? '支持' : '<font color=red>不支持</font>');
$fileGetContent = (function_exists('file_get_contents') ? '支持' : '<font color=red>不支持</font>');
$session = (function_exists('session_start') ? '支持' : '<font color=red>不支持</font>');
$tmp = function_exists('gd_info') ? gd_info() : array();
$gd = empty($tmp['GD Version']) ? '<font color=red>不支持</font>' : $tmp['GD Version'];
unset($tmp);
$zend = (get_cfg_var("zend_optimizer.optimization_level")||get_cfg_var("zend_extension_manager.optimizer_ts")||get_cfg_var("zend_extension_ts")) ?'支持':'不支持';

$time = time();
$timeFormat = date('Y-m-d H:i:s');
$uploadSize = ini_get('file_uploads') ? ini_get('upload_max_filesize'): '禁止上传';
$maxExcuteTime = ini_get('max_execution_time').' 秒';
$maxExcuteMemory = ini_get('memory_limit');
$phpGpc = get_magic_quotes_gpc() ? '开启' : '关闭';;
$excuteUseMemory =  function_exists('memory_get_usage') ? memory_get_usage() : '未知';

$host = empty($_SERVER['SERVER_NAME']) ?  $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
$webUrl = 'http://' . $host . dirname($_SERVER['SCRIPT_NAME']);
$webAdminUrl = $webUrl.'/admin.php';
$configFile =  './db.config.php';
$header = <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>shuguangCMS</title>
<link rel="stylesheet" type="text/css" href="CmsData/Install/install.css">
<!--style type="text/css">

body{background-color:#F7F7F7;font-family:Arial;font-size:12px;line-height:150%}a,a:link,a:active{text-decoration:none}.main{background-color:#FFF;font-size:12px;color:#666;width:70%;list-style:none;border:#DFDFDF 1px solid;margin:10px auto;padding:10px}#top-title{background:url(Public/Admin/logo.gif) no-repeat right;margin:20px 0 30px;padding:5px 0}.input{border:1px solid #CCC;font-family:Arial;font-size:18px;height:28px;background-color:#F7F7F7;color:#666;margin:5px 25px}.submit{background-color:#FFF;border:1px solid #999;border-left-color:#ccc;border-top-color:#ccc;color:#333;cursor:hand;padding:.25em}.title{font-size:24px;font-weight:700}.care{color:#06C}.title2{font-size:14px;color:#000;border-bottom:#CCC 1px solid;font-weight:700}.foot{text-align:center}#agreement{color:#666;height:300px;line-height:21px;overflow-y:scroll;padding:16px}#successTips{position:absolute;bottom:50px;left:50%;top:20%;height:350px;margin-left:-250px;color:#2FA500;background:#EBFEEF;border:1px solid #69BA26;padding:20px}#successTipsBody{overflow-y:auto;height:300px;font-size:14px;width:500px;margin-top:20px;scrollbar-face-color:#fff;scrollbar-highlight-color:#FFF;scrollbar-shadow-color:gray;scrollbar-3dlight-color:#69BA26;scrollbar-arrow-color:#FFF;scrollbar-track-color:#ddd;scrollbar-darkshadow-color:#fff;scrollbar-base-color:#69BA26}#successTipsTitle{height:30px;color:red}#successTipsTitle a:hover{background:green}#successTipsTitle a{text-decoration:none;color:red;border:1px solid #69BA26;display:block;float:left;margin:10px;padding:2px}

</style-->

<script type="text/javascript" language="javascript" src="Public/Js/Jquery/jquery.js"></script>
<script type="text/javascript" language="javascript">
function setup()
{
	$.ajax({   
		  type:"POST",   
			  url:"install.php?step=setup",
			  data:{
				  dbHost: $('#dbHost').val(), dbUsername: $('#dbUsername').val(), dbPassword: $('#dbPassword').val(), dbPort:$('#dbPort').val(), dbName:$('#dbName').val(), adminUsername:$('#adminUsername').val(), adminPassword:$('#adminPassword').val(), tablepre:$('#tablepre').val(), siteName:$('#siteName').val(), siteUrl:$('#siteUrl').val(), companyName:$('#companyName').val(), email:$('#email').val(), icp:$('#icp').val()
				  },   
			  beforeSend:function(){
				  	$("#setupLoading").html('<span style="color:#FF0000"><img src="Public/Admin/loading.gif" align="absmiddle">正在安装,请稍等...</span>'); 
				  },                
			  success:function(data){
				switch(data)
				{
					case 'phpFalse':
						$("#setupLoading").html('<span style="color:#FF0000">您的PHP版本低于5, 无法使用 shuguangCMS</span>');
					break
					case 'tablepreFalse':
						$("#setupLoading").html('<span style="color:#FF0000">您指定的数据表前缀包含点字符，请返回修改</span>');
					break
					case 'connectMust':
						$("#setupLoading").html('<span style="color:#FF0000">数据库主机，用户名，密码，数据库名称必须填写.</span>');
					break
					case 'adminMust':
						$("#setupLoading").html('<span style="color:#FF0000">超级管理员用户名长度不能少于4字符</span>');
					break
					case 'adminLen':
						$("#setupLoading").html('<span style="color:#FF0000">超级管理员用户名长度不能少于4字符</span>');
					break
					case 'adminPasswordLen':
						$("#setupLoading").html('<span style="color:#FF0000">超级管理员密码长度不能少于6字符</span>');
					break
					case 'connectFalse':
						$("#setupLoading").html('<span style="color:#FF0000">不能正常连接到数据库,请检查用户名/密码/数据库名是否正确</span>');
					break
					case 'createDatabaseFalse':
						$("#setupLoading").html('<span style="color:#FF0000">选择数据库失败。尝试创建数据库未成功。可能是你没权限，请先手动创建数据库</span>');
					break
					case 'mysqlVersionFalse':
						$("#setupLoading").html('<span style="color:#FF0000">数据库版本必须是4.1以上版本才能使用本系统</span>');
					break
					default:
						$("#successTipsBody").append(data);
						$("#successTips").show();
						$("#setupLoading").hide();
						$("#footer").hide();
						//alert (data);
				}
				return false;			
			}               
         });   
}


</script>

</head>
<body>
<div class="main">
<div id="top-title">
<p><span class="title">shuguangCMS2.5</span><span> 安装程序</span></p>
</div>
EOF;

$footer = <<<EOF
<div>
<p class="foot">Powered by <a href="http://www.sgcms.cn">shuguangCMS</a></p></div>
</body>
</html>
EOF;

$step = isset($_GET['step'])? $_GET['step'] : '';

if(empty($step)){
    echo $header;
?>

<div class="b">
    <p class="title2">1、shuguangCMS许可协议</p>
    <div id="agreement">
    
    <p>版权所有 (c)2008-2010，sgcms.cn 保留所有权利。 </p>
				<p>感谢您选择曙光企业网站内容管理系统（以下简称shuguangCMS），shuguangCMS是一款开源且免费的企业网站建设解决方案之一，基于 PHP + MySQL   的技术开发，全部源码开放。</p>
				<p>shuguangCMS 的官方网址是： <a href="http://www.sgcms.cn" target="_blank">www.sgcms.cn</a></p>
				<p>为了使你正确并合法的使用本软件，请你在使用前务必阅读清楚下面的协议条款：</p>
		    <p><strong>一、本授权协议适用于 shuguangCMS 1.x 版本，shuguangCMS官方对本授权协议的最终解释权。</strong>
      </p>
		    <p><strong>二、协议许可的权利 </strong>
      </p>
<p>1、您可以在完全遵守本最终用户授权协议的基础上，将本软件应用于非商业用途，而不必支付软件版权授权费用。 </p>
				<p>2、您可以在协议规定的约束和限制范围内修改 shuguangCMS 源代码或界面风格以适应您的网站要求。 </p>
				<p>3、您拥有使用本软件构建的网站全部内容所有权，并独立承担与这些内容的相关法律义务。 </p>
				<p>4、获得商业授权之后，您可以将本软件应用于商业用途，同时依据所购买的授权类型中确定的技术支持内容，自购买时刻起，在技术支持期限内拥有通过指定的方式获得指定范围内的技术支持服务。商业授权用户享有反映和提出意见的权力，相关意见将被作为首要考虑，但没有一定被采纳的承诺或保证。 </p>
			<strong>三、协议规定的约束和限制 </strong>
				<p>1、未获商业授权之前，不得将本软件用于商业用途（包括但不限于企业网站、经营性网站、以营利为目的或实现盈利的网站）。购买商业授权请登陆   <a href="http://www.sgcms.cn" target="_blank">www.sgcms.cn</a> 了解最新说明。</p>
				<p>2、未经官方许可，不得对本软件或与之关联的商业授权进行出租、出售、抵押或发放子许可证。</p>
				<p>3、不管你的网站是否整体使用 shuguangCMS ，还是部份栏目使用 shuguangCMS，在你使用了 shuguangCMS 的网站主页上必须加上 shuguangCMS   官方网址(<a href="http://www.sgcms.cn" target="_blank">www.sgcms.cn</a>)的链接。</p>
				<p>4、未经官方许可，禁止在 shuguangCMS   的整体或任何部分基础上以发展任何派生版本、修改版本或第三方版本用于重新分发。</p>
				<p>5、如果您未能遵守本协议的条款，您的授权将被终止，所被许可的权利将被收回，并承担相应法律责任。 </p>
			<strong>四、有限担保和免责声明 </strong>
				<p>1、本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的。 </p>
				<p>2、用户出于自愿而使用本软件，您必须了解使用本软件的风险，在尚未购买产品技术服务之前，我们不承诺对免费用户提供任何形式的技术支持、使用担保，也不承担任何因使用本软件而产生问题的相关责任。 </p>
				<p>3、电子文本形式的授权协议如同双方书面签署的协议一样，具有完全的和等同的法律效力。您一旦开始确认本协议并安装   shuguangCMS，即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反本授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。</p>
				<p>4、如果本软件带有其它软件的整合API示范例子包，这些文件版权不属于本软件官方，并且这些文件是没经过授权发布的，请参考相关软件的使用许可合法的使用。</p>
				<p><b>协议发布时间：</b> 2008年7月1日</p>
				<p><b>版本最新更新：</b> 2010年3月20日 By sgcms.cn</p>
    
    </div>
</div>


<div>
    <div style="text-align:center; font-size:14px; color:#669900; font-weight:bold; padding-top:20px">
    <input name="readpact" type="checkbox" id="readpact" value="" />
    <label for="readpact">我已经阅读并同意此协议</label>
    </div>

<p class="foot">
<input name="Submit" type="submit" class="submit" value="继续下一步"  onclick="document.getElementById('readpact').checked ?window.location.href='install.php?step=2' : alert('您必须同意软件许可协议才能安装！');">
</p>
<?
echo $footer;
}
if($step == 2){
    echo $header;

    $folder = array('.',
    './AdminApp/Runtime/Data',
    './AdminApp/Runtime/Cache',
    './AdminApp/Runtime/Logs',
    './AdminApp/Runtime/Temp',
    './FrontApp/Runtime/Data',
    './FrontApp/Runtime/Cache',
    './FrontApp/Runtime/Logs',
    './FrontApp/Runtime/Temp',
    './Uploads',
	'./CmsData'
    );
    $write = true;
    foreach ($folder as $value){
        if(is_writable($value)){
            $checkFolder .= '<tr><td>'.$value.'</td> <td>可写</td><td>可写</td></tr>';
        }else{
            $checkFolder .= '<tr><td>'.$value.'</td> <td>可写</td><td style="color:#F00">X 不可写</td></tr>';
            $write = false;
        }
    }

    $nextBotton = $write == true ? "<input name='Submit' type='submit' class='submit' value='继续下一步'  onclick=\" window.location.href='install.php?step=3'\" >" : "<input name='Submit' type='submit' class='submit' value='目录权限检测不通过，无法继续安装，请设置相应的目录所需写权限' disabled='disabled'>" ;

?>

<div class="b">
<p class="title2">1、服务器信息检测</p>
<table cellpadding="3" cellspacing="1" >
<tr> 
	<th style="text-align:left; width:15%;font-weight:bold; font-size:14px"><strong>检测项目</strong></th>
	<th style="text-align:left; font-weight:bold; font-size:14px">参数</th>
	</tr>
<tr> 
	<td>服务器域名</td>
	<td><?php echo $uri ?></td>
	</tr>
<tr> 
  <td>服务器操作系统</td>
  <td width="30%"><?php echo $os ?></td>
</tr>
<tr>
  <td>PHP版本</td>
  <td><?php echo $phpv ?></td>
</tr>
<tr> 
  <td>文件上传</td>
  <td width="30%"><?php echo $uploadSize ?></td>
</tr>
<tr> 
	<td>最大运行时间</td>
	<td width="30%"><?php echo $maxExcuteTime ?></td>
	</tr>
<tr> 
	<td>最大内存</td>
	<td width="30%"><?php echo $maxExcuteMemory ?></td>
	</tr>

<tr> 
	<td>全局变量</td>
	<td><?php echo $phpGpc ?></td>
	</tr>
<tr> 
	<td>安全模式</td>
	<td><?php echo $safeMode ?></td>
	</tr>
<tr> 
	<td>ZEND</td>
	<td><?php echo $zend ?></td>
	</tr>
<tr> 
	<td>系统安装目录</td>
	<td><?php echo CMS_ROOT ?></td>
	</tr>
</table>
</div>
<div class="c">
<p class="title2">2、系统环境检测</p>

<table cellpadding="3" cellspacing="1">
<tr> 
	<th style="text-align:left; width:200px ;font-weight:bold; font-size:14px">检测项目</th>
	<th style="text-align:left; font-weight:bold; font-size:14px; width:200px">需要配置</th>
	<th style="text-align:left; font-weight:bold; font-size:14px; width:200px">当前服务器配置</th>
	</tr>
<tr> 
	<td>操作系统</td>
	<td>不限</td>
	<td><?php echo $os ?></td>
	</tr>
<tr> 
	<td>PHP版本</td>
	<td>&gt;=5</td>
	<td><?php echo $phpv ?></td>
	</tr>
<tr> 
	<td>MySQL</td>
	<td>支持</td>
	<td><?php echo $mysql ?></td>
	</tr>
<tr> 
  <td>allow_url_fopen</td>
  <td>支持</td>
  <td><?php echo $urlOpen ?></td>
</tr>
<tr>
  <td>file_get_content</td>
  <td>支持</td>
  <td><?php echo $fileGetContent ?></td>
</tr>
<tr> 
	<td>GD 库</td>
	<td>支持</td>
	<td><?php echo $gd ?></td>
	</tr>
<tr> 
	<td>upload</td>
	<td>支持</td>
	<td><?php echo $uploadSize ?></td>
	</tr>


<tr>
  <td>session</td>
  <td>支持</td>
  <td><?php echo $session ?></td>
</tr>

</table>

</div>


<div class="c">
<p class="title2">3、目录权限检测</p>
<table cellpadding="3" cellspacing="1" >
  <tr>
  <th style="text-align:left; width:200px ;font-weight:bold; font-size:14px">检测目录</th>
	<th style="text-align:left; font-weight:bold; font-size:14px; width:200px">需要配置</th>
	<th style="text-align:left; font-weight:bold; font-size:14px; width:200px">当前服务器配置</th>

  </tr>
  <?php echo $checkFolder ?>
<tr style="background:#F2FFE6">
  <td colspan="3" >如果使用模板编辑、模块自动安装功能则需要以下目录有读写权限，当前安装程序默认<span style="color:#F00">不检测</span>以下目录是否可读写</td>
</tr>
<tr>
  <td>./FrontApp/Tpl</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>./AdminApp/Lib/Action</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>./AdminApp/Lib/Model</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>./AdminApp/Tpl/default</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
</table>
</div>


<div>
<p class="foot">
<?php echo $nextBotton ?>
</p>
</div>

<?
echo $footer;
}elseif($step == 3){
    echo $header;
?>

<div id="successTips" style="display:none">
<div id="successTipsTitle">
<a href="<?php echo $webUrl ?>" target="_blank">访问首页</a> <a href="<?php echo $webAdminUrl ?>" target="_blank">登录后台</a>				
</div>
<div id="successTipsBody">
<br />
安装完成---------
<br />
<br />
</div>
</div>
<form name="form1" method="post" action="install.php?action=install">
<div class="b">
<p class="title2">1、数据库设置 （MySQL数据库）</p>
<li>
	数据库地址：<span class="care">(默认为 localhost)</span> <br />
    <input name="dbHost" type="text" class="input" value="localhost" id="dbHost">
</li>
<li>
	数据库端口：<span class="care">(默认为 3306)</span> <br />
    <input name="dbPort" type="text" class="input" value="3306" id="dbPort">
</li>

<li>
    数据库用户名：<br /><input name="dbUsername" type="text" class="input" id="dbUsername">
</li>
<li>
    数据库密码：<br /><input name="dbPassword" type="text" class="input" id="dbPassword">
</li>
<li>
    数据库名称：
	  <span class="care">(请确认数据库已经创建)</span><br />
      <input name="dbName" type="text" class="input" value="sgcms" id="dbName">
</li>
<li>
    数据库前缀：
  <span class="care"> (同一个数据库安装多个shuguangCMS系统，需要更换成其它名称，由英文字母、数字、下划线组成，且必须以下划线结束)</span><br />
  <input name="tablepre" type="text" class="input" id="tablepre" value="sgcorp_" readonly="readonly">
</li>
</div>
<div class="c">
<p class="title2">2、超级用户信息</p>
<li>
用 户 名：<br />
<input name="adminUsername" type="text" class="input" id="adminUsername">
</li>
<li>
登录密码：<span class="care">(不小于6位)</span><br />
<input name="adminPassword" type="text" class="input" id="adminPassword">
</li>
<li>
</li>
</div>
<div class="c">
<p class="title2">3、网站基本信息</p>
<li>
网站名称：<br />
<input name="siteName" type="text" class="input" value="shuguangCMS" id="siteName">
</li>
<li>
网　　址：<br />
<input name="siteUrl" type="text" class="input" value="<?php echo $webUrl ?>" id="siteUrl">
</li>
<li>
公司名称：<br />
<input name="companyName" type="text" class="input" id="companyName" value="曙光CMS">
</li>
<li>
邮　　箱：<br />
<input name="email" type="text" class="input" id="email" value="web@sgcms.cn">
</li>
<li>
备 案 号：<br />
<input name="icp" type="text" class="input" id="icp" value="备案号">
</li>
</div>

<div id="setupLoading" style="display:"></div>
<div id="footer">
    <p class="foot" style="text-align:left;">
    <input name="botton" type="button" class="submit" value="提交安装" id="botton" onclick="setup()"/>
    <input name="Submit2" type="reset" class="submit" value="还原重填"></span>
    </p>
</div>
</form>
<?php
echo $footer;
}elseif($step == 'setup'){


    $dbHost = trim($_POST['dbHost']);
    $dbPort = trim($_POST['dbPort']);
    $dbHost = empty($dbPort) || $dbPort == 3306 ? $dbHost : $dbHost.':'.$dbPort;
    $dbName = trim($_POST['dbName']);
    $tablepre = trim($_POST['tablepre']);
    $tablepre = empty($tablepre) ? 'sgcorp_' : $tablepre ;
    $dbUsername = trim($_POST['dbUsername']);
    $dbPassword = trim($_POST['dbPassword']);
    $adminUsername = addslashes(trim($_POST['adminUsername']));
    $adminPassword = trim($_POST['adminPassword']);
    $siteUrl = trim($_POST['siteUrl']);
    $siteName = trim($_POST['siteName']);
    $companyName = trim($_POST['companyName']);
    $email= trim($_POST['email']);
    $icp = trim($_POST['icp']);
    if($phpv < '5') {
        die("phpFalse") ;
    }
    if(strstr($tablepre, '.')) {
        die("tablepreFalse") ;
    }

    if (empty($dbHost)|| empty($dbName) || empty($dbUsername) || empty($dbPassword)) {
        die("connectMust");
    }if ($adminUsername == "" || $adminPassword == "") {
        die("adminMust");
    }elseif (strlen($adminUsername) < 4) {
        die("adminLen");
    } elseif (strlen($adminPassword) < 6) {
        die("adminPasswordLen");
    }

    $conn = @mysql_connect($dbHost, $dbUsername, $dbPassword) or die("connectFalse");

    if(!mysql_select_db($dbName)){
        if(!mysql_query("CREATE DATABASE IF NOT EXISTS `".$dbName."`;", $conn)){
            die("createDatabaseFalse");
        }
        $message = "创建数据库:{$dbName}<br />";
        mysql_select_db($dbName);

    }
    mysql_query("SET NAMES 'utf8',character_set_client=binary,sql_mode='';");
    $version = mysql_get_server_info($conn);
    if($version < 4.1) die('mysqlVersionFalse');
    $sqlFile = file_get_contents(CMS_DATA.'Install/data.sql');
    $sqlFormat = splitsql($sqlFile, $tablepre);

    /**
	执行SQL语句
	*/
    foreach($sqlFormat as $sql)
    {
        /*if(MAGIC_QUOTES_GPC) {
        $sql = stripslashes($sql);
        }*/
        $sql = trim($sql);
        if(empty($sql)) continue;

        if (strstr($sql, 'CREATE TABLE'))
        {
            preg_match('/CREATE TABLE `([^ ]*)`/', $sql, $matches);
            $ret = mysql_query($sql);
            if ($ret)
            {
                $message .= '创建数据表：'.$matches[1].'<br />';
            }
        } else {
            $ret = mysql_query($sql);
        }
        if(mysql_errno()) {
            die('执行错误:<br /><br />'.$sql.'<br /> '.mysql_error());
        }
    }


    /**
	写入管理员信息
	*/
    $adminPasswordMd5 = md5($adminPassword);
    $query = "INSERT INTO `{$tablepre}admin` (`role_id`, `username`, `password`, `realname`, `sex`, `telephone`, `mobile_telephone`, `fax`, `web_url`, `email`, `qq`, `address`, `login_count`, `create_time`, `update_time`, `last_login_time`) VALUES( 1, '$adminUsername', '$adminPasswordMd5', 'admin', '男', '05560000000', '13900000000', '05560000000', 'http://www.sgcms.cn', 'web@sgcms.cn', '5565907', '', 1, $time, $time, $time)";
    mysql_query($query);
    $message .= "<br />写入管理信息：用户名 {$adminUsername}　密码 {$adminPassword}";

    $configQuery = "INSERT INTO `{$tablepre}config` (`site_name`, `company_name`, `site_url`, `contact_name`, `telephone`, `email`, `fax`, `mobile_telephone`, `address`, `icp`, `qq`, `msn`, `im`, `web_status`, `status_description`, `header_content`, `footer_content`, `comment_verify`, `sys_log`, `sys_log_ext`, `download_suffix`, `run_system`, `global_thumb_status`, `watermark_status`, `watermark_size`, `watermark_position`, `watermark_padding`, `watermark_trans`, `global_attach_size`, `global_attach_suffix`, `news_thumb_status`, `news_thumb_size`, `product_thumb_status`, `product_thumb_size`, `download_thumb_status`, `download_thumb_size`, `global_thumb_size`, `seo_title`, `seo_keyword`, `seo_description`, `create_time`, `update_time`) VALUES
('$siteName', '$companyName', '$webUrl', 'shuguang', '15100000000', '$email', '15100000000', '15100000000', 'address a', '$icp', '5565907', 'web@sgcms.cn', 'shuguang', 0, '系统维护中.....', '', '', 1, 1, 'index,delete,modify,insert,update,login', 'Windows,Linux,Apple,其它', 'linux,windows', 1, 1, '100x100', 0, 5, 70, 2048000, 'gif,jpg,png,jpeg,swf,zip,rar,chm,7z,pdf', 1, '300,200', 1, '300,250', 1, '300,200', '300,200', 'seo_title', 'seo_keywords', 'shuguangCMS,专业企业网站建设方案', $time, $time);";

    mysql_query($configQuery);
    $message .= "<br />更新系统配置：{$tablepre}config";
	

    /**
     * 写入系统配置信息
     */
    $sampleConfig = file_get_contents(CMS_DATA.'Install/config.sample.inc.php');

    $config = str_replace(array('#dbHost#', '#dbName#', '#dbUser#', '#dbPwd#', '#dbPort#', '#dbPrefix#', '#adminAccess#', '#installTime#'), array($dbHost, $dbName, $dbUsername, $dbPassword, $dbPort, $tablepre, md5(time()), $timeFormat), $sampleConfig);
    @file_put_contents($configFile, $config);
    @touch('install.lock');
    $message .= "<br />写入配置信息：$configFile";
    mysql_close($conn);
    die($message);
}

/**
 * 拆分SQL语句
 *
 * @param  $sql
 * @param  $tablepre
 * @return unknown
 */
function splitsql($sql, $tablepre) {
    if($tablepre != "sgcorp_") $sql = str_replace("sgcorp_", $tablepre, $sql);
    $sql = str_replace("\r", "\n", $sql);
    $ret = array();
    $num = 0;
    $queriesarray = explode(";\n", trim($sql));
    unset($sql);
    foreach($queriesarray as $query)
    {
        $ret[$num] = '';
        $queries = explode("\n", trim($query));
        $queries = array_filter($queries);
        foreach($queries as $query)
        {
            $str1 = substr($query, 0, 1);
            if($str1 != '#' && $str1 != '-') $ret[$num] .= $query;
        }
        $num++;
    }
    return $ret;
}