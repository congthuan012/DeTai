<?php
if(!isset($params[0]) && !is_numeric($params)){
    redirect('/orders/list',[
        'code'=>500,
        'msg'=>'Order not found!'
    ]);
}

$id = $params[0];
if(!$_POST){
    redirect('/orders/list',[
        'code'=>200,
        'msg'=>'Update success!'
    ]);
}

$address = $_POST['address'];
$status = $_POST['status'];
$quantity = $_POST['quantity'];

$pdo = connectDb();
$order = find('id',$id,'orders');
if(count($order) < 1){
    redirect('/orders/list',[
        'code'=>404,
        'msg'=>'Order not found!'
    ]);
}

/**
 * SET quantity = CASE product_id 
 *				  WHEN 1 THEN 4
 *                WHEN 2 THEN 2 
 *                END
 * WHERE order_id = 1;
 */

$sql = 'UPDATE order_detail SET quantity = CASE product_id';
$params = [];
foreach($_POST['quantity'] as $key => $value){
    $sql .= " WHEN ? THEN ?";
    array_push($params,$key);
    array_push($params,$value);
}
$sql .= ' END WHERE order_id = ?';
array_push($params,$id);
$res = save($pdo,$sql,$params);
if($res['code'] == 200){
    $sql = 'UPDATE orders
    SET total = (SELECT SUM(price*quantity) FROM  order_detail WHERE order_id = ?),
        `status` = ?,
        `address` = ?
    WHERE id = ?';
    $params = [$id,$_POST['status'],$_POST['address'],$id];
    $res = save($pdo,$sql,$params);
    redirect('/orders/list',[
        'code'=>$res['code'],
        'msg'=>$res['code'] == 200 ?'Update order: '.$id.' success!':$res['data']
    ]);
    exit;
}

redirect('/orders/list',[
    'code'=>$res['code'],
    'msg'=>$res['data']
]);

exit;