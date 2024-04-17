<?php
require_once('../models/dbConnection.php');

function registerUser($firstname, $lastname, $email, $pwd, $confirm)
{
    $conn = openConnection();
    $stmt = $conn->prepare('INSERT INTO users VALUES (?,?,?,?,?)');
    $stmt->bind_param('issss', $id, $firstname, $lastname, $pwd, $email);
    $stmt->execute();
    $stmt->close();
    closeConnection($conn);
}
