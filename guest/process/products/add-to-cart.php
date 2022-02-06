<?php
header('Content-type: application/json');

$cart = [];
if(isset($_SESSION['cart']) && $_SESSION['cart'])
{
    $cart = $_SESSION['cart'];
}

if(!isset($_POST['id']) || !$_POST['id'])
{
    echo json_encode([
        'status' => 'error',
        'msg'   => 'Server error!'
    ]);
    exit;
}

$res = find('id',$_POST['id'],'products');
if($res['code'] != 200){
    echo json_encode([
        'status' => 'error',
        'msg'   => 'Product not found!'
    ]);
    exit;
}

$product = $res['data'];

if(isset($cart[$product['id']])){
    $cart[$product['id']]['quantity']++;      
}else{
    $cart[$product['id']] = [
        'product_name'=>$product['name'],
        'product_avatar'=>asset($product['avatar']),
        'product_price'=>$product['price'],
        'quantity'=>1,
    ];
}

$_SESSION['cart'] = $cart;

echo json_encode([
    'status' => 'success',
    'msg'   => 'Add product: '.$product['name'].' to cart success!'
]);
exit;