<?php

function dd($arr)
{
    echo '<pre>',var_dump($arr),'</pre>';
    exit;
}


function asset($path = '/'){
    return 'http://'.$_SERVER['HTTP_HOST'].'/'.$path;
}

function redirect($url, $data = []){
    foreach ($data as $key => $value) {
        $_SESSION['redirect_'.$key]=$value;
    }
    header('Location'.$url);
}

function redirectGet($key)
{
    $value =  $_SESSION['redirect_'.$key]??'';
    unset($_SESSION['redirect_'.$key]);
    return $value;
}