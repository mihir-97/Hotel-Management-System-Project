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

        <style>
table, th, td {
  border: none;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
@media print{
#printing{
    display: none;
    visibility: none;
    
}
@page{
    margin: 0px;
    margin: 15px;
}
}
</style>
<script type="text/javascript">

</script> 
    </head>
    <body>
          <?php include("menu_header_logged.php"); ?>
      
        <?php
         session_start();
         $user= $_SESSION['user_logged'];
          if(!$user){
             header("Location:UserNotFound.php");
          }
          $room_id=$_GET['room_id'];
$cin=$_GET['cin'];

        
include("connect.php");
 
          $q="select * from book_room where username='$user' and cin='$cin' and room_id='$room_id'";
$res=mysqli_query($conn,$q);
if(mysqli_num_rows($res)>0)
{
          while($row= mysqli_fetch_array($res))
          {
            $typeofroom=$row['troom'];
             $noofguest=$row['noperson'];
              $cout=$row['cout'];
         $checkin = date("d-m-Y", strtotime($cin)); 
       $checkout = date("d-m-Y", strtotime($cout)); 
               $cin= new DateTime($checkin)  ; 
       $cout= new DateTime($checkout );
       $days=$diff=date_diff($cin,$cout);
       $day=number_format($days->format("%a"));
          $amount=$row['price']; 
            $address=  $row['address'];
             
        ?>  <table border="1" style="height: 100%;width: 100%;">
            <center><h5>Room Invoice</h5></center> <br/>
            <tr>
                <td colspan="2">User Name:<?php echo $user?></td>
                
                <td colspan="2">Room No: <?php echo $room_id ?></td>
               
            </tr>
            <tr><td colspan="2" style="">Address:<?php echo $address ?> </td>
               
                <td colspan="2"> Room Type: <?php echo $typeofroom ?></td>
              
            </tr>
            <tr><td colspan="2">No Of Guest : <?php echo $noofguest ?></td>
            
                <td colspan="2"></td>
               
            </tr>
            <tr>
                <td>CheckIn</td>
                <td>CheckOut</td>
                <td>Days</td>
                <td>Amount</td>
            </tr>
            <tr><td><?php echo $checkin ?></td>
                <td><?php echo $checkout ?></td>
                <td><?php echo $day ?></td>
                <td><?php echo $amount ?></td>
            </tr>
            <tr>
                <td colspan="4" style="height: 300px">
                    
                    <button onclick="window.print()" id="printing" >Print this page</button>
                    
                </td>
                </tr>
               
        </table>
         <div style="float: left">
                      Guest Signature:<input type="text" name="guestsign" style="border:none;border-bottom: 1px solid black">
          
                </div>
                <div style="float:right">
                     Cashier Signature:<input type="text" name="sign" style="border:none;border-bottom: 1px solid black">
            
                </div>
            <br/><br/>
          <?php
          
          }
}
          
          
        // put your code here
        ?>

        
    </body>
     <?php include("./footer.php"); ?>
</html>
