var gy={};
(function(){
	var env={};
	gy.scriptLoad =function(url,callback){		
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
