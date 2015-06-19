<?php
require_once('./db_connect.php');

if(isset($_POST['submit'])){

$fname = $_POST['Fname'];
$lname = $_POST['Lname'];
$username = $_POST['username'];
$cemail = $_POST['Cemail'];
$address = $_POST['address'];
$hp = $_POST['hp'];
$password = $_POST['password'];


$sql = "INSERT INTO user".    
         " (username,password,first_name,last_name,email,phone,role,address)". 
	 " VALUES". 
         " ('{$username}','{$password}','{$fname}','{$lname}','{$cemail}','{$hp}','user','{$address}')";

mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn) > 0) 
{
  echo "<script>
           alert('Data Saved!');
           window.location.href='../index.php';
        </script>";
}

exit();

}
?>