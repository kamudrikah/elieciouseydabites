
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Receipt | Elie`cious Eyda Bites</title>
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
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="cart.php?res=getcart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
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
							<?php
								include('controller/session_option.php');
							?>
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

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Upload Receipt Payment</h3>
			</div>
			<div class="row">
				<div class="col-sm-6">
				 <form action="#" method="post" enctype="multipart/form-data">
                                        <table >
                                        	<tr>
                                           		 <td width="107">First Name :</td>
                                                	 <td width="20"> : </td>
                                          		 <td width="197">&nbsp; &nbsp;
                                   		      <input type="text" name="fName" id="fName" /></td>
                                            </tr>
					    <tr>                                          
                                                 <td colspan="3"></br> </td>
                                            </tr>
					    <tr>
                                           		 <td width="107">Last Name :</td>
                                                	 <td width="20"> : </td>
                                          		 <td width="197">&nbsp; &nbsp;
                                   		      <input type="text" name="LName" id="LName" /></td>
                                            </tr>
                                            <tr>                                          
                                                 <td colspan="3"></br> </td>
                                            </tr>
                                       		<tr>
        	                                     <td>Order ID</td> 
    	                                         <td> : </td>
	                                             <td>&nbsp; &nbsp; <input type="text" name="idOrder" id="idOrder" /> </td>
                                            </tr>
                                             <tr>                                          
                                                 <td colspan="3"></br> </td>
                                            </tr>
                                            <tr>
                                           		 <td>Receipt Payment</td>
                                                 <td> : </td>
                                            	 <td>&nbsp; &nbsp;&nbsp; &nbsp; <input type="file" name="image"></td>
                                            </tr>
                                             <tr>                                          
                                                 <td colspan="3"></br> </td>
                                            </tr>
                                            <tr>
                                                 <td colspan="3" align="center">
                                                 <a class="btn btn-default check_out">Save</a>
                                                 </td>
                                            </tr>  
                                        </table>
                                    </form>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
    
    <footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>E</span>lie`cious Eyda Bites</h2>
							<p>Marilah mencuba produk kami, pasti nak lagi.</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">                            	
								<li><a href="pages/login.php" class="active"><i class="fa fa-lock"></i>Admin Login</a></li>
								
								<li><a href="">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						
					</div>
					<div class="col-sm-2">
						
					</div>
					<div class="col-sm-2">
						
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						
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