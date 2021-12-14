<?php
$pdo = connectDb();
//Số items trên 1 page
$itemsPerPage = 10;

//Trang hiện tại
$currentPage = $params[0]??1;

//Tổng số item
$totalItems = (int)loadRow($pdo,"SELECT count(*) totalItems FROM products WHERE deleted_at is NULL")['totalItems'];

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
  $where .= " AND p.category = $category";
}

$sql = "SELECT p.id id,p.name product_name,p.price price,p.avatar image,c.name category
FROM products p JOIN categories c ON p.category = c.id
WHERE $where
LIMIT $itemsPerPage OFFSET $offset";
$products = (array)loadRows($pdo,$sql);
$sql = getAll('categories');
$categories = (array)loadRows($pdo,$sql);

//Close connect
$sql = null;
$pdo = null;