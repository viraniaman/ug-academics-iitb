<?php
session_start();
ob_start();
if(($_SESSION['dept']=="") || (!isset($_SESSION['dept'])))
{
	session_destroy();
	header("location: index.php");
}
$dbhost='localhost';
$dbname = 'ugacademics';	
$dbuser = 'ugacademics';
$dbpasswd = 'ug_acads';
$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());
	$name=$_POST['name'];
	$interest=$_POST['interest'];
	$dept=$_SESSION['dept'];
	$link=$_POST['link'];
	$link=str_replace('http://', '', $link);
	mysql_query("INSERT INTO profs (name, dept, webpage, interests) VALUES ('$name', '$dept', '$link', '$interest')");
	header("location: form.php");
?>