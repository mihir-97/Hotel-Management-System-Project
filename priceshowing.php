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
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
   <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/flat-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
      
 
<?php 
include("./connect.php");
 
        if(!isset($_POST['submit']) )
        {
            echo "Invalid!!!";
        }
        else 
        {
                $fname=$_POST['fname'];
                $lname=$_POST['lname'];
                $email=$_POST['emailid'];
                $contact=$_POST['contactno'];
                $troom=$_POST['troom'];
                $bdtype=$_POST['bdtype'];
                $noperson=$_POST['noperson'];
                $cin=new DateTime( $_POST['cin']);
                $cout=new DateTime($_POST['cout']);  
                
                 session_start();
                  $room_id= $_SESSION['room_id'];
               
                if($cin>=$cout){
                    
                    echo '<script>alert("enter a valid date for check-in and check-out")</script>';
                   
      // header("Location:room_booking.php?room_id=$room_id"); 
        header("Location:home.php");
                           }
                           
                           else if($cin<$cout){
                               $days=$diff=date_diff($cin,$cout);
                                $cin= date("d-m-Y", strtotime( $_POST['cin']));
                $cout= date("d-m-Y", strtotime( $_POST['cout']));
                if($bdtype=='Single')
                {
                    $bedtype=1;
                }
                else if($bdtype=='Double'){
                     $bedtype=2;
                }
                else if($bdtype=='Triple'){
                     $bedtype=3;
                }
                else{
                     $bedtype=4;
                   }
                $q="select price from rooms where room_id='$room_id'";
                   $res=mysqli_query($conn,$q);
                   $row= mysqli_fetch_array($res);
                 $price=   $row['price'];
                 if($noperson<=2 && $bedtype<=2  ){
                     
                      $price  =$price;
                  }
                 else if($bdtype>2 && $noperson<=2){
                      $price  =$price+($price * $bedtype)/15;
                          
                   }else if( $bdtype<=2 && $noperson>2 ){
                         $price  =$price+($price* $noperson)/10;
                           
                     }
                 else {
                         $price  =$price+($price* $noperson)/10+($price * $bedtype)/15;
                           
                 }
               $totdays=  number_format($days->format("%a"));
                           if($totdays==1){
                          $price=$price+($price*$totdays*10)/100;
                      }else{ 
                             $price=$price*$totdays+($price*$totdays*5)/100;
                     
                    
//                            $price  =$price+($price* $noperson)/10+($price * $bedtype)/15
//                            +($totdays*$price)/40;
                }
                               
                   $user=$_SESSION['user_logged'];
                   
                      }
                        
        }
                   ?>
                     <table class="table table-striped" style="margin-left :0px">				
		 <tr> 
                                        	<th>Room Id</th>
                                                 <td><?php echo $room_id; ?></td>
                 </tr>
                       <tr>
                         
                 <th>Price</th>
                         <td><?php echo number_format($price); ?><i class="fa fa-inr"></i></td>
                       </tr>
                     <tr>
                 <th>Name</th>
<td><?php echo $fname; ?>&nbsp;<?php echo $lname; ?></td>
                     </tr>
                  <tr>
                	<th>Email</th>
 <td><?php echo $email ?></td>
                  </tr>
                    <tr>
                   <th>Contact</th>
                    <td><?php echo $contact; ?></td>
                    </tr>
                  <tr>
                     <th>Room Type</th>
<td><?php echo $troom; ?></td>
                  </tr>
                     <tr>
                   <th>Bedding Type</th>
<td><?php echo $bdtype ?></td>
                     </tr>
                    <tr>
                   <th>No. Of Person</th>
<td><?php echo $noperson; ?></td>
                    </tr>
                 <tr>
                     <th>Check In</th>
<td><?php echo $cin; ?></td>
                 </tr>

                  <th>Check Out</th>
                                         <td><?php echo $cout; ?></td>
                     </tr>
              
                    
<!--              <tr>
                  <td><?php echo $room_id; ?></td>
               <td><?php echo number_format($price); ?><i class="fa fa-inr"></i></td>
               <td><?php echo $fname; ?>&nbsp;<?php echo $lname; ?></td>
              <td><?php echo $email ?></td>
               <td><?php echo $contact; ?></td>
              <td><?php echo $troom; ?></td>
              <td><?php echo $bdtype ?></td>
               <td><?php echo $noperson; ?></td>
              <td><?php echo $cin; ?></td>
           <td><?php echo $cout; ?></td>
                            
           </tr>-->
            </table>
        <form method="post" name="submit">
        <div style=margin-left:200px">
              <?php $alldata=array();
                        
                                        $alldata[0]=$room_id;
                                         $alldata[1]=$fname;
                                         $alldata[2]=$lname;
                                         $alldata[3]=$email;
                                          $alldata[4]=$contact;
                                          $alldata[5]=$troom;
                                          $alldata[6]=$bdtype;
                                          $alldata[7]=$noperson;
                                       $alldata[8]= $_POST['cin'];
                                      
                                          $alldata[9]=$_POST['cout'];
                               echo           $alldata[10]=number_format($days->format("%a"));
                                      $alldata[11]=strval($price);
                                         $arrayofdata=implode(",",$alldata);
                                         $_POST['arrayofdata']=$arrayofdata;
                                ?>                              
<!--        <a class="btn btn-info" href="book_room.php?room_id=<?php echo $room_id; ?>&price=<?php echo $price; ?>&cin=<?php echo $cin; ?>&cout=<?php echo $cout; ?>&contact=<?php echo $contact; ?>&email=<?php echo $email; ?>&bdtype=<?php echo $bdtype; ?>&fname=<?php echo $fname; ?>&lname=<?php echo $lname; ?>&noperson=<?php echo $noperson; ?>"> confirm payment </a>
     -->
     <a class="btn btn-info" href="book_room.php?stringofdata=<?php echo $_POST['arrayofdata']; ?>"> confirm Booking </a>
     
      <?php           
 
?>
             </div>
              </form>       
 

    </body>
</html>
