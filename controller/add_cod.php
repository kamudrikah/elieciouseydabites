<?php
session_start();
include('../controller/db_connect.php');


if(isset($_POST['submit'])){

$cod = $_POST['place'];
$status = $_POST['status'];

$sql = "INSERT INTO cod".    
         " (place,status)". 
	 " VALUES". 
         " ('{$cod}','{$status}')";

mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn) > 0) 
{
  	echo "
  	<script>
   	alert('Data Save!');
  	window.location.href='../pages/cod.php';
	</script>";

}

exit();

}
?>