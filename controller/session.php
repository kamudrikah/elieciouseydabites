<?php
session_start();

if(!isset($_COOKIE['rand_id']))
{

$_COOKIE['rand_id'] = $ip = $_SERVER['HTTP_CLIENT_IP'];
// print $ip;

}

?>
<?php
include('controller/db_connect.php');
session_start();

$user_check=$_SESSION['cust_id'];

$sql="select cust_id from customer where cust_id='$user_check'";
$ses_sql=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['cust_id'];

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
