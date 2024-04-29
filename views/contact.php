<?php

session_start();
require_once('../sessionConfig.php');
$_SESSION['path'] = 'contact';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>

    <!-- Link for two fonts used in the website -->
    <link href="https://api.fontshare.com/v2/css?f[]=erode@700,300,500,600,400&f[]=recia@700,500,600,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/form.css">
    <link rel="stylesheet" href="../assets/css/animation.css">
</head>

<body>

    <!-- Header -->
    <?php require_once('./header.php'); ?>

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
                            <img src="../assets/images/email.svg" alt="email icon">
                            <label for="email">Email</label>
                        </div>
                        <input name="email" id="email" type="text" placeholder="e.g. example@gmail.com" required>
                    </div>

                    <button type="submit">
                        Send Now
                    </button>
                    <a class="link" href="./products.php">
                        Back To Browsing
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5 6H5.25C4.65326 6 4.08097 6.23705 3.65901 6.65901C3.23705 7.08097 3 7.65326 3 8.25V18.75C3 19.3467 3.23705 19.919 3.65901 20.341C4.08097 20.7629 4.65326 21 5.25 21H15.75C16.3467 21 16.919 20.7629 17.341 20.341C17.7629 19.919 18 19.3467 18 18.75V10.5M7.5 16.5L21 3M21 3H15.75M21 3V8.25" stroke="#2466CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </a>
                </div>
                <img id="message" src="../assets/images/message.svg" alt="message image">
                <img id="question-boy" src="../assets/images/question-boy.svg" alt="question-boy image">
                <img id="contact-girl" src="../assets/images/contact-girl.svg" alt="contact-girl image">
            </form>
        </section>

        <!-- Add-To-Cart Section -->
        <?php require_once('../views/add-to-cart.php'); ?>
    </main>

    <!-- Footer -->
    <?php require_once('./footer.php'); ?>

    <script src="../assets/js/nav-toggle.js"></script>

</body>


</html>