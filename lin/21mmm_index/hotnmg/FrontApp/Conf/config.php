<?php
if (!defined('SHUGUANGCMS')) die('not in shuguangCMS');
$database = require ('./db.config.php');
$config = array();
return array_merge($database, $config);