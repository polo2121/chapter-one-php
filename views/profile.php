<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$time = time();
session_start();
require_once('../sessionConfig.php');
require_once('../controllers/cipherController.php');
require_once('../controllers/profileController.php');

if (!isset($_SESSION['user'])) {
    $_SESSION['login_error'] = "Please login first.";
    header('Location: ./login.php');
    exit;
}
$_SESSION['path'] = 'profile';


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
    <link rel="stylesheet" href="../assets/css/profile.css?<?php echo $time ?>">

</head>

<body>

    <!-- Header -->
    <?php
    require_once('./header.php');
    ?>

    <!-- Main -->
    <main>
        <?php var_dump($_SESSION); ?>
        <section>
            <?php
            if ($user->num_rows > 0) {
                foreach ($user as $row) {
            ?>
                    <div class="welcome-back">
                        <h3>Welcome Back, <?php echo ucfirst($row['firstname']) . ' ' . ucfirst($row['lastname']) ?></h3>
                        <form action="../controllers/profileController.php" method="post">
                            <button type="submit" name="logout">Sign Out</button>
                        </form>
                    </div>
                    <div class="profile">
                        <fieldset class="my-profile">
                            <legend>My Profile</legend>
                            <ul class="names">
                                <li>
                                    <label>Firstname</label>
                                    <span><?php echo ucfirst($row['firstname']) ?></span>
                                </li>
                                <li>
                                    <label>Lastname</label>
                                    <span><?php echo ucfirst($row['lastname']) ?></span>
                                </li>
                            </ul>
                            <ul class="other-details">
                                <li>
                                    <label>Email</label>
                                    <span><?php echo ucfirst($row['email']) ?></span>
                                </li>
                        <?php  }
                } ?>
                        <?php
                        if ($deliverAddress->num_rows > 0) {
                            foreach ($deliverAddress as $row) {
                        ?>
                                <li>
                                    <label>Delivery Address</label>
                                    <span><?php echo ucfirst($row['address']) ?></span>
                                </li>
                                <li>
                                    <label>Phoen Number</label>
                                    <span>+44 0739833003</span>
                                </li>
                            </ul>
                    <?php }
                        } ?>
                        </fieldset>




                        <fieldset class="order-lists">
                            <legend>Order Lists</legend>
                            <div class="other-details">
                                <ul>
                                    <li>
                                        <label>Reference Code</label>
                                        <span>#3993930090393</span>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label>Issued State</label>
                                        <span>29-10-2022</span>
                                    </li>
                                    <li>
                                        <label>Order Status</label>
                                        <span class="complete">Completed</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="other-details">
                                <ul>
                                    <li>
                                        <label>Reference Code</label>
                                        <span>#3993930090393</span>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label>Issued State</label>
                                        <span>29-10-2022</span>
                                    </li>
                                    <li>
                                        <label>Order Status</label>
                                        <span class="processing">Proccessing</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- <h5>No Order Yet.</h5>
                    <a href="">
                        <button>Start My First Order Now</button>
                    </a> -->
                        </fieldset>

                    </div>
        </section>
    </main>

    <!-- Footer -->

    <?php

    ?>
    <script src="./js/nav-toggle.js"></script>

</body>


</html>