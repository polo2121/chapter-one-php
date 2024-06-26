<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$time = time();
session_start();
require_once('../sessionConfig.php');
require_once('../controllers/cipherController.php');
require_once('../controllers/adminController.php');

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
    <link rel="stylesheet" href="../assets/css/animation.css?<?php echo $time ?>">
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
            <div class="action">
                <span>Books</span>
                <a href="./admin-add.php">Add</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Price</th>
                        <th scope="col">Author</th>
                        <th scope="col">IBSN</th>
                        <th scope="col">Publication</th>
                        <th scope="col">Dimensions</th>
                        <th scope="col">Publishers</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Color</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="../controllers/adminController.php" method="post">
                        <?php if ($bookDetails->num_rows > 0) {
                            foreach ($bookDetails as $row) {
                        ?>
                                <tr>
                                    <td><?php echo $row['book_title'] ?></td>
                                    <td><?php echo $row['book_cover'] ?></td>
                                    <td><?php echo $row['book_price'] ?></td>
                                    <td><?php echo $row['book_author'] ?></td>
                                    <td><?php echo $row['book_isbn'] ?></td>
                                    <td><?php echo $row['book_publication'] ?></td>
                                    <td><?php echo $row['book_publisher'] ?></td>
                                    <td><?php echo $row['book_dimensions'] ?></td>
                                    <td><?php echo $row['book_weight'] ?></td>
                                    <td><?php echo $row['background_color'] ?></td>
                                    <td class="update-delete">
                                        <a href="./admin-update.php?id=<?php echo encryptId($row['book_id']) ?>" class="update">Update</a>
                                        <a class="delete" onclick="confirm('<?php echo encryptId($row['book_id']) ?>');">
                                            Delete
                                        </a>
                                    </td>
                                </tr>

                        <?php }
                        } ?>
                    </form>
                </tbody>
            </table>

        </section>

        <!-- Order List table  -->
        <section class="tables">
            <div class="action">
                <span>Order Lists</span>
            </div>
            <table>
                <thead>
                    <tr>
                        <th scope="col">Reference Code</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Issued Date</th>
                        <th scope="col">Order Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($orderList->num_rows > 0) {
                        foreach ($orderList as $row) {
                    ?>
                            <tr>
                                <td><?php echo $row['order_code']; ?></td>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['order_issued_date']; ?></td>
                                <td><?php echo $row['order_status']; ?></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>

        </section>
    </main>
    <dialog>
        <button autofocus class="close">Close</button>
        <form action="../controllers/adminController.php" method="post">
            <input type="hidden" name="book-id">
            <h5>Confirmation</h5>
            <p>Are you sure you want to delete this book?</p>
            <div>
                <button type="submit" name="delete">
                    <a>Yes</a>
                </button>
                <span class="close">No</span>
            </div>
        </form>

    </dialog>

    <?php if (isset($_SESSION['insert_success'])) { ?>
        <p class="alert-box success fade-away">
            <?php echo $_SESSION['insert_success'] ?>
        </p>

    <?php }
    unset($_SESSION['insert_success']);
    ?>

    <?php if (isset($_SESSION['update_success'])) { ?>
        <p class="alert-box success fade-away">
            <?php echo $_SESSION['update_success'] ?>
        </p>

    <?php }
    unset($_SESSION['update_success']);
    ?>

    <?php if (isset($_SESSION['delete_success'])) { ?>
        <p class="alert-box success fade-away">
            <?php echo $_SESSION['delete_success'] ?>
        </p>

    <?php }
    unset($_SESSION['delete_success']);
    ?>

    <?php if (isset($_SESSION['insert_error'])) { ?>
        <p class="alert-box fade-away">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#7f3939" fill="none">
                <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <?php echo $_SESSION['insert_error'] ?>
        </p>
    <?php }
    unset($_SESSION['insert_error']);
    ?>

    <?php if (isset($_SESSION['update_error'])) { ?>
        <p class="alert-box fade-away">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#7f3939" fill="none">
                <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <?php echo $_SESSION['update_error'] ?>
        </p>
    <?php }
    unset($_SESSION['update_error']);
    ?>

    <?php if (isset($_SESSION['delete_error'])) { ?>
        <p class="alert-box fade-away">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#7f3939" fill="none">
                <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <?php echo $_SESSION['delete_error'] ?>
        </p>
    <?php }
    unset($_SESSION['delete_error']);
    ?>
    <script src="../assets/js/admin.js"></script>
</body>

</html>