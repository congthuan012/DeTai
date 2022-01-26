<?php
$title = 'Update Products';
$id = (int)$params[0];
$product = find('id',$id,'products')['data'];
$categories = getAll('categories')['data'];
$producers  = getAll('producers')['data'];
$action = URL.'/products/update/'.$id;
require_once './layout/products/form.php';
?>