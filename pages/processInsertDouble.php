<?php
require_once("../controller/db_connect.php");
session_start();

if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['image']['tmp_name'])) {

$image_upload =addslashes(file_get_contents($_FILES['image']['tmp_name']));

}}



//$id = $_FILES['picx']['name'];
$lastProduct = $_POST['lastProduct'];
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

$unique_id = uniqid();
$unik = md5($unique_id);
$unik1 = $unik;


$sql = "INSERT INTO product(product_name,product_description,product_category,product_stock,product_picture) 
VALUES ('$productName','$productDesc','$productCategory','$productStock','$image_upload')";

$price1 = "INSERT INTO product_price(product_id,product_code,product_price,product_weight) 
VALUES ('$lastProduct','$producCode1','$productPrice1','$productWeight1')";

if ($productPrice2 !="" && $productCode2 != "")
{
	$price2 = "INSERT INTO product_price(product_id,product_code,product_price,product_weight) 
VALUES ('$lastProduct','$productCode2','$productPrice2','$productWeight2')";
}



require_once("../controller/db_connect.php");
print mysqli_query($conn,$sql);
print mysqli_query($conn,$price1);
print mysqli_query($conn,$price2);

if(mysqli_affected_rows($conn) > 0)
{
    header("Location:listProduct.php");
}

mysqli_close($conn);
exit();
?>