<!DOCTYPE HTML>
<html>
<head>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
</head>
<body>
<?php
function appendtd($x){
	return "<td>".$x."</td>";
}
//error_reporting(E_ALL);
require "../connect.php";
$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());
$course=$_GET['course'];
$results=mysql_query("select ldap from nonTechData where course='$course'");
$total=mysql_num_rows($results);
echo "<table class='table table-striped table-bordered'><tr><td>Name</td><td>Add</td><td>Mob.</td><td>Email</td></tr>";
echo "<tr><td>Total </td><td>".$total."</td></tr>";
while($row=mysql_fetch_assoc($results)){
	$ldap=$row['ldap'];
	$details=mysql_query("select* from registered_students_for_summer where ldap_id='$ldap'");
	$detail=mysql_fetch_assoc($details); 
	$name=$detail['name'];
	$hostelroom=$detail['hostelroom'];
	$phone=$detail['phone'];
	$email=$detail['email'];
	echo "<tr>".appendtd($name).appendtd($hostelroom).appendtd($phone).appendtd($email)."</tr>";
}
echo "</table>";
?>
</body>
</html>
