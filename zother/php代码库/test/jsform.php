<?php
var_dump($_POST);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
   <div id="item">
        <input type="text" name="item1" id="item1" />
        
   </div>
   <input type="button" name="button" id="button" value="按钮" onclick="addItem();" />
   <input type="submit" name="button2" id="button2" value="提交" />
</form>

<script>
function addItem(){
	var dItem = document.getElementById("item");
	dItem.innerHTML += '<input type="text" name="item2" id="item1" />';
}
</script>
</body>
</html>



