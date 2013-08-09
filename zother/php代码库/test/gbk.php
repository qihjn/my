<?php
//жа
$s = file_get_contents("http://app.2144.cn/girls/?m=photo&a=up&num=18");
$arr = json_decode($s);
$arr = $arr->data;
echo iconv('UTF-8', 'GB2312',$arr[0]->gametitle);

?>