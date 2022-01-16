<?php
$id = (int)$params[0];
$pdo = connectDb();
$product = find('id',$id,'admins')['data'];
if(!$product){
    redirect('/admins/list',[
        'msg' => 'No product found',
        'code'=> 500,
    ]);
}else{
    $sql = 'UPDATE admins SET deleted_at = ? WHERE id = ?';
    $params = [date('Y-m-d H:i:s'),$id];
    $res = save($pdo,$sql,$params);
    
    if($res['code'] == 200){
        redirect('/admins/list',[
            'msg'=>'Delete success!',
            'code'=>200,
        ]);
    }
    else{
        redirect('/admins/list',[
            'msg' => $res['data'],
            'code'=> 500,
        ]);
    }
}
?>