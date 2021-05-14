<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
        <title>Registeration</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
         <link rel="stylesheet" href="css/important.css"/>
         <?php include("menu_header.php"); ?>
    </head>
         
        


 
        
	
    
<body>
	
	
    <div class="container"> 
    	<div class="row-center">
        	<div class="col-md-3" style="height:800px">
                    <h4>Registeration</h4>
                    <hr/>
                    <form name="Registeration"  method="post" >
    
		Username : <input type="text" autocomplete="off" class="form-control input-md" name="user"   required/> <br />
       Email : <input type="email" autocomplete="off" class="form-control input-md" name="email"   required/><br />
        
       Password : <input type="password" class="form-control input-md" minlength="6" maxlength="8" name="pas"   required/><br />
        
       Contact Number : <input type="number" onfocusout="checknumber()"  id="contactnum" autocomplete="off" class="form-control input-md" name="contact"  onfocusout="contact()"  id="contact" /><span id="con"></span><br />
        Gender : &nbsp;&nbsp;&nbsp;
 <input type="radio" name="gender" value="male" required="" /><b>&nbsp;Male</b>
           <input type="radio" name="gender" value="female" required="" /><b>&nbsp;Female</b>  
          <hr/>
          Address : <textarea  maxlength="250" name="useraddress"  rows="4" cols="50" autocomplete="off" class="form-control input-md"   required> </textarea><br />
     
        Who is Your Favourite Cricketer? : <input type="text" name="scquestion"  autocomplete="off" class="form-control input-md"   required/> <br />
     
                <hr/>
          <input type="submit" class="btn btn-danger" value="Register" name="register" />
    </form>
    
    </div>
    </div>
    </div>
   
    <br />
 <script src="js/mobilenumbervalidate.js" type="text/javascript"></script>
  </body>
   
</html>


<?php
include("connect.php");

	if(!isset($_POST['register']))
	{
				
	}
	else
	{
		$user= $_POST['user'];
		$email= $_POST['email'];
		$pas =$_POST['pas'];
		$contact =$_POST['contact'];
               
                $gender =$_POST['gender'];
               $address=$_POST['useraddress'];
             $question=$_POST['scquestion'];

		include("connect.php");
		$q="select * from register_user where user_name like '$user'; ";
		$result=mysqli_query($conn,$q);
		if(mysqli_fetch_assoc($result))
		{
			   echo "<script>alert('User Exist!')</script>";
         }
		else
		{
			 if( $contact==0 ||  $contact==null  ){
                       echo "<script>alert('Enter a valida contact number!')</script>";
           }else{
			 $q="insert into register_user (user_name,email,password,contact,gender,address,sc_question) values ('$user','$email','$pas','$contact','$gender','$address','$question')";
			$result=mysqli_query($conn,$q);
			if($result)
			{
				   header("Location:login.php");
			}
			else
			{
				   echo "<script>alert('Oops!!..something went wrong!!')</script>";
                            }
			}	
		}				

	}
?>