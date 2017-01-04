<?php

session_start();
require_once 'connection.php';

if(!isset($_SESSION['ldap_id']))
{
    die("Please login first!");
}

if($_SESSION['user_type']!='faculty')
{
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>View SOP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">TA Selection Portal</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="faculty.php">View & Edit Student Applications</a></li>
                    <li><a href="edit_course_info.php">Edit Course Information</a></li>
                </ul>
                <a href="logout.php" class="navbar-brand pull-right">Logout</a>
            </div>
        </nav>

        <div class="container">
            
            <?php

            $stu_ldap_id = $_GET['ldap_id'];
            $course_code = $_GET['course_code'];

            $query = "SELECT * FROM student_applications WHERE ldap_id='$stu_ldap_id' AND course_code='$course_code'";

            $application_info = NULL;

            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $application_info = $row;
                }
            }

            $query = "SELECT * FROM course_info WHERE course_code='$course_code'";

            $course_info = NULL;

            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $course_info = $row;
                }
            }
            
            $sop_questions = explode(";@;", $course_info['sop_questions']);
            $sop_answers = explode(";@;", $application_info['sop_answers']);
            
            for($i = 0; $i < count($sop_questions); $i++)
            {
                echo "<h4>$sop_questions[$i]</h4>";
                if($sop_answers[$i]=='' || $sop_answers[$i] == NULL)
                {
                    echo "<p>No answer submitted</p><br>";
                }
                else
                {
                    echo "<p>$sop_answers[$i]</p><br>";
                }
            }
            
            echo "<h4>To set the status of this student, go <a href='faculty.php'>back</a></h4>";
            
            ?>
            
        </div>


    </body>
</html>

