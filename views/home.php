<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$time = time();
session_start();
require_once('../sessionConfig.php');
require_once('../controllers/homeController.php');
$_SESSION['path'] = 'home';

// retrieve book's name and price from controller
$bookDetails = getBooksList();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- Link for two fonts used in the website -->
    <link href="https://api.fontshare.com/v2/css?f[]=erode@700,300,500,600,400&f[]=recia@700,500,600,400&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/animation.css">
    <link rel="stylesheet" href="../assets/css/index.css?<?php echo $time ?>">

</head>

<body>

    <!-- Header -->
    <?php require_once('./header.php');
    var_dump($_SESSION) ?>

    <!-- Main -->
    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div>
                <h1>
                    Start Your Reading </br>
                    Journey from </br>
                    <span class="hightlight hightlight-2">Chapter One</span>
                    <img id="pen" src="../assets/images/pen.svg" alt="pen image">

                </h1>
                <a href="./products.html">
                    <button class="btn-style-3">
                        Explore Now
                        <img src="../assets/images/outlined arrow white.svg" alt="svg">
                    </button>
                </a>
                <div class="book-images">
                    <img id="fantasy" src="../assets/images/back to fantasy.svg" alt="back to fantasy image">
                    <img id="romance" src="../assets/images/romance book.svg" alt="romance book image">
                    <img id="fairy" src="../assets/images/short fairy tale.svg" alt="short fairy tale image">
                    <img id="true" src="../assets/images/behind true story.svg" alt="behind true story image">
                    <img id="coffee" src="../assets/images/coffee cup.svg" alt="coffee cup image">
                </div>
            </div>
        </section>

        <!-- Trending Section -->
        <section class="trending">

            <!-- Heading & Subtitle -->
            <div class="heading">
                <h2 class="title">Trending</h2>
                <p class="subtitle">
                    Quick look at the hottest books that everyone talks about.

                    Explore the jungle of popular books and
                    <span class="hightlight-3">
                        find books that attract you.
                    </span>

                </p>

            </div>

            <!-- Trending Book List -->
            <div class="trending-books-list">

                <!-- Trending Book Card -->
                <div class="tb-cards">
                    <!-- Card Header -->
                    <div class="header">
                        <div class="titles_prices">

                            <!-- Dummy block -->
                            <div class="dummy-block">
                                <a href="#">
                                    <h4>Atomic Habits</h4>
                                </a>
                            </div>

                            <!-- Title and Price List -->
                            <?php
                            if (count($bookDetails) > 0) {
                                foreach ($bookDetails as $row) {
                                    $bookId = decryptId($row['book_id']);
                                    $className = (int)$bookId === 1 ? 'slide-up' : 'slide-down';
                                    echo  '<a class="' . $className . '" href="#" id="tb-title-' . $bookId . '" style="--slideYValue: 60px">';
                                    echo '<h4>' . ucwords($row['book_title']) . '</h4>';
                                    echo '<span>£' . $row['book_price'] . '</span>';
                                    echo '</a>';
                                }
                            }


                            ?>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="body">
                        <!-- Dummy block -->
                        <div class="dummy-block three-line-truncate">
                            Atomic Habits by James Clear is packed with
                            powerful and practical advice on how to form good
                            habits and break bad ones. In the book, Clear outlines....
                        </div>

                        <!-- Book Brief Description List  -->
                        <?php
                        if (count($bookDetails) > 0) {
                            foreach ($bookDetails as $row) {
                                $bookId = decryptId($row['book_id']);
                                $className = (int)$bookId === 1 ? 'slide-up' : 'slide-down';
                                echo '<p class="three-line-truncate ' . $className . '" id="tb-body-' . $bookId . '" style="--slideYValue: 100px">';
                                echo '<a href="./product-details.php/id=' . $bookId . '" id="trending-view-detail-' . $bookId . '">';
                                echo '<button class="btn-style-2">';
                                echo 'View Detail';
                                echo '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16 12H8M16 12C16 11.2998 14.0057 9.99153 13.5 9.5M16 12C16 12.7002 14.0057 14.0085 13.5 14.5" stroke="#0F2F60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M21.5 12C21.5 7.52166 21.5 5.28249 20.1088 3.89124C18.7175 2.5 16.4783 2.5 12 2.5C7.5217 2.5 5.2825 2.5 3.8912 3.89124C2.5 5.28249 2.5 7.52166 2.5 12C2.5 16.4783 2.5 18.7175 3.8912 20.1088C5.2825 21.5 7.5217 21.5 12 21.5C16.4783 21.5 18.7175 21.5 20.1088 20.1088C21.5 18.7175 21.5 16.4783 21.5 12Z" stroke="#0F2F60" stroke-width="1.5" />
                                            </svg>';
                                echo '</button>';
                                echo '</a>';
                                echo  $row['book_description'];
                                echo '</p>';
                            }
                        }
                        ?>
                    </div>
                    <!-- Card Footer -->
                    <div class="footer">
                        <!-- Dummy block -->
                        <div class="dummy-block">
                            <a>
                                <button>Add To Cart</button>
                            </a>

                            <a>
                                <button>
                                    View Detail
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 12H8M16 12C16 11.2998 14.0057 9.99153 13.5 9.5M16 12C16 12.7002 14.0057 14.0085 13.5 14.5" stroke="#1976D2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M21.5 12C21.5 7.52166 21.5 5.28249 20.1088 3.89124C18.7175 2.5 16.4783 2.5 12 2.5C7.5217 2.5 5.2825 2.5 3.8912 3.89124C2.5 5.28249 2.5 7.52166 2.5 12C2.5 16.4783 2.5 18.7175 3.8912 20.1088C5.2825 21.5 7.5217 21.5 12 21.5C16.4783 21.5 18.7175 21.5 20.1088 20.1088C21.5 18.7175 21.5 16.4783 21.5 12Z" stroke="#1976D2" stroke-width="1.5" />
                                    </svg>
                                </button>
                            </a>

                        </div>

                        <!-- CTA Buttons -->
                        <?php
                        if (count($bookDetails) > 0) {
                            foreach ($bookDetails as $row) {
                                $bookId = decryptId($row['book_id']);
                                $className = (int)$bookId === 1 ? 'slide-up' : 'slide-down';
                                echo '<div class="cta-btns ' . $className . '" id="tb-cta-btn-' . $bookId . '" style="--slideYValue: 60px">';
                                echo '<a id="trending-add-btn-' . $bookId . '">';

                                echo '<input type="hidden" name="book" value="' . $row['book_id'] . '" >';
                                echo '<button class="btn-style-1 add-item">Add To Cart</button>';
                                echo '<span></span>';

                                echo '</a>';
                                echo '<a href="./product-details.php/id=' . $bookId . '" id="trending-view-detail-' . $bookId . '">';
                                echo '<button class="btn-style-2">';
                                echo 'View Detail';
                                echo '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 12H8M16 12C16 11.2998 14.0057 9.99153 13.5 9.5M16 12C16 12.7002 14.0057 14.0085 13.5 14.5" stroke="#0F2F60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M21.5 12C21.5 7.52166 21.5 5.28249 20.1088 3.89124C18.7175 2.5 16.4783 2.5 12 2.5C7.5217 2.5 5.2825 2.5 3.8912 3.89124C2.5 5.28249 2.5 7.52166 2.5 12C2.5 16.4783 2.5 18.7175 3.8912 20.1088C5.2825 21.5 7.5217 21.5 12 21.5C16.4783 21.5 18.7175 21.5 20.1088 20.1088C21.5 18.7175 21.5 16.4783 21.5 12Z" stroke="#0F2F60" stroke-width="1.5" />
                                        </svg>';
                                echo '</button>';
                                echo '</a>';
                                echo '</div>';
                            }
                        }
                        ?>

                    </div>

                    <!-- Card Footer -->
                    <div class="control">
                        <button class="arrow" id="trending-previous">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.3333 8L3.99992 8" stroke="#1976D2" stroke-width="2" stroke-linecap="round" />
                                <path d="M7.6665 3.66699L3.61601 7.71748C3.4598 7.87369 3.4598 8.12696 3.61601 8.28317L7.6665 12.3337" stroke="#1976D2" stroke-width="2" stroke-linecap="round" />
                            </svg>

                        </button>
                        <button class="arrow" id="trending-next">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.66675 8L12.0001 8" stroke="#1976D2" stroke-width="2" stroke-linecap="round" />
                                <path d="M8.3335 3.66699L12.384 7.71748C12.5402 7.87369 12.5402 8.12696 12.384 8.28317L8.3335 12.3337" stroke="#1976D2" stroke-width="2" stroke-linecap="round" />
                            </svg>


                        </button>
                    </div>
                </div>

                <!-- Trending Books Slider -->
                <div class="trending-books-slider" id="trending-books-slider">

                    <?php
                    if (count($bookDetails) > 0) {
                        foreach ($bookDetails as $row) {
                            $bookId = decryptId($row['book_id']);
                    ?>
                            <!-- Trending Books Slides -->
                            <div class="trending-books-slide" id="trending-book-<?php echo $bookId ?>">
                                <!-- Book -->
                                <div class="book-style-1 book-rotate">
                                    <div class="bg-circle"></div>

                                    <div class="book-cover">
                                        <img width="100%" height="100%" src="../assets/images/<?php echo $row['book_cover'] ?>" alt="book-cover-image">
                                    </div>

                                    <div class="book-middle">
                                        <div class="white-pages"></div>
                                    </div>
                                </div>
                            </div>
                    <?php  }
                    } ?>
                </div>

            </div>
        </section>

        <!-- Best Selection Section -->
        <section class="best-selection">
            <!-- Heading & Subtitle -->
            <div class="heading">
                <h2 class="title">Best Fiction Books</h2>
                <p class="subtitle-2">
                    Hover the mouse over the wordsfollowed Best to see
                    best books
                    <span class="hightlight-3">
                        categorized by famous genres and.
                    </span>

                </p>
                <div class="control">
                    <button class="arrow" id="previous">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.3333 8L3.99992 8" stroke="#1976D2" stroke-width="2" stroke-linecap="round" />
                            <path d="M7.6665 3.66699L3.61601 7.71748C3.4598 7.87369 3.4598 8.12696 3.61601 8.28317L7.6665 12.3337" stroke="#1976D2" stroke-width="2" stroke-linecap="round" />
                        </svg>

                    </button>
                    <button class="arrow" id="next">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.66675 8L12.0001 8" stroke="#1976D2" stroke-width="2" stroke-linecap="round" />
                            <path d="M8.3335 3.66699L12.384 7.71748C12.5402 7.87369 12.5402 8.12696 12.384 8.28317L8.3335 12.3337" stroke="#1976D2" stroke-width="2" stroke-linecap="round" />
                        </svg>


                    </button>
                </div>
            </div>
            <!-- Slider Wrapper -->
            <div class="bf-slider" id="bestfiction-slider">
                <!-- Best Fiction Slide -->
                <div class="slide">
                    <!-- Book -->
                    <div class="book-style-2">
                        <div class="bg-circle"></div>

                        <div class="book-cover">
                            <img width="100%" height="100%" src="./images/atomic_habits.jpeg" alt="">
                        </div>

                        <div class="book-middle">
                            <div class="white-pages"></div>
                        </div>
                    </div>
                    <div class="book-info">
                        <p>Atomic Habits</p>
                        <span>£17.99</span>
                        <button>Add To Cart</button>
                        <a href="">
                            <button class="btn-style-2">
                                View Detail
                                <img src="../assets/images/link-out.svg" alt="link-out svg">
                            </button>
                        </a>
                    </div>


                </div>

                <div class="slide">
                    <!-- Book -->
                    <div class="book-style-2">
                        <div class="bg-circle"></div>

                        <div class="book-cover">
                            <img width="100%" height="100%" src="./images/psychology.jpg" alt="">
                        </div>

                        <div class="book-middle">
                            <div class="white-pages"></div>
                        </div>
                    </div>
                    <div class="book-info">
                        <p>Psychology of Money</p>
                        <span>£14.99</span>
                        <button>Add To Cart</button>
                        <a href="">
                            <button class="btn-style-2">
                                View Detail
                                <img src="../assets/images/link-out.svg" alt="link-out svg">
                            </button>
                        </a>
                    </div>


                </div>

                <div class="slide">
                    <!-- Book -->
                    <div class="book-style-2">
                        <div class="bg-circle"></div>

                        <div class="book-cover">
                            <img width="100%" height="100%" src="./images/ikigai.jpeg" alt="book-cover image">
                        </div>

                        <div class="book-middle">
                            <div class="white-pages"></div>
                        </div>
                    </div>
                    <div class="book-info">
                        <p>Ikigai: The Japanese secret to a long and happy life</p>
                        <span>£14.99</span>
                        <button>Add To Cart</button>
                        <a href="">
                            <button class="btn-style-2">
                                View Detail
                                <img src="./images/link-out.svg" alt="">
                            </button>
                        </a>
                    </div>
                </div>

                <div class="slide">
                    <!-- Book -->
                    <div class="book-style-2">
                        <div class="bg-circle"></div>

                        <div class="book-cover">
                            <img width="100%" height="100%" src="../assets/images/atomic_habits.jpeg" alt="">
                        </div>

                        <div class="book-middle">
                            <div class="white-pages"></div>
                        </div>
                    </div>
                    <div class="book-info">
                        <p>Atomic Habits</p>
                        <span>£18.99</span>
                        <button>Add To Cart</button>
                        <a href="">
                            <button class="btn-style-2">
                                View Detail
                                <img src="./images/link-out.svg" alt="">
                            </button>
                        </a>
                    </div>


                </div>

                <div class="slide">
                    <!-- Book -->
                    <div class="book-style-2">
                        <div class="bg-circle"></div>

                        <div class="book-cover">
                            <img width="100%" height="100%" src="./images/psychology.jpg" alt="">
                        </div>

                        <div class="book-middle">
                            <div class="white-pages"></div>
                        </div>
                    </div>
                    <div class="book-info">
                        <p>Atomic Habits</p>
                        <span>£18.99</span>
                        <button>Add To Cart</button>
                        <a href="">
                            <button class="btn-style-2">
                                View Detail
                                <img src="./images/link-out.svg" alt="">
                            </button>
                        </a>
                    </div>


                </div>
                <div class="slide">
                    <!-- Book -->
                    <div class="book-style-2">
                        <div class="bg-circle"></div>

                        <div class="book-cover">
                            <img width="100%" height="100%" src="./images/psychology.jpg" alt="">
                        </div>

                        <div class="book-middle">
                            <div class="white-pages"></div>
                        </div>
                    </div>
                    <div class="book-info">
                        <p>Atomic Habits</p>
                        <span>£18.99</span>
                        <button>Add To Cart</button>
                        <a href="">
                            <button class="btn-style-2">
                                View Detail
                                <img src="./images/link-out.svg" alt="">
                            </button>
                        </a>
                    </div>


                </div>
                <div class="slide">
                    <!-- Book -->
                    <div class="book-style-2">
                        <div class="bg-circle"></div>

                        <div class="book-cover">
                            <img width="100%" height="100%" src="./images/psychology.jpg" alt="">
                        </div>

                        <div class="book-middle">
                            <div class="white-pages"></div>
                        </div>
                    </div>
                    <div class="book-info">
                        <p>Atomic Habits</p>
                        <span>£18.99</span>
                        <button>Add To Cart</button>
                        <a href="">
                            <button class="btn-style-2">
                                View Detail
                                <img src="./images/link-out.svg" alt="">
                            </button>
                        </a>
                    </div>


                </div>
                <div class="slide">
                    <!-- Book -->
                    <div class="book-style-2">
                        <div class="bg-circle"></div>

                        <div class="book-cover">
                            <img width="100%" height="100%" src="./images/psychology.jpg" alt="">
                        </div>

                        <div class="book-middle">
                            <div class="white-pages"></div>
                        </div>
                    </div>
                    <div class="book-info">
                        <p>Atomic Habits</p>
                        <span>£18.99</span>
                        <button>Add To Cart</button>
                        <a href="">
                            <button class="btn-style-2">
                                View Detail
                                <img src="./images/link-out.svg" alt="">
                            </button>
                        </a>
                    </div>


                </div>

            </div>

        </section>

        <!-- Favorite Genre -->
        <section class="favorite-genre">
            <div class="book-shelf">
                <img width="100%" src="../assets/images/Book Shelf.svg" alt="book shelf svg">
            </div>
            <div class="popular-genre heading">
                <h2>People's Favorite Genres</h2>
                <p class="subtitle-2">
                    Quick look at the hottest genres for everyone.
                    Explore the jungle of popular books and
                    <span class="hightlight-3">
                        find books that
                        attract you.
                    </span>
                </p>
                <a href="./products.html">
                    <button class="btn-style-3">
                        Explore Now
                        <img src="../assets/images/outlined arrow white.svg" alt="">
                    </button>
                </a>
            </div>

        </section>

        <!-- Review section  -->
        <section class="review">
            <div class="heading">
                <h2 class="title">Lovely Customers' Voice</h2>
                <p class="subtitle-2">
                    Customer’s
                    <span class="hightlight-3">reviews</span>
                    about books they purchased and
                    <span class="hightlight-3">experiences</span>
                    from our services.
                </p>
            </div>
            <div class="customer-review">
                <div class="review-slider" id="review-slider">

                    <!-- Review 1 -->
                    <div class="slide">
                        <div class="review-book">
                            <img src="../assets/images/review book.svg" alt="">
                        </div>
                        <div class="review-card">
                            <img width="100px" src="../assets/images/4-review.svg" alt="review image">
                            <p class="summarize">Excellent Service, Instant Delivery</p>
                            <p class="message">
                                Books’ quality is too good and delivery is so fast.
                                Easy to browse and navigate. Love this beautiful
                                website as well.
                            </p>
                            <div class="review-by">
                                <p>Reviewed By John</p>
                                <span>
                                    04/02/2023
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Review 2 -->
                    <div class="slide">
                        <div class="review-book">
                            <img src="../assets/images/review book.svg" alt="">
                        </div>
                        <div class="review-card">
                            <img width="100px" src="../assets/images/4-review.svg" alt="review image">
                            <p class="summarize"> Effortless Convenience</p>
                            <p class="message">
                                Shopping for books has never been easier thanks to Chapter One's seamless browsing experience and user-friendly interface, making it a go-to destination for book lovers everywhere.
                            </p>
                            <div class="review-by">
                                <p>Reviewed By Andy Joe</p>
                                <span>
                                    04/02/2023
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Review 3 -->
                    <div class="slide">
                        <div class="review-book">
                            <img src="../assets/images/review book.svg" alt="">
                        </div>
                        <div class="review-card">
                            <img width="100px" src="../assets/images/4-review.svg" alt="review image">
                            <p class="summarize">Excellent Service, Instant Delivery</p>
                            <p class="message">
                                Books’ quality is too good and delivery is so fast.
                                Easy to browse and navigate. Love this beautiful
                                website as well.
                            </p>
                            <div class="review-by">
                                <p>Reviewed By John</p>
                                <span>
                                    04/02/2023
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Review 4 -->
                    <div class="slide">
                        <div class="review-book">
                            <img src="../assets/images/review book.svg" alt="">
                        </div>
                        <div class="review-card">
                            <img width="100px" src="../assets/images/4-review.svg" alt="review image">
                            <p class="summarize">Excellent Service, Instant Delivery</p>
                            <p class="message">
                                Books’ quality is too good and delivery is so fast.
                                Easy to browse and navigate. Love this beautiful
                                website as well.
                            </p>
                            <div class="review-by">
                                <p>Reviewed By John</p>
                                <span>
                                    04/02/2023
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Review 5 -->
                    <div class="slide">
                        <div class="review-book">
                            <img src="../assets/images/review book.svg" alt="">
                        </div>
                        <div class="review-card">
                            <img width="100px" src="../assets/images/4-review.svg" alt="review image">
                            <p class="summarize">Excellent Service, Instant Delivery</p>
                            <p class="message">
                                Books’ quality is too good and delivery is so fast.
                                Easy to browse and navigate. Love this beautiful
                                website as well.
                            </p>
                            <div class="review-by">
                                <p>Reviewed By John</p>
                                <span>
                                    04/02/2023
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="control">
                    <button class="arrow" id="review-prev">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.3333 8L3.99992 8" stroke="#1976D2" stroke-width="2" stroke-linecap="round" />
                            <path d="M7.6665 3.66699L3.61601 7.71748C3.4598 7.87369 3.4598 8.12696 3.61601 8.28317L7.6665 12.3337" stroke="#1976D2" stroke-width="2" stroke-linecap="round" />
                        </svg>

                    </button>
                    <button class="arrow" id="review-next">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.66675 8L12.0001 8" stroke="#1976D2" stroke-width="2" stroke-linecap="round" />
                            <path d="M8.3335 3.66699L12.384 7.71748C12.5402 7.87369 12.5402 8.12696 12.384 8.28317L8.3335 12.3337" stroke="#1976D2" stroke-width="2" stroke-linecap="round" />
                        </svg>


                    </button>
                </div>
            </div>

        </section>

        <!-- reading journey section -->
        <section class="reading-journey">
            <div>
                <img class="light" src="../assets/images/light.svg" alt="light svg">
                <div class="girl-reading">
                    <img src="../assets/images/girl reading.svg" alt="girl reading svg">
                </div>
                <div class="text-info">
                    <h3>
                        Haven't Start Reading Journey?
                    </h3>
                    <p> With our vast collection of millions of books, delve into a world of
                        imagination and find your next captivating read!
                    </p>
                    <a href="./products.html">
                        <button class="btn-style-3">
                            Explore Now
                            <img src="../assets/images/outlined arrow white.svg" alt="">
                        </button>
                    </a>
                </div>
            </div>

        </section>

        <?php require_once('../views/add-to-cart.php'); ?>

        <?php if (isset($_SESSION['login_success'])) { ?>
            <p class="alert-box success fade-away">
                <?php echo $_SESSION['login_success'] ?>
            </p>
        <?php } ?>

    </main>

    <!-- Footer -->
    <footer>
        <?php
        unset($_SESSION['login_success']);
        ?>

    </footer>

    <script src="../assets/js/slide.js?<?php echo $time ?>"></script>
    <script src="../assets/js/nav-toggle.js"></script>

</body>


</html>