

<?php
include('../controller/db_connect.php');
session_start();


$logName = $_POST['username'];
$pass = $_POST['password'];

if(empty($logName) || empty($pass))
{
  ?>
    <script language="javascript">
   alert('Please Insert Data');
   window.location.href="../pages/login.php";
</script>

    <?php
  exit();
}

$q="SELECT adm_id FROM admin WHERE adm_username='$logName' AND adm_pwd='$pass' AND role_id=1";

include('../controller/db_connect.php');
$result = mysqli_query($conn,$q);
if(mysqli_num_rows($result) <= 0)
{
   ?>
    <script language="javascript">
   alert('Invalid Username and Password');
     // window.location.href="http://elieciouseydabites.com/pages/login.php";
</script>

    <?php
  mysqli_close($conn);
  exit();
}
else
{
  
  $record = mysqli_fetch_array($result);
  
  session_start();
  $_SESSION['adm_id'] = $record['adm_id'];
?>
    <script language="javascript">
   alert('Login Successful');
   window.location.href="../pages/index.php";
</script>

    <?php
  mysqli_close($conn);
  exit();
  
}
?>