<?php
// check not login
if(isLogin()){
    redirectGuest('home/index');
}
require_once './layout/auth/sign-up.php';