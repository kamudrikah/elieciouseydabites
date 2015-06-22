<?php
$mystring = $_SERVER["PHP_SELF"];
$findme   = 'pages';
$pos = strpos($mystring, $findme);

if ($pos !== false) {
	require_once("../controller/db_connect.php");
} else {
	require_once("./controller/db_connect.php");
}


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

$listReceipt = "SELECT first_name, last_name, phone, order_no, order_id, user_id FROM `order` join user using (user_id) group by order_no";
$receipt = mysqli_query($conn, $listReceipt);
$row_receipt = mysqli_fetch_assoc($receipt);

/*---------------- ORDER PART --------------------*/

$listOrder = "SELECT * FROM `order` o, `product_price` pc, `status` s, `user` u, `product` p,`cod` c
WHERE o.price_id=pc.price_id AND o.user_id=u.user_id AND o.order_status=s.status_id AND o.cod_id=c.ID GROUP BY o.order_no";
$order = mysqli_query($conn, $listOrder);
$total_order_row = mysqli_num_rows($order);

/*---------------- COD PART --------------------*/

// List All COD Place
$listCod = "SELECT * from cod where status='1'";
$cod = mysqli_query($conn, $listCod);
$total_cod_row = mysqli_num_rows($cod);

/*---------------- CATEGORY PART --------------------*/

$categoryList="SELECT * FROM category "; 

/*---------------- STATUS ORDER PART --------------------*/

$statusOrder="SELECT * FROM status where status_type = 'o' AND status_name != ' Temp' AND status_name != 'Temp_delete' "; 
$orderStatus = mysqli_query($conn, $statusOrder);
$row_status_order = mysqli_fetch_assoc($orderStatus);

// Cart Count Notification
$countCartList = "SELECT COUNT(*) count FROM `order` WHERE user_id='".$_SESSION['user_id']."' AND order_status='6'";
$countResultObj = $conn_obj->query($countCartList);
$row_count = $countResultObj->fetch_assoc();
$countResult = $row_count['count'];

// Generate Random no from DB
$sqlRandNo = "SELECT FLOOR(RAND() * 99999) AS random_num FROM `order` WHERE \"random_num\" NOT IN (SELECT order_no FROM `order`) LIMIT 1";
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

// Update order status
function updateOrderStatus($orderNo, $statusOrder, $conn){
	$sql = "UPDATE `order` SET order_status='$statusOrder' WHERE order_no='$orderNo'";
	if(mysqli_query($conn, $sql) === TRUE){
		return TRUE;
	}
}

// Get location
function getLocation($id,$conn_obj){
	$sql = "SELECT * FROM `cod` WHERE ID = '$id'";
	if($result = $conn_obj->query($sql)){
		while($row = $result->fetch_assoc()){
			return $row;
		}
	}
}

// Get order info
function getOrderInfo($order_no,$conn_obj){
	$sql = "SELECT * FROM `order` JOIN product_price USING (price_id) JOIN product USING (product_id) WHERE order_no='$order_no'";
	if($result = $conn_obj->query($sql)){
		return $result;
	}
}

// Get delivery location
function getDeliveryLocation($order_no,$conn_obj){
	$sql = "SELECT place FROM `order` JOIN cod ON `order`.cod_id=cod.ID WHERE order_no='$order_no' LIMIT 1";
	if($result = $conn_obj->query($sql)){
		while($row = $result->fetch_assoc()){
			return $row;
		}
	}
}

// Get delivery date
function getDeliveryDate($order_no,$conn_obj){
	$sql = "SELECT delivery_date FROM `order` WHERE order_no='$order_no' LIMIT 1";
	if($result = $conn_obj->query($sql)){
		while($row = $result->fetch_assoc()){
			return $row;
		}
	}
}

?>