<section class="container py-5" id='doktor_kartlari'>
<?php
    $birimIndex = $_POST['selectedIndex'];
    include("baglan.php");
?>
    <table>
        <tr>
            <?php 
            $sorgu_doktor = mysqli_query($conn, "SELECT * FROM doktorlar WHERE birim_id = '$birimIndex' ORDER BY rand()");
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