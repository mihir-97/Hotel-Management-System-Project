<!--<div class="row navbar-bottom" style="background-color:#E4E4E4;padding:10px;">
<div class="row text-center">
		<div class="col-md-12 col-sm-12 text-center">
			
			<p align="center" style="font-family:myLato; font-size:15px;">&copy; 2020 Design by Alfiya Vohra</p>
                    <h9>&copy; 2020 Design by Alfiya Vohra</h9>
		</div>
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>-->
<html>
    
    <body>
        <div id="content">
<footer class="footer-box">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <div class="margin-bottom_30">
                            <center> <h2 style="color: #000000">Contact us</h2></center>
                        </div>
                     </div>
                  </div>
               </div>
                <?php  
                    include("connect.php");
           
                    $q="select * from contact";
                    $result=mysqli_query($conn,$q);
                    $row=mysqli_fetch_assoc($result);					
		?>
               <div class="row">
                  
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="full footer_blog f_icon_1">
                         <p style="color: #000000">Hotel<br><small><?php echo $row['hotelname']; ?></small></p>
                     </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="full footer_blog f_icon_2">
                        <p style="color: #000000">Address<br><small><?php echo $row['address']; ?></small></p>
                     </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="full footer_blog f_icon_3">
                         <p style="color: #000000">Phone<br><small>+91 <?php echo $row['contactno']; ?><br>Monday - Sunday<br>08:00 am - 05:00 pm</small></p>
                     </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="full footer_blog_last">
                         <p style="color: #000000">Email<br><small><?php echo $row['email']; ?><br>24 X 7 online support</small></p>
                     </div>
                  </div>

               </div>
                <br/>
                <div class="col-12">
                    <center> <p style="color: #000000">© Copyrights 2020 design by Alfiya Vohra</p></center>
                  </div>
            </div>
         </footer>
         
         
         </div>
    </body>
</html>
