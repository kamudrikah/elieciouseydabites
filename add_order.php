<?php
include('./controller/session.php');
include('./controller/globalQuery.php');
date_default_timezone_set("Asia/Kuala_Lumpur");
// print_r($_POST);
$order_id = $_POST['orderId'];
$number = $_POST['number'];
$deliveryDate = $_POST['deliveryDate'];

for ($i=0; $i < sizeof($order_id) ; $i++) { 
	$sql = "UPDATE `order` SET order_no='$orderNoRand', order_qty='$number[$i]', order_status='3' WHERE order_id=$order_id[$i]";
	if($conn_obj->query($sql) === TRUE){
		//Send email
		// header("Location: ./invoice.php?order_no=$orderNoRand");
	}else{
		die("Connection failed: " . $conn_obj->connect_error);
	}
}
generate_email($conn_obj,$_SESSION['user_id'],$orderNoRand,$deliveryLocation);

function generate_email($conn_obj,$user_id, $orderNoRand,$deliveryLocation){
	$user=getUserInfo($_SESSION['user_id'],$conn_obj);
	$sqlGetOrderList = "SELECT * FROM `order` JOIN user USING (user_id) JOIN product_price USING (price_id) JOIN product USING (product_id) WHERE order_no='$orderNoRand' AND order_status='3';";
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
			$emailContent .= "<dt>Delivery Location</dt><dd>".$deliveryLocation."</dd>";
			$emailContent .= "</dl>";
		$emailContent .= "</div>";
		$emailContent .= "<div class='col-md-6'>";
			$emailContent .= "ELICIOUSEYDABITES";
		$emailContent .= "</div>";
		$emailContent .= "<div class='col-md-12'>";
			$emailContent .= "<p>Please make payment after order & upload the reciept immediately.</p><br>";
			$emailContent .= "<table class='table table-striped'>";
			$emailContent .= "<tr><th>#</th><th>Items</th><th>Quantity</th><th>Unit Price (RM)</th><th>Amount (RM)</th></tr>";
		while($row = $resultList->fetch_assoc()) {
			// print_r($row);
			$val1 = (int)substr($row['product_price'],2);
			$val2 = (int)substr($row['order_qty'],2);
			$total = $val1*$val2;
			var_dump($total);
			$emailContent .= "<tr><td></td><td>".$row['product_name']."</td><td>".$row['order_qty']."</td><td>".$row['product_price']."</td><td>RM ".$total."</td></tr>";
		}
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
		echo $emailContent;
	}
}
die();

$cust_id=$_SESSION['cust_id'];
$productId=json_encode($_POST["productId"]);
$priceId=json_encode($_POST["priceId"]);
$number=json_encode($_POST["number"]);
$deliveryDate=$_POST["deliveryDate"];
$cod=$_POST["cod"];
$product_totalprice=$_POST["product_totalprice"];

$sql="INSERT INTO `order` (`cust_id`,`product_id`,`price_id`,`product_qty`,`order_date`,`product_deliveryAdd`,`product_totalprice`,`order_status`) VALUES ('$cust_id','$productId','$priceId','$number','$deliveryDate','$cod','$product_totalprice','processing')";
if ($conn->query($sql) === TRUE) {
	$sqlDelete1 = "DELETE FROM `temp_product` WHERE cust_id='$cust_id'";
	$sqlDelete2 = "DELETE FROM `temp_price` WHERE cust_id='$cust_id'";
	$conn->query($sqlDelete1);
	$conn->query($sqlDelete2);

	//SEND EMAIL INVOICE
	$txt="";
	$txt.='<section id="cart_items">'
		.'<div class="container">'
			.'<div class="heading">'
				.'<h3> Invoice</h3>'
			.'</div>'
			.'<div class="breadcrumbs">';

			$cust_id = $_SESSION['cust_id'];
			$sql="SELECT * FROM `order`
				JOIN `customer` c USING (cust_id)
				JOIN `cod` ON order.product_deliveryAdd=cod.ID
				WHERE c.cust_id='$cust_id' 
				ORDER BY order_id desc
				LIMIT 1";
			$result=$conn->query($sql);
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	// print_r($row);
			    	$product_id=json_decode($row['product_id']);
			    	$price_id=json_decode($row['price_id']);
			    	$quantity=json_decode($row['product_qty']);

				$txt.='<ol class="breadcrumb">
					<p>
						<br> 
						<span class="style1">
							<h3>Your Order ID = '.$row['order_id'].'</h3> </br>
						</span>
					</p>
					<p>
						<b>Payment Method </br>

						Maybank : xxxxxx xxxxxx </br>
						elieciousart@yahoo.com </br>

						Please upload the receipt payment after make the payment by click the <a href="receipt.php">Receipt Payment</a> menu bar.
						<br>
						Make sure before delivery date, so we will deliver to you on time.
						<br> 
						Thank you.
						</b>
					</p>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Item</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>';

						$total=0;
						for ($i=0; $i < sizeof($product_id); $i++) { 
							$sqlProd="SELECT * FROM `product_price` pp JOIN `product` p USING (product_id) WHERE price_id=$price_id[$i];";
							$resultProd=$conn->query($sqlProd);
							if ($resultProd->num_rows > 0) {
							    while($rowProd = $resultProd->fetch_assoc()) {
							    	// print_r($rowProd);

						$txt.='<tr>
							<td class="cart_description">
								<h4>'.$rowProd['product_name'].'</h4>
								<p>'.$rowProd['product_weight'].'</p>
							</td>							
							<td class="cart_price">
								<p>'.$rowProd['product_price'].'</p>
							</td>
							<td class="cart_quantity">'.$quantity[$i].'</td>
							<td class="cart_total">';
								$item_price=ltrim($rowProd['product_price'],'RM');
								$totalItemPrice=$item_price*$quantity[$i];
								$total=$total+$totalItemPrice;

								$txt='<p class="cart_total_price">RM '.$totalItemPrice.'</p>
							</td>
						</tr>';
							    }
							}
						}
						$txt.='<tr>
							<td> </td>
							<td></td>
							<td><h4> Cash On Delivery </h4></td>
							<td class="cart_price"><p>'.$row["place"].'</p></td>
						</tr>
						<tr>
							<td> </td>
							<td></td>
							<td><h4> Total Pay</h4></td>
							<td class="cart_total_price"><p>RM '.$total.'</p></td>
						</tr>
					</tbody>
				</table>';

			    }
			}

			$txt.='</div>
		</div>
	</section>';

	$sqlUserInfo = "SELECT * FROM customer where cust_id='$cust_id'";
	$result = $conn->query($sqlUserInfo);
	if($result->num_rows == 1){
		while($row = $result->fetch_assoc()){
			$to = $row['cust_email'];
			$subject = "Eliciouseybites Invoice";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: webmaster@eliciouseybites.com' . "\r\n";

			mail($to,$subject,$txt,$headers);
		}
	}

	header("Location: ./invoice.php");
}
?>