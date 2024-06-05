<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

require '../functions.php';

// PAGINATION
// CONFIGURATION
$dataAmtPerPage = 5;
$dataAmt = count(query("SELECT * FROM movies"));
$pageAmt = ceil($dataAmt / $dataAmtPerPage);

// USING TERNARY
$activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
$firstData = ($dataAmtPerPage * $activePage) - $dataAmtPerPage;

// if (isset($_GET["page"])) {
//     $activePage = $_GET['page'];
// } else {
//     $activePage = 1;
// }

$movies = query("SELECT * FROM movies LIMIT $firstData, $dataAmtPerPage");
// $movies = query("SELECT * FROM movies ORDER BY id DESC");

// WHEN SEARCH BUTTON IS CLICKED
if (isset($_POST["search"])) {
    $movies = search($_POST["keyword"]);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../assets/img/display/title-logo-2.png" type="image/x-icon">

    <!-- CUSTOM CSS ON MY OWN -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- JQUERY SCRIPT -->
    <script src="../assets/js/jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="navbar">
        <div class="navbar-logo">CODEFLEX</div>
        <nav class="navbar bg-body-dark qwerty">
            <div class="container-fluid qwerty">
                <form class="d-flex" role="search" action="" method="post">
                    <input class="form-control me-2" type="text" name="keyword" placeholder="Search" aria-label="Search"
                        autofocus autocomplete="off" id="keyword" length="100">
                    <button class="btn btn-outline-light" name="search" id="search-button" type="submit">Search</button>
                    <img src="../assets/img/display/loader.gif" class="loader" style="padding: 0 5px; display: none;">
                </form>
            </div>
        </nav>
        <div class="btn-group qwerty">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Menu
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="profile.php">Admin Profile</a></li>
                <li><a class="dropdown-item" href="list-category.php">Category List</a></li>
                <li><a class="dropdown-item" href="../print.php" target="_blank">PDF Report</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="container cathegory">
        <div class="tombol qwerty">
            <!-- ADD DROPDOWN -->
            <!-- <div class="btn-group" style="float: left;">
                <button type="button" class="btn btn-success dropdown-toggle btn-lg" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-gear-fill" viewBox="0 0 16 16">
                        <path
                            d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                    </svg>
                    <span style="padding-left: 0.5rem;">Add</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../interact/add.php">Add Movies</a></li>
                    <li><a class="dropdown-item" href="../interact/add-cathegory.php">Add Cathegory</a></li>
                </ul>
            </div> -->
            <a href="../interact/add.php" style="float: left;">
                <button type="button" class="btn btn-success btn-lg">+ Add More</button>
            </a>

            <!-- PAGE NAVIGATION -->
            <nav class="qwerty" aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <!-- PREVIOUS BUTTON -->
                    <?php if ($activePage > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $activePage - 1; ?>">Previous</a>
                        </li>
                    <?php endif; ?>

                    <!-- PAGE BUTTON -->
                    <?php for ($i = 1; $i <= $pageAmt; $i++): ?>
                        <?php if ($i == $activePage): ?>
                            <li class="page-item active" aria-current="page"><a class="page-link"
                                    href="?page=<?= $i; ?>"><?= $i; ?></a></li>

                        <?php else: ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>

                            <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                        <?php endif; ?>
                    <?php endfor; ?>

                    <!-- NEXT BUTTON -->
                    <?php if ($activePage < $pageAmt): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $activePage + 1; ?>">Next</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>

        <table class="table table-striped table-bordered" id="con-table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Title</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Actors</th>
                    <th scope="col">Synopsis</th>
                    <th scope="col" class="qwerty">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php $i = 1;
                foreach ($movies as $mvs): ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></td>
                        <td><img src="../assets/img/<?= $mvs["poster"]; ?>" alt=""></td>
                        <td><?= $mvs["title"]; ?></td>
                        <td><?= $mvs["genre"]; ?></td>
                        <td><?= $mvs["actor"]; ?></td>
                        <td><?= $mvs["synopsis"]; ?></td>
                        <td class="qwerty">
                            <a href="../interact/edit.php?id=<?= $mvs["id"]; ?>"
                                class="badge text-bg-warning text-decoration-none">Edit</a>
                            <a href="../interact/delete.php?id=<?= $mvs["id"]; ?>"
                                onclick="return confirm('Are you sure?');"
                                class="badge text-bg-danger text-decoration-none">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <!-- CUSTOM JS -->
    <script src="../assets/js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>