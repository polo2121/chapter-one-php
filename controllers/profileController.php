<?php

require_once('../models/userModel.php');
require_once('../models/addressModel.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    if (isset($_POST['logout'])) {
        session_unset();
        header('Location: ../views/login.php');
        exit;
    }
}

$userId = htmlspecialchars($_SESSION['user']['id']);
$user = getUserListById($userId);
$deliverAddress = getDeliveryAddress($userId);
