<?php
require '../functions.php';
$movies = query("SELECT * FROM movies");
$cat = query("SELECT * FROM category");

// Periksa session untuk login admin
session_start();

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    // Memanggil fungsi queryWithCategory() dengan parameter category_id
    $movies = queryWithCategory($category_id);
} else {
    // Jika category_id tidak tersedia, tampilkan semua film
    $movies = queryWithCategory(null);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Page</title>
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
            <div class="option">
                <div class="select-wrapper">
                    <form method="GET" class="place">
                        <select name="category_id">
                            <option value="">All</option>
                            <?php foreach ($cat as $category): ?>
                                <option value="<?= $category["id"]; ?>"><?= $category["genre"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="sort-button">Sort</button>
                    </form>
                </div>
            </div>
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
                <a href="play-page.php" class="nav-link">
                    <i class='bx bx-tv'></i>
                    <span class="nav-link-title">Movies</span>
                </a>
            </div>
        </div>
    </header>

    <section class="card-con container">
        <?php foreach ($movies as $mvs): ?>
            <figure class="card">
                <div class="card-hero">
                    <img class="card-img" src="../assets/img/<?= $mvs["poster"]; ?>" alt="">
                </div>
                <div class="card-content">
                    <h2><?= $mvs["title"]; ?></h2>
                    <h3><?= $mvs["genre"]; ?></h3>
                    <div class="h4">
                        <h4 class="star">Starring by:</h4>
                        <h4><?= $mvs["actor"]; ?></h4>
                    </div>
                    <p><?= $mvs["synopsis"]; ?></p>
                    <a href="<?= $mvs["link"]; ?>">
                        <i class='bx bx-link'></i>
                        <span>Watch the Trailer on Youtube</span>
                    </a>
                </div>
            </figure>
        <?php endforeach; ?>
    </section>

    <!-- FOOTER COPYRIGHT -->
    <div class="copyright">
        <p>&#169; Diana-Museo All Right Reserved</p>
        <div class="soc-med">
            <a href="">
                <i class='bx bxl-github'></i>
            </a>
            <a href="">
                <i class='bx bxl-instagram'></i>
            </a>
            <a href="">
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