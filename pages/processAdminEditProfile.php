<?php
require_once("../controller/db_connect.php");
session_start();


$user_id = $_POST['user_id'];
$name = $_POST['Fname'];
$email = $_POST['Cemail'];
$pwd = $_POST['pwd'];
$hp = $_POST['hp'];
$Lname = $_POST['Lname'];
$username = $_POST['username'];


	$sql = "UPDATE `user` SET first_name ='$name', email = '$email',
	password = '$pwd', phone = '$hp', username = '$username', last_name = '$Lname' WHERE user_id =$user_id";


	require_once("../controller/db_connect.php");
	mysqli_query($conn,$sql);

	    echo "<script type='text/javascript'>alert('Data Update');self.location='index.php';</script>";


mysqli_close($conn);
exit();
?>