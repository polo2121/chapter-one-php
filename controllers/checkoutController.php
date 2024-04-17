<?php

require_once('../models/cartModel.php');
require_once('../controllers/csrfController.php');
require_once('../controllers/cipherController.php');

if (!isset(($_SESSION['cart'])) || $_SESSION['cart']['total_items'] === 0 || count($_SESSION['cart']['items']) === 0) {
    echo "SESSION is not here. <br>";
    $_SESSION['checkout_error'] = "There is no item the in the cart.";
    header('Location: ../views/' . $_SESSION['path'] . '.php');
} else {
    if (!isset($_SESSION['user'])) {
        $_SESSION['login'] = "Please login before proceed to checkout.";
        header('Location: ../views/login.php');
    }
    // sub price + standard shippign = total price
    $totalSub = calculateTotalSubPrice();
    $totalPrice = number_format($totalSub + 19.99, 2);
    $_SESSION['total_sub'] = $totalSub;
    $_SESSION['total_price'] = $totalPrice;
}

function calculateTotalSubPrice()
{
    $totalSub = 0;
    if (count($_SESSION['cart']['items']) > 0) {
        foreach ($_SESSION['cart']['items'] as $item) {
            $totalSub = number_format($totalSub + intval($item['book_price']), 2);
        }
    }
    return $totalSub;
}
