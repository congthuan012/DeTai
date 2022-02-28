<?php
require_once './libs/validation.php';
// validation
$errors = [];
if (!required($_POST['name'])) {
    array_push($errors, 'Name is required!');
}

if (!required($_POST['username'])) {
    array_push($errors, 'Username is required!');
}else{
    if (isExist('username', $_POST['username'], 'admins')) {
        array_push($errors, 'Username is exist!');
    }
}

if (!file_exists($_FILES['image']['tmp_name'])) {
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
// validation
if (count($errors) > 0) {
    redirect('admins/create', [
        'errors' => $errors
]);
}else{
   
    // $name = $_POST['name'];
    // $username = $_POST['username'];
    // $status = $_POST['status']??0;
    // $password = password_hash($_POST['username'],PASSWORD_DEFAULT);
    $image = $_FILES['image'];
    $dir = 'assets/img/admins-image/';
    $path = str_replace(' ','-',trim($dir.date('Y-m-d-H').'-'.$image['name']));
    move_uploaded_file($image['tmp_name'],'./'.$path);
    // $pdo = connectDb();
    // $sql = "INSERT INTO admins(`name`,`username`,`status`,`password`,`avatar`,`created_at`) 
    // VALUES(?,?,?,?,?,?,?)";
    // $res = save($pdo,$sql,[$name,$username,$status,$password,$path,date('Y-m-d H:i:s')]);
    $values = [
        'name' => $_POST['name'],
        'username' => $_POST['username'],
        'status' => $_POST['status']??0,
        'password' => password_hash($_POST['username'],PASSWORD_DEFAULT),
        'avatar' => $path,
        'created_at' => date('Y-m-d H:i:s'),
    ];
    $res = insert('admins', $values);
    if($res['code'] == 200){
        redirect('admins/create',[
            'msg'=>'Create success!',
            'code'=>200,
        ]);
    }
    else{
        redirect('admins/create',[
            'msg' => $res['data'],
            'code'=> 500,
        ]);
    }
}