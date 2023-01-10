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
                <a href="index.php">ANASAYFA</a>
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
                        <li><a href="index.php">ANASAYFA</a></li>
                        <li><a href="hakkimizda.php">HAKKIMIZDA</a></li>
                        <li><a href="iletisim.php">İLETİŞİM</a></li>
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



<section id="header" class="header-one">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
          <div class="header-thumb">
              <h1 class="wow fadeIn" data-wow-delay="1.6s">KAYA ELEKTRONİK <br>VE</br> BİLİŞİM SİSTEMLERİ</h1>
              <h3 class="wow fadeInUp" data-wow-delay="1.9s">İNTERNET SİTESİ</h3>
          </div>
			</div>

		</div>
	</div>		
</section>



<section id="contact">
   <div class="container">
      <div class="row">

         <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="1.3s">
         	<div class="google_map">
				<div id="map-canvas"></div>
			</div>
		</div>

		<div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="1.6s">
			<h1>Burdan Bizimle İletişime Geçebilirsiniz</h1>
			<div class="contact-form">
				<form id="contact-form" method="post" action="https://formspree.io/kyaa.musa@gmail.com">
					<input name="uye_adi" type="text" class="form-control" placeholder="Adınız" required>
					<input name="uye_eposta" type="email" class="form-control" placeholder="E-Postanız" required>
					<textarea name="uye_mesaj" class="form-control" placeholder="Mesajıızı giriniz" rows="4" required></textarea>
					<div class="contact-submit">
						<input type="submit" class="form-control submit" value="Gönder">
						
					</div>
				</form>
			</div>
		</div>
		
		
		

		<div class="clearfix"></div>

			<div class="col-md-4 col-sm-4">
				<div class="wow fadeInUp media" data-wow-delay="0.3s">
					<div class="media-object pull-left">
						<i class="fa fa-tablet"></i>
					</div>
					<div class="media-body">
						<h3 class="media-heading">İrtibat Numarası</h3>
						<p>+90 0444 231 36 54</p>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-4">
				<div class="wow fadeInUp media" data-wow-delay="0.6s">
					<div class="media-object pull-left">
						<i class="fa fa-envelope"></i>
					</div>
					<div class="media-body">
						<h3 class="media-heading">Email</h3>
						<p>musa.kya723@gmail.com</p>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-4">
				<div class="wow fadeInUp media" data-wow-delay="0.9s">
					<div class="media-object pull-left">
						<i class="fa fa-globe"></i>
					</div>
					<div class="media-body">
						<h3 class="media-heading">Adres</h3>
						<p>İluh Caddesi 10 Nisan Polis Karakolu Karşısı<br>
                        BATMAN/MERKEZ</p>
					</div>
				</div>
			</div>

      </div>
   </div>
</section>

<?php

require_once 'baglan.php';

if ($_POST){
	$uye_adi=$_POST['uye_adi'];
	$uye_mesaj=$_POST['uye_msj'];
	$uye_eposta=$_POST['uye_eposta'];
	
	function valid_email( $str )
{
return ( ! preg_match ( "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str ) ) ? FALSE : TRUE;
}
valid_email($_POST['uye_eposta']);
if (!valid_email($_POST['uye_eposta'])){
	$uye_eposta=false;
echo"Geçerli eposta adresi giriniz!!";
}
}
 include("altkisim.php"); ?>
