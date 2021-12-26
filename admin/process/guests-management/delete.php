<?php
$id = (int)$params[0];
$pdo = connectDb();
$product = find('id',$id,'guests')['data'];
if(!$product){
    redirect('/guests-management/list',[
        'msg' => 'No product found',
        'code'=> 500,
    ]);
}else{
    $sql = 'UPDATE guests SET deleted_at = ? WHERE id = ?';
    $params = [date('Y-m-d H:i:s'),$id];
    $res = save($pdo,$sql,$params);
    
    if($res['code'] == 200){
        redirect('/guests-management/list',[
            'msg'=>'Delete success!',
            'code'=>200,
        ]);
    }
    else{
        redirect('/guests-management/list',[
            'msg' => $res['data'],
            'code'=> 500,
        ]);
    }
}
?>