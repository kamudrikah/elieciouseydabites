<?php
   include('../controller/session_admin.php');
   include('../controller/javasript.php');
   include('../controller/globalQuery.php');
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
                    <h1 class="page-header">Local Delivery Place</h1>
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
                                        <table width="100%" align="center" cellpadding="50" >
                                            
<tr>
                                                 <td width="4" height="64"><strong>Place</strong></td>
                      <td width="4"><strong> :</strong> </td>
                      <td width="139"><input type="text" name="place" class="form-control" size="35">
                      <input type="hidden" name="status" value="1"</td>
               
                                          </tr>
                                          <tr>
                                          <td width="4" >
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
                                        <th width="6%" align="center">No</th>
                                        <th width="69%" align="center">Local Delivery Place</th>
                                        <th width="27%" align="center">Action</th>
                                        </center>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    
                                    if ($total_cod_row!=null) { 
                                    for ($i=0; $i< $total_cod_row; $i++) { 
                                    $row = mysqli_fetch_assoc($cod); 
                                    // {  ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i+1 ?></td>
                                            <td><?php echo $row['place'];?>
                                            </td>
                                            <td>
                                            <center>
                                                <form name="deleteCod" action="delete_cod.php" method="POST">
                                                    <input type="hidden" name="cod_id" value="<?=$row['ID'];?>">
                                                    <button type="submit" class="btn btn-success"
                                                    onClick="return confirm('Are you sure?');">Delete</button> 
                                                </form>
                                           </center>
                                            </td>
                                        </tr>
                                    <?php } 
                                    } ?>
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