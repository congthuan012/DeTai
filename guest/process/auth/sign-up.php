<?php
// check not login
if(guestLogin()){
    redirectGuest('home/index');
}
require_once './layout/auth/sign-up.php';