<?php

require_once('../models/dbConnection.php');

function insertAddress($userId, $address, $postCode, $city, $country, $phNum)
{
    $conn = openConnection();
    $stmt = $conn->prepare('INSERT INTO address VALUES (?,?,?,?,?,?,?)');
    $stmt->bind_param('iisssss', $id, $userId, $address, $postCode, $city, $country, $phNum);
    $stmt->execute();
    $results = $stmt->get_result();
    $stmt->close();
    closeConnection($conn);
    return $results;
}

function getDeliveryAddress($user_id)
{
    $conn = openConnection();
    $stmt = $conn->prepare('SELECT * FROM address WHERE user_id = ?');
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    closeConnection($conn);
    return $result;
}
