<?php
// check sign-in
if(!guestLogin()) {
    redirectGuest('/auth/sign-in',[
        'code' => 500,
        'msg' => 'Please sign-in to continue!'
    ]);
}

$products = [];
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    redirectGuest('products', [
        'msg' => 'Cart is empty!',
        'code' => 500
    ]);
    exit;
}
$products = $_SESSION['cart'];
require_once './layout/cart/checkout.php';
