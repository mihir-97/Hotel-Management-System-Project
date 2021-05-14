<?php session_start(); 
	$user=$_SESSION['user_logged'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <?php include("menu_header_logged.php"); ?>
</head>

<body>
	<div class="container">
    	<div class="row">
        	<div class="col-md-4">
            	&nbsp;
            </div>
    		<div class="col-md-4">
            	<center><h4>Profile</h4></center>
                	<?php  
						include("connect.php");
						/*$conn=mysqli_connect("localhost","root","");
						$db=mysqli_select_db($conn,"automobile");*/
						$q="select * from register_user where user_name like '$user'";
						$result=mysqli_query($conn,$q);
						$row=mysqli_fetch_assoc($result);					
					
					
					?>
                    <br /><br /><br />
                    
            	<table class="table">
                	<tr>
                    	<th>Name :</th>
                		<td><?php echo $row['user_name']; ?></td>
                	</tr>
                    <tr>
                    	<th>Email :</th>
                		<td><?php echo $row['email']; ?></td>
                	</tr>
                    <tr>
                    	<th>Contact No :</th>
                		<td><?php echo $row['contact']; ?></td>
                	</tr>
                
                </table>
                     <center><a href="change_password.php" class="btn btn-inverse">Change Password</a>
                    <a href="forgot_password.php" class="btn btn-inverse">Forgot Password</a>
                    </center>
                    
    		</div>
            <div class="col-md-4">
            	&nbsp;
            </div>

    	</div>
    </div>


</body>
    <br/><br/><br/>
    <?php include("./footer.php"); ?>
</html>
