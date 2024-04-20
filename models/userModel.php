<?php

require_once('../models/dbConnection.php');
function getUserList()
{
    $conn = openConnection();
    $sql_sel = "select * from users";
    $result_sel = $conn->query($sql_sel);
    closeConnection($conn);

    return $result_sel;
}
function getUserListById($id)
{
    $conn = openConnection();
    $stmt = $conn->prepare('SELECT * FROM users WHERE user_id = ?');
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    closeConnection($conn);
    return $result;
}
