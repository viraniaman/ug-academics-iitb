<?php
if(isset($_POST['mail'])) {
session_start();
require_once('../functions.php');
$id = $_POST['id'];
$courseid = $_POST['courseid'];
$link = mysql_connect('10.105.177.5', 'ugacademics', 'ug_acads') or die ("Not able to connect" . mysql_error());
mysql_select_db('ugacademics', $link) or die ("Query for database failed : " . mysql_error());
$query = "SELECT * FROM tsc_registered_emails WHERE course_id='$courseid' AND mail=1";
$result=mysql_query($query) or die(mysql_error());

require_once 'swift/lib/swift_required.php';

//mailing list
$array = array('abhishekkhadiya@gmail.com');
while($row=mysql_fetch_assoc($result)) {
$array[] = $row['username'].'@iitb.ac.in';
if ($row['email']!=NULL) $array[] = $row['email']; }

date_default_timezone_set ('Asia/Kolkata'); // Optional

$info = ldap_find_all('uid',$_SESSION['ldap']);
$roll = $info[0]["employeenumber"][0];
$from = $_SESSION['ldap'] . '@iitb.ac.in';
$ldap_id=$_SESSION['ldap'];
$passwd=$_SESSION['passwd'];
$message = Swift_Message::newInstance()
-> setSubject ($_POST['subject'])
-> setFrom (array ($from))
-> setTo ($array)
-> setBody ($_POST['body']);

$transport = Swift_SmtpTransport::newInstance('smtp-auth.iitb.ac.in', 25, 'tls')
->setUsername($ldap_id)
->setPassword($passwd);
$mailer = Swift_Mailer::newInstance($transport);

$result = $mailer->send($message);
$query1 = "UPDATE tsc_tutorial SET mailed='y' WHERE id='$id'";
$result1=mysql_query($query1) or die(mysql_error());
mysql_close();
} else header("location: index.php");
header("location: update.php?mailed=true");
?>