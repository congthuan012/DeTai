<?php
$pdo = connectDb();
//Số items trên 1 page
$itemsPerPage = 10;
//Trang hiện tại
$currentPage = $params[0]??1;
//Tổng số item
$res = loadRow($pdo,"SELECT count(*) totalItems FROM products WHERE deleted_at is NULL");
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
$where = 'p.deleted_at is NULL';
if(isset($_POST['search_name']) && $_POST['search_name'])
{
  $name = (string)$_POST['search_name'];
  $where .= " AND p.name like '%{$name}%'";
}

if(isset($_POST['search_category']) && $_POST['search_category'])
{
  $category = $_POST['search_category'];
  $where .= " AND p.category_id = $category";
}
$sql = "SELECT p.id id,p.name ,p.price price,p.avatar,p.category_id
FROM products p
WHERE $where
LIMIT $itemsPerPage OFFSET $offset";
$products = (array)loadRows($pdo,$sql)['data'];
$sql = getAll('categories');
$categories = (array)loadRows($pdo,$sql)['data'];

//Close connect
$sql = null;
$pdo = null;
//Close connect
$title = 'List of product';
require_once './layout/widgets/header.php';
require_once './layout/products/list.php';