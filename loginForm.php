<?php
session_start();
include('controller/db_connect.php');


$logName = $_POST['email'];
$pass = $_POST['password'];

if(empty($logName) || empty($pass))
{
  ?>
    <script language="javascript">
   alert('Please Insert Data');
   window.location.href="./cust_signin.php";
</script>

    <?php
  exit();
}

$q="SELECT cust_id FROM customer WHERE cust_email='$logName' AND cust_pwd='$pass' AND role_id=2";

include('controller/db_connect.php');
$result = mysqli_query($conn,$q);
if(mysqli_num_rows($result) <= 0)
{
   ?>
    <script language="javascript">
   alert('Invalid Username and Password');
   window.location.href="./cust_signin.php";
</script>

    <?php
  mysqli_close($conn);
  exit();
}
else
{
  $record = mysqli_fetch_array($result);
  
  session_start();
  $_SESSION['cust_id'] = $record['cust_id'];

  ?>
    <script language="javascript">
   alert('Login Successful');
   window.location.href="./index.php";
</script>

    <?php
  mysqli_close($conn);
  exit();
  
}
?>