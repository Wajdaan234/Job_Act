<?php
session_start(); // Start the session
session_unset(); // Clear session variables
session_destroy(); // Destroy the session
header('Location: /Job_act/component/registration/signup.php'); // Redirect to login page
exit();
?>