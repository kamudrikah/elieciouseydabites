<?php
session_start();
include('./controller/db_connect.php');


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

$q="SELECT user_id FROM user WHERE username='$logName' AND password='$pass' AND role='user'";

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
  $_SESSION['user_id'] = $record['user_id'];

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