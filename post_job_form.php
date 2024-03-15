<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="nav.css">

    <title>Job Posting Page</title>
</head>

<nav class="container d-flex justify-content-between align-items-center">
        <a href="index.php" class="logo">TradeSeek</a>
        <div class="header-right d-flex">
            <a class="a-header" href="job_db.php">Find Work</a>
            <a class="a-header" href="post_job.php">Post a Job</a>
            <a class="a-header" href="contact.php">Contact Us</a>

            <?php if (isset($_SESSION["user"])) : ?>
                <a class="a-header" href="profile.php">Profile Page</a>
                <a class="a-header" href="includes/logout.inc.php">Log Out</a>
            <?php else : ?>
                <a class="a-header" href="registration.php">Sign Up</a>
                <a class="a-header" href="login.php">Log In</a>
            <?php endif; ?>
        </div>

    </nav>
<body class="container mt-5">

<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_title = $_POST['job_title'];
    $job_description = $_POST['job_description'];
    $job_category = $_POST['job_category'];

    // Validate job data
    if (empty($job_title) || empty($job_description) || empty($job_category)) {
        echo "<div class='alert alert-danger' role='alert'>Please fill in all the required fields.</div>";
    } else {
        // Insert job into the database
        $sql = "INSERT INTO jobs (job_title, job_description, job_category) VALUES ('$job_title', '$job_description', '$job_category')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Job posted successfully!</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }
}

// Post Job Button
echo "<a href='job_db.php' class='btn btn-primary'>Jobs</a>";
echo "<a href='profile.php' class='btn btn-secondary'>Dashboard</a>";

$conn->close();
?>

</body>
</html>
