<?php include("ustkisim.php");?>


<?php
require_once 'baglan.php';
session_start();



							if($_GET) {
								
								$id = $_GET['id'];
								if(!$id){
									header('location:admin.php');
								}else{
									$sil=$db->prepare (" delete * from personel where personel_id=:id");
									$sil->execute(array(":id" => $id));
								
									if ($sil) {
									
								}else{
									echo "Hata!!";
									
								}
								
								
								}
							}
							
							
							
							


include("altkisim.php");  ?>
