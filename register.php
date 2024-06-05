<?php
require 'functions.php';

if (isset($_POST['register'])) {

    if (register($_POST) > 0) {
        echo "
            <script>
                alert('New user successfully added!');
            </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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
            width: 530px;
            height: 450px;
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
            width: 100%;
            border: none;
            outline: none;
            border-radius: 30px;
            font-size: 15px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            padding: 0 0 0 45px;
        }

        button .register {
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
                    <a href="login.php">Login</a>
                </button>
            </div>
        </nav>

        <div class="box">
            <div class="form-box">
                <div class="header">
                    <p>Registration Page</p>
                </div>
                <form action="" method="post">
                    <ul>
                        <li>
                            <input type="text" name="username" id="username" placeholder="Username" class="input-field">
                        </li>
                        <li>
                            <input type="password" name="password" id="password" placeholder="Password"
                                class="input-field">
                        </li>
                        <li>
                            <input type="password" name="password2" id="password2" placeholder="Confirm Password"
                                class="input-field">
                        </li>
                        <li>
                            <button type="submit" name="register" class="btn">Register</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>

</html>