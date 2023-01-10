
<?php 

	
	
	
	try{
		$db = new PDO("mysql:host=localhost;dbname=sitedb;charset=utf8;","root","");
		
		
	}catch(PDOException $hata){
		print_r ($hata->getMessage());
	}
?>