<?php
for($i = 0; $i <26; $i++){
	$a = chr($i+97);
	echo "ALTER TABLE `t_comment_$a` ADD `f_image` VARCHAR( 200 ) NOT NULL AFTER `f_content`;<br />";
}
for($i = 0; $i <10; $i++){
	
	echo "ALTER TABLE `t_comment_$i` ADD `f_image` VARCHAR( 200 ) NOT NULL AFTER `f_content`;<br />";
}
//ALTER TABLE `t_comment_0` DROP `f_image`

?>