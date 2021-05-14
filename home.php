<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href="css/chocolat.css" rel="stylesheet" type="text/css"/>
        
        <?php include("menu_header_logged.php"); ?>
        
        <script src="js/jquery.js" type="text/javascript"></script>
           
<script type="text/javascript">
function check() {
  //   window.location.reload(true);
  alert("changed");
     document.getElementById('first').value="changed";
     
    header('Location: home.php?view=list');
};
</script>
    
</head>
	
    
<body>
     
    <h4 class="fui-user">Welcome <?php echo $_SESSION['user_logged']; ?> !!</h4>
              <?php 
                if(isset($_GET['status'])){
                       
                    $status=$_GET['status'];
                   ?>      <a class="btn btn-info" href="home.php">Back To Home Page </a> 
                  <?php
                    }
                    else {
                        
                        $status=0;
                     ?>   
                        <a class="btn btn-info" href="home.php?status=1">Click Here To View  Booked Rooms </a> 
                    <?php      
}
              ?>      
                          
        <hr/>
        <center><h5>Rooms And Rates</h5></center>
      <center><h6>Book Your Rooms As Your Choice.</h6></center>
      <hr/> 
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for types.." title="Type in a type"/>
<div class="container py-5">
             <div class="row mt-4">
<?php
        
                    include("connect.php");
               
                     $user= $_SESSION['user_logged'];
                  
                    
        
        if(!$user){
            
            header("Location:UserNotFound.php");
           
        }
       
            
             if($status==0) {
                 


                 $d=strtotime("yesterday");
                 $yesterday= date('Y-m-d', $d);            
$today= date('Y-m-d');
$d=strtotime("-1 months");
$onemonthago= date('Y-m-d',$d);
                $updatedate="select * from rooms where cout=$yesterday";
              
               
// $updateroom="UPDATE rooms set status=0 where room_id in(select book_room.room_id from book_room where book_room.cout <='$yesterday')";
//
$updateroom="UPDATE rooms set status=0 where room_id in(select book_room.room_id from book_room where book_room.cout<='$today' ||  cin>='$today')";
$resrooms=mysqli_query($conn,$updateroom);
$updateroom2="UPDATE rooms set status=1 where room_id in(select book_room.room_id from book_room where book_room.cout>='$today' and  cin<='$today')";
$resrooms2=mysqli_query($conn,$updateroom2);
 $q="select * from rooms where status=0";
       
             }  else{
                 
                  $q="select * from rooms where status=1";
        
             } 
                   $res=mysqli_query($conn,$q);
                    if(mysqli_num_rows($res)>0)
		    {
                     $new_row=0;
                    while($row= mysqli_fetch_array($res))
                    {
                       
                       ?>

                        <?php
                        {
				if($new_row==3)
				{
                                    ?>
					<div class="row mt-4">
					<?php $new_row=0;
                                        ?>
					</div>
                                        
				<?php } ?>
				<div class="col-md-3 table-condensed" style="padding:40px;" id="maindiv">
				
			
				
				<table id="myTable">
                                    
<!--                                   		 <tr>
                                        <td><?php echo $row['type']; ?></td>
                                    </tr>	-->
                                    <tr>
                                                    <td><img src="image/<?php echo $row['image']; ?>" class="img-circle" width="300px" height="300px"/></td>
                                                </tr>
                                    <tr><td><h4 class="card-title"> <center><?php echo $row['type']; ?></center></h4></td></tr>
                                    <tr><td><p><center><i class="fui-star-2"></i><i class="fui-star-2"></i><i class="fui-star-2"></i><i class="fui-star-2"></i></center></p></td></tr>
                                    <tr><td><p><center> Rs. <?php echo $row['price']; ?></center></p></td></tr>
                                    <tr> <td><center> <a href="view_room_details.php?room_id=<?php echo $row['room_id']; ?> & status=<?php echo $status; ?>" class="btn btn-inverse">View Detail</a>
                                                     
                         <?php if($status==1){
                             $row['room_id']='';
                             
                         }else{
                             
                            
                         }?>    <a href="room_booking.php?room_id=<?php echo $room_id= $row['room_id'];?>" class="btn btn-inverse" >Book Now</a></center></td></tr>   
				</table>
			
				</div>
                    	
				<div class="col-md-1">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<span><h3>&nbsp;</h3></span>
				</div>
				<?php
				$new_row++;
			}?>
                    <?php  }}
			else
		       { ?>
                                     <center><h5>No Rooms Available !!</h5></center>
                           
                        <?php 
		   }?>
		
             </div>
</div>
	<script>
function myFunction() {
  var input,div2, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  div2 = document.getElementById("maindiv");
  filter = input.value.toUpperCase();
  table = div2.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
 
  for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>  
       
</body>
    <?php include("./footer.php"); ?>
</html>
    