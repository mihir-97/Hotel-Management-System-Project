<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <?php include("menu_header_logged.php"); ?>
<title>Feedback</title>


</head>
	
    
<body>
	
	
    <div class="container">
    	<div class="row-center">
        	<div class="col-md-3" style="height:800px">
                    <h4>Feedback Form</h4>
                    <hr/>
                    <form name="feedback" action="feedback_backend.php" method="post" >
    
                        
		Full Name : <input type="text" autocomplete="off" class="form-control input-md" name="fullname"   required=""/> <br />
     
        
       Contact Number : <input type="number" autocomplete="off" class="form-control input-md" name="contact" required=""/></span><br />
       
       Message : <input type="text" autocomplete="off" class="form-control input-md" name="msg"   required=""/> <br />
          <hr/>
          
          <input type="submit" class="btn btn-inverse" value="Submit" name="feedback" />
    
    </form>
    </div>
    
    </div>
    </div>
   <?php include("footer.php"); ?>
    
  </body>
</html>

