<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: /Job_act/component/registration/signup.php");
    exit();
}
$profilePicUrl = isset($_SESSION['image']) ? $_SESSION['image'] : 'uploads/image/default-profile.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Page | JOB_ACT</title>
    <link rel="icon" type="image/x-icon" href="/Job_act/component/employer/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color: #000; /* Black background */
            color: #fff; /* White text */
        }

        .navbar {
            background-color: #000;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            color: #0055b3; /* Minimal #0055b3 accent */
            font-size: 40px;
            margin: 0;
            font-weight: bolder;
        }
        .navbar .profile-pic {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #0055b3; /* Accent color border */
        }

        .navbar .profile-pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .container {
            max-width: 800px;
            margin: 120px auto;
            padding: 20px;
            background-color: #111; /* Slightly lighter black */
            border-radius: 10px;
            text-align: center;
        }

        .container h1 {
            color: #0055b3; /* Accent color */
            font-size: 36px;
            margin-bottom: 10px;
        }

        .container h2 {
            color: #fff;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .intro-text {
            color: #bbb;
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .actions {
            margin-top: 30px;
        }

        .navbar .btn {
            background-color: #0055b3; /* Accent color */
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            margin: 10px;
            display: inline-block;
            border: none;
            transition: background-color 0.3s ease;
        }
        .navbar .btn a{
            color: white;
            text-decoration: none;
        }
        .actions .btn {
            text-decoration: none;
            color: #fff;
            background-color: #0055b3; /* Accent color */
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 18px;
            margin: 10px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .actions .btn.secondary {
            background-color: #444; /* Secondary button color */
        }

        .actions .btn:hover {
            background-color: #003d80; /* Darker accent on hover */
        }

        .actions .btn.secondary:hover {
            background-color: #333; /* Darker secondary on hover */
} 
        
    </style>
</head>
<body>
    <div class="navbar">
        <h1>JOB_ACT</h1>
        <a href="profile_picture.php"><div class="profile-pic">
            <img src="<?php echo htmlspecialchars($profilePicUrl); ?>" alt="Profile Picture">
        </div></a>
        <button class="btn"><a href="/Job_act/component/security_functions/logout.php">Logout <span><i class="fas fa-sign-out"></i></span></a></button>
    </div>
    <div class="container">
        <h1>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <h2>Welcome to the Employer Page</h2>
        <p class="intro-text">
            We're glad to have you on board! This page is your gateway to managing job postings, 
            viewing applicants, and much more. Explore the features and let's build a great team together.
        </p>
        <div class="actions">
            <a href="/Job_act/component/employer/job_form.php" class="btn">Post a New Job</a>
            <a href="/Job_act/component/employer/view_jobs.php" class="btn secondary">View Posted Jobs</a>
        </div>
    </div>
    
    
</body>
</html>
