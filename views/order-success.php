<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$time = time();
session_start();
require_once('../sessionConfig.php');
require_once('../controllers/cipherController.php');

if (!isset(($_SESSION['cart'])) || $_SESSION['cart']['total_items'] === 0 || count($_SESSION['cart']['items']) === 0) {
    $_SESSION['checkout_error'] = "There is no item the in the cart.";
    header('Location: ../views/login.php');
}
if (!isset($_SESSION['user'])) {
    $_SESSION['login_error'] = "Please login first.";
    header('Location: ./login.php');
    exit;
}
unset($_SESSION['cart']);
unset($_SESSION['total_sub']);
unset($_SESSION['total_price']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success Page</title>

    <!-- Link for two fonts used in the website -->
    <link href="https://api.fontshare.com/v2/css?f[]=erode@700,300,500,600,400&f[]=recia@700,500,600,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/global.css?<?php echo $time ?>">
    <link rel="stylesheet" href="../assets/css/order-success.css?<?php echo $time ?>">

</head>

<body>

    <!-- Header -->
    <?php
    require_once('./header.php');
    ?>

    <!-- Main -->
    <main>
        <?php var_dump($_SESSION); ?>
        <section>
            <h2>Thank your<br>for your order.</h2>
            <p>We will deliver the order to you as soon as possible.</p>
            <img width="220px" src="../assets/images/order-success.jpg" alt="order-success-image">
            <a href="./products.php">
                Continue Shopping
            </a>
        </section>
    </main>

    <!-- Footer -->

    <?php

    ?>
    <script src="./js/nav-toggle.js"></script>

</body>


</html>