<?php
$title      = 'Create Guest';
$pdo        = connectDb();
$action = URL.'/guests/process-create';
require_once './layout/guests/form.php';
?>