<?php

$randevu_id = @$_REQUEST["randevu_id"];

$sorgu_randevu = mysqli_query($conn,"select * from randevular where randevu_id = '$randevu_id'");
$satir_randevu = mysqli_fetch_array($sorgu_randevu);

$randevu_doktor = mysqli_query($conn, "SELECT * FROM doktorlar WHERE doktor_id = '" . $satir_randevu['doktor_id'] . "'");
$cek_doktorAdi = mysqli_fetch_array($randevu_doktor);
?>
<div id="center-column">
      <div class="top-bar"> 
        <h1>Randevu Düzenleme</h1>        
      </div>
      <br />
      
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
      <form id='genel_bilgiler' method="post" enctype="multipart/form-data" action="admin_isle.php?islem_id=8">  

      <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Randevu Bilgileri</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Randevu ID</strong></td>
            <td class="last"><input type="text" class="text" disabled name='randevu_id' value='<?php echo $satir_randevu['randevu_id'] ?>' /></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Doktor</strong></td>
            <td class="last">
              <?php 
                $sorgu_doktor = mysqli_query($conn, "SELECT isim FROM doktorlar WHERE doktor_id NOT IN ('" . $satir_randevu['doktor_id'] . "')");
              ?>
              <select id="doktor" name="doktor">
                <option value="" selected><?php echo  $cek_doktorAdi['isim']?></option>
                  <?php 
                    while ($doktor = mysqli_fetch_array($sorgu_doktor)) {
                        echo "<option value='".$doktor['isim']."'>".$doktor['isim']."</option>";
                    }
                  ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Tarih</strong></td>
            <td class = "last"><input type="date" name="tarih" id="tarih" class = "form-control" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+30 days'));?>" value = <?php echo $satir_randevu['randevu_tarih'] ?>></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Saat</strong></td>
            <td class = "last">
              <select name="saat" id="saat" class = "form-control" required>
                <option value="<?php echo $satir_randevu['randevu_saat'] ?>"><?php echo $satir_randevu['randevu_saat'] ?></option>
              </select>
            </td>
          </tr>
          <tr class="bg">
            <td class="first" colspan=2 valign=top><strong>Açıklama</strong></td>
          </tr>
          <tr>
            <td colspan=2 class="last"><textarea required name='randevu_aciklama' id="randevu_aciklama" style='height:450px;width:100%'><?php echo $satir_randevu['aciklama']  ?></textarea></td>
          </tr>
        </table>
        <div class="select"> 
			<input type="hidden" name='randevu_id' value='<?php echo $satir_randevu['randevu_id'] ?>' />
            <input type='submit' name='submit' value='Kaydet'>
            <span id='sonuc'></span>
        </div>
      </form>
      </div>
    </div>
    <div id="right-column"> <strong class="h">BİLGİ</strong>
      <div class="box">Bu bölümde randevu bilgilerinin düzenlenmesi işlemi yapılır. </div>
    </div>

    <script src="sceditor-3.2.0/minified/sceditor.min.js"></script>
	<script src="sceditor-3.2.0/minified/icons/monocons.js"></script>
    <script src="sceditor-3.2.0/minified/formats/xhtml.js"></script>
    <script src="sceditor-3.2.0/languages/tr.js"></script>

    <script>
			var textarea = document.getElementById('example');
			sceditor.create(textarea, {
				format: 'xhtml',
				icons: 'monocons',
				style: 'minified/themes/content/default.min.css',
                locale : "tr",
			});

</script>



  <script>
  // ajax    
  $('#genel_bilgiler').submit(function(event) {
    event.preventDefault(); 
		$('#sonuc').html('<img src = "../images/yukleniyor.svg" width="20" align="middle" alt="Kayıt yapılıyor"/>');
    var form = $(this);
    var formVeri= new FormData($('#genel_bilgiler')[0]);   
    $.ajax({
      type: form.attr('method'),
      url: form.attr('action'),
//	  contentType: form.attr('enctype'),
      processData: false,
      contentType: false,
      data: formVeri,
	        success: function(response) {
                $('#sonuc').html(response);
            }  
	  });
  });	 

  $(document).ready(function(){
  $('#tarih').change(function(){
    var secilenDoktor = document.getElementById('doktor').value;
    var secilenTarih = $(this).val();
    var islem_id = 9;
    
    $.ajax({
      method: 'POST',
      url: 'admin_isle.php',
      data: { doktor: secilenDoktor, tarih: secilenTarih, islem_id : islem_id },
      success: function(data) {
        $('#saat').html(data);
      }
    });
});
});
</script>
