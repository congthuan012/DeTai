<?php
header('Content-type: application/json');

$cart = [];
if(isset($_SESSION['cart']) && $_SESSION['cart'])
{
    $cart = $_SESSION['cart'];
}

echo json_encode([
    'cart'=>$cart,
    'status' => 'success!',
    'msg'   => 'Product not found!'
]);