<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Please log in first to access this page.');</script>";
    header("Location: /Job_act/component/registration/signup.php");
    exit();
}
?>
<?php
include 'signup_connection.php';

// Fetch jobs from the database
$query = "SELECT * FROM `job-listing`";
$result = mysqli_query($conn, $query);
$jobs = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $jobs[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="media.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Job Act</title>
</head>
<style>
    
    @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
        :root {
            --primarycolor: #0076de;
            --whitecolor: #fff;
            --blackcolor: #000000;
            --greycolor: #f6f8fa;
            --labelcolor: #64b1f5;
            --yellowcolor: #ffd723;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            font-family: 'Nunito';
        }
        html {
            scroll-behavior: smooth;
        }
        body {
            width: 100%;
            background-color: black;
            height: auto;
        }
        .heading {
            font-size: 1.2rem;
            color: #ddd;
            padding: 0.5rem 4rem;
        }
        .logo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            height: fit-content;
            color: #ddd;
            padding: 1rem 4rem;
        }
        .left-side {
            width: 40rem;
        }
        .left-side > a, .right-side > a {
            text-decoration: none;
            font-weight: bolder;
            font-size: 2rem;
            color: rgb(255, 255, 255);
        }
        .search-wrapper {
            width: 90%;
            margin: auto;
            min-width: 400px;
            height: 3.5rem;
            position: relative; 
        }
        .search-box {
            width: 100%;
            position: absolute;
            background-color: var(--greycolor);
            box-shadow: rgba(2,11,20,0.2) 0px 5px 15px;
            height: 100%;
            width: 100%;
        }
        .search-card {
            display: flex;
            justify-content: space-between;
            height: 100%;
            padding: 0.5rem;
        }
        .search-input {
            height: 100%;
            width: 100%;
            border: none;
            padding: 0.5rem;
        }
        .search-btn {
            width: 200px;
            background: var(--primarycolor);
            border: none;
            color: var(--whitecolor);
            border-radius: 0.5rem;
            cursor: pointer;
        }
        .search-btn:hover {
            background-color: var(--whitecolor);
            border: 2px solid var(--primarycolor);
            color: var(--primarycolor);
            transition: 0.3s;
            border-radius: 0.5rem;
        }
        .filter-title {
            font-size: 1.5rem;
            padding: 1rem 4rem;
            color: #ddd;
        }
        .filter-chosen {
            width: 95%;
            padding: 0.3rem 4rem;
            display: flex;
            flex-wrap: wrap;
            margin: auto;
            gap: 0.5rem;
            border-bottom: 1px solid var(--primarycolor);
        }
        .nav-link {
            background: var(--primarycolor);
            padding: 0.2rem 0.7rem;
            border-radius: 20px;
            color: white;
            font-size: 0.9rem;
            cursor: pointer;
            transition: 0.7s;
        }
        .nav-link a {
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            font-weight: bolder;
        }
        .nav-link:hover {
            background-color: var(--blackcolor);
            color: rgb(2, 2, 2);
        }
        .content-container {
            display: none;
            width: 80%;
            height: fit-content;
            /* overflow: hidden; */
            /* border: 1px solid red; */
            margin: auto;
            gap: 5px;
        }
        .job_list_flex{
            display: flex;
            flex-direction: column;
            /* border: 1px solid blueviolet; */
            width: 40%;
            height: fit-content;
            margin: auto;
        }
        .summary {
            width: 100%;
            color: #ffffff;
            /* border: 2px solid green; */
            height: fit-content;
            display: flex;
            flex-direction: column;
            flex: 1;
            color: #ffffff;
            margin-right: 10px; 
        }
        .detail-section {
            flex: 1; 
            display: flex;
            flex-direction: column;
            border-radius: 1rem;
            margin-top: 0rem;
            z-index: 100;
            /* border: 1px solid red; */
            width: 60%;
            overflow: hidden;
            height: 100vh;
            position: relative;
        }
        .details {
            width: 100%;
            padding: 20px;
            display: none;
            background-color: #000000;
            border: 1px solid rgb(1, 124, 173);
            border-radius: 1rem;
            color: white;
            height: 100%;
            position: absolute;
        }
        .details.active {
            display: block;
        }
        .jscs {
            width: 100%;
            height: fit-content;
            border: 1px solid rgb(1, 124, 173);
            border-radius: 1rem;
            padding: 1rem 2rem;
            margin-bottom: 10px; 
        }
        .jscs p:nth-child(2){
            color: #b6b6b6;
        }

        .jscs ul {
            list-style-type: circle;
        }
        .item {
            font-size: 0.8rem;
        }
        .details p:nth-of-type(1){
            font-size: 0.8rem;
        }
        .apply-btn{
            display: flex;
            flex-direction: row;
            gap: 0.6rem;
        }
        .apply-btn button:nth-of-type(1){
            background-color: var(--primarycolor);
            padding: 0.7rem;
            border-radius: 1rem;
            color: white;
            font-family: 'Nunito';
            border: none;
        }
        .apply-btn button:nth-of-type(2){
            border: none;
            background: transparent;
            color: white;
            font-size: 1rem;
        }

        .scrollable-div{
            width: 100%;
            height: 60vh;
            overflow-x: hidden;
            overflow-y: auto ;
            padding-bottom: 1rem;
            border: none;
            background-color: transparent;
        }
        .details h2:nth-of-type(2){
            font-family: 'Noto';
            font-weight: bolder;
            font-size: 1.5rem;
        }
        .grey-btn{
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        .grey-btn i{
            font-size: 0.8rem;
        }
        .grey-btn p:nth-of-type(2){
            font-size: 0.85rem;
        }
        .grey-btn strong{
            background: var(--labelcolor);
            color: black;
            border-radius: 1rem;
            padding: 0rem 1rem;
        }

        .scrollable-div ul {
            list-style-type: circle;
            /* list-style-position: inside; */
            padding-left: 20px;
            color: rgb(180, 180, 180);
        }

        .scrollable-div li {
            margin-bottom: 10px; 
        }

        .ul-li h3, .ul-li p{
            color: rgb(180, 180, 180);
        }
        .ul-li h4, .ul-li h2{
            color: rgb(226, 226, 226);
        }
        .salary{
            border: 1px solid var(--primarycolor);
            width: fit-content;
            padding: 0.2rem 0.7rem;
            background-color: var(--primarycolor);
            border-radius: 0.7rem;
            font-size: 12px;
        }
</style>
<body>
    <h1 class="heading">JOB<span>ACT</span></h1>
    <div class="logo">
        <div class="left-side">
            <a href="#">FI<span>ND YOUR JO</span>BS <i style="font-size: 10px; color: #0076de;" class="fas fa-search"></i></a>
        </div>
        <div class="right-side">
            <a href="/Job_act/component/security_functions/logout.php" style="font-size: 1rem; font-family: 'Nunit';">Logout <span><i class="fas fa-sign-out"></i></span></a>
        </div>
    </div>
    <div class="search-wrapper">
        <div class="search-box">
            <div class="search-card">
                <input type="text" placeholder="Job title or keyword" class="search-input">
                <button class="search-btn"><i class="fas fa-search"></i> Search</button>
            </div>
        </div>
    </div>
    <br>
    <h3 class="filter-title"><span>POPULAR</span> JOBS</h3>
    <div class="filter-chosen">
        <?php
        $categories = ['Marketing', 'Software Engineer', 'Data Analyst', 'Sales Associate', 'Marketing Manager', 'Accountant', 'Graphic Designer', 'AI Artificial Intelligence'];
        foreach ($categories as $category) {
            echo '<div data-category="' . $category . '" class="nav-link"><a href="#">' . $category . '</a></div>';
        }
        ?>
    </div>
    <br>
    <div class="content-container">
       <div class="job_list_flex">
          <?php foreach ($jobs as $job): ?> 
                <div id="summary<?= $job['id'] ?>" class="summary" data-category="<?= $job['Category'] ?>">
                    <div class="jscs" onclick="toggleDetails('details<?= $job['id'] ?>')">
                        <h2><?= $job['jobtitle'] ?></h2>
                        <br>
                        <p><?= $job['Company'] ?><br><?= $job['City'] ?></p>
                        <br>
                        <div class="item">
                        <?php
                        include 'signup_connection.php';
                            // Example content
                            $text = $job['item'];

                            // Convert the text into a list
                            $lines = explode("\n", $text);
                            echo "<ul>";
                            foreach ($lines as $line) {
                                echo "<li>" . htmlspecialchars($line) . "</li>";
                            }
                            echo "</ul>";
                        ?>
                        </div>
                        <br>
                        <p style="font-size: 0.8rem;">Active <?= $job['date'] ?><b>More....</b></p>
                    </div>
                </div>
            <?php endforeach; ?> 
        </div>
        <div class="detail-section">
            <?php foreach ($jobs as $job): ?>
                    <div id="details<?= $job['id']?>" class="details">
                        <h2><?= $job['jobtitle'] ?></h2>
                        <br>
                        <p><em><?= $job['Company'] ?> <i class="fa">&#xf08e;</i></em> <br><?= $job['City'] ?></p>
                        <br>
                        Salary:
                        <br>
                        <p class="salary"> Rs <?= $job['salary'] ?> - Rs <?= $job['maxsalary'] ?></p>
                        <br>
                        <div class="apply-btn">
                            <button>Apply now <i class="fa">&#xf08e;</i></button>
                            <button><i class="fa">&#xf02e;</i></button>
                        </div>
                        <br>
                        <div class="scrollable-div">
                            <h2>Job detail</h2>
                            <p>Here's how the job detail aligns with your <em>profile <i class="fa">&#xf08e;</i></em></p>
                            <br>
                            <div class="grey-btn">
                                <i class="fas fa-credit-card"></i><p>Pay  <strong> <?= $job['salary'] ?> to <?= $job['maxsalary'] ?>  a month</strong></p>
                                <i class="fas fa-briefcase"></i><p>Job-type  <strong> <?= $job['jobtype'] ?></strong></p>
                            </div>
                            <br>
                            <br>
                            <h2>Location</h2>
                            <br>
                            <p><i class="fa fa-map-marker"></i> <?= $job['location'] ?></p>
                            <br>
                            <h2>Full job description</h2>
                            <br>
                            <div class="ul-li">

                                <?php
                                include 'signup_connection.php';
                                    // Example content
                                    $text = $job['detail'];

                                    // Convert the text into a list
                                    $lines = explode("\n", $text);
                                    echo "<ul>";
                                    foreach ($lines as $line) {
                                        echo "<li>" . htmlspecialchars($line) . "</li>";
                                    }
                                echo "</ul>";
                                ?>
                                <br>
                                <h3 style="color: white; ">Education:</h3>
                                <br>
                                <?php
                                    include 'signup_connection.php';
                                    $text = $job['education'];

                                    // Convert the text into a list
                                    $lines = explode("\n", $text);
                                    echo "<ul>";
                                    foreach ($lines as $line) {
                                        echo "<li>" . htmlspecialchars($line) . "</li>";
                                    }
                                echo "</ul>";
                                ?>
                                <br>
                                <h3 style="color: white;">Experiance:</h3>
                                <br>
                                <?php
                                    include 'signup_connection.php';
                                    $text = $job['experiance'];

                                    // Convert the text into a list
                                    $lines = explode("\n", $text);
                                    echo "<ul>";
                                    foreach ($lines as $line) {
                                        echo "<li>" . htmlspecialchars($line) . "</li>";
                                    }
                                echo "</ul>";
                                ?>
                                <br>
                                <h3 style="color: white;">Email:</h3>
                                <br>
                                <?php
                                    include 'signup_connection.php';
                                    $text = $job['email'];

                                    // Convert the text into a list
                                    $lines = explode("\n", $text);
                                    echo "<ul>";
                                    foreach ($lines as $line) {
                                        echo "<li>" . htmlspecialchars($line) . "</li>";
                                    }
                                echo "</ul>";
                                ?>
                                <br>
                                <h3 style="color: white;">Contact:</h3>
                                <br>
                                <?php
                                    include 'signup_connection.php';
                                    $text = $job['contact'];

                                    // Convert the text into a list
                                    $lines = explode("\n", $text);
                                    echo "<ul>";
                                    foreach ($lines as $line) {
                                        echo "<li>" . htmlspecialchars($line) . "</li>";
                                    }
                                echo "</ul>";
                                ?>
                            </div>   
                        </div>
                    </div>
            <?php endforeach; ?> 
        </div>
    </div>

    <script>
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                
                // Get selected category
                const category = this.getAttribute('data-category');

                // Show content container
                document.querySelector('.content-container').style.display = 'flex' ;

                // Hide all summaries
                document.querySelectorAll('.summary').forEach(summary => {
                    summary.style.display = 'none';
                });

                // Hide all details
                document.querySelectorAll('.details').forEach(detail => {
                    detail.classList.remove('active');
                });

                // Show the relevant summaries based on the category
                document.querySelectorAll('.summary[data-category="' + category + '"]').forEach(summary => {
                    summary.style.display = 'block';
                });
            });
        });

        // Toggle details visibility
        function toggleDetails(detailId) {
            // Close all details
            document.querySelectorAll('.details').forEach(detail => {
                if (detail.id !== detailId) {
                    detail.classList.remove('active');
                }
            });

            // Toggle the clicked detail
            const details = document.getElementById(detailId);
            details.classList.toggle('active');
        }

        // Initially hide the content container
        window.addEventListener('load', () => {
            document.querySelector('.content-container').style.display = 'none' ;
        });
    </script>
</body>
</html>
