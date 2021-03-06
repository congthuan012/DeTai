<?php
require_once './libs/validation.php';

$id = (int)$params[0];
$pdo = connectDb();
$product = find('id',$id,'producers')['data'];
// validation
$errors = [];
if (!required($_POST['name'])) {
    array_push($errors, 'Name is required!');
}

$name = $_POST['name'];
$sql = "SELECT * FROM producers WHERE `id` != ? AND name like ?";
$isExist = loadRow($pdo,$sql,[$id,$name])['data'];

if ($isExist === true) {
    array_push($errors, 'Name is exist!');
}

if (!file_exists($_FILES['image']['tmp_name'])) {
    if(!$product['avatar'])
        array_push($errors, 'Please choose image!');
}else{
    $arr_type = ["image/jpeg", "image/jpg", "image/png"];
    if(!in_array($_FILES['image']['type'],$arr_type))
    {
        array_push($errors,'File type not correct');
    }else{
        if($_FILES['image']['size']>(8*1024*1024)){
            array_push($errors,'File must be less than 8M');
        }
    }
}
$pdo = null;
$sql = null;
// validation
if (count($errors) > 0) {
    redirect('producers/detail/'.$id, [
        'errors' => $errors
    ]);
}else{
    $id = $product['id'];
    // $description = $_POST['description'];
    // $updated_by = (int)$_SESSION['user']['id'];
    // $fields = '`name` = ?,`description`= ?,`updated_by`= ?,`updated_at` = ?';
    // $params = [$name,$description,$updated_by,date('Y-m-d H:i:s')];
    $values = [
        'name' => $name,
        'description' => $_POST['description'],
        'avatar' =>$path,
        'updated_by' => (int)$_SESSION['user']['id'],
        'updated_at' => date('Y-m-d H:i:s'),
    ];
    if(file_exists($_FILES['image']['tmp_name']))
    {
        $image = $_FILES['image'];
        $dir = 'assets/img/producers-image/';
        if($product['avatar']){
            unlink('./'.$product['avatar']);
        }
        $path = str_replace(' ','-',trim($dir.date('Y-m-d-H').'-'.$image['name']));
        move_uploaded_file($image['tmp_name'],'./'.$path);
        $values['avatar'] = $path;
        // $fields .= ',`avatar` = ?';
        // array_push($params,$path);
    }
    // $pdo = connectDb();
    // $sql = "UPDATE producers SET $fields WHERE id = $id";
    // $res = save($pdo,$sql,$params);

    $res = update('producers',$values,$id);
    //Close connect
    $pdo = null;
    $sql = null;
    if($res['code'] == 200){
        redirect('producers/list',[
            'msg'=>'Update success!',
            'code'=>200,
        ]);
    }
    else{
        redirect('producers/list',[
            'msg' => $res['data'],
            'code'=> 500,
        ]);
    }
}