<?php
$mem = new Memcache;
$mem->connect("10.10.16.11", 11552);
$mem->set("key", 'This is a test!', 0, 60);
$val = $mem->get('key');
echo $val;
?>