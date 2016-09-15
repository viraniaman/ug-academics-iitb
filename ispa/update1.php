<?php
session_start();
require_once("functions.php");
if (isset($_GET['logout'])){
session_destroy();
header("location : index.php");
}
if (isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(ldap_auth($username,$password)){
	$_SESSION['ldap_id']=$username;
		header("location: update1.php");
	}
	else {
		header("location: login.php?failed=true");
	}
}

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<title>ISPA | Home</title>
</head>
<body id="body1">

    <div class="container-fluid">
	      <div class="page-header">
		  <h1>ISPA</h1>
		  <span style="display:inline; margin-left:2%; font-size:200%;">Institute Summer Project Allocation</span>
		  </div>
         
         <div class="row-fluid"> 
         <div class="contentlogin">
		 
			 <fieldset>
				 
			 <form method="POST" action="login_review.php">
<center>
				 <table style="font-size:16px;margin-left:40px;">
		<tr>	<td>LDAP ID:</td> <td><input type='text' name='username'></td></tr>
<tr><td>Password: </td> <td><input type='password' name='password'></td></tr>
<tr><td><td><input type='submit' class="btn btn-primary btn-large" name='login' value='Login'></td></td></tr>
</table>

</center>
</form>
</fieldset>
		 </div>
		 </div>
		 
		</div>
		
    
</body>
</html>
