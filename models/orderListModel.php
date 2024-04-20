<?php

require_once('../models/dbConnection.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getOrderList()
{
    $conn = openConnection();
    $sql_sel = "select * from orders";
    $result_sel = $conn->query($sql_sel);
    closeConnection($conn);
    return $result_sel;
}

function getOrderListById($userId)
{
    $conn = openConnection();
    $stmt = $conn->prepare('SELECT * FROM orders WHERE user_id = ?');
    $stmt->bind_param('s', $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    closeConnection($conn);
    return $result;
}

function createOrder($userId)
{

    $issuedDate = date(DATE_RFC2822);
    $issuedDate = date('d M Y', strtotime($issuedDate));

    $ordeCode = uniqid();
    $status = "processing";

    $conn = openConnection();
    $stmt = $conn->prepare('INSERT INTO orders VALUES (?,?,?,?,?)');
    $stmt->bind_param('issss', $id, $userId, $ordeCode, $issuedDate, $status);
    $stmt->execute();
    $stmt->close();
    closeConnection($conn);
}
