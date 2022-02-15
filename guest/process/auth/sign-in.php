<?php
if(isset($_SESSION['guest'],$_SESSION['guest']['name']) && $_SESSION['guest']['role'] == 'guest'){
    redirectGuest('home/index');
}
if(guestLogin() && $_SESSION['guest']['role'] != 'guest'){
    redirectGuest('home/index');
}
require_once './layout/auth/sign-in.php';