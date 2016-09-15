<?php
session_start();
require_once("functions.php");
if (!isset($_POST['username']) or !isset($_POST['password'])){
	
header("location: index.php?er=loginfailed");

}
require_once("logininfo.php");
$link = mysql_connect($db_hostname, $db_username, $db_password) or die ("Not able to connect" . mysql_error());
mysql_select_db($db_database, $link) or die ("Query for database failed : " . mysql_error());
$time = date("Y-m-d H:i:s");
$ldap_id = cleanQuery($_POST['username']);
$ldap_password = cleanQuery($_POST['password']);
if ($ldap_id!="")
{
if (ldap_auth($ldap_id,$ldap_password)){
	$_SESSION['ldap_id'] = $ldap_id;
	
		header("location: main.php");
	
	
	
}
else {
header("location: index.php?er=loginfailed");
}
}
else{
	header("location: index.php?er=loginfailed");
}
	
?>
