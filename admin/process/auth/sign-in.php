<?php
if(isset($_SESSION['user'],$_SESSION['user']['name']) && $_SESSION['user']['role'] == 'admin'){
    redirect('products/list');
}
$action = URL.'/auth/process-sign-in';
require_once './layout/authentication/form.php';
?>