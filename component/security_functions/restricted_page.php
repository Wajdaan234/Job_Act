<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: /Job_act/main_page/main.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restricted Page</title>
</head>
<body>
    <h1>Welcome to the Restricted Page</h1>
    <p>This page is only accessible to logged-in users.</p>
    <a href="/Job_act/component/security_functions/logout.php">Logout</a> <!-- Optional: to handle user logout -->
</body>
</html>
