<?php

session_start();
require_once('connection.php');
require_once ('department_assoc_array.php');

if(!isset($_SESSION['ldap_id']))
{
    die("Please login first");
}

function date_not_passed($date)
{
    $todays_date = date('Y-m-d');
    if(strtotime($date) > strtotime($todays_date))
    {
        return true;
    }
    return false;
}

foreach($_POST as $course_code => $remove)
{
    if($remove == "Remove" && date_not_passed($_POST['deadline']))
    {
        $query = "DELETE FROM student_applications WHERE course_code='".$course_code."'";
        if(mysqli_query($conn, $query))
        {
            echo "Deleted successfully";
            header("location: my_applications.php");
        }
        else
        {
            echo "There was some error while deleting the entry. Please contact Aman Virani - 9821212128";
            die();
        }
    }
    else
    {
        if(!date_not_passed($_POST['deadline']))
        {
            die("Date of removal of application has passed!");
        }
    }
}


?>
