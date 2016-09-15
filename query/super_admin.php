<?php

$dbhost='10.105.177.5';
$dbname = 'ugacademics';
$dbuser = 'ugacademics';
$dbpasswd = 'ug_acads';
session_start();

if (!(isset($_SESSION['ldap_admin']))){
header("location: index.php");
}

ob_start();

$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());

if(isset($_POST["submit".$_POST['ID']]))
{	
	$_SESSION['recipient'] = $_POST['gpoid'];
	$_SESSION['reply'] = $_POST["reply".$_POST['ID']];
	mysql_query("UPDATE mailing SET query_reply = '".$_SESSION['reply']."', replied = 'y' WHERE id='".$_POST['ID']."';");
	header("location: mail_reply.php");
}

if(isset($_POST["submit1"]))
{	
	$new_dept=$_POST['new_dept'];
	mysql_query("UPDATE mailing SET department='$new_dept' WHERE id='".$_POST['id']."';");
	$result=mysql_query("SELECT * FROM mailing WHERE id=' ".$_POST['id']. " ' ");
	$row=mysql_fetch_assoc($result);
	$name=$row['name'];
	$query=$row['query'];

	$categories = array (
	'Research & Innovation' => array ('kev.iitb@gmail.com', 'rahulshenoy77@gmail.com', 'nair.vishnu.1993@gmail.com', 'dhanasree218@gmail.com'),
	'Career Cell' => array ('kev.iitb@gmail.com', 'rahulshenoy77@gmail.com', 'nair.vishnu.1993@gmail.com', 'dhanasree218@gmail.com'),
	'Student Support Services' => array ('kev.iitb@gmail.com', 'rahulshenoy77@gmail.com', 'nair.vishnu.1993@gmail.com', 'dhanasree218@gmail.com'),
	'Aerospace Engineering' => array ('kshitiz.swaroop@gmail.com', 'nishantkhanduja@gmail.com'),
	'Engineering Physics' => array ('kk1311@gmail.com'),
	'Computer Science and Engineering' => array ('umang.sunilmathur@gmail.com', 'nivvedan@gmail.com', 'kanishk41092@gmail.com'),
	'Chemistry' => array ('ashu5193@gmail.com'),
	'Chemical Engineering' => array ('anishgupta.iitb@gmail.com', 'vibsj92@gmail.com', 'himanshu.malhotra1990@gmail.com'),
	'Civil Engineering' => array ('saurav.jain003@gmail.com', 'venksmart22@gmail.com', 'saubhagya.s.rathore@gmail.com'),
	'Electrical Engineering' => array ('sudiptomondal.iitb@gmail.com', 'akshay3698@gmail.com'),
	'Energy Science and Engineering' => array ('jhaveri.aakash@gmail.com'),
	'Mechanical Engineering' => array ('ankit.rana.90@gmail.com', 'vallari.gore91@gmail.com'),
	'Metallurgical Engineering and Material Sciences' => array ('yash08sheth@gmail.com', 'atul.1104@gmail.com'),
	'General' => array ('kev.iitb@gmail.com', 'rahulshenoy77@gmail.com', 'nair.vishnu.1993@gmail.com', 'dhanasree218@gmail.com', 'pratyushnalam@outlook.com'),
);



require_once 'swift/lib/swift_required.php';

date_default_timezone_set ('Asia/Kolkata'); // Optional
$from = $name . '@iitb.ac.in';

$message = Swift_Message::newInstance()
-> setSubject ('A student has a query')
-> setFrom (array ($from))
-> setTo ($categories[$new_dept])
-> setBody ("From: " . $name . "@iitb.ac.in\nDepartment: " . $new_dept . "\nQuery: " . $query);
$transport = Swift_SmtpTransport::newInstance('smtp-auth.iitb.ac.in', 25, 'tls')
->setUsername('pratyushnalam')
->setPassword('rpn$2013');

$mailer = Swift_Mailer::newInstance($transport);

$result = $mailer->send($message);
header("location: super_admin.php");
}

if(isset($_POST["logout"]))
{	
	session_destroy();
	header("location: index.php");
}



?>

<html>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<head><title>Query and Grievance Portal</title>
<script type="text/javascript">
function check(j) {
	var k = "reply"+j;
	var rep = document.getElementsByName(k)[0].value;
	var flag = true;
	if (rep == "") {
		alert("Reply cannot be empty.");
		flag = false;
	};
	return flag;
}
</script>
</head>
<body>
<body id="body1">

    <div class="container-fluid">
	      <div class="page-header">
		  <h1>Q and G Portal</h1>
		  <span style="display:inline; margin-left:2%; font-size:200%;">Query and Grievance Portal</span>
		  </div>
		  <ul class="nav nav-pills">
		  <li><a href="index.php">Home</a></li>		  
		  <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/">UG Academics</a></li>
		  <li><a href="../career.php">Career Cell</a></li>
		  <li><a href="../ug_acads/ispa">ISPA</a></li>
		  <li><a href="http://gymkhana.iitb.ac.in/~researchbook/">Research Book</a></li>
		  <li><a href="../ug_acads/bookbay">Bookbay</a></li>
		  <li class = "active"><a href = "">Logged in</a></li>

		  </ul>


		 <div class="row-fluid"> 
         <div class="contentcontacts">
		 <form method='post' action='admin.php'>
		 <input type='submit' style="margin-left:900px" class="btn btn-primary btn-large" name='logout' value='Logout'>
		 </form>
		 <br><br>
<table align="center" cellpadding="5" border="2" width="950px">
<tr><th>LDAP ID</th><th>Department</th><th>Query</th></tr>

<?php
		$db=mysql_connect("10.105.177.5","$dbuser","$dbpasswd");
		mysql_select_db("$dbname");
		$query="SELECT * FROM mailing WHERE replied='n' ORDER BY 'department'";
		$results1=mysql_query($query);
		while($row = mysql_fetch_assoc($results1)){
			$id=$row['id'];
			$name=$row['name'];
			$department=$row['department'];
			$query=$row['query'];
			$querydate=substr($row['query_date'], 8);
			$currdate = date ('d');
			$diffdays = $currdate - $querydate;
			if ($diffdays < 0) {
				$diffdays = $diffdays + 30;
			}
			$temp = "";
			if ($diffdays >= 2) {
				$temp = "background-color:#FF6347;"; 
			} 
			echo "<tr style=\"".$temp."\"><td>$name</td><td>$department <br><br>Change to:<form action='super_admin.php'
				method='POST'>
				<select name='new_dept'>
						<option value='Research & Innovation'>Research & Innovation</option>
						<option value='Career Cell'>Career Cell</option>
						<option value='Student Support Services'>Student Support Services</option>
						<option value='Aerospace Engineerin'>Aerospace Engineering</option>
						<option value='Engineering Physics'>Engineering Physics</option>
						<option value='Computer Science and Engineering'>Computer Science and Engineering</option>
						<option value='Chemistry'>Chemistry</option>
						<option value='Chemical Engineering'>Chemical Engineering</option>
						<option value='Civil Engineering'>Civil Engineering</option>
						<option value'Electrical Engineering'>Electrical Engineering</option>
						<option value='Energy Science and Engineering'>Energy Science and Engineering</option>
						<option value='Mechanical Engineering'>Mechanical Engineering</option>
						<option value='Metallurgical Engineering and Material Sciences'>Metallurgical Engineering and Material Sciences</option>
						<option value='Inter Departmental (OPEN TO ALL)'>Inter Departmental (OPEN TO ALL)</option>
					</select>
				<input style=\"visibility:hidden;\" type='text' name='id' value='".$id."'>
				<input type='submit' name='submit1' value=\"Submit\"></form></td><td>$query
				
				<form action='super_admin.php' method='POST' onsubmit=\"return check(".$id.")\">
				<input style=\"visibility:hidden;\" type='text' name='gpoid' value='".$name."'>
				<input style=\"visibility:hidden;\" type='text' name='ID' value='".$id."'>
				<textarea maxlength=\"300\" style=\"resize:none;width:600px;height:70px;\" type='text' name='reply".$id."'></textarea>
				&nbsp;&nbsp;<input name='submit".$id."' type='submit' value='Submit'></form>
				</td></tr>";
		}
?>
</table>
</p>
</div>
</body>
</html>
