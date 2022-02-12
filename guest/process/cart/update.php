<?php
if (!isset($_POST) || !$_POST) {
    redirectGuest('/cart/index', [
        'msg' => 'Server error!',
        'code' => 500,
    ]);
}

$cart = [];
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}
foreach ($_POST['quantity'] as $key => $value) {
    if($value < 0){
        redirectGuest('/cart/index', [
            'msg' => 'Quantity must be greater than 0!',
            'code' => 500,
        ]);
        exit;
    }
    $cart[$key]['quantity'] = $value;
}
$_SESSION['cart'] = $cart;

redirectGuest('/cart/index', [
    'msg' => 'Update success!',
    'code' => 200,
]);