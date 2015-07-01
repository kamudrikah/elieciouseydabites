<?php
require_once("../controller/db_connect.php");
session_start();

if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['image']['tmp_name'])) {

$image_upload =addslashes(file_get_contents($_FILES['image']['tmp_name']));

}}

//print_r($image_upload);

//$id = $_FILES['picx']['name'];
$image = $_FILES['image']['tmp_name'];
//print_r($image);
$lastId = $_POST['lastId'];
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


$sqlValidateProdCode = "SELECT * FROM `product_price` WHERE product_code = '$producCode1' OR product_code = '$productCode2'";
$resultValidateProdCode = mysqli_query($conn,$sqlValidateProdCode);	

$sqlValidateProdCode2 = "SELECT * FROM `product_price` WHERE product_code = '$productCode2'";
$resultValidateProdCode2 = mysqli_query($conn,$sqlValidateProdCode2);	


if ($productId==null){

	if(mysqli_num_rows($resultValidateProdCode)>0){
		header("Location: ./addProduct.php?code_exist=1");
		mysqli_close($conn);
		exit();
	}else { 
	

		$sql = "INSERT INTO product(product_name,product_category,product_description,product_picture) 
			VALUES ('$productName','$productCategory','$productDesc','$image_upload')";


		$price1 = "INSERT INTO product_price(product_id,product_code,product_price,product_weight,product_status) 
			VALUES ('$lastId','$producCode1','$productPrice1','$productWeight1','$productStock')";

		if ($productPrice2 !="" && $productCode2 != "" && $productWeight2 != "")
		{
			$price2 = "INSERT INTO product_price(product_id,product_code,product_price,product_weight,product_status) 
		VALUES ('$lastId','$productCode2','$productPrice2','$productWeight2','$productStock2')";

		mysqli_query($conn,$price2);
		}



		require_once("../controller/db_connect.php");
		mysqli_query($conn,$sql);
		mysqli_query($conn,$price1);
		

		if(mysqli_affected_rows($conn) > 0)
		{
		    echo "<script type='text/javascript'>alert('Data Save');self.location='listProduct.php';</script>";
		}
	}

}else {

	if ($priceId2==null && mysqli_num_rows($resultValidateProdCode2)>1){
		header("Location: ./editProduct.php?code_exist=1&&id=$productId");
		mysqli_close($conn);
		exit();
	}else { 

		if($image == null){

		$sql = "UPDATE product SET product_name ='$productName', product_description = '$productDesc',
	product_category = '$productCategory' WHERE product_id =$productId";
	mysqli_query($conn,$sql);

	}else {


		$sql = "UPDATE product SET product_name ='$productName', product_description = '$productDesc',
	product_category = '$productCategory', product_picture = '$image_upload' WHERE product_id =$productId";
	mysqli_query($conn,$sql);

	}

	$price1 = "UPDATE product_price SET product_id = '$productId', product_code = '$producCode1', product_price = '$productPrice1',
	product_weight = '$productWeight1', product_status = '$productStock' WHERE price_id = $priceId1";

	require_once("../controller/db_connect.php");
	
	mysqli_query($conn,$price1);

	if ($priceId2!=null && $productPrice2 !=null && $productCode2 != null && $productWeight2 != null)
	{
		$price2 = "UPDATE product_price SET product_id = '$productId', product_code = '$productCode2', product_price = '$productPrice2',
	product_weight = '$productWeight2', product_status = '$productStock2' WHERE price_id = $priceId2";
	mysqli_query($conn,$price2);

	} else if ($priceId2==null && $productPrice2 !=null && $productCode2 != null && $productWeight2!= null)
	{

	$price2 = "INSERT INTO product_price(product_id,product_code,product_price,product_weight,product_status) 
		VALUES ('$productId','$productCode2','$productPrice2','$productWeight2','$productStock2')";

		mysqli_query($conn,$price2);
	}


	    echo "<script type='text/javascript'>alert('Data Update');self.location='listProduct.php';</script>";

		
	}

}

mysqli_close($conn);
exit();
?>