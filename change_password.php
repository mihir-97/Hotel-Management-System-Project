<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <?php include("menu_header_logged.php"); ?>
</head>
	
    
<body>

	<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Change Password</h4>
	<hr/>
    <div class="container">
    	<div class="row">
        	<div class="col-md-3">
                    <form class="form-horizontal" name="change"  method="post" >
    
		
           <p>Old Password : </p>
            <p>
              <input name="opass" type="password" autocomplete="off" class="form-control input-md" size="200"  required/>
        </p>
           <p>New Password : </p>
           <p> 
               <input type="password" class="form-control input-md "   name="npass"   required/>
              </p>
           <p>Confirm Password : </p>
           <p> 
               <input type="password" class="form-control input-md "   name="cnpass"   required/>
              </p>
              <br />
              
              <input class="btn btn-inverse" style="width:100" type="submit" value="Change" name="change"/>
              
        
	</form>
    </div>
    </div>
    </div>
<script src="js/jquery.js"> </script>
<script src="js/bootstrap.min.js" > </script>
</body>
</html>

<?php 
session_start();
include("connect.php");
$user_logged=$_SESSION["user_logged"];
if(isset($_POST['change']))
{
    $opass=$_POST['opass'];
    $npass=$_POST['npass'];
    $cnpass=$_POST['cnpass'];
    

        $q="select password from register_user where user_name='$user_logged'";
        $res= mysqli_query($conn,$q);
        while($row=mysqli_fetch_array($res))
        {
            $pass=$row['password'];
            if($pass==$opass)
            {
                if($npass==$cnpass)
                {
                    $qry="update register_user set password='$cnpass' where user_name='$user_logged'";
                    $update=  mysqli_query($conn, $qry);
                    if($update)
                    {
                        //echo "Password has been changed";
                        echo "<script>confirm('Password has been changed')</script>";
                        header("Location:login.php");
                    }
                    else 
                    {
                        //echo "New and confirm passsword does not matched";
                       }
                }
                else
                {    echo "<script>alert('New and confirm passsword does not matched')</script>";
           
                    //echo "Old passsword does not matched";
                   }
            }
            else
            {   echo "<script>alert('Old passsword does not matched')</script>";
                }

        }    

}
?>

