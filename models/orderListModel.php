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
