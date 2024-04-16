<?php
require_once('../models/dbConnection.php');

function getUserByEmail($email)
{
    $conn = openConnection();
    $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    closeConnection($conn);
    return $result;
}
