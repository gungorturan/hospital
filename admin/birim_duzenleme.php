<?php

$birim_id = @$_REQUEST["birim_id"];

$sorgu_birim = mysqli_query($conn,"select * from birimler where birim_id = '$birim_id'");
$satir_birim = mysqli_fetch_array($sorgu_birim);

?>
<div id="center-column">
      <div class="top-bar"> 
        <h1>Birim Düzenleme</h1>        
      </div>
      <br />
      
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
      <form id='genel_bilgiler' method="post" enctype="multipart/form-data" action="admin_isle.php?islem_id=12">  

      <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Birim Bilgileri</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>İsim</strong></td>
            <td class="last"><input type="text" class="text" required  name='birim_adi' value='<?php echo $satir_birim['isim'] ?>' /></td>
          </tr>
          <tr>
            <td class="first"><strong>Resim</strong></td>
            <td class="last"><img src='../images/birimler/<?php echo $satir_birim['resim'] ?>' width='100' ><input type='file' accept="image/gif, image/jpg, image/jpeg, image/png" name='birim_resim'></td>
          </tr>
          <tr class="bg">
            <td class="first" colspan=2 valign=top><strong>Açıklama</strong></td>
          </tr>
          <tr>
            <td colspan=2 class="last"><textarea required name='birim_aciklama' id="example" style='height:450px;width:100%'><?php echo $satir_birim['aciklama']  ?></textarea></td>
          </tr>
        </table>
        <div class="select"> 
			<input type="hidden" name='birim_id' value='<?php echo $satir_birim['birim_id'] ?>' />
            <input type='submit' name='submit' value='Kaydet'>
            <span id='sonuc'></span>
        </div>
      </form>
      </div>
    </div>
    <div id="right-column"> <strong class="h">BİLGİ</strong>
      <div class="box">Bu bölümde hastanemizde yer alan birimlerin bilgilerinin düzenlenmesi işlemi yapılır. </div>
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