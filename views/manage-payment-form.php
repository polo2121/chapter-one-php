<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$time = time();
session_start();
require_once('../sessionConfig.php');

if (!isset($_SESSION['user'])) {
    $_SESSION['login'] = "Please login before proceed to go further.";
    header('Location: ../views/login.php');
    exit;
}
// check there is items in the cart, if there is no item show error message.
if (!isset(($_SESSION['cart'])) || $_SESSION['cart']['total_items'] === 0 || count($_SESSION['cart']['items']) === 0) {
    echo "SESSION is not here. <br>";
    $_SESSION['checkout_error'] = "There is no item the in the cart.";
    header('Location: ../views/' . $_SESSION['path'] . '.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paymaent Page</title>

    <!-- Link for two fonts used in the website -->
    <link href="https://api.fontshare.com/v2/css?f[]=erode@700,300,500,600,400&f[]=recia@700,500,600,400&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/form.css?<?php echo time() ?>">


</head>

<body>

    <!-- Header -->
    <header class="header-section">
        <input type="hidden" value="Manage Payment" id="current-page">
    </header>

    <!-- Main -->
    <main>
        <?php var_dump($_SESSION); ?>
        <!-- review order section -->
        <section class="review-order">
            <form class="login-form payment-form" action="../controllers/paymentController.php" method="post">
                <h2>Manage Payment</h2>
                <?php if (isset($_SESSION['payment_error'])) { ?>
                    <p class="login-error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#7f3939" fill="none">
                            <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <?php echo $_SESSION['payment_error'] ?>
                    </p>
                <?php } ?>

                <div class="input-wrapper">
                    <!-- Card Number -->
                    <div class="input-group">
                        <div>
                            <label for="card-num">Card Number</label>
                        </div>
                        <input name="card-num" id="card-num" type="number" required>
                    </div>

                    <!-- Expired Date -->
                    <div class="input-group">
                        <div>
                            <label for="expired-date">Expired Date</label>
                        </div>
                        <input name="expired-date" id="expired-date" type="month" required>
                    </div>

                    <!-- Security Code -->
                    <div class="input-group">
                        <div>
                            <label for="security-code">Security Code</label>
                        </div>
                        <div class="security">
                            <input name="security-code-first" type="number" required>
                            <span>/</span>
                            <input name="security-code-second" type="number" required>
                        </div>
                    </div>

                    <!-- Name on Card -->
                    <div class="input-group">
                        <div>
                            <label for="name-on-card">Name on Card</label>
                        </div>
                        <input name="name-on-card" id="name-on-card" type="text" required>
                    </div>

                    <button type="submit" name="payment">
                        Add Payment Now
                    </button>
                    <a class="link" href="./review-order.php">
                        Back to review order
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5 6H5.25C4.65326 6 4.08097 6.23705 3.65901 6.65901C3.23705 7.08097 3 7.65326 3 8.25V18.75C3 19.3467 3.23705 19.919 3.65901 20.341C4.08097 20.7629 4.65326 21 5.25 21H15.75C16.3467 21 16.919 20.7629 17.341 20.341C17.7629 19.919 18 19.3467 18 18.75V10.5M7.5 16.5L21 3M21 3H15.75M21 3V8.25" stroke="#2466CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </a>
                </div>
            </form>
        </section>
        <?php
        unset($_SESSION['payment_error']);
        ?>
    </main>


    <!-- Footer -->


    <script src="./js/header.js"></script>
    <script src="./js/footer.js"></script>
    <script src="./js/nav-toggle.js"></script>
</body>


</html>