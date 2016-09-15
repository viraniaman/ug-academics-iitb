<?php
session_start();
require_once("connection.php");

if (!(isset($_SESSION['ldap_id']))) {
    die("Please login first");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Student Section</title>
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
                    <a class="navbar-brand" href="#">Project Allocation Portal</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="student.php">All Projects</a></li>
                    <li><a href="my_applications.php">My Applications</a></li>
                    <li><a href="my_info.php">My Info</a></li>
                </ul>
                <a href="logout.php" class="navbar-brand pull-right">Logout</a>
            </div>
        </nav>

        <div class="container">

            <h3>Disclaimers:</h3>


            <h4>Accepting Projects </h4>
          <!--  <p>
                Once accepted all your other applications will be invalid. If it is found that you have accepted Teaching Assistant position for 2 or more courses (including courses outside the purview of this portal) that punitive actions might be taken against you. You might be removed from your TA position in all the accepted courses and the stipend awarded to you could be collected back as a fine. Do you still wish to accept Teaching Assistant position for this course.
            </p>
            <h4>Rejecting TA position</h4>
            <p>Once rejected, you will no longer be able to become a Teaching Assistant for this course in this semester. If you reject Teaching Assistant position in all the courses selected for and you already have received the results to all your applications (max 3) then you will no longer have an option to apply for Teaching Assistant position in any course inside the purview of this portal. Do you still wish to reject this Teaching Assistant position offered.
            </p>
            <h4>While applying for the course.</h4>
            <p>Once application deadline is reached for a particular course, you will no longer be able to modify your application. Keep in mind that you can only apply for Teaching Assitant position in max. 3 courses.
                If the information that you have provided in the application is found to be incorrect then you can be debarred from participating in Teaching Assistant selection process for this semester and further punitive actions can be taken against you. Click ok only if you agree that all the information that you have provided are correct.
            </p>
            <h4>Remove Application</h4>
            <p>Are you sure you wish to withdraw your Teaching Assistant application for this course? </p>
            -->

        </p>

    </div>

</body>
</html>

