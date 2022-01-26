<?php
session_start();
ob_start();
define('HOST', 'localhost');
define('PORT', '3306');
define('DBNAME', 'DeTai');
define('USERNAME', 'root');
define('PASSWORD', '');
define('OPTION', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
define('URL', 'http://' . $_SERVER['SERVER_NAME'] . '/admin');
define('ORDER_STATUS', [
	'Deny' 		=> ['danger','<i class="fas fa-times"></i>'],
	'Pending' 	=> ['general','<i class="fas fa-spinner"></i>'],
	'Approve' 	=> ['primary','<i class="fas fa-thumbs-up"></i>'],
	'Shipping' 	=> ['secondary','<i class="fas fa-shipping-fast"></i>'],
	'Receiving' => ['info','<i class="fas fa-archive"></i>'],
	'Complete' 	=> ['success','<i class="fas fa-check"></i>'],
]);

define('GUEST_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/guest');
define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/');