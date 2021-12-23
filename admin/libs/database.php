<?php
require_once 'config.php';
function connectDb(){
    $connect = 1;
    //taọ chuỗi kết nối
    try{
        $connect = new PDO('mysql:host='.HOST.';port='.PORT.';dbname='.DBNAME,USERNAME,PASSWORD,OPTION);
        $connect->query('set names utf8');
    }catch(PDOException $e)
    {
        $connect = "Connect failed: ".$e->getMessage();
    }
    return $connect;
}

function loadRow($pdo, $sql, $params = [])
{
    try{
        $statement = $pdo->prepare($sql);
        $statement->execute($params);
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        $code = 200;
    }catch(PDOException $e)
    {
        $data = 'Server error: '.$e->getMessage();
        $code = 500;
    }

    return [
        'data'=>$data,
        'code'=>$code
    ];
}

function loadRows($pdo, $sql, $params = []){
    try{
        $statement = $pdo->prepare($sql);
        $statement->execute($params);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $code = 200;
    }catch(PDOException $e){
        $data = 'Server error: '.$e->getMessage();
        $code = 500;
    }
    return [
        'data'=>$data,
        'code'=>$code
    ];
}

function save($pdo, $sql, $params = []){
    try{
        $statement = $pdo->prepare($sql);
        $data = $statement->execute($params);
        $code = 200;
    }catch(PDOException $e){
        $data = 'Server error: '.$e->getMessage();
        $code = 500;
    }

    return [
        'data'=>$data,
        'code'=>$code
    ];
}

function getAll($table){
 return "SELECT * FROM $table WHERE deleted_at is NULL";
}

function find($col,$val,$table){
    $pdo = connectDb();
    return loadRow($pdo,"SELECT * FROM $table WHERE $col like ?",[$val]);
}

function login(){
    return false;
}