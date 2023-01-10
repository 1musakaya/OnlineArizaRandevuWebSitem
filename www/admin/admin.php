<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>kolay video dersleri</title>
	<link rel="stylesheet" href="style.css"/>
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
	
	$db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8","root","");
	
}catch(PDOException $mesaj){
	
	
	echo $mesaj->getmessage();
	
} 
		 
		 
		
       if($_SESSION["durum"] == 1){
		   
		   ?>
		   <div class="header">
		   <img src="img/logo.png" alt="" />
		   <h3>admin paneline hosgeldiniz <span><?php echo $_SESSION["uye"];?></span> <span style="float:right;">
		   
		   <a href="index.php">siteyi goruntule</a></span></h3>
		   </div>
		   <div class="genel">
		   <div class="menu">
		   <ul> 
		   <li><a href="admin.php">anasayfa</a></li>
		   <li><a href="?do=konu">konular</a></li>
		   <li><a href="">kategoriler</a></li>
		   <li><a href="">yorumlar</a></li>
		   <li><a href="">uyeler</a></li>
		   <li><a href="">cıkıs yap</a></li>
		   </ul>
		   </div>
		   <div class="icerik">
		   <?php
            $do = @$_GET["do"];
			
			switch($do){
				
				case "konu":
				
				$v = $db->prepare("select * from konular  inner join kategoriler on kategoriler.kategori_id = konular.konu_kategori order by konu_id desc limit 20");
				$v->execute(array());
				$c = $v->fetchAll(PDO::FETCH_ASSOC);
				$x = $v->rowCount();
				
				?>
				<h2>konular <span style="float:right;"><a href="?do=konu_ekle">konu ekle</a></span></h2>
				<div class="admin_konular"> 
				<table cellpadding="0" cellspacing="0">
				<thead> 
				<tr><th>konu baslıkları</th><th>konu onayları</th><th>konu kategorileri</th><th>işlemler</th> 
				</tr>
				</thead>
				
				
				<?php 
				
				if($x){
				    
					foreach($c as $m){
						?>
						<tbody> 
						<tr> 
						<td width="600"><?php echo $m["konu_baslik"];?></td><td width="250"> 
						<?php 
						
						if($m["konu_durum"] == 1){
							
							echo '<span style="color:green">onaylı</span>';
							
						}else {
							
							echo '<span style="color:red">onaylı deyil</span>';
							
						}
						
						?>
						
						</td><td width="300"><?php echo $m["kategori_adi"];?></td><td align="center" width="250"><a href="">sil</a> <a href="">duzenle</a></td>
						</tr>
						</tbody>
						<?php
						
						
					}	
				
					
				}else {
					
					echo '<tr><td width="1300" colspan="4"><h3 class="admin_dikkat">henuz siteye hiç konu eklenmemis</h3></td></tr>';
					
				}
				
				?>
				
				</table>
				</div>
				<?php
				break;
				
				case "konu_ekle":
				?>
				<h2>konu ekle</h2>
				<?php
				if($_POST){
					
					$baslik   = $_POST["baslik"];
					$kategori = $_POST["kategori"];
					$aciklama = $_POST["aciklama"];
					$onay     = $_POST["onay"];
					
					if(!$baslik || !$aciklama){
					   
                        echo '<h3 class="admin_dikkat">bos alan bırakmayın</h3>';					   
						
					}else {
						
						$v = $db->prepare("select * from konular where konu_baslik=?");
						$v->execute(array($baslik));
						$z = $v->fetch(PDO::FETCH_ASSOC);
						$x = $v->rowCount();
						
						if($x){
							
							echo "<h3 class='admin_dikkat'>".$baslik." adinda bir konu zaten var baska bir konu ekleyin</h3>";
							
						}else {
						$insert = $db->prepare("insert into konular set 
						
						            konu_baslik=?,
									konu_kategori=?,
						            konu_aciklama=?,
									konu_durum=?,
									konu_ekleyen=?
						");
						
						$kayit = $insert->execute(array($baslik,$kategori,$aciklama,$onay,$_SESSION["uye"]));
						
						if($kayit){
							
							echo '<h4 class="admin_basarili">konu basarıyla eklendi yonlendiriliyorsunuz</h4>';
							
							header("refresh: 2; url=?do=konu");
							
						}else {
							
							echo '<h3 class="admin_dikkat">konu eklenirken bir hata olustu</h3>';
							
						}
						}
					}
					
					
				}else {
					$z = $db->prepare("select * from kategoriler");
					$z->execute(array());
					$c = $z->fetchAll(PDO::FETCH_ASSOC);
					?>
					<div class="admin_konu_ekle"> 
					<form action="" method="post">
					<ul> 
					<li>konu baslık</li>
					<li><input type="text" name="baslik" /></li>
					<li> 
					<select name="kategori" id="">
					<?php 
					
					foreach($c as $m){
						
						echo '<option value="'.$m["kategori_id"].'">'.$m["kategori_adi"].'</option>';
						
					}
					
					?>
					
					</select>
					</li>
					<li>konu acıklaması</li>
					<li><textarea name="aciklama"  cols="50" rows="10"></textarea></li>
					<li><select name="onay" id=""> 
					<option value="1">onaylı</option>
					<option value="0">onaylı deyil</option>
					</select></li>
					<li><button type="submit">konu ekle</button></li>
					</ul>
					</form>
					</div>
					<?php
					
					
				}
				
				break;
				
				case "uye":
				echo "uye";
				break;
				
				case "kategori":
				
				break;
				
				case "yorum":
				
				break;
				
				default:
				echo "<h2 style='border:1px solid #ddd;margin:2px;padding:10px;
				background:lightgreen;
				'>admin paneli anasayfası</h2>";
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