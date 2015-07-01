<?php
include('./controller/session.php');
include('./controller/globalQuery.php');
if(!isset($_SESSION['user_id'])){
  header("Location: ./cust_signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | Elie`cious Eyda Bites</title>
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
          <div class="col-sm-12">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                <li><a href=""><i class="fa fa-phone"></i> +6012-4389731 / +6014-9039376</a></li>
                <li><a href=""><i class="fa fa-envelope"></i> elieciousart@yahoo.com</a></li>
                <li><a href=""><i class="fa fa-facebook"></i> FB & Instagram : ElieciOusBites</a></li>
              </ul>
            </div>
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
                <li><a href="cart.php?res=getcart"><i class="fa fa-shopping-cart"></i> Cart <span> <?php if(isset($countResult)){echo ": ".$countResult." items";} ?></span></a></li>
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
              <!--<input type="text" placeholder="Search"/>-->
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
  </header><!--/header-->
  
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="left-sidebar">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                          <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a href="promotion.php">Promotion</a>
                  </h4>
                </div>
                            </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a href="cake.php">Cake</a>
                  </h4>
                </div>
                            </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a href="dessert.php">Dessert</a>
                  </h4>
                </div>
                
              </div>
              
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a href="cookies.php">Cookies</a>
                  </h4>
                </div>
                
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                                      <a href="cup_cake.php">Cup Cake</a>
                                    </h4>
                </div>
              </div>
              
            </div><!--/category-productsr-->
          
            
            
            
            
            <div class="shipping text-center"><!--shipping-->
              
            </div><!--/shipping-->
            
          </div>
        </div>
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Dessert</h2>
            <?php
            
$num_rec_per_page=6;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 


$query1= "SELECT * FROM product p JOIN product_price USING (product_id) WHERE product_category = '3' AND product_status='8' LIMIT $start_from , $num_rec_per_page";
$rs_result = mysqli_query($conn, $query1);  


    // output data of each row
  $z = 0;
  $i = 1;
while ($row = mysqli_fetch_assoc($rs_result)) { 
  ?>          <FORM ACTION="add_cart.php" method="post">
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                              <div class="single-products">
                  <div class="productinfo text-center">

                    <?php $product_id = $row["product_id"];   ?>
                    
                    <input type="hidden" name="price_id[]" value="<?php echo $row['price_id']; ?>">
                    <input type="hidden" name="location" value="dessert.php">
                    
                    
                    <img src="image.php?id=<?php echo $row["product_id"]; ?>" height="220" width="30" />
                    
                    <h2><?php echo $row["product_name"];   ?></h2> <br/>
                    <p><?=$row['product_weight'];?> RM <?=$row['product_price'];?></p>
                    <input type="submit" value="Add to cart"  class="btn btn-default add-to-cart" />
                    </FORM>
                    
                  </div>
                </div>
                                                
              </div>
            </div>
            
  
  
  
  <?php
  
    $z = $z +1;
    }


  
    


$query3= "SELECT * FROM product WHERE product_category = '3' ";
$result = mysqli_query($conn, $query3);
$total_records = mysqli_num_rows($result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

 

      
?>                              
<br>
            
            
<ul class="pagination">
  <li><?php echo "<a href='dessert.php?page=1'>".'|<'."</a> "; // Goto 1st page    ?></li>
              
    <?php  for ($i=1; $i<=$total_pages; $i++) 
    { 
      //echo " i=" .$i ." page=" .$page;
      if($page == $i) 
      { ?>
      
      <li class="active"> <?php echo "<a href='dessert.php?page=".$i."'>".$i."</a> "; ?> </li>
      
      <?php
      } 
      if($page != $i) 
      { ?>
      <li> <?php  echo "<a href='dessert.php?page=".$i."'>".$i."</a> "; ?> </li>

      <?php
      }  
    } 
?>

<li> <?php echo "<a href='dessert.php?page=$total_pages'>".'>|'."</a> "; // Goto last page  ?>   </li>



            </ul>
          </div><!--features_items-->
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
  <script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>