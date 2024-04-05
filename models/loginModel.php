<?php
require_once('../models/dbConnection.php');

function getUserInfo()
{
    $conn = openConnection();
    // $sql_sel = "select * from books";
    // $result_sel = $conn->query($sql_sel);
    closeConnection($conn);

    // return $result_sel;
}
