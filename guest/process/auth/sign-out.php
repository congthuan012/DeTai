<?php
if(guestLogin()){
    session_destroy();
    setcookie('user', '', time() - 3600);
    session_start();
    redirectGuest('home/index',[
        'msg' => 'Sign out success!',
        'code' => 200
    ]);
}else{
    redirectGuest('auth/sign-in',[
        'msg' => 'Sign out fail!',
        'code' => 500
    ]);
}