<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot Password</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
       
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
     UserName:
            <p>
              <input name="Username" type="text" autocomplete="off" class="form-control input-md" size="200"  required/>
        </p>
          
              <br />
		
           <p>Enter Security Question: </p>
           Your Favorite Cricketer:
            <p>
              <input name="sec_que" type="text" autocomplete="off" class="form-control input-md" size="200"  required/>
        </p>
            <br />
             <input class="btn btn-inverse" style="width:100" type="submit" value="Submit" name="forgot"/>
              
        
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
session_start();
include("connect.php");
if(isset($_POST['forgot']))
{
    $username=$_POST['Username'];
    $sec_que=$_POST['sec_que'];
    
    $userverify="select count(*)as total  from register_user where user_name='$username'";
    $result= mysqli_query($conn,$userverify);
  $data=mysqli_fetch_array($result);
 

if($data['total']>0){
           
         $q="select sc_question from register_user where user_name='$username'";
        $res= mysqli_query($conn,$q);
        while($row=mysqli_fetch_array($res))
        {
            $sc_question=$row['sc_question'];
            if($sc_question == $sec_que)
            {
               // echo "Security Question is matched";
            $_SESSION['user_logged']=$username;

                header("Location:forgot_pass_check.php");
                       
            } 
            else
            {    
               //echo "Security Question does not matched";
               echo "<script>alert('Security Question does not matched')</script>";
            }
        }
           
       }else{
           
               echo "<script>alert('Not a valid Username')</script>";
                    
       }


// Print the entire row data

    
    
    
    
    
   
            
}
?>
