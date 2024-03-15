<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
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
    <div class="container mt-5">
        <h1>Contact Us</h1>
        <form action="send_email.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
