<?php
include('controller/db_connect.php');
$user_check=$_SESSION['cust_id'];

$sql="select user_id from user where user_id='$user_check'";
$ses_sql=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['cust_id'];
if(!isset($login_session))
							{
								include('./subMenu_check.php');
							}else
							{
								include('./subMenu.php');
							}


?>
