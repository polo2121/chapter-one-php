<?php

// require_once('../models/bookModel.php');
require_once('../models/dbConnection.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        session_start();
        $errors = [];

        if (!isset($_SESSION['csrf_token']) || !isset($_POST['token'])) {
            echo "<h1>Something went wrong</h1>";
            exit;
        }
        $token = htmlspecialchars($_POST['token']);
        $isCsrfTokenValid = validateCsrfToken($token);

        if (isset($_POST['register'])) {

            if ($isCsrfTokenValid) {

                // Gather the name of all inputs provided in register form
                $inputs = array('firstname', 'lastname', 'email', 'pwd', 'confirm');

                // Validate those inputs to make sure whether they are null/existed or not
                $errors['input_error'] = validateInput($inputs);

                // only proceed when there is no error in inputs 
                if (empty($errors['input_error'])) {
                    $errors['email_error'] = validateEmail();
                    $errors['pwd_error'] = validatePassword($pwd, $confirmPwd);
                }
                // otherwise show errors to users
                else {
                    $_SESSION['registration_errors'] = $errors;
                    header('Location: ../views/register.php');
                    exit;
                }

                // registration is success when there are no errors in inputs
                if (
                    empty($errors['input_error']) &&
                    empty($errors['email_error']) &&
                    empty($errors['pwd_error'])
                ) {
                    $firstname = htmlspecialchars($_POST['firstname']);
                    $lastname = htmlspecialchars($_POST['lastname']);
                    $email = htmlspecialchars($_POST['email']);

                    // hash the password so that nobody can't know the real one
                    $pwd = password_hash($pwd, PASSWORD_DEFAULT);

                    // $conn = openConnection();
                    // $stmt = $conn->prepare('INSERT INTO users VALUES (?,?,?,?,?)');
                    // $stmt->bind_param('issss', $id, $firstname, $lastname, $pwd, $email);

                    // $stmt->execute();
                    // $stmt->close();
                    // closeConnection($conn);
                    echo "New Records created successfully";
                    $_SESSION['registration_success'] = "You are successfully become the pateron of Chapter One.";
                    header('Location: ../views/products.php');
                } else {
                    $_SESSION['registration_errors'] = $errors;
                    $_SESSION['prev_values'] = array($_POST['firstname'], $_POST['lastname'], $_POST['email']);
                    header('Location: ../views/register.php');
                }
            }
        }
        if (isset($_POST['login'])) {
            echo "login win nay ti";
            // $isPassed = validateInput();
            if (!$isPassed) {
                $errors =  "Please fill all the information to proceed.";
                return loginHasError($errors);
            }

            $email = htmlspecialchars($_POST['email']);
            $pwd = htmlspecialchars($_POST['pwd']);

            if (!password_verify($pwd, '$2y$10$2FTPq7O2dFDa0W7fN5nJTuUHBoM94SPjnIARLHxnq5nQo1c67H5cm')) {
                $errors =  "Email or password is incorrect.";
                return loginHasError($errors);
            }

            $_SESSION['login_success'] = "You have successfully loginned.";
            return header('Location: ../views/home.php');
        }


        // $realPWD = password_hash(123, PASSWORD_DEFAULT);
        // echo $email . " " . $pwd;
    } catch (\Throwable $th) {
        echo $th;
    }
}

function loginHasError($errors)
{
    $_SESSION['login_error'] = $errors;
    return header('Location: ../views/login.php');
}

function validateCsrfToken($token)
{

    if ($_SESSION['csrf_token'] !== $token) {
        echo "<h1>405 Method Not Allowed.</h1>";
        exit;
    }
    return true;
}


// To make sure inputs are successfully submitted
function validateInput($inputs)
{
    $isPassed = null;

    //check input is empty
    foreach ($inputs as $input) {
        // Deny if input is existed and the value is empty
        if (isset($_POST[$input]) && empty($_POST[$input])) {
            return "Please enter all information to proceed.";
        }
        // echo $userInputs . '<br>';
    }
}

function validateEmail()
{
    // check email match valid format
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "enter valid email";
        return "Please enter valid email format.";
    }
}
function validatePassword()
{
    $pwd = $_POST['pwd'];
    $confirm = $_POST['confirm'];
    if ($pwd !== $confirm) {
        echo "Does not match";
        return "Password and confirm password does not match.";
    }

    if (strlen($pwd) <= 8) {
        return "Password must have at least 8 characters.";
    }
    if (!preg_match('#[A-Z]+#', $pwd)) {
        return  "Password must have at least 1 uppercase.";
    }

    if (!preg_match('#[a-z]+#', $pwd)) {
        return "Password must have at least 1 lowercase.";
    }
    if (!preg_match('#[0-9]+#', $pwd)) {
        return "Password must have at least 1 digit.";
    }
    if (!preg_match('#\W+#', $pwd)) {
        return "Password must have at least 1 special character.";
    }
    echo "final arrived";
}
