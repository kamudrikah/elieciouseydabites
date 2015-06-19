<?php

$conn = mysqli_connect("localhost","root","","u972940147_boos");

$host = "localhost";
$db_name = "u972940147_boos";
$username = "root";
$password = "";

try {
	$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}catch(PDOException $exception){ //to handle connection error
	echo "Connection error: " . $exception->getMessage();
}

$dbLink = new mysqli("localhost", "root", "", "u972940147_boos");
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
?>