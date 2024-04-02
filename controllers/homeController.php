<?php

require_once('../models/bookModel.php');

function getBooksList()
{
    return booksList();
}

function getBookNameAndPrice()
{
    return bookNameAndPrice();
}
