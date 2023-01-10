<?php 
session_start();
?>


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



<form class="form-horizontal" action="" method="POST">
<fieldset>


<div class="form-group">
  <label class="col-md-4 control-label" for="radevu_ad">Adınız:</label>  
  <div class="col-md-4">
  <?php 
  
if($_SESSION["uye"]){
	?>
	<input id="randevu_ad" name="randevu_ad" disabled type="text" value="<?php echo $_SESSION["uye"];?>" class="form-control input-md" required="">
	<?php
} else {
	
  ?>
  <input id="randevu_ad" name="randevu_ad" type="text" placeholder="Adınızı giriniz" class="form-control input-md" required="">
      <?php 
}
	?>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="randevu_soyad">Soyad:</label>  
  <div class="col-md-4">
 
  <input id="randevu_soyad" name="randevu_soyad"  type="text" value=""  class="form-control input-md" required="">
    
  <input id="randevu_soyad" name="randevu_soyad" type="text" placeholder="Soyadınızı giriniz" class="form-control input-md" required="">
	
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="randevu_posta">E-posta:</label>  
  <div class="col-md-4">
  <input id="randevu_posta" name="randevu_posta" type="mail" placeholder="E-posta adresinizi giriniz" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="randevu_adres">Adres:</label>  
  <div class="col-md-4">
  <input id="randevu_adres" name="randevu_adres" type="text" placeholder="Adresinizi giriniz" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="randevu_neden">Arıza Nedeni:</label>
  <div class="col-md-4">
    <input id="randevu_neden" name="randevu_neden" type="text" placeholder="Arıza nedeni kısaca açıklayınız" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
 <label class="col-md-4 control-label">Tarih</label>
 <div class="col-md-4">
 
  <input id="randevu_tarih" type="date" name="randevu_tarih"  required="required"/>
 </div>
						
</div>
					  


<div class="form-group">
  <label class="col-md-4 control-label" for="randevu_saat">Saat:</label>
  <div class="col-md-4">
    <select  id="randevu_saat" name="randevu_saat" class="col-md-4">
    </select>
  </div>
</div>					  
					  


<div class="form-group">
  <label class="col-md-4 control-label" for="randevu_buton"></label>
  <div class="col-md-4">
    <button id="randevu_buton" name="randevu_buton" class="btn btn-primary">Gönder</button>
  </div>
</div>

</fieldset>
</form>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('#randevu_tarih').on('change',function(){
        var randevuTar = jQuery(this).val();
        if(randevuTar){
            jQuery.ajax({
                type:'POST',
                url:'randevukontrol.php',
                data:'tarih='+randevuTar,
                success:function(html){
                    jQuery('#randevu_saat').html(html); 
                }
            }); 
        }else{
           // $('#state').html('<option value="">Select country first</option>');
        }
    });
});
</script>

<?php 

require_once 'baglan.php';

if ($_POST){
	$randevu_ad=$_POST['randevu_ad'];
	$randevu_soyad=$_POST['randevu_soyad'];
	$randevu_posta=$_POST['randevu_posta'];
	$randevu_neden=$_POST['randevu_neden'];
	$randevu_adres=$_POST['randevu_adres'];
	$randevu_tarih=$_POST['randevu_tarih'];
	$randevu_saat=$_POST['randevu_saat'];
	
	function valid_email( $str )
{
return ( ! preg_match ( "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str ) ) ? FALSE : TRUE;
}
valid_email($_POST['randevu_posta']);
if (!valid_email($_POST['randevu_posta'])){
	$randevu_posta=false;
echo"Geçerli eposta adresi giriniz!!";
}
	
	


	if(!$randevu_ad || !$randevu_soyad || !$randevu_posta || !$randevu_neden || !$randevu_adres || !$randevu_tarih || !$randevu_saat ){
		
	}else {
		$kaydet=$db->prepare("INSERT INTO randevular SET randevu_ad=?,randevu_soyad=?,randevu_posta=?,randevu_neden=?,randevu_adres=?,randevu_tarih=?,randevu_saat=?");
		$kaydet->execute(array($randevu_ad,$randevu_soyad,$randevu_posta,$randevu_neden,$randevu_adres,$randevu_tarih,$randevu_saat));
		
		if($kaydet){
			echo "Randevu kaydınız başarılı bir şekilde oluşturuldu.";
		}else {
			echo "işlem başarısız.";
		}
	}
	
}


 include("altkisim.php"); ?>
