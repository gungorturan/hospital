<!DOCTYPE html>
<?php
session_start();
include('../ses_kontrol.php');

include('../baglan.php');

$id = @$_GET['istek'];

?>


<html>
<head>
<title>Admin Paneli</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="sceditor-3.2.0/minified/themes/default.min.css" id="theme-style" />
<style media="all" type="text/css">
@import "css/all.css";
</style>

<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
</head>
<body>
<div id="main">
  <div id="header"> <a href="#" class="logo"><img src="img/logo.gif" width="101" height="29" alt="" /></a>
    <ul id="top-navigation">
      <li <?php echo ( $id == 'genel_bilgiler' or $id == ''  ) ? "class='active'" : "";  ?> ><span><span><a href="?istek=genel_bilgiler">Genel Bilgiler</a></span></span></li>
      <li <?php echo ( $id == 'randevu_islemleri'  ) ? "class='active'" : "";  ?> ><span><span><a href="?istek=randevu_islemleri">Randevu İşlemleri</a></span></span></li>
      <li <?php echo ( $id == 'doktor_islemleri' or $id == 'doktor_ekleme' or $id == 'doktor_duzenleme'   ) ? "class='active'" : "";  ?> ><span><span><a href="?istek=doktor_islemleri">Doktor İşlemleri</a></span></span></li>
      <li <?php echo ( $id == 'birim_islemleri'   ) ? "class='active'" : "";  ?> ><span><span><a href="?istek=birim_islemleri">Birim İşlemleri</a></span></span></li>
    </ul>
  </div>
  <div id="middle">
    <div id="left-column">
<?php
?>
      <a href="../cikis.php" class="link">Çıkış</a> </div>
 

      <?php
        if ( $id == "genel_bilgiler" ) {
          include('genel_bilgiler.php');
        }
        elseif ( $id ==  'randevu_islemleri' ) {
          include('randevu_islemleri.php');
        }
        elseif ( $id ==  'doktor_islemleri' ) {
          include('doktor_islemleri.php');
        }
        elseif ( $id ==  'doktor_ekleme' ) {
          include('doktor_ekleme.php');
        }
        elseif ( $id ==  'doktor_duzenleme' ) {
          include('doktor_duzenleme.php');
        }
        elseif ( $id ==  'doktor_goruntuleme' ) {
          include('doktor_goruntuleme.php');
        }
        elseif ( $id ==  'randevu_islemleri' ) {
          include('randevu_islemleri.php');
        }
        elseif ( $id ==  'randevu_ekleme' ) {
          include('randevu_ekleme.php');
        }
        elseif ( $id ==  'randevu_goruntuleme' ) {
          include('randevu_goruntuleme.php');
        }
        elseif ( $id ==  'randevu_duzenleme' ) {
          include('randevu_duzenleme.php');
        }
        elseif ( $id ==  'birim_islemleri' ) {
          include('birim_islemleri.php');
        }
        elseif ( $id ==  'birim_ekleme' ) {
          include('birim_ekleme.php');
        }
        elseif ( $id ==  'birim_duzenleme' ) {
          include('birim_duzenleme.php');
        }
        elseif ( $id ==  'birim_goruntuleme' ) {
          include('birim_goruntuleme.php');
        }
        elseif ( $id ==  'ek' ) {
          include('ek_sayfa.php');
        }
        else {
        include('genel_bilgiler.php');
        }
      ?>

  </div>
  <div id="footer"></div>
</div>
</body>
</html>
