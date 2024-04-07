<?php
function checkReqHasCsrfToken()
{
    // check the form has csrf
    if (isset($_SESSION['csrf_token']) && isset($_POST['token'])) {
        return  htmlspecialchars($_POST['token']);
    } else {
        echo "<h1>Something went wrong</h1>";
        exit;
    }

    // check the token is valid
}
function validateCsrfToken($token)
{
    if ($_SESSION['csrf_token'] !== $token) {
        echo "<h1>405 Method Not Allowed.</h1>";
        exit;
    }
    return true;
}
