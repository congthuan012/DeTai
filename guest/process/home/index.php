<?php
$pdo = connectDb();
$sql = 'SELECT * FROM products WHERE deleted_at IS NULL ORDER BY created_at DESC LIMIT 10';
$res = loadRows($pdo,$sql);
if($res['code'] == 200){
    $newProducts = $res['data'];
}
$sql = "SELECT *
FROM products p JOIN (SELECT product_id,COUNT(o.product_id) 'quantity' FROM order_detail o GROUP BY o.product_id) s
ON p.id = s.product_id 
ORDER BY s.quantity DESC
LIMIT 10";
$res = loadRows($pdo,$sql);
if($res['code'] == 200){
    $topSale = $res['data'];
}
require_once './layout/home/index.php';