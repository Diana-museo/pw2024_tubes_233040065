<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

require '../functions.php';

$category = query("SELECT * FROM category");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../assets/img/display/title-logo-2.png" type="image/x-icon">

    <!-- CUSTOM CSS ON MY OWN -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .title {
            padding: 2.5rem 0;
            text-align: center;
        }

        .content {
            width: 50%;
            margin: 0 auto;
            text-align: center;
        }

        .content table {
            margin: 0 auto;
        }

        .table {
            width: 100%;
        }

        .budon {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .id-column {
            width: 10%;
        }

        .genre-column {
            width: 90%;
        }

        .table thead tr .id-column,
        .table thead tr .genre-column,
        .table tbody tr .id-column {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="navbar-logo">CODEFLEX</div>
        <div class="btn-group qwerty">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Menu
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="header.php">Admin Dashboard</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="container title">
        <h1>Category Dashboard</h1>
    </div>
    <div class="container content">
        <div class="budon qwerty">
            <a href="../interact/add-cathegory.php">
                <button type="button" class="btn btn-success">
                    <i class="bi bi-plus-lg" style="font-size: 20px;">+</i>
                    <span style="padding-left: 0.5rem;">Add Category</span>
                </button>
            </a>
        </div>
        <div class="tables">
            <table class="table table-dark table-bordered border-dark table-striped">
                <thead>
                    <tr>
                        <th scope=" col" class="id-column">Id Category</th>
                        <th scope="col" class="genre-column">Genre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($category as $cat): ?>
                        <tr>
                            <th scope="row" class="id-column"><?= $i++; ?></td>
                            <td><?= $cat["genre"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>