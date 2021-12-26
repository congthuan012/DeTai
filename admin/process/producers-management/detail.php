<?php
$title = 'Update Producer';
$id = (int)$params[0];
$pdo = connectDb();
$producer = find('id',$id,'producers')['data'];
$action = URL.'/producers-management/update/'.$id;
require_once './layout/producers-management/form.php';
$pdo = null;
$sql = null;
?>