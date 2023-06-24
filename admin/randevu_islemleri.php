<div id="center-column">
      <div class="top-bar">
        <h1>Randevu İşlemleri</h1>
      </div>
      <br />
      <div class="select-bar">
		<form id='randevu_arama' method="post" action="admin_isle.php">
			<label>
			<input type="text" minlength="3" placeholder='TCKNO' required name="tckno" />
			</label>
			<label>
			<input type="submit" name="Submit" value="Arama" />
			</label>
		</form>
      </div>
	  <div id="randevu_tablosu">
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <table class="listing" cellpadding="0" cellspacing="0">
          <tr>
            <th class="first" width="177">TCKNO</th>
            <th>Görüntüle</th>
            <th>Düzenle</th>
            <th class="last">Sil</th>
          </tr>
		 <?php
	 	$sorgu_randevu = mysqli_query($conn,"select * from randevular");
		while ( $satir_randevu = mysqli_fetch_array($sorgu_randevu)) {
		 ?>
          <tr>
            <td class="first style1"><?php echo $satir_randevu['hasta_id']; ?></td>
            <td><a href='?istek=randevu_goruntuleme&randevu_id=<?php echo $satir_randevu['randevu_id']; ?>'><img src="img/login-icon.gif" width="16" height="16" alt="" /></a></td>
            <td><a href='?istek=randevu_duzenleme&randevu_id=<?php echo $satir_randevu['randevu_id']; ?>'><img src="img/edit-icon.gif" width="16" height="16" alt="" /></a></td>
            <td class="last"><a href='admin_isle.php?islem_id=6&tckno=<?php echo $satir_randevu['hasta_id']; ?>'><img src="img/hr.gif" width="16" height="16" alt="" /></a></td>
          </tr>
		 <?php } ?>
        </table>
      </div>
	</div>


    </div>
    <div id="right-column"> <strong class="h">BİLGİ</strong>
      <div class="box">Randevu ekleme, düzenleme ve silme işlemleri gerçekleştirilir </div>
    </div>
	

  <script>
  // ajax    
  $('form#randevu_arama').submit(function(event) {
    event.preventDefault(); 
		$('#randevu_tablosu').html('<center><img src = "../images/yukleniyor.svg" width="64" align="middle" alt="Kayıt yapılıyor"/></center>');
    var form = $(this);
    $.ajax({
      type: form.attr('method'),
      url: form.attr('action'),
      data: form.serialize() + '&islem_id=7',
	        success: function(response) {
                $('#randevu_tablosu').html(response);
            }  
	  });
  });	 
</script>
