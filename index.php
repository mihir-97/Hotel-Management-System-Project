
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href="css/chocolat.css" rel="stylesheet" type="text/css"/>
        
       <?php  
        session_start();
       $admin= $_SESSION['admin_logged'];
        if($admin){
          include("menuofindex.php");
        }else{
          include("menu_header.php");
        }
       ?>
        
        <script src="js/jquery.js" type="text/javascript"></script>
           

    
</head>
	
    
<body>
<!--   <input type="text" id="first" name="search" />
   --> 
    <?php 
        if($admin){
          ?> <h4 class="fui-user">Welcome Admin !!</h4>
   <?php
        }
    else{
        ?>
          <h4 class="fui-user">Welcome Guest !!</h4>
   <?php
    }
    ?>
             <?php 
                if(isset($_GET['status'])){
                       
                    $status=$_GET['status'];
                   ?>      <a class="btn btn-info" href="home.php">Back To Home Page </a> 
                   <input type="text" id="myInput" class="form-control input-md" style="float: right;" onkeyup="myFunction()" placeholder="Search for Types.." title="Type in a name">
                  <?php
                    }
                    else {
                        
                        $status=0;
                     ?>   
                        <a class="btn btn-info" href="home.php?status=1">Click Here To View  Booked Rooms </a></br> 
<!--                       <input type="text" class="form-control input-sm" id="myInput" style="float:left;width:200px !important " onkeyup="myFunction()" placeholder="Search for Types.." title="Type in a name"/>
                       <input class="btn btn-default" style="float:right;margin-right: 1070px" value="Search" type="button"/> 
    -->
    <?php      
}
              ?>      
                            
   
    </div>
        <hr/>
        <center><h5>Rooms And Rates</h5></center>
      <center><h6>Book Your Rooms As Your Choice.</h6></center>
      <hr/>
       <?php
            function showdata($status)
            {
             ?>
                <div class="row mt-4" >
                 <?php
        
                    include("connect.php");
               
             if($status==0) {
                 $d=strtotime("yesterday");
                 $yesterday= date("Y-m-d", $d);            
$today= date('Y-m-d');
$onemonthago= date('Y-m-d',strtotime('-30 day'));
           
               
$updateroom="UPDATE rooms set status=0 where room_id in(select book_room.room_id from book_room where book_room.cout<='$yesterday')";
$resrooms=mysqli_query($conn,$updateroom);
 $q="select * from rooms where status=0";
       
             }  else{
                 
                  $q="select * from rooms where status=1";
        
             } 
                   $res=mysqli_query($conn,$q);
                    if(mysqli_num_rows($res)>0)
		    {
                       
                    while($row= mysqli_fetch_array($res))
                    {
                       
                       ?>
                 
                    <div class="col-md-4" >
                     <div class="card">
                         <img src="image/<?php echo $row['image']; ?>" class="img-circle" width="300px" height="300px"/>
                         <div class="card-body" >
                             
                             <h4 class="card-title" id="maintable"><?php echo $row['type']; ?></h4>
                             <p><i class="fui-star-2"></i><i class="fui-star-2"></i><i class="fui-star-2"></i><i class="fui-star-2"></i></p>
                             <p>Rs. <?php echo $row['price']; ?></p>
                            
                           <a href="view_room_details.php?room_id=<?php echo $row['room_id']; ?> & status=<?php echo $status; ?>" class="btn btn-inverse">View Detail</a>
                         <?php if($status==1){
                             $row['room_id']='';
                             
                         }else{
                             
                            
                         }?>    <a href="room_booking.php?room_id=<?php echo $room_id= $row['room_id'];?>" class="btn btn-inverse" >Book Now</a> &nbsp;
                            <br/><br/><hr/>
                         </div>
                     </div>
                 </div>
                    <?php  }}
			else
		       { ?>
                 <center><h5>No Rooms Available !!</h5></center>
                           
                        <?php 
		   }?>
                 
             </div>    
          <?php   }?>
                
         <div class="container py-5">
             <?php showdata($status);?>
           
            
         </div>
         
     
</body>
    <br/><br/><br/><br/>
</html>
