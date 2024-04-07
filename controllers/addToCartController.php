<?php

require_once('../models/cartModel.php');
require_once('../controllers/csrfController.php');
require_once('../controllers/cipherController.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = checkReqHasCsrfToken();
    $isCsrfTokenValid = validateCsrfToken($token);
    if ($isCsrfTokenValid) {
        // when book_is is not included in form, return error
        if (!isset($_POST['book-id'])) {
            echo  '<h1>Something went wrong.</h1>';
        }
        $id = htmlspecialchars($_POST['book-id']);
        $results = getBookById($id);
        if ($results->num_rows > 0) {
            foreach ($results as $row) {
                $_SESSION['cart'][encryptId($row['book_id'])] = array('book_title' => $row['book_title'], 'book_description' => $row['book_cover'], 'price' => $row['book_price']);
            }
            header('Location: ../views/products.php');

            // return "Book Added";
        } else {
            return "Fail to add";
        }
    }
}
