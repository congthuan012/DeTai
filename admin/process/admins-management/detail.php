<?php
$title = 'Update Products';
$id = (int)$params[0];
$pdo = connectDb();
$admin = find('id',$id,'admins')['data'];
if(!$admin)
redirect('admins-management/list',[
    'msg'=>'Admin not exist!',
    'code'=>500,
]);
$action = URL.'/admins-management/update/'.$id;
require_once './layout/admins-management/form.php';
?>