<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Please log in first to access this page.');</script>";
    header("Location: /Job_act/component/registration/signup.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Wellcome to Admin Panel</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    *{
        margin: 0;
        padding: 0;
        background-color: black;
    }
    .dash_container{
        width: 100%;
        height: 98vh;
        border: 1px solid black;
    }
    
    .aside{
        width: 100%;
        height: 100%;
        position: relative;
        background-color: black;
    }
    .content::before{
        content: '';
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.836);
        width: 100%;
        height: 100%;
    }
    .content{
        z-index: 3;
        margin-top: -4rem;
        padding: 0rem 5rem;
        align-items: center;
        display: flex;
        width: 100%;
        height: 100%;
        align-items: center;
        position: relative;
        background: url(blog1.jfif);
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }
    .content h1{
        color: white;
        font-size: 5rem;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        z-index: 200;
        background: transparent;
    }
    .content h1 strong{
        background: transparent;
    }
    #table{
        width: 97%;
        height: fit-content;
        margin: auto;
    }
    .table_container h2{
        font-family: 'Nunito';
        font-weight: bolder;
        background-color: #0076de;
        border-radius: 1rem;
        color: white;
        padding: 1rem 2rem;
    }
    .table_container{
        background-color: black;
        border-radius: 5px;
        width: 100%;
        /* border: 1px solid black; */
        height: fit-content;

    }
    .table_scroll{
        overflow-y: auto;
        overflow-x: hidden;
        height: 80vh;
        width: 100%;
    }
    .table1 {
        table-layout: fixed; /* Fixes the table layout */
        width: 100%;
    }

    .table1 th:nth-child(1), .table1 td:nth-child(1) { /* ID Column */
        width: 2%; /* Adjust as needed */
    }

    .table1 th:nth-child(2), .table1 td:nth-child(2) { /* Name Column */
        width: 7%; /* Adjust as needed */
    }

    .table1 th:nth-child(3), .table1 td:nth-child(3) { /* Email Column */
        width: 12%; /* Adjust as needed */
    }

    .table1 th:nth-child(4), .table1 td:nth-child(4) { /* Password Column */
        width: 20%; /* Make this smaller as needed */
        /* white-space: nowrap; */
        overflow: hidden;
        border-bottom: 1px solid #0076de;
        text-overflow: ellipsis;
    }

    .table1 th:nth-child(5), .table1 td:nth-child(5) { /* Action Column */
        width: 6%; /* Adjust as needed */
    }
    .table1 th:nth-child(6), .table1 td:nth-child(6) { /* Action Column */
        width: 10%; /* Adjust as needed */
    }

    .table1 th,
    .table1 td,
    .table th,
    .table td {
        text-align: center;
        color: white;
    }
    .table1 td,
     .table td{
        border-right: 1px solid #0076de;
        border-bottom: 1px solid #0076de;
        box-shadow: 0px 0px 2px 1px #0076de;
    }

    .table1 thead,
    .table thead {
        color: white;
    }

    .btn {
    margin: 2px;
    }
    #job_post{
        width: 100%;
        height: 110vh;
    }
    .form_container{
        width: 95%;
        height: 100%;
        /* border: 1px solid white; */
        margin: auto;
    }
    .form_container h2{
        font-family: 'Noto';
        background-color: #0076de;
        border-radius: 1rem;
        color: white;
        padding: 1rem 2rem;
    }
    

</style>
<body>
    <div class="dash_container">
        
        <div class="aside">
                <div class="content">
                    <h1><strong  style="font-size: 1rem; letter-spacing: 1rem;"> Hello Admin</strong> <br> Wellcome to <br> <strong style="color: rgb(0, 72, 180);">Job_</strong>
                        <strong style="color: rgb(241, 241, 241);">Act's</strong> Dashboard </h1>
                </div>
                <br>
                <br>
            <div id="table">
                <div class="table_container">
                    <h2>Users Data</h2>
                    <br>
                    <br>
                    <div class="table_scroll">
                        <table class="table1">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Roll</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'signup_connection.php';
                            
                                $query = "SELECT `id`, `username`, `email`, `password`, `roll` FROM `signup`"; // Update column names as needed
                            
                                $data = mysqli_query($conn, $query);
                            
                                if (!$data) {
                                    // Output SQL error if query fails
                                    echo "Error: " . mysqli_error($conn);
                                } else {
                                // Use mysqli_num_rows() safely
                                $num_rows = mysqli_num_rows($data);
                        
                                // Fetch and display results
                                while ($row = mysqli_fetch_assoc($data)) {
                                    echo "<tr>
                                            <td>{$row['id']}</td>
                                            <td>{$row['username']}</td>
                                            <td>{$row['email']}</td>
                                            <td>{$row['password']}</td>
                                            <td>{$row['roll']}</td>
                                            <td>
                                            <a class='btn btn-primary' href='update.php?id={$row['id']}'>Update</a>
                                            
                                            <a class='btn btn-danger' href='delete.php?id={$row['id']}'>Delete</a> <!-- Link to delete entry -->
                                            </td>
                                        </tr>";
                                }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div id="job_post">
                <div class="form_container">
                    <h2>Job_Post_Data</h2>
                    <br>
                    <div class="table_scroll">
                        <table class="table">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Catergory</th>
                                <th>Job-Title</th>
                                <th>Campany</th>
                                <th>City</th>
                                <th>Date</th>
                                <th>Salary</th>
                                <th>Job_Type</th>
                                <th>Location</th>
                                <th>Update/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include 'signup_connection.php';
                            
                                $query = "SELECT `id`, `Category`,`jobtitle`, `Company`, `City`, `date`, `salary`, `jobtype`, `location` FROM `job-listing`"; 
                            
                                $data = mysqli_query($conn, $query);
                            
                                if (!$data) {
                                    // Output SQL error if query fails
                                    echo "Error: " . mysqli_error($conn);
                                } else {
                                // Use mysqli_num_rows() safely
                                $num_rows = mysqli_num_rows($data);
                        
                                // Fetch and display results
                                while ($row = mysqli_fetch_assoc($data)) {
                                    echo "<tr>
                                            <td>{$row['id']}</td>
                                            <td>{$row['Category']}</td>
                                            <td>{$row['jobtitle']}</td>
                                            <td>{$row['Company']}</td>
                                            <td>{$row['City']}</td>
                                            <td>{$row['date']}</td>
                                            <td>{$row['salary']}</td>
                                            <td>{$row['jobtype']}</td>
                                            <td>{$row['location']}</td>
                                            <td>
                                            <a class='btn btn-primary' href='update.php?id={$row['id']}'>Update</a>
                                            
                                            <a class='btn btn-danger' href='delete.php?id={$row['id']}'>Delete</a> <!-- Link to delete entry -->
                                            </td>
                                        </tr>";
                                }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>