<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$time = time();
session_start();
require_once('../sessionConfig.php');
require_once('../controllers/addressController.php');
$_SESSION['path'] = 'add-delivery-form';
$token = bin2hex(random_bytes(35));
$_SESSION['csrf_token'] = $token;
if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
    header('Location: ./login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Page</title>

    <!-- Link for two fonts used in the website -->
    <link href="https://api.fontshare.com/v2/css?f[]=erode@700,300,500,600,400&f[]=recia@700,500,600,400&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/form.css">


</head>

<body>

    <!-- Main -->
    <main>
        <!-- review order section -->
        <section class="review-order">
            <?php var_dump($_SESSION); ?>
            <form class="login-form add-deli-form" action="../controllers/addressController.php" method="post">
                <input name="token" type="hidden" value="<?php echo $_SESSION['csrf_token'] ?>">
                <?php if (isset($_SESSION['address_error'])) { ?>
                    <p class="login-error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#7f3939" fill="none">
                            <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <?php echo $_SESSION['address_error'] ?>
                    </p>
                <?php } ?>
                <h2>Add Delivery Instructions</h2>

                <div class="input-wrapper">
                    <!-- Address -->
                    <div class="input-group">
                        <div>
                            <label for="address">Address</label>
                        </div>
                        <input name="address" id="address" type="text">
                    </div>

                    <!-- Post Code -->
                    <div class="input-group">
                        <div>
                            <label for="post-code">Post Code</label>
                        </div>
                        <input name="post-code" id="post-code" type="text" required>
                    </div>

                    <!-- Town/City -->
                    <div class="input-group">
                        <div>
                            <label for="city">Town/City</label>
                        </div>
                        <input name="city" id="city" type="text" required>
                    </div>


                    <!-- Country -->
                    <div class="input-group">
                        <div>
                            <label for="country">Country</label>
                        </div>
                        <input name="country" id="country" type="text" required>
                    </div>


                    <!-- Phone Number -->
                    <div class="input-group">
                        <div>
                            <label for="ph-num">Phone Number</label>
                        </div>
                        <input name="ph-num" id="ph-num" type="number" required>
                    </div>

                    <button type="submit" name="delivery">
                        Add Now
                    </button>
                    <a class="link" href="./review-order.php">
                        Back to review order
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5 6H5.25C4.65326 6 4.08097 6.23705 3.65901 6.65901C3.23705 7.08097 3 7.65326 3 8.25V18.75C3 19.3467 3.23705 19.919 3.65901 20.341C4.08097 20.7629 4.65326 21 5.25 21H15.75C16.3467 21 16.919 20.7629 17.341 20.341C17.7629 19.919 18 19.3467 18 18.75V10.5M7.5 16.5L21 3M21 3H15.75M21 3V8.25" stroke="#2466CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </a>
                </div>
            </form>
        </section>


    </main>
    <?php
    unset($_SESSION['address_error']);
    ?>

</body>


</html>