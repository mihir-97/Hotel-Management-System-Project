<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href="css/chocolat.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
        <?php include("menu_header_logged.php"); ?>
</head>
	
    
<body>
    <center><h3><i class="fa fa-hotel"></i></h3></center>
    <center><h5>Room Detail</h5></center>
    <hr/>
    <div class="container py-5">
             <div class="row mt-4">
                 <?php
        
                    include("connect.php");
                    $room_id=$_GET['room_id'];
                     $status=$_GET['status'];
                      
                  
                    $q="select * from rooms where room_id=$room_id";
                    $res=mysqli_query($conn,$q);
                    if(mysqli_num_rows($res)>0)
		    {
                       
                    while($row= mysqli_fetch_array($res))
                    {
                       ?>
                 
                    <div class="col-md-3">
                        <center><h7 class="card-title"><i class="fa fa-key"></i>Room No:-<?php echo $row['room_no']; ?></h7></center>
                        
                            
                            <img src="../HMS/image/<?php echo $row['image']; ?>" class="img-rounded" width="300px" height="300px"/>
                    </div>
                 <br/><br/>
                 <div class="col-sm-1">
                     &nbsp;
                 </div>
                            <div class="col-md-3">
                             
                             <h4 class="card-title">Type:-<?php echo $row['type']; ?></h4>
                             <p><i class="fui-star-2"></i><i class="fui-star-2"></i><i class="fui-star-2"></i><i class="fui-star-2"></i></p>
                             <h5><i class="fa fa-inr"></i>.<?php echo $row['price']; ?></h5>
                             <h5><?php echo $row['detail']; ?></h5>
                             
                          <?php   if($status!=1){ ?>
                               <a href="room_booking.php?room_id=<?php echo $row['room_id']; ?>" class="btn btn-inverse">Book Now</a> &nbsp;
                         <?php   
                                         }?>
                            
                             <br/><br/><hr/>
                         </div>
                     
                 </div>
                    <?php  }}
			else
		       { ?>
                 <center><h5>No Rooms Available !!</h5></center>
                           
                        <?php 
		   }?>
                 
             </div>      
         </div>
         
</body>
    <br/><br/><br/><br/>
    <?php include("./footer.php"); ?>
</html>
