<?php

	session_start();
	
	$_SESSION=array();
	if(isset($_COOKIE["id"]) && isset($_COOKIE["uid"]) && isset($_COOKIE["pass"]))
	{
		setcookie("id",'',strtotime('-5 days'),'/');
		setcookie("user",'',strtotime('-5 days'),'/');
		setcookie("pass",'',strtotime('-5 days'),'/');
	}
	session_destroy();
	
	if(isset($_SESSION['user_logged']))
	{
		header("location:message.php?msg=error:_logout_Failed");
	}
	else
	{
		header("location:login.php");
	}


?>