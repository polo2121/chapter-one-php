<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../models/bookModel.php');
require_once('../models/userModel.php');
require_once('../models/OrderListModel.php');
require_once('../controllers/cipherController.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();
    if (isset($_POST['insert'])) {
        try {
            $title  = htmlspecialchars($_POST['title']);
            $cover = htmlspecialchars($_POST['cover']);
            $price = htmlspecialchars($_POST['price']);
            $author = htmlspecialchars($_POST['author']);
            $ibsn = htmlspecialchars($_POST['ibsn']);
            $publication = htmlspecialchars($_POST['publication']);
            $dimensions = htmlspecialchars($_POST['dimensions']);
            $publisher = htmlspecialchars($_POST['publisher']);
            $weight = htmlspecialchars($_POST['weight']);
            $color = htmlspecialchars($_POST['background-color']);
            $description = htmlspecialchars($_POST['description']);
            $genres = htmlspecialchars($_POST['genres']);

            insertBook($title, $cover, $price, $author, $ibsn, $publication, $dimensions, $publisher, $weight, $color, $description, $genres);
            $_SESSION['insert_success'] = "The book is successfully inserted to the database.";
            header('Location: ../views/admin.php');
        } catch (\Throwable $th) {
            var_dump($th);
            $_SESSION['insert_error'] = "Cannot insert the book to the database.";
            header('Location: ../views/admin.php');
        }
    }

    if (isset($_POST['update'])) {
        try {

            $bookId = htmlspecialchars($_POST['book-id']);
            $bookId = decryptId($bookId);

            $title  = htmlspecialchars($_POST['title']);
            $cover = htmlspecialchars($_POST['cover']);
            $price = htmlspecialchars($_POST['price']);
            $author = htmlspecialchars($_POST['author']);
            $ibsn = htmlspecialchars($_POST['ibsn']);
            $publication = htmlspecialchars($_POST['publication']);
            $dimensions = htmlspecialchars($_POST['dimensions']);
            $publisher = htmlspecialchars($_POST['publisher']);
            $weight = htmlspecialchars($_POST['weight']);
            $color = htmlspecialchars($_POST['background-color']);
            $description = htmlspecialchars($_POST['description']);
            $genres = htmlspecialchars($_POST['genres']);

            updateBook($bookId, $title, $description, $cover, $price, $author, $ibsn, $publication, $dimensions, $publisher, $weight, $color, $genres);
            $_SESSION['update_success'] = "The book is successfully updated to the database.";
            header('Location: ../views/admin.php');
        } catch (\Throwable $th) {
            var_dump($th);
            $_SESSION['update_error'] = "Cannot update the book to the database.";
            header('Location: ../views/admin.php');
        }
    }

    if (isset($_POST['delete'])) {
        try {
            $bookId = htmlspecialchars($_POST['book-id']);
            $bookId = decryptId($bookId);

            deleteBook($bookId);
            $_SESSION['delete_success'] = "The book is successfully deleted to the database.";
            header('Location: ../views/admin.php');
        } catch (\Throwable $th) {
            var_dump($th);
            $_SESSION['delete_error'] = "Cannot delete the book in the database.";
            header('Location: ../views/admin.php');
        }
    }
}

$bookDetails = booksList();
$orderList = getOrderList();
