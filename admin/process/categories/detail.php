<?php
$title = 'Update Categories';
$id = (int)$params[0];
$pdo = connectDb();
$category = find('id',$id,'categories')['data'];
$action = URL.'/categories/update/'.$id;
require_once './layout/categories/form.php';
$pdo = null;
$sql = null;
?>