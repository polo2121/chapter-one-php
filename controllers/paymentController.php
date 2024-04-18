<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

if (!isset(($_SESSION['cart'])) || $_SESSION['cart']['total_items'] === 0 || count($_SESSION['cart']['items']) === 0) {
    $_SESSION['checkout_error'] = "There is no item the in the cart.";
    header('Location: ../views/' . $_SESSION['path'] . '.php');
}

if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
    header('Location: ../views/login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['card-num']) && isset($_POST['expired-date']) && isset($_POST['name-on-card'])) {
        $_SESSION['payment_card']['number'] = substr(htmlspecialchars($_POST['card-num']), -4);
        $_SESSION['payment_card']['expired_date'] = htmlspecialchars($_POST['expired-date']);
        $_SESSION['payment_card']['name'] = htmlspecialchars($_POST['name-on-card']);
        header('Location: ../views/review-order.php');
    } else {
        $_SESSION['payment_error'] = "Please fill all the information.";
    }
}
