<?php

require_once('../models/cartModel.php');
require_once('../controllers/csrfController.php');
require_once('../controllers/cipherController.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    header('Content-Type: application/json');
    try {

        // get the data embbed in the request of body.
        $requestBody = file_get_contents('php://input', true);

        // decode the data to turn into actual JSON
        $data = json_decode($requestBody, true);

        if ($data['type'] === "add") {
            addItemToCart($data);
        }
        if ($data['type'] === "get") {
            getCartItems();
        }
        if ($data['type'] === 'increase') {
            increaseQuantity($data);
        }
        if ($data['type'] === "decrease") {
            decreaseQuantity($data);
        }
    } catch (\Throwable $th) {
        $errorData = array(
            'error' => true,
            'message' => 'An error occurred. Please try again later.' . $th,
        );
        echo json_encode($errorData);
    }
}
function getCartItems()
{
    try {
        // check if there is cart in session 
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart']['total_items']  = 0;
        }
        $response['cart']  = $_SESSION['cart'];

        $response['error'] = false;
        echo json_encode($response);
    } catch (\Throwable $th) {
        $response['error'] = true;
        $response['message'] = 'Something went wrong.';
    }
}

function addItemToCart($data)
{
    // prevent inserting malicious code
    $validatedId = htmlspecialchars($data['bookId']);
    $quantity = htmlspecialchars($data['quantity']);


    // since the provided Id is encrypted, it need to be decrypted to get actual Id
    $decryptedId = decryptId($validatedId);

    // check if there is cart in session and book id from the request
    if (!isset($_SESSION['cart']['items'][$validatedId])) {

        // use decrypted Id to restore real Book Id back so that book details can be retrieved.
        $result = getBookById($decryptedId);
        $response = [];
        if ($result->num_rows > 0) {
            foreach ($result as $row) {
                $_SESSION['cart']['items'][$validatedId] = $row;
                $_SESSION['cart']['items'][$validatedId]['book_id'] = $validatedId;
                $_SESSION['cart']['items'][$validatedId]['book_title'] = ucwords($row['book_title']);
                $_SESSION['cart']['items'][$validatedId]['quantity'] = $quantity;
                $_SESSION['cart']['total_items'] += $quantity;
            }
            $response['cart'] = $_SESSION['cart'];
            $response['error'] = false;
        } else {
            $response['error'] = true;
            $response['message'] = 'Cannot find the book in the database.';
        }
    } else {
        $response['error'] = true;
        $response['message'] = 'The item is already in the cart.';
    }
    echo json_encode($response);
}

function increaseQuantity($data)
{
    // prevent inserting malicious code
    $validatedId = htmlspecialchars($data['bookId']);

    // $quantity = htmlspecialchars($data['quantity']);
    if (isset($_SESSION['cart']['items'][$validatedId])) {

        $quantity = $_SESSION['cart']['items'][$validatedId]['quantity'] + 1;


        if ($quantity < 11) {
            $_SESSION['cart']['items'][$validatedId]['quantity'] = $quantity;
            $_SESSION['cart']['total_items'] = 0;
            foreach ($_SESSION['cart']['items'] as $item) {
                $_SESSION['cart']['total_items'] += $item['quantity'];
            }
        }
        $response['error'] = false;
        $response['cart'] = $_SESSION['cart'];
    } else {
        $response['error'] = true;
        $response['message'] = 'Item not found in the cart.';
    }
    echo json_encode($response);
}

function decreaseQuantity($data)
{
    // prevent inserting malicious code
    $validatedId = htmlspecialchars($data['bookId']);

    // $quantity = htmlspecialchars($data['quantity']);
    if (isset($_SESSION['cart']['items'][$validatedId])) {

        $quantity = $_SESSION['cart']['items'][$validatedId]['quantity'] - 1;

        // when quantity hit 0....
        if ($quantity === 0) {
            unset($_SESSION['cart']['items'][$validatedId]);
        }
        if ($quantity !== 0) {
            $_SESSION['cart']['items'][$validatedId]['quantity'] = $quantity;
            $response['error'] = false;
        }

        $_SESSION['cart']['total_items'] = 0;
        foreach ($_SESSION['cart']['items'] as $item) {
            $_SESSION['cart']['total_items'] += $item['quantity'];
        }
        // when there is no data left in the cart...
        if (empty($_SESSION['cart']['items'])) {
            $_SESSION['cart']['total_items'] = 0;
        }
        $response['cart'] = $_SESSION['cart'];
    } else {
        $response['error'] = true;
        $response['message'] = 'Item not found in the cart.';
    }
    echo json_encode($response);
}

// to get json data (book id) from front-end.
// make sure the data is filtered.
// check the book is in the cart
// if not add the book including details + quantity to the $_SESSION['cart'][book_id] = arrray(book detail) and then
// create response['data] and response['error] = false.
// if there is, revoke the increase or decrease quantity function
