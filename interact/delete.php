<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

require '../functions.php';

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "
        <script>
            alert('Data deleted successfully!');
            document.location.href = '../layout/header.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('Data failed to delete!');
            document.location.href = '../layout/header.php';
        </script>
        ";
}
?>