<?php

$username = $_POST['username'];
$pass = $_POST['password'];

if(empty($username) || empty($pass))
{
	header("Location:login.php?res=empty");
	exit();
}

$q="SELECT * FROM login WHERE username='{$username}' && password='{$pass}' && role_id = '1' ";

require_once("config.php");

$result = mysqli_query($dbc,$q);
if(mysqli_num_rows($result) <= 0)
{
	mysqli_close($dbc);
	header("Location:login.php?res=invalid");
	exit();
}
else
{
	$record = mysqli_fetch_array($result);
	
	session_start();
	$_SESSION['id'] = $record['log_id'];
	$_SESSION['username'] = $record['username'];
	$_SESSION['rid'] = $record['role_id'];
	//$_SESSION['rank'] = $record['rank'];
	
	//mysqli_query($dbc,"UPDATE user SET u_lastLog=NOW() WHERE u_id='{$record['u_id']}'");
	
	header("Location:index.php");
	mysqli_close($dbc);
	exit();
	
}
?>