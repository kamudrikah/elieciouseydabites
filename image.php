<?php
//include database connection
include './controller/db_connect.php';

//select the image
//$image_id = $_GET['id'];

$query = "SELECT * FROM product WHERE product_id= ?";
$stmt = $con->prepare( $query );
//bind the id of the image you want to select
$stmt->bindParam(1, $_GET['id']);
$stmt->execute();
//to verify if a record is found
$num = $stmt->rowCount();
if( $num ){
    //if found
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //specify header with content type,
    //you can do header(“Content-type: image/jpg”); for jpg,
    //header(“Content-type: image/gif”); for gif, etc.
    header("Content-type: image/png");
    
    //display the image data
    print $row['product_picture'];
    exit;
	
}


else{

echo "No Images Found";
    //if no image found with the given id,
    //load/query your default image here
}
?>