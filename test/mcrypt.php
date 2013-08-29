<?php  
$str = "我的名字是？一般人我不告诉他！";   //加密内容  
$key = "key:111";   //密钥  
$cipher = MCRYPT_DES;  //密码类型  
$modes = MCRYPT_MODE_ECB;  //密码模式 
$iv = mcrypt_create_iv(mcrypt_get_iv_size($cipher,$modes),MCRYPT_RAND);//初始化向量  
echo "加密明文：".$str."<br />";  
$str_encrypt = mcrypt_encrypt($cipher,$key,$str,$modes,$iv);  //加密函数
 echo "加密密文：".$str_encrypt."<br />";
$str_decrypt = mcrypt_decrypt($cipher,$key,$str_encrypt,$modes,$iv);  //解密函数 
echo "还原：".$str_decrypt; 