<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_unset();
session_destroy();

// Redirect to the sign-in page
header("Location: ../../public/Signin.php");
exit();
