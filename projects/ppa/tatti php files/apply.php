<?php

    session_start();
    require_once('connection.php');
// var_dump($_POST);
//   var_dump($_SESSION);
 
require_once('department_assoc_array.php');
    
    if(!isset($_SESSION['ldap_id']))
    {
        die( 'hahaha clever guy first login');
       
    }
    if($_SESSION['user_type']!='student')
    {
        header("location: index.php");
    }

function remove_underscores($string)
{
return str_replace('_', ' ', $string);
}
    
?>

<?php

    if(count($_POST)==0)
    {
        die("Select a project first!");
    }
        
    $project_info = NULL;

    foreach($_POST as $key => $value)
    {
        if($value == "Go to projects page")
        {
	    $key = remove_underscores($key);
            $query = "SELECT * FROM project_info WHERE project_name='".$key."'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $project_info = $row;
                }
            }
            else
            {	
                die("Some error occured while fetching project info. Please contact at 8879049043/9821212128");
            }
        }
    }

    $student_info = NULL;
    
    $student_query = "SELECT * FROM student_project_details WHERE ldap_id='".$_SESSION['ldap_id']."'";
    $result_student = mysqli_query($conn, $student_query);
    if(mysqli_num_rows($result_student)>0)
    {
        while($row = mysqli_fetch_assoc($result_student))
        {
            $student_info = $row;
        }
    }
    else
    {
        die("Some error occured while fetching student info. Please contact Aman Virani at 9821212128 or Anay Tripathi at 8879049043");
    }
    
    
    
        
    $student_project_application_info = NULL;
    
    $student_project_application_query = "SELECT * FROM student_project_applications WHERE project_name='".$project_info['project_name']."' AND ldap_id='".$student_info['ldap_id']."'";
    $result_student_project_application_query = mysqli_query($conn, $student_project_application_query);
    if(mysqli_num_rows($result_student_project_application_query)>0)
    {
        while($row = mysqli_fetch_assoc($result_student_project_application_query))
        {
            $student_project_application_info = $row;
        }
    }
    else if(mysqli_num_rows($result_student_project_application_query) == 0)
    {
        $student_project_application_info['project_name'] = $project_info['project_name'];
        $student_project_application_info['ldap_id'] = $student_info['ldap_id'];
        $student_project_application_info['status_of_application'] = "Not applied";
    }
    else 
    {
        die("Some error occured while fetching student application info. Please contact Aman Virani at 9821212128");
    }
    
    function num_of_applications($ldap_id)
    {
        global $conn;
        $query = "SELECT * FROM student_project_applications WHERE ldap_id='$ldap_id'";
        $result = mysqli_query($conn, $query);
        return mysqli_num_rows($result);
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
  
  <script>
    function check_empty_form() 
    {
        var n = Number(document.getElementById("num_ques").value);
        for(var i=0; i<n ; i++)
        {
            if (!document.getElementById("sop_a_"+i).value) 
            {
                window.alert("Please enter SOP answers. While removing the application, mention 'removing application' in given fields.");
                return false;
            }
        }
       
       
    }
  </script>
  
</head>




<body>
    
<input type="hidden" value="<?php echo $project_info['project_name']; ?>" form="submit_form" name="project_code" />

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Project Allocation Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="student.php">All Projects</a></li>
      <li><a href="my_applications.php">My Applications</a></li>
      <li><a href="my_info.php">My Info</a></li>
    </ul>
      <a href="logout.php" class="navbar-brand pull-right">Logout</a>
  </div>
</nav>
  
<div class="container">
    
    <h3>Personal message from professor:</h3>
    <p style="font-size: 20px;">
    <?php 
    echo $student_project_application_info['message_to_student'];
    ?>
        </p>
    
    <h3>Project Info</h3>
    <table class = "table">
        
        <tr>
        <th>Project Name - Department</th>
        <td>
        <?php
        echo $project_info['project_name']." -  ".$project_info['department'];
        ?>
        </td>
        </tr>
        
        <tr>
        <th>Professor's name</th>
        <td>
        <?php echo $project_info['prof_name']; ?>
        </td>
        </tr>
        
        <tr>
        <th>My Status of Application</th>
        <td>
        <?php echo $student_project_application_info['status_of_application']; ?>
        </td>
        </tr>
        
        <tr>
        <th>My response</th>
        <td>
        <?php echo $student_project_application_info['student_answer']; ?>
        </td>
        </tr>
        
        <tr>
        <th>Project Information</th>
        <td>
        <?php echo $project_info['project_details']; ?>
        </td>
        </tr>
        
        
        
       
        
        <tr>
        <th>Eligibility Criteria</th>
        <td>
        <?php echo $project_info['eligibility_criteria']; ?>
        </td>
        </tr>
        
        <tr>
        <th>Deadline for application</th>
        <td>
        <?php echo $project_info['deadline']; ?>
        </td>
        </tr>
        
        <tr>
        <th>Interview Dates</th>
        <td>
        <?php echo $project_info['interview_start_date']." to ".$project_info['interview_end_date']; ?>
        </td>
        </tr>
        
        
        
    </table>
    
    <?php
    
    function date_not_passed($date)
    {
        $todays_date = date('Y-m-d');
        if(strtotime($date) > strtotime($todays_date))
        {
            return true;
        }
        return false;
    }
    
    $accept_state = $waitlist_state = $apply_state = $rejected_state = $interview_pending_state = false;
    
    //Getting accept_state
    
    if($student_project_application_info['status_of_application'] == "Selected" &&
            $student_project_application_info['student_answer'] != 'Selected for other project')
    {
        $accept_state = true;
    }
    
    //Getting apply state
    
    if($student_project_application_info['status_of_application'] == "Not applied")
    {
        if(strtotime(date('Y-m-d')) > strtotime($_POST['deadline']))
        {
            $apply_state = false;
            echo "<p style='float:right;color:red'>Deadline has passed!</p>";
        }
        else if(num_of_applications($_SESSION['ldap_id']) >= 3)
        {
            $apply_state = false;
            echo "<p style='float:right;color:red'>You have already applied for 3 projects!</p>";
        }
        else if($student_info['cpi']==NULL || $student_info['cpi']=="" || 
                $student_info['contact_number']==NULL || $student_info['contact_number']=="" ||
                $student_info['year_of_study']==NULL || $student_info['year_of_study']=="")
        {
            $apply_state = false;
            echo "<p style='float:right;color:red'>Enter all of your details in the My Info page first!</p>";
        }
        else
        {
            $apply_state = true;
        }
        
    }
    
    if($student_project_application_info['status_of_application'] == "Waitlisted")
    {
        $waitlist_state = true;
    }
    
    if($student_project_application_info['status_of_application'] == "Rejected")
    {
        $rejected_state = true;
    }
    
    if($student_project_application_info['status_of_application'] == "Interview Pending")
    {
        $interview_pending_state = true;
    }
//     echo "<form action='apply_for_project.php' method='post' style='float:right;' id='submit_form' '>";

  echo "<form action='apply_for_project.php' method='post' style='float:right;' id='submit_form' onsubmit='return check_empty_form()'>";
    echo "<p style='color:red'> <a onclick='window.open(\"disclaimer.php\")'>Please read the disclaimer first here!</a> </p>";
    if($accept_state)
    {
        if($student_project_application_info['student_answer']!='Accepted')
        {
            echo "<input type='submit' value='Accept project' name='button' onclick='window.confirm(\"Please confirm that you have read the disclaimer and confirm to the requirements\")'/><br>";
            echo "<input type='submit' value='Reject project' name='button' onclick='window.confirm(\"Please confirm that you have read the disclaimer and confirm to the requirements\")' /><br>";
        }
        else
        {
            echo "<p style='color:green;float:right'>You have accepted the project</p>";
        }
        
    }
    if($apply_state)
    {
        echo "<input type='submit' value='Apply for project' name='button' onclick='window.confirm(\"Please confirm that you have read the disclaimer and confirm to the requirements\")'/><br><br>";
    }
    if($waitlist_state)
    {
        echo "<h4>Your application is waitlisted</h4>";
    }
    
    if($rejected_state)
    {
        echo "<h4>Your application was rejected</h4>";
    }
    
    if($interview_pending_state)
    {
        if(strtotime(date('Y-m-d')) <= strtotime($_POST['deadline']))
        {
            echo "<input type='submit' value='Remove Application' name='button' onclick='window.confirm(\"Please confirm that you have read the disclaimer and confirm to the requirements\")'/><br><br>";
        }
        else
        {
            echo "Time for removal of application has passed.";
        }
    }
    
    echo "</form><br>";
    
    ?>
    
    <h3>SOP Questions</h3>
    
    <?php
    
    echo $compulsary_warning;
    $q_list = explode(';@;', $project_info['sop_questions']);
    $a_list = explode(';@;', $student_application_info['sop_answers']);
    
    echo "<input type='hidden' value='".count($q_list)."' name='num_ques' id='num_ques'/>";

    foreach ($q_list as $i => $question)
    {
        if($question != '')
        {
            echo "<h4>".$question."</h4>";
            echo "<textarea cols='60' rows='6' name='sop_a_".$i."' id='sop_a_".$i."' form='submit_form'>".$a_list[$i]."</textarea>";
        }
    }
    
    
    echo "<br>";
    
    ?>
    
<!--    
    <h3>List of all students who have applied and their status:</h3>
    
    <table class='table'>
        <tr>
        <th>Student Name</th>
        <th>Year of study</th>
        <th>Department</th>
        <th>Status</th>
        </tr>
        //<?php
//    
//        $query_all_students = "SELECT * FROM student_applications WHERE course_code='".$course_info['course_code']."'";
//        $result_of_all_students = mysqli_query($conn, $query_all_students);
//        if(mysqli_num_rows($result_of_all_students)>0)
//        {
//            while($row = mysqli_fetch_assoc($result_of_all_students))
//            {
//                $query_status = "SELECT * FROM student_details WHERE ldap_id='".$row['ldap_id']."'";
//                $result_of_status_query = mysqli_query($conn, $query_status);
//                $status = NULL;
//                if(mysqli_num_rows($result_of_status_query)>0)
//                {
//                    while($row2 = mysqli_fetch_assoc($result_of_status_query))
//                    {
//                        echo "<tr>"
//                        . "<td>".$row2['name']."</td>"
//                        . "<td>".$row2['year_of_study']."</td>"
//                        . "<td>".$row2['department']."</td>";
//                    }
//                }
//                else
//                {
//                    echo "0 results in second query";
//                }
//                
//                echo "<td>".$row['status_of_application']."</td>"
//                        . "</tr>";
//                
//            }
//        }
//        else
//        {
//            echo "0 results";
//        }
//
//        ?>
    </table>-->
    
    
    
</div>

<footer class="footer">
    <div class="container">
        <br>
        <p>In case of any problems with the portal, or any bugs, please <a href="helpmail.php">Click here</a></p>
    </div>

</body>
</html>










<?php
/*session_start();
require_once('connection.php');
require_once 'department_assoc_array.php';

$flag = false;
foreach($_POST as $course_code => $key)
{
    $ldap_id = $_SESSION['ldap_id'];
    if($key == "Go to course page")
    {
        
    }
    $check_query = "SELECT * FROM student_applications WHERE course_code='".$course_code."'";
    
    $result1 = mysqli_query($conn, $check_query);
    
    if(mysqli_num_rows($result1)>0)
    {
        echo "Database error. You may have already applied for this course. Please select another course if you want to apply. In case you are seeing this error without any apparent reason, please contact Aman Virani at 9821212128.";
    }
    else
    {
        $query = "INSERT INTO student_applications (ldap_id, course_code, status_of_application) VALUES ('".$ldap_id."', '".$course_code."', 'Interview Pending')";
        if(mysqli_query($conn, $query))
        {
            header('location: my_applications.php');
        }
        else
        {
            echo "Couldn't process your request. Please contact Aman Virani at 9821212128";
        }
    }
}

if($flag)
{
    
}
*/
?>


