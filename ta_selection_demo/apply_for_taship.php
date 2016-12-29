<?php

session_start();
require_once 'connection.php';

if(!isset($_SESSION['ldap_id']))
{
    die( 'hahaha clever guy first login');
}

if($_SESSION['user_type']!='student')
{
    header("location: index.php");
}

//print_r($_POST);

$ldap_id = $_SESSION['ldap_id'];
$course_code = $_POST['course_code'];

$sop_answers = get_sop_answers();
$status_of_application = get_status();



?>
<?php
//<editor-fold desc="functions">

function not_yet_applied_for($course_code1)
{
    $query = "SELECT * FROM student_applications WHERE ldap_id='$ldap_id' AND course_code='$course_code1'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function get_status()
{
    $query = "SELECT * FROM student_applications WHERE ldap_id='".$ldap_id."' AND course_code='$course_code'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            return $row['status_of_application'];
        }
    }
}

function get_num_of_current_courses($ldap_id)
{
    $query = "SELECT * FROM student_applications WHERE ldap_id='".$ldap_id."'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result);
}

function get_sop_answers()
{
    global $conn;
    $string = "";
    foreach($_POST as $key => $value)
    {
        if(preg_match("/sop_a_\d/", $key))
        {
            if($string == "")
            {
                $string .= $value;
            }
            else
            {
                $string .= ";@;".$value;
            }
        }
    }
    if($string == "")
    {
//        print_r($_POST);
        echo "<br>";
        die("There was some error in processing your SOP answers. Please contact Aman Virani - 9821212128");
    }
    return mysqli_real_escape_string($conn, $string);
}
//</editor-fold>

if($_POST['button']=='Apply for TAship')
{
    if(get_num_of_current_courses($ldap_id)<3 && not_yet_applied_for($course_code))
    {
        $query = "INSERT INTO student_applications (ldap_id, course_code, status_of_application, sop_answers, student_answer, grade, willingness) "
                . "values ('$ldap_id','$course_code', 'Interview Pending', '".mysqli_real_escape_string($conn, $sop_answers)."', '', '".$_POST['grade']."', '".$_POST['willingness']."')";
        if(!mysqli_query($conn, $query))
        {
            die(mysqli_error($conn));
        }
        else 
        {
            echo "You have successfully applied for $course_code as a TA";
            header("location: my_applications.php");
        }
    }
    else 
    {
        die("You have either already applied for this course, or already applied for 3 courses. You cannot apply for more than that.");
    }
}

if($_POST['button']=='Accept TAship')
{
    
    $query = "UPDATE student_applications SET student_answer='Selected TAship of some other professor' WHERE ldap_id='$ldap_id' AND NOT course_code='$course_code'";

    //$query = "UPDATE student_applications SET selected='True' WHERE ldap_id='$ldap_id'";
    
    if(mysqli_query($conn, $query))
    {
        $accept_query = "UPDATE student_applications SET student_answer='Accepted'"
                . " WHERE ldap_id='$ldap_id' AND course_code='$course_code'";
        $accept_query2 = "UPDATE student_details SET selected='True' WHERE ldap_id='$ldap_id'";
        if(mysqli_query($conn, $accept_query))
        {
            if(mysqli_query($conn, $accept_query2))
            {
                echo "Successfully accepted TAship for $course_code! Congratulations! ";
                echo "<a href='my_applications.php'>Go to my applications</a>";
            }
            else
            {
                echo "There was some error in accepting TAship. Please contact Aman Virani at 9821212128";
            }
        }
        
    }
    else
    {
        echo "There was some error in processing your acceptance of TAship. Please contact Aman Virani - 9821212128";
    }
    
//    if(get_num_of_current_courses($ldap_id)<3)
//    {
//        $query = "INSERT INTO student_applications (ldap_id, course_code, status_of_application, sop_answers) values ('$ldap_id','$course_code', 'Interview Pending', '".get_sop_answers()."')";
//        if(!mysqli_query($conn, $query))
//        {
//            die("There was some problem applying you for this course. Contact Aman Virani - 9821212128");
//        }
//        else
//        {
//            //Removing his applications from all other courses
//            $remove_query = "DELETE FROM student_applications WHERE ldap_id='$ldap_id'";
//            if(mysqli_query($conn, $remove_query))
//            {
//                
//            }
//            
//        }
//    }
//    else 
//    {
//        die("You have already applied for 3 courses. You cannot apply for more than that.");
//    }
}

if($_POST['button'] == 'Reject TAship')
{
    $query = "UPDATE student_applications SET student_answer='Selected TAship of some other professor' where ldap_id='$ldap_id' AND course_code='$course_code'";
    if(mysqli_query($conn, $query))
    {
        echo "Successfully rejected TAship for $course_code";
        header("location: my_applications.php");
    }
    
    // Shifting waitlist here
    
//    $query2 = "SELECT * FROM student_applications WHERE course_code='$course_code' AND (waitlist_no IS NOT NULL OR NOT waitlist_no='')";
    $query2 = "SELECT * FROM student_applications WHERE course_code='$course_code'";
    $result2 = mysqli_query($conn, $query2);
    if(mysqli_num_rows($result2)>0)
    {
        while($row = mysqli_fetch_assoc($result2))
        {
            if($row['waitlist_no']=='1')
            {
                $query3 = "UPDATE student_applications SET status_of_application='Selected'"
                        . ", waitlist_no='' WHERE course_code='$course_code' AND ldap_id='".$row['ldap_id']."'";
                if(!mysqli_query($conn, $query3))
                {
                    die("Some error in setting waitlist 1. Please contact Aman Virani - 9821212128");
                }
            }
            else
            {
                $no = intval($row['waitlist_no'])-1;
                if($no > 0)
                {
                    $query3 = "UPDATE student_applications SET waitlist_no='".  strval(intval($row['waitlist_no'])-1) ."' WHERE course_code='$course_code' AND ldap_id='".$row['ldap_id']."'";
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

if($_POST['button'] == 'Remove Application')
{
    $query = "DELETE FROM student_applications WHERE ldap_id='$ldap_id' AND course_code='$course_code'";
    if(mysqli_query($conn, $query))
    {
        header("location: my_applications.php");
    }
    else
    {
        echo "there was some problem in removing application";
    }
}




/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

