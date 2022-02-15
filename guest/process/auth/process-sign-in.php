<?php
$errors = [];
/** validate required username */
if (!isset($_POST['username']) || !$_POST['username']) {
    $errors['username'] = 'Username is required!';
}

/** validate required password */
if (!isset($_POST['password']) || !$_POST['password']) {
    $errors['password'] = 'Password is required!';
}

/** check isset errors redirect sign-in */
if (count($errors) > 0) {
    redirectGuest('auth/sign-in', [
        'errors' => $errors
    ]);
    exit;
}

/** connect database */
$pdo = connectDb();

/** find first guest by username*/
$res = find('username', $_POST['username'], 'guests');
if ($res['code'] != 200) {
    redirectGuest('auth/sign-in', [
        'code' => 500,
        'msg' => 'Username is not exist!'
    ]);
    exit;
}
if($res['data']['deleted_at'] != null || $res['data']['status'] != 1){
    redirectGuest('auth/sign-in',[
        'code'=>500,
        'msg' => 'This account has been locked'
    ]);
    exit;
}

if(!password_verify($_POST['password'],$res['data']['password'])){
    redirectGuest('auth/sign-in',[
        'code'=>500,
        'msg' => 'Password is incorrect'
    ]);
    exit;
}

$_SESSION['guest'] = $res['data'];
$_SESSION['guest']['role'] = 'guest';

//check remember
if (isset($_POST['remember']) && $_POST['remember'] == 1) {
    $time = time() + 3600;
    setcookie('guest', json_encode($_SESSION['guest']), $time);
}
redirectGuest('/home',[
    'code'=>200,
    'msg'=>'Sign in success'
]);
?>