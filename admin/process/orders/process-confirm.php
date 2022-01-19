<?php
if(isset($params[0],$params[1]) && $params[0] && $params[1])
{
    $pdo = connectDb();
    $sql = 'SELECT * FROM orders WHERE `id` = ? and deleted_at is NULL';
    $res = loadRow($pdo,$sql,[$params[1]]);
    if($res['code'] == 200){
        $order = $res['data'];
        if($params[0] == 'accept'){
            $sql = 'UPDATE orders SET `status` = "Approve" WHERE id = ?';
            $msg = 'Accept';
        }elseif($params[0] == 'deny'){
            $sql = 'UPDATE orders SET `status` = "Deny" WHERE id = ?';
            $msg = 'Deny';
        }

        $res = save($pdo,$sql,[$order['id']]);
        if($res['code'] == 200){
            redirect('orders/confirm',[
                'code' => 200,
                'msg'  => $msg.' success'
            ]);
        }else{
            redirect('orders/confirm',[
                'code' => 500,
                'msg'  => $res['data']
            ]);
        }
    }
}else{
    redirect('orders/confirm',[
        'code' => 500,
        'msg'  => 'Server error!'
    ]);
}