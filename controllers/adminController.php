<?php


require_once('../models/bookModel.php');
require_once('../models/userModel.php');
require_once('../models/OrderListModel.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['insert'])) {
        session_start();
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

        try {
            insertBook($title, $cover, $price, $author, $ibsn, $publication, $dimensions, $publisher, $weight, $color, $description, $genres);
            $_SESSION['inert_success'] = "The book is successfully inserted to teh database.";
            echo "sunnces";
            // header('Location: ../views/admin.php');
        } catch (\Throwable $th) {
            $_SESSION['insert_error'] = "Cannot insert the book to the database.";
            echo 'no';
            // header('Location: ../views/admin.php');
        }

        echo "success";
    }
}

$bookDetails = booksList();
