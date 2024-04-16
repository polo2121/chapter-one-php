<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>

    <!-- Link for two fonts used in the website -->
    <link href="https://api.fontshare.com/v2/css?f[]=erode@700,300,500,600,400&f[]=recia@700,500,600,400&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="./css/animation.css">



</head>

<body>

    <!-- Header -->
    <header class="header-section">
        <input type="hidden" value="Contact" id="current-page">
    </header>

    <!-- Main -->
    <main>
        <section class="contact-section">
            <form class="login-form contact-form">
                <h2>Get in touch, we'd love to hear from you!</h2>
                <p>
                    Please provide us your email address and we will reach out to
                    you within a couple of minutes.
                </p>
                <div class="input-wrapper">
                    <!-- Email -->
                    <div class="input-group">
                        <div>
                            <img src="./images/email.svg" alt="email icon">
                            <label for="email">Email</label>
                        </div>
                        <input name="email" id="email" type="text" placeholder="e.g. example@gmail.com" required>
                    </div>

                    <button type="submit">
                        Send Now
                    </button>
                    <a class="link" href="./products.html">
                        Back To Browsing
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.5 6H5.25C4.65326 6 4.08097 6.23705 3.65901 6.65901C3.23705 7.08097 3 7.65326 3 8.25V18.75C3 19.3467 3.23705 19.919 3.65901 20.341C4.08097 20.7629 4.65326 21 5.25 21H15.75C16.3467 21 16.919 20.7629 17.341 20.341C17.7629 19.919 18 19.3467 18 18.75V10.5M7.5 16.5L21 3M21 3H15.75M21 3V8.25"
                                stroke="#2466CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </a>
                </div>
                <img id="message" src="./images/message.svg" alt="message image">
                <img id="question-boy" src="./images/question-boy.svg" alt="question-boy image">
                <img id="contact-girl" src="./images/contact-girl.svg" alt="contact-girl image">
            </form>
        </section>
        <!-- shopping cart section -->
        <div class="cart" id="open-cart-btn">
            <button>
                <img src="./images/book_cart.svg" alt="cart svg">
            </button>
            <span class="hidden">
                <p>1</p>
            </span>
        </div>

        <!-- shopping cart panel section -->
        <div class="cart-section" id="cart" style="--cartWidth: 30%">
            <div class="cart-panel-wrapper">
                <div class="heading">
                    <h4>My Cart</h4>
                    <svg id="close-cart-btn" width="13" height="13" viewBox="0 0 13 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.625 1.375L1.375 11.6243M11.625 11.625L1.375 1.37567" stroke="#0F2F60"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="cart-books-wrapper">

                    <!-- empty cart -->
                    <div class="empty-cart hidden">
                        <img src="./images/empty_cart_icon.svg" alt="empty-cart-icon">
                        <p>The cart is empty.</p>
                    </div>
                    <!-- cart book -->
                    <div class="cart-book">
                        <div class="image">
                            <img width="80px" src="./images/ikigai.jpg" alt="">
                        </div>
                        <div class="info">
                            <div class="rating">
                                <img src="./images/4-review.svg" alt="4-review image">
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
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 12H4" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <span>1</span>
                                    <button class="plus">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 4V20M20 12H4" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
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
    </main>

    <!-- Footer -->
    <footer>
    </footer>

    <script src="./js/add-to-cart.js"></script>
    <script src="./js/header.js"></script>
    <script src="./js/footer.js"></script>
    <script src="./js/nav-toggle.js"></script>


</body>


</html>