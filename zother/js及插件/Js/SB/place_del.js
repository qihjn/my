var areao=new Object();
areao.load=function(n,p,c,a,t){
	this.get();
	this.show(n,p,c,a,t);
	if(t!=1){
		this.init(n,c,a,t);
	}
}
areao.init=function(n,c,a,t){
	this.showc(n,document.getElementById(n).value,t);
	for(i=0;i<document.getElementById(n+"_city").options.length;i++){
		if(document.getElementById(n+"_city").options[i].text==c){
			document.getElementById(n+"_city").options[i].selected=true;
			break;
		}
	}
	if(t==3){
		this.showa(n,document.getElementById(n+"_city").value);
		for(i=0;i<document.getElementById(n+"_area").options.length;i++){
		if(document.getElementById(n+"_area").options[i].text==a){
			document.getElementById(n+"_area").options[i].selected=true;
			break;
		}
	}
	}
}
areao.show=function(n,p,c,a,t){
	var h='';
	switch(t){
		case 1:
			h='<select name="'+n+'" id="'+n+'">';
			break;	
		case 2:
			h='<select name="'+n+'" id="'+n+'" onchange="areao.showc(\''+n+'\',this.value,2)">';
		case 3:
			h='<select name="'+n+'" id="'+n+'" onchange="areao.showc(\''+n+'\',this.value,3)">';
	}
	h+="<option value=''>请选择</option>";
	for(var k in this.p){
		if(this.p[k]==p){
			h+="<option value='"+k+"' selected>"+this.p[k]+"</option>";
		}else{
			h+="<option value='"+k+"'>"+this.p[k]+"</option>";
		}
	}
	h+='</select>';
	if(t!=1){
		h+=" "+this.city_slt(n,c,a,t);
	}
	document.write(h);
}

areao.city_slt=function(n,c,a,t){
	var h="";
	h='<select name="'+n+'_city" id="'+n+'_city">';
	if(t==3){
		h='<select name="'+n+'_city" id="'+n+'_city" onchange="areao.showa(\''+n+'\',this.value)">';
	}
	h+="<option value='' selected>请选择</option>";
	h+='</select>';
	if(t==3){
		h+=" <select name='"+n+"_area' id='"+n+"_area'>";
		h+="<option value='' selected>请选择</option>";
		h+='</select>';
	}
	return h;
}

areao.showc=function(n,value){
	document.getElementById(n+"_city").options.length=0;
	if(document.getElementById(n+"_area")){
		document.getElementById(n+"_area").options.length=1;
	}
	document.getElementById(n+"_city").options.add(new Option('请选择',''));
	for(var k in this.c){
		if(this.c[k]['parent']!=value){continue;}
		document.getElementById(n+"_city").options.add(new Option(this.c[k]['title'],k));
	}
}
areao.showa=function(n,value){
	/*document.getElementById(n+"_area").options.length=0;
	document.getElementById(n+"_area").options.add(new Option('请选择',''));
	for(var k in this.a){
		if(this.a[k]['parent']!=value){continue;}
		document.getElementById(n+"_area").options.add(new Option(this.a[k]['title'],k));
	}*/
}
areao.get=function(){
	this.p=province_node;
	this.c=city_node;
	//this.a=area_node;
}