<?php
   include('../controller/session_admin.php');
   include('../controller/javasript.php');
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
                          			  <a href="addProduct.php"><i class="fa fa-edit fa-fw"></i> Add New Product on Multiple Price</a>
                        		</li>
				<li>
                          			  <a href="addProductSingle.php"><i class="fa fa-edit fa-fw"></i> Add New Product on Single Price</a>
                        		</li>
				
                                <li>
                           			 <a href="listProduct.php"><i class="fa fa-table fa-fw"></i> List Product</a>
                      		    </li>

				<li>
                           			 <a href="cod.php"><i class="fa fa-table fa-fw"></i> Add Cash On Delivery Places</a>
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
                    <h1 class="page-header">Products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                               <table class="table table-striped table-bordered table-hover" width="1036">
                                 <form action="" method="">
                                   <tr>
                                    	<td colspan="3">                   	                      
               	                          <div align="left">
                   	                          <select name="act">
                   	                            <option value='' selected>Bulk Actions </option>
                   	                            <option value='delete'>Delete</option>
               	                            </select>                                        
               	                            <button type="button" class="btn btn-info">Apply</button>
               	                          </div></td>
                                        <td>
                                          
                                          <div align="left">
                                              <select name="cat">
                                            	  <option value='' selected>Select a Category </option>
  												  <option value='promotion'>Promotion</option>
   												  <option value='cake'>Cake</option>
                                                  <option value='dessert'>Dessert</option>
                                                  <option value='cookies'>Cookies</option>
                                                  <option value='cupcake'>Cup Cake</option>
                                            </select>                		   		   
                                          </div> </td>
                                        <td> <button type="button" class="btn btn-info">Filter</button></td>
						<!-- Search by barcode-->
                                   		<td><input type="text" placeholder="Barcode"/></td>
                                        <td colspan="3"> <button type="button" class="btn btn-info">Search</button></td>
                                   <tr>
                                     <td colspan="9"> </br> </td>
                                   </tr>
									<tr>
                                              <td width="7%"><input type="checkbox"> </td>
                                              <td width="21%">Image</td>
                                              <td width="21%">Name</td>
                                              <td width="12%">Barcode</td>
                                              <td width="12%">Stock</td>
                                              <td width="14%">Weight</td>
                                              <td width="14%">Price</td>
                                              <td width="20%">Categories</td>
                                              <td width="20%">Action</td>
                                   </tr>
                                    <tbody>
                                        <?php 
					$q = "SELECT * FROM product p, product_price pr WHERE p.unique_id = pr.product_id";
					require_once("config.php");
					$r = mysqli_query($dbc,$q);
					while($row = mysqli_fetch_array($r))
					{
					print "<tr>";
					print "<td></td>";
					print "<td><img src=image.php?id={$row['unique_id']} height=180 width=180 /></td>";
					print "<td>{$row['product_name']}</td>";
					print "<td>{$row['product_code']}</td>";
					print "<td>{$row['product_stock']}</td>";
					print "<td>{$row['product_weight']}</td>";
					print "<td>{$row['product_price']}</td>";
					print "<td>{$row['product_category']}</td>";
					print "<td>Edit</td>";
					print "</tr>";
					}

					mysqli_close($dbc);
					?>


                                    </tbody>
                                  </form>
                              </table>
                            </div>
                            <!-- /.table-responsive -->
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>