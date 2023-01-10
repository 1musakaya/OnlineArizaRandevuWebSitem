<?php 

require_once 'baglan.php';

if (@$_POST['tarih']){
	
		$sor=$db->prepare("SELECT randevu_saat FROM randevular WHERE randevu_tarih=:rtarih");
		$sor->bindParam(":rtarih",$_POST['tarih'],PDO::PARAM_STR);
		$sor->execute();
		$veri=$sor->fetchAll(PDO::FETCH_NUM);
		$randevuSaatler=Array(
		"09:00:00"
		,"10:00:00"
		,"11:00:00"
		,"12:00:00"
		,"13:00:00"
		,"14:00:00"
		,"15:00:00"
		,"16:00:00"
		,"17:00:00"
		,"18:00:00"
		,"19:00:00"
		,"20:00:00"
		,"21:00:00"
		,"22:00:00"
		);
		foreach($veri as $tarih) {
			
			$randevuSaatler=array_diff($randevuSaatler, $tarih);
		}
foreach($randevuSaatler as $randevu) {
	echo "<option>". $randevu."</option>";
}
}

?>