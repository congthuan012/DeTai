<?php

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
    header('Location:'.URL.'/'.$url);
}