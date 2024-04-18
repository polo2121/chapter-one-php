<?php

require_once('../models/addreesModel.php');

if (!isset(($_SESSION['cart'])) || $_SESSION['cart']['total_items'] === 0 || count($_SESSION['cart']['items']) === 0) {
    $_SESSION['checkout_error'] = "There is no item the in the cart.";
    header('Location: ../views/' . $_SESSION['path'] . '.php');
} else

if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
    header('Location: ./login.php');
}
$deliveryAddress = getDeliveryAddress($_SESSION['user']['id']);
