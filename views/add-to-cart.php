<!-- shopping cart section -->
<div class="cart open-cart-btn">
    <button>
        <img src="../assets/images/book_cart.svg" alt="cart svg">
    </button>
    <span class="hidden" id="total-cart-item">
    </span>
</div>

<!-- shopping cart panel section -->
<div class="cart-section" id="the-cart">
    <div class="cart-panel-wrapper">
        <div class="heading">
            <h4>My Cart</h4>
            <svg id="close-cart-btn" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.625 1.375L1.375 11.6243M11.625 11.625L1.375 1.37567" stroke="#0F2F60" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>

        <!-- Cart Items will be inserted via JavaScript -->
        <div class="cart-books-wrapper" id="cart-books-container">
        </div>
        <div id="check-out">
            <div class="subtotal">
                <span>Subtotal</span>
                <span id="total-sub-price">0</span>
            </div>
            <a class="checkout" href="./review-order.php">
                <button class="btn-style-1">
                    Checkout Now
                </button>
            </a>
        </div>
    </div>
</div>

<div id="item-info"></div>

<!-- Alert Section -->
<div id="item-success"></div>
<?php if (isset($_SESSION['checkout_error'])) { ?>
    <p class="alert-box fade-away">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#7f3939" fill="none">
            <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <?php echo $_SESSION['checkout_error'] ?>
    </p>
<?php } ?>
<?php unset($_SESSION['checkout_error']); ?>

<script src="../assets/js/add-to-cart.js?<?php echo $time ?>"></script>