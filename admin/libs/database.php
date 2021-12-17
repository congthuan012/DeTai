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
        $statement = $statement->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e)
    {
        $statement = 'Server error: '.$e->getMessage();
    }

    return $statement;
}

function loadRows($pdo, $sql, $params = []){
    try{
        $statement = $pdo->prepare($sql);
        $statement->execute($params);
        $statement = $statement->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        $statement = 'Server error: '.$e->getMessage();
    }
    return $statement;
}

function save($pdo, $sql, $params = []){
    try{
        $statement = $pdo->prepare($sql);
        $statement->execute($params);
    }catch(PDOException $e){
        $statement = 'Server error: '.$e->getMessage();
    }
    return $statement;
}

function getAll($table){
 return "SELECT * FROM $table WHERE deleted_at is NULL";
}

function find($col,$val,$table){
    $pdo = connectDb();
    return loadRow($pdo,"SELECT * FROM $table WHERE $col like '$val'");
}