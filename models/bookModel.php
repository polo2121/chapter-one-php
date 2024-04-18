<?php

require_once('../models/dbConnection.php');

function booksList()
{
    $conn = openConnection();
    $sql_sel = "select * from books";
    $result_sel = $conn->query($sql_sel);
    closeConnection($conn);

    return $result_sel;
}
function getBookById($id)
{
    $conn = openConnection();
    $stmt = $conn->prepare('SELECT * FROM books WHERE book_id = ?');
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    closeConnection($conn);
    return $result;
}
function bookNameAndPrice()
{
    $conn = openConnection();
    $sql_sel = "select book_id,book_title,book_price from books";
    $result_sel = $conn->query($sql_sel);
    closeConnection($conn);

    return $result_sel;
}
