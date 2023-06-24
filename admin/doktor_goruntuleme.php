<?php

$doktor_id = @$_REQUEST["doktor_id"];

$sorgu_doktor = mysqli_query($conn,"select * from doktorlar where doktor_id = '$doktor_id'");
$satir_doktor = mysqli_fetch_array($sorgu_doktor);

$doktor_birim = mysqli_query($conn, "SELECT * FROM birimler WHERE birim_id = '" . $satir_doktor['birim_id'] . "'");
$cek_birimAdi = mysqli_fetch_array($doktor_birim);

?>
<div id="center-column">
      <div class="top-bar"> 
        <h1>Doktor Görüntüleme</h1>        
      </div>
      <br />
      
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />

      <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Doktor Bilgileri</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Adı</strong></td>
            <td class="last"><?php echo $satir_doktor['isim'] ?></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Birim</strong></td>
            <td class="last"><?php echo $cek_birimAdi['isim'] ?></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>E-Posta</strong></td>
            <td class="last"><?php echo $satir_doktor['email'] ?></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Tel. No.</strong></td>
            <td class="last"><?php echo $satir_doktor['telno'] ?></td>
          </tr>
          <tr>
            <td class="first"><strong>Resim</strong></td>
            <td class="last"><img src='../images/doktorlar/<?php echo $satir_doktor['resim'] ?>' width=200></td>
          </tr>
          <tr class="bg">
            <td class="first" colspan=2 valign=top><strong>Hakkında</strong></td>
          </tr>
          <tr>
            <td colspan=2 class="last"><?php echo $satir_doktor['ozgecmis']  ?></td>
          </tr>
          </tr>
        </table>
      </div>
    </div>
    <div id="right-column"> <strong class="h">BİLGİ</strong>
      <div class="box">Bu bölümde hastanemizdeki doktorların görüntülenmesi işlemi yapılır. </div>
    </div>

