<?php
header('Content-type: application/json');

if(!isset($_SESSION['cart']) || !$_SESSION['cart'])
{
    echo json_encode([
        'status' => 'error',
        'msg'   => 'Server error!'
    ]);
    exit;
}

if(!isset($_POST['id']) || !$_POST['id'])
{
    echo json_encode([
        'status' => 'error',
        'msg'   => 'Server error!'
    ]);
    exit;
}

$cart = $_SESSION['cart'];

unset($cart[$_POST['id']]);

$_SESSION['cart'] = $cart;

echo json_encode([
    'status' => 'success',
    'msg'   => 'Remove success!'
]);
exit;