<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TradeSeek</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="nav.css">
</head>
<body>
<header class="bg-light p-3">
    <nav class="container d-flex justify-content-between align-items-center">
        <a href="index.php" class="logo">TradeSeek</a>
        <div class="header-right d-flex">
            <a class="a-header" href="job_db.php">Find Work</a>
            <a class="a-header" href="post_job.php">Post a Job</a>
            <a class="a-header" href="contact.php">Contact Us</a>

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
            <input type="text" placeholder="Find Freelancers" class="form-control mb-3">
            <button class="btn btn-primary px-4">Search</button>
        </form>
    </div>
</header>

<div class="hero-section bg-light">
    <div class="container text-center py-5">
        <div class="text-box">
            <h1 class="herotitle">Need a tradesman? Look no further.</h1>
            <p class="herotext">Whether you're looking for work, or need something done, we can help.</p>
        </div>
        <div class="mt-4">
            <a href="login.php" class="btn btn-primary herobutton">Sign In</a>
            <a href="registration.php" class="btn btn-primary herobutton">Sign Up</a>
        </div>
    </div>
</div>

<main class="container py-5">
    <section class="mb-5">
        <div class="row">
            <div class="col-md-6">
                <h2 class="homesubtitle">Find quality tradesmen</h2>
                <p class="px28">Whatever your needs, there will be a tradesman to get the job done. Whether it's plumbing, building, kitchen installations, or anything else, we offer a platform to connect you with tradesmen to ensure that nothing is left incomplete.</p>
                <a href="#" class="btn btn-primary">Find Tradesmen</a>
            </div>
            <div class="col-md-6">
                <img src="/tradeseek/images/carpenter.png" class="img-fluid" alt="Builder" width="400">
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div class="row">
            <div class="col-md-6">
                <h2 class="homesubtitle">Pay for work you trust</h2>
                <p class="px28">With TradeSeek's user rating system, you know exactly what service you will be getting, and that you will be getting quality work done. Never have poor work done again.</p>
                <a href="#" class="btn btn-primary">Learn More</a>
            </div>
        </div>
    </section>
    <section
