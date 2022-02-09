<?php
// check not login
if(isLogin()){
    redirectGuest('home/index');
}

//pdo
$pdo = connectDb();

// errors
$errors = [];

//validate required username
if(!isset($_POST['username'])){
    $errors['username'] = 'Username is required';
}

//get guest by username
$sql = "SELECT * FROM guests WHERE username = ?";
$res = loadRow($pdo, $sql, [$_POST['username']])['data'];
if($res && $res['username'] == $_POST['username']){
    $errors['username'] = 'Username is existed';
}

//validate required password
if(!isset($_POST['password'])){
    $errors['password'] = 'Password is required';
}
//validate required confirm password
if(!isset($_POST['confirm-password'])){
    $errors['confirm-password'] = 'Confirm password is required';
}

//validate password and confirm password
if($_POST['password'] != $_POST['confirm-password']){
    $errors['confirm-password'] = 'Password and confirm password is not match';
}


// check errors
if(count($errors) > 0){
    redirectGuest('auth/sign-up', [
        'errors' => $errors
    ]);
    exit;
}
$value['username'] = $_POST['username'];
$value['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
$value['created_at'] = date('Y-m-d H:i:s');
$res = insert('guests', $value);

if($res['code'] == 200){
    redirectGuest('auth/sign-in',[
        'code'=> 200,
        'msg' => 'Sign up success!'
    ]);
}else{
    redirectGuest('auth/sign-up', [
        'errors' => $res['data']
    ]);
}