<?php
sleep(1);
session_start();

include('baglan.php');

$kod = $_REQUEST['kod'];
$dkod = $_SESSION["dogrulamakodu"];
$kullanici = $_REQUEST['kullanici'];
$sifre = $_REQUEST['sifre'];

$sorgu = mysqli_query($conn,"Select * from admin where ad = '$kullanici'");
$say_uye = mysqli_num_rows($sorgu);

if (  $say_uye > 0  ) {
    $satir = mysqli_fetch_array($sorgu);
    $d_sifre = $satir['sifre'];
}

if ( $kod != $dkod  ) {
    echo "<img src='images/hata.svg' width='48' height='48'><br>";
    echo "doğrulama kodu hatalı";
} elseif (  $say_uye == 0 ) {
    echo "<img src='images/hata.svg' width='48' height='48'><br>";
    echo "Giriş yetkiniz yoktur.";
} elseif (  md5(sha1(md5($sifre))) != $d_sifre  ) {
    echo "<img src='images/hata.svg' width='48' height='48'><br>";
    echo "Kullanıcı adı veya şifre yanlış <br> Giriş yetkiniz yoktur.";
}
else {
    $_SESSION["giris_yapan"] = $satir['admin_id'];
    ?>
    <script language="javascript">
        window.location.href="admin/";
    </script>
    <?php
}
?>