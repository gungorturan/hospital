<?php

$randevu_id = @$_REQUEST["randevu_id"];

$sorgu_randevu = mysqli_query($conn,"select * from randevular where randevu_id = '$randevu_id'");
$satir_randevu = mysqli_fetch_array($sorgu_randevu);

$sorgu_birim = mysqli_query($conn, "select * from birimler where birim_id = '" . $satir_randevu['birim_id'] . "'");
$satir_birim = mysqli_fetch_array($sorgu_birim);

$sorgu_doktor = mysqli_query($conn, "select * from doktorlar where doktor_id = '" . $satir_randevu['doktor_id'] . "'");
$satir_doktor = mysqli_fetch_array($sorgu_doktor);

?>
<div id="center-column">
      <div class="top-bar"> 
        <h1>Randevu Görüntüleme</h1>        
      </div>
      <br />
      
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />

      <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Randevu Bilgileri</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Randevu ID</strong></td>
            <td class="last"><?php echo $satir_randevu['randevu_id'] ?></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>TCKNO</strong></td>
            <td class="last"><?php echo $satir_randevu['hasta_id'] ?></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Birim</strong></td>
            <td class="last"><?php echo $satir_birim['isim'] ?></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Doktor</strong></td>
            <td class="last"><?php echo $satir_doktor['isim'] ?></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Açıklama</strong></td>
            <td class="last"><?php echo $satir_randevu['aciklama'] ?></td>
          </tr>
          <tr>
            <td class="first"><strong>Randevu Tarihi</strong></td>
            <td class="last"><?php echo $satir_randevu['randevu_tarih'] ?></td>
          </tr>
          <tr>
            <td class="first"><strong>Randevu Saati</strong></td>
            <td class="last"><?php echo $satir_randevu['randevu_saat'] ?></td>
          </tr>
          <tr>
            <td class="first"><strong>Aktiflik</strong></td>
            <td class="last"><input type="checkbox" id="aktiflik" name="aktiflik" value="" <?php echo ($satir_randevu['aktiflik'] ? "checked" : "" ); ?> disabled></td>
          </tr>
        </table>
      </div>
    </div>
    <div id="right-column"> <strong class="h">BİLGİ</strong>
      <div class="box">Bu bölümde hastanemizdeki randevuların görüntülenmesi işlemi yapılır. </div>
    </div>

