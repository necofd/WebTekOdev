/*Iletisim Sayfasi icin*/
function validation() {
    var ad = document.getElementById("ad").value;
    var soyad = document.getElementById("soyad").value;
    var email = document.getElementById("email").value;
    var mesaj = document.getElementById("mesaj").value;
    var hatali_mesaj = document.getElementById("hatali_mesaj");

    if (ad == "") {
        alert("Lütfen adınızı giriniz");
        return false;
    }
    if (soyad == "") {
        alert("Lütfen soyadınızı giriniz");
        return false;
    }
    if (email == "") {
        alert("Lütfen e-posta adresinizi giriniz");
        return false;
    }
    if (mesaj == "") {
        alert("Lütfen mesajınızı giriniz");
        return false;
    }
}
function isEmail(email) {
    let regex = /^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)$/;
    return regex.test(String(email).toLowerCase());
}