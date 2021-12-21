<?php

function dump($arr)
{
    echo '<pre>',print_r($arr),'</pre>';
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
    header('Location:'.$url);
}

function redirectGet($key)
{
    $value =  $_SESSION['redirect_'.$key]??'';
    unset($_SESSION['redirect_'.$key]);
    return $value;
}
