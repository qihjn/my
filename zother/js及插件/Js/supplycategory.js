// JavaScript Document
level = function(data){
	this.data = data;
	this.sltFirst = ""; //一级
	this.sltChild = "";//二级
}


/*********************************复杂json 格式见后面**************************/
//创建select
level.prototype.createSelect = function(parent,name,panel){
	//this.removeOption(this.sltChild);
	slt = document.createElement("select");
	slt.setAttribute("id",name);
	slt.setAttribute("name",name);
	slt.options.length=0;
	for(var k in this.data){
		if(this.data[k].parentid == parent){
			slt.options.add(new Option(this.data[k].title,this.data[k].id));	
		}
	}
	panel.appendChild(slt);
}

//创建二级checkbox组
level.prototype.createCheckbox = function(parent,name,panel){
	panel.innerHTML='';
	for(var k in this.data){
		if(this.data[k].parentid == parent){
			//alert(this.data[k].id);
			chk=document.createElement("input");
			chk.type="checkbox";
			chk.name= name + "[]";
			chk.id= name + k;
			chk.value = this.data[k]['id'];
			
			sp=document.createElement("span");
			sp.innerHTML = this.data[k]['title'] + " ";
			
			panel.appendChild(chk);
			panel.appendChild(sp);
		}
	}

}

//删除option
level.prototype.removeOption = function(slt){
	for(var i = 0; i < slt.options.length; i++){
		slt.options.remove(i);
	}
}

//选中select
level.prototype.selectOption = function(name,v){
	var slt = document.getElementById(name);
	for(var i = 0; i<slt.options.length; i++){
		if(slt.options[i].value == v){
			slt.options[i].selected = true;
		}
	}
}

//选中checkbox
level.prototype.selectCheckbox = function(panel,v){
	var arr = v.split(',');
	var checkboxs = panel.getElementsByTagName("input");
	for(var i = 0; i < arr.length; i++){
		for(var j = 0; j < checkboxs.length; j++){
			if(checkboxs[j].value == arr[i]){
				checkboxs[j].checked = true;
				break;
			}
		}
	}
}



