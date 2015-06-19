<?php
include('../controller/db_connect.php');
session_start();

$id=$_POST['cod_id'];
$query="UPDATE `cod` SET `status`='0' WHERE `ID`=$id";
$delCod=mysqli_query($conn,$query);
echo "<script type='text/javascript'>alert('Data Deleted');self.location='cod.php';</script>";
?>