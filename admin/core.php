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

$arrUrl = urlProcess();
$folder = 'products-management';
$file = 'list';
$param = [];
if(isset($arrUrl[0]) && $arrUrl[0]){
    $folder = $arrUrl[0];
    unset($arrUrl[0]);
}
if(isset($arrUrl[1]) && $arrUrl[1]){
    $file = $arrUrl[1];
    unset($arrUrl[1]);
}
if(isset($arrUrl[2]) && $arrUrl[2]){
    $params = array_values($arrUrl);
    unset($arrUrl);
}
$path = 'process/'.$folder.'/'.$file.'.php';
$layout = 'layout.php';
if(!isset($_SESSION['user'])){
    $layout = 'process/auth/layout.php';
    if($file != 'process-sign-in')
        $path = 'process/auth/sign-in.php';
}
require_once $layout;
?>
