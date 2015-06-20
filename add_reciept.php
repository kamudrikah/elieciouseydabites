<?php
include("./controller/session.php");
include("./controller/globalQuery.php");

if(count($_FILES) > 0) {
	if(is_uploaded_file($_FILES['image']['tmp_name'])) {
		$img = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	}
}

$order_id = $_POST['idOrder'];
if(updateReciept($order_id, $img, $conn_obj)){
	header("Location: ./receipt.php?uploaded=1");
}
?>