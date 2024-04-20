<?php

require_once('../models/bookModel.php');
require_once('../controllers/cipherController.php');


function getBooksList()
{
    $result = booksList();
    $data = array();
    foreach ($result as $row) {
        $row['book_id'] = encryptId($row['book_id']);
        $row['book_title'] = ucwords($row['book_title']);

        array_push($data, $row);
    }
    return $data;
}

function getBooksListByGenres($genres)
{
    $result = booksListWithGenres($genres);
    return $result;
}

function getBookNameAndPrice()
{
    return bookNameAndPrice();
}
function bookDetailsById($id)
{

    $bookDetails = getBookById(decryptId($id));
    return $bookDetails;
}

function validateBookId($id)
{
    $results = getBookById(decryptId($id));
    if ($results->num_rows > 0) {
        return true;
    }
    return false;
}
