<?php
$islem_id = $_POST['islem_id'];
include('baglan.php');
if ($islem_id == 1){
    $secilenBirim = $_POST['secilenBirimID'];
    $sorgu_secilenBirim = mysqli_query($conn, "SELECT isim FROM doktorlar WHERE birim_id = '$secilenBirim'");
?>

<select name="doktor" id="doktor" class="form-control">
    <option value="" selected disabled>Seçiniz</option>
    <?php
        while ($doktor = mysqli_fetch_array($sorgu_secilenBirim)) {
            echo "<option value='".$doktor['isim']."'>".$doktor['isim']."</option>";
        };
    ?>
</select>
<?php
}

else if ($islem_id == 2) {
    $secilenDoktor = $_POST['doktor'];
    $secilenTarih = $_POST['tarih'];
    echo $secilenTarih;
    $sorgu_secilenTarih = mysqli_query($conn, "SELECT randevu_saat FROM randevular WHERE doktor_id = '$secilenDoktor' AND randevu_tarih = '$secilenTarih'");
    $alinanSaatler = array();

    while ($tarih = mysqli_fetch_array($sorgu_secilenTarih)) {
        $alinanSaatler[] = date('H:i', strtotime($tarih['randevu_saat']));
    }

    $startTime = strtotime('09:00');
    $endTime = strtotime('17:00');
    $interval = 30 * 60;

    echo '<select name="saat" id="saat" class="form-control" required>';
        echo "<option value = 'Saat seç' selected disabled>Saat seç</option>";
    while ($startTime <= $endTime) {
        $formattedTime = date('H:i', $startTime);
        if (in_array($formattedTime, $alinanSaatler)) {
            echo "<option value='$formattedTime' disabled>$formattedTime</option>";
        } else {
            echo "<option value='$formattedTime'>$formattedTime</option>";
        }
        $startTime += $interval;
    }
    echo '</select>';
}


else if ($islem_id == 3){

    $hasta_tc = $_POST['tckno'];
    $hasta_isim = $_POST['adSoyad'];
    $hasta_telno = $_POST['telefon'];
    $hasta_eposta = $_POST['eposta'];
    $secilenTarih = $_POST['tarih'];
    $randevu_saat = $_POST['saat'];

    $secilenBirim = $_POST['birim'];
    $birimSorgu = mysqli_fetch_array(mysqli_query($conn, "SELECT birim_id FROM birimler WHERE isim = '$secilenBirim'"));

    $secilenDoktor = $_POST['doktor'];
    $doktorSorgu = mysqli_fetch_array(mysqli_query($conn, "SELECT doktor_id FROM doktorlar WHERE isim = '$secilenDoktor'"), MYSQLI_ASSOC)['doktor_id'];

    
    $randevu_sorgu = mysqli_query($conn, "SELECT * FROM randevular where hasta_id = '$hasta_tc' and birim_id = '".$birimSorgu['birim_id']."'");
    if (empty(mysqli_fetch_array($randevu_sorgu))){
        $hasta_kayit = mysqli_query($conn, "INSERT INTO hastalar (hasta_id, isim, telno, email) VALUES ('$hasta_tc', '$hasta_isim', '$hasta_telno', '$hasta_eposta');");
        $randevu_kayit = mysqli_query($conn, "INSERT INTO randevular (hasta_id, birim_id, doktor_id, randevu_tarih, randevu_saat, aktiflik) 
                                     VALUES ('$hasta_tc', '".$birimSorgu['birim_id']."', '".$doktorSorgu."', '$secilenTarih', '$randevu_saat', TRUE);");

        if ($hasta_kayit && $randevu_kayit) {
            echo "İşlem başarıyla tamamlandı.";
            echo "<script>document.getElementById('randevu_form').reset();</script>";

            die();
        } else {
            echo "İşlem sırasında bir hata oluştu.";
        }
    }
    else{
        echo "Bu kimlik bilgileriyle bu bölüme randevu daha önce alınmış!";
        echo "<script>document.getElementById('randevu_form').reset();</script>";

        die();
    }
}
?>