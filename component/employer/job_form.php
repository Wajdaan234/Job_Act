<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Please log in first to access this page.');</script>";
    header("Location: /Job_act/component/registration/signup.php");
    exit();
}

// Categories array
$categories = ['Marketing', 'Software Engineer', 'Data Analyst', 'Sales Associate', 'Marketing Manager', 'Accountant', 'Graphic Designer', 'AI Artificial Intelligence'];
$jobtype = ['Full-Time', 'Part-Time', 'Contract', 'Internship'];

// Assuming the user's email is stored in the session
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$current_date = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Page - Job_act</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #1a1a1a; /* Slightly lighter black for contrast */
            border-radius: 8px;
        }

        .container h2 {
            color: #0055b3;
            font-size: 32px;
            margin-bottom: 20px;
            /* letter-spacing: 1rem; */
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            color: #ccc; /* Lighter grey for labels */
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 7px;
            font-size: 16px;
            border: 1px solid #333;
            border-radius: 4px;
            background-color: #000; /* Black input fields */
            color: #fff;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #0055b3; /* #0055b3 border on focus */
        }

        .submit-btn {
            background-color: #0055b3;
            color: #fff;
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: auto;

        }

        .submit-btn:hover {
            background-color: #004290; /* Darker blue on hover */
        }
        .btn {
            background-color: #0055b3; /* Accent color */
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            margin: 10px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #333; /* Darker secondary on hover */
        }
        .btn a{
            text-decoration: none;
            color: white;
            font-size: 18px;
        } 
        </style>
</head>
<body>

    <div class="navbar">
        <h1>JOB_ACT</h1>
        <button class="btn"><a href="employer_page.php">Back</a></button>
    </div>

    <div class="container">
           <h2>Job Post From</h2>
        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category">Job Category:</label>
                        <select name="category" id="category" class="form-control" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category ?>"><?= $category ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Job Title:</label>
                        <input type="text" id="title" name="jobtitle" placeholder="Enter your Job Title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="company">Company Name:</label>
                        <input type="text" id="company" name="company" placeholder="Enter your Company name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" placeholder="Enter your City" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="item">Short Detail:</label>
                        <textarea type="text" id="item" placeholder="At least 2 lines" name="item" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="job_type">Job Type:</label>
                        <select name="job_type" id="job_type" class="form-control" required>
                            <?php foreach ($jobtype as $type): ?>
                                <option value="<?= $type ?>"><?= $type ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary:</label>
                        <div style="display: flex;">
                            <input type="number" id="salary" name="salary" class="form-control" placeholder="Min" required style="margin-right: 10px;">
                            <input type="number" id="maxsalary" name="maxsalary" class="form-control" placeholder="Max" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="location">Job Location:</label>
                        <input type="text" id="location" placeholder="Enter your Company Location" name="location" class="form-control" required>
                    </div>
                    
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">Job Description:</label>
                        <textarea id="description" placeholder="Enter your Description Don't add extra line spacing after each line (/n)." name="detail" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input style="background-color: black;" type="date" id="date" name="date" class="form-control" value="<?php echo $current_date; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="edu">Education:</label>
                        <input type="edu" id="edu" name="education" placeholder="Required education level (e.g., Bachelor's, Master's, Ph.D.)" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="ex">Experience:</label>
                        <input type="text" id="ex" name="experiance" placeholder="Required Experience Level" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input  style="background-color: black;" type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($email); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="con">Contact:</label>
                        <input type="text" id="con" name="contact" placeholder="Provide company Contact" class="form-control" required>
                    </div>
                    
                <br>
                <br>
                <button type="submit" class="submit-btn" name="btn">Post Job</button>
                </div>
            </div>

            
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
include 'signup_connection.php';

if (isset($_POST['btn'])) {
    // Collect and sanitize form inputs
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $item = mysqli_real_escape_string($conn, $_POST['item']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $maxsalary = mysqli_real_escape_string($conn, $_POST['maxsalary']);
    $jobtype = mysqli_real_escape_string($conn, $_POST['job_type']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $detail = mysqli_real_escape_string($conn, $_POST['detail']);
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $experiance = mysqli_real_escape_string($conn, $_POST['experiance']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);

    // Use session email directly
    $email = $_SESSION['email'];

    // SQL Query
    $query = "INSERT INTO `job-listing`(`Category`, `jobtitle`, `Company`, `City`, `item`, `date`, `salary`, `maxsalary`, `jobtype`, `location`, `detail`, `education`, `experiance`, `email`, `contact`) 
              VALUES ('$category','$jobtitle','$company','$city','$item','$date','$salary','$maxsalary','$jobtype','$location','$detail','$education','$experiance','$email','$contact')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Job Post Successful');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>
