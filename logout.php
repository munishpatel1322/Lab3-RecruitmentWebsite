<?php
session_start();

// Clear session data
$_SESSION = array();

// Destroy the session
session_destroy();

// Clear the "Remember Me" cookie if it exists
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, '/'); // Set the cookie to expire in the past
}

// Redirect to the login page
header("Location: login.php");
exit();
?>
