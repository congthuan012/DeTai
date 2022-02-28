<?php
$title = 'List of Category';
$pdo = connectDb();
//Số items trên 1 page
$itemsPerPage = 10;
//Trang hiện tại
$currentPage = $params[0]??1;
//Tổng số item
$res = loadRow($pdo,"SELECT count(*) totalItems FROM categories WHERE deleted_at is NULL");
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
$params = [];
$sql = "SELECT * 
FROM categories 
WHERE deleted_at is NULL";

if(isset($_POST['search_name']) && $_POST['search_name'])
{
  $params[] = (string)$_POST['search_name'];
  $sql .= " AND name like CONCAT('%',?,'%')";
}

if(isset($_POST['search_id']) && $_POST['search_id'])
{
  $params[] = (string)$_POST['search_id'];
  $sql .= " AND id like ?";
}

$sql.=" LIMIT $itemsPerPage OFFSET $offset
";
$res = loadRows($pdo,$sql,$params);
$categories = '';
if($res['code'] == 200){
  $categories = $res['data'];
}
require_once './layout/categories/list.php';