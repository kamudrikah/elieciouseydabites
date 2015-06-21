<?php
include('../controller/db_connect.php');
$price_id = $_GET['id'];
$sql = "UPDATE `product_price` SET product_status='8' WHERE price_id='$price_id'";
$conn_obj->query($sql);
header("Location: ./listProduct.php");
?>