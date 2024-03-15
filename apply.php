<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body class="container mt-5">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_id = $_POST['job_id'];
    
    // Fetch job details
    $sql = "SELECT * FROM jobs WHERE id = $job_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Display job details with Bootstrap styling
        echo "<h2 class='mb-4'>{$row['job_title']}</h2>";
        echo "<p class='lead mb-4'>{$row['job_description']}</p>";

        // Input form for job application with Bootstrap styling
        echo "<form method='post' action='submitapp.php'>";
        echo "<input type='hidden' name='job_id' value='$job_id'>";
        echo "<div class='mb-3'>";
        echo "Your Name: <input type='text' class='form-control' name='applicant_name' required>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "Your Email: <input type='email' class='form-control' name='applicant_email' required>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "Short Message: <textarea class='form-control' name='short_message' required></textarea>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Submit Application</button>";
        echo "</form>";
    } else {
        echo "<p class='alert alert-danger mt-3'>Job not found.</p>";
    }
}

$conn->close();
?>

</body>
</html>
