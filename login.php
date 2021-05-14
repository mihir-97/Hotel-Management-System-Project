<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <?php include("menu_header.php"); ?>
</head>
	
    
<body>

	<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LogIn</h4>
	<hr/>
    <div class="container">
    	<div class="row">
        	<div class="col-md-3">
	<form class="form-horizontal" name="login"  method="post" >
    
		
           <p>Username : 
        </p>
            <p>
              <input name="user" type="text" autocomplete="off" class="form-control input-md" size="200"  required/>
        </p>
            <p>Password : 
              
              <input type="password" class="form-control input-md "   name="pas"   required/>
              <br />
              
              <input class="btn btn-inverse" style="width:100" type="submit" value="Login" name="Login"/>
              <input class="btn btn-danger" style="width:100" type="reset" value="Reset" name="Reset"/>
        </p>
		 <a href="forgot_password.php">Forget Password</a><br/>
                 <a href="register.php">Click To Register</a>
               
	</form>
    </div>
    </div>
    </div>
<script src="js/jquery.js"> </script>
<script src="js/bootstrap.min.js" > </script>
</body>
</html>
<?php
include("connect.php");
	if(isset($_POST['Login']))
{
	session_start();
	$user=$_POST['user'];
	$pas=$_POST['pas'];
	
	$q="select user_name,password from register_user where user_name like '$user' and password like '$pas';";
	$ex=mysqli_query($conn,$q);
	
	if(mysqli_fetch_assoc($ex))
	{
		
		$_SESSION['user_logged']=$user;

		header("Location:home.php");
	}
	else
	{
             echo "<script> alert('Incorrect password or username!')</script>";
                
		//header("Location:login.php");
	}
}
else{
    
}
?>