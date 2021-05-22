<?php
ob_start();
session_start();

require 'baglan.php';

if (isset($_POST['kayit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_again = $_POST['password_again'];
    if (!$username) {
        echo 'Lütfen kullanıcı adınızı girin';
    } elseif (!$password || !$password_again) {
        echo 'Lütfen şifrenizi girin';
    } elseif ($password != $password_again) {
        echo "Girdiğiniz şifreler birbirleriyle aynı değil";
    } else {
        //Veritabanı kayit islemi
        $sorgu = $db->prepare('INSERT INTO users SET user_name = ?, user_password = ?');
        $ekle = $sorgu->execute([
            $username, $password
        ]);

        if ($ekle) {
            echo "Kayıt başarıyla gerçekleşti, yönlendiriyorsunuz";
            header('Refresh:2; index.php');
        } else {
            echo "Bir hata oluştu. Lütfen tekrar kontrol ediniz";
        }
    }
}

if (isset($_POST['giris'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$username) {
        echo "Kullanıcı adınızı giriniz";
    } elseif (!$password) {
        echo "Şifrenizi giriniz";
    } else {
        $kullanici_sor = $db->prepare('SELECT * FROM users WHERE user_name = ? && user_password = ?');
        $kullanici_sor->execute([
            $username, $password
        ]);

        $say = $kullanici_sor->rowCount();

        if ($say == 1) {
            $_SESSION['username'] = $username;

            echo "HOŞGELDİNİZ...";
            echo "<b>" . $_POST['username'] . "</b>";
            echo "\nBaşarıyla giriş yaptınız, yönlendiriyorsunuz";
            header('Refresh:2; index.html');
        } else {
            echo "Bir hata oluştu. Lütfen tekrar kontrol ediniz";
        }
    }
}
