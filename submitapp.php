<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body class="container mt-5">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_id = $_POST['job_id'];
    $applicant_name = $_POST['applicant_name'];
    $applicant_email = $_POST['applicant_email'];

    // Save application to database (you may want to save resume to server and store the path)
    $sql = "INSERT INTO job_applications (job_id, applicant_name, applicant_email) VALUES ($job_id, '$applicant_name', '$applicant_email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p class='alert alert-success'>Application submitted successfully!</p>";
    } else {
        echo "<p class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

// Post Job Button
echo "<a href='job_db.php' class='btn btn-success'>View Jobs</a>";

echo "<a href='profile.php' class='btn btn-success'>Dashboard</a>";

$conn->close();
?>

</body>
</html>
