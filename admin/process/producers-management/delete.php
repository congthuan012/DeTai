<?php
$id = (int)$params[0];
$pdo = connectDb();
$product = find('id',$id,'producers')['data'];
if(!$product){
    redirect('producers-management/list',[
        'msg' => 'No producer found',
        'code'=> 500,
    ]);
}else{
    $sql = 'UPDATE producers SET deleted_at = ? WHERE id = ?';
    $params = [date('Y-m-d H:i:s'),$id];
    $res = save($pdo,$sql,$params);
    
    if($res['code'] == 200){
        redirect('producers-management/list',[
            'msg'=>'Delete success!',
            'code'=>200,
        ]);
    }
    else{
        redirect('producers-management/list',[
            'msg' => $res['data'],
            'code'=> 500,
        ]);
    }
}
?>