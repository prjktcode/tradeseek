<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Database</title>
    <link rel="stylesheet" href="nav.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<header class="bg-light p-3">
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
    </header>

<body class="container mt-5">
    <div class="container text-center">
        <h2 class="light">Job Dashboard</h2>
        <form class="mt-3" method="GET" action="job_db.php">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search Jobs" name="search">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>

<?php
if (isset($_GET['search'])) {
    // Handle search query
    $search = $_GET['search'];
    $sql = "SELECT * FROM jobs WHERE job_title LIKE '%$search%' OR job_description LIKE '%$search%'";
} else {
    // Default SQL query for initial display
    $sql = "SELECT * FROM jobs ORDER BY date_posted DESC";
}

// Fetch and display jobs
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display jobs
    while ($row = $result->fetch_assoc()) {
        // Display job details
        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<h2 class='card-title'>{$row['job_title']}</h2>";
        echo "<p class='card-text'>{$row['job_description']}</p>";
        echo "<p class='card-text'>Category: {$row['job_category']}</p>";
        echo "<p class='card-text'>Date Posted: {$row['date_posted']}</p>";

        // Respond to Job Button
        echo "<form method='post' action='apply.php'>";
        echo "<input type='hidden' name='job_id' value='{$row['id']}'>";
        echo "<button type='submit' class='btn btn-primary'>Respond to Job</button>";
        echo "</form>";

        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p class='lead'>No jobs available.</p>";
}

// Post Job Button
echo "<a href='post_job.php' class='btn btn-success'>Post a Job</a>";

$conn->close();
?>

</body>
</html>
