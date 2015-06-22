<?php
session_start();
include("../controller/globalQuery.php");

$statusOrder = $_POST['statusOrder'];
$orderNo = $_POST['orderNo'];

if(updateOrderStatus($orderNo, $statusOrder, $conn)){
	echo "<script type='text/javascript'>alert('Status Update');self.location='listOrder.php';</script>";
}
?>