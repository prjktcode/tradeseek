<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
    <h2>Post a Job</h2>
    <form method="post" action="post_job_form.php">
        <div class="mb-3">
            <label for="job_title" class="form-label">Job Title:</label>
            <input type="text" class="form-control" name="job_title" required>
        </div>

        <div class="mb-3">
            <label for="job_description" class="form-label">Job Description:</label>
            <textarea class="form-control" name="job_description" required></textarea>
        </div>

        <div class="mb-3">
            <label for="job_category" class="form-label">Job Category:</label>
            <input type="text" class="form-control" name="job_category" required>
        </div>

        <button type="submit" class="btn btn-primary">Post Job</button>
    </form>
</body>
</html>
