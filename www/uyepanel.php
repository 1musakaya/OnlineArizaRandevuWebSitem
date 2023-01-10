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
                        <li><a href="uye_hakkimizda.php">HAKKIMIZDA</a></li>
                        <li><a href="randevu.php">RANDEVU</a></li>
                        <li><a href="uye_iletisim.php">İLETİŞİM</a></li>
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
  

session_start();
require_once 'baglan.php';


if($_SESSION){
		echo "Hoşgeldin " .$_SESSION["uye"]." 
		
		
		<br> </br>
		<a class='btn btn-primary' href='duzenle.php?id=".$_SESSION["id"]."'> Profili Düzenle </a>  
		<br> </br>
		<a class='btn btn-primary' href='randevuliste.php?id=".$_SESSION["id"]."'> Randevularım </a>  
		<br> </br>
		<a class='btn btn-primary' href ='cikis.php'>Çıkış Yap</a>
		<br> </br>
		";
		
		if($_SESSION["id"] == 1){
			echo " <a class='btn btn-primary' href='admin.php'>Admin Paneli</a>";
		}
		
	}else{
	}

include("altkisim.php");?>



