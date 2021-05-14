<?php

	if(!isset($_POST['register']))
	{
				echo "Invalid";	
	}
	else
	{
		$user= $_POST['user'];
		$email= $_POST['email'];
		$pas =$_POST['pas'];
		$contact =$_POST['contact'];
		

		include("connect.php");
		$q="select * from register_user where user_name like '$user'; ";
		$result=mysqli_query($conn,$q);
		if(mysqli_fetch_assoc($result))
		{
			echo "User Exist";
		}
		else
		{
			
			$q="insert into register_user (user_name,email,password,contact) values ('$user','$email','$pas','$contact');";
			
			$result=mysqli_query($conn,$q);
			if($result)
			{
				header("location:login.php");
			}
			else
			{
				echo "ooopss..Something went Wrong !!";
			}
				
		}				

	}
?>