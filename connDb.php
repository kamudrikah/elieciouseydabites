<?php

$dbc = mysqli_connect("mysql.hostinger.my","u972940147_boos","admin123","u972940147_boos") or die("Unable to connect to DB");

$mysql_hostname = "mysql.hostinger.my";
$mysql_user = "u972940147_boos";
$mysql_password = "admin123";
$mysql_database = "u972940147_boos";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

?>