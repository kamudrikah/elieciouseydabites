<?php

session_start();

if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['image']['tmp_name'])) {

$imgData =addslashes(file_get_contents($_FILES['image']['tmp_name']));
$imageProperties = getimageSize($_FILES['image']['tmp_name']);



}}


//$id = $_FILES['picx']['name'];
$name = $_POST['product_name'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$barcode = $_POST['barcode'];
$category = $_POST['cat'];
$weight = $_POST['weight'];
$stock = $_POST['stock'];

$price = "RM" .$price;

if($weight=="")
{
    $weight_new = "Not Available";
}
else
{
    $weight_new = $weight ;
}


$unique_id = uniqid();
$unik = md5($unique_id);
$unik1 = $unik;


$sql = "INSERT INTO product(unique_id,product_name,product_description,product_category,product_stock,product_picture) VALUES ('$unik1 ','$name','$desc','$category','$stock','$imgData')";

$sql1 = "INSERT INTO product_price(product_id,product_code,product_price,product_weight) VALUES ('$unik1','$barcode','$price','$weight_new')";




require_once("config.php");
print mysqli_query($dbc,$sql);
print mysqli_query($dbc,$sql1);

if(mysqli_affected_rows($dbc) > 0)
{
    header("Location:listProduct.php");
}

mysqli_close($dbc);
exit();
?>