<?php
session_start();

if(!isset($_COOKIE['rand_id']))
{

$_COOKIE['rand_id'] = uniqid();
//echo $_COOKIE['rand_id'];

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Elie`cious Eyda Bites</title>
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
							<a href="about_us.php"><img src="images/home/banner.jpg" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
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
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="about_us.php">About Us</a></li>
								<li class="dropdown"><a href="#">Order<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Promotion</a></li>
										<li><a href="product-details.html">Cake</a></li> 
										<li><a href="checkout.php">Dessert</a></li> 
										<li><a href="cart.php">Cookies</a></li> 
										<li><a href="login.html">Cup Cakes</a></li> 
                                    </ul>
                                </li> 
								<li><a href="contact-us.html">Contact Us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
				  <div class="login-form"><!--login form-->
						<h2>List of Barcode</h2>
<table border="1" align="center" width="189">
                        	<th colspan="6">
                            	<center> CAKE </center>
                            </th>
                        	<tr>
                            	<!--cake 1.1-->
                            	<td width="189" rowspan="2">FAMOUS RICH MOIST CHOC</td>
                                <td width="189" height="85">1/2kg RM40 </td>                                
                                <td width="283">
                                	<a href="http://www.barcodesinc.com/generator/"></a> <a href="http://www.barcodesinc.com/generator/">
                                    <img src="http://www.barcodesinc.com/generator/image.php?code=9556891002360&style=197&type=C128B&width=219&height=50&xres=1&font=3" 
                                    alt="the barcode printer: free barcode generator" border="0"></a></td>
                                <!--cake 6.1-->    
                                <td width="189" rowspan="2">HEAVENLY BLUEBERRY CHEESE</td>
                                <td width="189" height="85">1.4kg RM75 </td>                                
                                <td width="283">
                                	<a href="http://www.barcodesinc.com/generator/">
                                    <img src="http://www.barcodesinc.com/generator/image.php?code=9556891002370&style=197&type=C128B&width=219&height=50&xres=1&font=3" 
                                    alt="the barcode printer: free barcode generator" border="0"></a></td>                                
           				  </tr>
                          
              			   <tr>
                           		<!--cake 1.2-->
                            	<td width="189" height="79">1kg RM60</td>
                                <td width="283"><a href="http://www.barcodesinc.com/generator/">
                                <img src="http://www.barcodesinc.com/generator/image.php?code=9556891002361&style=197&type=C128B&width=219&height=50&xres=1&font=3" 
                                alt="the barcode printer: free barcode generator" border="0"></a> </td>
                                <!--cake 6.2 : NONE-->
                                <td width="283"> </td> 
                                <td width="283"> </td>                               
                          </tr>
                          
                          <tr>	<!--cake 2.1-->
                            	<td width="189" rowspan="2">MELTY CHOC MADNESS</td>
                                <td width="189" height="84">1/2kg RM50 </td>                                
                                <td width="283">
                                	<a href="http://www.barcodesinc.com/generator/">
                                    <img src="http://www.barcodesinc.com/generator/image.php?code=9556891002362&style=197&type=C128B&width=219&height=50&xres=1&font=3" 
                                    alt="the barcode printer: free barcode generator" border="0"></a> </td>
                                <!--cake 8.1-->    
                                <td width="189" rowspan="2">SALTED CARAMEL CHOC</td>
                                <td width="189" height="85">1/2kg RM55 </td>                                
                                <td width="283">
                                	<a href="http://www.barcodesinc.com/generator/">
                                    <img src="http://www.barcodesinc.com/generator/image.php?code=9556891002372&style=197&type=C128B&width=219&height=50&xres=1&font=3" 
                                    alt="the barcode printer: free barcode generator" border="0"></a></td>
                          </tr>
                          
		                  <tr><!--cake 2.2-->
                   	      <td width="189" height="90">1.4kg RM80                      </td>
                                <td width="283"><a href="http://www.barcodesinc.com/generator/">
                                <img src="http://www.barcodesinc.com/generator/image.php?code=9556891002364&style=197&type=C128B&width=219&height=50&xres=1&font=3" 
                                alt="the barcode printer: free barcode generator" border="0"></a> </td> 
                          <!--cake 8.2-->    
                                <td width="189" height="85">1.4kg RM85 </td>                                
                                <td width="283">
                                	<a href="http://www.barcodesinc.com/generator/">
                                    <img src="http://www.barcodesinc.com/generator/image.php?code=9556891002373&style=197&type=C128B&width=219&height=50&xres=1&font=3" 
                                    alt="the barcode printer: free barcode generator" border="0"></a></td>                               
           				 </tr>
                         
                        
                        
                        </table>
				  </div><!--/login form-->
				</div>
				
				<div class="col-sm-4">
					
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
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
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/feedback1.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/feedback2.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/feedback3.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/feedback4.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						
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
								<li><a href="login.html" class="active"><i class="fa fa-lock"></i>Admin Login</a></li>
								<li><a href="">Contact Us</a></li>
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
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>