<?php
session_start();
require_once('../controllers/checkoutController.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Order Page</title>

    <!-- Link for two fonts used in the website -->
    <link href="https://api.fontshare.com/v2/css?f[]=erode@700,300,500,600,400&f[]=recia@700,500,600,400&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/review-order.css">

</head>

<body>

    <!-- Header -->
    <header class="header-section">
        <input type="hidden" value="Review Order" id="current-page">
    </header>

    <!-- Main -->
    <main>
        <!-- review order section -->
        <section class="review-order">

            <!-- heading -->
            <div class="heading">
                <h3>Review Order</h3>
                <span>Before you pay, please check out all the information.</span>
            </div>

            <!-- delivery address -->
            <div class="manage deli-address">
                <span>Delivery Address</span>
                <?php if (isset($_SESSION['address'])) { ?>
                    <span id="deliver-address">Flat 4</span>
                <?php } ?>
                <a href="./add-delivery-form.php">
                    <button class="link">
                        Add Delivery Instructions
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5 6H5.25C4.65326 6 4.08097 6.23705 3.65901 6.65901C3.23705 7.08097 3 7.65326 3 8.25V18.75C3 19.3467 3.23705 19.919 3.65901 20.341C4.08097 20.7629 4.65326 21 5.25 21H15.75C16.3467 21 16.919 20.7629 17.341 20.341C17.7629 19.919 18 19.3467 18 18.75V10.5M7.5 16.5L21 3M21 3H15.75M21 3V8.25" stroke="#2466CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </a>
                <div class="modal hidden">
                    <span>Add or Change Delivery Adress</span>
                    <span>Flat 2</span>
                </div>

            </div>

            <!-- manage paymnet -->
            <div class="manage payment">
                <span>Manage Payment</span>
                <span id="payment-card">With Visa endign 2044</span>
                <a href="./manage-payment-form.html">
                    <button class="link">
                        Add or Change payment method
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5 6H5.25C4.65326 6 4.08097 6.23705 3.65901 6.65901C3.23705 7.08097 3 7.65326 3 8.25V18.75C3 19.3467 3.23705 19.919 3.65901 20.341C4.08097 20.7629 4.65326 21 5.25 21H15.75C16.3467 21 16.919 20.7629 17.341 20.341C17.7629 19.919 18 19.3467 18 18.75V10.5M7.5 16.5L21 3M21 3H15.75M21 3V8.25" stroke="#2466CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </a>

            </div>

            <!-- books in cart -->
            <div class="manage books-in-cart">
                <span>Books in Cart</span>

                <?php if (count($_SESSION['cart']) > 0 && isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $row) {  ?>
                        <!-- book -->
                        <div class="book">
                            <div class="cover">
                                <img width="80px" src="../assets/images/<?php echo $row['book_cover'] ?>" alt="book-image">
                            </div>
                            <div class="details">
                                <img class="rating" width="80px" src="../assets/images/4-review.svg" alt="4-review svg">
                                <div>
                                    <span class="title">
                                        <?php echo $row['book_title'] ?>
                                    </span>
                                    <span class="amount">
                                        <label><?php echo $row['quantity'] ?></label>
                                    </span>
                                    <span class="price">
                                        £<?php echo $row['book_price'] ?>
                                    </span>
                                </div>
                            </div>

                        </div>
                <?php }
                } ?>



                <!-- total calculation -->
                <div class="total-calculation">
                    <?php if (isset($_SESSION['total_sub'])) {  ?>
                        <!-- sub total -->
                        <div>
                            <span>Subtotal</span>
                            <span>£ <?php echo $_SESSION['total_sub'] ?></span>
                        </div>
                    <?php } ?>

                    <!-- standard shipping -->
                    <div>
                        <span>Standard Shipping</span>
                        <span>£ 20.99</span>
                    </div>
                    <!-- Total Price -->
                    <?php if (isset($_SESSION['total_price'])) {  ?>
                        <div>
                            <span>Total </span>
                            <span>£ <?php echo $_SESSION['total_price'] ?></span>
                        </div>
                    <?php } ?>

                </div>
            </div>

            <div class="manage paynow">
                <button class="">
                    Pay Now
                </button>
                <button>
                    <a href="./products.php">
                        Continue Shopping
                    </a>

                </button>
            </div>

        </section>


    </main>

    <!-- Footer -->


    <script src="./assets/js/nav-toggle.js"></script>
</body>


</html>