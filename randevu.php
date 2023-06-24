<section class="about_section layout_padding-bottom">
  <div class="container" >
    <h2 class="main-heading ">
      Randevu Alma Formu
    </h2>
    <p class="text-justify">
      
      <form action='randevu_isle.php' method='post' id='randevu_form'>
      <table align='center'>
        <tr>
          <td><label for="birim">Birim: </label></td>
          <td>
            <?php 
            $sorgu_birim = mysqli_query($conn, "SELECT isim FROM birimler");
            ?>
            <select id="birim" name="birim" class = "form-control">
              <option value="" selected disabled>Seçiniz</option>
                <?php 
                    while ($birim = mysqli_fetch_array($sorgu_birim)) {
                        echo "<option value='".$birim['isim']."'>".$birim['isim']."</option>";
                    }
                ?>
            </select>
          </td>
        </tr>
        <tr>
          <td><label for="doktor">Doktor: </label></td>
          <td>
            <select id="doktor" name="doktor" class = "form-control">
              <option value="" selected disabled>Birim Seçiniz.</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><label for="tarih">Tarih: </label></td>
          <td><input type="date" name="tarih" id="tarih" class = "form-control" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+30 days'));?>"></td>
        </tr>
        <tr>
          <td><label for="saat">Saat: </label></td>
          <td>
            <select name="saat" id="saat" class = "form-control" required>
              <option value=""></option>
            </select>
          </td>
        </tr>
        <tr>
          <td><label for="tckno">T.C. Kimlik Numarası: </label></td>
          <td><input type="text" name="tckno" required pattern="\d{11}" placeholder="11 haneli olmalıdır" class="form-control"></td>
        </tr>
        <tr>
          <td><label for='adi'>Ad ve Soyad: </label></td>
          <td><input type='text' name='adSoyad' required minlength='3' maxlength='21' class="form-control" required></td>
        </tr>
        <tr>
          <td><label for='telefon'>Telefon : </label></td>
          <td><input type='tel' name='telefon' placeholder='Format: 501-234-5678' required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control"></td>
        </tr>
        <tr>
          <td><label for='eposta'>E-posta: </label></td>
          <td><input type='email' name='eposta' required class="form-control"></td>
        </tr>          

        <tr>
          <td align='left'></td>
          <td align='right'><input type="submit" value="Randevu Al" class="form-control"></td>
        </tr>
        </table>
        </form>
      </p>
  </div>
  <div align='center' id="randevu_sonuc"></div>
</section>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){
  $('#birim').change(function(){
    var secilenBirim = document.getElementById('birim');
    var secilenBirimID = secilenBirim.selectedIndex;
    var islem_id = 1;
    $.ajax({
      url:"randevu_isle.php",
      method:"post",
      data:{secilenBirimID:secilenBirimID, islem_id : islem_id},
      success:function(data){
        $('#doktor').html(data);
      }
    });
  });
});


$(document).ready(function(){
  $('#tarih').change(function(){
    var secilenDoktor = document.getElementById('doktor');
    var secilenDoktorID = secilenDoktor.selectedIndex;
    var secilenTarih = $(this).val();
    var islem_id = 2;
    
    $.ajax({
      method: 'POST',
      url: 'randevu_isle.php',
      data: { doktor: secilenDoktorID, tarih: secilenTarih, islem_id : islem_id },
      success: function(data) {
        $('#saat').html(data);
      }
    });
});
});
$(document).ready(function() {
  $('#randevu_form').submit(function(event) {
    event.preventDefault();
    $('#randevu_sonuc').html('<img src = "images/yukleniyor.svg" width="48" height="48" alt="Kayıt yapılıyor"/>');
    var form = $(this);
    var islem_id = 3;
    var formData = form.serializeArray();
    formData.push({ name: 'islem_id', value: islem_id });

    $.ajax({
      type: 'POST',
      url: form.attr('action'),
      data: formData,
      success: function(response) {
        $('#randevu_sonuc').html(response);
      },
    });
  });
});

</script>

