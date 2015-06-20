<?php

require_once("../controller/db_connect.php");


/*---------------- PRODUCT PART --------------------*/

// Get last Product ID
$sqlSelect = "SELECT product_id from product ORDER BY product_id DESC LIMIT 1";
$result = mysqli_query($conn, $sqlSelect);
$lastID=mysqli_fetch_array($result,MYSQLI_ASSOC);
$product_id=$lastID['product_id'];

// Get List Of Product
$listProduct = "SELECT * from product p, product_price pc, status s, category c 
            where p.product_id = pc.product_id  AND p.product_category = c.cat_id AND pc.product_status = s.status_id ORDER BY pc.price_id ASC";
$product = mysqli_query($conn, $listProduct);
$row_product = mysqli_fetch_assoc($product);
$total_product_row = mysqli_num_rows($product);


/*---------------- COD PART --------------------*/

// List All COD Place
$listCod = "SELECT * from cod where status='1'";
$cod = mysqli_query($conn, $listCod);
$total_cod_row = mysqli_num_rows($cod);

/*---------------- CATEGORY PART --------------------*/

$categoryList="SELECT * FROM category "; 

?>