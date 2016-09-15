
<?php
session_start();
ob_start();

$dbhost='localhost';
$dbname = 'ugacademics';
$dbuser = 'ugacademics';
$dbpasswd = 'ug_acads';
$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());

if (isset($_POST['register']))
{
	$username = $_POST['LDAP_User'];
	$password = $_POST['LDAP_Pass'];
	$query = $_POST['Query_Msg'];
	$email = $_POST['LDAP_Email'];

	if(ldap_auth($username,$password))
	{
		$_SESSION['ldap_id']=$username;	
		$_SESSION['dept']=$department;		
		$_SESSION['query']=$query;
		$_SESSION['email']=$email;

		header("location: sss.php");
	}
	else
	{
		header("location: wrong.php");
	}
}

function ldap_auth($ldap_id, $ldap_password){
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
<title>S^3 / Grievance</title>
<style type="">
.query{
	position: relative;
	top: 170px;
width:60%;
height:100%;
left:30%;
border: px solid black;
padding-left: 20px;

}
.qq{
	height:100px;
	width: 45%;
}
</style>


</head>
<body>

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

<!--<div id='apply' style="font-size:16px;margin-left:240px;<strong>Last Date for Applying to ISPA is over"><strong>Last date for applying to ISPA is over.</strong></div>
		 </div>-->
	<div class="query">

<form action="grievance.php" method="post">
		<label for="LDAP_User">LDAP Username :  </label>
		<input name="LDAP_User" id="LDAP_User" type="text"></input>
			<br/>
	<label for="LDAP_User">LDAP Password : </label>
			<input name="LDAP_Pass" id="LDAP_Pass" type="password"></input>
			<br/>
			<label for="LDAP_User">Ur Email : </label>
			<input name="LDAP_Email" id="LDAP_Email" type="text"></input>
			<br/>
			<label for="LDAP_User">Your brief query : </label>
			<textarea class="qq" name="Query_Msg" id="Query_Msg" ></textarea>
			<br/>
<input type='submit' value='Register' class="btn btn-primary btn-large" name='register'>									</fieldset>
			</form>
		


	</div>


<div id="footer">                                                                     
&nbsp;
<p style="float:right;padding-right:50px;"><a href="https://www.facebook.com/shubham.bhartiya">Designed & Developed by SHUBHAM BHARTIYA</p> 


		
    </div>
</body>
</html>
