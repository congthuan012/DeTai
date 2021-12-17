<?php
require_once './libs/validation.php';

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
}

if (count($errors) > 0) {
    redirect(URL . '/products-management/create', [
        'errors' => $errors
    ]);
}
