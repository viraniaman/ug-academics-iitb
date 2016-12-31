<?php

require_once('connection.php');
require_once 'swift/lib/swift_required.php';

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

$cutoff_time = 0.02;

while(true)
{
	$query = "SELECT * FROM student_applications WHERE NOT accept_datetime=NULL OR NOT accept_datetime=''";
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result)>0)
	{
		while($row = mysqli_fetch_assoc($result))
	    {
	    	$date = $row['accept_datetime'];

	    	//$date = strptime($date, "%Y-%m-%d %H:%M:%S");

	    	$date_now = strval(date('Y-m-d H:i:s'));

	    	$seconds = strtotime($date_now) - strtotime($date);

	    	$hours = $seconds/3600;

			var_dump($hours);

	    	if($hours>=$cutoff_time)
	    	{
	    		$query2 = "UPDATE student_applications SET student_answer='Selected TAship of some other professor' WHERE ldap_id='".$row['ldap_id']."' AND course_code='".$row['course_code']."'";

	    		if(!mysqli_query($conn, $query2))
                {
                	$to = array("140070009@iitb.ac.in", "viraniaman@gmail.com", "abhishekkhadiya@gmail.com","ritwickchaudhry@gmail.com", "tripathi.anay@gmail.com");

                    send_mail1($to, "ta_selection_portal_down@iitb.ac.in", "TA Selection Portal: The database refresh script went down", "Database refresh query failed. Please check the portal.", "140070009", "04041996@iit^");

                    die("Some error occured while deleting application after accept datetime. Contact Aman Virani at 9821212128");

                }

                $query2 = "SELECT * FROM student_applications WHERE course_code='".$row['course_code']."'";
			    $result2 = mysqli_query($conn, $query2);
			    if(mysqli_num_rows($result2)>0)
			    {
			        while($row2 = mysqli_fetch_assoc($result2))
			        {
			            if($row2['waitlist_no']=='1')
			            {
			                $query3 = "UPDATE student_applications SET status_of_application='Selected'"
			                        . ", waitlist_no='' WHERE course_code='".$row['course_code']."' AND ldap_id='".$row2['ldap_id']."'";
			                if(!mysqli_query($conn, $query3))
			                {
			                    die("Some error in setting waitlist 1. Please contact Aman Virani - 9821212128");
			                }
			            }
			            else
			            {
			                $no = intval($row2['waitlist_no'])-1;
			                if($no > 0)
			                {
			                    $query3 = "UPDATE student_applications SET waitlist_no='".  strval(intval($row2['waitlist_no'])-1) ."' WHERE course_code='".$row['course_code']."' AND ldap_id='".$row2['ldap_id']."'";
			                    if(!mysqli_query($conn, $query3))
			                    {
			                        die("Some error in shifting waitlist. Please contact Aman Virani - 9821212128");
			                    }
			                }
			            }
			        }
			    }
			    else
			    {
			        die("Error in shifting waitlist, in first query itself!");
			    }

	    	}

	    }
	}
	sleep(1);
}


?>
