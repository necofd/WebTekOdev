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
        echo "Mesajınız başarıyla gönderildi. 5 saniyede İletişim sayfasına yönlendiriyorsunuz";
        header('Refresh:5, iletisim.html');
    } else {
        echo "Bir hata oluştu";
        header('Refresh:2, iletisim.html');
    }
}

?>

<!DOCTYPE html>
<html lang="tr-TR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-language" content="en,tr">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!--Logoyu freelogodesign.com'den yapılır-->
    <title>İletişim Form Mesajı</title>
</head>

<body>
    <table>
        <tr>
            <td>Adı Soyadı</td>
            <td>:</td>
            <td>
                <b>
                    <?php
                    echo $_POST['ad'] . "&nbsp;" . $_POST['soyad'];
                    ?>
                </b>
            </td>
        </tr>
        <tr>
            <td>E-posta</td>
            <td>:</td>
            <td>
                <b>
                    <?php
                    echo $_POST['email'];
                    ?>
                </b>
            </td>
        </tr>
        <tr>
            <td>Mesajınız</td>
            <td>:</td>
            <td>
                <b>
                    <?php
                    echo $_POST['mesaj'];
                    ?>
                </b>
            </td>
        </tr>
    </table>
</body>

</html>