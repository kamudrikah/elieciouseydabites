<?php
include('./controller/session.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

$user_id 		= $_SESSION['user_id'];

$location		= $_POST['location'];
$prices			= $_POST['price_id'];
$order_date		= date("Y-m-d H:i:s", time());
$order_status	= 6; // "temp"

if(isset($prices)){
	foreach ($prices as $key => $price_id) {
		$sql = "INSERT INTO `order` (`user_id`,`price_id`,`order_date`,`order_status`,`order_qty`) VALUES ('$user_id','$price_id','$order_date','$order_status','1')";
		if($conn_obj->query($sql) === TRUE){
			header("Location: ./$location");
		}
	}
}else{
	header("Location: ./cake.php");
}
?>