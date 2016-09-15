<?php
session_start();

require_once('database.php');
$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());

require_once 'swift/lib/swift_required.php';

date_default_timezone_set ('Asia/Kolkata'); // Optional

$from = $_SESSION['ldap_id'] . '@iitb.ac.in';
$ldap_id=$_SESSION['ldap_id'];
$passwd=$_SESSION['passwd'];
$message = Swift_Message::newInstance()
-> setSubject ('A student has a query')
-> setFrom (array ($from))
-> setTo ($_SESSION['dept'])
-> setBody ("From: " . $_SESSION['ldap_id'] . "@iitb.ac.in\nDepartment: " . $_SESSION['category'] . "\nQuery: " . $_SESSION['query']);

$transport = Swift_SmtpTransport::newInstance('smtp-auth.iitb.ac.in', 25, 'tls')
->setUsername($ldap_id)
->setPassword($passwd);
$mailer = Swift_Mailer::newInstance($transport);

$result = $mailer->send($message);
header("location: process.php");
?>
