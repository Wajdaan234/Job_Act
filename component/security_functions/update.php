<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Please log in first to access this page.');</script>";
    header("Location: /Job_act/component/registration/signup.php");
    exit();
}
 
include 'signup_connection.php';

$id = $_GET['id'];
$select = "SELECT * FROM `signup` WHERE `id` = '$id'";
$data = mysqli_query($conn, $select);
$result = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <title>Update</title>
    <style>
        /* General form styling */
        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background: #f4f7f8;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-family: 'Arial', sans-serif;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .social-icons .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin: 0 10px;
            background-color: #e9e9e9;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .social-icons .icon:hover {
            background-color: #3498db;
            color: #fff;
            transform: scale(1.1);
        }

        span {
            display: block;
            margin-bottom: 15px;
            color: #666;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            background: #fff;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #3498db;
            outline: none;
        }

        button[name="btn"] {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button[name="btn"]:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        /* Mobile responsiveness */
        @media (max-width: 480px) {
            form {
                padding: 20px;
                margin: 20px;
            }

            .social-icons .icon {
                width: 35px;
                height: 35px;
                line-height: 35px;
            }
        }
    </style>
</head>
<body>
    <form method="POST">
        <h1>Update Account</h1>
        <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>Update your information</span>
        <input type="text" placeholder="Name" name="name" required value="<?php echo $result['username']; ?>">
        <input type="email" placeholder="Email" name="email" required value="<?php echo $result['email']; ?>">
        <input type="password" placeholder="Password" name="pasw" required value="<?php echo $result['password']; ?>">
        <button name="btn">Update</button>
    </form>
    </body>
</html>

<?php
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pasw'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Correct the SQL query by using the variables directly
    $query = "UPDATE `signup` SET `username`='$name', `email`='$email', `password`='$hash' WHERE `id` = '$id'";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('Record updated successfully');</script>";
        header('location: admin.php');
    } else {
        echo "<script>alert('Error updating record');</script>";
    }
}
?>
