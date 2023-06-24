<div id="center-column">
      <div class="top-bar"> <a href="?istek=doktor_ekleme" class="button">EKLE </a>
        <h1>Doktor İşlemleri</h1>
      </div>
      <br />
      <div class="select-bar">
		<form id='doktor_arama' method="post" action="admin_isle.php">
			<label>
			<input type="text" minlength="3" placeholder='Doktor adı' required name="doktor_adi" />
			</label>
			<label>
			<input type="submit" name="Submit" value="Arama" />
			</label>
		</form>
      </div>
	  <div id="doktor_tablosu">
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <table class="listing" cellpadding="0" cellspacing="0">
          <tr>
            <th class="first" width="177">Adı</th>
            <th>Görüntüle</th>
            <th>Düzenle</th>
            <th class="last">Sil</th>
          </tr>
		 <?php
	 	$sorgu_doktor = mysqli_query($conn,"select * from doktorlar order by isim asc");
		while ( $satir_doktor = mysqli_fetch_array($sorgu_doktor)) {
		 ?>
          <tr>
            <td class="first style1"><?php echo $satir_doktor['isim']; ?></td>
            <td><a href='?istek=doktor_goruntuleme&doktor_id=<?php echo $satir_doktor['doktor_id']; ?>'><img src="img/login-icon.gif" width="16" height="16" alt="" /></a></td>
            <td><a href='?istek=doktor_duzenleme&doktor_id=<?php echo $satir_doktor['doktor_id']; ?>'><img src="img/edit-icon.gif" width="16" height="16" alt="" /></a></td>
            <td class="last"><a href='admin_isle.php?islem_id=3&doktor_id=<?php echo $satir_doktor['doktor_id']; ?>'><img src="img/hr.gif" width="16" height="16" alt="" /></a></td>
          </tr>
		 <?php } ?>
        </table>
      </div>
	</div>


    </div>
    <div id="right-column"> <strong class="h">BİLGİ</strong>
      <div class="box">Doktor ekleme, düzenleme ve silme işlemleri gerçekleştirilir </div>
    </div>
	

  <script>
  // ajax    
  $('form#doktor_arama').submit(function(event) {
    event.preventDefault(); 
		$('#doktor_tablosu').html('<center><img src = "../images/yukleniyor.svg" width="64" align="middle" alt="Kayıt yapılıyor"/></center>');
    var form = $(this);
    $.ajax({
      type: form.attr('method'),
      url: form.attr('action'),
      data: form.serialize() + '&islem_id=4',
	        success: function(response) {
                $('#doktor_tablosu').html(response);
            }  
	  });
  });	 
</script>
