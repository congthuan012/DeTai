<?php
require_once 'config.php';
function connectDb()
{
    //taọ chuỗi kết nối
    try {
        $connect = new PDO('mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . DBNAME, USERNAME, PASSWORD, OPTION);
        $connect->query('set names utf8');
    } catch (PDOException $e) {
        $connect = "Connect failed: " . $e->getMessage();
    }
    return $connect;
}

function loadRow($pdo, $sql, $params = [])
{
    try {
        $statement = $pdo->prepare($sql);
        $statement->execute($params);
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        $code = 200;
    } catch (PDOException $e) {
        $data = 'Server error: ' . $e->getMessage();
        $code = 500;
    }

    return [
        'data' => $data,
        'code' => $code
    ];
}

function loadRows($pdo, $sql, $params = [])
{
    try {
        $statement = $pdo->prepare($sql);
        $statement->execute($params);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $code = 200;
    } catch (PDOException $e) {
        $data = 'Server error: ' . $e->getMessage();
        $code = 500;
    }
    return [
        'data' => $data,
        'code' => $code
    ];
}

function save($pdo, $sql, $params = [])
{
    try {
        $statement = $pdo->prepare($sql);
        $statement->execute($params);
        $code = 200;
        $data = $pdo->lastInsertId();
    } catch (PDOException $e) {
        $data = 'Server error: ' . $e->getMessage();
        $code = 500;
    }

    return [
        'data' => $data,
        'code' => $code
    ];
}

function getAll($table)
{
    $pdo = connectDb();
    $sql = "SELECT * FROM ? WHERE deleted_at is NULL";
    return loadRows($pdo, $sql, [$table]);
}

function find($col, $val, $table)
{
    $pdo = connectDb();
    return loadRow($pdo, "SELECT * FROM $table WHERE $col like ?", [$val]);
}

// function insert
function insert($table, $data)
{
    $pdo = connectDb();
    $sql = "INSERT INTO $table(";
    $cols = [];
    $values = [];
    foreach ($data as $key => $value) {
        $cols[] = $key;
        $values[] = $value;
    }
    $sql .= implode(',', $cols);
    $sql .= ') VALUES (';
    $sql .= implode(',', array_fill(0, count($cols), '?'));
    $sql .= ');';
    return save($pdo, $sql, $values);
}