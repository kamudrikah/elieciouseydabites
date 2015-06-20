<?php
include("./controller/db_connect.php");
$id=$_GET['id'];
$sql="UPDATE `order` SET order_status='7' WHERE order_id='$id'";
if($conn_obj->query($sql)){
	header("Location: ./cart.php");
}
else{
	echo "Delete failed.";
}
?>