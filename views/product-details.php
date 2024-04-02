<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Page</title>

    <!-- Link for two fonts used in the website -->
    <link href="https://api.fontshare.com/v2/css?f[]=erode@700,300,500,600,400&f[]=recia@700,500,600,400&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/product-details.css">

</head>

<body>

    <?php
    $bookId = $_GET['id'];
    ?>

    <!-- Header -->
    <header class="header-section">
        <input type="hidden" value="Product Details" id="current-page">
    </header>

    <!-- Main -->
    <main>
        <!-- Product Details Section -->
        <section class="product-details">

            <div class="image">
                <img class="main-image" width="100%" height="100%" src="./images/atomic_habits.jpeg" alt="">
                <div class="mobile-image">
                    <!-- 3d Book -->
                    <div class="book-style-2 book">
                        <div class="book-cover">
                            <img width="100%" height="100%" src="./images/atomic_habits.jpeg" alt="">
                        </div>

                        <div class="book-middle">
                            <div class="white-pages"></div>
                        </div>
                        <img class="shadow" src="./images/book shadow.svg" alt="book shadow">
                    </div>
                </div>
            </div>

            <div class="info">
                <div class="price_rating">
                    <span class="price">£10.59</span>
                    <img class="rating" src="./images/4-review.svg" alt="rating svg">
                </div>
                <h4 class="name">Ikigai: The Japanese Secret to a Long and Happy Life</h4>
                <div class="action">
                    <button class="add">Add To Cart</button>
                    <div class="amount">
                        <button class="minus">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 12H4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <p>1</p>
                        <button class="plus">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4V20M20 12H4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
                <a class="back-btn" href="./products.html">
                    <button class="btn-style-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 12H8M16 12C16 11.2998 14.0057 9.99153 13.5 9.5M16 12C16 12.7002 14.0057 14.0085 13.5 14.5" stroke="#0F2F60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M21.5 12C21.5 7.52166 21.5 5.28249 20.1088 3.89124C18.7175 2.5 16.4783 2.5 12 2.5C7.5217 2.5 5.2825 2.5 3.8912 3.89124C2.5 5.28249 2.5 7.52166 2.5 12C2.5 16.4783 2.5 18.7175 3.8912 20.1088C5.2825 21.5 7.5217 21.5 12 21.5C16.4783 21.5 18.7175 21.5 20.1088 20.1088C21.5 18.7175 21.5 16.4783 21.5 12Z" stroke="#0F2F60" stroke-width="1.5" />
                        </svg>

                        Back To Browsing
                    </button>
                </a>
            </div>
        </section>

        <!-- Product Description Section -->
        <section class="description">
            <h4>Descriptions</h4>
            <div>
                <p>
                    A revolutionary system to get 1 per cent better every day. People think when you want to change your
                    life, you need to think big. But world-renowned habits expert James Clear has discovered another
                    way. He knows that real change comes from the compound effect of hundreds of small decisions - doing
                    two push-ups a day, waking up five minutes early, or holding a single short phone call. He calls
                    them atomic habits. In this ground-breaking book, Clears reveals exactly how these minuscule changes
                    can grow into such
                    life-altering outcomes. He uncovers a handful of simple life hacks (the forgotten art of Habit
                    Stacking,the unexpected power of the Two Minute Rule, or the trick to entering the Goldilocks Zone),
                    and delves
                    into cutting-edge psychology and neuroscience to explain why they matter. Along the way, he tells
                    inspiring stories of Olympic gold medalists, leading CEOs, and distinguished scientists who have
                    used the science of tiny habits to stay productive, motivated, and happy. These small changes will
                    have a revolutionary effect on your career, your relationships, and your life.
                </p>
            </div>

        </section>

        <!-- book details -->
        <section class="book-details">
            <h4>Book Details</h4>

            <!-- Detail group  -->
            <div class="detail">
                <div class="info">
                    <div class="icon">
                        <img width="100%" src="./images/author.svg" alt="author icon">
                    </div>
                    <span>
                        <label>Author</label>
                        <p>James Clear</p>
                    </span>
                </div>
                <div class="info">
                    <div class="icon">
                        <img width="80%" src="./images/isbn.svg" alt="author icon">
                    </div>
                    <span>
                        <label>ISBN</label>
                        <p>9781847941831</p>
                    </span>
                </div>
            </div>

            <!-- Detail group  -->
            <div class="detail">
                <div class="info">
                    <div class="icon">
                        <img width="80%" src="./images/publication date.svg" alt="author icon">
                    </div>
                    <span>
                        <label>Publication Date</label>
                        <p>18 Oct 2018</p>
                    </span>
                </div>
                <div class="info">
                    <div class="icon">
                        <img width="100%" src="./images/dimension.svg" alt="author icon">
                    </div>
                    <span>
                        <label>Dimensions</label>
                        <p>234 x 153 x 23 mm</p>
                    </span>
                </div>
            </div>

            <!-- Detail group  -->
            <div class="detail">
                <div class="info">
                    <div class="icon">
                        <img width="100%" src="./images/publisher.svg" alt="author icon">
                    </div>
                    <span>
                        <label>Publisher</label>
                        <p>Cornerstone</p>
                    </span>
                </div>
                <div class="info">
                    <div class="icon">
                        <img width="90%" src="./images/kg.svg" alt="author icon">
                    </div>
                    <span>
                        <label>Weight</label>
                        <p>390g</p>
                    </span>
                </div>
            </div>
        </section>

        <!-- Reviews -->
        <section class="reviews">
            <h4>Reviews</h4>
            <div class="card-wrapper">
                <div class="card">
                    <div class="review-book">
                        <img width="120px" src="./images/review book.svg" alt="review book">
                        <p>
                            <label>Review by John</label>
                            <span>04/02/2023</span>
                        </p>
                    </div>
                    <div class="customer-review">
                        <img width="90px" src="./images/4-review.svg" alt="4-stars-review svg">
                        <p>Great Book</p>
                        <p>Interesting way to live with habits. 100% recommend to anyone who want to
                            improve quality of life.</p>
                    </div>
                </div>
            </div>

        </section>
    </main>

    <!-- Footer -->
    <footer>
    </footer>

    <script src="./js/header.js"></script>
    <script src="./js/footer.js"></script>
    <script src="./js/nav-toggle.js"></script>

</body>


</html>