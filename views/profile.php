<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$time = time();
session_start();
require_once('../sessionConfig.php');
require_once('../controllers/cipherController.php');

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
            <div class="welcome-back">
                <h3>Welcome Back, <?php echo "POLO" ?></h3>
            </div>
            <div class="profile">
                <fieldset class="my-profile">
                    <legend>My Profile</legend>
                    <ul class="names">
                        <li>
                            <label>Firstname</label>
                            <span>Jinny</span>
                        </li>
                        <li>
                            <label>Lastname</label>
                            <span>Tonny</span>
                        </li>
                    </ul>

                    <ul class="other-details">
                        <li>
                            <label>Email</label>
                            <span>Jinny@gmail.com</span>
                        </li>
                        <li>
                            <label>Delivery Address</label>
                            <span>Tonny</span>
                        </li>
                        <li>
                            <label>Phoen Number</label>
                            <span>+44 0739833003y</span>
                        </li>
                    </ul>

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