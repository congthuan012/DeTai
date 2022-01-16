<?php
header('Content-type: application/json');
$data = ['Server error!'];
$code = 500;
if(isset($_GET['id']) && $_GET['id']){
    $id = $_GET['id'];
    $pdo = connectDb();
    $sql = 
    "SELECT o.id,o.guest_id,o.total,o.admin_id,o.address,o.`status`,g.`name` 'guest_name',o.created_at
    FROM orders o
    JOIN  guests g ON g.id = o.guest_id
    WHERE o.id = ?";
    $res = loadRow($pdo,$sql,[$id]);
    $data = $res['data'];
    if($res['code'] == 200){
        $code = 200;
        $sql = 'SELECT o.quantity,o.price,o.sale,p.`name`,p.avatar,o.product_id
        FROM order_detail o
        JOIN products p ON o.product_id = p.id
        WHERE order_id = ?';
        $res = loadRows($pdo,$sql,[$data['id']]);
        if($res['code'] == 200){
            $data['order_detail'] = $res['data'];
        }else{
            $data = $res['data'];
        }
    }
    $pdo = null;
    $sql = null;
}
echo json_encode([
    'status'=>$code,
    'data'=>$data
]);