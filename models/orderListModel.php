<?php

function getOrderList()
{
    $conn = openConnection();
    $sql_sel = "select * from orders";
    $result_sel = $conn->query($sql_sel);
    closeConnection($conn);

    return $result_sel;
}
