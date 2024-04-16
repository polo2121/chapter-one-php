<?php


// general session and user session
// when a visiter land the home page, the session will start to create.
// a visiter session's lifetime must not exceed over 30 mintues.
// when a user do register/login, user session must be created and general session must be destoryed.
// if a visiter store books in the cart before login/register, those books data must be transffered to user session after it.
// both general session and user session lifetime must be checked frequently.
// Create a function that check session lifetime.
// Create a function that generate unique Id for sessions.
// session_set_cookie_params(['lifetime' => 1800, 'domain' => "localhost", 'path' => '/', 'secure' => true, 'httponlyy' => true]);
if (!isset($_SESSION['user'])) {
    $sessionName = 'general';
    if (!isset($_SESSION['general'])) {
        createNewSession($sessionName);
    }
} else {
    $sessionName = 'user';
}
$isExpired = checkSessionLifetime($sessionName);
if ($isExpired) {
    echo "Session is destoryed";
    destorySession();
    header('Location: ../views/login.php');
}

function createNewSession($name)
{
    // echo $name;
    $uniqueId = generateUniqueId();
    $_SESSION[$name]['session_id'] = $uniqueId;
    $_SESSION[$name]['created_time'] = time();
    // echo "user session is created. <br>";
}

function generateUniqueId()
{
    return (bin2hex(random_bytes(20)));
}

function checkSessionLifetime($name)
{
    if (time() - $_SESSION[$name]['created_time'] > 100) {
        return true;
        echo "Session is destoryed";
    }
    return false;
}
function destorySession()
{
    echo "Destory is called";
    session_unset();
    session_destroy();
}
