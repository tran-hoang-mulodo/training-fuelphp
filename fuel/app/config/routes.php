<?php
return array(
	'_root_'  => 'posts/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route

	'index(/:name)?' => array('posts/index', 'name' => 'index'),
);
