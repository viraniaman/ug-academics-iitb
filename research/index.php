<?php
session_start();
function ldap_auth($ldap_id,$ldap_password){
	$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
	if($ldap_id=='') die("You have not entered any LDAP ID. Please go back and fill it up.");
	$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_id)");
	$info = ldap_get_entries($ds, $sr);
	$ldap_id = $info[0]['dn'];
	if(@ldap_bind($ds,$ldap_id,$ldap_password)){
		return true;
	}
	else{ return false;}
}
if (isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(ldap_auth($username,$password)){
	$_SESSION['ldap_id']=$username;		
	header("location: input.php");
	}
	else {
		header("location: index.php?failed=true");
	}
}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
p{display: inline}
</style>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
</head>
<body>
<br><br><br>			 		 			 		 
	<div  style=" width:600px; height:150px; background-color:Black; margin:0px auto;"><br>	<br>			 		 			 		 
		 	<center><b><p style="font-size:50px; color:White">RESEAR</p><p style="font-size:70px; color:White">CH</p></b></center>
		 	<img style="position:absolute; left:53%; top:8%; " src="glass.png" width="300px" height="385px"><br>
			 <form method="POST" action="index.php">
			 	<center><br><br><br><br>			 
				<table style="font-size:16px;margin-left:20px;">
				<tr><td>LDAP ID:</td> <td><input type='text' name='username'></td></tr>
				<tr><td>Password: </td> <td><input type='password' name='password'></td></tr>
				<tr><td><td><input type='submit'  name='login' class='btn btn-success' value='Submit'></td></td></tr>
				</table>
			</form>
	</div>
	<div style="position:absolute; bottom:0px; height:20px; width:100%; background-color:black;">
<footer style="text-align:right;margin-right:2%"><font color='white'>&copy;Web Team UG Academic Council. Designed by <a href="https://www.facebook.com/deependra.patel.79">Deependra Patel</a></font></footer>
</div>
</body>
</html>
