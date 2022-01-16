<?php
$title      = 'Create Admin';
$pdo        = connectDb();
$action = URL.'/admins/process-create';
require_once './layout/admins/form.php';
?>