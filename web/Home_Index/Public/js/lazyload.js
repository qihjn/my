var imagesrcname='a',thissrolltop=500,imageurlarray=new Array();imageurlarray[0]='http://img.21mmm.cn/';imageurlarray[1]='http://i1.21mmm.cn/';imageurlarray[2]='http://i2.21mmm.cn/';imageurlarray[3]='http://i3.21mmm.cn/';imageurlarray[4]='http://i4.21mmm.cn/';
lazyLoad=(function() {
	var map_element    = {}; 
	var element_obj    = []; 
	var download_count = 0; 
	var last_offset    = -1; 
	var doc_body; 
	var doc_element; 
	var lazy_load_tag; 
	function initVar(tags) { 
		doc_body      = document.body; 
		doc_element   = document.compatMode == 'BackCompat' ? doc_body: document.documentElement; 
		lazy_load_tag = tags || ["img", "iframe"]; 
	}; 
	function initElementMap() { 
		for (var i = 0, len = lazy_load_tag.length; i < len; i++) { 
			var el = document.getElementsByTagName(lazy_load_tag[i]); 
			for (var j = 0, len2 = el.length; j < len2; j++) { 
				if (typeof(el[j]) == "object" && el[j].getAttribute(imagesrcname)) { 
					element_obj.push(el[j]); 
				} 
			} 
		} 
		for (var i = 0, len = element_obj.length; i < len; i++) { 
			var o_img = element_obj[i]; 
			var t_index = getAbsoluteTop(o_img);
			if (map_element[t_index]) { 
				map_element[t_index].push(i); 
			} else { 
				var t_array = []; 
				t_array[0] = i; 
				map_element[t_index] = t_array; 
				download_count++;
			} 
		} 
	}; 
	function initDownloadListen() {  
		if (!download_count) return; 
		var getscrolltop = document.body.scrollTop;
		if(getscrolltop == 0)
		{
			getscrolltop = document.documentElement.scrollTop;
		}
		var offset = (window.MessageEvent && !document.getBoxObjectFor) ? getscrolltop: getscrolltop; 
		var visio_offset = offset + doc_element.clientHeight; 
		if (last_offset == visio_offset) { 
			setTimeout(initDownloadListen, 200); 
			return; 
		} 
		last_offset = visio_offset; 
		var visio_height = doc_element.clientHeight + thissrolltop; 
		var img_show_height = visio_height + offset; 
		var allurlnum = parseInt(imageurlarray.length);
		if(allurlnum <= 0)
		{
			allurlnum = 1;
		}
		var j = 0;
		for (var key in map_element) { 
			if (img_show_height > key) { 
				var t_o = map_element[key]; 
				var img_vl = t_o.length; 
				for (var l = 0; l < img_vl; l++) { 
					var u_j = j % allurlnum;
					var thisurl = imageurlarray[u_j];
					element_obj[t_o[l]].src = thisurl + element_obj[t_o[l]].getAttribute(imagesrcname); 
					j++; 
				} 
				delete map_element[key]; 
				download_count--; 
			}
		} 
		setTimeout(initDownloadListen, 200); 
	}; 
	function getAbsoluteTop(element) { 
		if (arguments.length != 1 || element == null) { 
			return null; 
		} 
		var offsetTop = element.offsetTop; 
		while (element = element.offsetParent) { 
			offsetTop += element.offsetTop; 
		} 
		return offsetTop; 
	} 
	function init(tags) { 
		initVar(tags); 
		initElementMap(); 
		initDownloadListen(); 
	}; 
	return { 
		init: init 
	} 
})();
lazyLoad.init();