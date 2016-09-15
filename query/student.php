<?php
session_start();

if (!(isset($_SESSION['ldap_id']))){
header("location: index.php");
}

require_once('database.php');
$categories = array (
	'Research & Innovation' => array ('sunnysoniab@gmail.com', 'imraghavdaga@gmail.com', 'abhishekkhadiya@gmail.com', 'ritwickchaudhry@gmail.com', 'tripathi.anay@gmail.com','viraniaman@gmail.com'),
	'Career Cell' => array ('sunnysoniab@gmail.com', 'imraghavdaga@gmail.com', 'abhishekkhadiya@gmail.com', 'ritwickchaudhry@gmail.com', 'tripathi.anay@gmail.com','viraniaman@gmail.com'),
	'Student Support Services' => array ('sunnysoniab@gmail.com', 'imraghavdaga@gmail.com', 'abhishekkhadiya@gmail.com', 'ritwickchaudhry@gmail.com', 'tripathi.anay@gmail.com','viraniaman@gmail.com'),
	'Aerospace Engineering' => array ('yrajsm@gmail.com', 'abhishekkhadiya@gmail.com'),
	'Engineering Physics' => array ('gsec.phy.iitb@gmail.com', 'darshildave94@gmail.com', 'abhishekkhadiya@gmail.com'),
	'Computer Science and Engineering' => array ('aditykusupati2@gmail.com', 'dgsec@cse.iitb.ac.in', 'abhishekkhadiya@gmail.com'),
	'Chemistry' => array ('gsoni.iitb@gmai.com', 'abhishekkhadiya@gmail.com'),
	'Chemical Engineering' => array ('jindal.shivam05@gmail.com', 'abhishekkhadiya@gmail.com'),
	'Civil Engineering' => array ('vijaycp4@gmail.com', 'abhishekkhadiya@gmail.com'),
	'Electrical Engineering' => array ('kanishk9khandelwal@gmail.com', 'abhishekkhadiya@gmail.com'),
	'Energy Science and Engineering' => array ('saikrishnareddy1921996@gmail.com', 'abhishekkhadiya@gmail.com'),
	'Mechanical Engineering' => array ('ramkrishna0226@gmail.com', 'abhishekkhadiya@gmail.com'),
	'Metallurgical Engineering and Material Sciences' => array ('vermapallavi1709@gmail.com', 'abhishekkhadiya@gmail.com'),
	'General' => array ('sunnysoniab@gmail.com', 'imraghavdaga@gmail.com', 'abhishekkhadiya@gmail.com', 'ritwickchaudhry@gmail.com', 'tripathi.anay@gmail.com','viraniaman@gmail.com'),
);

$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());

if (isset($_POST['submit']))
{		
		$username=$_SESSION['ldap_id'];
		$department = $_POST['req'];
		$mail_list=$categories[$department];
		$query = $_POST['Query_Msg'];
		$_SESSION['dept']=$mail_list;
		$_SESSION['query']=$query;
		$_SESSION['category']=$department;
		$date = date ('Ymd');
		$query = "INSERT INTO mailing (name,department,query,replied,query_date,query_reply) VALUES ('$username','$department','$query','n',$date,'')";
		$result= mysql_query($query);
		header("location: mail.php");
}

if(isset($_POST["logout"]))
{	
	session_destroy();
	header("location: index.php");
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
<script type="text/javascript">
function check() {
	var q = document.getElementsByName("Query_Msg")[0].value;
	var flag = true;
	if (q == "") {
		alert("Query cannot be empty.");
		flag = false;
	};
	return flag;
}
</script>
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
  		  <li><a href="admin_login.php">Admin login</a></li>

		  </ul>
		 <div class="row-fluid"> 
         <div class="contentcontacts">
		 <p style="font-size:30px; color:#0088cc ;line-height:24px; padding:14px; margin-left:250px">
		 <form action="student.php" method="POST">
		 <input type='submit' style="margin-left:900px" class="btn btn-primary btn-large" name='logout' value='Logout'>
		 </form>
		 <br>
			<form action="student.php" style="font-size:20px;color:#0088cc; margin-left:25px" method="POST" onsubmit="return check()">
					<table cellpadding="10"><tr><td>						
					Request Type</td><td>: </td><td>
					<select name="req">
						<option value="Research & Innovation">Research & Innovation</option>
						<option value="Career Cell">Career Cell</option>
						<option value="Student Support Services">Student Support Services</option>
						<option value="Aerospace Engineering">Aerospace Engineering</option>
						<option value="Engineering Physics">Engineering Physics</option>
						<option value="Computer Science and Engineering">Computer Science and Engineering</option>
						<option value="Chemistry">Chemistry</option>
						<option value="Chemical Engineering">Chemical Engineering</option>
						<option value="Civil Engineering">Civil Engineering</option>
						<option value="Electrical Engineering">Electrical Engineering</option>
						<option value="Energy Science and Engineering">Energy Science and Engineering</option>
						<option value="Mechanical Engineering">Mechanical Engineering</option>
						<option value="Metallurgical Engineering and Material Sciences">Metallurgical Engineering and Material Sciences</option>
						<option value="General">General</option>
					</select></td></tr>
					<tr><td>	
					Your Query</td><td>: </td><td>
					<textarea maxlength="300" style="resize:none;width:600px;height:70px;" name="Query_Msg" id="Query_Msg" 	 
					placeholder = "Enter your query here (300 characters)"></textarea>
					</td></tr><tr><td></td><td></td><td>
			   <input type='submit' style="margin-left:200px"class="btn btn-primary btn-large" name='submit' value='Submit'></td></tr>
			</table>
			</form>
		 </p>
		 </div>
		</div>
    
</body>
</html>

