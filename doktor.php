<?php
    $doktor_bilgi = @$_GET['id'];
    $doktor_bilgi =  substr($doktor_bilgi, 64);   // baştan 64. karakter silelim
    $doktor_id =  substr($doktor_bilgi, 0, -64);   // sondan 64. karakter silelim

    $sorgu_doktor = mysqli_query($conn,"select * from doktorlar where doktor_id = '$doktor_id'");
    $doktor_hakkinda = mysqli_fetch_array($sorgu_doktor);
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div style="border: 1px solid #ccc; padding: 20px; width: 100%;">
                <div class="row">
                    <div class="col-md-8">
                        <h2><?php echo $doktor_hakkinda['isim'] ?></h2>
                        <p><?php echo $doktor_hakkinda['ozgecmis'] ?></p>
                        <p>Telefon Numarası: <a href="<?php echo $doktor_hakkinda['telno'] ?>"><?php echo $doktor_hakkinda['telno'] ?></a></p>
                        <p>E-posta: <a href="mailto:<?php echo $doktor_hakkinda['email'] ?>"><?php echo $doktor_hakkinda['email'] ?></a></p>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end align-items-center">
                        <img src="images/doktorlar/<?php echo $doktor_hakkinda['resim'] ?>" alt="Doktor Resmi" style = "width:100%; max-height: auto;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
