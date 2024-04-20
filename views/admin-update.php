<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$time = time();
session_start();
require_once('../sessionConfig.php');
require_once('../controllers/cipherController.php');
require_once('../models/bookModel.php');

$bookId = htmlspecialchars($_GET['id']);
$bookId = decryptId($bookId);
$bookDetails = getBookById($bookId);
if ($bookDetails->num_rows <= 0) {
    $_SESSION['update_error'] = "Cannot update the book to the database.";
    header('Location: ../views/admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <!-- Link for two fonts used in the website -->
    <link href="https://api.fontshare.com/v2/css?f[]=erode@700,300,500,600,400&f[]=recia@700,500,600,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/global.css?<?php echo $time ?>">
    <link rel="stylesheet" href="../assets/css/admin.css?<?php echo $time ?>">
</head>

<body>
    <!-- Main -->
    <main>
        <section class="welcome">
            <a href="/index.php">
                <img width="46px" src="../assets/images/Logo.svg" alt="logo image">
            </a>
            <h4>Welcome Back, Admin</h4>
        </section>

        <!-- Book table -->
        <section class="tables">

            <div class="input-wrapper">
                <h4>Update Book</h4>
                <form action="../controllers/adminController.php" method="post">
                    <?php if ($bookDetails->num_rows > 0) {
                        foreach ($bookDetails as $row) {
                    ?>
                            <input type="hidden" name="book-id" value="<?php echo encryptId($row['book_id']) ?>">
                            <div class="column">
                                <!-- title -->
                                <div class="input-group">
                                    <label for="title">Title</label>
                                    <input name="title" type="text" placeholder="e.g. Waston" value="<?php echo $row['book_title'] ?>" required>
                                </div>

                                <!-- Cover -->
                                <div class="input-group">
                                    <label for="cover">Cover</label>
                                    <input name="cover" type="text" placeholder="e.g. book name.jpeg/png/jpg" value="<?php echo $row['book_cover'] ?>" required>
                                </div>

                                <!-- Price -->
                                <div class="input-group">
                                    <label for="price">Price</label>
                                    <input name="price" type="text" placeholder="e.g. 10.99" value="<?php echo $row['book_price'] ?>" required>
                                </div>

                                <!-- Author -->
                                <div class="input-group">
                                    <label for="author">Author</label>
                                    <input name="author" type="text" placeholder="e.g. James Carl" value="<?php echo $row['book_author'] ?>" required>
                                </div>

                                <!-- IBSN -->
                                <div class="input-group">
                                    <label for="ibsn">IBSN</label>
                                    <input name="ibsn" type="text" placeholder="e.g. IBSN3492923222" value="<?php echo $row['book_isbn'] ?>" required>
                                </div>

                            </div>
                            <div class="column">
                                <!-- Publication -->
                                <div class="input-group">
                                    <label for="publication">Publication</label>
                                    <input name="publication" type="text" placeholder="e.g. 29 Oct 2023" value="<?php echo $row['book_publication'] ?>" required>
                                </div>

                                <!-- Dimensions -->
                                <div class="input-group">
                                    <label for="dimensions">Dimensions</label>
                                    <input name="dimensions" type="text" placeholder="e.g. 239x03x19 mm" value="<?php echo $row['book_dimensions'] ?>" required>
                                </div>

                                <!-- Publisher -->
                                <div class="input-group">
                                    <label for="publisher">Publisher</label>
                                    <input name="publisher" type="text" placeholder="e.g. Connorstone" value="<?php echo $row['book_publisher'] ?>" required>
                                </div>

                                <!-- Weight -->
                                <div class="input-group">
                                    <label for="weight">Weight</label>
                                    <input name="weight" type="text" placeholder="e.g. Connorstone" value="<?php echo $row['book_weight'] ?>" required>
                                </div>

                                <!-- Color -->
                                <div class="input-group">
                                    <label for="background-color">Background Color</label>
                                    <input name="background-color" type="text" placeholder="e.g. #C2E1E9" value="<?php echo $row['background_color'] ?>" required>
                                </div>
                            </div>

                            <!-- Genres -->
                            <div class="input-group">
                                <label for="genres">Genres</label>
                                <input name="genres" type="text" placeholder="e.g. self-motivation" value="<?php echo $row['genres'] ?>" required>
                            </div>

                            <div class="description">
                                <label for="description">Description</label>
                                <textarea name="description" cols="140" rows="10">
                                    <?php echo $row['book_description'] ?>
                                </textarea>
                            </div>
                    <?php }
                    } ?>


                    <div class="form-action">
                        <button type="submit" id="add-now" name="update">
                            Update Now
                        </button>
                        <a class="link" href="./admin.php">
                            Back to Table
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5 6H5.25C4.65326 6 4.08097 6.23705 3.65901 6.65901C3.23705 7.08097 3 7.65326 3 8.25V18.75C3 19.3467 3.23705 19.919 3.65901 20.341C4.08097 20.7629 4.65326 21 5.25 21H15.75C16.3467 21 16.919 20.7629 17.341 20.341C17.7629 19.919 18 19.3467 18 18.75V10.5M7.5 16.5L21 3M21 3H15.75M21 3V8.25" stroke="#2466CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </form>

            </div>

        </section>

    </main>

</body>


</html>