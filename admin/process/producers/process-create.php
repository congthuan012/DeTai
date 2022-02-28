<?php
$errors = [];
if(!required($_POST['name']))
{
    array_push($errors,'Name is required!');
}

if (isExist('name', $_POST['name'], 'categories')) {
    array_push($errors, 'Name is exist!');
}

if (!file_exists($_FILES['image']['tmp_name'])) {
    array_push($errors, 'Please choose image!');

}

$arr_type = ["image/jpeg", "image/jpg", "image/png"];
if(!in_array($_FILES['image']['type'],$arr_type))
{
    array_push($errors,'File type not correct');
}

if($_FILES['image']['size']>(8*1024*1024)){
    array_push($errors,'File must be less than 8M');
}

if(count($errors)>0){
    redirect('producers/create',[
        'errors'=>$errors
    ]);
}else{
    // $name = $_POST['name'];
    // $description = $_POST['description'];
    // $creator = (int)$_SESSION['user']['id'];
    // $image = $_FILES['image'];
    $dir = 'assets/img/producers-image/';
    // $path = str_replace(' ','-',trim($dir.date('Y-m-d-H').'-'.$image['name']));
    // move_uploaded_file($image['tmp_name'],'./'.$path);

    // $pdo = connectDb();
    // $sql = "INSERT INTO producers(`name`,`description`,`avatar`,`created_by`,`created_at`) 
    // VALUES(?,?,?,?,?)";
    // $res = save($pdo,$sql,[$name,$description,$path,$creator,date('Y-m-d H:i:s')]);
    $values = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'avatar' =>$path,
        'created_by' => (int)$_SESSION['user']['id'],
        'created_at' => date('Y-m-d H:i:s'),
    ];
    $res = insert('producers',$values);
    if($res['code'] == 200){
        redirect('producers/create',[
            'msg'=>'Create success!',
            'code'=>200,
        ]);
    }
    else{
        redirect('categories/create',[
            'msg' => $res['data'],
            'code'=> 500,
        ]);
    }
}

?>