<?php
$title      = 'Create product';
$pdo        = connectDb();
$categories = loadRows($pdo,getAll('categories'))['data'];
$producers  = loadRows($pdo,getAll('producers'))['data'];
$action = URL.'/products/process-create';
require_once './layout/widgets/header.php';
require_once './layout/products/form.php';
?>