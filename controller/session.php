<?php
session_start();
include('./controller/db_connect.php');

if(isset($_SESSION['user_id'])){
	$sql="SELECT user_id FROM user WHERE user_id='$user_check'";

	$result=$conn->query($sql);
	if($result->num_rows == 1){
		while($row = $result->fetch_assoc()) {
			$_SESSION['user_id']=$row['user_id'];
		}
	}
}
?>
