<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

require '../functions.php';

// FETCH THE DATA IN THE URL
$id = $_GET["id"];

// MOVIES QUERY DEPEND ON ID
$mvs = query("SELECT * FROM movies WHERE id = $id")[0];

// CHECKING WHETHER SUBMIT BUTTON HAS BEEN PRESSED OR                                                                                       NOT
if (isset($_POST["submit"])) {
    if (edit($_POST) > 0) {
        echo "
            <script>
                alert('Data successfully changed!');
                document.location.href = '../layout/header.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data failed to change!');
                document.location.href = '../layout/header.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movies List Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/tambah.css">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../assets/img/display/title-logo-2.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <h2>Edit Movies Data</h2>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $mvs['id']; ?>">
            <input type="hidden" name="oldPoster" value="<?= $mvs["poster"]; ?>">

            <div class="mb-3">
                <label for="poster" class="form-label">Poster Image</label>
                <img src="../assets/img/<?= $mvs['poster']; ?>" style="margin-bottom: 1rem;" width="150">
                <input class="form-control" type="file" name="poster" id="poster">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required value="<?= $mvs["title"]; ?>">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre (Genre1/Genre2)</label>
                <input type="text" name="genre" id="genre" class="form-control" required value="<?= $mvs["genre"]; ?>">
            </div>
            <div class="mb-3">
                <label for="actor" class="form-label">Actors (Actor1, Actor2, etc.)</label>
                <input type="text" name="actor" id="actor" class="form-control" required value="<?= $mvs["actor"]; ?>">
            </div>
            <div class="mb-3">
                <label for="synopsis" class="form-label">Synopsis</label>
                <input style="height: 100px;" type="text" class="form-control" name="synopsis" id="synopsis" rows="3"
                    required value="<?= $mvs["synopsis"]; ?>">
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input class="form-control" name="link" id="link" rows="3" required value="<?= $mvs["link"]; ?>">
            </div>
            <div class="mb-3 d-grid gap-2">
                <button class="btn btn-light" type="submit" name="submit">Edit List</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>