<?php
$title      = 'Create Admin';
$pdo        = connectDb();
$action = URL.'/admins-management/process-create';
require_once './layout/admins-management/form.php';
?>