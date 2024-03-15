<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

include 'database.php';

$user_id = $_SESSION["user"];
$full_name = "";

// Fetch user details from the database
$sql = "SELECT full_name, profile_picture, job_title, user_description FROM users WHERE id = ?";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $full_name = $row['full_name'];
    $profile_picture = $row['profile_picture'];
    $job_title = $row['job_title'];
    $user_description = $row['user_description'];
} else {
    // Handle database error
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="nav.css">
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"></head>
<body>
<header class="bg-light p-3">
    <nav class="container d-flex justify-content-between align-items-center">
        <a href="index.php" class="logo">TradeSeek</a>
        <div class="header-right d-flex">
            <a class="a-header" href="job_db.php">Find Work</a>
            <a class="a-header" href="post_job.php">Post a Job</a>
            <a class="a-header" href="how-it-works.php">How it Works</a>

            <?php if (isset($_SESSION["user"])) : ?>
                <a class="a-header" href="profile.php">Profile Page</a>
                <a class="a-header" href="logout.php">Log Out</a>
            <?php else : ?>
                <a class="a-header" href="registration.php">Sign Up</a>
                <a class="a-header" href="login.php">Log In</a>
            <?php endif; ?>
        </div>

    </nav>
    <div class="container text-center">
        <h2 class="light">Hire Tradesmen. Get it done.</h2>
        <form class="mt-3">
            <input type="text" placeholder="Find Work" class="form-control mb-3">
            <button class="btn btn-primary px-4">Search</button>
        </form>
       <?php if (isset($_GET['search'])) {
            // Handle search query
                $search = $_GET['search'];
                $sql = "SELECT * FROM jobs WHERE job_title LIKE '%$search%' OR job_description LIKE '%$search%'";
}           else {
                // Default SQL query for initial display
                $sql = "SELECT * FROM jobs ORDER BY date_posted DESC";
}           
    ?>
    </div>

    <div class="container">
        <h1>Welcome <?php echo $full_name; ?></h1>

        <form action="update_profile.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture:</label>
                <input type="file" name="profile_picture" id="profile_picture" class="form-control">
            </div>
            <div class="mb-3">
                <label for="job_title" class="form-label">Job Title:</label>
                <input type="text" name="job_title" id="job_title" value="<?php echo $job_title; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="user_description" class="form-label">User Description:</label>
                <textarea name="user_description" id="user_description" class="form-control"><?php echo $user_description; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</body>
</html>
