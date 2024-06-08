<?php
// CONNECT INTO THE DBMS, WE HAVE PREPARED
$conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040065');

function query($query)
{
    global $conn;

    // DO QUERY FOR MOVIES TABLE
    $result = mysqli_query($conn, $query);

    // FETCH THE MOVIES DATA
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function add($data)
{
    global $conn;

    // $poster = htmlspecialchars($data["poster"]);
    $title = htmlspecialchars($data["title"]);
    $genre = htmlspecialchars($data["genre"]);
    $actor = htmlspecialchars($data["actor"]);
    $synopsis = htmlspecialchars($data["synopsis"]);
    $link = htmlspecialchars($data["link"]);
    $category_id = htmlspecialchars($data["category_id"]);

    // RUN UPLOAD IMG FUNCTION FIRST
    $poster = upload();
    if (!$poster) {
        return false;
    }

    $query = "INSERT INTO movies
                VALUES
            (NULL, '$poster', '$title', '$genre', '$actor', '$synopsis', '$link', '$category_id')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function addcat($data)
{
    global $conn;

    $category_id = htmlspecialchars($data["category_id"]);

    $query = "INSERT INTO category
                VALUES
            (NULL, '$category_id')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $fileName = $_FILES['poster']['name'];
    $fileSize = $_FILES['poster']['size'];
    $error = $_FILES['poster']['error'];
    $tmpName = $_FILES['poster']['tmp_name'];

    // CHECK IF THERE IS NO IMAGE BEING UPLOADED
    if ($error === 4) {
        echo "<script> 
                alert('Please, select the image first!');
              </script>";
        return false;
    }

    // CHECK IF THE UPLOADED STUFF IS IMAGE OR NOT
    $validImgExtension = ['jpg', 'jpeg', 'png'];
    $ImgExtension = explode('.', $fileName);
    $ImgExtension = strtolower(end($ImgExtension));

    if (!in_array($ImgExtension, $validImgExtension)) {
        echo "<script>
                alert('What you are uploading is not an image! Please upload an image with the extension .jpg, .jpeg, or .png');
              </script>";
        return false;
    }

    // CHECK THE IMAGE SIZE
    if ($fileSize > 1000000) {
        echo "<script>
                alert('The image size you uploaded is too large! Please upload under 1 MB.');
              </script>";
        return false;
    }

    // GENERATE NEW IMAGE TITLE
    $newImgName = uniqid();
    $newImgName .= ".";
    $newImgName .= $ImgExtension;

    // IF IT PASSES THE CHECK, IMAGE CAN BE UPLOADED
    move_uploaded_file($tmpName, 'assets/img/' . $newImgName);

    return $fileName;
}

function delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM movies WHERE id = $id");

    return mysqli_affected_rows($conn);

}

function edit($data)
{
    global $conn;

    $id = $_GET["id"];
    // $poster = htmlspecialchars($data["poster"]);
    $oldPoster = htmlspecialchars($data["oldPoster"]);
    $title = htmlspecialchars($data["title"]);
    $genre = htmlspecialchars($data["genre"]);
    $actor = htmlspecialchars($data["actor"]);
    $synopsis = htmlspecialchars($data["synopsis"]);
    $link = htmlspecialchars($data["link"]);

    // CHECK IF USER NOT EDIT ANY IMAGE
    if ($_FILES['poster']['error'] === 4) {
        $poster = $oldPoster;
    } else {
        $poster = upload();
    }

    $query = "UPDATE movies SET
                poster = '$poster',
                title = '$title',
                genre = '$genre',
                actor = '$actor',
                synopsis = '$synopsis',
                link = '$link'
            WHERE id = $id
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function search($keyword)
{
    $query = "SELECT * FROM movies
                WHERE
                title LIKE '%$keyword%' OR
                genre LIKE '%$keyword%' OR
                actor LIKE '%$keyword%'
                -- synopsis LIKE '%$keyword%'
            ";

    return query($query);
}

function register($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // CHECK IF THE USERNAME IS ALREADY TAKEN OR NOT
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('This username has been taken!');
            </script>
        ";
        return false;
    }

    if ($password !== $password2) {
        echo "
            <script>
                alert('Password confirm does not match!');
            </script>
        ";
        return false;
    }

    // ENCRYPTED THE PASSWORD
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function queryWithCategory($category_id)
{
    global $conn;
    if ($category_id) {
        $query = "SELECT * FROM movies WHERE category_id = $category_id";
    } else {
        $query = "SELECT * FROM movies";
    }

    return mysqli_query($conn, $query);
}

?>