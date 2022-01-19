<?php
header('Content-type: application/json');
$pdo = connectDb();
$errors = [];
$code = 500;
$user = find('id',$_SESSION['user']['id'],'admins')['data'];
if(!required($_POST['old_password'])){
    $errors['old_password'] = 'Old password is required!';
}elseif(!password_verify($_POST['old_password'],$user['password'])){
    $errors['old_password'] = 'Password incorrect!';
}
if(!required($_POST['new_password'])){
    $errors['new_password'] = 'New password is required!';
}

if(!required($_POST['password_confirm'])){
    $errors['password_confirm'] = 'Password confirm is required!';
}

if($_POST['new_password'] != $_POST['password_confirm'])
{
    $errors['confirm_password'] = 'Password confirm and New password not match!';
}

if(count($errors)>0){
    echo json_encode([
        'data'=>$errors,
        'code'=>$code
    ]);
}else{
    $password = password_hash($_POST['new_password'],PASSWORD_DEFAULT);
    $sql = 'UPDATE admins set `password` = ? WHERE id = ?';
    $res = save($pdo,$sql,[$password,$user['id']]);
    echo json_encode([
        'data'=>$res['data'],
        'code'=>$res['code']
    ]);
}