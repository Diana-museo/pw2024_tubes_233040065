<?php
require '../functions.php';
$movies = query("SELECT * FROM movies");

// Periksa session untuk login admin
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Maze Runner</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../assets/img/display/title-logo-2.png" type="image/x-icon">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="../assets/css/user-view.css">

    <!-- CSS SWIPER VIA CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <!-- HEADER PART -->
    <header>
        <!-- NAVIGATION PART -->
        <div class="nav container">
            <!-- LOGO -->
            <a href="user-view.php" class="logo">
                CODEFLEX
            </a>

            <!-- LOGIN -->
            <div class="login-page">
                <?php
                if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
                    // SHOW LOGOUT BUTTON
                    echo '<a href="../logout.php" class="login-btn">Logout Here</a>';
                } else {
                    // SHOW LOGIN BUTTON
                    echo '<a href="../login.php" class="login-btn">Login Here</a>';
                }
                ?>
            </div>

            <!-- NAVBAR PART -->
            <div class="navbar">
                <a href="user-view.php" class="nav-link nav-active">
                    <i class='bx bx-home'></i>
                    <span class="nav-link-title">Home</span>
                </a>
                <a href="user-view.php #popular" class="nav-link">
                    <i class='bx bxs-hot'></i>
                    <span class="nav-link-title">Trending</span>
                </a>
                <a href="explore-page.php" class="nav-link">
                    <i class='bx bx-compass'></i>
                    <span class="nav-link-title">Explore</span>
                </a>
                <a href="user-view.php #movies" class="nav-link">
                    <i class='bx bx-tv'></i>
                    <span class="nav-link-title">Movies</span>
                </a>
            </div>
        </div>
    </header>

    <!-- PLAY MOVIE CONTAINER -->
    <div class="play-container container">
        <img src="../assets/img/banner/MR-banner.jpg" alt="" class="play-img">
        <!-- PLAY TEXT -->
        <div class="play-text">
            <h2>The Maze Runner</h2>
            <!-- RATINGS -->
            <div class="rating">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
                <i class='bx bx-star'></i>
            </div>

            <!-- TAGS -->
            <div class="tags">
                <span>Action</span>
                <span>Science-Fiction</span>
            </div>

            <!-- TRAILER BUTTON -->
            <a href="#" class="watch-btn">
                <i class='bx bx-right-arrow'></i>
                <span>Watch the trailer</span>
            </a>

            <!-- PLAY BUTTON -->
            <i class='bx bx-right-arrow play-movie'></i>

            <!-- VIDEO CONTAINER -->
            <div class="video-container">
                <!-- VIDEO BOX -->
                <div class="video-box">
                    <video id="myvideo" src="../assets/vid/TMR-Trailer.mp4" controls></video>
                    <!-- CLOSE BUTTON -->
                    <i class='bx bx-x close-video'></i>
                </div>
            </div>
        </div>
    </div>

    <!-- ABOUT SECTION -->
    <div class="about-movie container">
        <h2>The Maze Runner</h2>
        <p>Thomas loses his memory and finds himself trapped in a massive maze called the Glade. He and his friends try
            to escape from the maze and eventually learn that they are subjects of an experiment.</p>
        <h2 class="cast-heading">Movie Cast</h2>
        <div class="cast-box">
            <span class="cast-title">Thomas Brodie-Sangster,</span>
            <span class="cast-title">Dylan O'Brien,</span>
            <span class="cast-title">Kaya Scodelario,</span>
            <span class="cast-title">Will Poulter,</span>
            <span class="cast-title">Ki Hong Lee</span>
        </div>

    </div>

    <!-- FOOTER COPYRIGHT -->
    <div class="copyright">
        <p>&#169; Diana-Museo All Right Reserved</p>
        <div class="soc-med">
            <a href="https://github.com/Diana-museo/">
                <i class='bx bxl-github'></i>
            </a>
            <a href="https://www.instagram.com/eidxx_24/">
                <i class='bx bxl-instagram'></i>
            </a>
            <a href="https://www.linkedin.com/in/emeralda-iffatud-diana-973aa71b6/">
                <i class='bx bxl-linkedin-square'></i>
            </a>
        </div>
    </div>

    <!-- JS SWIPER VIA CDN -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- CUSTOM JS -->
    <script src="../assets/js/user-view.js"></script>

</body>

</html>