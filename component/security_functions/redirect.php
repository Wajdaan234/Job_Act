<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
    <script>
        window.onload = function() {
            alert('Please log in first to access this page');
            window.location.href = '/Job_act/main_page/main.php';
        }
    </script>
</head>
<body>
</body>
</html>
