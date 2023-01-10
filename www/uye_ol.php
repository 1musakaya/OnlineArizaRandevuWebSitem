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
			  <div class = "uyeolgir" style="padding:14px;">
			 <button type="button"  class="btn btn-primary btn-sm" <li><a href="giris_yap.php">Giris Yap</a></li> </button>
			 <button type="button"  class="btn btn-primary btn-sm" <li><a href="uye_ol.php">Üye ol</a></li> </button>
			</div>
                <div class="menu-container">

                  

                  <div class="list-menu">
                    <i class="icon ion-close-round close-iframe"></i>
                    <div class="intro-inner">
                      <ul id="nav-menu">
                        <li><a href="index.php">ANASAYFA</a></li>
                        <li><a href="hakkimizda.php">HAKKIMIZDA</a></li>
                        <li><a href="randevu.php">RANDEVU</a></li>
                        <li><a href="iletisim.php">İLETİŞİM</a></li>
                      </ul>
                    
                  </div>

                </div>
              </div>

            </div>
         </div>
      </div>

   </nav>
</div>


<form  class="form-horizontal" action="" method="POST" >
<fieldset>


<div class="form-group">
  <label class="col-md-4 control-label" for="uye_ad">Adınız:</label>  
  <div class="col-md-4">
  <input id="uye_ad" name="uye_ad" type="text" placeholder="Adınızı Giriniz" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="uye_soyad">Soyadınız:</label>  
  <div class="col-md-4">
  <input id="uye_soyad" name="uye_soyad" type="text" placeholder="Soyadınızı Giriniz" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="uye_kadi">Kullanıcı Adı:</label>  
  <div class="col-md-4">
  <input id="uye_kadi" name="uye_kadi" type="text" placeholder="Kullanıcı Adınızı Giriniz" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="uye_sifre">Şifre:</label>
  <div class="col-md-4">
    <input id="uye_sifre" name="uye_sifre" type="password" placeholder="Şifre belirleyiniz" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="uye_posta">E-Posta:</label>  
  <div class="col-md-4">
  <input id="uye_posta" name="uye_posta" type="text" placeholder="eposta adresinizi giriniz" class="form-control input-md" required="">
    
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label" for="uye_kayit "></label>
  <div class="col-md-4">
    <button id="uye_kayit " name="uye_kayit " class="btn btn-primary">Kayıt Ol</button>
  </div>
</div>

</fieldset>
</form>

<?php 

require_once 'baglan.php';

if ($_POST){
	$uye_ad=$_POST['uye_ad'];
	$uye_soyad=$_POST['uye_soyad'];
	$uye_kadi=$_POST['uye_kadi'];
	$uye_sifre=$_POST['uye_sifre'];
	$uye_posta=$_POST['uye_posta'];
	
	
	
	function valid_email( $str )
{
return ( ! preg_match ( "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str ) ) ? FALSE : TRUE;
}
valid_email($_POST['uye_posta']);
if (!valid_email($_POST['uye_posta'])){
	$uye_posta=false;
echo"Geçerli eposta adresi giriniz!!";
}
	
	


	if(!$uye_ad || !$uye_soyad || !$uye_kadi || !$uye_sifre || !$uye_posta ){
		
	}else {
		$kaydet=$db->prepare("INSERT INTO uyeler SET uye_ad=?,uye_soyad=?,uye_kadi=?,uye_sifre=?,uye_posta=?");
		$kaydet->execute(array($uye_ad,$uye_soyad,$uye_kadi,$uye_sifre,$uye_posta));
		
		if($kaydet){
			echo "Üyelik kaydınız başarılı bir şekilde oluşturuldu.";
		}else {
			echo "işlem başarısız.";
		}
	}
	
}

include ("altkisim.php");
?>





















