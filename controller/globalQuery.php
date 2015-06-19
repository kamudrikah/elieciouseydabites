<?php

require_once("../controller/db_connect.php");

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

?>