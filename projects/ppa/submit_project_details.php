<?php
//FACULTY PAGE
session_start();
require_once 'connection.php';
/*
if(!isset($_SESSION['ldap_id']))
{
    die("Please login first!");
}

if($_SESSION['user_type']!='faculty')
{
    header("location: index.php");
}
*/
$_SESSION['ldap_id'] = 'sample_ldap';

$project_info = array();
$project_name = $string = preg_replace('/\s+/', '', $_POST['project_name']);

$deadline = $_POST['deadline'];
$eligibility_criteria = $_POST['eligibility_criteria'];
$project_details = $_POST['project_details'];
$interview_start_date = $_POST['interview_start_date'];
$interview_end_date = $_POST['interview_end_date'];
$prof_name = $_SESSION['prof_name'];
$department = $_SESSION['department'];

//@todo REFORMAT DATES BEFORE USE

function get_reformatted_date($date)
{
    
    $date_array1 = explode("/", $date);
    $date_array2 = explode("-", $date);
    if(count($date_array2) == 3)
    {
        return $date_array2;
    }
    return $date_array1[2]."-".$date_array1[0]."-".$date_array1[1];
}

/*function course_exists()
{
    global $course_code, $conn;
    $query = "SELECT * FROM project_info WHERE course_code='".$course_code."'";
    echo "course code is: ".$course_code . "<br>";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0)
    {
        echo "course exists!<br>";
        return true;
    }
    echo "course doesnt exist!<br>";
    return false;
}
*/
function get_sop_questions()
{
    $string = "";
    foreach($_POST as $key => $value)
    {
        if(preg_match("/sop_q_\d/", $key))
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
        die("There was some error in processing your SOP questions. Please contact Aman Virani - 9821212128");
    }
    return $string;
}

$deadline = get_reformatted_date($deadline);
$interview_start_date = get_reformatted_date($interview_start_date);
$interview_end_date = get_reformatted_date($interview_end_date);
$sop_questions = get_sop_questions();



if(course_exists())
{
    $query = "UPDATE project_info SET project_name='$project_name', "
            . "deadline='$deadline', prof_name='$prof_name', eligibility_criteria='$eligibility_criteria', "
            . "department='$department', interview_start_date='$interview_start_date',"
            . "interview_end_date='$interview_end_date', sop_questions='$sop_questions', project_details='$project_details',"
            . "prof_ldap='".$_SESSION['ldap_id']."' WHERE project_name='$project_name'";
    if(mysqli_query($conn, $query))
    {
        $_SESSION['project_info_edit_successful'] = 1;
        header("location: edit_project_info.php");
    }
    else
    {
        $_SESSION['project_info_edit_successful'] = 0;
        die("There was some problem with updating project information. Please contact"
                . "Aman Virani at 9821212128 or Anay Tripathi at 8879049043.");
    }
}
else
{
    $query = "INSERT INTO project_info ( project_name, prof_name, project_details, "
            . "eligibility_criteria, deadline, department, interview_start_date, "
            . "interview_end_date, sop_questions, prof_ldap) VALUES ( '$project_name', "
            . "'$prof_name', '$project_details', '$eligibility_criteria', '$deadline', "
            . "'$department', '$interview_start_date', '$interview_end_date', '$sop_questions', '".$_SESSION['ldap_id']."')";
    
    if(mysqli_query($conn, $query))
    {
        $_SESSION['project_info_edit_successful'] = 1;
        header("location: edit_project_info.php");
    }
    else
    {
        $_SESSION['project_info_edit_successful'] = 0;
        die("There was some error in updating the project info. Please contact "
                . "Aman Virani at 9821212128 or Anay Tripathi at 889049043");
    }
}

 
 