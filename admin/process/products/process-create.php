<?php
require_once './libs/validation.php';
// validation
$errors = [];
if (!required($_POST['name'])) {
    array_push($errors, 'Name is required!');
}

if (isExist('name', $_POST['name'], 'products')) {
    array_push($errors, 'Name is exist!');
}
if (!required($_POST['price'])) {
    array_push($errors, 'Price is required!');
}

if (!required($_POST['description'])) {
    array_push($errors, 'Description is required!');
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
    redirect('products/create', [
        'errors' => $errors
]);
}else{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category'];
    $producer_id = $_POST['producer'];
    $description = $_POST['description'];
    $creator = (int)$_SESSION['user']['id'];
    $image = $_FILES['image'];
    $dir = 'assets/img/products-image/';
    $path = str_replace(' ','-',trim($dir.date('Y-m-d-H').'-'.$image['name']));
    move_uploaded_file($image['tmp_name'],'./'.$path);
    $pdo = connectDb();
    $sql = "INSERT INTO products(`name`,`price`,`category_id`,`producer_id`,`description`,`avatar`,`created_by`,`created_at`) 
    VALUES(?,?,?,?,?,?,?,?)";
    $res = save($pdo,$sql,[$name,$price,$category_id,$producer_id,$description,$path,$creator,date('Y-m-d H:i:s')]);
    if($res['code'] == 200){
        redirect('products/create',[
            'msg'=>'Create success!',
            'code'=>200,
        ]);
    }
    else{
        redirect('products/create',[
            'msg' => $res['data'],
            'code'=> 500,
        ]);
    }
}