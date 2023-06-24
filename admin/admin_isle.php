<?php
session_start();
include('../ses_kontrol.php');
include('../baglan.php');

$islem = @$_REQUEST["islem_id"];

//sleep(1);

if ( $islem == 1 )  {     // genel bilgiler

    
$site_adi = @$_REQUEST["site_adi"]; 
$slogan = @$_REQUEST["slogan"];  
$e_mail = @$_REQUEST["e_mail"];  
$telefon = @$_REQUEST["telefon"];     
$adres = @$_REQUEST["adres"];     
$kisa_bilgi = @$_REQUEST["aciklama"];     
$hakkinda = @$_REQUEST["hakkinda"];  

$sql = "UPDATE genel_bilgiler SET site_adi = '$site_adi', 
                                  slogan  = '$slogan',
                                  aciklama =  '$kisa_bilgi',                                  
                                  hakkinda = '$hakkinda',                                  
                                  adres =  '$adres',                                  
                                  telefon =  '$telefon',                                  
                                  e_mail = '$e_mail' where id=1";

if ( mysqli_query($conn,$sql) ) {
    echo "<img src='img/save-icon.gif' valign='middle'>";
}
else {
    echo "Hata Kod : 1";
}



}
elseif ( $islem == 2 )  {     // doktor ekleme

$doktor_adi = @$_REQUEST["doktor_adi"];
$doktor_birim = @$_REQUEST["birim"];
$birim_sorgu = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM birimler WHERE isim = '$doktor_birim'"));
$birim_id = $birim_sorgu['birim_id'];
$doktor_eposta = @$_REQUEST["doktor_eposta"];
$doktor_telno = @$_REQUEST["doktor_tel"]; 
$doktor_ozgecmis = @$_REQUEST["doktor_ozgecmis"]; 

$isim = $_FILES['doktor_resim']['name'];
$boyut = $_FILES['doktor_resim']['size'];
$tmp = $_FILES['doktor_resim']['tmp_name'];

//echo $isim;

$yol = "../images/doktorlar/";
$kabul_boyut = 600*800;
$kabul_uzanti = array("gif","jpg","jpeg","png");

if ( !strlen($isim) > 0 ) {
			echo "<img src='img/hr.gif' width='20' title='resim seçilmedi' alt='resim secilmedi'  valign='middle'>";
			die();
}

list($txt,$uzanti) = explode(".",$isim);
if ( !in_array($uzanti,$kabul_uzanti) ) {
			echo "<img src='img/hr.gif' width='20' title='Kabul edilmeyen resim formatı' alt='Kabul edilmeyen resim formatı'  valign='middle'>";
			die();	
}

if ( $boyut > $kabul_boyut ) {
			echo "<img src='img/hr.gif' width='20' title='Kabul edilmeyen resim boyutu' alt='Kabul edilmeyen resim boyutu'  valign='middle'>";
			die();
}

$yeni_isim = time().rand(100,999).".".$uzanti;

//echo $yeni_isim;

if ( move_uploaded_file($tmp,$yol.$yeni_isim) ) {
	$sql = "Insert into doktorlar (birim_id, isim, telno, email, ozgecmis, resim) values ('$birim_id','$doktor_adi','$doktor_telno','$doktor_eposta','$doktor_ozgecmis','$yeni_isim')";
	if ( mysqli_query($conn,$sql) ) {
		echo "<img src='img/save-icon.gif' valign='middle'>";
		
	} else {
		echo "<img src='img/hr.gif' width='20' title='veri tabanı kaydı yapılamadı' alt='veri tabanı kaydı yapılamadı'  valign='middle'>";
	}
} else {			
	echo "<img src='img/hr.gif' width='20' title='resim yüklenemedi' alt='resim yüklenemedi'  valign='middle'>";
	die();
}

}

elseif ( $islem == 3 )  {     // doktor silme

$doktor_id = @$_REQUEST["doktor_id"]; 

$sorgu_doktor = mysqli_query($conn,"select * from doktorlar where doktor_id='$doktor_id'");
$satir_doktor = mysqli_fetch_array($sorgu_doktor);
$doktor_resim = $satir_doktor['resim'];
$yol = "../images/doktorlar/";
unlink($yol.$doktor_resim);
mysqli_query($conn,"delete from doktorlar where doktor_id='$doktor_id'");
// yazarın kitaplarının da silinmesi gerekir
echo "<script language='javascript'>window.location='index.php?istek=doktor_islemleri'</script>";

}

elseif ( $islem == 4 )  {     // doktor arama

$doktor_adi = @$_REQUEST["doktor_adi"]; 

?>	
	
     <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <table class="listing" cellpadding="0" cellspacing="0">
          <tr>
            <th class="first" width="177">Doktor Adı</th>
            <th>Görüntüle</th>
            <th>Düzenle</th>
            <th class="last">Sil</th>
          </tr>
		 <?php
		$sql =  "select * from doktorlar where isim like '%$doktor_adi%'";
		//echo $sql;
	 	$sorgu_doktor = mysqli_query($conn,$sql);
		while ( $satir_doktor = mysqli_fetch_array($sorgu_doktor)) {
		 ?>
          <tr>
            <td class="first style1"><?php echo $satir_doktor['isim']; ?></td>
            <td><a href='?istek=doktor_goruntuleme&doktor_id=<?php echo $satir_doktor['doktor_id']; ?>'><img src="img/login-icon.gif" width="16" height="16" alt="" /></a></td>
            <td><a href='?istek=doktor_duzenleme&doktor_id=<?php echo $satir_doktor['doktor_id']; ?>'><img src="img/edit-icon.gif" width="16" height="16" alt="" /></a></td>
            <td class="last"><a href='admin_isle.php?islem_id=4&doktor_id=<?php echo $satir_doktor['doktor_id']; ?>'><img src="img/hr.gif" width="16" height="16" alt="" /></a></td>          </tr>
		 <?php } ?>
        </table>
      </div>	
<?php	
}

elseif ( $islem == 5 )  {     // doktor düzenleme

$doktor_id = @$_REQUEST["doktor_id"];
$sorgu_doktor = mysqli_query($conn,"select * from doktorlar where doktor_id='$doktor_id'");
$satir_doktor = mysqli_fetch_array($sorgu_doktor);
$doktor_eski_resim = $satir_doktor['resim'];

$doktor_adi = @$_REQUEST["doktor_adi"];
$doktor_birim = @$_REQUEST["birim"];
$birim_sorgu = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM birimler WHERE isim = '$doktor_birim'"));
$birim_id = $birim_sorgu['birim_id']; 
$doktor_eposta = @$_REQUEST["doktor_eposta"];
$doktor_telno = @$_REQUEST["doktor_tel"];
$doktor_ozgecmis = @$_REQUEST["doktor_ozgecmis"]; 

$sql = "Update doktorlar SET birim_id = '$birim_id', isim='$doktor_adi', email = '$doktor_eposta', telno = '$doktor_telno' ozgecmis='$doktor_ozgecmis' where doktor_id='$doktor_id'";
	if ( mysqli_query($conn,$sql) ) {
		echo "<img src='img/save-icon.gif' valign='middle'>";
	} else {
		echo "<img src='img/hr.gif' width='20' title='veri tabanı kaydı yapılamadı' alt='veri tabanı kaydı yapılamadı'  valign='middle'>";
	}

$isim = $_FILES['doktor_resim']['name'];
$boyut = $_FILES['doktor_resim']['size'];
$tmp = $_FILES['doktor_resim']['tmp_name'];

//echo $isim;

$yol = "../images/doktorlar/";
$kabul_boyut = 600*800;
$kabul_uzanti = array("gif","jpg","jpeg","png");

if ( strlen($isim) > 0 ) {

	list($txt,$uzanti) = explode(".",$isim);
	if ( !in_array($uzanti,$kabul_uzanti) ) {
			echo "<img src='img/hr.gif' width='20' title='Kabul edilmeyen resim formatı' alt='Kabul edilmeyen resim formatı'  valign='middle'>";
			die();	
	}

	if ( $boyut > $kabul_boyut ) {
			echo "<img src='img/hr.gif' width='20' title='Kabul edilmeyen resim formatı' alt='Kabul edilmeyen resim formatı'  valign='middle'>";
			die();
	}

	$yeni_isim = time().rand(100,999).".".$uzanti;

//echo $yeni_isim;

	if ( move_uploaded_file($tmp,$yol.$yeni_isim) ) {
		unlink($yol.$doktor_eski_resim);
		$sql = "Update doktorlar SET resim='$yeni_isim' where doktor_id='$doktor_id'";
		if ( mysqli_query($conn,$sql) ) {
			echo "<img src='img/save-icon.gif' valign='middle'>";
		} else {
			echo "<img src='img/hr.gif' width='20' title='veri tabanı kaydı yapılamadı' alt='veri tabanı kaydı yapılamadı'  valign='middle'>";
		}
	} else {			
		echo "<img src='img/hr.gif' width='20' title='resim yüklenemedi' alt='resim yüklenemedi'  valign='middle'>";
		die();
	}
}

}

elseif ( $islem == 6 )  {     // randevu silme

$tckno = @$_REQUEST["tckno"]; 

mysqli_query($conn,"delete from randevular where hasta_id='$tckno'");

echo "<script language='javascript'>window.location='index.php?istek=randevu_islemleri'</script>";
}

elseif ( $islem == 7 )  {     // randevu arama

$tckno = @$_REQUEST["tckno"]; 

?>	
	
     <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <table class="listing" cellpadding="0" cellspacing="0">
          <tr>
            <th class="first" width="225">TCKNO</th>
            <th>Düzenle</th>
            <th class="last">Sil</th>
          </tr>
		 <?php
		$sql = "SELECT hasta_id FROM randevular where hasta_id LIKE '%$tckno%'";
		//echo $sql;
	 	$sorgu_randevu = mysqli_query($conn,$sql);
		while ( $satir_randevu = mysqli_fetch_array($sorgu_randevu)) {
		 ?>
          <tr>
            <td class="first style1"><?php echo $satir_randevu['hasta_id']; ?></td>
            <td><a href='?istek=randevu_duzenleme&randevu_id=<?php echo $satir_randevu['randevu_id']; ?>'><img src="img/edit-icon.gif" width="16" height="16" alt="" /></a></td>
            <td class="last"><a href='admin_isle.php?islem_id=8&randevu_id=<?php echo $satir_randevu['randevu_id']; ?>'><img src="img/hr.gif" width="16" height="16" alt="" /></a></td>          </tr>
		 <?php } ?>
        </table>
      </div>	
<?php	
}
elseif ( $islem == 8 )  {     // randevu düzenleme

	$randevu_id = @$_REQUEST["randevu_id"];
	$sorgu_randevu = mysqli_query($conn,"select * from randevular where randevu_id='$randevu_id'");
	$satir_randevu = mysqli_fetch_array($sorgu_randevu);
	
	$secilenDoktor = $_REQUEST['doktor'];
	$randevu_doktor = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM doktorlar WHERE isim = '$secilenDoktor'"));
	$secilenTarih = $_REQUEST['tarih'];
	$secilenSaat = $_REQUEST['saat'];
	$randevuAciklama = $_REQUEST['aciklama'];
	
	$sql = "Update randevular SET doktor_id = '".$randevu_doktor['doktor_id']."', randevu_tarih='$secilenTarih', randevu_saat = '$secilenSaat', aciklama = '$randevuAciklama' where randevu_id='$randevu_id'";
		if ( mysqli_query($conn,$sql) ) {
			echo "<img src='img/save-icon.gif' valign='middle'>";
		} else {
			echo "<img src='img/hr.gif' width='20' title='veri tabanı kaydı yapılamadı' alt='veri tabanı kaydı yapılamadı'  valign='middle'>";
		}
	
	
}
else if ($islem == 9) { // Randevu düzenleme tarih/saat
	$secilenDoktor = $_REQUEST['doktor'];
	$sorgu_doktor = mysqli_fetch_array(mysqli_query($conn, "select * from doktorlar where isim = '$secilenDoktor'"));

	$secilenTarih = $_REQUEST['tarih'];
	
	$sorgu_secilenTarih = mysqli_query($conn, "SELECT randevu_saat FROM randevular WHERE doktor_id = '".$sorgu_doktor['doktor_id']."' AND randevu_tarih = '$secilenTarih'");
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
elseif ( $islem == 10 )  {     // birim silme

	$birim_id = @$_REQUEST["birim_id"]; 
	
	$sorgu_birim = mysqli_query($conn,"select * from birimler where birim_id='$birim_id'");
	$satir_birim = mysqli_fetch_array($sorgu_birim);
	$birim_resim = $satir_birim['resim'];
	$yol = "../images/birimler/";
	unlink($yol.$birim_resim);
	mysqli_query($conn,"delete from birimler where birim_id='$birim_id'");
	echo "<script language='javascript'>window.location='index.php?istek=birim_islemleri'</script>";	
}
elseif ( $islem == 11 )  {     // birim arama

	$birim_adi = @$_REQUEST["birim_adi"]; 
	
	?>	
		
		 <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
			<table class="listing" cellpadding="0" cellspacing="0">
			  <tr>
				<th class="first" width="177">Birim Adı</th>
				<th>Görüntüle</th>
				<th>Düzenle</th>
				<th class="last">Sil</th>
			  </tr>
			 <?php
			$sql =  "select * from birimler where isim like '%$birim_adi%'";
			 $sorgu_birim = mysqli_query($conn,$sql);
			while ( $satir_birim = mysqli_fetch_array($sorgu_birim)) {
			 ?>
			  <tr>
				<td class="first style1"><?php echo $satir_birim['isim']; ?></td>
				<td><a href='?istek=birim_goruntuleme&birim_id=<?php echo $satir_birim['birim_id']; ?>'><img src="img/login-icon.gif" width="16" height="16" alt="" /></a></td>
				<td><a href='?istek=birim_duzenleme&birim_id=<?php echo $satir_birim['birim_id']; ?>'><img src="img/edit-icon.gif" width="16" height="16" alt="" /></a></td>
				<td class="last"><a href='admin_isle.php?islem_id=10&birim_id=<?php echo $satir_birim['birim_id']; ?>'><img src="img/hr.gif" width="16" height="16" alt="" /></a></td>          </tr>
			 <?php } ?>
			</table>
		  </div>	
	<?php	
	}
elseif ( $islem == 12 )  {     // birim düzenleme

	$birim_id = @$_REQUEST["birim_id"];
	$sorgu_birim = mysqli_query($conn,"select * from birimler where birim_id='$birim_id'");
	$satir_birim = mysqli_fetch_array($sorgu_birim);
	$birim_eski_resim = $satir_doktor['resim'];
	
	$birim_adi = @$_REQUEST["birim_adi"];
	$birim_aciklama = @$_REQUEST["birim_aciklama"]; 
	
	$sql = "Update birimler SET birim_id = '$birim_id', isim='$birim_adi', aciklama='$birim_aciklama' where birim_id='$birim_id'";
		if ( mysqli_query($conn,$sql) ) {
			echo "<img src='img/save-icon.gif' valign='middle'>";
		} else {
			echo "<img src='img/hr.gif' width='20' title='veri tabanı kaydı yapılamadı' alt='veri tabanı kaydı yapılamadı'  valign='middle'>";
		}
	
	$isim = $_FILES['birim_resim']['name'];
	$boyut = $_FILES['birim_resim']['size'];
	$tmp = $_FILES['birim_resim']['tmp_name'];
	
	//echo $isim;
	
	$yol = "../images/birimler/";
	$kabul_boyut = 600*800;
	$kabul_uzanti = array("gif","jpg","jpeg","png");
	
	if ( strlen($isim) > 0 ) {
	
		list($txt,$uzanti) = explode(".",$isim);
		if ( !in_array($uzanti,$kabul_uzanti) ) {
				echo "<img src='img/hr.gif' width='20' title='Kabul edilmeyen resim formatı' alt='Kabul edilmeyen resim formatı'  valign='middle'>";
				die();	
		}
	
		if ( $boyut > $kabul_boyut ) {
				echo "<img src='img/hr.gif' width='20' title='Kabul edilmeyen resim formatı' alt='Kabul edilmeyen resim formatı'  valign='middle'>";
				die();
		}
	
		$yeni_isim = time().rand(100,999).".".$uzanti;
	
	//echo $yeni_isim;
	
		if ( move_uploaded_file($tmp,$yol.$yeni_isim) ) {
			unlink($yol.$birim_eski_resim);
			$sql = "Update birimler SET resim='$yeni_isim' where birim_id='$doktor_id'";
			if ( mysqli_query($conn,$sql) ) {
				echo "<img src='img/save-icon.gif' valign='middle'>";
			} else {
				echo "<img src='img/hr.gif' width='20' title='veri tabanı kaydı yapılamadı' alt='veri tabanı kaydı yapılamadı'  valign='middle'>";
			}
		} else {			
			echo "<img src='img/hr.gif' width='20' title='resim yüklenemedi' alt='resim yüklenemedi'  valign='middle'>";
			die();
		}
	}
	
	}
elseif ( $islem == 13 )  {     // birim ekleme

	$birim_adi = @$_REQUEST["birim_adi"];
	$birim_aciklama = @$_REQUEST["birim_aciklama"]; 
	
	$isim = $_FILES['birim_resim']['name'];
	$boyut = $_FILES['birim_resim']['size'];
	$tmp = $_FILES['birim_resim']['tmp_name'];
	
	//echo $isim;
	
	$yol = "../images/birimler/";
	$kabul_boyut = 600*800;
	$kabul_uzanti = array("gif","jpg","jpeg","png");
	
	if ( !strlen($isim) > 0 ) {
				echo "<img src='img/hr.gif' width='20' title='resim seçilmedi' alt='resim secilmedi'  valign='middle'>";
				die();
	}
	
	list($txt,$uzanti) = explode(".",$isim);
	if ( !in_array($uzanti,$kabul_uzanti) ) {
				echo "<img src='img/hr.gif' width='20' title='Kabul edilmeyen resim formatı' alt='Kabul edilmeyen resim formatı'  valign='middle'>";
				die();	
	}
	
	if ( $boyut > $kabul_boyut ) {
				echo "<img src='img/hr.gif' width='20' title='Kabul edilmeyen resim boyutu' alt='Kabul edilmeyen resim boyutu'  valign='middle'>";
				die();
	}
	
	$yeni_isim = time().rand(100,999).".".$uzanti;
	
	//echo $yeni_isim;
	
	if ( move_uploaded_file($tmp,$yol.$yeni_isim) ) {
		$sql = "Insert into birimler (isim, aciklama, resim) values ('$birim_adi','$birim_aciklama','$yeni_isim')";
		if ( mysqli_query($conn,$sql) ) {
			echo "<img src='img/save-icon.gif' valign='middle'>";
			
		} else {
			echo "<img src='img/hr.gif' width='20' title='veri tabanı kaydı yapılamadı' alt='veri tabanı kaydı yapılamadı'  valign='middle'>";
		}
	} else {			
		echo "<img src='img/hr.gif' width='20' title='resim yüklenemedi' alt='resim yüklenemedi'  valign='middle'>";
		die();
	}
	}