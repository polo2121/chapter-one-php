<?php

require_once('../models/OrderListModel.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();
    if (!isset(($_SESSION['cart'])) || $_SESSION['cart']['total_items'] === 0 || count($_SESSION['cart']['items']) === 0) {
        $_SESSION['checkout_error'] = "There is no item the in the cart.";
        header('Location: ../views/' . $_SESSION['path'] . '.php');
    }

    if (!isset($_SESSION['user'])) {
        $_SESSION['login_error'] = "Please login first.";
        header('Location: ./login.php');
        exit;
    }

    if (isset($_POST['pay'])) {
        echo "Hello";
        createOrder($_SESSION['user']['id']);
        header('Location: ../views/order-success.php');
    }
}
