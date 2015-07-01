<?php
   include('../controller/session_admin.php');
   include('../controller/javasript.php');
   include('../controller/globalQuery.php');

    $id = $_GET['id'];

    $orderDetail = "SELECT * FROM `order` o, `product_price` pc, `status` s, `user` u, `product` p,`cod` c
    WHERE o.price_id=pc.price_id AND o.order_no = $id AND o.user_id=u.user_id AND o.order_status=s.status_id AND o.cod_id=c.ID GROUP BY o.order_no";
    $personOrder = mysqli_query($conn, $orderDetail);
    $person_order = mysqli_fetch_assoc($personOrder);

    $totalPrice = "SELECT SUM(TOTAL) AS TOTAL FROM
                    (
                    SELECT PRODUCT_PRICE * ORDER_QTY AS TOTAL FROM `order`
                    JOIN product_price USING (PRICE_ID)
                    WHERE ORDER_NO = $id
                    ) AS SUBTOTAL";
    $totalPri = mysqli_query($conn, $totalPrice);
    $total_price= mysqli_fetch_assoc($totalPri);

    $delProduct = "SELECT O.ORDER_NO, O.ORDER_QTY, P.PRODUCT_NAME,PC.PRODUCT_WEIGHT,
                    PC.PRODUCT_PRICE, C.CAT_NAME,PC.PRODUCT_PRICE * O.ORDER_QTY AS TOTAL
                    FROM `order` O, `product` P, `product_price` PC ,`category` C
                    WHERE O.PRICE_ID = PC.PRICE_ID AND PC.PRODUCT_ID = P.PRODUCT_ID
                    AND C.CAT_ID = P.PRODUCT_CATEGORY AND ORDER_NO = $id";
    $detailpro = mysqli_query($conn, $delProduct);
    //$detail_product= mysqli_fetch_assoc($totalPri);
    $total_detail_product = mysqli_num_rows($detailpro);
    

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

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../css/plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/sb-admin-2-2.css" rel="stylesheet">
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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

            <?php $newOrder = newOrderNumber($conn_obj); ?>
            <ul class="nav navbar-top-links navbar-right">
                <li><a href="./listOrder.php">New Order <span class="badge"><?=$newOrder['new_order']?></span></a></li>
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
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

         <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Orders</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                
                <!-- ----------------------------------------------------- -->
                
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Orders Detail
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <form name="editOrder" action="action_editOrder.php" method="POST">
                                <table class="table table-striped table-bordered table-hover" >
                                    
                                    <tbody>
                                    <tr>
                                        <center>
                                              <td width="23%" colspan="1"><div align="right"><strong>Delivery Date :</strong></div></td>
                                          <td width="13%"><div align="center"><?php echo $person_order['order_date']; ?></div></td>
                                          <td width="34%" colspan="1"><div align="right"><strong>Order Status :</strong></div></td>
                                              <td width="18%">
                                              <input type="hidden" name="orderNo" value="<?php echo $person_order['order_no']; ?>">
                                              <div align="center">
                                              <?php
                                                echo "<select name=statusOrder  class=form-control><option>Select Status</option>"; 
                                                 
                                                 foreach ($con->query($statusOrder) as $row){
                                                    if($person_order['order_status']==$row['status_id'])
                                                    {
                                                        echo "<option value='$row[status_id]' selected>$row[status_name]</option>"; 
                                                    }else {
                                                        echo "<option value=$row[status_id]>$row[status_name]</option>"; 
                                                        
                                                    }
                                            }
                                                echo "</select>";
                                                 ?>
                                            </div></td>
                                      <td>
                                                <center>
                                                
                                                    <input type="hidden" name="cod_id" value="<?=$row['ID'];?>">
                                                    <button type="submit" class="btn btn-success"
                                                    onClick="return confirm('Are you sure?');">Update</button> 
                                                
                                           </center>
                                            </td>
                                            <td></td>
                                              
                                        </center>
                                        </tr>
                                        <tr>
                                        <center>
                                              <td colspan="5" height="30"></td>
                                        </center>
                                        </tr>

                                        <tr>
                                        <center>
                                          <td width="23%"><div align="center"><strong>Order Status</strong></div></td>
                                          <td width="13%"><div align="center"><strong>Order ID</strong></div></td>
                                          <td width="34%"><div align="center"><strong>Recipient Details</strong></div></td>
                                          <td width="18%"><div align="center"><strong>Delivery Location</strong></div></td>
                                          <td width="12%"><div align="center"><strong>Total Price</strong></div></td>
                                          <td width="12%"><div align="center"><strong>Refunded</strong></div></td>
                                        </center>
                                        </tr>
                                        <tr>
                                        <center>
                                          <td width="23%"><div align="center"><?php echo $person_order['status_name']; ?></div></td>
                                          <td width="13%"><div align="center">#<?php echo $person_order['order_no']; ?></div></td>
                                          <td width="34%"><div align="center">
                                          <?php echo $person_order['first_name']; ?><?php echo $person_order['last_name']; ?>
                                          <br><?php echo $person_order['address']; ?>
                                          <br><?php echo $person_order['phone']; ?>
                                          <br><?php echo $person_order['email']; ?>
                                          </div></td>
                                          <td width="18%"><div align="center"><?php echo $person_order['place']; ?></div></td>
                                          <td width="12%"><div align="center">RM <?php echo round($total_price['TOTAL'],4); ?></div></td>
                                          <td width="12%">
                                            <div align="center">
                                              <?php 
                                              if($person_order['status_name']=='Completed'){
                                              ?>
                                              RM 0.00
                                              <?php
                                              }elseif($person_order['status_name']=='Refunded'){
                                              ?>
                                              <span style="color:red;"><?="RM ".round($total_price['TOTAL'],4);?></span>
                                              <?php
                                              }
                                              ?>
                                              </div>
                                            </td>
                                        </center>
                                        </tr>
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    

                    <!-- ------------------------------------------------ -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Product
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <center>
                                            <th width="5%">No</th>
                                       			 <th width="20%">Item</th>
                                                 <th width="10%"> Category </th>
                                                 <th width="10%" >Weight</th>
                                                 <th width="10%" >Cost</th>
                                       			 <th width="10%"> Quantity</th>                                                 
                                                 <th width="10%"> Total </th>
                                        </center>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    
                                    if ($total_detail_product!=null) { 
                                    for ($i=0; $i< $total_detail_product; $i++) { 
                                    $detail_product = mysqli_fetch_assoc($detailpro); 
                                    // {  ?>
                                        <tr>
                                        <td><?php echo $i+1 ?> </td>
                                            <td><?php echo $detail_product['PRODUCT_NAME']; ?></td>
                                          	<td><?php echo $detail_product['CAT_NAME']; ?></td>
                                            <td><?php echo $detail_product['PRODUCT_WEIGHT']!=NULL?$detail_product['PRODUCT_WEIGHT']:'-' ?></td>
                                            <td>RM <?php echo $detail_product['PRODUCT_PRICE']; ?></td>
                                          	<td><?php echo $detail_product['ORDER_QTY']; ?></td>
                                            <td>RM <?php ECHO round($detail_product['TOTAL'], 3); ?></td>
                                            
                                      </tr>
                                      <?php } 
                                    } ?>
                                   </tbody> 
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <!-- ------------------------------------------------ -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="../js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/metisMenu.min.js"></script>
    <script src="../js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="../js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>