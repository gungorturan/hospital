<?php
$sorgu = mysqli_query($conn,"select * from genel_bilgiler limit 1");
$satir = mysqli_fetch_array($sorgu);
$site_adi = $satir['site_adi'];
$slogan = $satir['slogan'];
$aciklama = $satir['aciklama'];
$hakkinda = $satir['hakkinda'];
$adres = $satir['adres'];
$e_mail = $satir['e_mail'];
$telefon = $satir['telefon'];


?>
<div id="center-column">
      <div class="top-bar"> 
        <h1>Genel Bilgiler</h1>        
      </div>
      <br />
      
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
      <form id='genel_bilgiler' method="post" action="admin_isle.php">  

      <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Genel Bilgiler</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Site Adı</strong></td>
            <td class="last"><input type="text" class="text" name='site_adi' value='<?php echo $site_adi;  ?>' /></td>
          </tr>
          <tr class="bg">
            <td class="first"><strong>Slogan</strong></td>
            <td class="last"><input type="text" class="text" name='slogan' value='<?php echo $slogan;  ?>' /></td>
          </tr>
          <tr>
            <td class="first"><strong>E-mail</strong></td>
            <td class="last"><input type="text" class="text" name='e_mail' value='<?php echo $e_mail;  ?>' /></td>
          </tr>
          <tr class="bg">
            <td class="first"><strong>Telefon</strong></td>
            <td class="last"><input type="text" class="text" name='telefon' value='<?php echo $telefon;  ?>' /></td>
          </tr>
          <tr>
            <td class="first" valign=top><strong>Adres</strong></td>
            <td class="last"><textarea name='adres' style='height:50px;width:85%'><?php echo $adres;  ?></textarea></td>
          </tr>
          <tr class="bg">
            <td class="first"><strong>Açıklama</strong></td>
            <td class="last"><textarea name='aciklama' style='height:100px;width:85%'><?php echo $aciklama;  ?></textarea></td>
          </tr>
          <tr>
            <td class="first" colspan=2 valign=top><strong>Hakkında</strong></td>
          </tr>
          <tr>
            <td colspan=2 class="last"><textarea name='hakkinda' id="example" style='height:450px;width:100%'><?php echo $hakkinda;  ?></textarea></td>
          </tr>
        </table>
        <div class="select"> 
            <input type='submit' name='submit' value='Kaydet'>
            <span id='sonuc'></span>
        </div>
      </form>
      </div>
    </div>
    <div id="right-column"> <strong class="h">BİLGİ</strong>
      <div class="box">Bu bölümde siteinin temel ayarlarının değişikliği yapılabilir </div>
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
    $.ajax({
      type: form.attr('method'),
      url: form.attr('action'),
      data: form.serialize() + '&islem_id=1',
	        success: function(response) {
                $('#sonuc').html(response);
            }  
	  });
  });	 
</script>