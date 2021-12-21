<?php
$title = 'Update Categories';
$id = (int)$params[0];
$pdo = connectDb();
$category = find('id',$id,'categories')['data'];
$action = URL.'/categories-management/update/'.$id;
require_once './layout/categories-management/form.php';
$pdo = null;
$sql = null;
?>