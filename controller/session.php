<?php
include('controller/db_connect.php');
session_start();

$user_check=$_SESSION['user_id'];

$sql="select user_id from user where user_id='$user_check'";
$ses_sql=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['user_id'];

if(!isset($login_session))
{
 ?>
    <script language="javascript">
   alert('Please Login');
   //window.navigate('<a href="../utama(pelajar).php">Untitled Document</a>');
   window.location.href="./cust_signin.php";
</script>

    <?php
}

?>
