<?php
$sorgu_birim = mysqli_query($conn,"select * from birimler");
$say_birimler = mysqli_num_rows($sorgu_birim);
?>  
  <!-- service section -->

<section class="service_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        <span class="design_dot"></span>
        Birimlerimiz
      </h2>
    </div>
    <div class="row">
    <?php
      if ($say_birimler>0){
        while ($satir_birim = mysqli_fetch_array($sorgu_birim)) {
          ?>
      <div class="col-md-4 mx-auto">
        <div class="box">
          <img src="images/birimler/<?php echo $satir_birim['resim'] ?>" alt="" />
          <a href="?sayfa=birim&id=<?php echo hash('sha256', rand(1,1000)).$satir_birim['birim_id'].hash('sha256', rand(1,1000)) ?>"><?php echo $satir_birim['isim'] ?></a>
        </div>
      </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
</section>

  <!-- end service section -->
