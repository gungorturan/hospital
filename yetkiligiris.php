
<?php
@session_start();

if ( isset($_SESSION["giris_yapan"]) ) {
    echo "<script language='javascript'>window.location='admin/'</script>";
} 
?>

  <!-- about section -->
  <section class="about_section layout_padding-bottom">
    <div class="container">
      <h2 class="main-heading ">
        <?php echo $genel_bilgiler['site_adi'];  ?> Admin Girişi
      </h2>
      <p class="text-justify">
        
        <form action='giris_isle.php' method='post' id='giris_form'>
        <table align='center'>
          <tr>
            <td><label for='kullanici'>Kullanıcı adı : </label></td>
            <td><input type='text' name='kullanici' required></td>
          </tr>
          <tr>
            <td><label for='sifre'>Şifre : </label></td>
            <td><input type='password' name='sifre' required></td>
          </tr>

<tr>
    <td><label for="kod">Doğrulama Kodu :</label>	</td>
    <td><input type='text' name='kod' required  minlength="6" maxlength="6"> </td>
</tr>

<tr>
    <td></td>
    <td align='center'><img src="img.php" height="25" width="150" />	</td>
</tr>

<tr>
  <td></td>
  <td align='center'><input type="submit" value="Giriş Yap"></td>
</tr>

    </table>

</form>
		
      </p>
    </div>
    <div align='center' id="giris_sonuc">
       <h5></h5>
    </div>
  </section>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script>
  // ajax    
  $('#giris_form').submit(function(event) {
    event.preventDefault(); 
		$('#giris_sonuc').html('<img src = "images/yukleniyor.svg" width="48" height="48" alt="Kayıt yapılıyor"/>');
    var form = $(this);
    $.ajax({
      type: form.attr('method'),
      url: form.attr('action'),
      data: form.serialize(),
	        success: function(response) {
                $('#giris_sonuc').html(response);
            }  
	  });
  });	 
</script>


  <!-- about section -->

