<?php

	session_start();
	$user=$_POST['user'];
	$pas=$_POST['pas'];
	
	include("connect.php");
	$q="select user_name,password from register_user where user_name like '$user' and password like '$pas';";
	$ex=mysqli_query($conn,$q);
	
	if(mysqli_fetch_assoc($ex))
	{
		
		$_SESSION['user_logged']=$user;

		header("Location:home.php");
	}
	else
	{
		header("Location:incorrect_login.php");
	}

?>
