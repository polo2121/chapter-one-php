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

function getBookNameAndPrice()
{
    return bookNameAndPrice();
}

getBooksList();
