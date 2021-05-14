<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
          <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/flat-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
  
    </head>
    <body>
        <div class="row center-block">
            <div class="col-md-6">
         
        <?php
         session_start();
         $user= $_SESSION['user_logged'];
          if(!$user){
             header("Location:UserNotFound.php");
          }
          $room_id=$_GET['room_id'];
$cin=$_GET['cin'];

        
include("connect.php");
 $q="select * from rooms where room_id=$room_id";
                    $res=mysqli_query($conn,$q);
                    if(mysqli_num_rows($res)>0)
		    {
                       
                    while($row= mysqli_fetch_array($res))
                    {
                       $imgname= $row['image'];
                    }
                    }



          $q="select * from book_room where username='$user' and cin='$cin' and room_id='$room_id'";
$res=mysqli_query($conn,$q);
if(mysqli_num_rows($res)>0)
{
          while($row= mysqli_fetch_array($res))
          {
              
date_default_timezone_set("Asia/Kolkata");
       $cin=$row['cin']; 
       $cout=$row['cout'];
       $noofperson=$row['noperson'];
       $checkin = date("d-m-Y", strtotime($cin)); 
       $checkout = date("d-m-Y", strtotime($cout));  
       $amount= $row['price'] ; 
       $cin= new DateTime( $checkin)  ; 
       $cout= new DateTime($checkout );
       $days=$diff=date_diff($cin,$cout);
       $day=number_format($days->format("%a"));
          }
}
      // put your code here
        ?>
        <form method="post">
           
<img src="../HMS/image/<?php echo $imgname; ?>" style="margin-left :505px"  class="img-rounded" width="300px" height="300px"/>
         
             <table class="table table-striped" style="margin-left :340px">				
					<tr>
                                            <th>Room Id</th>
                        <th>Check In</th>
        <th>Check Out</th>
               <th>Days</th>
                        <th>Price</th>
                                        </tr>
                                        
                                        <tr>
                                            <td><?php echo $room_id?></td>
                                            <td><?php echo $checkin ?></td>
                                            <td><?php echo $checkout?></td>
                                             <td><?php echo $day ?></td>
                                             <td><?php echo $amount?></td>
                                             
                                        </tr>                   
             </table>
<button type="submit" name="cancelroom" style="margin-left: 600px;" class="btn btn-danger">Cancel Room</button>
        </form>
                
                <?php 
                if(isset($_POST['cancelroom']))
                { 
                    $moving="insert into historybookedrooms(fname,lname,email,contact,troom,bdtype,noperson,cin,cout,username,room_id,price,address) select fname,lname,email,contact,troom,bdtype,noperson,cin,cout,username,room_id,price,address from book_room where room_id='$room_id' ";
                  $resultofmove=mysqli_query($conn,$moving);
                  echo "<script>alert('Room Canceled Successfully!!')</script>";
         
                 if($resultofmove){
                   $deletequery="delete from book_room where room_id='$room_id'";
                       $resultofdel=mysqli_query($conn,$deletequery);
                        $setstatus="update rooms set status=0 where room_id='$room_id'";
                       $resultofset=mysqli_query($conn,$setstatus);
                     header("Location:myrooms.php");
                
                 }
                 else{
                         echo "<script>alert('Room Canceled failed!!')</script>";
         
                 }
                   
                }
                ?>
                </div>
                </div>
    </body>
</html>
