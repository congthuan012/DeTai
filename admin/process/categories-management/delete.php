<?php
$id = (int)$params[0];
$pdo = connectDb();
$product = find('id',$id,'categories')['data'];
if(!$product){
    redirect('/categories-management/list',[
        'msg' => 'No category found',
        'code'=> 500,
    ]);
}else{
    $sql = 'UPDATE categories SET deleted_at = ? WHERE id = ?';
    $params = [date('Y-m-d H:i:s'),$id];
    $res = save($pdo,$sql,$params);
    
    if($res['code'] == 200){
        redirect('/categories-management/list',[
            'msg'=>'Delete success!',
            'code'=>200,
        ]);
    }
    else{
        redirect('/categories-management/list',[
            'msg' => $res['data'],
            'code'=> 500,
        ]);
    }
}
?>