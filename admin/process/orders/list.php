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
$params = [];
$where = 'deleted_at is NULL';
if(isset($_POST['search_guest_id']) && $_POST['search_guest_id'])
{
  array_push($params,(string)$_POST['search_guest_id']);
  $where .= " AND `guest_id` = ?";
}

if(isset($_POST['search_order_id']) && $_POST['search_order_id'])
{
  array_push($params,(string)$_POST['search_order_id']);
  $where .= " AND `id` = ?";
}

if(isset($_POST['search_status']))
{
  array_push($params,$_POST['search_status']);
  $where .= " AND `status` LIKE ?";
}

$sql = "SELECT *
FROM orders
WHERE $where
LIMIT $itemsPerPage OFFSET $offset";
$res = loadRows($pdo,$sql,$params);
if($res['code'] == 200)
{
  $orders = $res['data'];
}

require_once './layout/widgets/header.php';
require_once './layout/orders/list.php';