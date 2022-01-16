<?php
$title = 'Update Products';
$id = (int)$params[0];
$pdo = connectDb();
$guest = find('id',$id,'guests')['data'];
if(!$guest)
redirect('guests/list',[
    'msg'=>'Guest not exist!',
    'code'=>500,
]);
$guest['username'] = trim(str_replace('guest_','',$guest['username'])); 
$action = URL.'/guests/update/'.$id;
require_once './layout/guests/form.php';
?>