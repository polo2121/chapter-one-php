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
