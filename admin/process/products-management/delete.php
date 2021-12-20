<?php
$id = (int)$params[0];
$pdo = connectDb();
$product = find('id',$id,'products')['data'];
if(!$product){
    redirect(URL.'/products-management/list',[
        'msg' => 'No product found',
        'code'=> 500,
    ]);
}else{
    $sql = 'UPDATE products SET deleted_at = ? WHERE id = ?';
    $params = [date('Y-m-d H:i:s'),$id];
    $res = save($pdo,$sql,$params);
    
    if($res['code'] == 200){
        redirect(URL.'/products-management/list',[
            'msg'=>'Delete success!',
            'code'=>200,
        ]);
    }
    else{
        redirect(URL.'/products-management/list',[
            'msg' => $res['data'],
            'code'=> 500,
        ]);
    }
}
?>