<?php
$search = $_GET['search'] ?? '';
if(!$search){
    redirectGuest('products/index');
}

$pdo = connectDb();
$sql = "SELECT * FROM products WHERE deleted_at IS NULL AND name LIKE CONCAT('%', ?, '%')";
$res = loadRows($pdo,$sql,[$search]);
if($res['code'] != 200){
    redirectGuest('products/index',[
        'code' => $res['code'],
        'msg' => $res['msg']
    ]);
}

$products = $res['data'];

if(!$products){
    redirectGuest('products/index',[
        'code' => 500,
        'msg' => '0 result for search: "'.$search.'"'
    ]);
}

require_once './layout/home/search.php';
?>