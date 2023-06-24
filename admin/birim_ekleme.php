<div id="center-column">
      <div class="top-bar"> 
        <h1>Birim Ekleme</h1>        
      </div>
      <br />
      
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
      <form id='genel_bilgiler' method="post" enctype="multipart/form-data" action="admin_isle.php?islem_id=13">  

      <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Birim Bilgileri</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Birim İsmi</strong></td>
            <td class="last"><input type="text" class="text" required  name='birim_adi' /></td>
          </tr>
            <td class="first"><strong>Resim</strong></td>
            <td class="last"><input type='file' accept="image/gif, image/jpg, image/jpeg, image/png" required name='birim_resim'></td>
          </tr>
          <tr class="bg">
            <td class="first" colspan=2 valign=top><strong>Hakkında</strong></td>
          </tr>
          <tr>
            <td colspan=2 class="last"><textarea required name='birim_aciklama' id="example" style='height:450px;width:100%'></textarea></td>
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
      <div class="box">Bu bölümde yeni birim eklemesi yapılabilir. </div>
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