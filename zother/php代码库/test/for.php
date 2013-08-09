<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body onload="">
<script>document.domain = 'i.cn';</script>
<?php 
class A { 
    public $a = 1; 
    public $b = 2; 
    public $collection = array(); 

    function  __construct(){ 
        for ( $i=3; $i-->0;){ 
            array_push($this->collection, new B); 
        } 
    } 
} 

class B { 
    public $a = 1; 
    public $b = 2; 
} 

echo json_encode(new A); 
?> >
</body>
</html>



