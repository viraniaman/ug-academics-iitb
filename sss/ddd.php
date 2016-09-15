<?php






require_once 'swift/lib/swift_required.php';

date_default_timezone_set ('Asia/Kolkata'); // Optional

$message = Swift_Message::newInstance()
-> setSubject ('Testing PHP\'s Swiftmail library')
-> setFrom (array ('shubhamiitpowai@gmail.com' => 'shubham bhartiya'))
-> setTo (array ('shubham94@iitb.ac.in' => 'shubham bhartiya'))
-> setBody ('Did you get this email? Did you??');

$transport = Swift_SmtpTransport::newInstance('smtp-auth.iitb.ac.in', 25, 'tls')
->setUsername('shubham94')
->setPassword('08061994'); // Put the password here

$mailer = Swift_Mailer::newInstance($transport);

$result = $mailer->send($message);

echo $result;
?>
