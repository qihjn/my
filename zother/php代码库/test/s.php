<?php
$s = file_get_contents('s.bin');
var_dump(unserialize($s));
?>