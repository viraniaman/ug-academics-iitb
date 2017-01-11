<?php
session_start();
require_once('connection.php');

if (!isset($_SESSION['ldap_id'])) {
    die( 'hahaha clever guy first login');
}

if($_SESSION['user_type']!='student')
{
    header("location: index.php");
}

$ldap_id = $_SESSION['ldap_id'];
?>

<?php




//Removing everything else if accepted in one course

// $sql = "SELECT * FROM student_applications WHERE ldap_id='" . $ldap_id . "'";

// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 1) {

//     // output data of each row
//     while ($row = mysqli_fetch_assoc($result)) {

//         if ($row['student_answer'] == 'Accepted') {

//             //have to make sure the application of course...

//             $query2 = "UPDATE student_applications SET student_answer='Selected TAship of some other professor' WHERE ldap_id='$ldap_id' AND NOT course_code='" . $row['course_code'] . "'";
//             if (!mysqli_query($conn, $query2)) {
//                 echo "Some problem with deleting the rest of the entries after getting selected in one. "
//                 . "Contact Aman Virani at 9821212128.";
//             }
//         }
        /*
          $result2 = mysqli_query($conn, "SELECT * FROM course_info WHERE course_code='".$course_code1."'");

          if(mysqli_num_rows($result2)>0)
          {
          while($row2 = mysqli_fetch_assoc($result2))
          {
          echo "
          <tr>
          <td>".$row2['course_code']."</td>
          <td>".$row2['course_name']."</td>
          <td>".$row2['prof_name']."</td>
          <td>".$row2['department']."</td>
          <td>".$row2['course_details']."</td>
          <td>".$row2['eligibility_criteria']."</td>
          <td>".$row2['deadline']."</td>
          <td>".$row['status_of_application']."</td>
          <td><form action='apply.php' method='post'><input class='btn mini blue-stripe' type='submit' name='".$row['course_code']."' value='Go to course page'></input>
          <input type='hidden' name='deadline' value='".$row2['deadline']."' /></form></td>
          </tr>";
          }
          }
          else
          {
          echo "some problem in second query \n";
          }
         * 
         */
//     }
// }
?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Applications</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <style>
            table {
                width: 700px;
            }
            table tr td {
                height: auto;
            }
        </style>
        <style>
            /* Sticky footer styles
      -------------------------------------------------- */
      html {
        position: relative;
        min-height: 100%;
      }
      body {
        /* Margin bottom by footer height */
        margin-bottom: 60px;
      }
      .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        /* Set the fixed height of the footer here */
        height: 60px;
        background-color: #f5f5f5;
      }

  </style>
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">TA Selection Portal</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="student.php">All Courses</a></li>
                    <li class="active"><a href="my_applications.php">My Applications</a></li>
                    <li><a href="my_info.php">My Info</a></li>
                </ul>
                <a href="logout.php" class="navbar-brand pull-right">Logout</a>
            </div>
        </nav>

        <div class='container'>
            <h3>List of all courses you have applied to:</h3>

            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Duration</th>
                        <th>Professor's Name</th>
                        <th>Department</th>
                        <th>Course Details</th>
                        <th>Prerequisites</th>
                        <th>Last Date<br>Of Application</th>
                        <th>Status</th>
                        <th>Message from Prof</th>
                        <th>Your response</th>
                        <th>Course Page</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM student_applications WHERE ldap_id='" . $ldap_id ."'";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {

                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {

                        $course_code1 = $row['course_code'];

                        $result2 = mysqli_query($conn, "SELECT * FROM course_info WHERE course_code='" . $course_code1 . "'");

                        if (mysqli_num_rows($result2) > 0) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo "
                    <tr>
                        <td>" . $row2['course_code'] . "</td>
                        <td>" . $row2['course_name'] . "</td>
                        <td>" . $row2['duration'] . "</td>
                        <td>" . $row2['prof_name'] . "</td>
                        <td>" . $row2['department'] . "</td>
                        <td>" . $row2['course_details'] . "</td>
                        <td>" . $row2['eligibility_criteria'] . "</td>
                        <td>" . $row2['deadline'] . "</td>
                        <td>" . $row['status_of_application'] . "</td>"
                        . "<td>" . $row['message_to_student'] . "</td>"
                        . "<td>" . $row['student_answer'] . "</td>"
                        . "<td><form action='apply.php' method='post'><input class='btn mini blue-stripe' type='submit' name='" . $row['course_code'] . "' value='Go to course page'></input>
                    <input type='hidden' name='deadline' value='" . $row2['deadline'] . "' /></form></td>
                   </tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                    }
                } else {
                    echo "0 results";
                }
                ?>        
                <tbody>



                </tbody>
            </table>

        </div>
        
        <footer class="footer">
    <div class="container">
        <br>
        <p>In case of any problems with the portal, or any bugs, please <a href="helpmail.php">Click here</a></p>
    </div>

    </body>
</html>

