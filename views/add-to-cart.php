<!-- shopping cart section -->
<div class="cart" id="open-cart-btn">
    <button>
        <img src="../assets/images/book_cart.svg" alt="cart svg">
    </button>
    <span class="hidden">
        <p>1</p>
    </span>
</div>

<!-- shopping cart panel section -->
<div class="cart-section" id="cart">
    <div class="cart-panel-wrapper">
        <div class="heading">
            <h4>My Cart</h4>
            <svg id="close-cart-btn" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.625 1.375L1.375 11.6243M11.625 11.625L1.375 1.37567" stroke="#0F2F60" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
        <div class="cart-books-wrapper">
            <!-- empty cart -->
            <div class="empty-cart hidden">
                <img src="../assets/images/empty_cart_icon.svg" alt="empty-cart-icon">
                <p>The cart is empty.</p>
            </div>
            <!-- cart book -->
            <div class="cart-book">
                <div class="image">
                    <img width="80px" src="./images/ikigai.jpg" alt="">
                </div>
                <div class="info">
                    <div class="rating">
                        <img src="../assets/images/4-review.svg" alt="4-review image">
                        <a class="remove">Remove</a>
                    </div>
                    <span class="title">
                        Ikigai: The Japanese secret to
                        a long and happy life
                    </span>
                    <div class="price_amount">
                        <span class="price">$21.99</span>
                        <div class="amount">
                            <button class="minus">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 12H4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <span>1</span>
                            <button class="plus">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 4V20M20 12H4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="subtotal">
            <span>Subtotal</span>
            <span>$29.91</span>
        </div>
        <a class="checkout" href="./review-order.html">
            <button class="btn-style-1">
                Checkout Now
            </button>
        </a>

    </div>
</div>

<script src="../assets/js/add-to-cart.js?<?php echo $time ?>"></script>