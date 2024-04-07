<?php
$time = time();
require_once('../sessionConfig.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Link for two fonts used in the website -->
    <link href="https://api.fontshare.com/v2/css?f[]=erode@700,300,500,600,400&f[]=recia@700,500,600,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/global.css?<?php echo $time ?>">
    <link rel="stylesheet" href="../assets/css/animation.css?<?php echo $time ?>">

</head>

<body>


    <!-- Header -->
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once('./header.php');
    ?>

    <!-- Main -->
    <main>
        <section class="login">
            <!-- Illustration -->
            <div class="illustration">
                <img width="100%" src="../assets/images/login_illustration.svg" alt="login illustration svg">
            </div>
            <form class="login-form" action="../controllers/authenticationController.php" method="post">
                <h2>Welcome Back</h2>
                <div class="input-wrapper">
                    <!-- Email -->
                    <div class="input-group">
                        <div>
                            <img src="../assets/images/email.svg" alt="email icon">
                            <label for="email">Email</label>
                        </div>
                        <input name="email" id="email" type="text" placeholder="e.g. example@gmail.com" required>
                    </div>

                    <!-- Password -->
                    <div class="input-group">
                        <div>
                            <img src="../assets/images/password.svg" alt="password icon">
                            <label for="pwd">Password</label>
                        </div>
                        <input name="pwd" id="pwd" type="password" placeholder="***************">
                        <a href="" class="link">
                            Forget Password?
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5 6H5.25C4.65326 6 4.08097 6.23705 3.65901 6.65901C3.23705 7.08097 3 7.65326 3 8.25V18.75C3 19.3467 3.23705 19.919 3.65901 20.341C4.08097 20.7629 4.65326 21 5.25 21H15.75C16.3467 21 16.919 20.7629 17.341 20.341C17.7629 19.919 18 19.3467 18 18.75V10.5M7.5 16.5L21 3M21 3H15.75M21 3V8.25" stroke="#2466CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </a>
                    </div>
                    <button type="submit">
                        Login Now
                    </button>
                    <?php if (isset($_SESSION['login_error'])) { ?>
                        <p class="login-error">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#7f3939" fill="none">
                                <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?php echo $_SESSION['login_error'] ?>
                        </p>
                    <?php
                        unset($_SESSION['login_error']);
                    } ?>
                    <a class="link" href="./register.php">
                        New here? Create an Account?
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" required>
                            <path d="M13.5 6H5.25C4.65326 6 4.08097 6.23705 3.65901 6.65901C3.23705 7.08097 3 7.65326 3 8.25V18.75C3 19.3467 3.23705 19.919 3.65901 20.341C4.08097 20.7629 4.65326 21 5.25 21H15.75C16.3467 21 16.919 20.7629 17.341 20.341C17.7629 19.919 18 19.3467 18 18.75V10.5M7.5 16.5L21 3M21 3H15.75M21 3V8.25" stroke="#2466CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>

            </form>
        </section>

    </main>

    <!-- Footer -->
    <footer>
    </footer>

    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/footer.js"></script>
    <script src="./assets/js/nav-toggle.js"></script>

</body>


</html>