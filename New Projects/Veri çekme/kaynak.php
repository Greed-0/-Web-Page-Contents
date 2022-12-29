<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaynak</title>
</head>
<body>
<?php

$GelenVeri  = $_GET["deger"];
if($GelenVeri!=""){
      $VeritabaniBaglantisi = mysqli_connect("localhost","root","","furkan atasert");
  if(!$VeritabaniBaglantisi){
    die("Veri tabanı bağlantı hatası");
    }
mysqli_select_db($VeritabaniBaglantisi, "furkan atasert"); // , sonrası mysql de oluşturduğum veri tabanı adı
mysqli_set_charset($VeritabaniBaglantisi, "utf8"); // bu kısım karakter yazımı için

    $KayitSorgula = mysqli_fetch_assoc(mysqli_query($VeritabaniBaglantisi, "SELECT * FROM kişiler WHERE id=$GelenVeri ORDER BY id ASC LIMIT 1"));  //İD Yİ KÜÇÜKTEN BÜYÜĞE DOĞRU KONTROL ET VE BİR KAYIT AL ANLAMINA GELİYOR
   
    $isimdeger = $KayitSorgula["isim"];
    $soyisimdeger = $KayitSorgula["soyisim"];
    $yasdeger = $KayitSorgula["yas"];
    $meslekdeger = $KayitSorgula["meslek"];
    $sehirdeger = $KayitSorgula["sehir"];
    $emailadresidegeri = $KayitSorgula["email"];
    $websitesiadresidegeri = $KayitSorgula["websitesiadresi"];


    echo "İsim: ".$isimdeger."<br />";
    echo "Soyisim: ".$soyisimdeger."<br />";
    echo "Yaş: ".$yasdeger."<br />";
    echo "Meslek: ".$meslekdeger."<br />";
    echo "Şehir: ".$sehirdeger."<br />";
    echo "E-Mail: ".$emaildeger."<br />";
    echo "Web Sitesi: ".$websitesiadresideger."<br />";

    mysqli_close($VeritabaniBaglantisi);
}else{
    echo "Lütfen geçerli bir kayıt seçiniz";
}

?>
</body>
</html>