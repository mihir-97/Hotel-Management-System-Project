<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot Password</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <?php include("menu_header_logged.php"); ?>
</head>
	
    
<body>
 <div class="main">
	<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Forgot Password</h4>
	<hr/>
       
    <div class="container">
    	<div class="row">
        	<div class="col-md-3">
                    <form class="form-horizontal" name="forgot" method="post" >
    
		
           <p>Create New Password: </p>
           
            <p>
              <input name="npass" type="password" autocomplete="off"  maxlength="8" minlength="6"  class="form-control input-md" size="200"  required/>
        </p>
          
              <br />
              
              <input class="btn btn-inverse" style="width:100" type="submit"  value="Submit" name="forgot"/>
              
        
	</form>
    </div>
    </div>
    </div>
            </div>
<script src="js/jquery.js"> </script>
<script src="js/bootstrap.min.js" > </script>
</body>
</html>

<?php
include("connect.php");
session_start();
//echo 'hello';
$user_logged=$_SESSION["user_logged"];

if(isset($_POST['forgot']))
{
    $npass=$_POST['npass'];
    $qry="update register_user set password='$npass' where user_name='$user_logged'";
    $update=  mysqli_query($conn, $qry);
    if($update)
    {
        //echo "Your Password Has Successfully Changed";
        echo "<script>alert('Your Password Has Successfully Changed')</script>";
        header("Location:login.php");
    }
    else
    {
        //echo "Something Went Wrong!!! Trt Again...";
        echo "<script>alert('Something Went Wrong!!! Trt Again...')</script>";
    }
}


?>
