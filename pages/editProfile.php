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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">

    function numericFilter(txb) {
      txb.value = txb.value.replace(/[^\0-9]/ig, "");
    }

    function resetForm ()
    {
      username.value = "";
      Lname.value = "";
      Fname.value = "";
      hp.value = "";
      pwd.value = "";
      Cemail.value = "";
    }
    </script>

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
                                $admin="SELECT * FROM user WHERE user_id='{$user_id}' ";
                                $result = mysqli_query($conn,$admin);
                                if(mysqli_num_rows($result) > 0)
                                {

                                    $record = mysqli_fetch_array($result);
                                    $first_name = $record['first_name'];

                                }


                                ?> 
                                    
                                    <div class="timeline-panel">
                                        <div class="panel-heading">
                                            <h4 class="timeline-title">Hye, <?php echo $first_name; ?></h4>
                                            
                                        </div>
                                        <div class="panel-body">
                                              <div class="list-group">

                              				   <form action="processAdminEditProfile.php" method="post" name="adminEdit" >
                                               <table class="table table-striped table-bordered table-hover" width="100%" >
                                                <tr> 
                                                     <td width="199">* First Name  </td>
                                                     <td width="252">
                                                     <input type="hidden" name="user_id" value="<?=$record['user_id']; ?>">
                                                     <input name="Fname" type="text" class="form-control" required id="Fname" size="35" border="1" value="<?php echo $record['first_name']; ?>"/>
                                                     </td>
                                                </tr>
                                                <tr> 
                                                     <td width="199">* Last Name  </td>
                                                     <td width="252">
                                                     <input name="Lname" type="text" class="form-control" required id="Lname" size="35" border="1" value="<?php echo $record['last_name']; ?>"/>
                                                     </td>
                                                </tr>
                                                <tr> 
                                                     <td width="199">* Username  </td>
                                                     <td width="252">
                                                     <input name="username" type="text" class="form-control" required id="username" size="35" border="1" value="<?php echo $record['username']; ?>"/>
                                                     </td>
                                                </tr>
                                                <tr>    
                                                      <td>* Password</td>
                                                      <td>
                                                      <input type="password" name="pwd" id="pwd" required class="form-control"  size="35" border="1" value="<?php echo $record['password']; ?>"/> 
                                                      </td>
                                                </tr>
                                                <tr>    
                                                      <td>* Number HP</td>
                                                      <td>
                                                      <input type="text" id="hp" name="hp" required onChange="numericFilter(this);" class="form-control"  size="35" border="1" value="<?php echo $record['phone']; ?>"/> 
                                                      </td> 
                                                </tr>
                                                <tr>    
                                                      <td>* Email</td>
                                                      <td>
                                                      <input type="text" name="Cemail" required class="form-control" onChange="checkEmail(this);"  id="Cemail" size="35" border="1" value="<?php echo $record['email']; ?>"/> 
                                                      </td>
                                                </tr>
                                                
                                               
                                                </table>
                                            </br>    
                                                   <center>
                                                    <button type="submit" class="btn btn-success"
                                                    onClick="return confirm('Are you sure?');">Update</button>
                                                      <label> <button type="button" onclick="resetForm()" class="btn btn-info">Reset</button></label>
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