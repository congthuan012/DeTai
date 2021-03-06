<?php
require_once './libs/validation.php';

$id = (int)$params[0];
$pdo = connectDb();
$product = find('id',$id,'products')['data'];
// validation
$errors = [];
if (!required($_POST['name'])) {
    array_push($errors, 'Name is required!');
}

$name = $_POST['name'];
$sql = "SELECT * FROM products WHERE `id` != ? AND name like ?";
$isExist = loadRow($pdo,$sql,[$id,$name])['data'];
if ($isExist === true) {
    array_push($errors, 'Name is exist!');
}
if (!required($_POST['price'])) {
    array_push($errors, 'Price is required!');
}

if (!required($_POST['description'])) {
    array_push($errors, 'Description is required!');
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
    redirect('/products/detail/'.$id, [
        'errors' => $errors
    ]);
}else{
    $id = $product['id'];
    // $price = $_POST['price'];
    // $category_id = $_POST['category'];
    // $producer_id = $_POST['producer'];
    // $description = $_POST['description'];
    // $updated_by = (int)$_SESSION['user']['id'];
    // $fields = '`name` = ?,`price` = ?,`category_id` = ?,`producer_id` = ?,`description`= ?,`updated_by` = ?,`updated_at` = ?';
    // $params = [$name,$price,$category_id,$producer_id,$description,$updated_by,date('Y-m-d H:i:s')];
    $values = [
        'name'=>$_POST['name'],
        'price'=>$_POST['price'],
        'category_id'=>$_POST['category'],
        'producer_id'=>$_POST['producer'],
        'description'=>$_POST['avatar'],
        'updated_by'=>(int)$_SESSION['user']['id'],
        'updated_at'=>date('Y-m-d H:i:s'),
    ];
    if(file_exists($_FILES['image']['tmp_name']))
    {
        $image = $_FILES['image'];
        $dir = 'assets/img/products-image/';
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
    // $sql = "UPDATE products SET $fields WHERE id = $id";
    // $res = save($pdo,$sql,$params);

    $res = update('products',$values,$id);
    //Close connect
    $pdo = null;
    $sql = null;
    if($res['code'] == 200){
        redirect('products/list',[
            'msg'=>'Update success!',
            'code'=>200,
        ]);
    }
    else{
        redirect('products/list',[
            'msg' => $res['data'],
            'code'=> 500,
        ]);
    }
}