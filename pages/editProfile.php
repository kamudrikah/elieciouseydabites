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
	`			<li>
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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                                   
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> Personal Detail
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <?php
                                $q="SELECT * FROM admin WHERE adm_id='{$user_check}' ";
                                require_once("config.php");
                                $result = mysqli_query($dbc,$q);
                                if(mysqli_num_rows($result) > 0)
                                {

                                    $record = mysqli_fetch_array($result);
                                    $user_username = $record['adm_name'];

                                }


                                ?> 
                                    
                                    <div class="timeline-panel">
                                        <div class="panel-heading">
                                            <h4 class="timeline-title">Hye, <?php echo $user_username; ?></h4>
                                            
                                        </div>
                                        <div class="panel-body">
                                              <div class="list-group">

                              				   <form action="processAdminEditProfile.php" method="post">
                                               <table width="463">
                                                <tr> 
                                                     <td width="199">Name  </td>
                                                     <td width="252">
                                                     <input name="name" type="text" id="name" size="35" border="1" value="<?php echo $record['adm_name']; ?>"/>
                                                     </td>
                                                </tr>
                                                <tr>    
                                                      <td>Password</td>
                                                      <td>
                                                      <input type="text" name="pwd" id="pwd" size="35" border="1" value="<?php echo $record['adm_pwd']; ?>"/> 
                                                      </td>
                                                </tr>
                                                <tr>    
                                                      <td>Repeat Password</td>
                                                      <td>
                                                      <input type="text" name="pwd2"  id="pwd2" size="35" border="1" value="<?php echo $record['adm_pwd']; ?>"/> 
                                                      </td>
                                                </tr>
                                                
                                              
                                                <tr>    
                                                      <td>Number HP</td>
                                                      <td>
                                                      <input type="text" id="name" name="hp"  size="35" border="1" value="<?php echo $record['adm_hp']; ?>"/> 
                                                      </td> 
                                                </tr>
                                                <tr>    
                                                      <td>Email</td>
                                                      <td>
                                                      <input type="text" name="email"  id="email" size="35" border="1" value="<?php echo $record['adm_email']; ?>"/> 
                                                      </td>
                                                </tr>
                                                
                                               
                                                </table>
                                            </br>    
                                                   <center>
                                                    <input type="submit" id="btnSubmit" value="Update"/>
                                                      <label> <input type="reset" id="reset" value="Reset" /></label>
                                                   </center>
                                             </form>
                               
                            </div>
                        
                                        
                                          </div>
                                    </div>
                          
                                     
                      
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                                            
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
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

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>