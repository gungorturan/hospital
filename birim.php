  <!-- about section -->
  <?php
    $birim_bilgi = @$_GET['id'];
    $birim_bilgi =  substr($birim_bilgi, 64);   // baştan 64. karakter silelim
    $birim_id =  substr($birim_bilgi, 0, -64);   // sondan 64. karakter silelim

    $sorgu_birim = mysqli_query($conn,"select * from birimler where birim_id = '$birim_id'");
    $birim_hakkinda = mysqli_fetch_array($sorgu_birim);
  ?>
  <main class="container py-5">
		<!-- Bölüm Fotoğrafı ve Açıklama -->
    <h2 class="text-center mb-4"><?php echo $birim_hakkinda['isim'] ?> Bölümü</h2>
		<section class="row mb-5">
			<div class="col-md-6">
				<img src="images\birimler\<?php echo $birim_hakkinda['resim'] ?>" class="img-fluid rounded" alt="Bölüm Fotoğrafı">
			</div>
			<div class="col-md-6">
				<p><?php echo $birim_hakkinda['aciklama'] ?></p>
			</div>
			<hr>
		</section>
    

		<!-- Bölüm Doktorları -->
    <h2 class="text-center mb-4">Bölüm Doktorlarımız</h2>
    <section>
    <table>
        <tr>
            <?php 
            $sorgu_doktor = mysqli_query($conn, "SELECT * FROM doktorlar where birim_id = '$birim_id'");
            $say_doktor = mysqli_num_rows($sorgu_doktor);
            
            if ($say_doktor > 0) {    
                while ($satir_doktor = mysqli_fetch_array($sorgu_doktor)) {
            ?>
            <td>
                <div class="card">
                    <a href="?sayfa=doktor&id=<?php echo hash('sha256', rand(1,1000)).$satir_doktor['doktor_id'].hash('sha256', rand(1,1000)) ?>">
                        <img class="card-img-top" style="max-width: 100%; height: 400px; object-fit:cover; object-position:center top;" src="images/doktorlar/<?php echo $satir_doktor['resim'] ?>">
                    </a>
                    <div class="card-body">
                      <a href="?sayfa=doktor&id=<?php echo hash('sha256', rand(1,1000)).$satir_doktor['doktor_id'].hash('sha256', rand(1,1000)) ?>">
                        <h5 class="card-title"><?php echo $satir_doktor['isim'] ?></h5>
                      </a>
                    </div>
                </div>
            </td>
            <?php
                }
            }
            ?>
        </tr>
    </table>
</section>
<!-- end about section -->
  </main>