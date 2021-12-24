<?php
$title      = 'Create Guest';
$pdo        = connectDb();
$action = URL.'/guests-management/process-create';
require_once './layout/guests-management/form.php';
?>