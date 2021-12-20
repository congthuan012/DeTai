<?php
$title      = 'Create product';
$pdo        = connectDb();
$categories = loadRows($pdo,getAll('categories'))['data'];
$producers  = loadRows($pdo,getAll('producers'))['data'];
$action = URL.'/products-management/process-create';
require_once './layout/widgets/header.php';
require_once './layout/products-management/form.php';
?>