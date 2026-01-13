<?php
session_start();

// Set logout message before destroying session
$_SESSION['msg'] = "You have been logged out successfully.";
$_SESSION['logout'] = true;

$_SESSION = [];

// Restore the logout message after clearing session
session_start();
$_SESSION['msg'] = "You have been logged out successfully.";

session_destroy();


header("Location: login-form.php");
exit();
?>
