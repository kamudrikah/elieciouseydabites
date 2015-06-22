

<?php
session_start();
include('../controller/db_connect.php');


$logName = $_POST['username'];
$pass = $_POST['password'];

if(empty($logName) || empty($pass))
{

  echo "
  <script>
  alert('Please Insert Data');
  window.location.href='../pages/login.php';
  </script>";

  exit();
}

$q="SELECT user_id FROM user WHERE username='$logName' AND password='$pass' AND role = 'admin'";

$result = mysqli_query($conn,$q);
if(mysqli_num_rows($result) <= 0)
{

  echo "
  <script>
  alert('Invalid Username and Password');
  window.location.href='../pages/login.php';
  </script>";

  mysqli_close($conn);
  exit();
}
else
{
  
  $record = mysqli_fetch_array($result);
  
  $_SESSION['user_id'] = $record['user_id'];

  echo "
  <script>
  alert('Login Successful');
  window.location.href='../pages/index.php';
  </script>";

  mysqli_close($conn);
  exit();
  
}
?>