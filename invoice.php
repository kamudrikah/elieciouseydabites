<?php
include('./controller/session.php');
include('./controller/globalQuery.php');

date_default_timezone_set("Asia/Kuala_Lumpur");

$order_no = $_GET['order_no'];
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
	<?php
	$orderInfo = getOrderInfo($order_no,$conn_obj);
	$user = getUserInfo($_SESSION['user_id'],$conn_obj);
	$location = getDeliveryLocation($order_no,$conn_obj);
	$deliveryDate = getDeliveryDate($order_no,$conn_obj);
	$deliveryDate = strtotime($deliveryDate['delivery_date']);
	$totalAll = Array();
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Payment Method</h3>
					</div>
					<div class="panel-body">
						<p>
						<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> &nbsp Maybank : xxxxxx xxxxxx<br>
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> &nbsp elieciousart@yahoo.com<br>
						A copy of the Invoice has been sent to your email. Please upload the receipt payment after make the payment by click the <a href="./receipt.php">Receipt Payment</a> menu bar. 
						Make sure before delivery date, so we will deliver to you on time. 
						Thank you.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h2>Invoice</h2>
				<dl class="dl-horizontal">
					<dt>From</dt><dd>Elieciouseydabites.com</dd>
					<dt>To</dt><dd><?=$user['first_name']." ".$user['last_name']." (".$user['email'].")"?></dd>
					<dt>Order ID</dt><dd><?=$order_no?></dd>
					<dt>Issued</dt><dd><?=date("d M Y",time())?></dd>
					<dt>Delivery Date</dt><dd><?=date("d M Y",$deliveryDate)?></dd>
					<dt>Delivery Location</dt><dd><?=$location['place']?></dd>
				</dl>
			</div>
			<div class="col-md-6">
			</div>
			<div class="col-md-12">
				<table class="table table-striped table-hover table-bordered">
					<tr>
						<th>#</th>
						<th>Items</th>
						<th class="text-center">Quantity</th>
						<th>Unit Price (RM)</th>
						<th>Amount (RM)</th>
					</tr>
					<?php
					$i=1;
					while($row = $orderInfo->fetch_assoc()){
						$qty = $row['order_qty'];
						$price = $row['product_price'];
						$total = $price*$qty;
						array_push($totalAll, $total);
					?>
					<tr>
						<td><?=$i?></td>
						<td><?= $row['product_name']." (".$row['product_weight'].")"?></td>
						<td class="text-center"><?= $row['order_qty'] ?></td>
						<td>RM <?= number_format($row['product_price'],2) ?></td>
						<td>RM <?= number_format($total,2) ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
					<tr>
						<td colspan="4"><strong class="pull-right">TOTAL</strong></td>
						<td><strong>RM <?=number_format(array_sum($totalAll),2)?></strong></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

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