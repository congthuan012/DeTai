<?php
$products = [];
if(isset($_SESSION['cart']) && $_SESSION['cart']){
    $products = $_SESSION['cart'];
}

require_once './layout/cart/index.php';
?>