<?php
require_once './libs/validation.php';

$id = (int)$params[0];
$pdo = connectDb();
$admin = find('id',$id,'admins')['data'];
// validation
$errors = [];
if (!required($_POST['name'])) {
    array_push($errors, 'Name is required!');
}

$name = $_POST['username'];
$sql = "SELECT * FROM admins WHERE `id` != ? AND `username` like ?";
$isExist = loadRow($pdo,$sql,[$id,$name])['data'];
if ($isExist === true) {
    array_push($errors, 'Name is exist!');
}

if (!file_exists($_FILES['image']['tmp_name'])) {
    if(!$admin['avatar'])
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
    redirect('/admins/detail/'.$id, [
        'errors' => $errors
    ]);
}else{
    // $name = $_POST['name'];
    // $username = $_POST['username'];
    // $status = $_POST['status']??0;
    // $fields = '`name` = ?,`username` = ?,`status` = ?,`updated_at` = ?';
    // $params = [$name,$username,$status,date('Y-m-d H:i:s')];
    // $pdo = connectDb();
    // $sql = "UPDATE admins SET $fields WHERE id = $id";
    // $res = save($pdo,$sql,$params);
    $values = [
        'name' => $_POST['name'],
        'username' => $_POST['username'],
        'status' => $_POST['status']??0,
        'updated_at' => date('Y-m-d H:i:s'),
    ];
    if(file_exists($_FILES['image']['tmp_name']))
    {
        $image = $_FILES['image'];
        $dir = 'assets/img/admins-image/';
        if($admin['avatar']){
            unlink('./'.$admin['avatar']);
        }
        $path = str_replace(' ','-',trim($dir.date('Y-m-d-H').'-'.$image['name']));
        move_uploaded_file($image['tmp_name'],'./'.$path);
        $values['avatar'] = $path;
    }
    $res = update('admins',$values,$id);
    //Close connect
    $pdo = null;
    $sql = null;
    if($res['code'] == 200){
        redirect('admins/list',[
            'msg'=>'Update success!',
            'code'=>200,
        ]);
    }
    else{
        redirect('admins/list',[
            'msg' => $res['data'],
            'code'=> 500,
        ]);
    }
}