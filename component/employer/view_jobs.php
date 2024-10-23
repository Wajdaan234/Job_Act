<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['roll'] !== 'employer') {
    header("Location: /Job_act/component/registration/signup.php"); // Redirect to login if not logged in or not an employer
    exit();
}
?>
<?php

include 'signup_connection.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email']; // Get the logged-in employer's email

    // Step 1: Get the employer's data from signup table using email
    $sql = "SELECT email FROM `signup` WHERE `email` = '$email' AND `roll` = 'employer'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Step 2: Fetch jobs posted by this employer using the email
        $job_query = "SELECT * FROM `job-listing` WHERE `email` = '$email'"; // Assuming `email` is the correct column in job-listing table
        $job_result = mysqli_query($conn, $job_query);

        if (!$job_result) {
            die("Query failed: " . mysqli_error($conn));
        }
    } else {
        die("No employer found with this email.");
    }
} else {
    die("Email is not set in the session.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <title>Employer Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
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

        .table-container {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: #333; /* Dark background for the container */
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
            
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #555; /* Light grey border */
        }

        .table th {
            background-color: #444; /* Slightly lighter background for headers */
        }

        .table tr:nth-child(even) {
            background-color: #222; /* Alternating row color */
        }

        .table tr:hover {
            background-color: #555; /* Highlight row on hover */
        }

        .table th, .table td {
            color: #fff; /* White text color for table */
            border: 1px solid black;
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
        .table th:nth-child(1), .table1 td:nth-child(1) { /* ID Column */
        width: 9%; 
    }

    .table th:nth-child(2), .table1 td:nth-child(2) { /* Name Column */
        /* width: 7%;  */
    }

    .table th:nth-child(3), .table1 td:nth-child(3) { /* Email Column */
        /* width: 12%;  */
    }

    .table th:nth-child(4), .table1 td:nth-child(4) { /* Password Column */
        /* width: 20%;  */
    }

    .table th:nth-child(5), .table1 td:nth-child(5) { /* Action Column */
        /* width: 6%;  */
    }
    .table th:nth-child(6), .table1 td:nth-child(6) { /* Action Column */
        width: 8%; 
    }

    </style>
</head>
<body>
    <div class="navbar">
        <h1>JOB_ACT</h1>
        <button class="btn"><a href="employer_page.php">Back</a></button>
    </div>
    <div class="table-container">
    
        <h2><?php echo $_SESSION['username']; ?> Your Posted Jobs:</h2>
        

        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Jobtitle</th>
                    <th>Salary</th>
                    <th>Max-salary</th>
                    <th>Jobtype</th>
                    <th>Education</th>
                    <th>Experience</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($job_result) > 0) {
                    while ($row = mysqli_fetch_assoc($job_result)) {
                        echo "<tr>
                                <td>{$row['date']}</td>
                                <td>{$row['Category']}</td>
                                <td>{$row['jobtitle']}</td>
                                <td>{$row['salary']}</td>
                                <td>{$row['maxsalary']}</td>
                                <td>{$row['jobtype']}</td>
                                <td>{$row['education']}</td>
                                <td>{$row['experiance']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No job postings found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
