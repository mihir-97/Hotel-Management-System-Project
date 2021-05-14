
<html>
    <head>
        <title>
            My Rooms
        </title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/flat-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <?php include("menu_header_logged.php"); ?>
    </head>
    <body>
    <center><h4>Your Rooms</h4></center>
        <div class="row center-block">
            <div class="col-md-6">
            
        
        <?php 
        session_start();
         $user= $_SESSION['user_logged'];
          if(!$user){
             header("Location:UserNotFound.php");
          }
       // echo $room_id;
if(!isset($_SESSION['room']))
{
    $_SESSION['room']=[];
}
?>
        
           
        
        <table class="table table-striped" style="margin-left :200px">				
					<tr>
                    	<th>Room Id</th>
                        <th>Name</th>
                    	<th>Email</th>
                        <th>Contact</th>
                        <th>Room Type</th>
                        <th>Bedding Type</th>
                        <th>No. Of Person</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Cancel Room</th>
                        <th>Booked rooms Print</th>
                    </tr>
                
<?php
        
include("connect.php");
$q="select * from book_room where username='$user'";
$res=mysqli_query($conn,$q);

echo $user;
if(mysqli_num_rows($res)>0)
{
          while($row= mysqli_fetch_array($res))
          {
          ?>
           <tr>
                <td><?php echo $row['room_id']; ?></td>
               <td><?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?></td>
               <td><?php echo $row['email']; ?></td>
               <td><?php echo $row['contact']; ?></td>
               <td><?php echo $row['troom']; ?></td>
               <td><?php echo $row['bdtype']; ?></td>
               <td><?php echo $row['noperson']; ?></td>
               <td><?php echo date("d-m-Y", strtotime($row['cin'])); ?></td>
               <td><?php echo date("d-m-Y", strtotime($row['cout']));?></td>
               <td><a class="btn btn-danger" href="Cancelroom.php?room_id=<?php echo $row['room_id']; ?>&cin=<?php echo $row['cin']?>"> Cancel room</a></td>
               <td><a class="btn btn-info" href="billprint.php?room_id=<?php echo $row['room_id']; ?>&cin=<?php echo $row['cin']?>"> <i class="fui-export"></i> </a></td>
               
           </tr>
    <?php                    
}}
else
{ ?>

           <tr>
               <td></td>
               <td>Your booking are empty !!</td>
           </tr>   


                           
<?php 
}
?>
           
        </table>
                </div>
            </div>
        <br/><br/><br/><br/><br/>
 </body>
 <?php include("./footer.php"); ?>
</html>

