<?php
//dev 
$conn = mysqli_connect("localhost","root","","hastane");


/* Bağlantı Kontrolu */
if ( mysqli_connect_errno() ) {
	echo "Bağlantı Başarısız. Hata : ".mysqli_connect_error();
	die();
}
else {
//	echo "Bağlantı Başarılı";
	
}
/* Olası Türkçe karakter sorunları için */
// Karakter setini ayarlamak için aşağıdaki komutta kullanılabilir.
	mysqli_query($conn,"SET NAMES 'utf8'");
/* Bağlantıyı Sonlandırmak için */
// mysqli_close($conn);

?>