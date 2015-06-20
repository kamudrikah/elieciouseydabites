<?php
include('./controller/session.php');
include('./controller/globalQuery.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

// print_r($_POST);

$order_id = $_POST['orderId'];
$number = $_POST['number'];
$deliveryLocation = $_POST['cod'];
$deliveryDate = $_POST["deliveryDate"];

if(isset($order_id)){
	for ($i=0; $i < sizeof($order_id) ; $i++) { 
		$sql = "UPDATE `order` SET order_no='$orderNoRand', order_qty='$number[$i]', order_status='3', cod_id='$deliveryLocation', delivery_date='$deliveryDate' WHERE order_id=$order_id[$i]";
		if($conn_obj->query($sql) === TRUE){
			//Send email
			header("Location: ./invoice.php?order_no=$orderNoRand");
		}else{
			die("Connection failed: " . $conn_obj->connect_error);
		}
	}
	generate_email($conn_obj,$_SESSION['user_id'],$orderNoRand,$deliveryLocation);

}else{
	header("Location: ./cart.php");
}


function generate_email($conn_obj,$user_id, $orderNoRand,$deliveryLocation){
	$i=1;
	$totalAll=array();
	$user = getUserInfo($_SESSION['user_id'],$conn_obj);
	$location = getLocation($deliveryLocation,$conn_obj);
	$sqlGetOrderList = "SELECT * FROM `order` JOIN user USING (user_id) JOIN product_price USING (price_id) JOIN product USING (product_id) JOIN cod ON order.cod_id=cod.ID WHERE order_no='$orderNoRand' AND order_status='3';";
	$resultList = $conn_obj->query($sqlGetOrderList);
	if($resultList->num_rows>0){
		$emailContent = "<!DOCTYPE html>";
		$emailContent .= "<html lang='en'>";
		$emailContent .= "<div class='container'>";
		$emailContent .= "<div class='row'>";
		$emailContent .= "<div class='col-md-6'>";
			$emailContent .= "<dl class='dl-horizontal'>";
			$emailContent .= "<dt>To</dt><dd>".$user['first_name']." ".$user['last_name']."</dd>";
			$emailContent .= "<dt>Order ID</dt><dd>".$orderNoRand."</dd>";
			$emailContent .= "<dt>Issued</dt><dd>".date("d M Y",time())."</dd>";
			$emailContent .= "<dt>Delivery Location</dt><dd>".$location['place']."</dd>";
			$emailContent .= "</dl>";
		$emailContent .= "</div>";
		$emailContent .= "<div class='col-md-6'>";
			$emailContent .= "ELICIOUSEYDABITES";
		$emailContent .= "</div>";
		$emailContent .= "<div class='col-md-12'>";
			$emailContent .= "<p>Please make payment after order & upload the reciept immediately.</p><br>";
			$emailContent .= "<table class='table table-striped'>";
			$emailContent .= "<tr><th>#</th><th>Items</th><th>Quantity</th><th style='text-align: center;'>Unit Price (RM)</th><th style='text-align: center;'>Amount (RM)</th></tr>";
		while($row = $resultList->fetch_assoc()) {
			// print_r($row);
			$val1 = $row['product_price'];
			$val2 = $row['order_qty'];
			$total = $val1*$val2;
			array_push($totalAll, $total);
			if($row['product_weight']==""){
				$emailContent .= "<tr><td>".$i."</td><td>".$row['product_name']."</td><td>".$row['order_qty']."</td><td style='text-align: center;'>".$row['product_price']."</td><td style='text-align: center;'>RM ".$total."</td></tr>";
			}else{
				$emailContent .= "<tr><td>".$i."</td><td>".$row['product_name']." (".$row['product_weight'].")</td><td>".$row['order_qty']."</td><td style='text-align: center;'>".$row['product_price']."</td><td style='text-align: center;'>RM ".$total."</td></tr>";
			}
			$i++;
		}
			$totalAll = array_sum($totalAll);
			$emailContent .= "<tr><td colspan='4' style='text-align: right;'><b>TOTAL</b></td><td style='text-align: center;'><b>RM ".$totalAll."</b></td></tr>";
			$emailContent .= "</table>";
			$emailContent .= "<br><p>DO NOT REPLY TO THIS EMAIL. THIS IS AUTO GENERATED EMAIL.</p>";
			$emailContent .= "<p>Thank you</p>";
		$emailContent .= "</div>";
		$emailContent .= "</div>";
		$emailContent .= "</div>";

		$emailContent .= "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>";
		$emailContent .= "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css'>";
		$emailContent .= "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>";
		$emailContent .= "</html>";
		// echo $emailContent;

		$to = $user['email'];
		$subject = "Eliciouseybites Invoice";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: webmaster@eliciouseybites.com' . "\r\n";

		mail($to,$subject,$emailContent,$headers);
	}
}
?>