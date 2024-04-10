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
        if ($data['type'] === "cart") {
            getCartItems();
        }
    } catch (\Throwable $th) {
        $errorData = array(
            'error' => true,
            'user-message' => 'An error occurred. Please try again later.',
            'real-message' =>  $th->getMessage(),
        );
        echo json_encode($errorData);
    }
}

function addItemToCart($data)
{
    // prevent inserting malicious code
    $validatedId = htmlspecialchars($data['bookId']);

    // since the provided Id is encrypted, it need to be decrypted to get actual Id
    $decryptedId = decryptId($validatedId);

    // check if there is cart in session and book id from the request
    if (!isset($_SESSION['cart'][$validatedId])) {
        // use decrypted Id to restore real Book Id back so that book details can be retrieved.
        $result = getBookById($decryptedId);

        $response = [];
        if ($result->num_rows > 0) {
            foreach ($result as $row) {
                $_SESSION['cart'][$validatedId] = $row;
                $_SESSION['cart'][$validatedId]['book_id'] = $validatedId;
                $_SESSION['cart'][$validatedId]['quantity'] = 1;
            }
            $response['data'] = $_SESSION['cart'];
            $response['error'] = false;
            echo json_encode($response);
        } else {
            $response['error'] = true;
            $response['message'] = 'There is no record founded in the database.';
            echo json_encode($response);
        }
    } else {
        $response['error'] = false;
        $response['message'] = 'Something went wrong.';
        echo json_encode($response);
    }
}
function getCartItems()
{
    // check if there is cart in session 
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if (count($_SESSION['cart']) === 0) {
        $response['items']  = 0;
        echo json_encode($response);
    } else {
        $response['items']  = $_SESSION['cart'];
        echo json_encode($response);
    }
}
// to get json data (book id) from front-end.
// make sure the data is filtered.
// check the book is in the cart
// if not add the book including details + quantity to the $_SESSION['cart'][book_id] = arrray(book detail) and then
// create response['data] and response['error] = false.
// if there is, revoke the increase or decrease quantity function
