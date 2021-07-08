<?php
ob_start();
session_start();

	$goodid = $_GET["goodid"];	
	for($i=0;$i<count($_SESSION["strProductID"]);$i++){
		if($_SESSION["strProductID"][$i] ==  $goodid ){
	  
	   $_SESSION["strProductID"][$i] = "";
		 $_SESSION["strQty"][$i] = "";		 

	  }
	}

	// session_destroy();
?>



