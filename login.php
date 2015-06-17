<?php

$id = $_POST['id'];
$pass = $_POST['password'];

if(empty($id) || empty($pass))
{
	header("Location:index.php?sebab=nolog");
	exit();
}

$q="SELECT login.log_id , login.log_username, role.role_id, role.rank FROM login,role WHERE login.log_id ='{$id}' && log_pwd='{$pass}' &&  login.role_id = role.role_id && role.rank >= '1'";

require_once("dbcon.php");
$result = mysqli_query($dbc,$q);
if(mysqli_num_rows($result) <= 0)
{
	mysqli_close($dbc);
	//print "test";
	header("Location:index.php?sebab=invalid");
	exit();
}
else
{
	$record = mysqli_fetch_array($result);
	//print "<h1>Welcome {$record['name']}</h1>";
	//print "Your last log in: {$record['lastLog']}";
	
	session_start();
	//$_SESSION['obj'] = $record ;
	//print $_SESSION['obj']['name'];
	$_SESSION['lid'] = $record['log_id'];	
	$_SESSION['lname'] = $record['log_username'];	
	$_SESSION['rid'] = $record['role_id'];	
	$_SESSION['rank'] = $record['rank'];
	
	//mysqli_query($dbc,"UPDATE customer SET lastLog=NOW() WHERE cust_id='{$record['cust_id']}'");
	
	if (!empty($_SESSION['rid']))
	{
		if ($_SESSION['rid'] == 1)
		{
			//$logName = $_POST['user'];
			header("Location:dashboard_admin.php");
		}
		elseif ($_SESSION['rid'] == 2)
		{
			header("Location:index.php");
		}
				
	}
	
	mysqli_close($dbc);
	
	exit();
}

?>