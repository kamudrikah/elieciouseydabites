<?php
$host = "localhost";
$db_name = "u972940147_boos";
$username = "root";
$password = "";

$conn = mysqli_connect($host,$username,$password,$db_name);
$conn_obj = new mysqli($host,$username,$password,$db_name);

// conn_obj
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// conn
try {
	$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}catch(PDOException $exception){
	echo "Connection error: " . $exception->getMessage();
}
?>