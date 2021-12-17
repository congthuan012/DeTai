<?php
$title      = 'Create product';
$pdo        = connectDb();
$categories = loadRows($pdo,getAll('categories'));
$producers  = loadRows($pdo,getAll('producers'));
$action = URL.'/products-management/process-create';
require_once './layout/widgets/header.php';
require_once 'form.php';
?>