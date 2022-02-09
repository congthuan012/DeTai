<?php
$id = (int)$params[0];
$product = find('id',$id,'products')['data'];
// connect database
$pdo = connectDb();
// sql get product join category
$sql = "SELECT p.*,c.name as category FROM products p JOIN categories c ON p.category_id = c.id WHERE p.id = $id AND p.id = ?";
$res = loadRow($pdo,$sql,[$id]);
//check product
if($res['code'] != 200){
    redirectGuest('products',[
        'code' => $res['code'],
        'message' => $res['data']
    ]);
}

$product = $res['data'];

// get product recommended with category
$sql = "SELECT p.*,c.name as category 
FROM products p JOIN categories c ON p.category_id = c.id 
WHERE p.category_id = ? AND p.id != ?";
$res = loadRows($pdo,$sql,[$product['category_id'],$id]);
//check products
$productsRecommend = null;
if($res['code'] == 200){
    $productsRecommend = $res['data'];
}

$action = URL.'/products/update/'.$id;
require_once './layout/products/detail.php';