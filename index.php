<?php
include "./controller/session.php";
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Elie`cious Eyda Bites</title>
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
							<?php
							if(isset($_SESSION['user_id'])){
								include('./subMenu.php');
							}else{
								include('./subMenu_check.php');
							}
						?>
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
		
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<?php
						$query1= "SELECT * FROM product";
						$rs_result1 = mysqli_query($conn, $query1); 		
						$z=0;
					?>
					
						<ol class="carousel-indicators">
						<?php while ($row = mysqli_fetch_assoc($rs_result1))  {  ?>
						
							<li data-target="#slider-carousel" data-slide-to="<?php echo $z; ?>" class="active"></li> 
							<?php $z = $z+1; 
							
							}?>
						</ol>
						
						
						
						
						
					<div class="carousel-inner">
                        
						<?php   
						$query2= "SELECT * FROM product";
						//run the query
						$rs_result = mysqli_query($conn, $query2);		
						$i=0;
						?>
						
						<div class="carousel-inner">  
						
						<?php
						// output data of each row
						while ($row = mysqli_fetch_assoc($rs_result))
						{ 
						$i = $i+1;
						
						if ($i == 1 )
						{
						
						?>
						
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>lie`cious Eyda Bites</h1>
									<p><?php echo $row["product_name"]; ?></p>

                                    <?php if($row["product_category"] == 'Cake' ) 
									
									{ ?>
                                    
									<button type="button" class="btn btn-default get"><a href="cake.php">Get it now</a></button>
									<?php 
									} 
									
									
									if($row["product_category"] == 'Dessert' ) 
									
									{ ?> 
                                    <button type="button" class="btn btn-default get"><a href="dessert.php">Get it now</a></button>
									<?php 
									} 
									
									
									if($row["product_category"] == 'Cookies' ) 
									
									{ ?> 
                                    <button type="button" class="btn btn-default get"><a href="cookies.php">Get it now</a></button>
									<?php 
									} 
									
									
									if($row["product_category"] == 'Cup Cake' ) 
									
									{ ?> 
                                    <button type="button" class="btn btn-default get"><a href="cup_cake.php">Get it now</a></button>
									<?php 
									} 


									if($row["product_category"] == 'Promotion' ) 
									
									{ ?> 
                                    <button type="button" class="btn btn-default get"><a href="promotion.php">Get it now</a></button>
									<?php 
									} 

									?>
									
								</div>
								<div class="col-sm-6">
								<img src="image.php?id=<?php echo $row["product_id"]; ?>" class="girl img-responsive" alt="" height="1000" width="300" />
								

								</div>
							</div>
							<?php
							
						}
						
						else
						{
						
						?>
						
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>lie`cious Eyda Bites</h1>
									<p><?php echo $row["product_name"]; ?></p>

                                    <?php if($row["product_category"] == 'Cake' ) 
									
									{ ?>
                                    
									<button type="button" class="btn btn-default get"><a href="cake.php">Get it now</a></button>
									<?php 
									} 
									
									
									if($row["product_category"] == 'Dessert' ) 
									
									{ ?> 
                                    <button type="button" class="btn btn-default get"><a href="dessert.php">Get it now</a></button>
									<?php 
									} 
									
									
									if($row["product_category"] == 'Cookies' ) 
									
									{ ?> 
                                    <button type="button" class="btn btn-default get"><a href="cookies.php">Get it now</a></button>
									<?php 
									} 
									
									
									if($row["product_category"] == 'Cup Cake' ) 
									
									{ ?> 
                                    <button type="button" class="btn btn-default get"><a href="cup_cake.php">Get it now</a></button>
									<?php 
									} 

									if($row["product_category"] == 'Promotion' ) 
									
									{ ?> 
                                    <button type="button" class="btn btn-default get"><a href="promotion.php">Get it now</a></button>
									<?php 
									} 
									
									?>
									
								</div>
								<div class="col-sm-6">
								<img src="image.php?id=<?php echo $row["product_id"]; ?>" class="girl img-responsive" alt="" height="1000" width="300" />
								

								</div>
							</div>
							<?php
							
						}
							
	
   						}
						?>		
							 
							
						</div>
						</br></br></br></br></br>
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
					
						<div class="brands_products"><!--brands_products-->
							
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							
						</div><!--/price-range-->
						
						
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"> </h2>
						<div class="col-sm-4">
								
										Kepakaran kami adalah menjual pelbagai jenis kek dan dessert sesuai <BR/>
                                        dengan citarasa anda penggemar kek …kami menjanjikan kepuasan pada  </BR>
                                        setiap pelanggan yang menempah kek kami…							
						
						</div>
						
						
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							
						</div>
						<div class="tab-content">
							
						</div>
					</div><!--/category-tab-->
							
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>E</span>lie`cious Eyda Bites</h2>
							<p>Marilah mencuba produk kami, pasti nak lagi.</p>
							<ul class="nav nav-pills nav-stacked">                            	
								<li><a href="pages/login.php" class="active"><i class="fa fa-lock"></i> Admin Login</a></li>
							</ul>
						</div>
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
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>