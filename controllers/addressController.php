<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../sessionConfig.php');
require_once('../models/dbConnection.php');
require_once('../models/addreesModel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_SESSION['csrf_token']) || !isset($_POST['token'])) {
        echo "<h1>Something went wrong. CSRF Toke Not Found.</h1>";
        exit;
    }

    if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
        header('Location: ./login.php');
        exit;
    }

    $token = htmlspecialchars($_POST['token']);
    $isCsrfTokenValid = validateCsrfToken($token);

    if ($isCsrfTokenValid && isset($_POST['delivery'])) {

        $inputs = array('address', 'post-code', 'city', 'country', 'ph-num');

        $isPassed = validateInput($inputs);
        if (!$isPassed) {
            $_SESSION['address_error'] =  "Please fill all the information to proceed.";
            header('Location: ../views/' . $_SESSION['path'] . '.php');
            exit;
        }

        $address = htmlspecialchars($_POST['address']);
        $postCode = htmlspecialchars($_POST['post-code']);
        $city = htmlspecialchars($_POST['city']);
        $country = htmlspecialchars($_POST['country']);
        $phNum = htmlspecialchars($_POST['ph-num']);

        try {
            insertAddress($_SESSION['user']['id'], $address, $postCode, $city, $country, $phNum);
            $_SESSION['address_success'] =  "Your delivery address is recorded in the system.";
            header('Location: ../views/review-order.php');
        } catch (\Throwable $th) {
            echo '<h1>Something went wrong.</h1>';
        }
    }
}

function validateCsrfToken($token)
{
    if ($_SESSION['csrf_token'] !== $token) {
        echo "<h1>405 Method Not Allowed.</h1>";
        exit;
    }
    return true;
}
// To make sure inputs are successfully submitted
function validateInput($inputs)
{
    $isPassed = null;
    //check input is empty
    foreach ($inputs as $input) {
        // Deny if input is existed and the value is empty
        if (isset($_POST[$input]) && empty($_POST[$input])) {
            return $isPassed = false;
        }
        // echo $userInputs . '<br>';
        return $isPassed = true;
    }
}
