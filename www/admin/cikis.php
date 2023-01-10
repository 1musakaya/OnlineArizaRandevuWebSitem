<?php 

session_start();

session_destroy();

header("refresh: 2; url=index.php");



?>

<h3 style="border:1px solid #ddd; background:lightgreen;margin:10px;padding:10px;">basarılı bir sekilde cıkıs yaptınız yonlendiriliyorsunuz....</h3>
