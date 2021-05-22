<?php
ob_start();
session_start();

require 'baglan.php';

if (isset($_POST['gonder'])) {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $email = $_POST['email'];
    $mesaj = $_POST['mesaj'];

    $sorgu = $db->prepare('INSERT INTO iletisim SET ad = ?, soyad = ?, email = ?, mesaj = ?');
    $ekle = $sorgu->execute([
        $ad, $soyad, $email, $mesaj
    ]);

    if ($ekle) {
        echo "Mesajınız başarıyla gönderildi. İletişim sayfasına yönlendiriyorsunuz";
        header('Refresh:2, iletisim.html');
    } else {
        echo "Bir hata oluştu";
        header('Refresh:2, iletisim.html');
    }
}
