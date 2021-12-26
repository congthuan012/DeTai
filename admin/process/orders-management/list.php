<?php
$title = 'List of Order';
$pdo = connectDb();
//Số items trên 1 page
$itemsPerPage = 10;
//Trang hiện tại
$currentPage = $params[0]??1;
//Tổng số item
$res = loadRow($pdo,"SELECT count(*) totalItems FROM orders WHERE deleted_at is NULL");
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
$where = 'deleted_at is NULL';
if(isset($_POST['search_guest_id']) && $_POST['search_guest_id'])
{
  $guestId = (string)$_POST['search_guest_id'];
  $where .= " AND `guest_id` = $guestId";
}

if(isset($_POST['search_status']))
{
  $status = $_POST['search_status'];
  $where .= " AND `status` = $status";
}
$sql = "SELECT *
FROM orders
WHERE $where
LIMIT $itemsPerPage OFFSET $offset";
$status = [
  ['id'=>0,'name'=>'Deny'],
  ['id'=>1,'name'=>'Waiting'],
  ['id'=>2,'name'=>'Accept'],
];
$orders = loadRows($pdo,$sql)['data'];
require_once './layout/widgets/header.php';
require_once './layout/orders-management/list.php';