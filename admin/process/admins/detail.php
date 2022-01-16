<?php
$title = 'Update Products';
$id = (int)$params[0];
$pdo = connectDb();
$admin = find('id',$id,'admins')['data'];
if(!$admin)
redirect('admins/list',[
    'msg'=>'Admin not exist!',
    'code'=>500,
]);
$action = URL.'/admins/update/'.$id;
require_once './layout/admins/form.php';
?>