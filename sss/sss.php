<?php
session_start();

ob_start();

$dbhost='localhost';
$dbname = 'ugacademics';
$dbuser = 'ugacademics';
$dbpasswd = 'ug_acads';
$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());

require_once 'swift/lib/swift_required.php';

date_default_timezone_set ('Asia/Kolkata'); // Optional

$message = Swift_Message::newInstance()
-> setSubject ('query')
-> setFrom ('shubham.chasebig@gmail.com' => 'SSS portal')
-> setTo ($_SESSION['email'])
-> setBody ($_SESSION['query']);

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'ssl')
->setUsername('shubham.chasebig')
->setPassword('7738424406');

$mailer = Swift_Mailer::newInstance($transport);

$result = $mailer->send($message);


header("location: reply.php");
?>
