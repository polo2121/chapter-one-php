<?php

require_once('../models/dbConnection.php');

function booksList()
{
    $conn = openConnection();
    $sql_sel = "select * from books";
    $result_sel = $conn->query($sql_sel);
    closeConnection($conn);

    return $result_sel;

    // if ($result_sel->num_rows > 0) {
    //     while ($row = $result_sel->fetch_assoc()) {
    //         echo "Id" . $row['book_id'] . "<br>";
    //         echo "Title " . $row['book_title'] . "<br>";
    //         echo "Description " . $row['book_description'] . "<br>";
    //         echo "Cover " . $row['book_cover'] . "<br>";
    //     }
    // }


    //results
    // if($result_sel->num_rows > 0){
    //     while($row = $result)
    // }
}
function bookNameAndPrice()
{
    $conn = openConnection();
    $sql_sel = "select book_id,book_title,book_price from books";
    $result_sel = $conn->query($sql_sel);
    closeConnection($conn);

    return $result_sel;
}
