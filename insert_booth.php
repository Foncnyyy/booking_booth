<?php
ob_start();
include("connect.php");

echo $goodid = $_GET["id"];
echo $qty = $_GET["qty"];

if(isset($_SESSION["strProductID"])){
	$position = '';
	$old_goodid = '';
	for($k=0;$k<count($_SESSION["strProductID"]);$k++){	
	
		if( $goodid == $_SESSION["strProductID"][$k] )//ดูว่าอยู่ session ตัวที่เท่าไหร่ที่สั่งไปแล้ว
		{ 
			$old_goodid = 1;
			$position = $k;
		}
	}

	echo '<br>count '.count($_SESSION["strProductID"]);
	if( $old_goodid == '1' ){ //มีสินค้าซ้ำในตะกร้า
		echo '<br>strQty:'.$_SESSION["strQty"][$position];
		echo '<br>strQty:'.$_SESSION["strQty"][$position] = $_SESSION["strQty"][$position] + $qty; 
	}
	else{ 
		$_SESSION["strProductID"][] = $_GET["id"] ;
		$_SESSION["strQty"][] = $qty; 
			
	}
			
}else if(is_null($_SESSION["strProductID"])){
	$_SESSION["strProductID"][] = $_GET["id"] ;
	$_SESSION["strQty"][] = $qty;
}

header("location:show_booth.php"); 
?>