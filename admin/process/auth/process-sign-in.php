<?php 
$errors = [];
if(!required($_POST['username'])){
    array_push($errors,'Username is required!');
}

if(!required($_POST['password'])){
    array_push($errors,'Password is required!');
}
if(count($errors)>0){
    redirect('auth/sign-in',[
        'errors'=>$errors
    ]);
}else{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $pdo = connectDb();
    $sql = 'SELECT * FROM admins WHERE `username` = ?';
    $res = loadRow($pdo,$sql,[$username]);
    if($res['code'] != 200){
        redirect('auth/sign-in',[
            'code'=>500,
            'msg' => $res['data']
        ]);
        exit;
    }

    if(!isset($res['data']) || !$res['data']){
        redirect('auth/sign-in',[
            'code'=>500,
            'msg' => 'Username is incorrect!'
        ]);
        exit;
    }

    if($res['data']['deleted_at'] != null || $res['data']['status'] != 1){
        redirect('auth/sign-in',[
            'code'=>500,
            'msg' => 'This account has been locked'
        ]);
        exit;
    }
    
    if(!password_verify($password,$res['data']['password'])){
        redirect('auth/sign-in',[
            'code'=>500,
            'msg' => 'Password is incorrect'
        ]);
        exit;
    }

    $_SESSION['user'] = $res['data'];
    $_SESSION['user']['role'] = 'admin';

    //check remember
    if (isset($_POST['remember']) && $_POST['remember'] == 1) {
        $time = time() + 3600;
        setcookie('user', json_encode($_SESSION['user']), $time);
    }

    redirect('products/list',[
        'code'=>200,
        'msg'=>'Sign in success'
    ]);
}