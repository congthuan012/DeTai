<?php

function urlProcess(){
    if(isset($_GET['url'])){
        $url = $_GET['url'];
        //Loại bỏ ký / thừa và khoảng trắng
        $url = filter_var(trim($url,'/'));
        //Tách chuỗi thành mảng
        $url = explode('/',$url);
        return $url;
    }
}

function dump($arr)
{
    echo '<pre>',var_dump($arr),'</pre>';
    exit;
}


function asset($path = '/'){
    // http://localhost/Learn/DeTai/admin/assets/css/style.css
    return URL.'/'.$path;
}

function redirect($url, $data = []){
    foreach ($data as $key => $value) {
        $_SESSION['redirect_'.$key]=$value;
    }
    header('Location:'.URL.'/'.$url);
}

function redirectGet($key)
{
    $value =  $_SESSION['redirect_'.$key]??'';
    unset($_SESSION['redirect_'.$key]);
    return $value;
}

function assetGuest($path = '/'){
    // http://localhost/Learn/DeTai/guest/assets/css/style.css
    return GUEST_URL.'/'.$path;
}

function redirectGuest($url, $data = []){
    foreach ($data as $key => $value) {
        $_SESSION['redirect_'.$key]=$value;
    }
    header('Location:'.GUEST_URL.'/'.$url);
}

function guestHref($url){
    return GUEST_URL.$url;
}

/** function check is login */
function isLogin(){
    if (isset($_COOKIE['user'],$_COOKIE['user']['name']) && $_COOKIE['user']) {
        $_SESSION['user'] = json_decode($_COOKIE['user']);
    }
    return isset($_SESSION['user']) && $_SESSION['user'];
}

function guestLogin(){
    if (isset($_COOKIE['guest'],$_COOKIE['guest']['name']) && $_COOKIE['guest']) {
        $_SESSION['guest'] = json_decode($_COOKIE['guest']);
    }
    return isset($_SESSION['guest']) && $_SESSION['guest'];
}