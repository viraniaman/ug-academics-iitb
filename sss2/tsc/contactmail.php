<?php
session_start();
require_once('../functions.php');
$link = mysql_connect('10.105.177.5', 'ugacademics', 'ug_acads') or die ("Not able to connect" . mysql_error());
mysql_select_db('ugacademics', $link) or die ("Query for database failed : " . mysql_error());

require_once 'swift/lib/swift_required.php';

date_default_timezone_set ('Asia/Kolkata'); // Optional

$info = ldap_find_all('uid',$_SESSION['ldap']);
$roll = $info[0]["employeenumber"][0];
$from = $_SESSION['ldap'] . '@iitb.ac.in';
$ldap_id=$_SESSION['ldap'];
$passwd=$_SESSION['passwd'];
$message = Swift_Message::newInstance()
-> setSubject ("TSC Query: ".$_POST['subject'])
-> setFrom (array ($from))
-> setTo (array ('viraniaman@gmail.com','tripathi.anay@gmail.com','abhishekkhadiya@gmail.com','ritwickchaudhry@gmail.com'))
-> setBody ("From: " . $_SESSION['ldap'] . "@iitb.ac.in\nRoll No.: ".$roll."\nQuery: " . $_POST['query'] . "\n");

$transport = Swift_SmtpTransport::newInstance('smtp-auth.iitb.ac.in', 25, 'tls')
->setUsername($ldap_id)
->setPassword($passwd);
$mailer = Swift_Mailer::newInstance($transport);

$result = $mailer->send($message);
header("location: contact.php?id=done");
?>
