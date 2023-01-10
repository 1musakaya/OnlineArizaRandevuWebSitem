<?php include("ustkisim.php");?>

<form class="form-horizontal" action="" method="POST">
<fieldset>


<legend>Personel Ekle</legend>


<div class="form-group">
  <label class="col-md-4 control-label" for="personel_adsoyad">Personelin adı ve soyadı:</label>  
  <div class="col-md-4">
  <input id="personel_adsoyad" name="personel_adsoyad" type="text" placeholder="ad ve soyad değerlerini giriniz" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="personel_posta">Personele ait E-Posta:</label>  
  <div class="col-md-4">
  <input id="personel_posta" name="personel_posta" type="text" placeholder="...@mail.com" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="personel_tel">Personele ait telefon no:</label>  
  <div class="col-md-4">
  <input id="personel_tel" name="personel_tel" type="text" placeholder="05---------" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="personel_is_bolumu">Personelin çalışacağı iş bölümü:</label>  
  <div class="col-md-4">
  <input id="personel_is_bolumu" name="personel_is_bolumu" type="text" placeholder="tamir , servis , sistem vb" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="personel_durum">Adminlik durumu:</label>  
  <div class="col-md-4">
  <input id="personel_durum" name="personel_durum" type="text" placeholder="adminlik verilecekse 1 değeri atayın" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="personel_kayit"></label>
  <div class="col-md-4">
    <button id="personel_kayit" name="personel_kayit" class="btn btn-primary">Personel Ekle</button>
  </div>
</div>

</fieldset>
</form>



<?php 

require_once 'baglan.php';

if ($_POST){
	$personel_adsoyad=$_POST['personel_adsoyad'];
	$personel_posta=$_POST['personel_posta'];
	$personel_tel=$_POST['personel_tel'];
	$personel_is_bolumu=$_POST['personel_is_bolumu'];
	$personel_durum=$_POST['personel_durum'];
	
	
	function valid_email( $str )
{
return ( ! preg_match ( "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str ) ) ? FALSE : TRUE;
}
valid_email($_POST['personel_posta']);
if (!valid_email($_POST['personel_posta'])){
	$personel_posta=false;
echo"Geçerli eposta adresi giriniz!!";
}


	if(!$personel_adsoyad || !$personel_posta || !$personel_tel || !$personel_is_bolumu || !$personel_durum){
		
	}else {
		$kaydet=$db->prepare("INSERT INTO personel SET personel_adsoyad=?,personel_posta=?,personel_tel=?,personel_is_bolumu=?,personel_durum=?");
		$kaydet->execute(array($personel_adsoyad,$personel_posta,$personel_tel,$personel_is_bolumu,$personel_durum));
		
		if($kaydet){
			
		}else {
			echo "işlem başarısız.";
		}
	}
	
}
include ("altkisim.php");
?>