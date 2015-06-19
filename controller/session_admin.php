<?php
session_start();

// if(!isset($_COOKIE['rand_id']))
// {

// $_COOKIE['rand_id'] = $ip = $_SERVER['HTTP_CLIENT_IP'];
// print $ip;

// }

?>

<?php
include('../controller/db_connect.php');
session_start();

$user_check=$_SESSION['adm_id'];
$adm_username=$_SESSION['adm_username'];

$sql="select adm_id from admin where adm_id='$user_check'";
$ses_sql=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['adm_id'];

if(!isset($login_session))
{
	echo $login_session;
 ?>
    <script language="javascript">
   alert('Please Login');
   window.location.href="../pages/login.php";
</script>

    <?php
}

?>
