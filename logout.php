<?php
// Start session
session_start();

// Unset session variables
unset($_SESSION['email']);
unset($_SESSION['fullname']);

// Destroy session
session_destroy();

// Redirect to login page
header("Location: index.php");
exit;
?>
