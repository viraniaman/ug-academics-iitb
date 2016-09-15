<?php


     
session_start();

// username and password
$anvandarID = "ss";
$losenord = "12345";

if (isset($_POST["user"]) && isset($_POST["pass"])) { 

    if ($_POST["user"] === $anvandarID && $_POST["pass"] === $losenord) { 
    
    $_SESSION["inloggning"] = true; 

    header("Location: subjects.php"); 
        } 
            }

?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>S^3 / ADMIN</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="style.css" />
 <link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.18.custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.multiselect.css" />
 	<!--<link rel="stylesheet" type="text/css" media="screen" href="js/jquery-ui.css" />-->
    <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />

</head>

</body>
<div class="rrr">
<a href="home.php">
 <img src="images/sensual.png" alt="HTML tutorial" ></a></div>

<div class="left1">

      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="login.php">Tutorial Services Centre</a></li>
        <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/ug_acads/bookbay/">Book Bay</a></li>
        <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/ug_acads/courserank/">Course Rank</a></li>
        <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/wiki/index.php/Main_Page">UG Acads Wiki Page</a></li>
        <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/qng.php">Online Query and Grievance portal</a></li>
        <li><a href="http://gymkhana.iitb.ac.in/~smp/index.php">Institute Student Mentor Programme</a></li>
      </ul>
  
	</div>
<div class="reg">        
		<form method="POST" action="admin.php">
				 <table style="font-size:16px;margin-left:20px;">
		<tr>	<td>USER :</td> <td><input type='text' name='user'></td></tr>
<tr><td>PASS : </td> <td><input type='password' name='pass'></td></tr>

<tr><td><td><input type='submit' class="btn btn-primary btn-large" name='login' value='Login'></td></td></tr>
</table>


</form>
		 </div>';
         

<div id="footer">                                                                     
&nbsp;
<p style="float:right;padding-right:50px;"><a href="https://www.facebook.com/shubham.bhartiya">Designed & Developed by SHUBHAM BHARTIYA</p> 


        
    </div>




</body>
</html>
