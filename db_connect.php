<?php

// $conn = mysqli_connect("localhost","u972940147_boos","admin123","u972940147_boos");
$conn = mysqli_connect("127.0.0.1","root","","u972940147_boos");

// $host = "localhost";
// $db_name = "u972940147_boos";
// $username = "u972940147_boos";
// $password = "admin123";

$host = "127.0.0.1";
$db_name = "u972940147_boos";
$username = "root";
$password = "";

try {
	$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}catch(PDOException $exception){ //to handle connection error
	echo "Connection error: " . $exception->getMessage();
}
?>