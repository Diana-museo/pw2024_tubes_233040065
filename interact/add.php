<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

require '../functions.php';

$category = query("SELECT * FROM category");

// CHECKING WHETHER SUBMIT BUTTON HAS BEEN PRESSED OR NOT
if (isset($_POST['submit'])) {

    if (add($_POST) > 0) {
        echo "
            <script>
                alert('Data added successfully!');
                document.location.href = '../layout/header.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data failed to add!');
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
    <title>Add Movies List Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/tambah.css">
</head>

<body>
    <div class="container">
        <h2>Add Movies Data</h2>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="poster" class="form-label">Poster Image</label>
                <input class="form-control" type="file" name="poster" id="poster">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre (Genre1/Genre2)</label>
                <input type="text" name="genre" id="genre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="actor" class="form-label">Actors (Actor1, Actor2, etc.)</label>
                <input type="text" name="actor" id="actor" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="synopsis" class="form-label">Synopsis</label>
                <input class="form-control" name="synopsis" id="synopsis" rows="3" required>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input class="form-control" name="link" id="link" rows="3" required>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Select Category</label>
                <select for="category_id" name="category_id" id="category_id" class="form-select"
                    aria-label="Default select example" required>
                    <option selected>Select</option>
                    <?php foreach ($category as $cat): ?>
                        <option value="<?= $cat["id"]; ?>"><?= $cat["genre"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3 d-grid gap-2">
                <button class="btn btn-light" type="submit" name="submit">Add to List</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>