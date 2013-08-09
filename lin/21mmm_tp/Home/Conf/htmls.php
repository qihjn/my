<?php 
return array( 
			'*'=>array('{:module}/{:action}/{$_SERVER.REQUEST_URI|md5}'),
			'show'=>array('{:module}/{:action}/{id}',86400), 
); 
?> 