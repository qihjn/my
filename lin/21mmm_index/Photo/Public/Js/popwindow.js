/**
* 弹出窗口
*=======================
* 使用方法
	var objPos = mousePosition(ev);
	messContent = document.getElementById("a").innerHTML;
    showMessageBox('窗口标题', messContent, objPos, 250);
*/
var isIe = (document.all) ? true: false;
//设置select的可见状态 
function setSelectState(state) {
    var objl = document.getElementsByTagName('select');
    for (var i = 0; i < objl.length; i++) {
        objl[i].style.visibility = state;
    }
}

//得到鼠标当前位置
function mousePosition(ev) {
    if (ev.pageX || ev.pageY) {
        return {
            x: ev.pageX,
            y: ev.pageY
        };
    }
	
	var scoTop =  document.body.scrollTop ? document.body.scrollTop : document.documentElement.scrollTop; 
	var scoLeft =  document.body.scrollLeft ? document.body.scrollLeft : document.documentElement.scrollLeft; 
    return {
        x: ev.clientX + scoLeft - document.body.clientLeft,
        y: ev.clientY + scoTop - document.body.clientTop
    };
}
//弹出方法 
function showMessageBox(wTitle, content, pos, wWidth) {
    closeWindow();
    var bWidth = parseInt(document.documentElement.scrollWidth);
    var bHeight = parseInt(document.documentElement.scrollHeight);
    if (isIe) {
        setSelectState('hidden');
    }
    var back = document.createElement("div");
    back.id = "back";
    var styleStr = "top:0px;left:0px;position:absolute;background:#666;width:" + bWidth + "px;height:" + bHeight + "px;";
    styleStr += (isIe) ? "filter:alpha(opacity=40);": "opacity:0.40;";
    back.style.cssText = styleStr;
    //document.body.appendChild(back);
    var mesW = document.createElement("div");
    mesW.id = "mesWindow";
    mesW.className = "mesWindow";
    mesW.innerHTML = "<div class='mesWindowTop'><table width='100%' height='100%'><tr><td>" + wTitle + "</td><td style='width:1px;'><input type='button' onclick='closeWindow();' title='关闭窗口' class='close' value='关闭' /></td></tr></table></div><div class='mesWindowContent' id='mesWindowContent'>" + content + "</div><div class='mesWindowBottom'></div>";
    styleStr = "left:" + (((pos.x - wWidth) > 0) ? (pos.x - wWidth) : pos.x) + "px;top:" + (pos.y) + "px;position:absolute;width:" + wWidth + "px;";
    mesW.style.cssText = styleStr;
    document.body.appendChild(mesW);
}
function showBackground(obj, endInt) {
    obj.filters.alpha.opacity += 1;
    if (obj.filters.alpha.opacity < endInt) {
        setTimeout(function() {
            showBackground(obj, endInt)
        },
        8);
    }
}
//关闭窗口 
function closeWindow() {
    if (document.getElementById('back') != null) {
        document.getElementById('back').parentNode.removeChild(document.getElementById('back'));
    }
    if (document.getElementById('mesWindow') != null) {
        document.getElementById('mesWindow').parentNode.removeChild(document.getElementById('mesWindow'));
    }
    if (isIe) {
        setSelectState('');
    }
}