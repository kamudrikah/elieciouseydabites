<?php
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
include('mysqli_con.php');
$cust_id = $_SESSION['cust_id'];
$product_id=$_POST['product_id'];
$price_id=$_POST['price_id'];

$sqlProd = "SELECT * FROM product WHERE product_id=$product_id";
$sqlPrice = "SELECT * FROM product_price WHERE price_id=$price_id";

$resultProc = $conn->query($sqlProd);
$resultPrice = $conn->query($sqlPrice);
if($resultProc->num_rows == 1){
	while($rowProd = $resultProc->fetch_assoc()) {
		$sqlInsertTempProd = "INSERT INTO temp_product VALUES (null,'".$rowProd['product_id']."','$cust_id','".$rowProd['product_name']."','1','0','','','','','','$price_id');";
		if ($conn->query($sqlInsertTempProd) === TRUE) {
			if($resultPrice->num_rows == 1){
				while($rowPrice = $resultPrice->fetch_assoc()) {
					$sqlInsertTempPrice = "INSERT INTO temp_price VALUES (null,'".$rowProd['product_id']."','','$cust_id','".$rowPrice['product_price']."','".$rowPrice['product_weight']."',1,'".date ("Y-m-d H:i:s", time())."','','');";
					if ($conn->query($sqlInsertTempPrice) === TRUE) {
						header("Location: ./cart.php");
					}
				}
			}
		}
	}
}
?>