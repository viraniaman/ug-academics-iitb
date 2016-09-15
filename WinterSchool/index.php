<?php
session_start();
ob_start();
if (isset($_POST['sub'])){
	$username = $_POST['ldap'];
	$password = $_POST['passwd'];
	if(ldap_auth($username,$password))
	{
		$_SESSION['ldap']=$username;
		$_SESSION['ldap_pass'] = $password;
		header("Location: camps.php");
	}
	else {
		header("Location: index.php");
	}
}


function ldap_auth($ldap_id, $ldap_password){
	//return true;
	$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
	if($ldap_id=='') die("You have not entered any LDAP ID. Please go back and fill it up.");
	if($ldap_password=='') die("You have not entered any password. Please go back and fill it up.");
	$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_id)");
	$info = ldap_get_entries($ds, $sr);
	$ldap_id = $info[0]['dn'];
	if(@ldap_bind($ds,$ldap_id,$ldap_password)){
		return true;
	}
	else
	{
		return false;
	}
	
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title >Winter School</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="styles.css" rel="stylesheet" media="screen">
</head>

<body background='inback.jpg' style="font-family:'Marcellus',serif;">

<div style="width:100%;margin-top:28px;opacity:0.8; background-color:black;color:white;border-radius:20px;">
	<center>
		<table cellpadding="10">
		<tr>
		<td>	<img src='iitb_logo.png' style="height:90px"> </td>
		<td>	<p style="color:white;font-size:45px;font-variant:small-caps;">IIT Bombay Winter School</p> </td>
		</tr>
		</table>
	</center>
</div>
<center>
<div style="width:500px;margin-top:40px;opacity:0.8;background-color:black;font-size:20px;padding:20px;border-radius:10px;box-shadow:8px 8px 8px;">
	<form action="index.php" method="POST">
	<fieldset>
		<legend><p style='color:white;font-size:23px'>Login</p></legend>
		<table cellpadding="10" style='color:white;font-size:20px'>
			<tr>
				<td>LDAP ID</td>
				<td><input type="text" class="form-control" name="ldap" placeholder="Enter LDAP ID"></td>
			</tr>			
			<tr>
				<td>Password</td>
				<td><input type="password" class="form-control" name='passwd' placeholder="Enter Password"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input class="btn btn-success" style="font-size:17px" type="submit" name="sub" value="Submit"/></td>
			</tr>
		</table>
  	</fieldset>
	</form>
</div>
</center>
</body>
</html>
