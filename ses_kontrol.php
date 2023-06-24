<?php
@session_start();

if ( !isset($_SESSION["giris_yapan"]) ) {
    echo "<p align='center'><img src='images/hata.svg' width='48' height='48'><br>";
    echo "Bu sayfayı görüntüleme izniniz yoktur. </p>";
    die();
} else {
  $oturum_sahibi =  $_SESSION["giris_yapan"];
  //echo $oturum_sahibi;
}
?>