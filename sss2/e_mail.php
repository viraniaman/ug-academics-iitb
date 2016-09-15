<?php
session_start();
require_once('functions.php');
$link = mysql_connect('10.105.177.5', 'ugacademics', 'ug_acads') or die ("Not able to connect" . mysql_error());
mysql_select_db('ugacademics', $link) or die ("Query for database failed : " . mysql_error());

require_once 'swift/lib/swift_required.php';

date_default_timezone_set ('Asia/Kolkata'); // Optional

$info = ldap_find_all('uid',$_SESSION['ldap']);
$roll = $info[0]["employeenumber"][0];
$from = $_SESSION['ldap'] . '@iitb.ac.in';
$ldap_id=$_SESSION['ldap'];
$passwd=$_SESSION['passwd'];
if (!empty($_POST['comment'])) {
	$comment = "Comment: " . $_POST['comment'];
} else $comment = "";
$message = Swift_Message::newInstance()
-> setSubject ('SSS: e-book request')
-> setFrom (array ($from))
-> setTo (array ('aastha.suman717@gmail.com'))
-> setBody ("From: " . $_SESSION['ldap'] . "@iitb.ac.in\nName of the book: " . $_POST['bookname'] . "\nAuthor of the book: " . $_POST['author'] ."\n".$comment."\n");

$transport = Swift_SmtpTransport::newInstance('smtp-auth.iitb.ac.in', 25, 'tls')
->setUsername($ldap_id)
->setPassword($passwd);
$mailer = Swift_Mailer::newInstance($transport);

$result = $mailer->send($message);
header("location: requests.php?id=done");
?>