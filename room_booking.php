<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" href="css/important.css"/>
        <script src="js/mobilenumbervalidate.js" type="text/javascript"></script>
       
        <?php include("menu_header_logged.php"); ?>
</head>
<body>
	<?php $room_id=$_GET['room_id'];
       //  $_POST['room_id']=$room_id; 
        
        if($room_id=="" || $room_id==null ){
            
              header("Location:home.php");
           
        }
         session_start();
        $user= $_SESSION['user_logged'];
        
        if(!$user){
            
            header("Location:UserNotFound.php");
           
        }
        echo '<label>Username:  &nbsp;</label>'; echo $user;        echo '<br/>';
       $_SESSION['room_id']=$room_id;
        echo '<label>RoomID: &nbsp;</label>';echo $room_id; 
        
       include("connect.php");
         $today= date('Y-m-d');
    $getcin="select cin from book_room where cin in(select book_room.cin from book_room where (book_room.cout>='$today' and  cin<='$today') or ( cout>='$today' and cin>='$today' )) and room_id='$room_id'";
      $d=strtotime("+1 months");
$afterone= date('Y-m-d',$d);
 $d2=strtotime("+2 months");
 $aftertwo=date('Y-m-d',$d2);
       $resofcin=mysqli_query($conn,$getcin);
       if($resofcin){
           
            while($row=mysqli_fetch_array($resofcin))
        {
                 $getcheckin=  $row['cin'];
        }
       }if(!$resofcin){
             $getcheckin= $afterone;
           
       }
         
      $query="select email,contact from register_user where user_name='$user'";
	$res=mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($res);
	
        ?>	
    <div class="container">
    	<div class="row-center">
        	<div class="col-md-4">
                    <center><h4>Booking Form</h4></center>
                    <hr/>
                    <?php
                    
                    ?>
                    
           <form name="booking" action="priceshowing.php" method="post" >
		First Name *  <input type="text" class="form-control input-md" name="fname"     required/> <br />
                Last Name *  <input type="text" class="form-control input-md" name="lname"   required/> <br />
                Email <input type="email" class="form-control input-md" name="emailid"  value="<?php echo $row['email']; ?>"  required/><br />
                Contact Number *  <input type="number" class="form-control input-md"  onfocusout="checknumber()"  id="contactnum" autocomplete="off"  name="contactno" value="<?php echo $row['contact']; ?>"  required/><br />
   
                Type Of Room *<?php 
                  $query="select type from rooms where room_id='$room_id'";
	$res=mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($res);
	
                ?>
                <input type="label" class="form-control input-md" name="troom" value="<?php echo $row['type']; ?>"  required/><br />
   
                <input type="hidden" name="$room_id" value="<?php $room_id?>"/> 
                <br/>
                Bedding Type
                <select name="bdtype" class="form-control" required>
		<option value selected ></option>
                <option value="Single">Single</option>
                <option value="Double">Double</option>
		<option value="Triple">Triple</option>
                <option value="Quad">
                    Squad</option>
		   </select>
                <br/>
                No.of Person *
                <select name="noperson" class="form-control" required>
		<option value selected ></option>
                <option value="1">1</option>
                <option value="2">2</option>
         <option value="3">3</option>
                <option value="4">4</option>
          
                </select>
                <br/>
                Check-In
                <input name="cin" type ="date"   max="<?php echo $getcheckin?>"  id="datepicker" class="form-control" required/>
                <br/>
                Check-Out
                <input name="cout" type ="date"  max="<?php echo $getcheckin?>"  class="form-control" required/>
              
                <hr/>
          
                <input type="submit" class="btn btn-inverse" value="Submit" name="submit"/>
        
       </form>
    </div>          
    </div>
    </div>
    
    <br /><br /><br /><br /><br />
    <?php include("footer.php");  ?>

</body>

   
</html>