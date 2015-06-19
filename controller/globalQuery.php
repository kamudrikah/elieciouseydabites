<?php

require_once("./controller/db_connect.php");


/*---------------- PRODUCT PART --------------------*/

// Get last Product ID
$sqlSelect = "SELECT product_id from product ORDER BY product_id DESC LIMIT 1";
$result = mysqli_query($conn, $sqlSelect);
$lastID=mysqli_fetch_array($result,MYSQLI_ASSOC);
$product_id=$lastID['product_id'];

// Get List Of Product
$listProduct = "SELECT * from product p, product_price pc, status s, category c 
            where p.product_id = pc.product_id  AND p.product_category = c.cat_id AND pc.product_status = s.status_id ORDER BY pc.price_id ASC";
$product = mysqli_query($conn, $listProduct);
$row_product = mysqli_fetch_assoc($product);
$total_product_row = mysqli_num_rows($product);



/*---------------- COD PART --------------------*/

// List All COD Place
$listCod = "SELECT * from cod where status='1'";
$cod = mysqli_query($conn, $listCod);
$total_cod_row = mysqli_num_rows($cod);

/*---------------- CATEGORY PART --------------------*/

$categoryList="SELECT * FROM category "; 

// Cart Count Notification
$countCartList = "SELECT COUNT(*) count FROM `order` WHERE user_id='".$_SESSION['user_id']."' AND order_status='6'";
$countResultObj = $conn_obj->query($countCartList);
$row_count = $countResultObj->fetch_assoc();
$countResult = $row_count['count'];

// Generate Random no from DB
$sqlRandNo = "SELECT FLOOR(RAND() * 99999) AS random_num FROM `order` WHERE \"random_num\" NOT IN (SELECT order_id FROM `order`) LIMIT 1";
$randNoResult = $conn_obj->query($sqlRandNo);
$rowRand = $randNoResult->fetch_assoc();
$orderNoRand = $rowRand['random_num'];

// Get all USER info
function getUserInfo($user_id, $conn_obj){
	$sql = "SELECT * FROM `user` WHERE user_id='$user_id'";
	$user = Array();
	$resultUser = $conn_obj->query($sql);
	if($resultUser->num_rows == 1){
		while($row = $resultUser->fetch_assoc()){
			return $row;
		}
	}
}

// Update quantity for cart in ORDER table
function updateQty($order_id, $qty, $conn_obj){
	$sql = "UPDATE `order` SET order_qty='$qty' WHERE order_id='$order_id'";
	if($conn_obj->query($sql) === TRUE){
		return TRUE;
	}
}

// Update Reciept Image
function updateReciept($order_id, $img, $conn_obj){
	$sql = "UPDATE `order` SET order_reciept='$img' WHERE order_no='$order_id'";
	if($conn_obj->query($sql) === TRUE){
		return TRUE;
	}
}

?>