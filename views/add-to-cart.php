<!-- shopping cart section -->
<div class="cart" id="open-cart-btn" id="cart-trigger-btn">
    <button>
        <img src="../assets/images/book_cart.svg" alt="cart svg">
    </button>
    <span class="hidden">
        <p>1</p>
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
        </div>
    </div>
</div>

<script src="../assets/js/add-to-cart.js?<?php echo $time ?>"></script>