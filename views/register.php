<?php
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
    <title>Register Page</title>

    <!-- Link for two fonts used in the website -->
    <link href="https://api.fontshare.com/v2/css?f[]=erode@700,300,500,600,400&f[]=recia@700,500,600,400&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/login.css">

</head>

<body>

    <!-- Header -->
    <?php
    var_dump($_SESSION);
    // echo "Hello";
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    require_once('./header.php');
    ?>

    <!-- Main -->
    <main>
        <section class="login">
            <!-- Illustration -->
            <div class="illustration">
                <img width="100%" src="../assets/images/register_illustration.svg" alt="login illustration svg">
            </div>
            <form class="login-form" action="../controllers/authenticationController.php" method="post">
                <input name="token" type="hidden" value="<?php echo $_SESSION['csrf_token'] ?>">
                <h2>Let's Get Started</h2>
                <div class="input-wrapper">

                    <!-- firstname -->
                    <div class="input-group">
                        <div>
                            <img src="../assets/images/name.svg" alt="name icon">
                            <label for="firstname">Firstname</label>
                        </div>
                        <input name="firstname" id="firstname" type="text" placeholder="e.g. John" value="<?php if (isset($_SESSION['prev_values'][0])) echo $_SESSION['prev_values'][0]; ?>" required>
                    </div>

                    <!-- lastname -->
                    <div class="input-group">
                        <div>
                            <img src="../assets/images/name.svg" alt="name icon">
                            <label for="lastname">Lastname</label>
                        </div>
                        <input name="lastname" id="lastname" type="text" placeholder="e.g. Waston" value="<?php if (isset($_SESSION['prev_values'][1])) echo $_SESSION['prev_values'][1]; ?>" required>
                    </div>

                    <!-- Email -->
                    <div class="input-group">
                        <div>
                            <img src="../assets/images/email.svg" alt="email icon">
                            <label for="email">Email</label>
                        </div>
                        <input name="email" id="email" type="email" placeholder="e.g. example@gmail.com" value="<?php if (isset($_SESSION['prev_values'][0])) echo $_SESSION['prev_values'][2]; ?>" required>
                        <?php if (isset($_SESSION['registration_errors']['email_error'])) { ?>
                            <p class="login-error">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#7f3939" fill="none">
                                    <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <?php echo "Enter Valid Email." ?>
                            </p>
                        <?php
                        } ?>
                    </div>

                    <!-- Password -->
                    <div class="input-group">
                        <div>
                            <img src="../assets/images/password_2.svg" alt="password icon">
                            <label for="pwd">Password</label>
                        </div>
                        <input name="pwd" id="pwd" type="password" placeholder="***************" required>
                        <?php if (isset($_SESSION['registration_errors']['pwd_error'])) { ?>
                            <p class="login-error">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#7f3939" fill="none">
                                    <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <?php echo $_SESSION['registration_errors']['pwd_error']; ?>
                            </p>
                        <?php
                        } ?>
                    </div>


                    <!-- Confirm Password -->
                    <div class="input-group">
                        <div>
                            <img src="../assets/images/password_2.svg" alt="password icon">
                            <label for="confirm">Confirm Password</label>
                        </div>
                        <input name="confirm" id="confirm" type="password" placeholder="***************" required>
                    </div>
                    <?php if (isset($_SESSION['registration_errors']['input_error'])) { ?>
                        <p class="login-error">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#7f3939" fill="none">
                                <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?php echo $_SESSION['registration_errors']['input_error']; ?>
                        </p>
                    <?php
                    } ?>
                    <button type="submit" name="register">
                        Create Account Now
                    </button>
                    <a class="link" href="">
                        Have an account? Login Now
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5 6H5.25C4.65326 6 4.08097 6.23705 3.65901 6.65901C3.23705 7.08097 3 7.65326 3 8.25V18.75C3 19.3467 3.23705 19.919 3.65901 20.341C4.08097 20.7629 4.65326 21 5.25 21H15.75C16.3467 21 16.919 20.7629 17.341 20.341C17.7629 19.919 18 19.3467 18 18.75V10.5M7.5 16.5L21 3M21 3H15.75M21 3V8.25" stroke="#2466CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </a>
                </div>

            </form>
        </section>

    </main>
    <?php
    unset($_SESSION['registration_errors']);
    unset($_SESSION['prev_values']);
    ?>

    <!-- Footer -->
    <footer>
    </footer>
    <script src="../assets/js/nav-toggle.js"></script>
</body>


</html>