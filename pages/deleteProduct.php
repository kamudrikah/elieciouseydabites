<?php
include('../controller/db_connect.php');
$price_id = $_GET['id'];
$sql = "DELETE FROM `product_price` WHERE price_id='$price_id'";
$conn_obj->query($sql);
header("Location: ./listProduct.php");
?>