<?php
session_start();

require_once('database.php');
$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());

require_once 'swift/lib/swift_required.php';

date_default_timezone_set ('Asia/Kolkata'); // Optional

$from = $_SESSION['ldap_admin'] . '@iitb.ac.in';
$to = $_SESSION['recipient'] . '@iitb.ac.in';
$ldap_admin=$_SESSION['ldap_admin'];
$passwd=$_SESSION['passwd'];
$message = Swift_Message::newInstance()
-> setSubject ('Response to your query on the Q & G Portal')
-> setFrom (array ($from))
-> setTo (array ($to))
-> setBody ("From: " . $from . "\n" . $_SESSION['reply'] . "\nThank you.");

$transport = Swift_SmtpTransport::newInstance('smtp-auth.iitb.ac.in', 25, 'tls')
->setUsername($ldap_admin)
->setPassword($passwd);

$mailer = Swift_Mailer::newInstance($transport);

$result = $mailer->send($message);

header("location: process_reply.php");
?>
