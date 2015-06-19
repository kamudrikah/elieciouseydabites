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
            <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
            <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
            <style type="text/css">
    <!--
    .style1 {color: #FF0000}
    .style2 {
    	color: #0000FF;
    	font-weight: bold;
    }
    -->
            </style>
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
                            <h1 class="page-header">Product</h1>
                      </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add New Product</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                     <form action="processInsertDouble.php" method="POST" name="form_name" enctype="multipart/form-data">
                                               <table width="112%" border="0" bordercolor="" bgcolor="">

       	       <tr>                                   <input type="hidden" name="lastProduct" value="<?php echo $product_id+1 ?>">
                                                   		 <td width="281" height="34">* Name </td>

                          <td width="8"> <strong>:</strong> </td>
           		       <td width="847"><input type="text" name="productName" id="productName" required placeholder="NAME *"/></td>
                                                 </tr>
                                                    <tr>                                          
                                                         <td colspan="3"></br> </td>
                                                    </tr>
                                               		<tr>
                                                   		 <td>* Description </td>
                                                         <td> <strong>:</strong> </td>
    <td>
      <textarea name="productDesc" id="productDesc" cols="22" rows="5" required placeholder="Capitalize Each Word"></textarea>  &nbsp;                                                	 <font color="#0099FF"> optional </font></td>
                                                  </tr>
                                                     <tr>                                          
                                                         <td colspan="3"></br> </td>
                                                    </tr>
                                                    <tr>
                                                   		 <td>* Add Media </td>
                                                         <td> <strong>:</strong> </td>
                                                   	  <td><input type="file" name="image" required></td>
                                                    </tr>
                                                     <tr>                                          
                                                         <td colspan="3"></br> </td>
                                                    </tr>
                                                    <tr>
                	                                     <td height="36"><b>* Price 1 (RM)</b></td> 
            	                                         <td> <strong>:</strong> </td>
    <td><span id="sprytextfield2">
                                                       <input type="text" onKeyUp="numericFilter(this);" required name="productPrice1" id="productPrice1" placeholder="RM30 / RM3.50"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                         <td height="38">* Barcode</td>
                                                         <td>  <strong>:</strong> </td>
                                                   <td><span id="sprytextfield3">
                                                           <input type="text" name="producCode1" id="producCode1" required placeholder="0123456789"/>
                                                      </td> </tr>
                                                    <tr>
                                                  <tr>
                	                                     <td height="37">* Weight</td> 
            	                                         <td> <strong>:</strong> </td>
        	                                             <td><input type="text" required name="productWeight1" onKeyUp="numericFilter(this);" id="productWeight1" placeholder="1/2KG , 2KG, 1.4KG or 8 Inch"/> <font color="#0099FF"> optional </font></td>
                                                  </tr>
                                                     <tr>                                          
                                                         <td colspan="3"></br> </td>
                                                    </tr>
                                                    <tr> 
                                                         <td height="29" colspan="3"><span class="style1">*</span><span class="style2">If the item has two prices only!</span></td>
                                                   </tr>
                                                     <tr>
                	                                     <td height="32"><b>Price 2 (RM)</b></td> 
            	                                         <td> <strong>:</strong> </td>
                                                       <td><span id="sprytextfield4">
                                                       <input type="text" name="productPrice2" onKeyUp="numericFilter(this);" id="productPrice2" placeholder="RM30 / RM3.50"/>
                                                       </td>
                                                  </tr>
                                                    <tr>
                                                         <td height="39">Barcode</td>
                                                         <td>  <strong>:</strong> </td>
                                                         <td>
                                                           <input type="text" name="productCode2" onKeyUp="numericFilter(this);" id="productCode2" placeholder="0123456789"/>
                                                </td> </tr>
                                                    <tr>
                                                  <tr>
                	                                     <td height="35">Weight</td> 
            	                                         <td> <strong>:</strong> </td>
        	                                             <td><input type="text" name="productWeight2" onKeyUp="numericFilter(this);" id="productWeight2" placeholder="1/2KG , 2KG, 1.4KG or 8 Inch"/> <font color="#0099FF"> optional </font></td>
                                                  </tr>
                                                     <tr>                                          
                                                         <td colspan="3"></br> </td>
                                                    </tr>
                                                    <tr>     
                                                        <td height="37">* Category </td>
                                                        <td> <strong>:</strong> </td>
                                                        <td><select name="productCategory" id="productCategory" required>
                                                          <option value='' selected>Select a Category </option>
                                                          <option value='promotion'>Promotion</option>
                                                          <option value='cake'>Cake</option>
                                                          <option value='dessert'>Dessert</option>
                                                          <option value='cookies'>Cookies</option>
                                                          <option value='cupcake'>Cup Cake</option>
                                                        </select>
                                                        </td>
                                                  </tr>
                                                     <tr>                                          
                                                         <td colspan="3"></br> </td>
                                                    </tr>
                                                     <tr>
                                                   		 <td>Stock</td>
                                                         <td> <strong>:</strong> </td>
                                                    	 <td><input type="checkbox" name="productStock" value="Yes">Stock Available
                                                             <br/>
                                                             <input type="checkbox" name="productStock" value="No">Stock Not Available                                                     </td>
                                                    </tr>
                                                     <tr>                                          
                                                         <td colspan="3"></br> </td>
                                                    </tr>
                                                     <tr>
                                                     	 <td colspan="3" align="center"> <button type="reset" class="btn btn-info" onClick="myFunctionRegister()">Reset
                                                         </button> <button type="submit" class="btn btn-info" onClick="return confirm('All Data Complete?');">Add
                                                         </button></td>
                                                    </tr>  
                                                </table>
                                          </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        
                                    </div>
                                    <!-- /.row (nested) -->
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

            <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>

         
        </body>

        </html>