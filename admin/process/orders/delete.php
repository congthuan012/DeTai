<?php
$id = (int)$params[0];
$pdo = connectDb();
$order = find('id',$id,'orders')['data'];
if(!$order){
    redirect('/orders/list',[
        'msg' => 'No order found',
        'code'=> 500,
    ]);
}else{
    $sql = 'UPDATE orders SET deleted_at = ? WHERE id = ?';
    $params = [date('Y-m-d H:i:s'),$id];
    $res = save($pdo,$sql,$params);
    
    if($res['code'] == 200){
        redirect('/orders/list',[
            'msg'=>'Delete success!',
            'code'=>200,
        ]);
    }
    else{
        redirect('/orders/list',[
            'msg' => $res['data'],
            'code'=> 500,
        ]);
    }
}
?>