<?php

require_once('../models/dbConnection.php');

function getBookById($id)
{
    $conn = openConnection();
    $stmt = $conn->prepare('SELECT * FROM books WHERE book_id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results = $stmt->get_result();
    closeConnection($conn);
    return $results;
}
