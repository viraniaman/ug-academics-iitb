<?php


header("location: https://gymkhana.iitb.ac.in/~ugacademics/sss2/tsc/index.php");

session_start();
require_once("functions.php");
if (isset($_SESSION['ldap_id'])){
	header("location: register.php");
}
if (isset($_GET['logout'])){
session_destroy();
header("location : index.php");
}
if (isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(ldap_auth($username,$password)){
	$_SESSION['ldap_id']=$username;		


	// if (!(is_registered($username))){
		header("location: register.php");
		
		//else{
		//	header("location: reregister.php");
		//}
	}
	else {
		header("location: login.php?failed=true");
	}
}

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<title>S^3 / LOGIN</title>



</head>
<body>
<div class="rrr">
<a href="home.php">
 <img src="images/sensual.png" alt="HTML tutorial" ></a></div>
  <a class="admin" href="admin.php">Admin Login</a>

</div>

<div class="left1">

      <ul>
      	<li><a href="home.php">Home</a></li>
        <li><a href="login.php">Tutorial Services Centre</a></li>
        <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/ug_acads/bookbay/">Book Bay</a></li>
        <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/ug_acads/courserank/">Course Rank</a></li>
        <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/wiki/index.php/Main_Page">UG Acads Wiki Page</a></li>
        <li><a href="grievance.php">Online Query and Grievance portal</a></li>
        <li><a href="http://gymkhana.iitb.ac.in/~smp/index.php">Institute Student Mentor Programme</a></li>
                <li><a href="admin.php">Admin Login</a></li>

      </ul>
  

	</div>
<div class="sub">
		 	<center><i><b><p style="font-size:25px;">APPLY</p></b></i></center>
<br>



			 <form method="POST" action="login.php">
				 <table style="font-size:16px;margin-left:20px;">
		<tr>	<td>LDAP ID:</td> <td><input type='text' name='username'></td></tr>
<tr><td>Password: </td> <td><input type='password' name='password'></td></tr>

<tr><td><td><input type='submit' class="btn btn-primary btn-large" name='login' value='Login'></td></td></tr>
</table>


</form>
		 </div>
		 <div class="right1">
		 	
<center><i><b><p style="font-size:25px;">Tutorial Services Centre:</p></b></i></center>
		 		The Tutorial Services Centre has been established to help the students cope up with courses and get a feel of what the subject is. This aims to help weak and backlogged students to complete their course work on time and have a smooth transit through out their academics. Our service is extended to all the students not only weak. Most of the students loose their focus on studies because they are unable to grasp the subject from class room and hence give up on learning deciding to take up non technical carriers and compromising on the quality of Indian education, this centre is specially designed for such people. The ultimate motive behind this tutorials is to divert students towards academics.<br>
		 		
		 </div>
		 <div id="footer">                                                                     
&nbsp;
<p style="float:right;padding-right:50px;"><a href="https://www.facebook.com/shubham.bhartiya">Designed & Developed by SHUBHAM BHARTIYA</a></p> 


		
    </div>
	
		
    
</body>
</html>
