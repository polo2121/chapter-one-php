<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
function insertBook($title, $cover, $price, $author, $ibsn, $publication, $dimensions, $publisher, $weight, $color, $description, $genres)
{
    $conn = openConnection();
    $stmt = $conn->prepare('INSERT INTO books VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');
    $stmt->bind_param('issssssssssss', $id, $title, $cover, $price, $author, $ibsn, $publication, $dimensions, $publisher, $weight, $color, $description, $genres);
    $stmt->execute();
    $stmt->close();
    closeConnection($conn);
}
