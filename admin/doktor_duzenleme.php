<?php

$doktor_id = @$_REQUEST["doktor_id"];

$sorgu_doktor = mysqli_query($conn,"select * from doktorlar where doktor_id = '$doktor_id'");
$satir_doktor = mysqli_fetch_array($sorgu_doktor);

$doktor_birim = mysqli_query($conn, "SELECT * FROM birimler WHERE birim_id = '" . $satir_doktor['birim_id'] . "'");
$cek_birimAdi = mysqli_fetch_array($doktor_birim);
?>
<div id="center-column">
      <div class="top-bar"> 
        <h1>Doktor Düzenleme</h1>        
      </div>
      <br />
      
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
      <form id='genel_bilgiler' method="post" enctype="multipart/form-data" action="admin_isle.php?islem_id=5">  

      <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Doktor Bilgileri</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Adı</strong></td>
            <td class="last"><input type="text" class="text" required  name='doktor_adi' value='<?php echo $satir_doktor['isim'] ?>' /></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Birimi</strong></td>
            <td class="last">
              <?php 
                $sorgu_birim = mysqli_query($conn, "SELECT isim FROM birimler WHERE birim_id NOT IN ('" . $satir_doktor['birim_id'] . "')");
              ?>
              <select id="birim" name="birim">
                <option value="" selected><?php echo  $cek_birimAdi['isim']?></option>
                  <?php 
                    while ($birim = mysqli_fetch_array($sorgu_birim)) {
                        echo "<option value='".$birim['isim']."'>".$birim['isim']."</option>";
                    }
                  ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>E-Posta</strong></td>
            <td class="last"><input type="email" class="text" required  name='doktor_eposta' value='<?php echo $satir_doktor['email'] ?>' /></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Tel. No.</strong></td>
            <td class="last"><input type="tel" class="text" required  name='doktor_tel' value='<?php echo $satir_doktor['telno'] ?>' /></td>
          </tr>
          <tr>
            <td class="first"><strong>Resim</strong></td>
            <td class="last"><img src='../images/doktorlar/<?php echo $satir_doktor['resim'] ?>' width='100' ><input type='file' accept="image/gif, image/jpg, image/jpeg, image/png" name='doktor_resim'></td>
          </tr>
          <tr class="bg">
            <td class="first" colspan=2 valign=top><strong>Hakkında</strong></td>
          </tr>
          <tr>
            <td colspan=2 class="last"><textarea required name='doktor_ozgecmis' id="example" style='height:450px;width:100%'><?php echo $satir_doktor['ozgecmis']  ?></textarea></td>
          </tr>
        </table>
        <div class="select"> 
			<input type="hidden" name='doktor_id' value='<?php echo $satir_doktor['doktor_id'] ?>' />
            <input type='submit' name='submit' value='Kaydet'>
            <span id='sonuc'></span>
        </div>
      </form>
      </div>
    </div>
    <div id="right-column"> <strong class="h">BİLGİ</strong>
      <div class="box">Bu bölümde hastanemizde yer alan doktorların bilgilerinin düzenlenmesi işlemi yapılır. </div>
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
</script>