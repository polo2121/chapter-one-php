<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$time = time();
session_start();
require_once('../sessionConfig.php');
$token = bin2hex(random_bytes(35));
$_SESSION['csrf_token'] = $token;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Page</title>

    <!-- Link for two fonts used in the website -->
    <link href="https://api.fontshare.com/v2/css?f[]=erode@700,300,500,600,400&f[]=recia@700,500,600,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/global.css?<?php echo $time ?>">
    <link rel="stylesheet" href="../assets/css/products.css?<?php echo $time ?>">
    <link rel="stylesheet" href="../assets/css/animation.css?<?php echo $time ?>">
</head>

<body>

    <!-- Header -->
    <?php
    require_once('./header.php');
    // decryptId();
    ?>

    <!-- Main -->
    <main>
        <?php var_dump($_SESSION); ?>
        <!-- Introduction Section -->
        <section class="intro-card">
            <img class="plant" src="../assets/images/plants.svg" alt="plant svg">
            <div class="intro-text">
                <span>Explore limitless books and start your journey.</span>
                <p> With our vast collection of millions of books, delve into a world of
                    imagination and find your next captivating read!
                </p>
            </div>
            <img class="girl-on-book" src="../assets/images/girl on book.svg" alt="girls on book svg">

        </section>

        <!-- Products Section -->
        <section class="product-section">
            <!-- Title -->
            <div class="heading">
                <h2>All Genres</h2>
            </div>

            <!-- Products -->
            <div class="products-wrapper">
                <div class="product">
                    <a class="view-detail-btn" href="./product-details.php">
                        <button class="btn-style-2">
                            View Detail
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 12H8M16 12C16 11.2998 14.0057 9.99153 13.5 9.5M16 12C16 12.7002 14.0057 14.0085 13.5 14.5" stroke="#0F2F60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21.5 12C21.5 7.52166 21.5 5.28249 20.1088 3.89124C18.7175 2.5 16.4783 2.5 12 2.5C7.5217 2.5 5.2825 2.5 3.8912 3.89124C2.5 5.28249 2.5 7.52166 2.5 12C2.5 16.4783 2.5 18.7175 3.8912 20.1088C5.2825 21.5 7.5217 21.5 12 21.5C16.4783 21.5 18.7175 21.5 20.1088 20.1088C21.5 18.7175 21.5 16.4783 21.5 12Z" stroke="#0F2F60" stroke-width="1.5" />
                            </svg>
                        </button>
                    </a>
                    <div class="background">
                        <!-- 3d Book -->
                        <div class="book-style-2 book">
                            <div class="book-cover">
                                <img width="100%" height="100%" src="../assets/images/atomic_habits.jpeg" alt="">
                            </div>

                            <div class="book-middle">
                                <div class="white-pages"></div>
                            </div>
                            <img class="shadow" src="../assets/images/book shadow.svg" alt="book shadow">
                        </div>
                    </div>
                    <div class="details dpr">
                        <span class="price">£18.99</span>
                        <img width="100px" class="rating" src="../assets/images/4-review.svg" alt="">
                    </div>

                    <div class="details dna">
                        <a class="name" href="">
                            <span>
                                Atomic Habits
                            </span>
                        </a>
                        <div class="action add-item">
                            <form action="../controllers/addToCartController.php" method="post">
                                <input type="hidden" name="book-id" value=<?php echo 1; ?>>
                                <input type="hidden" name="token" value="<?php echo $token ?>">
                                <button type="submit">Add</button>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="product">
                    <a class="view-detail-btn" href="./product-details.php">
                        <button class="btn-style-2">
                            View Detail
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 12H8M16 12C16 11.2998 14.0057 9.99153 13.5 9.5M16 12C16 12.7002 14.0057 14.0085 13.5 14.5" stroke="#0F2F60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21.5 12C21.5 7.52166 21.5 5.28249 20.1088 3.89124C18.7175 2.5 16.4783 2.5 12 2.5C7.5217 2.5 5.2825 2.5 3.8912 3.89124C2.5 5.28249 2.5 7.52166 2.5 12C2.5 16.4783 2.5 18.7175 3.8912 20.1088C5.2825 21.5 7.5217 21.5 12 21.5C16.4783 21.5 18.7175 21.5 20.1088 20.1088C21.5 18.7175 21.5 16.4783 21.5 12Z" stroke="#0F2F60" stroke-width="1.5" />
                            </svg>
                        </button>
                    </a>
                    <div class="background">
                        <!-- 3d Book -->
                        <div class="book-style-2 book">
                            <div class="book-cover">
                                <img width="100%" height="100%" src="./assets/images/ikigai.jpg" alt="">
                            </div>

                            <div class="book-middle">
                                <div class="white-pages"></div>
                            </div>
                            <img class="shadow" src="./assets/images/book shadow.svg" alt="book shadow">
                        </div>
                    </div>
                    <div class="details dpr">
                        <span class="price">£10.59</span>
                        <img width="100px" class="rating" src="./assets/images/4-review.svg" alt="review">
                    </div>

                    <div class="details dna">
                        <a class="name" href="./product-details.html">
                            <span>
                                Ikigai: The Japanese Scret
                                to Long and Happy life
                            </span>
                        </a>
                        <div class="action">
                            <form action="../controllers/addToCartController.php" method="post">
                                <input type="hidden" name="book-id" value=<?php echo 2 ?>>
                                <input type="hidden" name="token" value="<?php echo $token ?>">
                                <button type="submit">Add</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </section>

        <?php require_once('../views/add-to-cart.php'); ?>

        <?php if (isset($_SESSION['registration_success'])) { ?>
            <p class="alert-box success fade-away">
                <img width="20px" src="../assets/images/alert-success.svg" alt="thumbs up svg">
                <?php echo $_SESSION['registration_success'] ?>
            </p>
        <?php } ?>

    </main>

    <!-- Footer -->
    <footer>
    </footer>
    <?php
    unset($_SESSION['registration_success']);
    ?>
    <script src="./js/nav-toggle.js"></script>

</body>


</html>