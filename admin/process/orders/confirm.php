<?php
$title = 'Orders waiting for confirmation';
$pdo = connectDb();
$sql = 'SELECT * FROM orders WHERE `status` like ? and deleted_at is NULL ORDER BY created_at ASC';
$res = loadRows($pdo,$sql,['Pending']);
if($res['code'] == 500){
    redirect('orders/list',[
        'code' => 500,
        'msg'  => 'Server error!'
    ]);
    exit;
}

function getProducts($id){
    $pdo = connectDb();
    $sql = 
    'SELECT o.price,p.name,o.quantity,o.sale
     FROM order_detail o JOIN products p ON o.product_id = p.id
     WHERE order_id = ?';
    return loadRows($pdo,$sql,[$id])['data'];
}

$pdo = null;
$sql = null;
$orders = $res['data'];
require_once './layout/widgets/header.php';
require_once './layout/orders/confirm.php';