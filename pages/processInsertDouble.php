<?php
require_once("../controller/db_connect.php");
session_start();

if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['image']['tmp_name'])) {

$image_upload =addslashes(file_get_contents($_FILES['image']['tmp_name']));

}}



//$id = $_FILES['picx']['name'];
$productId = $_POST['productId'];
$priceId1 = $_POST['priceId1'];
$priceId2 = $_POST['priceId2'];
$productStock2 = $_POST['productStock2'];
$productName = $_POST['productName'];
$productDesc = $_POST['productDesc'];
$productPrice1 = $_POST['productPrice1'];
$producCode1 = $_POST['producCode1'];
$productWeight1 = $_POST['productWeight1'];
$productPrice2 = $_POST['productPrice2'];
$productCode2 = $_POST['productCode2'];
$productWeight2 = $_POST['productWeight2'];
$productCategory = $_POST['productCategory'];
$productStock = $_POST['productStock'];
$productStock2 = $_POST['productStock2'];

print_r($productCategory);


if ($productId==null){

	$sql = "INSERT INTO product(product_name,product_category,product_description,product_picture) 
	VALUES ('$productName','$productCategory','$productDesc','$image_upload')";

	$price1 = "INSERT INTO product_price(product_id,product_code,product_price,product_weight,product_status) 
	VALUES ('$lastProduct','$producCode1','$productPrice1','$productWeight1','$productStock')";

	if ($productPrice2 !="" && $productCode2 != "" && $productWeight2 != "")
	{
		$price2 = "INSERT INTO product_price(product_id,product_code,product_price,product_weight,product_status) 
	VALUES ('$lastProduct','$productCode2','$productPrice2','$productWeight2','$productStock2')";
	}



	require_once("../controller/db_connect.php");
	print mysqli_query($conn,$sql);
	print mysqli_query($conn,$price1);
	print mysqli_query($conn,$price2);

	if(mysqli_affected_rows($conn) > 0)
	{
	    echo "<script type='text/javascript'>alert('Data Save');self.location='listProduct.php';</script>";
	}

}else {



	$sql = "UPDATE product SET product_name ='$productName', product_description = '$productDesc',
	product_category = '$productCategory', product_picture = '$image_upload' WHERE product_id =$productId";

	$price1 = "UPDATE product_price SET product_id = '$productId', product_code = '$producCode1', product_price = '$productPrice1',
	product_weight = '$productWeight1', product_status = '$productStock' WHERE price_id = $priceId1";

	if ($productPrice2 !=null && $productCode2 != null && $productWeight2 != null)
	{
		$price2 = "UPDATE product_price SET product_id = '$productId', product_code = '$productCode2', product_price = '$productPrice2',
	product_weight = '$productWeight2', product_status = '$productStock2' WHERE price_id = $priceId2";
	}



	require_once("../controller/db_connect.php");
	print mysqli_query($conn,$sql);
	print mysqli_query($conn,$price1);
	print mysqli_query($conn,$price2);

	if(mysqli_affected_rows($conn) > 0)
	{
	    echo "<script type='text/javascript'>alert('Data Update');self.location='listProduct.php';</script>";
	}

}

mysqli_close($conn);
exit();
?>