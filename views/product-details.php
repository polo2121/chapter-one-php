<?php

$time = time();
session_start();
require_once('../sessionConfig.php');
require_once('../controllers/homeController.php');

// check id was sent through URL...
if (!isset($_GET['id'])) {
    $_SESSION['product_detail_error'] = "The book is not found.";
    header('Location: ../views/' . $_SESSION['path'] . '.php');
}
$query = parse_url($_SERVER['REQUEST_URI'])['query'];
$id = substr($query, 3);

$bookId = htmlspecialchars($id);

// check the given id is valid and existed in the database or not....
$isBookExisted = validateBookId($bookId);
if (!$isBookExisted) {
    $_SESSION['product_detail_error'] = "The book is not found.";
    header('Location: ../views/' . $_SESSION['path'] . '.php');
    exit;
}

$_SESSION['path'] = 'product-details';
// retrieve book's name and price from controller
$bookDetails = bookDetailsById($bookId);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Page</title>

    <!-- Link for two fonts used in the website -->
    <link href="https://api.fontshare.com/v2/css?f[]=erode@700,300,500,600,400&f[]=recia@700,500,600,400&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/product-details.css?<?php echo $time; ?>">
    <link rel="stylesheet" href="../assets/css/animation.css">


</head>

<body>
    <!-- Header -->
    <?php
    require_once('./header.php');
    ?>

    <!-- Main -->
    <main>
        <?php if ($bookDetails->num_rows > 0) {
            foreach ($bookDetails as $row) {
        ?>
                <!-- Product Details Section -->
                <section class="product-details" style="background-color: <?php echo $row['background_color'] ?>;">
                    <div class="image">
                        <img class="main-image" width="100%" height="100%" src="../assets/images/<?php echo $row['book_cover'] ?>" alt="book-cover-image">
                        <div class="mobile-image">
                            <!-- 3d Book -->
                            <div class="book-style-2 book">
                                <div class="book-cover">
                                    <img width="100%" height="100%" src="../assets/images/<?php echo $row['book_cover'] ?>" alt="book-cover-image">
                                </div>

                                <div class="book-middle">
                                    <div class="white-pages"></div>
                                </div>
                                <img class="shadow" src="../assets/images/book shadow.svg" alt="book-shadow-image">
                            </div>
                        </div>
                    </div>

                    <div class="info">
                        <div class="price_rating">
                            <span class="price">£<?php echo $row['book_price']; ?></span>
                            <img class="rating" src="../assets/images/4-review.svg" alt="rating-svg">
                        </div>
                        <h4 class="name"><?php echo ucfirst($row['book_title']); ?></h4>


                        <div class="action">
                            <input type="hidden" name="book" value=<?php echo $bookId ?>>
                            <button class="add add-item">Add To Cart</button>
                            <span></span>

                            <!-- <div class="amount">
                                <button type="submit" class="minus" name="increase-on-detail" onclick="decreaseQuantity('<?php echo $bookId ?>')">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 12H4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <span id="quantity">1</span>
                                <button class="plus" onclick="increaseQuantity('<?php echo $bookId ?>')">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 4V20M20 12H4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div> -->
                        </div>
                        <a class="back-btn" href="./products.php">
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
                            <?php echo $row['book_description']; ?>
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
                                <img width="100%" src="../assets/images/author.svg" alt="author-icon">
                            </div>
                            <span>
                                <label>Author</label>
                                <p><?php echo ucwords($row['book_author']); ?></p>
                            </span>
                        </div>
                        <div class="info">
                            <div class="icon">
                                <img width="80%" src="../assets/images/isbn.svg" alt="isbn-icon">
                            </div>
                            <span>
                                <label>ISBN</label>
                                <p><?php echo $row['book_isbn']; ?></p>
                            </span>
                        </div>
                    </div>

                    <!-- Detail group  -->
                    <div class="detail">
                        <div class="info">
                            <div class="icon">
                                <img width="80%" src="../assets/images/publication date.svg" alt="publication-icon">
                            </div>
                            <span>
                                <label>Publication Date</label>
                                <p><?php echo $row['book_publication']; ?></p>
                            </span>
                        </div>
                        <div class="info">
                            <div class="icon">
                                <img width="100%" src="../assets/images/dimension.svg" alt="dimensions-icon">
                            </div>
                            <span>
                                <label>Dimensions</label>
                                <p><?php echo $row['book_dimensions']; ?></p>
                            </span>
                        </div>
                    </div>

                    <!-- Detail group  -->
                    <div class="detail">
                        <div class="info">
                            <div class="icon">
                                <img width="100%" src="../assets/images/publisher.svg" alt="publisher-icon">
                            </div>
                            <span>
                                <label>Publisher</label>
                                <p><?php echo ucwords($row['book_publisher']) ?></p>
                            </span>
                        </div>
                        <div class="info">
                            <div class="icon">
                                <img width="90%" src="../assets/images/kg.svg" alt="info-icon">
                            </div>
                            <span>
                                <label>Weight</label>
                                <p><?php echo $row['book_weight']; ?></p>
                            </span>
                        </div>
                    </div>
                </section>

        <?php }
        }
        ?>

        <!-- Reviews -->
        <section class="reviews">
            <h4>Reviews</h4>
            <div class="card-wrapper">
                <div class="card">
                    <div class="review-book">
                        <img width="120px" src="../assets/images/review book.svg" alt="review-book-image">
                        <p>
                            <label>Review by John</label>
                            <span>04/02/2023</span>
                        </p>
                    </div>
                    <div class="customer-review">
                        <img width="90px" src="../assets/images/4-review.svg" alt="4-stars-review-svg">
                        <p>Great Book</p>
                        <p>Interesting way to live with habits. 100% recommend to anyone who want to
                            improve quality of life.</p>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <?php require_once('../views/add-to-cart.php'); ?>

    <!-- Footer -->
    <?php require_once('./footer.php'); ?>

    <script src="../assets/js/nav-toggle.js"></script>

</body>


</html>