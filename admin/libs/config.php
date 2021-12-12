<?php
session_start();
define('HOST','localhost');
define('PORT','3306');
define('DBNAME','DeTai');
define('USERNAME','root');
define('PASSWORD','123456');
define('OPTION',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);