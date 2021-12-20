<?php
$title = 'Update Products';
$id = (int)$params[0];
$pdo = connectDb();
$product = find('id',$id,'products')['data'];
$categories = loadRows($pdo,getAll('categories'))['data'];
$producers  = loadRows($pdo,getAll('producers'))['data'];
$action = URL.'/products-management/update/'.$id;
require_once './layout/products-management/form.php';
?>