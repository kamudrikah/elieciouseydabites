<?php
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
include('mysqli_con.php');
$cust_id = $_SESSION['cust_id'];
$product_id=$_POST['product_id'];
$price_id=$_POST['price_id'];
// print_r($price_id);
// die();

$sqlPrice = array();
$resultPrice = array();
$sqlInsertTempProd = array();

$sqlProd = "SELECT * FROM product WHERE product_id=$product_id";
foreach ($price_id as $key => $value) {
	$sqlPrice[] = "SELECT * FROM product_price WHERE price_id=$value";
}

foreach ($sqlPrice as $key => $result) {
	$resultPrice[] = $conn->query($result);
}

$resultProc = $conn->query($sqlProd);
// $resultPrice = $conn->query($sqlPrice);
echo "a";
if($resultProc->num_rows == 1){
	echo "b";
	while($rowProd = $resultProc->fetch_assoc()) {
		echo "c";
		foreach ($price_id as $key => $value) {
			$sqlInsertTempProd[] = "INSERT INTO temp_product VALUES (null,'".$rowProd['product_id']."','$cust_id','".$rowProd['product_name']."','1','0','','','','','','$value');";
		}
		echo "d";
		foreach ($sqlInsertTempProd as $key => $query) {
			echo "e";
			if ($conn->query($query) === TRUE) {
				echo "f";
				foreach ($resultPrice as $key => $value) {
					echo "g";
					if($value->num_rows == 1){
						echo "h";
						while($rowPrice = $value->fetch_assoc()) {
							echo "i";
							$sqlInsertTempPrice = "INSERT INTO temp_price VALUES (null,'".$rowProd['product_id']."','','$cust_id','".$rowPrice['product_price']."','".$rowPrice['product_weight']."',1,'".date ("Y-m-d H:i:s", time())."','','');";
							if ($conn->query($sqlInsertTempPrice) === TRUE) {
								echo "j";
								header("Location: ./cart.php");
							}
						}
					}
				}
			}
		}
	}
}
?>