<?php

require_once 'swift/lib/swift_required.php';
//
if(!isset($_SESSION['ldap_id']))
{
    die("Please login first!");
}
//
//if($_SESSION['user_type']!='faculty')
//{
//    header("location: index.php");
//}

function send_mail($to, $from, $subject, $message)
{
    $from = $from . '@iitb.ac.in';
    $ldap_id=$_SESSION['ldap_id'];
    $passwd=$_SESSION['passwd'];
    $message = Swift_Message::newInstance()
    -> setSubject ("TA Selection Portal: ".$_POST['subject'])
    -> setFrom (array ($from))
    -> setTo ($to)
    -> setBody ($message);

    $transport = Swift_SmtpTransport::newInstance('smtp-auth.iitb.ac.in', 25, 'tls')
    ->setUsername($ldap_id)
    ->setPassword($passwd);
    $mailer = Swift_Mailer::newInstance($transport);

    return $mailer->send($message);
}

function send_mail1($to, $from, $subject, $message, $ldap_id1, $passwd1)
{
    $from = $from . '@iitb.ac.in';
    $ldap_id=$ldap_id1;
    $passwd=$passwd1;
    $message = Swift_Message::newInstance()
    -> setSubject ("TA Selection Portal: ".$_POST['subject'])
    -> setFrom (array ($from))
    -> setTo ($to)
    -> setBody ($message);

    $transport = Swift_SmtpTransport::newInstance('smtp-auth.iitb.ac.in', 25, 'tls')
    ->setUsername($ldap_id)
    ->setPassword($passwd);
    $mailer = Swift_Mailer::newInstance($transport);

    return $mailer->send($message);
}

?>
