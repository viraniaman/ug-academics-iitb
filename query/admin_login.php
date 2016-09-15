<?php
session_start();

require_once('database.php');

$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());

if (isset($_POST["login"])) { 
$username = $_POST['username'];
$password = $_POST['password'];
$authorised_array = array ("aastha","130110003","131030001","130050009","12d100010","140020094","tripathi.anay");

	if (ldap_auth($username, $password))
	{
		if (in_array ($username, $authorised_array))
		{
			$_SESSION["ldap_admin"]=$username;
			$_SESSION["passwd"]=$password;
			if($username=="gsecaaug" || $username=="")
			header ("location: super_admin.php");
			else
			header ("location: admin.php");
		}
	}
}

function ldap_auth($ldap_id, $ldap_password){
	//return true;
	$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
	if($ldap_id=='') die("You have not entered any LDAP ID. Please go back and fill it up.");
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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<title>Query and Grievance Portal</title>
</head>
<body id="body1">

    <div class="container-fluid">
	      <div class="page-header">
		  <h1>Q and G Portal</h1>
		  <span style="display:inline; margin-left:2%; font-size:200%;">Query and Grievance Portal</span>
		  </div>
		  <ul class="nav nav-pills">
		  <li><a href="index.php">Home</a></li>
		  <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/">UG Academics</a></li>
		  <li><a href="../career">Career Cell</a></li>
		  <li><a href="../ug_acads/surp">SURP</a></li>
		  <li><a href="http://gymkhana.iitb.ac.in/~researchbook/">Research Book</a></li>
		  <li><a href="../ug_acads/bookbay">Bookbay</a></li>
		  <li class = "active"><a href="admin_login.php">Admin login</a></li>
		  </ul>

         
         <div class="row-fluid"> 
         <div class="contentlogin">
		 
			 <fieldset>
				 
			 <form method="POST" action="admin_login.php">
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
