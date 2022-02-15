<?php
$arrUrl = urlProcess();
$folder = 'products';
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
}elseif($_SESSION['user']['role'] != 'admin'){
    unset($_SESSION['user']);
    redirect('auth/sign-in',[
        'msg'=>'Permission deny!',
        'code'=>500
    ]);
}

if((isset($_GET['method']) && $_GET['method'] == 'ajax') || (isset($_POST['method']) && $_POST['method'] == 'ajax'))
{
    if(file_exists($path))
        require_once $path;
    else
        require_once 'layout/errors/404.php';
}else{
    require_once $layout;
}
?>
