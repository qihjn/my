<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>中华美容网通行证</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/Skin/User/register.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/Js/ajax.js" language=javascript></script>
<script src="__PUBLIC__/Js/common.js" language=javascript></script>
<script src="__PUBLIC__/Js/reg.js" language=javascript></script>
<style>


</style>
</head>
<script language="javascript">
	
	window.onload=function(){
		clearCode();
		
		var fo=document.getElementById("regform");
		ol=fo.getElementsByTagName("input");
		for(i=0;i<ol.length;i++){
			if(ol[i].type=='text'||ol[i].type=='password'){
				ol[i].onfocus=function(){
					this.style.background='#ff0';
				}
				ol[i].onblur=function(){
					this.style.background='#fff';
					if(!chk(this)){return;};
					if(this.id=='passagain'){
						if(this.value!=fo.password.value||this.value==''){
							document.getElementById('passagain_show').parentNode.className="explain_red";
							document.getElementById('passagain_show').innerHTML="两次密码输入不一致";
						}else{
							document.getElementById('passagain_show').parentNode.className="explain_green";
							document.getElementById('passagain_show').innerHTML="验证通过";
						}
					}
					if(this.id=='username'){
						var x=new Ajax();
						x.setRecvType("HTML");
						URL="chkUser?username="+this.value;
						x.get(URL,function(s){
							if(s.indexOf("|")==-1){
								document.getElementById('username_show').parentNode.className="explain_red";
								document.getElementById('username_show').innerHTML=s;
							}else{
								document.getElementById('username_show').parentNode.className="explain_green";
								document.getElementById('username_show').innerHTML=s.split("|")[0];
							}
						});
					}
				}
			}
		}
		
		function chk(o){
			var expo=o.getAttribute("exp");
			if(expo){
				exp=expo.split("|")[0];
				msg=expo.split("|")[1];
				var ex=new RegExp(exp,"i");
				var rex=ex.exec(o.value);
				if(rex){
					rex=rex[0];
				}
				if(!rex||rex.toString().length!=o.value.length){
					document.getElementById(o.id.toString()+"_show").parentNode.className="explain_red";
					document.getElementById(o.id.toString()+"_show").innerHTML=msg;
					return false;
				}else{
					document.getElementById(o.id.toString()+"_show").parentNode.className="explain_green";
					document.getElementById(o.id.toString()+"_show").innerHTML="验证通过";
				}
			}
			return true;
		}
		
		fo.onsubmit=function(){
			ol=this.getElementsByTagName("input");
			for(i=0;i<ol.length;i++){
				if(!chk(ol[i])){return false;};
				if(ol[i].id=='passagain'){
					if(ol[i].value!=this.password.value||ol[i].value==''){
						document.getElementById('passagain_show').parentNode.className="explain_red";
						document.getElementById('passagain_show').innerHTML="两次密码输入不一致";
					}else{
						document.getElementById('passagain_show').parentNode.className="explain_green";
						document.getElementById('passagain_show').innerHTML="验证通过";
					}
				}
			}
			
		}
		
		var uo=document.getElementsByName("u_type");
		for(i=0;i<uo.length;i++){
			uo[i].onclick=function(){
				if(this.value=='person'){
					document.getElementById("other_t").style.display='';
				}else{
					document.getElementById("other_t").style.display='none';
				}
			}
		}
	}
	
	function clearCode(){
		document.getElementById("checkcode").value = '';
		
	}
	
	
</script>
<body >
<!--一级导航开始-->
<div id="nav"></div>
<div class="tit">
  <div align="left">填写注册信息-<a href="http://www.21mmm.com/" target="_parent">网站首页</a>-<a href="http://job.21mmm.com/" target="_self">招聘主页</a>-<a href="http://school.21mmm.com/" target="_self">培训主页</a>-<a href="http://user.21mmm.com/login.php" target="_self"><span class="STYLE2">返回登陆窗口</span></a>-<a href="http://www.21mmm.com/help/most/27.html" target="_blank"><span style="color:#f00;">注册帮助</span></a></div>
</div>
 <table cellspacing="0" class="myinfo">
 	
 </table>
<form action="__URL__/chkRegister" method="post" style='margin:0px;padding:0px;' id=regform name=regform>
<table cellspacing="0"  class="myinfo" style='width:700px;' >
	<tr>
    <td class="title"><span style="color:#f00;">账户类型：</span> </td>
    <td colspan="2" >&nbsp;&nbsp;&nbsp;个人用户
	    <input type="radio" name="utype" id="radio" value="person" /></td>
  </tr>
  <tr>
    <td class="title">用  户 名：</td>
    <td>&nbsp;&nbsp;&nbsp;<input id="username" name="username" size="20" type="text" class="myinfo_tx" value="" exp="[a-z_0-9]{3,13}[a-z0-9]{1}|错误，要求4—20个字母或数字"  tabindex=2 /></td>
    <td id="passport2"  valign="top"><div class="explain_blue" align='left'><span class="gray" id="username_show">
	4-20 个字符 ,不能为中文，请不要有空格</span></div></td>
  </tr>
  <tr>
    <td class="title">输入密码：</td>
    <td>&nbsp;&nbsp;&nbsp;<input id="password" name="password" size="20" type="password" class="myinfo_tx" value="" exp="[\w\W]{6,20}|密码不符合要求，6-20个字符" tabindex=3 /></td>
    <td id="passport3" valign="center"><div class="explain_blue" align='left'><span class="gray" id="password_show">
	6-20 个字符。</span></div></td>
  </tr>
  <tr>
    <td class="title">重复密码：</td>
    <td>&nbsp;&nbsp;&nbsp;<input id="passagain" name="passagain" size="20" type="password" class="myinfo_tx" value=""  tabindex=4 /></td>
    <td class="gray" id="passport4" valign="center"><div class="explain_blue" align='left'><span class="gray" id="passagain_show">重复输入一次上面的密码。</span></div></td>
  </tr>
  <tr>
    <td class="title">电子邮件：</td>
    <td>&nbsp;&nbsp;&nbsp;<input id="email" name="email" type="text" class="myinfo_tx" value="" exp1="\w+([-+.]\w+)*@\w+([-.]\w+)*.\w+([-.]\w+)*|邮件格式不对" tabindex=5 /></td>
    <td class="gray" id="passport5" valign="center"><div class="explain_blue" align='left'><span class="gray" id="email_show">(可选)请正确填写您的常用电子邮件地址,作为密码取回之用；且网站的各种信息、资料将发到该邮箱。</span></div></td>
  </tr>
 <tbody id="other_t">
<!--	  <tr>
	    <td class="title">性&nbsp;&nbsp;&nbsp;&nbsp;别：</td>
	    <td align="left" colspan="2" >
		&nbsp;&nbsp;&nbsp;
			<input name="gender" type="radio" tabindex=7 value="1" checked  />
			男&nbsp;
			<input name="gender" type="radio" checked value="2"  />
			女	</td>
	  </tr>
	  <tr>
	    <td class="title">出生日期：</td>
	    <td  align="left" colspan="2" >
		&nbsp;&nbsp;&nbsp;<input type='text' readonly name="birthday" class="myinfo_tx" style='cursor:pointer;' onclick="calendar.showdatelist(this)" /></td>
	  </tr>
	  <tr>
	    <td class="title">所在城市：</td>
	    <td align="left" colspan=2>
			&nbsp;&nbsp;&nbsp;<script>areao.load('place','','','',2);</script>
		</td>
	  </tr>-->
	</tbody>

  <tr>
    <td class="title">验  证  码：</td>
    <td align="left">&nbsp;&nbsp;&nbsp;<input name="checkcode" type="text" class="myinfo_tx" tabindex=13 id="checkcode" />			</td>
    <td class="gray" align="left">&nbsp;<img src="__URL__/verify/" width="50" height="25" onclick="javascript:this.src=this.src+'?'+Math.random();" style='cursor:pointer;' id='img10'><span class="gray">验证码看不清？请点击<a href="javascript:;"><u>图片刷新</u></a>。验证码为字母,不区分大小写.</span></td>
  </tr>
  <tr>
  	<td colspan="3" class="login">
		<input name="s1" type="submit" value="立即注册" tabindex=14 />	</td>
  </tr>
</table>
</form>
<div class="confer">
	<p><b>请先阅读并接受“服务协议”</b>
		<input name="check" id="check" type="checkbox" value="1" checked />已仔细阅读并同意“服务协议”
	</p>	
	<textarea name="" cols="70" rows="5" readonly>
中华美容网（21mmm.com）服务使用协议
所提供的各项服务的所有权和经营权归上海倍佳网络科技有限公司与 [中华美容网] 
1、服务条款的确认和接纳
用户接受本协议点击"同意"按钮完成注册，这表示用户与中华美容网达成协议并接受所有的服务条款。
2、服务简介
中华美容网运用自己的操作系统通过国际互联网络为用户提供各项网络信息平台。用户必须：
（1）提供设备，包括个人电脑一台、调制解调器一个及配备上网装置。
（2）个人上网和支付与此服务有关的电话费用。
考虑到中华美容网产品服务的重要性，用户同意：
（1）提供及时、详尽及准确的个人资料。
（2）不断更新注册资料，符合及时、详尽准确的要求。所有原始键入的资料将引用为注册资料。
（3）中华美容网保留随时变更、中断或终止部分或全部网络服务的权利。
因互联网不可控因素.用户在本站所发布的资料.不一定完全真实.中华美容网会及时删除经核实后用户发布的虚假信息.
请用户注意规避风险,中华美容网对此概不负任何责任.[中华美容网]对于网络用户之间（不管它是否在中国境内）所造成的任何纠纷，概不负责。并配合以下规则:
（1）用户要求中华美容网或授权某人通过电子邮件服务或其他方式透露这些信息。
（2）配合相应的法律、法规要求及程序服务需要中华美容网提供用户的个人资料。
如果用户提供的资料不准确，不真实，不合法有效，中华美容网保留结束用户使用中华美容网各项服务的权利。
用户在享用中华美容网各项服务的同时，同意接受中华美容网提供的各类信息服务。
3、使用规则
（1） 用户在申请使用中华美容网提供的网络服务时，必须向中华美容网提供准确的个人资料，如个人资料有任何变动，必须及时更新。
（2）用户注册成功后，中华美容网将给予每个用户一个用户帐号及相应的密码，该用户帐号和密码由用户负责保管；用户应当对以其用户帐号进行的所有活动和事件负法律责任。
（3） 用户在使用中华美容网络服务过程中，必须遵循以下原则：
(a) 遵守中国有关的法律和法规；
(b) 不得为任何非法目的而使用网络服务系统；
(c) 遵守所有与网络服务有关的网络协议、规定和程序；
(d) 不得利用中华美容网络服务系统进行任何可能对互联网的正常运转造成不利影响的行为；
(e) 不得利用中华美容网络服务系统传输任何骚扰性的、中伤他人的、辱骂性的、恐吓性的、庸俗淫秽的或其他任何非法的信息资料；
(f) 不得利用中华美容网络服务系统进行任何不利于中华美容网的行为；
4、服务条款的修改
中华美容网会在必要时修改服务条款，并拥有解释权
用户要继续使用中华美容网各项服务需要两方面的确认：
（1）首先确认中华美容网服务条款及其变动。
（2）同意接受所有的服务条款限制。
5、服务修订
中华美容网保留随时修改或中断服务而不需通知用户的权利。用户接受中华美容网行使修改或中断服务的权利，中华美容网不需对用户或第三方负责
6、用户的帐号、密码和安全性
您一旦注册成功成为用户，您将得到一个密码和帐号。如果您未保管好自己的帐号和密码而对您、中华美容网或第三方造成的损害，您将负全部责任。另外，每个用户都要对其帐户中的所有活动和事件负全责。您可随时改变您的密码和图标，也可以结束旧的帐户重开一个新帐户。用户同意若发现任何非法使用用户帐号或安全漏洞的情况，立即通告中华美容网。
7、拒绝提供担保
用户明确同意邮件服务的使用由用户个人承担风险。服务提供是建立在免费的基础上。中华美容网明确表示不提供任何类型的担保，不论是明确的或隐含的，但是对商业性的隐含担保，特定目的和不违反规定的适当担保除外。中华美容网不担保服务一定能满足用户的要求，也不担保服务不会受中断，对服务的及时性、安全性、出错发生都不作担保。中华美容网拒绝提供任何担保，包括信息能否准确、及时、顺利地传送。用户理解并接受下载或通过中华美容网产品服务取得的任何信息资料取决于用户自己，并由其承担系统受损或资料丢失的所有风险和责任。中华美容网对在服务网上得到的任何商品购物服务或交易进程，都不作担保。用户不会从中华美容网收到口头或书面的意见或信息，中华美容网也不会在这里作明确担保。
8、有限责任
中华美容网对直接、间接、偶然、特殊及继起的损害不负责任，这些损害来自：不正当使用产品服务，在网上购买商品或类似服务，在网上进行交易，非法使用服务或用户传送的信息有所变动。这些损害会导致中华美容网形象受损，所以中华美容网早已提出这种损害的可能性。
9、未经中华美容网同意禁止进行商业性行为
用户承诺不经中华美容网书面同意，不能利用中华美容网各项服务在中华美容网或相关网站上进行销售或其他商业性行为。用户违反此约定，中华美容网将依法追究其违约责任，由此给中华美容网造成损失的，中华美容网有权进行追偿。
10、中华美容网虚拟社区信息的储存及限制
中华美容网不对用户所发布信息的删除或储存失败负责。中华美容网保留判定用户的行为是否符合中华美容网虚拟社区服务条款的要求和精神的权利，如果用户违背了服务条款的规定，则中断其虚拟社区服务的帐号。
11、保障
用户同意保障和维护中华美容网全体成员的利益，负责支付由用户使用超出服务范围引起的律师费用，违反服务条款的损害补偿费用，其它人使用用户的电脑、帐号和其它知识产权的追索费。
12、知识产权
用户保证和声明对其所提供的作品拥有完整的合法的著作权，保证中华美容网使用该作品不违反国家的法律法规，也不侵犯第三方的合法权益或承担任何义务。用户应对其所提供作品因形式、内容及授权的不完善、不合法所造成的一切后果承担完全责任。
用户同意中华美容网对其上传作品在全世界范围内享有免费的、永久性的、不可撤消的、独家的和完全的许可使用和再许可的权利。此许可和再许可权利包括但不限于此作品的著作权、邻接权及获得利益等权利。
中华美容网保留对其网站所有内容进行实时监控的权利，并有权依其自主判断对任何违反本协议约定的作品实施删除。中华美容网对于删除用户作品引起的任何后果或导致用户的任何损失不负任何责任。
因用户作品的违法或侵害第三人的合法权益而导致中华美容网或其关联公司对第三方承担任何性质的赔偿、补偿或罚款而遭受损失（直接的、间接的、偶然的、惩罚性的和继发的损失），用户对于中华美容网或其关联公司蒙受的上述损失承担全面的赔偿责任。
13、言论
用户承诺发表言论要：爱国、守法、自律、真实、文明。不传输任何非法的、骚扰性的、中伤他人的、辱骂性的、恐吓性的、伤害性的、庸俗的，淫秽的、危害国家安全的、泄露国家机密的、破坏国家宗教政策和民族团结的以及其它违反法律法规及政策的内容。
若用户的行为不符合以上提到的服务条款，中华美容网将作出独立判断立即取消用户服务帐号。用户需对自己在网上的行为承担法律责任。
14、内容的所有权
内容的定义包括：文字、软件、声音、相片、录象、图表；在广告中的全部内容；电子邮件的全部内容；中华美容网务为用户提供的商业信息。所有这些内容均受版权、商标、标签和其它财产所有权法律的保护。所以，用户只能在中华美容网和广告商授权下才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。
15、免责与赔偿声明
（1） 用户明确同意其使用中华美容网网络服务所存在的风险将完全由其自己承担；因其使用中华美容网服务而产生的一切后果也由其自己承担，中华美容网对用户不承担任何责任。
（2）中华美容网不担保网络服务一定能满足用户的要求，也不担保网络服务不会中断，对网络服务的及时性、安全性、准确性也都不作担保。
（3）为了提供更完善的服务，我们将定时以电邮或短信发送电子邮件、电子贺卡、资讯或电子杂志及其他产品或服务给注册用户，若您接受项服务款，即表示您同意收到我们的电子邮件、电子贺卡、资讯或电子杂志
16、法律
（1）所有用户须承诺保障和维护[中华美容网]全体成员的利益；承诺对[中华美容网]网站及其领导层、雇员和代理商免受索赔和诉讼；承诺赔偿由于其违反本协议及/或使用本网站而造成的对上述人员的损害。[中华美容网]将尽快对上述索赔、诉讼知照或传唤相关人士。
（2）在任何情况下，[中华美容网]及其领导人、主管、雇员和代理商拒绝对由于用户使用本网站及其内容或不能使用本网站而造成的一切损失提供任何担保。
（3）如用户在确认本协议条款后.用户对[中华美容网]提出的索赔金额以该用户对本网站缴交的最高款项为限。
（4）用户和中华美容网一致同意有关本协议以及使用中华美容网的服务产生的争议交由仲裁解决，但是中华美容网有权选择采取诉讼方式，并有权选择受理该诉讼的有管辖权的法院。若有任何服务条款与法律相抵触，那这些条款将按尽可能接近的方法重新解析，而其它条款则保持对用户产生法律效力和影响。
17、中华美容通行证所含服务的信息储存及安全
中华美容网对中华美容通行证上所有服务将尽力维护其安全性及方便性，但对服务中出现信息删除或储存失败不承担任何负责。另外我们保留判定用户的行为是否符合中华美容网服务条款的要求的权利，如果用户违背了通行证服务条款的规定，将会中断其通行证服务的帐号。
18、青少年用户特别提示
青少年用户必须遵守全国青少年网络文明公约：
要善于网上学习，不浏览不良信息；
要诚实友好交流，不侮辱欺诈他人；
要增强自护意识，不随意约会网友；
要维护网络安全，不破坏网络秩序；
要有益身心健康，不沉溺虚拟时空。
19、帐号的冻结
如果一个中华美容通行证帐号超过360天不曾用web登录，中华美容网名留清空数据减轻服务器运行压力的权利
20、其他
1、中华美容网将视向用户所提供服务内容之特性，要求用户在注册中华美容网提供的有关服务时，遵守特定的条件和条款；如该等条件和条款与以上服务条款有任何不一致之处，则已该等条件和条款为准。
2、本协议中的任何条款无论因何种原因完全或部分无效或不具有执行力，本协议的其余条款仍应有效并且有约束力。
3、本服务协议执行过程中所产生的任何问题本网站和用户都将友好协商解决。
　由于非故意及不可抗拒的原因（含系统维护和升级），导致的用户数据损失、服务停止，本网站不必承担赔偿及其他连带的法律责任。
	</textarea>
</div>
<div class="cut1">
	<div id="footer">
	<p class="emailtx"><span class="text"><a href="http://www.21mmm.com/help/most/28.html" target="_blank">关于我们</a> - <a href="http://www.21mmm.com/help/most/31.html" target="_blank">网站地图</a> - <a href="http://www.21mmm.com/help/most/29.html" target="_blank">法律声明</a> - <a href="http://www.21mmm.com/help/most/38.html" target="_blank" class="STYLE1">升级会员</a>- <a href="http://www.21mmm.com/help/most/37.html" target="_blank">付款方式</a>- <a href="http://www.21mmm.com/help/most/27.html" target="_blank">联系我们</a></span></p>
	<p class="address"><span class="foot">Copyright 2004-2009 21mmm.com. All Rights Reserve 沪ICP备06003754</span></p>
</div>
</div>
</body>
</html>