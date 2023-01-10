<?php include("ustkisim.php");?>



<?php
session_start();
session_destroy();
 
 header("location:index.php");

include("altkisim.php");  ?>