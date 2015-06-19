<?php
include('./controller/javasript.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login or Register | Elie`cious Eyda Bites</title>
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

    <script type="text/javascript">

    function numericFilter(txb) {
      txb.value = txb.value.replace(/[^\0-9]/ig, "");
    }
    
    </script>
    
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
					<div class="col-sm-6">					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/banner.jpg" alt="" /></a>						</div>
						<div class="btn-group pull-right">						</div>
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
				
				</div>
			<div class="row">
				<div class="col-sm-6">
				  <div class="chose_area"> 
                      
                      
                      </br>
                      
                        <table>
                       <form action="loginForm.php" method="POST" name="submit" >  
                      
                       <tr>	
                   	    	<td colspan="3"><h3>Login</h3></td>
                       </tr>
                       <tr>
                      		<td width="146">
							  <label>Email</label>
                            </td>
                            <td width="9"> <strong>:</strong> </td>
<td width="507">
                                	<input type="text"  class="form-control" name="email" id="email" value=""/>
                         </td>
                      </tr> 
                      <tr>
                      		<td>
								<label>Password</label>
                            </td>
                            <td width="9"> <strong>:</strong> </td>
<td>
                                	<input type="password" class="form-control" name="password" id="password" value=""/>
                            </td>
                      </tr>
                      <tr>
                      	<td colspan="3" align="right">
                      	
                      	<input type="submit" name="submit" >
                        <input type="reset" name="submit" value="Reset" >
                      	</td>
                      </tr>
                      </form>
                      </table>
                      
                      </br>
                      
                      <table>
                       <form action="controller/add_customer.php" method="POST" name="insert">                         
                      <tr>
                           <td colspan="3"><h3>Register</h3></td>
                      </tr>
                      <tr>
                      		<td width="146">
							  <label>*First Name</label>
                            </td>
                        <td width="11"> <strong>:</strong> </td>
                            <td width="506">
                           	  <input type="text" class="form-control" name="Fname" id="Fname" required/>
                        </td>
                      </tr>
                      <tr>
                      		<td>
							  <label>Last Name</label>
                            </td>
                            <td width="11"> <strong>:</strong> </td>
                            <td width="506">
                           	  <input type="text" class="form-control" name="Lname" id="Lname" />
                        </td>
                      </tr> 
                      <tr>
                      		<td>
							  <label>Address</label>
                            </td>
                            <td width="11"> <strong>:</strong> </td>
                            <td width="506">
                   	    <textarea name="address" id="address" class="form-control" cols="45" rows="5"></textarea>                        </td>
                      </tr> 
                       <tr>
                          <td>
                <label>*Username </label>
                            </td>
                            <td width="11"> <strong>:</strong> </td>
                            <td width="506">
                              <input type="text" id="username" class="form-control" name="username" required/>                      
                             </td>
                      </tr> 
                      <tr>
                      <tr>
                      		<td>
							  <label>*Password </label>
                            </td>
                            <td width="11"> <strong>:</strong> </td>
                            <td width="506">
                           	  <input type="password" id="password" class="form-control" name="password" required/>                      
                             </td>
                      </tr> 
                      <tr>
                      		<td>
							  <label> *Email </label>
                            </td>
                            <td width="11"> <strong>:</strong> </td>
                            <td width="506">
                           	  <input type="text" name="Cemail" class="form-control" id="Cemail" onChange="checkEmail(this);" required />
                        </td>
                      </tr> 
                      <tr>
                      		<td>
							  <label> Handphone</label>
                            </td>
                            <td width="11"> <strong>:</strong> </td>
                            <td width="506">
                           	  <input type="text" name="hp" id="hp" class="form-control" onChange="numericFilter(this);" required placeholder="01X - XXXXXXX"/>
                        </td>
                      </tr>
                      <tr>
                      	<td colspan="3" align="right">
                       <!--  <button type="submit" class="btn btn-default check_out" onClick="return confirm('Are You Sure?');"> Sign Up</button> -->
                        <input type="submit" name="submit" >
                        <input type="reset" name="submit" value="Reset" >

                     <!--    <a href="cust_login.php"><button type="submit" class="btn btn-default check_out" > Login</button> </a> -->
                      	 </td>
                      </tr>  
                      </form>
                      </table> 

                       
                     
				  </div>
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
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>