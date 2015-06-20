<?php
include("./controller/session.php");
include("./controller/globalQuery.php");

$order_id = $_POST['order_id'];
$qty = $_POST['qty'];
if(updateQty($order_id, $qty, $conn_obj)){
	echo TRUE;
}
?>