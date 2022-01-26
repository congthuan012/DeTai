<?php
$title      = 'Create product';
$categories = getAll('categories')['data'];
$producers  = getAll('producers')['data'];
$action = URL.'/products/process-create';
require_once './layout/widgets/header.php';
require_once './layout/products/form.php';
?>