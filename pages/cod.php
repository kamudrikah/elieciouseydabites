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

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../css/plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/sb-admin-2-2.css" rel="stylesheet">
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/metisMenu.min.js"></script>
    <script src="../js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="../js/sb-admin-2.js"></script>
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
                                    <a href="flot.html"><i class="fa fa-bar-chart-o fa-fw"></i> Product Report</a>
                                </li>
                                <li>
                                    <a href="morris.html"><i class="fa fa-bar-chart-o fa-fw"></i> Sales Report</a>
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
                    <h1 class="page-header">Cash On Delivery</h1>
              </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Place</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                             <form action="../controller/add_cod.php" method="post" name="submit">
                                        <table cellpadding="50" >
                                            
                                            <tr>
                                                 <td>Place</td>
                                                 <td> : </td>
                                                 <td>&nbsp; &nbsp;<textarea name="cod" id="cod" rowid="desc" placeholder="COD Place"></textarea></td>
                                            </tr>
                                          
                                             <tr>
                                                 <td colspan="3" align="center"> &nbsp;  &nbsp;
                                                   <button type="submit" name="submit" class="btn btn-info">Add</button></td>
                                            </tr>  
                                        </table>
                                  </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                    </div>

                    <!-- ----------------------------------------- -->
					
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List Place
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <center>
                                            <th align="center">No</th>
                                            <th align="center">Cash On Delivery Place</th>
                                        
                                            <th align="center">Action</th>
                                        </center>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>    </td>
                                            <td>    </td>
                                    
                                            <td>
                                                <input type="button" name="Delete" value="Delete">
                                            </td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>


                    <!-- ----------------------------------------- -->
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
     <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>