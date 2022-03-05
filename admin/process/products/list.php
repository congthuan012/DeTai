<?php
$pdo = connectDb();

$params = [];
$where = ' 1';
if(isset($_GET['search_name']) && $_GET['search_name'])
{
  $params['name'] = (string)$_GET['search_name'];
  $where .= " AND p.name like '%{$params['name']}%'";
}

if(isset($_GET['search_id']) && $_GET['search_id'])
{
  $params['id'] = (string)$_GET['search_id'];
  $where .= " AND p.id = ".$params['id'];
}

if(isset($_GET['search_category']) && $_GET['search_category'])
{
  $params['search_category'] = $_GET['search_category'];
  $where .= " AND p.category_id = ".$params['search_category'];
}
//Số items trên 1 page
$itemsPerPage = 1;
//Trang hiện tại
$currentPage =  $_GET['page']??1;
//Tổng số item
$res = loadRow($pdo,"SELECT count(*) totalItems FROM products p WHERE $where");
if($res['code'] == 200){
  $totalItems = $res['data'];
}
else{
  $errors = $res['data'];
}
$totalItems = (int)$res['data']['totalItems']??'';
//Số trang
$totalPages = (int)($totalItems / $itemsPerPage);
if($totalItems % $itemsPerPage > 0){
  $totalPages++;
}
//Item bắt đầu của trang hiện tại
$offset = ($currentPage - 1) * $itemsPerPage;

//Câu truy vấn
//Tìm kiếm

// $sql = "SELECT p.* ,c.name 'category'
$sql = "SELECT p.* ,c.name 'category'
FROM products p
LEFT JOIN categories c ON p.category_id = c.id
WHERE $where
LIMIT $itemsPerPage OFFSET $offset";
$res = loadRows($pdo,$sql);
if($res['code'] == 200){
  $products = $res['data'];
}
else{
  $errors = $res['data'];
}
$categories = (array)getAll('categories')['data'];

//Close connect
$sql = null;
$pdo = null;
//Close connect
$urlPage = http_build_query($params);
$title = 'List of product';
require_once './layout/widgets/header.php';
require_once './layout/products/list.php';
?>