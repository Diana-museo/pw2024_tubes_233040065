<?php
session_start();
require 'functions.php';

// CHECK COOKIE
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // FETCH USERNAME DEPEND ON ID
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // CHECK COOKIE = USERNAME
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }

}

if (isset($_SESSION["login"])) {
    header("Location: layout/header.php");
    exit;
}


if (isset($_POST['login'])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            // SET THE SESSION
            $_SESSION["login"] = true;

            // CHECK REMEMBER ME
            if (isset($_POST['remember'])) {
                // MAKE THE COOKIE
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: layout/header.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="assets/img/display/title-logo-2.png" type="image/x-icon">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: url(assets/img/display/bg.png);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 110vh;
        }

        .nav {
            position: fixed;
            top: 0;
            display: flex;
            justify-content: space-around;
            width: 100%;
            height: 100px;
            line-height: 100px;
            background: linear-gradient(rgb(53, 53, 53), transparent);
            z-index: 100;
        }

        .box {
            display: flex;
            width: 350px;
            align-items: center;
            flex-direction: column;
            border-radius: 30px;
            padding: 0 15px 0 15px;
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .inilogo p {
            color: #d30000;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .btn {
            width: 140px;
            height: 40px;
            background: rgba(255, 255, 255, 1);
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: .3s ease;
        }

        .btn:hover {
            background: rgba(255, 255, 255, 0.6);
        }

        .button .btn a {
            text-decoration: none;
            color: black;
            font-weight: 500;
            font-size: 15px;
        }

        .box .header {
            color: #fff;
            font-size: 30px;
            font-weight: 500;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 2rem;
            padding-bottom: 4rem;
        }

        .form-box {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 512px;
            height: 420px;
            overflow: hidden;
            z-index: 2;
        }

        .form-box form ul li {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-bottom: 1rem;
            list-style-type: none;
        }

        .form-box form ul li label.remember {
            padding: 0 10px;
        }

        .form-box form ul li button {
            margin: 20px 0;
        }

        .input-field {
            height: 45px;
            width: 87%;
            border: none;
            outline: none;
            border-radius: 30px;
            font-size: 15px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            padding: 0 0 0 45px;
        }

        label.remember {
            color: #fff;
        }

        button .login {
            border: none;
            border-radius: 30px;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="inilogo">
                <p>CODEFLEX</p>
            </div>
            <div class="button">
                <button class="btn" id="registerBtn">
                    <a href="register.php">Register</a>
                </button>
            </div>
        </nav>

        <div class="box">
            <?php if (isset($error)): ?>
                <p style="color: red; font-style: italic;">Username or Password is incorrect.</p>
            <?php endif; ?>

            <div class="form-box">
                <div class="header">
                    <p>Login Page</p>
                </div>

                <form action="" method="post">
                    <ul>
                        <li>
                            <input type="text" name="username" id="username" class="input-field" placeholder="Username"
                                required>
                        </li>
                        <li>
                            <input type="password" name="password" id="password" class="input-field"
                                placeholder="Password" required>
                        </li>
                        <li>
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember" class="remember">Remember Me</label>
                        </li>
                        <li>
                            <button type="submit" name="login" class="login btn">Login</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>

</body>

</html>