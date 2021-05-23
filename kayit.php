<?php

require "baglan.php";

?>

<!DOCTYPE html>
<html lang="tr-TR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="stil.css">
</head>

<body class="login-body">
    <img src="img/Logom.png" alt="logom">
    <div class="loginbox">
        <h1 class="login-title">Kayıt Ol</h1>
        <form action="islem.php" method="POST">
            <p>Kullanıcı Adı</p>
            <input type="email" name="username" placeholder="E-posta adresiniz girin">
            <p>Şifre</p>
            <input type="password" name="password" placeholder="Şifre girin">
            <p>Tekrar Şifre</p>
            <input type="password" name="password_again" placeholder="Şifre girin">
            <button href="kayit.php" name="kayit">Kayıt ol</button>
        </form>
        <a href="login.php"><button class="btn btn-primary btn-block">Giriş Yap</button></a>
    </div>

    <!-- Bootstrap JS -->
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>