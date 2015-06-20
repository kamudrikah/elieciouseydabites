<?php
include('./controller/session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Invoice |  Elie`cious Eyda Bites</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->       
<link rel="shortcut icon" href="images/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +6012-4389731 / +6014-9039376</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> elieciousart@yahoo.com</a></li>
								<li><a href=""><i class="fa fa-facebook"></i> FB & Instagram : ElieciOusBites</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">

					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/banner.jpg" alt="" /></a>
						</div>
						<div class="btn-group pull-right">

						</div>
					</div>

				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<?php include 'subMenu.php';?>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<!--<input type="text" placeholder="Search"/>-->
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="heading">
				<h3> Invoice</h3>
			</div>
			<div class="breadcrumbs">
			<?php
			$user_id = $_SESSION['user_id'];
			$sql="SELECT * FROM `order`
				JOIN `customer` c USING (user_id)
				JOIN `cod` ON order.product_deliveryAdd=cod.ID
				WHERE c.user_id='$user_id' 
				ORDER BY order_id desc
				LIMIT 1";
			$result=$conn->query($sql);
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	// print_r($row);
			    	$product_id=json_decode($row['product_id']);
			    	$price_id=json_decode($row['price_id']);
			    	$quantity=json_decode($row['product_qty']);
			?>
				<ol class="breadcrumb">
					<p>
						<br> 
						<span class="style1">
							<h3>Your Order ID = <?=$row['order_id']?></h3> </br>
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
					<tbody>
						<?php
						$total=0;
						for ($i=0; $i < sizeof($product_id); $i++) { 
							$sqlProd="SELECT * FROM `product_price` pp JOIN `product` p USING (product_id) WHERE price_id=$price_id[$i];";
							$resultProd=$conn->query($sqlProd);
							if ($resultProd->num_rows > 0) {
							    while($rowProd = $resultProd->fetch_assoc()) {
							    	// print_r($rowProd);
						?>
						<tr>
							<td class="cart_description">
								<h4><?=$rowProd['product_name']?></h4>
								<p><?=$rowProd['product_weight']?></p>
							</td>							
							<td class="cart_price">
								<p><?=$rowProd['product_price']?></p>
							</td>
							<td class="cart_quantity">
								<?=$quantity[$i]?>
							</td>
							<td class="cart_total">
								<?php
								$item_price=ltrim($rowProd['product_price'],'RM');
								$totalItemPrice=$item_price*$quantity[$i];
								$total=$total+$totalItemPrice;
								?>
								<p class="cart_total_price">RM <?=$totalItemPrice?></p>
							</td>
						</tr>
						<?php
							    }
							}
						}
						?>
						<tr>
							<td> </td>
							<td></td>
							<td><h4> Cash On Delivery </h4></td>
							<td class="cart_price"><p><?=$row['place']?></p></td>
						</tr>
						<tr>
							<td> </td>
							<td></td>
							<td><h4> Total Pay</h4></td>
							<td class="cart_total_price"><p>RM <?=$total?></p></td>
						</tr>
					</tbody>
				</table>
			<?php
			    }
			}
			?>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>E</span>lie`cious Eyda Bites</h2>
							<p>Marilah mencuba produk kami, pasti nak lagi.</p>
							<ul class="nav nav-pills nav-stacked">                            	
								<li><a href="pages/login.php" class="active"><i class="fa fa-lock"></i> Admin Login</a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2015 Elie`cious Eyda Bites Inc. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>
</html>