<?php
if (!defined('SHUGUANGCMS')) die('not in shuguangCMS');
$database = require ('./db.config.php');
//后台不受模板影响
$config	= array(
        'DEFAULT_THEME' => 'default',
);
return array_merge($database, $config);