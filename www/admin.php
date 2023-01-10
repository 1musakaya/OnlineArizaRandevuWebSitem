<!DOCTYPE html>
<html lang="tr">
<head>

<link rel="stylesheet" href="css/adminstil.css">

	<meta charset="utf-8">


</head>
<style type="text/css">

body {
	background:#eee;
}

</style>
<body>

<?php  

session_start();

		
		if($_SESSION){
			
			try{
		$db = new PDO("mysql:host=localhost;dbname=sitedb;charset=utf8;","root","");
		
		
	}catch(PDOException $hata){
		print_r ($hata->getMessage());
	}
			
			if ($_SESSION["id"]==1){
				
				
				if (@$_GET['islem'] == "randevusil") {
					$stmt=$db->query("DELETE FROM randevular WHERE randevu_id=".$_GET['id']);
					echo "Silme Basarili";
				}
				if (@$_GET['sil']=="uyesil") {
					$stmt=$db->query("DELETE FROM uyeler WHERE uye_id=".$_GET['id']);
					echo "Silme Basarili";
				}
				if (@$_GET['is']=="personelsil") {
					$stmt=$db->query("DELETE FROM personeller WHERE personel_id=".$_GET['id']);
					echo "Silme Basarili";
				}
				
				
				?>
				
				<div class="admin">
				<img src="images/adminpanel.jpg" alt=""/>
				<h3>Admin Paneli Kullanıcı: <span><?php echo $_SESSION["uye"];?></span><span style="float:right;"><a href="index.php"  >Siteye Dön</a></span></h3>
				</div>
				
				<div class="genel">
				<div class="menu">
				<ul>
				<li><a href="?do=uyeler">uyeler</a></li>
				<li><a href="?do=randevular">randevular</a></li>
				<li><a href ="?do=personeller">personeller</a><li>
				<li><a href="personel_ekle.php">Personel Ekle</a></li>
 				<li><a href="giris_yap.php">Çıkış Yap</a></li>
				</ul>
				</div>
				<div class="icerik">
				<?php
				$do = @$_GET["do"];
				switch($do){
					case "uyeler":
					
					$v = $db->prepare("select * from uyeler ");
					$v->execute(array());
					$c = $v->fetchAll(PDO::FETCH_ASSOC);
					$x = $v->rowCount();
					
					
					?>
					<h2>Üyeler</h2>
					<div class="admin_uyeler">
					<table cellpadding="0" cellspacing="0" >
					<thead>
					<tr><th>İsim</th><th>Soyisim</th><th>Kullanıcı adı</th><th>Şifre</th><th>E-Posta</th><th>Durum</th><th>İşlem</th>
					</tr>
					</thead>
					
					<?php
					if($x) {
						
						foreach($c as $m) {
							?>
							
							<tbody>
							<tr>
							<td width="250"><?php echo $m["uye_ad"];?></td><td width="250"><?php echo $m["uye_soyad"];?></td><td width="250"><?php echo $m["uye_kadi"];?></td><td width="250"><?php echo "?";?></td><td width="250"><?php echo $m["uye_posta"];?></td width="250"><td> 
							
							<?php
							
							if($m["uye_id"] ==1 ) {
								echo '<span style="color:green">Admin</span>';
							}else {
								echo '<span style="color:blue">Üye</span>';
							}
							
							?>
							
							</td><td align="center" width="250"><a href="?sil=uyesil&id=<?php echo $m["uye_id"]; ?>" >sil</a></td>
							</tr>
							</tbody>
					
					
							<?php
							
							
							
						}
						
						
					}else {
						echo '<tr><td width="1200"colspan="6"><h3 class="admin_dikkat">Üye Kaydı Yok</h3></td></tr>';
					}
					
					?>
					</table>
					</div>
					<?php
					break;
					
					case "randevular":
					
					$v = $db->prepare("select * from randevular ");
					$v->execute(array());
					$c = $v->fetchAll(PDO::FETCH_ASSOC);
					$x = $v->rowCount();
					?>
					
					<h3>Randevular</h3>
					<div class="admin_randevular">
					<table cellpadding="0" cellspacing="0">
					<thead>
					<tr><th>İsim</th><th>Soyisim</th><th>Nedeni</th><th>Adres</th><th>Tarih</th><th>Saat</th><th>E-Posta</th><th>İşlem</th>
					</tr>
					</thead>
								
					<?php
					if($x) {
						foreach($c as $m) {
							?>
							</tbody>
							<tr>
							<td width="150"><?php echo $m["randevu_ad"];?></td><td width="150"><?php echo $m["randevu_soyad"];?></td><td width="500"><?php echo $m["randevu_neden"];?></td><td width="350"><?php echo $m["randevu_adres"];?></td><td width="150"><?php echo $m["randevu_tarih"];?></td><td width="150"><?php echo $m["randevu_saat"];?></td><td width="200"><?php echo $m["randevu_posta"];?></td><td align="center" width="150"><a href="">Onayla</a> <a href="?islem=randevusil&id=<?php echo $m["randevu_id"]; ?>">Sil</a></td>
							</tr>
							<tbody> 
							<?php
							
						}
					}else {
						echo '<tr><td width="1200"colspan="7"><h3 class="randevu_dikkat">Randevu Kaydı Yok</h3></td></tr>';
					}
					
					
					?>
					</table>
					</div>
					
					<?php
					
					break;
					
					case "personeller":
					$v = $db->prepare("select * from personel ");
					$v->execute(array());
					$c = $v->fetchAll(PDO::FETCH_ASSOC);
					$x = $v->rowCount();
					?>
					
					<h3>Personeller</h3>
					<div class="admin_personeller">
					<table cellpadding="0" cellspacing="0">
					<thead>
					<tr><th>İD</th><th>İsim Soyisim</th><th>E-Posta</th><th>Telefon</th><th>İş Bölümü</th><th>Durum</th><th>İşlem</th>
					</tr>
					</thead>
								
					<?php
					if($x) {
						foreach($c as $m) {
							?>
							</tbody>
							<tr>
							<td width="50"><?php echo $m["personel_id"];?><td width="300"><?php echo $m["personel_adsoyad"];?></td><td width="300"><?php echo $m["personel_posta"];?></td><td width="300"><?php echo $m["personel_tel"];?></td><td width="150"><?php echo $m["personel_is_bolumu"];?></td><td width="50"><?php echo $m["personel_durum"];?></td><td align="center" width="300"> <a  href="?is=personelsil&id=<?php echo $m["personel_id"]; ?>">Sil</a></td>
							</tr>
							<tbody> 
							
							
							
							
							<?php
							
							
						}
					}else {
						echo '<tr><td width="1200"colspan="4"><h3 class="personel_dikkat">Personel Kaydı Yok</h3></td></tr>';
					}
					
					
					?>
					
				

					
					<?php
					break;
					
				
					
					
					
					
					
					
					default:
					echo "<h2 style='border:1px solid #ddd;margin:2px;padding:10px;
					background:lightblue;color:purple; '>Admin Paneli Anasayfası</h2>";
					break;
				}
				
				?>
				
				</div>
				</div> 
				
				<?php
		   
	   }else {
		   
		 echo "<div style='border:1px solid #ddd;width:500px;height:20px;margin:5px;padding:12px;
		 position:relative;top:200px;left:400px;font-size:20px;background:red;
		 '>bu sayfada yetkiniz bulunmuyor</div>";  
		   header ("refresh: 3; url=index.php");
	   }		
		 
		 
	 }else {
		 
		 echo "<div style='border:1px solid #ddd;width:500px;height:20px;margin:5px;padding:12px;
		 position:relative;top:200px;left:400px;font-size:20px;background:lightyellow;
		 '>uye girisi yapmanız gerekiyor</div>";
		 
	 }
	 
	 
      ?>
	  
	  


</body>
</html>



		