<?php
$title = 'Update Producer';
$id = (int)$params[0];
$pdo = connectDb();
$producer = find('id',$id,'producers')['data'];
$action = URL.'/producers/update/'.$id;
require_once './layout/producers/form.php';
$pdo = null;
$sql = null;
?>