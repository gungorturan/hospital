<?php

$birim_id = @$_REQUEST["birim_id"];

$sorgu_birim = mysqli_query($conn,"select * from birimler where birim_id = '$birim_id'");
$satir_birim = mysqli_fetch_array($sorgu_birim);

?>
<div id="center-column">
      <div class="top-bar"> 
        <h1>Birim Görüntüleme</h1>        
      </div>
      <br />
      
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />

      <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Birim Bilgileri</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>İsim</strong></td>
            <td class="last"><?php echo $satir_birim['isim'] ?></td>
          </tr>
          <tr>
            <td class="first"><strong>Resim</strong></td>
            <td class="last"><img src='../images/birimler/<?php echo $satir_birim['resim'] ?>' width=200></td>
          </tr>
          <tr class="bg">
            <td class="first" colspan=2 valign=top><strong>Açıklama</strong></td>
          </tr>
          <tr>
            <td colspan=2 class="last"><?php echo $satir_birim['aciklama']  ?></td>
          </tr>
          </tr>
        </table>
      </div>
    </div>
    <div id="right-column"> <strong class="h">BİLGİ</strong>
      <div class="box">Bu bölümde hastanemizdeki birimlerin görüntülenmesi işlemi yapılır. </div>
    </div>

