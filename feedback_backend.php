<html>
    <head>
        
    </head>
    <body>
        <h4>Thank You So Much..</h4>
        <a href="feedback.php" class="btn btn-inverse">Go Back</a>
    </body>
</html>

<?php 
include("connect.php");

if(!isset($_POST['feedback']))
{
    echo "Invalid!!!";
    
}
else
{
                $fullname= $_POST['fullname'];
                $contact =$_POST['contact'];
		$msg =$_POST['msg'];

		
		
			$q="insert into feedback (fullname,contactno,message) values ('$fullname','$contact','$msg');";
			
			$result=mysqli_query($conn,$q);
			if($result)
			{
                             echo "<script>alert('Thanks For Your Feedback...')</script>";
				//echo 'Thanks For Your Feedback...';
			}
			else
			{
                            echo "<script>alert('ooopss..Something went Wrong !!')</script>";
				//echo "ooopss..Something went Wrong !!";
			}
}
              
	
?>
