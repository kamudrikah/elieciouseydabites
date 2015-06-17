<?php
$host = "mysql.hostinger.my";
$db_name = "u972940147_boos";
$username = "u972940147_boos";
$password = "admin123";

try {
	$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}catch(PDOException $exception){ //to handle connection error
	echo "Connection error: " . $exception->getMessage();
}
?>