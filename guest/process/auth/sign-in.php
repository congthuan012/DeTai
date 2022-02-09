<?php
if (isset($_COOKIE['user'],$_COOKIE['user']['name']) && $_COOKIE['user'] && $_COOKIE['user']['name']) {
    $_SESSION['user'] = $_COOKIE['user'];
}
if(isset($_SESSION['user'],$_SESSION['user']['name']) && $_SESSION['user']['role'] == 'guest'){
    redirectGuest('home/index');
}
if(isLogin() && $_SESSION['user']['role'] != 'guest'){
    redirectGuest('home/index');
}
require_once './layout/auth/sign-in.php';