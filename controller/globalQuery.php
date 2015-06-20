<?php

require_once("../controller/db_connect.php");

/*---------------- PRODUCT PART --------------------*/

// Get last Product ID
$sqlSelect = "SELECT product_id from product ORDER BY product_id DESC LIMIT 1";
$result = mysqli_query($conn, $sqlSelect);
$lastID=mysqli_fetch_array($result,MYSQLI_ASSOC);
$product_id=$lastID['product_id'];

// Get List Of Product
$listProduct = "SELECT * FROM product p, product_price pc where p.product_id=pc.product_id";
$product = mysqli_query($conn, $listProduct);
$row_product = mysqli_fetch_assoc($product);
$total_product_row = mysqli_num_rows($product);

// List All Detail Product
$detailProduct = "SELECT * from product join product_price using (product_id) where price_id=$id";
$detail = mysqli_query($conn, $detailProduct);
$prod = mysqli_fetch_assoc($detail);

/*---------------- COD PART --------------------*/

// List All COD Place
$listCod = "SELECT * from cod where status='1'";
$cod = mysqli_query($conn, $listCod);
$total_cod_row = mysqli_num_rows($cod);



?>