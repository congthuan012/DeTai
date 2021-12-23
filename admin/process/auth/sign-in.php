<?php
if (isset($_COOKIE['user'],$_COOKIE['user']['name']) && $_COOKIE['user'] && $_COOKIE['user']['name']) {
    $_SESSION['user'] = $_COOKIE['user'];
}
if(isset($_SESSION['user'],$_SESSION['user']['name'])){
    redirect('products-management/list');
}
$action = URL.'/auth/process-sign-in';
require_once './layout/authentication/form.php';
?>