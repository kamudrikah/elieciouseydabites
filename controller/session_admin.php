<?php
session_start();
include('../controller/db_connect.php');

$user_id=$_SESSION['user_id'];

$sql="select user_id from user where user_id='$user_id'";
$ses_sql=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['user_id'];

if(!isset($login_session))
{
echo "
<script>
alert('Please Login');
window.location.href='../pages/login.php';
</script>";
}
?>
