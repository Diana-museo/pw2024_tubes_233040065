<?php
require '../functions.php';
$movies = query("SELECT * FROM movies");
$films = query("SELECT * FROM movies WHERE id % 2 != 0");

// Periksa session untuk login admin
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CODEFLEX</title>
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
                <a href="#home" class="nav-link nav-active">
                    <i class='bx bx-home'></i>
                    <span class="nav-link-title">Home</span>
                </a>
                <a href="#trending" class="nav-link">
                    <i class='bx bxs-hot'></i>
                    <span class="nav-link-title">Trending</span>
                </a>
                <a href="explore-page.php" class="nav-link">
                    <i class='bx bx-compass'></i>
                    <span class="nav-link-title">Explore</span>
                </a>
                <a href="#movies" class="nav-link">
                    <i class='bx bx-tv'></i>
                    <span class="nav-link-title">Movies</span>
                </a>
            </div>
        </div>
    </header>

    <!-- HOME SECTION START -->
    <section class="home container" id="home">
        <img src="../assets/img/banner/MR-banner.jpg" alt="" class="home-img">
        <div class="home-text">
            <h1 class="home-title">The Maze <br>Runner</h1>
            <p>Thomas loses his memory and finds himself trapped in a massive maze called the Glade. He and his friends
                try to escape from the maze and eventually learn that they are subjects of an experiment.</p>
            <a href="play-page.php" class="watch-btn">
                <i class='bx bx-right-arrow'></i>
                <span>Watch the trailer</span>
            </a>
        </div>
    </section>
    <!-- HOME SECTION END -->

    <!-- POPULAR SECTION START -->
    <section class="popular container" id="trending">
        <!-- HEADING -->
        <div class="heading">
            <h2 class="heading-title">Popular Movies</h2>
            <!-- SWIPER BUTTONS -->
            <div class="swiper-btn">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <!-- CONTENT -->
        <div class="popular-content swiper" id="popular-content">
            <div class="swiper-wrapper">
                <?php foreach ($films as $flm): ?>
                    <div class="swiper-slide">
                        <div class="movie-box">
                            <img src="../assets/img/<?= $flm["poster"]; ?>" alt="">
                            <div class="box-text">
                                <h2 class="movie-title"><?= $flm["title"]; ?></h2>
                                <span class="movie-genre"><?= $flm["genre"]; ?></span>
                                <a href="play-page.php" class="watch-btn play-btn">
                                    <i class='bx bx-right-arrow'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- POPULAR SECTION END -->

    <!-- MOVIES SECTION START -->
    <section class="movies container" id="movies">
        <!-- HEADING -->
        <div class="heading">
            <h2 class="heading-title">Movies & Shows</h2>
        </div>
        <!-- MOVIES CONTENT -->
        <div class="movies-content" id="movies-content">
            <?php foreach ($movies as $mvs): ?>
                <div class="movie-box" id="movie-box">
                    <img src="../assets/img/<?= $mvs["poster"]; ?>" alt="" class="movie-box-img">
                    <div class="box-text">
                        <h2 class="movie-title"><?= $mvs["title"]; ?></h2>
                        <span class="movie-genre"><?= $mvs["genre"]; ?></span>
                        <a href="play-page.php" class="watch-btn play-btn">
                            <i class='bx bx-right-arrow'></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- MOVIES SECTION END -->

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