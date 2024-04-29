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
function booksListWithGenres($genres)
{
    $conn = openConnection();
    $stmt = $conn->prepare('SELECT * FROM books WHERE genres = ? LIMIT 7');
    $stmt->bind_param('s', $genres);
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
    $stmt->bind_param('issssssssssss', $id, $title, $description, $cover, $price, $author, $ibsn, $publication, $dimensions, $publisher, $weight, $color, $genres);
    $stmt->execute();
    $stmt->close();
    closeConnection($conn);
}
function updateBook($id, $title, $description, $cover, $price, $author, $ibsn, $publication, $dimensions, $publisher, $weight, $color, $genres)
{
    $conn = openConnection();
    $stmt = $conn->prepare('UPDATE books SET book_title=?, book_description=?, book_cover=?, book_price=?, book_author=?, book_isbn=?, book_publication=?, book_dimensions=?, book_publisher=?, book_weight=?, background_color=?, genres=? WHERE book_id=?');
    $stmt->bind_param('ssssssssssssi', $title, $description, $cover, $price, $author, $ibsn, $publication, $dimensions, $publisher, $weight, $color, $genres, $id);
    $stmt->execute();
    $stmt->close();
    closeConnection($conn);
}
function deleteBook($id)
{
    $conn = openConnection();
    $stmt = $conn->prepare('DELETE FROM books WHERE book_id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    closeConnection($conn);
}
