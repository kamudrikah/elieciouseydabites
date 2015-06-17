<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cake = "mysql.hostinger.my";
$database_cake = "u972940147_boos";
$username_cake = "u972940147_boos";
$password_cake = "admin123";

$conn = new mysqli($hostname_cake, $username_cake, $password_cake, $database_cake);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>