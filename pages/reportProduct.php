<?php
include('../controller/session_admin.php');
include('../controller/javasript.php');
if(isset($_POST)){
	$cat = $_POST['cat'];
	$month = $_POST['month'];

		$category = ['Promotion','Cake','Dessert','Cookies','Cup Cake'];
		$numbers = array();
		foreach ($category as $key => $value) {
			$sql = "SELECT COUNT(*) cat_sale FROM `product`
				JOIN `product_price` USING (product_id)
				JOIN `order` USING (price_id)
				JOIN `category` ON product.product_category=category.cat_id
				WHERE order_status=1
				AND cat_name='$value'
				AND MONTH(order_date) = '$month'";

			$result = $conn_obj->query($sql);
			while($row = $result->fetch_assoc()) {
				array_push($numbers, $row['cat_sale']);
			}
		}

}
?>


<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin Panel | Elie`cious Eyda Bites</title>

	<!-- Bootstrap Core CSS -->
	<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	<!-- Timeline CSS -->
	<link href="../dist/css/timeline.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body onLoad="clock(),date()">

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">Elie`cious Eyda Bites</a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">
			 

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">                        
						<li><a href="../controller/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li class="sidebar-search">
							  <center>  
								<div id="clock" align="center"></div>
								<div id="date" align="center"></div>    
							  </center>
							<!-- /input-group -->
						</li>
						<li>
							<a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-inbox fa-fw"></i> File Manager<span class="fa arrow"></span></a>  
							<ul class="nav nav-second-level">
								<li>
									 <a href="listOrder.php"><i class="fa fa-table fa-fw"></i> Orders</a>
								</li>
				<li>
					  <a href="listReceipt.php"><i class="fa fa-table fa-fw"></i> List Receipt Payment</a>
					</li>
								<li>
									<a href="reportProduct.php"><i class="fa fa-bar-chart-o fa-fw"></i> Product Report</a>
								</li>
								<li>
									<a href="reportSales.php"><i class="fa fa-bar-chart-o fa-fw"></i> Sales Report</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						 <li>
									<a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Products<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
									  <li>
											<a href="addProduct.php"><i class="fa fa-edit fa-fw"></i> Add New Product </a>
										</li>
									  <li>
											<a href="listProduct.php"><i class="fa fa-table fa-fw"></i> List Product</a>
										  </li>
											<li>
											<a href="cod.php"><i class="fa fa-table fa-fw"></i> Add Local Delivery Place</a>
										  </li>
									</ul>
									<!-- /.nav-second-level -->
							  </li> 
				
							</ul>
							<!-- /.nav-second-level -->
						</li> 
					   
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Product Report Based On Completed Status Order In 
					<?php if(isset($_POST['month'])) 
					{

						if($_POST['month']==1)
						{
						echo "January";
						}else if($_POST['month']==2)
						{
						echo "February";
						}else if($_POST['month']==3)
						{
						echo "March";
						}else if($_POST['month']==4)
						{
						echo "April";
						}else if($_POST['month']==5)
						{
						echo "May";
						}else if($_POST['month']==6)
						{
						echo "June";
						}else if($_POST['month']==7)
						{
						echo "July";
						}else if($_POST['month']==8)
						{
						echo "August";
						}else if($_POST['month']==9)
						{
						echo "September";
						}else if($_POST['month']==10)
						{
						echo "October";
						}else if($_POST['month']==11)
						{
						echo "November";
						}else if($_POST['month']==12)
						{
						echo "December";
						}

					}

					?></h3>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			
			 <div class="panel-body">
							<div class="dataTable_wrapper">
							
								<table>
								 <form action="reportProduct.php" method="post">
								  <tr>
										<td>
										<input name='cat' value='all' type='hidden'>
										</td>
										<td>&nbsp;</td>
										<td>&nbsp; &nbsp;</td>
										<td>
											<select name="month" class="form-control">
												  <option value='' selected>Month </option>
												  <option value='1'>January</option>
												  <option value='2'>February</option>
												  <option value='3'>March</option>
												  <option value='4'>April</option>
												  <option value='5'>May</option>
												  <option value='6'>June</option>
												  <option value='7'>July</option>
												  <option value='8'>August</option>
												  <option value='9'>September</option>
												  <option value='10'>October</option>
												  <option value='11'>November</option>
												  <option value='12'>Disember</option>
											</select>
										</td>
										<td>&nbsp;</td>
										<td>
											<button type="submit" class="btn btn-info">Filter</button>
										</td>
										<td> &nbsp;&nbsp;</td>
									</tr>
								</form>
								</table>
								
								
							</div>
							<!-- /.table-responsive -->
						  
						</div>
						<!-- /.panel-body -->
			
			<!-- /.row -->
		  <div class="row">
							
				<!-- /.col-lg-6 -->
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Bar Chart Report
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="flot-chart">
								<div class="flot-chart-content" id="flot-bar-chart">
									<div id="chart_div"><div>
								</div>
							</div>
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-6 -->
			  
				<!-- /.col-lg-6 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->

	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<!-- Graph data -->
	<script type="text/javascript">
	google.load("visualization", "1.1", {packages:["bar"]});
	google.setOnLoadCallback(drawStuff);

	function drawStuff() {
		var data = new google.visualization.arrayToDataTable([
			['Category', 'Numbers'],
			["Promotion", <?=$numbers[0]?>],
			["Cake", <?=$numbers[1]?>],
			["Dessert", <?=$numbers[2]?>],
			["Cookies", <?=$numbers[3]?>],
			['Cup Cake', <?=$numbers[4]?>]
			]);

		var options = {
			title: 'Total sale by Categories',
			width: 900,
			legend: { position: 'none' },
			chart: { subtitle: 'popularity by numbers' },
			axes: {
				x: {
					0: { side: 'top', label: 'Categories'} // Top x-axis.
				}
			},
			bar: { groupWidth: "90%" }
		};

		var chart = new google.charts.Bar(document.getElementById('chart_div'));
		// Convert the Classic options to Material options.
		chart.draw(data, google.charts.Bar.convertOptions(options));
	};
	</script>
	<!-- jQuery -->
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

	<!-- Flot Charts JavaScript -->
	<script src="../bower_components/flot/excanvas.min.js"></script>
	<script src="../bower_components/flot/jquery.flot.js"></script>
	<script src="../bower_components/flot/jquery.flot.pie.js"></script>
	<script src="../bower_components/flot/jquery.flot.resize.js"></script>
	<script src="../bower_components/flot/jquery.flot.time.js"></script>
	<script src="../bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
	<script src="../js/flot-data.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>