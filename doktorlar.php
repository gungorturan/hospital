<!-- service section -->
<div class="select container py-5">
    <strong>Seçiniz: </strong>
    <form id="birim_sec" method="post" action="doktor_isle.php">
        <?php 
            $sorgu_birim = mysqli_query($conn, "SELECT isim FROM birimler");
        ?>
        <select id="birim" name="birim">
            <option value="" selected disabled>Seçiniz</option>
            <?php 
                while ($birim = mysqli_fetch_array($sorgu_birim)) {
                    echo "<option value='".$birim['isim']."'>".$birim['isim']."</option>";
                }
            ?>
        </select>
    </form>
</div>

<section class="container py-5" id='doktor_kartlari'>
    <table>
        <tr>
            <?php 
            $sorgu_doktor = mysqli_query($conn, "SELECT * FROM doktorlar ORDER BY rand()");
            $say_doktor = mysqli_num_rows($sorgu_doktor);
            $sayac = 0;
            
            if ($say_doktor > 0) {    
                while ($satir_doktor = mysqli_fetch_array($sorgu_doktor)) {
                    if ($sayac % 3 == 0 && $sayac != 0) {
                        echo '</tr><tr>';
                    }
            ?>
            <td>
                <div class="card">
                    <a href="?sayfa=doktor&id=<?php echo hash('sha256', rand(1,1000)).$satir_doktor['doktor_id'].hash('sha256', rand(1,1000)) ?>">
                        <img class="card-img-top" style="max-width: 100%; height: 400px; object-fit:cover; object-position:center top;" src="images/doktorlar/<?php echo $satir_doktor['resim'] ?>">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $satir_doktor['isim'] ?></h5>
                    </div>
                </div>
            </td>
            <?php
                    $sayac++;
                }
            }
            ?>
        </tr>
    </table>
</section>


<!-- end service section -->
<script>
$(document).on('change', '#birim', function(event) {
    var selectElement = document.getElementById('birim');
    var selectedIndex = selectElement.selectedIndex;
    event.preventDefault(); 
    $('#doktor_kartlari').html('<center><img src="images/yukleniyor.svg" width="64" align="middle" alt="Yükleniyor..."/></center>');
    var form = $(this).closest("form");
    $.ajax({
        type: form.attr('method'),
        url: 'doktor_isle.php',
        data: {
            selectedIndex: selectedIndex
        },
        success: function(response) {
            $('#doktor_kartlari').html(response);
        }  
    });
    
});	 
</script>
