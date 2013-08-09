<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<iframe src="http://www.i.cn/test/for.php" id="ifr" name="ifr" ></iframe>
<script language="javascript" type="text/javascript">

window.onload = function(){
//var htmls = window.frames["ifr"].document.getElementsByTagName("HTML");
	//var html_element = htmls[0];
//alert(html_element);
	//alert(html_element.outerHTML);
				xml = {};
				frameId = "ifr";
				var io = document.getElementById(frameId);
				if(io.contentWindow){
					xml.responseText = io.contentWindow.document.body?io.contentWindow.document.body.innerHTML:null;
					xml.responseXML = io.contentWindow.document.XMLDocument?io.contentWindow.document.XMLDocument:io.contentWindow.document;	 
				}	
				else if(io.contentDocument)
				{
					xml.responseText = io.contentDocument.document.body?io.contentDocument.document.body.innerHTML:null;
					xml.responseXML = io.contentDocument.document.XMLDocument?io.contentDocument.document.XMLDocument:io.contentDocument.document;
					
				}
				else
				{
					xml.responseText = window.frames[frameId].document.body ? window.frames[frameId].document.body.innerHTML : null;
					xml.responseXML = window.frames[frameId].document.XMLDocument ? window.frames[frameId].document.XMLDocument : window.frames[frameId].document;
				}
				alert(xml.responseText);
}
</script>
</body>
</html>
