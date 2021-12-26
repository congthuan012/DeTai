<?php
if(isset($params[0],$params[1]) && $params[0] && $params[1])
{
    $pdo = connectDb();
    $sql = 'SELECT * FROM orders WHERE `id` = ? and deleted_at is NULL';
    $res = loadRow($pdo,$sql,[$params[1]]);
    if($res['code'] == 200){
        $order = $res['data'];
        if($params[0] == 'accept'){
            $sql = 'UPDATE orders SET `status` = 2 WHERE id = ?';
            $msg = 'Accept';
        }elseif($params[0] == 'deny'){
            $sql = 'UPDATE orders SET `status` = 0 WHERE id = ?';
            $msg = 'Deny';
        }

        $res = save($pdo,$sql,[$order['id']]);
        if($res['code'] == 200){
            redirect('orders-management/confirm',[
                'code' => 200,
                'msg'  => $msg.' success'
            ]);
        }else{
            redirect('orders-management/confirm',[
                'code' => 500,
                'msg'  => $res['data']
            ]);
        }
    }
}else{
    redirect('orders-management/confirm',[
        'code' => 500,
        'msg'  => 'Server error!'
    ]);
}