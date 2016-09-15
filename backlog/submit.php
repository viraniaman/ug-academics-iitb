<?php
session_start();
if(!isset($_SESSION['ldap']))
header('location: index.php');
ob_start();
include '../ispa/connect.php';
$db = mysql_connect($dbhost, $dbuser, $dbpasswd);
mysql_select_db($dbname);

$done = false;
if (isset($_POST['rno']) && isset($_POST['name'])){
	$name = $_POST['name'];
	$rno = $_POST['rno'];
	$dept = $_POST['dept'];
	$year = $_POST['year'];
	$code[0] = $_POST['code1'];
	$code[1] = $_POST['code2'];
	$code[2] = $_POST['code3'];
	$code[3] = $_POST['code4'];
	$code[4] = $_POST['code5'];

	$ldap = mysql_real_escape_string($_SESSION['ldap']);
	$rno = mysql_real_escape_string($rno);
	$dept = mysql_real_escape_string($dept);
	$name = mysql_real_escape_string($name);
	$year = mysql_real_escape_string($year);

	mysql_query("DELETE FROM backlogs where ldap = '$ldap'");
	for ($i=0; $i < 5; $i++) { 
		insert($code[$i], $name, $rno, $dept, $ldap, $year);
	}
	$done = true;
}
function insert($cid, $name, $rno, $dept, $ldap, $year){
	if(!is_null($cid) && $cid!=""){
		$cid = mysql_real_escape_string($cid);
		mysql_query("INSERT INTO backlogs(ldap, rno, name, year, dept, course) VALUES ('$ldap', '$rno', '$name', '$year', '$dept', '$cid')");
	}
}

?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title>Backlog Courses Feedback</title>
<meta http-equiv = "cache-control" content="no-cache">
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href="dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="dist/css/bootstrap.css" rel="stylesheet" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<style type="text/css">
a {
	color: white;
	text-decoration: none;
}
.btn{
	padding: 10px;
}
</style>


</head>

<body style="font-family:'Marcellus',serif;font-size:20px;background-color:rgba(173, 160, 173, 0.12);">
<div style="width:100%;background-color:#696969;color:white;">
	<center>
		<table cellpadding="10">
		<tr>
		<td>	<img src='iitb_logo.png' style="height:90px"> </td>
		<td>	<p style="color:white;font-size:45px;font-variant:small-caps;">BackLog Courses Feedback</p> </td>
		</tr>
		</table>
	</center>
</div>
	<center>
		<?php if($done){?>
			Your response has been recorded.
					<br><button class="btn btn-primary" onclick="location.href='./logout.php'">Logout</button>
		<?php } else {?>
			Some error occured. Please fill again.
					<br><button class="btn btn-primary" onclick="location.href='./form.php'">Back</button>
		<?php }?>

	</center>
</body>
</html>
