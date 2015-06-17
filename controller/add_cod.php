<?php
session_start();


if(isset($_POST['submit'])){

$cod = $_POST['cod'];

$sql = "INSERT INTO cod".    
         " (place)". 
	 " VALUES". 
         " ('{$cod}')";

require_once('db_connect.php');



mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn) > 0) 
{
  ?>

  	<script language="javascript">
   alert('Data Save!');
  window.location.href="http://elieciouseydabites.com/pages/cod.php";
	</script>

  <?php
}

mysqli_close();
exit();

}
?>