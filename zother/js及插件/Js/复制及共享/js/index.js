$(function(){

//鼠标移进移出类开始
function mouse_over(idname,classname){
	$(idname).hover(
		function(){
			$(this).addClass(classname);
		},
		function(){
			$(this).removeClass(classname);
		}
	);
}
//鼠标移进移出类结束
mouse_over("#sub_id","sub_input_current");
mouse_over("#share","but_input_current");

	//弹出层开始
	function outbox(outvar,inlinevar){
		$(outvar).show().css({width:$(window).width(),height:$(document.body).height(),'opacity':'0.7'});
		$(inlinevar).show().css({"left":(($(window).width()-$(inlinevar).width())/2),"top":(($(window).height()-$(inlinevar).height())/2)});
	}
	$("#sub_id").click(function(){
								
								getCode();
		
	});
	$("#tips343_id code,#col_id").click(function(){
		$("#tips343").hide();
		$("#addbalck").hide();
	});

	//弹出层结束
	




var gy={};
(function(){
	var env={};
	gy.scriptLoad =function(url,func){
		var callback=func||function(){};
		if(env[url]){
			if(env[url]['status'] ==4){				
				callback();
			}else{
				env[url].fn.push(callback);
			}			
			return;
		}
		var script=document.createElement('script'),READY_STATE = script.readyState;
		script.setAttribute("type" ,"text/javascript");
		env[url]={fn:[],"status":1};
		env[url].fn.push(callback);
		if(READY_STATE){
			script.onreadystatechange = function () {
				var rs = script.readyState;
				if (rs === 'loaded' || rs === 'complete') {
					script.onreadystatechange = null;
					env[url].status=4;
					for(var i=0,len=env[url].fn.length;i<len;i++){
						env[url].fn.shift()();
					}
					env[url].fn=undefined;
				}
			};
		}else{
			script.addEventListener('load', function(){
				env[url].status=4;
				for(var i=0,len=env[url].fn.length;i<len;i++){
					env[url].fn.shift()();
				}
				env[url].fn=undefined;
			}, false);
		}
		script.src = url;
		document.getElementsByTagName("head")[0].appendChild(script);
	}
})();

function copyToClipBoard(idbox,idfont){
	var vfont,gamelink;
	if(idbox=='share2'){
		vfont='耶！复制成功喽！记得准时来玩库库马力哦！';
		gamelink=$("#tex").text();
	}else{
		vfont='耶！复制成功喽！你可以粘贴在QQ消息里送给你的好朋友呀！再次感谢您对本站的支持哦！';
		gamelink=" http://"+self.location.host+self.location.pathname;
		gamelink+='\n我现在在2144小游戏上玩《'+document.title+'》，真诚向你推荐，希望你也会喜欢哦!';
	}
	if(document.all){
		document.getElementById(idbox).onclick=function(){
			window.clipboardData.setData("Text",gamelink);
			alert(vfont);
		}
		
	}else{
		gy.scriptLoad('/js/ZeroClipboard.js',function(){
				new ZeroClipboard.Client();
				clip = new ZeroClipboard.Client();
				clip.setHandCursor( true );
				clip.setText(gamelink);
				clip.addEventListener('complete', function (client, text) {
					alert(vfont);
				});
				clip.glue(idbox);

		})
	}
}

copyToClipBoard('share');


getData('g');
function getData(act)
{
	var url = "i.php?act="+act+"&r="+Math.random();
	//alert(url);
	$.getJSON(url,function(data){
		//data = eval('('+data+')');
		//alert($('#ser_code').val());
		
		$('#li_id').html(data.html);
		/*if(id == 1){
			$('#votes_one').html(data.num);
		}else{
			$('#votes_two').html(data.num);
		}*/
//		alert(data.num);
	});
//	alert(url);
	/*$.getJSON(url+"?callback=?",{'act':act,'id':id},function (data)
	{
		
			alert(data.num);
		
	});*/
}

function vote(act,name,oid){
	var url = "i.php?act="+act+"&name="+name+"&r="+Math.random();
	$.getJSON(url,function(data){
		//data = eval('('+data+')');
		if(data.error){
			alert(data.msg);
		}else{
			var num = $('#'+oid).html();
			num = parseInt(num) + 1;
			$('#'+oid).html(num);
			//alert(data.code);
			$('#tex').html(data.code);
			outbox("#addbalck","#tips343");
			copyToClipBoard('share2');
			
		}
	});
}


function getCode(){
	//
	var txtQQ = $('#name').val();
	if(txtQQ){
		vote('s',txtQQ,'tex');
		return true;
	}else{
		alert('用户名不能为空输入');
		$('#name').focus();
		return false;
	}
	
}

//公告滚动开始
var _wrap=$('#li_id');//定义滚动区域
var _interval=2000;//定义滚动间隙时间
var _moving;//需要清除的动画
_wrap.hover(function(){
        clearInterval(_moving);//当鼠标在滚动区域中时，停止滚动  
},function(){
        _moving=setInterval(function(){
		     var len = _wrap.find("li").slice(0,1);//每次取前1个
			 var _w = len.height();//取得每次滚动的高度
			 len.animate({marginTop:-_w+'px'},800,function(){
			             len.css('marginTop',0).appendTo(_wrap);
			 })
		},_interval)

}).trigger('mouseleave');//函数载入时,模拟执行mouseleave,即自动滚动
//公告滚动结束

});