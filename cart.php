<?php
include('./controller/session.php');
include('./controller/globalQuery.php');
print_r($_SERVER);
if(!isset($_SESSION['user_id'])){
  header("Location: ./cust_signin.php");
}
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Cart | Elie`cious Eyda Bites</title>
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

<!--date-->
<meta charset="utf-8">
<title>jQuery UI Datepicker - Default functionality</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
	$( "#datepicker" ).datepicker();
});
var arrayProd = [];
</script>
<!--/date-->

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
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="cart.php?res=getcart"><i class="fa fa-shopping-cart"></i> Cart <span> <?php if(isset($countResult)){echo ": ".$countResult." items";} ?></span></a></li>
							</ul>
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

	<form action="./add_order.php" method="post">
		<section id="cart_items">
			<div class="container">
				<div class="heading">
					<h3> Shopping Cart</h3>
				</div>
				<div class="table-responsive cart_info">
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="image">Item</td>
								<td class="description"></td>
								<td class="price">Price</td>
								<td class="quantity">Quantity</td>
								<td class="total">Total</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
						<?php
						$sql = "SELECT * FROM `order` o JOIN `product_price` pp USING (price_id) JOIN `product` USING (product_id) WHERE o.user_id='$user_id' AND o.order_status='6'";
						$result = $conn->query($sql);
						if($result->num_rows>0){
							while($row = $result->fetch_assoc()) {
						?>
							<tr>
								<td class="cart_product">
									<input type="hidden" name="orderId[]?>" value="<?=$row['order_id']?>">
									<input type="hidden" name="priceId[]?>" value="<?=$row['price_id']?>">
									<input type="hidden" name="productId[]?>" value="<?=$row['product_id']?>">
									<a href=""><img src="image.php?id=<?php echo $row['product_id']; ?>" height="180" width="180" /></a>
								</td>
								<td class="cart_description">
									<h4><?=$row['product_name']?></h4>
									<p><?php if($row['product_weight']=="Not Available"){echo "";}else{echo $row['product_weight'];}?></p>
								</td>
								<td class="cart_price">
									<p><?=$row['product_price']?></p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a><input type="button" id="increment<?=$row['price_id']?>" value="+" size="2" /></a>
										<input class="cart_quantity_input" type="text" name="number[]" id="number<?=$row['price_id']?>" value="<?=$row['order_qty']?>" size="2" min="0" readonly="readonly">
										<a><input type="button" id="decrease<?=$row['price_id']?>" value="-" size="2" /></a>
									</div>
									<script type="text/javascript">
									arrayProd.push("<?=$row['product_id']?>");
									var tItemPrice = [];
									var totalPayment = 0;
									$("#increment<?=$row['price_id']?>").click(function(){
										var no = parseInt($("#number<?=$row['price_id']?>").val())+1;
										var itemPrice = "<?=$row['product_price']?>";
										itemPrice = itemPrice.substring(2);
										$("#number<?=$row['price_id']?>").val(no);
										tItemPrice[<?=$row['price_id']?>]=itemPrice*no;
										$("#price<?=$row['price_id']?>").html("RM"+tItemPrice[<?=$row['price_id']?>]);
										totalPayment = 0;
										tItemPrice.forEach(function(value){
											totalPayment = totalPayment+value;
										});
										$(".totalPayment").html("RM "+totalPayment);
										$(".totalPayment").val("RM "+totalPayment);
										updateQty(<?=$row['order_id']?>,no);
									});
									$("#decrease<?=$row['price_id']?>").click(function(){
										var no = parseInt($("#number<?=$row['price_id']?>").val())-1;
										var itemPrice = "<?=$row['product_price']?>";
										itemPrice = itemPrice.substring(2);
										tItemPrice[<?=$row['price_id']?>]=itemPrice*no;
										if(no<0){
											$("#number<?=$row['price_id']?>").val(0);
										}else{
											$("#number<?=$row['price_id']?>").val(no);
										}
										if(tItemPrice[<?=$row['price_id']?>]<=0){
											$("#price<?=$row['price_id']?>").html("RM0")
										}else{
											$("#price<?=$row['price_id']?>").html("RM"+tItemPrice[<?=$row['price_id']?>]);
										}
										totalPayment = 0;
										tItemPrice.forEach(function(value){
											totalPayment = totalPayment+value;
										});
										$(".totalPayment").html("RM "+totalPayment);
										$(".totalPayment").val("RM "+totalPayment);
										updateQty(<?=$row['order_id']?>,no);
									});
									</script>
								</td>
								<td class="cart_total">
									<p class="cart_total_price" id="price<?=$row['price_id']?>"><?=$row['product_price']?></p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="./del_cart.php?id=<?php echo $row['order_id']; ?>"><i class="fa fa-times"></i></a>
								</td>
							</tr>
						<?php
							}
						}else{
						?>
							<tr>
								<td colspan="5">No item added to the cart</td>
							</tr>
						<?php
						}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</section> <!--/#cart_items-->

		<section id="do_action">
			<div class="container">
				<div class="heading">
					<h3> Delivery Method </h3>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<table>
							<tr>
								<td>
									<select name="cod" id="cod" class="form-control" >
										<label>Cash On Delivery (COD)- Only in Perak</label>
										<?php
										require_once('controller/db_connect.php');

										$cdquery="SELECT ID, place FROM cod ORDER BY ID ASC";
										$codQuery=mysqli_query($conn,$cdquery);

										while ($cdrow=mysqli_fetch_array($codQuery)) {
											$cdGear=$cdrow["ID"];
											$cdTitle=$cdrow["place"];
											echo "<option value=".$cdrow["ID"]." data-price=".$cdrow["CAR_PRICE"].">$cdTitle</option>";
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td> </br> </td>
							</tr>
							<tr>                       
								<td>
									Delivery Date (at least 3 days & above):
									</br>
									<input type="text" name="deliveryDate" class="form-control" id="input_timetable_date"></input>
									<span class="add-on"></span>
									<script type="text/javascript">
										$("#input_timetable_date").datepicker({dateFormat: "yy-mm-dd", minDate: 3, maxDate: "+1M +10D" });
									</script> 
								</td>
							</tr>
						</table>
					</div>
				</div>
				</br></br>
				<div class="col-sm-6">
					<div class="total_area">
						<div class="heading">
							<h3>Total Payment</h3>
						</div>
						<ul>
							<li>Total <span class="totalPayment"> RM</span></li>
						</ul>
						</br>	
						<table align="right">
							<tr>
								<input type="hidden" name="product_totalprice" value="" class="totalPayment">
								<td><button class="btn btn-default check_out">Check Out</button></td>
							</tr>
						</table>
						<script type="text/javascript">
						$("#submitData").click(function(){
							console.log(
								$('input[name="number"]').val()
							);
							$.post("./add_order.php",
								{
									user_id: "<?=$user_id?>",
									product_id: arrayProd,
									date:$("#templatemo_search_box").val(),
									totalPayment: "RM "+totalPayment,
									cod_id: $("#cod").val(),
								},
								function(msg){
									console.log(msg);
								},
								"json"
							);
						});
						</script>
					</div>
				</div>
			</div>
		</section>
	</form>

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

<script type="text/javascript">
	function updateQty(order_id,qty){
		$.post(
			"./updateQty.php", // url
			{order_id: order_id, qty: qty}, // data
			function(data){console.log(data);}, //success
			"json"
		);
	}
</script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>