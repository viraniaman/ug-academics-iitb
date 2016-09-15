<?php

session_start();

require_once('database.php');
$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());




$query = "SELECT email FROM mailing";
		$result= mysql_query($query);
while (($row = mysql_fetch_assoc($result)) != null) {

$to.=$row['email'].",";

}
$to.="pranav15197@gmail.com";
echo $to;
$cc = array_map('trim', explode(',', $to));


echo "ty";
echo "<br>";


		$department = "Career Cell";
		$mail_list=$categories[$department];
$categories = array (
	'Career Cell' => array ('shubhamiitpowai@gmail.com', 'shubham.chasebig@gmail.com')  );

echo $mail_list;

require_once 'swift/lib/swift_required.php';

date_default_timezone_set ('Asia/Kolkata'); // Optional

$from = 'shubham94@iitb.ac.in';

$message = Swift_Message::newInstance()
-> setSubject ('A student has a query')
-> setFrom ($from)
-> setTo ($mail_list)
-> setBody ("yo ...");

$transport = Swift_SmtpTransport::newInstance('smtp-auth.iitb.ac.in', 25, 'tls')
->setUsername('shubham94')
->setPassword('shubhamroxx$$');
$mailer = Swift_Mailer::newInstance($transport);

$result = $mailer->send($message);

?>