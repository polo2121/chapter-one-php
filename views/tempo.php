            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) === 0) { ?>
                <!-- empty cart -->
                <div class="empty-cart">
                    <img src="../assets/images/empty_cart_icon.svg" alt="empty-cart-icon">
                    <p>The cart is empty.</p>
                </div>
            <?php } ?>

            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                <!-- cart book -->
                <div class="cart-book">
                    <div class="image">
                        <img width="80px" src="./images/ikigai.jpg" alt="book-cover-image">
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
            <?php } ?>