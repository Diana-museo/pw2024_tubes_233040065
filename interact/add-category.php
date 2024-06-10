<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

require '../functions.php';

// CHECKING WHETHER SUBMIT BUTTON HAS BEEN PRESSED OR NOT
if (isset($_POST['submit'])) {

    if (addcat($_POST) > 0) {
        echo "
            <script>
                alert('New category added successfully!');
                document.location.href = '../layout/list-category.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Category failed to add!');
                document.location.href = '../layout/list-category.php';
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
    <title>Add Category Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/tambah.css">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../assets/img/display/title-logo-2.png" type="image/x-icon">

</head>

<body>
    <div class="container">
        <h2>Add Movies Category</h2>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="category_id" class="form-label">Category (Genre 1/Genre 2)</label>
                <input class="form-control" type="text" name="category_id" id="category_id">
            </div>
            <div class="mb-3 d-grid gap-2">
                <button class="btn btn-light" type="submit" name="submit">Add to Database</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>