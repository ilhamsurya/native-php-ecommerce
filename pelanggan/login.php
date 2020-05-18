<?php
include('koneksi2.php');

?>
<!DOCTYPE html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Login Form</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" method="post" action="">
        <img class="mb-4" src="" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="email" class="sr-only">Email</label>
        <input type="text" id="email" class="form-control" placeholder="Email" name="email" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me" name="remember"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
        <a href="register.php" class="btn btn-lg btn-success btn-block">Register</a>

    </form>

    <?php

    if (isset($_POST["login"])) {

        $email = $_POST["email"];
        $password = $_POST["password"];
        echo $email;
        echo $password;
        $query = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'  AND password_pelanggan ='$password'");
        $result = $query->num_rows;
        if ($result == 1) {
            $akun = $query->fetch_assoc();
            $_SESSION['pelanggan'] = $akun;
            echo "<script>alert('berhasil login');</script>";
            echo "<script>location='index.php';</script>";
        } else {
            echo "<script>alert('gagal login');</script>";
            echo "<script>location='login.php;</script>";
        }
    }

    ?>
</body>

</html>