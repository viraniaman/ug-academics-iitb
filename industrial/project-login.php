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
		header("location: projects.php");
	}
	else {
		header("location: login.php?failed=true");
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>Industrial Projects</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
	<div id="header" class="container">
		<div id="logo">
			<image src="EnPower.png" style="height:70px; margin-top:10px"></image>
			<a style="color:white; font-size:20px">Industry Defined Projects</a>
		</div>
		<div id="menu">
			<ul>
				<li ><a href="index.html">Home</a></li>
				<li class="current_page_item"><a href="projects.php">Projects</a></li>
				<li><a href="apply.php">Apply</a></li>
				<li><a href="contacts.php">Contact</a></li>
			</ul>
		</div>

	
</div>
<div id="wrapper">
	
	<div id="page" class="container">
		<div id="content">
			<div class="post">
				<h2 class="title"><a href="#">Please Log-in </a></h2>
				<div class="entry">
					<form method="POST" action="project-login.php">
				 <table style="font-size:16px;margin-left:20px;">
		<tr>	<td>LDAP ID:</td> <td><input type='text' name='username'></td></tr>
<tr><td>Password: </td> <td><input type='password' name='password'></td></tr>

<tr><td><td><input type='submit' class="btn btn-primary btn-large" name='login' value='Login'></td></td></tr>
</table>


</form></div>
			</div>
	</div>
	<!-- end #page --> 
</div></div>

<div id="footer">
	<p>&#169; Undergraduate Academic Council, IIT Bombay</p>
</div>
<!-- end #footer -->
</body>
</html>
