<?php
session_start();

if(isset($_POST['submit'])){

$fname = $_POST['Fname'];
$lname = $_POST['Lname'];
$cemail = $_POST['Cemail'];
$hp = $_POST['hp'];
$password = $_POST['password'];


$login = "INSERT INTO login".    
         " (username,password,role_id)". 
	 " VALUES". 
         " ('{$cemail}','{$password}','2')";

$sql = "INSERT INTO customer".    
         " (cust_firstname,cust_lastname,cust_pwd,cust_email,cust_phone,role_id)". 
	 " VALUES". 
         " ('{$fname}','{$lname}','{$password}','{$cemail}','{$hp}','2')";

require_once('db_connect.php');



mysqli_query($conn,$sql);
mysqli_query($conn,$login);

if(mysqli_affected_rows($conn) > 0) 
{
  header("Location:/popup/popup_register_success.php");
}

mysqli_close();
exit();

}
?>