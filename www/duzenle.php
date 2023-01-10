<!DOCTYPE html>
<html lang="tr">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	
	<title>KAYA ELEKTRONİK VE BİLİŞİM SİSTEMLERİ</title>

	
	<link rel="stylesheet" href="css/bootstrap.min.css">

	
	<link rel="stylesheet" href="css/animate.min.css">

	
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">

	
	<link rel="stylesheet" href="css/style.css">

		
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>
	
</head>
<body>



<div class="preloader">

	<div class="sk-spinner sk-spinner-pulse"></div>

</div>



<div class="nav-container">
   <nav class="nav-inner transparent">

      <div class="navbar">
         <div class="container">
            <div class="row">

              <div class="brand">
                <a href="uye_anasayfa.php">ANASAYFA</a>
              </div>

              <div class="navicon">
			  
                <div class="menu-container">

                  <div class="circle dark inline">
                    <i class="icon ion-navicon"></i>
                  </div>

                  <div class="list-menu">
                    <i class="icon ion-close-round close-iframe"></i>
                    <div class="intro-inner">
                      <ul id="nav-menu">
                        <li><a href="uye_anasayfa.php">ANASAYFA</a></li>
                        <li><a href="hakkimizda.php">HAKKIMIZDA</a></li>
                        <li><a href="randevu.php">RANDEVU</a></li>
                        <li><a href="iletisim.php">İLETİŞİM</a></li>
						<li><a href="uyepanel.php">HESABIM</a></li>
                      </ul>
                    </div>
                  </div>

                </div>
              </div>

            </div>
         </div>
      </div>

   </nav>
</div>


<?php
require_once 'baglan.php';
session_start();


$id=$_GET["id"];

$c=$db->prepare("select * from uyeler where uye_id=?");

$c->execute(array($id));

$x=$c->fetch(PDO::FETCH_ASSOC);



$z=$db->prepare("UPDATE uyeler SET uye_ad=? ,uye_soyad=?,uye_kadi=?, uye_sifre=? where uye_id=?");


if($_POST) {
	$uye_ad = $_POST["uye_ad"];
    $uye_soyad=$_POST["uye_soyad"];
	$uye_kadi=$_POST["uye_kadi"];
	$uye_sifre=$_POST["uye_sifre"];
	
	


$k=$z->execute(array($uye_ad,$uye_soyad,$uye_kadi,$uye_sifre,$id));
if($k){
	echo "Bilgileriniz güncellendi!  Anasayfaya yönlendiriliyorsunuz.";
	header("refresh: 1; url=index.php");
	
}else {
	echo "Bir hata oluştu tekrar deneyiniz!!";
}

}else{


	
echo 

'
<td>Bilgilerinizi Güncelleyin</td>

<form  role="form" action="" method="POST" class="form-horizontal">
<fieldset>




<div class="form-group">
  <label class="col-md-4 control-label" for="uye_ad">Ad:</label>  
  <div class="col-md-4">
  <input id="uye_ad" name="uye_ad" type="text" value="'.$x["uye_ad"].'" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="uye_soyad">Soyad:</label>  
  <div class="col-md-4">
  <input id="uye_soyad" name="uye_soyad" type="text" value="'.$x["uye_soyad"].'" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="uye_kadi">Kullanıcı Adı:</label>  
  <div class="col-md-4">
  <input id="uye_kadi" name="uye_kadi" type="text" value="'.$x["uye_kadi"].'" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="uye_sifre">Şifre:</label>
  <div class="col-md-4">
    <input id="uye_sifre" name="uye_sifre" type="password" value="'.$x["uye_sifre"].'" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="profil_guncelle"></label>
  <div class="col-md-4">
    <button id="profil_guncelle"  name="profil_guncelle" class="btn btn-primary">Güncelle</button>
  </div>
</div>

</fieldset>
</form>';
}
include("altkisim.php");  ?>
