<?php
$pdo = connectDb();
//Số items trên 1 page
$itemsPerPage = 10;
//Trang hiện tại
$currentPage = $params[0]??1;
//Tổng số item
$res = loadRow($pdo,"SELECT count(*) totalItems FROM guests WHERE deleted_at is NULL");
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
$offset = 0;
//Item bắt đầu của trang hiện tại
if($totalPages>1)
  $offset = ($currentPage - 1) * $itemsPerPage;
//Câu truy vấn
//Tìm kiếm
$where = 'deleted_at is NULL';
if(isset($_POST['search_name']) && $_POST['search_name'])
{
  $name = (string)$_POST['search_name'];
  $where .= " AND name like '%{$name}%'";
}

$sql = "SELECT `id`,`name`,`username`,`avatar`,`status`
FROM guests
WHERE $where
LIMIT $itemsPerPage OFFSET $offset";

$res = loadRows($pdo,$sql);
if($res['code'] == 500){
 dump('Có lỗi xảy ra: '.$res['data']);
}
$guests = $res['data'];
//Close connect
$sql = null;
$pdo = null;
//Close connect
$title = 'List of Guest';
require_once './layout/widgets/header.php';
require_once './layout/guests/list.php';