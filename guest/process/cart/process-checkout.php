<?php 
// check sign-in
if(!guestLogin()) {
    redirectGuest('/auth/sign-in',[
        'code' => 500,
        'msg' => 'Please sign-in to continue!'
    ]);
}

// check cart
$cart = [];
if(!isset($_SESSION['cart'])) {
    redirectGuest('/products',[
        'code' => 500,
        'msg' => 'Your cart is empty!'
    ]);
}
$cart = $_SESSION['cart'];

if(!isset($_POST['address']) || !$_POST['address']){
    redirectGuest('/cart/checkout',[
        'code' => 500,
        'msg' => 'Please enter your address!'
    ]);
}

if(!isset($_POST['phone']) || !$_POST['phone']){
    redirectGuest('/cart/checkout',[
        'code' => 500,
        'msg' => 'Please enter your phone number!'
    ]);
}
if(!isset($_POST['total']) || !$_POST['total'] == 0){
    $total = 0;
    foreach($cart as $key => $value){
        $total+=$value['product_price']*$value['quantity'];
    }
}else{
    $total = $_POST['total'];
}
//insert to orders table
$values = [
    'guest_id' => $_SESSION['guest']['id'],
    'total' => $total,
    'status' => 'pending',
    'address' => $_POST['address'],
    'created_at' => date('Y-m-d H:i:s'),
];

$sql = 'SELECT @@IDENTITY "id";';

$res = insert('orders', $values, $sql);

if($res['code'] != 200){
    redirectGuest('/cart/checkout',[
        'code' => 500,
        'msg' => 'Server error!'
    ]);
}

$order_id = $res['data'];
//insert to order_details table
foreach($cart as $key => $value){
    $values = [
        'order_id' => $order_id,
        'product_id' => $key,
        'quantity' => $value['quantity'],
        'price' => $value['product_price'],
        'sale' => 0,
    ];
    $res = insert('order_detail', $values);
    if($res['code'] != 200){
        redirectGuest('/cart/checkout',[
            'code' => 500,
            'msg' => 'Server error!'
        ]);
    }
}
$_SESSION['cart'] = null;

require_once './layout/cart/checkout-success.php';
?>