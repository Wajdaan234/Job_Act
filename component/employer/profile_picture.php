<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: /Job_act/component/registration/signup.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method ="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <br>
        <br>
        <button type="submit" name="btn">Submit</button>
    </form>
    <?php
    include ('signup_connection.php');
   if(isset($_POST['bt'])){
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "image/".$file_namel;

    $insert = "INSERT INTO `signup`(`image`) VALUE('image')";
    $query = mysqli_query($conn,$insert);

   if(move_uploaded_file($tempname, $folder)){
    echo "<h1>Upload Successfull</h1>";
   }else{
    echo "<h1>Upload unsuccessfull</h1>";
   }
   }
    ?>
</body>
</html>