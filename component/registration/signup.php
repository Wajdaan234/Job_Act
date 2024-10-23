<?php


include 'signup_connection.php';

// Admin credentials
$adminemail = "admin@gmail.com";
$adminpassword = password_hash("Admin14344", PASSWORD_DEFAULT);

// Check if admin already exists
$check_admin = "SELECT * FROM `signup` WHERE `email` = '$adminemail'";
$admin_result = mysqli_query($conn, $check_admin);

if (mysqli_num_rows($admin_result) == 0) {
    // Insert admin credentials into the database if not already present
    $insert_admin = "INSERT INTO `signup` (`username`, `email`, `password`, `roll`) VALUES ('Admin', '$adminemail', '$adminpassword', 'admin')";
    mysqli_query($conn, $insert_admin);
}

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pasw'];
    $roll = $_POST['roll'];  // Fixed variable name
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Check if username or email already exists
    $check_user = "SELECT * FROM `signup` WHERE `username` = '$name' OR `email` = '$email'";
    $user_result = mysqli_query($conn, $check_user);

    if (mysqli_num_rows($user_result) == 0) {
        // Insert new user if username and email are unique
        $query = "INSERT INTO `signup` (`username`, `email`, `password`, `roll`) VALUES ('$name', '$email', '$hash', '$roll')";
        mysqli_query($conn, $query);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "<script>alert('Username or email already exists');</script>";
    }
}
?>
<?php
session_start();
include 'signup_connection.php';

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pasw'];

    $query = "SELECT * FROM `signup` WHERE `username` = '$name' AND `email` = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {  // Change >1 to >0
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id']; // Correctly set the user_id session variable
            $_SESSION['email'] = $row['email'];
            $_SESSION['roll'] = $row['roll']; 
            $_SESSION['profile_picture'] = $row['image'] ?? 'uploads/image/default-profile.png';

            if ($email === $adminemail) {
                header("Location: /Job_act/component/admin.php");
            } elseif ($row['roll'] === 'employer') {
                header("Location: /Job_act/component/employer/employer_page.php");
            } else {
                header("Location: /Job_act/component/JOBS.php");
            }
            exit();
        } else {
            echo "<script>alert('Invalid credentials');</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="form.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <title>Job_Act Login Page | Sign Up</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        :root{
            --primarycolor: #0076de;
            --secondrycolor: #005299;
            --whitecolor : #fff;
            --blackcolor: #000000;
            --greycolor : #f6f8fa;
            --labelcolor :#64b1f5;
            --yellowcolor : #ffd723;
        }
        #message{
            display: none;
            color: #000;
            position: relative;
            padding: 20px;
            height: 20vh;
            width: 100%;
         }
         #usernameMessage{
            display: none;
            color: #000;
            position: relative;
            padding: 20px;
            height:10vh;
            width: 100%;
         }

        #message p ,#usernameMessage p{
            margin-top: 0rem;
            font-size: 12px;
            line-height: 0.5; 
         }

       
        .valid {
          color: green;
        }

        .valid:before {
          position: relative;
          left: -10px;
          content: "✔";
        }

       
        .invalid {
          color: red;
          font-weight: bolder;
          font-family: 'Montserrar';
        }

        .invalid:before {
          position: relative;
          left: -10px;
          content: "✖";
        }
        .roll{
            width: 100%;
            height: fit-content;
            padding: 0.5rem 0.5rem;
            border: 2px solid var(--primarycolor);
            border-radius: 1rem;
        }
    </style>
</head>
<body>

<div class="container" id="container">
        <div class="form-container sign-up">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="signupForm" novalidate>
            <h1>Create Account</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <label for="roll">Employer/Seeker</label>
            <select name="roll" class="roll" required>
                <option value="seeker">Seeker</option>
                <option value="employer">Employer</option>
            </select>
            <input type="text" placeholder="Username" name="name" id="username" required>
            <div id="usernameMessage">
                <p id="usernameCapital" class="invalid">Starts with a <b>capital letter</b></p>
                <p id="usernameNumber" class="invalid">Contains at least one <b>number</b></p>
            </div>
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" name="pasw" id="password" placeholder="Enter your password" required>
            <div id="message">
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
            <button name="btn" type="submit">Sign Up</button>
        </form>
            
        </div>
        <div class="form-container sign-in">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h1>Log In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <input type="text" placeholder="Enter your Username" name="name" required>
                <input type="email" placeholder="Email" name="email" required>
                <div class="show">
                    <input type="password" name="pasw" id="loginPassword" placeholder="Enter your password" required>
                    <input type="checkbox" onclick="togglePassword()">
                </div>
                <a href="#">Forgot Your Password?</a>
                <button type="submit" name="login"> Log In</button>
            </form>
        
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friends!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Register</button>
                </div>
            </div>
        </div>
    </div>

    <script src="signup.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    var usernameInput = document.getElementById("username");
    var myInput = document.getElementById("password");
    var usernameMessage = document.getElementById("usernameMessage");
    var usernameCapital = document.getElementById("usernameCapital");
    var usernameNumber = document.getElementById("usernameNumber");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var signupForm = document.getElementById("signupForm");

    function toggleVisibility(element, show) {
        element.style.display = show ? "block" : "none";
    }

    usernameInput.onfocus = function() {
        toggleVisibility(usernameMessage, true);
    }

    usernameInput.onblur = function() {
        toggleVisibility(usernameMessage, false);
    }

    usernameInput.onkeyup = function() {
        var startsWithCapital = /^[A-Z]/.test(usernameInput.value);
        var hasNumber = /[0-9]/.test(usernameInput.value);

        usernameCapital.classList.toggle("valid", startsWithCapital);
        usernameCapital.classList.toggle("invalid", !startsWithCapital);
        usernameNumber.classList.toggle("valid", hasNumber);
        usernameNumber.classList.toggle("invalid", !hasNumber);
    }

        // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {  
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }
    
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {  
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {  
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }
    
    // Validate length
    if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
}

    signupForm.onsubmit = function(event) {
        var isUsernameValid = /^[A-Z]/.test(usernameInput.value) && /[0-9]/.test(usernameInput.value);
        var isPasswordValid = myInput.value.length >= 8 &&
                              /[a-z]/.test(myInput.value) &&
                              /[A-Z]/.test(myInput.value) &&
                              /[0-9]/.test(myInput.value);

        if (!isUsernameValid || !isPasswordValid) {
            event.preventDefault();
            alert("Please ensure all validation criteria are met before submitting the form.");
        }
    }
});
function togglePassword() {
    var passwordField = document.getElementById("loginPassword");
    var checkbox = document.querySelector('.show input[type="checkbox"]');
    if (checkbox.checked) {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}
</script>
</body>

</html>
