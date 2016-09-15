<?php
session_start();
ob_start();
if (isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(ldap_auth($username,$password))
	{
		$_SESSION['ldap_id']=$username;
		$_SESSION['passwd']=$password;
		header("location: student.php");
	}
	else {
		header("location index.php?failed=true");
	}
}


function ldap_auth($ldap_id, $ldap_password){
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<link href="css/ticker-style.css" rel="stylesheet" type="text/css" />
<title>Query and Grievance Portal</title>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.ticker.js" type="text/javascript"></script>
	<script type="text/javascript">
	$( function() {
		$('#js-news').ticker();
		$('#js-news2').ticker({controls:false});
	} );

	</script>
	<style type="text/css">
	#deptcount tr {
		border:1px solid black;
	}
	#deptcount td {
		text-align:center;
	}
	</style>
</head>
<body id="body1" style="margin-bottom:30px;">

    <div class="container-fluid">
	      <div class="page-header">
		  <h1>Q and G Portal</h1>
		  <span style="display:inline; margin-left:2%; font-size:200%;">Query and Grievance Portal</span>
		  </div>
		  <ul class="nav nav-pills">
		  <li class="active"><a href="">Home</a></li>
		  <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/">UG Academics</a></li>
		  <li><a href="../career">Career Cell</a></li>
		  <li><a href="../ug_acads/surp">SURP</a></li>
		  <li><a href="http://gymkhana.iitb.ac.in/~researchbook/">Research Book</a></li>
		  <li><a href="../ug_acads/bookbay">Bookbay</a></li>
		  <li><a href="admin_login.php">Admin login</a></li>
		  </ul>

      
		  

         
         <div class="row-fluid"> 
	         <div class="span12">
			   
			    <form method="POST" action="index.php">
					<center>
					 	<table cellpadding="3" style="margin:25px;font-size:16px;">
							<tr><td>LDAP ID</td><td><input type='text' name='username'></td></tr>
							<tr><td>Password</td><td><input type='password' name='password'></td></tr>
							<tr><td align="center" colspan="2"><input type='submit' class="btn btn-primary btn-large" name='login' value='Login'></td></tr>
						</table>
					</center>
				</form>

			 </div>
		</div>

		<div class="row-fluid" style="margin-top:10px;">
			<div class="span12">

				<ul id="js-news" class="js-hidden">
					<?php
						$dbhost='localhost';
						$dbname = 'ugacademics';
						$dbuser = 'ugacademics';
						$dbpasswd = 'ug_acads';
						$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
						mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());
							$query="SELECT * FROM mailing WHERE replied='y'";
							$results=mysql_query($query);
							while($row=mysql_fetch_assoc($results))
							{
								
								$question=$row['query'];
								$reply=$row['query_reply'];
								echo "<li class=\"news-item\">";
								echo "<table cellpadding=\"10\">";		
							   	echo "<tr>	<td>Query</td>	<td>:</td>	<td style=\"width:600px;height:70px;\">".$question."</td>	</tr>";
							    echo "<tr>	<td>Reply</td>	<td>:</td>  <td style=\"width:600px;height:70px\";>".$reply."</td>	</tr>";
								echo "</table></li>";
							}
					?>
			
		  		</ul>
			</div>
<!-- 
				<div class="span3 offset9" style="overflow:hidden;">
				<ul id="js-news2" class="js-hidden"> -->
				<?php
					// $categories=array('Research & Innovation','Career Cell', 'Student Support Services', 'Aerospace Engineering', 'Engineering Physics', 'Computer Science and Engineering', 'Chemistry', 'Chemical Engineering', 'Civil Engineering', 'Electrical Engineering', 'Energy Science and Engineering', 'Mechanical Engineering', 'Metallurgical Engineering and Material Sciences', 'General');
					// $dbhost='localhost';
					// $dbname = 'ugacademics';
					// $dbuser = 'ugacademics';
					// $dbpasswd = 'ug_acads';
					// $link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
					// mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());
					
					// for ($i=0; $i < count($categories); $i++) { 
					// 	$query1="SELECT COUNT(*) FROM mailing WHERE department='".$categories[$i]."';";
					// 	$results=mysql_query($query1);
					// 	$row1=mysql_fetch_assoc($results);
					// 	$query2="SELECT COUNT(*) FROM mailing WHERE department='".$categories[$i]."'and replied='y';";
					// 	$results=mysql_query($query2);
					// 	$row2=mysql_fetch_assoc($results);
					// 	echo "<li><table style=\"width:190px;margin-top:60px\" id=\"deptcount\" cellpadding=\"2\"><tr><td colspan=\"3\"><b>".$categories[$i]."</b></td></tr>";
					// 	echo "<tr><td>Queries Received</td><td>:</td><td><b>".$row1['COUNT(*)']."</b></td></tr>";
					// 	echo "<tr><td>Queries Answered</td><td>:</td><td><b>".$row2['COUNT(*)']."</b></td></tr></table></li>";
					// }
					
				?>
<!-- 				</ul>
				</div> -->
		</div>
		 </div>
   
</body>
</html>
