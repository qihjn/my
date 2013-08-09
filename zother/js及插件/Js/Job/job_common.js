function contact(url,id){
	if(!id) id = 'contact';
	$.get(url, function(data){
	  //eval('info = '+data+';');
	  $('#'+id).html(data);
	});
}

//申请职位
function apply(id,type){
	if(!type){
		ajaxGet('/job/apply/jid/',id);
	}else{
		ajaxGet('/job/apply/jid/',id);
	}
	//window.history.go(0);
}

//收藏职位
function fav(id) {
	ajaxGet(APP+'/fav/jid/',id);
}

//收藏简历
function favResume(id){
	ajaxGet('/resume/fav/id/',id);
}

//申请简历
function applyResume(id){
	//判断是否是登录了企业用户，可读取cookie或ajax
	var url = "/job/ajaxGetJobs";
	if(!id){
		id = getJoinValue(); //获取选中的id
	}
	if(!id){
		alert('请选择简历');
		return;
	}
	$.get(url, function(data){
		d = applyHand(data,id);
		//alert(d);
	});

	
	//ajaxGet(APP+'/apply/insert/jid/',id);
}



function applyHand(data,id){
if(data){
	//alert(data);
	data = eval("("+data+")");
	if(typeof(data) != "object"){
		alert("没有登录或没有发布职位");
		return;
	}
	
	var template = G('tplJob').value;
	var x = easyTemplate(template,{caption:"请选择职位",list:data});
	//G('job').innerHTML = x;
	
	//==========弹出star========
	jQuery.prompt.setDefaults({
	//prefix: 'myPrompt',
	show: 'slideDown'
	});
	var statesdemo = {
		state0: {
			html:x,
			buttons: { "确定":2, "填写留言": 1,"取消": false },
			focus: 1,
			submit:function(v,m,f){ 
				//alert('v:'+v+'---'+'m:'+m+'---'+'f:'+f+'---');
				if(!v) return true;
				else{
					check = $("#jobs :radio:checked").val()
					if(!check){
						alert('必须选择一个职位');
						return false;
					}
					if(v == 1){
						$.prompt.goToState('state1');
					}else if(v == 2){
						//ajax提交
						$.prompt.close();
						var d = {"jid":check,"pid":id};
						applyPost(d);
					}
				}
				return false; 
			}
		},
		state1: {
			html:'留言内容：<textarea id="msg"></textarea>',
			buttons: { "确定":2,"返回": -1, "取消": 0 },
			focus: 1,
			submit:function(v,m,f){ 
				if(v==0) {
					//alert($('#id_1').val());
					//alert($('#msg').val());
					$.prompt.close();
				}
				else if(v==-1)
				$.prompt.goToState('state0');
				else if(v == 2){
					$.prompt.close();
						var d = {"jid":check,"pid":id,"content":$('#msg').val(),"facetime":""};
						applyPost(d);
				}
				return false;
			}
		}
	};
	$.prompt(statesdemo);
	//==========弹出end========
	
}
		
	
}

function applyPost(data){
	url = "/resume/apply";//alert(data.facetime);
	$.post(url,data,function(data){
		ajaxReturn(data);
	})
}

function ajaxReturn(data){
	d = eval('('+data+')');
	if(typeof(d)== 'object'){
	  alert(d.info);
	}else{
	  alert(data); 
	}
}
