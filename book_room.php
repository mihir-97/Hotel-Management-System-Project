
<?php 
include("./connect.php");
 
             
                 $stringofdata=$_GET['stringofdata'];
                
                $arrayofdata=(explode(",",$stringofdata));
               // $arrayofdata[0];
                  $room_id=$arrayofdata[0];
                $fname=$arrayofdata[1];
                 $lname=$arrayofdata[2];
                $email=$arrayofdata[3];
                $contact=$arrayofdata[4];
                $troom=$arrayofdata[5];
                $bdtype=$arrayofdata[6];
                $noperson=$arrayofdata[7];
               $cin=($arrayofdata[8]);
                $cout=($arrayofdata[9]);  
                   $days= number_format($arrayofdata[10]);
                   $price= number_format($arrayofdata[11]);
                 session_start();
                    $user=$_SESSION['user_logged'];
                 $addressfind="select address from register_user where user_name='$user'";
                   $addr=mysqli_query($conn,$addressfind);
                  while($row=mysqli_fetch_array($addr))
        {
                 $address=  $row['address'];
        }   
             
        
       $moving="insert into historybookedrooms(fname,lname,email,contact,troom,bdtype,noperson,cin,cout,username,room_id,price,address) select fname,lname,email,contact,troom,bdtype,noperson,cin,cout,username,room_id,price,address from book_room where room_id='$room_id' and cout<'$cin'";
                  $resultofmove=mysqli_query($conn,$moving);
                 if($resultofmove){
                   $deletequery="delete from book_room where room_id='$room_id'";
                       $resultofdel=mysqli_query($conn,$deletequery);
                 }
                 
                 
           $query="insert into book_room (fname,lname,email,contact,troom,bdtype,noperson,cin,cout,username,room_id,price,address) values('$fname','$lname','$email','$contact','$troom','$bdtype','$noperson','$cin','$cout','$user','$room_id','$price','$address');";
                 $result=mysqli_query($conn,$query);
                   
                   $q2="update rooms set status=1 where room_id=$room_id";
                        $res2=mysqli_query($conn,$q2);
                if($result && $res2)
                {
                 echo "done " ;
                  header("Location:myrooms.php");                
                }
                else 
               {
                    echo "<script type='text/javascript'> alert('Error adding user in database')</script>";
                 echo "not";
                }                                                          
               
               

?>
