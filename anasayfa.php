<!DOCTYPE html>
<?php
include('baglan.php');
$sorgu = mysqli_query($conn,"select * from genel_bilgiler");
$genel_bilgiler = mysqli_fetch_array($sorgu);
?>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/s4.png" type="image/x-icon">

  <title><?php echo $genel_bilgiler['site_adi'];  ?></title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- nice select -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
  <!-- datepicker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
  <!-- Custom styles for this template -->
  <link href="css\style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div>
    <!-- header section starts -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <h3>
            <?php echo $genel_bilgiler['site_adi'];  ?>
            </h3>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">ANA SAYFA <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Randevu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="anasayfa.php?sayfa=randevu">Randevu Al</a>
                  <a class="dropdown-item" href="anasayfa.php?sayfa=yetkiligiris">Yetkili Girişi</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="anasayfa.php?sayfa=hakkimizda"> HAKKIMIZDA </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="anasayfa.php?sayfa=birimler"> BİRİMLER </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="anasayfa.php?sayfa=doktorlar"> DOKTORLAR </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </header>
  </div>
<!-- header section ends -->
  <?php

$sayfa_id = @$_GET['sayfa'];
if ( isset($sayfa_id) == false ) {
    $sayfa_id = "hakkimizda";
}

if (  $sayfa_id == "hakkimizda" ) {
    include('hakkimizda.php');
}
elseif (  $sayfa_id == "randevu"  ) {
  include('randevu.php');
}
elseif (  $sayfa_id == "birimler"  ) {
    include('birimler.php');
}
elseif ($sayfa_id == "birim") {
    include("birim.php");
}
elseif ($sayfa_id == "doktorlar") {
  include("doktorlar.php");
}
elseif ($sayfa_id == "doktor") {
  include("doktor.php");
}
elseif ($sayfa_id == "yetkiligiris") {
  include("yetkiligiris.php");
}
else {
    include('hakkimizda.php');
}
    

?>  
  <!-- info section -->


  <!-- end info section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span>
        <a href="sablonlar/thrine-html" target="blank">Şablon Orjinal Versiyonu</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->
</body>

</html>