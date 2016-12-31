<?php
//FACULTY PAGE
session_start();
require_once 'connection.php';

// $_SESSION['ldap_id'] = '140070009';
// $_SESSION['user_type']='faculty';

if(!isset($_SESSION['ldap_id']))
{
    die("Please login first!");
}

if($_SESSION['user_type']!='faculty')
{
    header("location: index.php");
}

$prof_details = NULL;

$query_prof_details = "SELECT * FROM course_info WHERE prof_ldap='".$_SESSION['ldap_id']."'";
$result_query_prof_details = mysqli_query($conn, $query_prof_details);

if(mysqli_num_rows($result_query_prof_details)>0)
{
    while($row = mysqli_fetch_assoc($result_query_prof_details))
    {
        $prof_details = $row;
    }
}


if($prof_details == NULL || count($prof_details)==0)
{
    header("location: edit_course_info.php");
}

$_SESSION['course_code'] = $prof_details['course_code'];

$student_status_set = NULL;


if(isset($_POST['send_mail_to_selected']))
{
	if(!empty($_POST['sendto']))
	{
		$_SESSION['sendto'] = $_POST['sendto'];
		header('location: send_to_selected.php');
	}
	else
	{
		$student_status_set = "Please select students to send mail to first!";
	}
}

if(isset($_POST['update_student_applications']))
{
    //Logic to check waitlist numbers coherence
    
//    $done_array=array();
    
    
//    foreach ($_POST as $key => $value)
//    {        
//        if(preg_match("/^waitlist_no/", $key))
//        {            
//            
//        }
//    }
    
    /*
    $array = array();
    
    foreach ($done_array as $key => $value)
    {
        if(is_int($value))
        {
            array_push($array, $value);
        }
    }
    
    sort($array);
    
    for($i=0; $i < count($array); $i++)
    {
        $j = $i + 1;
        if($j != $array[$i])
        {
            echo "Error in waitlist setting. Try again!";
//            header("location: faculty.php?waitlist_error=true");
            die();
        }
    }
     * 
     */
    
    
    //Logic to update DB entry for student application
    
//    print_r($_POST);
    
    foreach ($_POST as $key => $value)
    {        
        if(preg_match("/^message_to_student/", $key))
        {
            $student_ldap = substr($key, 19);
            $query = "UPDATE student_applications SET message_to_student='".mysqli_real_escape_string($conn, $value)."' "
                    . "WHERE ldap_id='$student_ldap' AND course_code='".$prof_details['course_code']."'";
            if(!mysqli_query($conn, $query))
            {
                die(mysqli_error($conn));
            }
        }
        if(preg_match("/^status/", $key))
        {
            $student_ldap = substr($key, 7);
            
            //unsetting invalid inputs, i.e, when waitlist number is provided even when
            //the option selected isnt waitlisted
            
            if($value != "Waitlisted" && ($_POST['waitlist_no_'.$student_ldap]!=NULL || 
                    $_POST['waitlist_no_'.$student_ldap]!=''))
            {
//                echo "unsetting waitlist_no_$student_ldap : ". $_POST['waitlist_no_'.$student_ldap]. "<br>";
                unset($_POST['waitlist_no_'.$student_ldap]);
//                if(isset($_POST['waitlist_no_'.$student_ldap]))
//                {
//                    echo "This is still set! ".$_POST['waitlist_no_'.$student_ldap]. "<br>";
//                }
//                else
//                {
//                    echo "successfully deleted the whole element <br>";
//                }
                
            }
            
            /*
             * Unsetting invalid input when waitlist number is not provided even when
             * option selected is waitlisted
             */
            
            if($value == "Waitlisted" && ($_POST['waitlist_no_'.$student_ldap]==NULL || 
                    $_POST['waitlist_no_'.$student_ldap]==''))
            {
//                echo "unsetting status : ". $_POST['waitlist_no_'.$student_ldap]. "<br>";
                $value = "Interview Pending";
//                if(isset($_POST['status_'.$student_ldap]))
//                {
//                    echo "This is still set! ".$_POST['status'.$student_ldap]. "<br>";
//                }
//                else
//                {
//                    echo "successfully deleted the whole element <br>";
//                }
                
            }

            //get current status

            $student_info = NULL;

            $student_query = "SELECT * FROM student_details WHERE ldap_id='".$student_ldap."'";
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
                die("Some error occured while fetching student info. Please contact Aman Virani at 9821212128");
            }

            $student_application_info = NULL;
    
            $student_application_query = "SELECT * FROM student_applications WHERE course_code='".$_SESSION['course_code']."' AND ldap_id='".$student_info['ldap_id']."'";
            $result_student_application_query = mysqli_query($conn, $student_application_query);
            if(mysqli_num_rows($result_student_application_query)>0)
            {
                while($row = mysqli_fetch_assoc($result_student_application_query))
                {
                    $student_application_info = $row;
                }
            }
            else if(mysqli_num_rows($result_student_application_query) == 0)
            {
                $student_application_info['course_code'] = $_SESSION['course_code'];
                $student_application_info['ldap_id'] = $student_info['ldap_id'];
                $student_application_info['status_of_application'] = "Not applied";
            }
            else 
            {
                die("Some error occured while fetching student application info. Please contact Aman Virani at 9821212128");
            }

            $status = $student_application_info['status_of_application'];

            if($status == 'Selected' && $value == "Rejected")
            {
                $query2 = "UPDATE student_details SET selected='' WHERE ldap_id='$student_ldap'";
                $query3 = "UPDATE student_applications SET student_answer='' WHERE ldap_id='".$student_ldap."'";
                if(mysqli_query($conn, $query3))
                {
					if($student_info['selected']==$_SESSION['course_code'])
					{
						if(!mysqli_query($conn, $query2))
                    	{
                        	die("Some error occured. Contact Aman Virani at 9821212128");
                    	}
					}			
                    
                }
                else
                {
                    die("Some error occured. Contact Aman Virani at 9821212128");
                }
            }

            if($value == "Selected")
            {
                //set countdown

                $query = "UPDATE student_applications SET student_answer='' WHERE ldap_id='".$student_ldap."'";

            }

            
            $query = "UPDATE student_applications SET status_of_application='".$value."',"
                    . " waitlist_no='".$_POST['waitlist_no_'.$student_ldap]."'"
                . " WHERE ldap_id='".$student_ldap."' AND course_code='".$_SESSION['course_code']."'";

            if(mysqli_query($conn, $query))
            {
                $student_status_set = "Successfully set status<br><br>";
            }
            else
            {
//                echo "not able to set status for $student_ldap <br>";
                $student_status_set = "Not able to set status! Contact Aman Virani at 9821212128";
            }
        }
        
        if(preg_match("/^waitlist_no/", $key))
        {
            $student_ldap = substr($key, 12);
            
            $curr_status = $_POST['status_'.$student_ldap];
            
            if($curr_status == "Waitlisted")
            {
                $query = "UPDATE student_applications SET waitlist_no='".$value."'"
                . "WHERE ldap_id='".$student_ldap."' AND course_code='".$_SESSION['course_code']."'";

                if(mysqli_query($conn, $query))
                {
                    $student_status_set = "Successfully set waitlist<br><br>";
                }
                else
                {
                    $student_status_set = "Not able to set waitlist! Contact Aman Virani at 9821212128";
                }
            }
            
            
        }
    }
    
//    echo "<br> after running update table <br>";
    
//    print_r($_POST);
        
    
    
    
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Faculty Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <script src="bootstrap/sorttable.js"></script>
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
            function see_sop(questions, answers)
            {
                console.log('function called!');
                q = questions.split(';@;');
                a = answers.split(';@;');
                var str = "SOP Questions followed by answers: \n\n";
                for(var i=0;i<q.length; i++)
                {
                    str += "Question: "
                    str += q[i];
                    str += "\n";
                    str += "Answer: "
                    str += a[i];
                    str += "\n\n";
                }
                window.alert(str);
                return true;
            }
            
            
            
        </script>
            
        <script>
            $(document).ready(function(){
                
//                $("input[name^='waitlist_no']").keyup(function()
//                {
//                    $(this).each(function(index){
//                       $(this).text(
//                    });
//                });
                $("input[name='update_student_applications']").click(function()
                {
                    var nos = [];
                    $("input[name^='waitlist_no']").each(function(index){
                        nos.push($(this).val());
                    });
                    //removing empty elements
                    nos = nos.filter(Number);
                    
                    var num_waitlisted = 0;
                    $("select").each(function(){
                        if($(this).val() === "Waitlisted")
                        {
                            num_waitlisted ++;
                        }
                    });
                    console.log(num_waitlisted);
                    if(num_waitlisted !== nos.length)
                    {
                        alert("You have not filled the waitlist correctly1! Please go back and try again");
                        return false;
                    }
                    
                    nos.sort();
                    for(var i = 0; i < nos.length; i++)
                    {
                        var j = i + 1;
                        if(Number(j) !== Number(nos[i]))
                        {
                            alert("You have not filled the waitlist correctly2! Please go back and try again");
                            return false;
                        }
                    }
                });
            });
            
            
        </script>
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">TA Selection Portal</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="faculty.php">View & Edit Student Applications</a></li>
                    <li><a href="edit_course_info.php">Edit Course Information</a></li>
                </ul>
                <a href="logout.php" class="navbar-brand pull-right">Logout</a>
            </div>
        </nav>

        <div class="container">
            
            <?php
            
            if(!course_is_set())
            {
                echo "<p style='color:red;'><a href='edit_course_info.php'>Please set your course details first!</a></p><br>"
                . "Details of students who have applied for your course will show in the table below. Then you can read their"
                        . " SOP answers by clicking on the View SOP button, or set their selection status by choosing from"
                        . " the drop down list. <br><br>";
            }
            

            if(isset($_GET['waitlist_error']))
            {
                if($_GET['waitlist_error']=="true")
                {
                    echo "Error in setting waitlist! Please check carefully and try again.";
                }
            }
            
            echo $student_status_set;
            
            ?>
            <form action="mail_all_students.php" method="post" id="mail-form">
            <button type="submit" style="float: right;">Mail All Students...</button><br/><br/>
            </form>
            
            <form action="faculty.php" method="post">
                
                <input type="submit" name="update_student_applications" value="Update Table" style="float:right"/><br/><br/>
				<input type="submit" name="send_mail_to_selected" value="Mail Selected Students" style="float:right"/><br/><br/>
                
            <table class="table sortable" >
                
                <tr>
                    <th>Student Name</th>
                    <th>Department</th>
                    <th>Year of study</th>
                    <th>CPI</th>
                    <th>Grade in <?php echo $prof_details['course_code']; ?></th>
                    <th>Contact Number</th>
                    <th>View SOP</th>
                    <th>Message to student</th>                    
                    <th>Set Selection Status</th>
                    <th>Waitlist No.</th>
                    <th>Student Replied</th>
					<th>Check to send email</th>
                </tr>
                
                <?php
                
                $status_options = array("Interview Pending" => 3, "Selected" => 1, "Rejected" => 4, "Waitlisted" => 2);
                
                function course_is_set()
                {
                    global $conn;
                    $query = "SELECT * FROM course_info WHERE prof_ldap='".$_SESSION['ldap_id']."'";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result)>0)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                /*
                function get_course_code()
                {
                    global $conn;
                    $query = "SELECT * FROM course_info WHERE prof_ldap='".$_SESSION['ldap_id']."'";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            return $row;
                        }
                    }
                    else
                    {
                        return false;
                    }
                }
                 * 
                 */
                
                $query = "SELECT * FROM student_applications WHERE course_code='".$_SESSION['course_code']."'";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        
                        echo "<tr>";
                        
                        $student_name = NULL;
                        $student_message = NULL;
                        $query_student_info = "SELECT * FROM student_details WHERE ldap_id='".$row['ldap_id']."'";
                        $result_query_student_info = mysqli_query($conn, $query_student_info);
                        if(mysqli_num_rows($result_query_student_info)>0)
                        {
                            while($row2 = mysqli_fetch_assoc($result_query_student_info))
                            {
                                echo "<td>".$row2['name']."</td>";
                                echo "<td>".$row2['department']."</td>";
                                echo "<td>".$row2['year_of_study']."</td>";
                                echo "<td>".$row2['cpi']."</td>";
                                echo "<td>".$row['grade']."</td>";
                                echo "<td>".$row2['contact_number']."</td>";
                                
                                $student_name = $row2['name'];
                                
                                echo "<input type='hidden' name='ldap_id_".$row['ldap_id']."' "
                                        . "value='".$row['ldap_id']."' form='mail-form' />";
                                
                            }
                        }
                        else
                        {
                            
                        }
                        
                        echo "<td>" 
                        . "<input type='submit' name='view_sop' value='View SOP' onclick='see_sop(\""
                                .$prof_details['sop_questions']."\", \"".$row['sop_answers']."\")'/>"
                        . "</td>";
                        
                        $selected = NULL;
                        $list_str = "";
                        
                        foreach($status_options as $key => $value)
                        {
                            if($row['status_of_application']==$key)
                            {
                                $list_str .= ("<option selected value='".$key."'>".$key."</option>");
                                $selected = $value;
                            }
                            else
                            {
                                $list_str .= ("<option value='".$key."'>".$key."</option>");
                            }
                        }
                        
//                        for($i = 0; $i < 4; $i++)
//                        {
//                            if($row['status_of_application']==$status_options[$i])
//                            {
//                                $list_str .= ("<option selected value='".$status_options[$i]."'>".$status_options[$i]."</option>");
//                                $selected = $status_options[$i];
//                            }
//                            else
//                            {
//                                $list_str .= ("<option value='".$status_options[$i]."'>".$status_options[$i]."</option>");
//                            }
//                        }
                        
//                        print_r($row);
                        //echo "<br>";
                        
                        echo "<td><textarea name='message_to_student_".$row['ldap_id']."' cols='10'>".$row['message_to_student']."</textarea></td>";
                        
                        echo "<td sorttable_customkey='".$selected."'>";
                        echo "<select name='status_".$row['ldap_id']."'>";
                        
                        echo ($list_str);
                        
                        echo "</select>"
                        . "<input type='hidden' name='selected_'".$row['ldap_id']."' value='$selected' />"
                        . "<input type='hidden' name='student_ldap_".$row['ldap_id']."' value='".$row['ldap_id']."' />"
                        . "<input type='hidden' name='student_name_".$row['ldap_id']."' value='".$student_name."' />";
                        echo "</td>";
                        
                        
                        echo "<td>"
                        . "<input type='text' size='5' value='".$row['waitlist_no']."' name='waitlist_no_".$row['ldap_id']."' />"
                        . "</td>";
                        
                        echo "<td>"
                        . $row['student_answer']
                        . "</td>";
                        
						echo "<td> <input type='checkbox' name='sendto[]' value='".$row['ldap_id']."@iitb.ac.in'></input> </td>";
                        echo "</tr>";

                        
                    }
                }
                else
                {
                    if($_SESSION['course_code']=="" || $_SESSION['course_code']==NULL)
                    {
                        echo "Please set your course info first.";
                    }
                }
                
                ?>
                
            </table>
            
            </form>
            
        </div>

        <footer class="footer">
    <div class="container">
        <br>
        <p>In case of any problems with the portal, or any bugs, please <a href="helpmail.php">Click here</a></p>
    </div>
</footer>

    </body>
</html>

