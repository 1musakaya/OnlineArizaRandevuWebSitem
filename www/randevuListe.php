<?php  

session_start();

		
		if($_SESSION){
			
			try{
		$db = new PDO("mysql:host=localhost;dbname=sitedb;charset=utf8;","root","");
		
		
	}catch(PDOException $hata){
		print_r ($hata->getMessage());
	}
				
				?>
		
		<?php
					
					
					
					
					$v = $db->prepare("select * from randevular ");
					$v->execute(array());
					$c = $v->fetchAll(PDO::FETCH_ASSOC);
					$x = $v->rowCount();
					?>
					
					<h3>Randevularım</h3>
					<div class="randevularım">
					<table cellpadding="0" cellspacing="0">
					<thead>
					<tr><th>İsim</th><th>Soyisim</th><th>Nedeni</th><th>Adres</th><th>Tarih</th><th>Saat</th><th>E-Posta</th><th>İşlem</th>
					</tr>
					</thead>
					</table>
					</div>
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
					
					
					
					
					
					
					
					
					
					