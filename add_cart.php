<?php
include('./controller/session.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

$location		= $_POST['location'];

$user_id 		= $_SESSION['user_id'];
$prices			= $_POST['price_id'];
$order_date		= date("Y-m-d H:i:s", time());
$order_status	= 6; // "temp"

foreach ($prices as $key => $price_id) {
	$sql = "INSERT INTO `order` (`user_id`,`price_id`,`order_date`,`order_status`) VALUES ('$user_id','$price_id','$order_date','$order_status')";
	if($conn_obj->query($sql) === TRUE){
		header("Location: ./$location");
	}
}
?>