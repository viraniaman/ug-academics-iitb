<?php
//FACULTY PAGE
session_start();
require_once 'connection.php';

if(!isset($_SESSION['ldap_id']))
{
   die("Please login first!");
}

if($_SESSION['user_type']!='faculty')
{
//  header("location: index.php");
}


//$_SESSION['ldap_id'] = 'sample_ldap';

function get_reformatted_date($date)
{
    
    $date_array1 = explode("/", $date);
    $date_array2 = explode("-", $date);
    if(count($date_array2) == 3)
    {
        return $date;
    }
    return $date_array1[2]."-".$date_array1[0]."-".$date_array1[1];
}

$project_info = array();

$query = "SELECT * FROM project_info WHERE prof_ldap='".$_SESSION['ldap_id']."'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $project_info = $row;
    }
}

$_SESSION['project_name'] = $project_info['project_name'];

$sop_questions = explode(";@;", $project_info['sop_questions']);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Project Information</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/jquery-ui.css">
        <script src="bootstrap/jquery-1.10.2.js"></script>
        <script src="bootstrap/jquery-ui.js"></script>
        <script>
        $(function() 
        {
            $( "#datepicker" ).datepicker();
        });
        $(function() 
        {
            $( "#datepicker2" ).datepicker();
        });
        $(function() 
        {
            $( "#datepicker3" ).datepicker();
        });
        </script>
        
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
            
        Element.prototype.remove = function() 
        {
            this.parentElement.removeChild(this);
        }
        NodeList.prototype.remove = HTMLCollection.prototype.remove = function() 
        {
            for(var i = this.length - 1; i >= 0; i--) 
            {
                if(this[i] && this[i].parentElement) 
                {
                    this[i].parentElement.removeChild(this[i]);
                }
            }
        }
        
        function add_fields()
        {
            // Number of inputs to create
            
            var i = document.getElementById('num_q').value;
            j = parseInt(i);
            var container = document.getElementById('container2');
            var text = document.createTextNode("Question " + (j+1) + ": ");
            var para = document.createElement('p');
            para.appendChild(text);
            para.id = 'sop_q_p_'+j;
            container.appendChild(para);
            // Create an <input> element, set its type and name attributes
            var input = document.createElement("input");
            input.type = "text";
            input.name = "sop_q_" + (j);
            input.id = "sop_q_" + (j);
            input.size = '60';
            container.appendChild(input);
            // Append a line break 
            var br = document.createElement("br");
            br.id = 'sop_q_br_'+j;
            container.appendChild(br);
            j+=1;
            document.getElementById('num_q').value = j.toString();
            
        }
        
        function remove_field()
        {
            var i = document.getElementById('num_q').value;
            var j = parseInt(i)-1;        
            if(j < 1)
            {
                return false;
            }
            document.getElementById('sop_q_'+j).remove();
            document.getElementById('sop_q_p_'+j).remove();
            document.getElementById('num_q').value = j;
            console.log("Value of num_q = "+j)
            
        }
        
        function check_sop_filled()
        {
            var i = document.getElementById('num_q').value;
            var j = parseInt(i);
            for(var k=0; k<j; k++)
            {
                if(document.getElementById('sop_q_'+k).value == '' || document.getElementById('sop_q_'+k).value == null)
                {
                    window.alert("Please fill all SOP questions before");
                    return false;
                }
            }
            return true;
        }
        
        </script>
        
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Project Allocation Portal</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="faculty.php">View & Edit Student Applications</a></li>
                    <li class="active"><a href="edit_project_info.php">Edit Project Information</a></li>
                </ul>
                 <a href="logout.php" class="navbar-brand pull-right">Logout</a>
            </div>
        </nav>

        <div class="container">
            
            <?php
            
            if($_SESSION['project_info_edit_successful'] == 1)
            {
                echo "<p style='color:red'>Details successfully updated!</p><br/>";
                $_SESSION['project_info_edit_successful'] = 0;
            }
            
            ?>
            
            <form action="submit_project_details.php" method="post">            
            <table class="table">
                <tr>
                    <th>
                        Project Title:
                    </th>
                    <td>
                        <?php 
  		//	echo "<input type='text' name='project_name' value='".$project_info['project_name']."'  required/>";
                       
                        if($project_info['project_name'] != '' && $project_info['project_name'] != NULL)
                       {
                         echo "<input type='text' name='project_name' value='".$project_info['project_name']."' readonly/>";
                       }
                       else
                       {
                         echo "<input type='text' name='project_name' value='".$project_info['project_name']."' required/>";
                       }
                        
                        
                        ?>
                        
                        <br><br>
                        <p>
                        </p>
                        
                        
                    </td>
                </tr>
                
                <tr>
                    <th>
                        Department:
                    </th>
                    <td>
                        <?php
                             echo $_SESSION['department'];
 
			//	echo "<input type='text' name='department' value='".$project_info['department']."'/>";
			?>
                    </td>
                </tr>
                
                <tr>
                    <th>
                        Application Deadline for Project Allocation:
                    </th>
                    <td>
                        <?php echo "<input type='text' name='deadline' value='".$project_info['deadline']."' id='datepicker' required/>";?>
                    </td>
                </tr>
                
                <tr>
                    <th>
                        Eligibility Criteria:
                    </th>
                    <td>
                        <?php echo "<input type='text' size='80' placeholder='Any prerequisites, academic area, department specific, particular course specific' name='eligibility_criteria' value='".$project_info['eligibility_criteria']."'/>";?>
                    </td>
                </tr>
                
                <tr>
                    <th>
                        Project Details:
                    </th>
                    <td>
                        <?php echo "<textarea cols='50' rows='3' name='project_details'>".$project_info['project_details']."</textarea>";?>
                    </td>
                </tr>
                
                <tr>
                    <th>
                        Interviews Start Date:
                    </th>
                    <td>
                        <?php echo "<input type='text' name='interview_start_date' value='".$project_info['interview_start_date']."' id='datepicker2' required/>";?>
                    </td>
                </tr>
                
                <tr>
                    <th>
                        Interviews End Date:
                    </th>
                    <td>
                        <?php echo "<input type='text' name='interview_end_date' value='".$project_info['interview_end_date']."' id='datepicker3' required/>";?>
                    </td>
                </tr>
                
                <tr>
                    <th>
                    </th>
                </tr>
                
                
                
            </table>
                
            <input type="submit" name="save_project_info" value="Save Project Information" class="btn" style="float:right"
                   onclick="return check_sop_filled()"/>
            <p> <a href="add_new_project.php">Add new projects</a> <br>
		<a href="edit_other_projects.php">Edit other Projects</a></p>
            <h3> Questions for students applying for : [not mandatory]</h3>
            
            <div id="container2">
                <?php
                
                echo "<input type='hidden' id='num_q' value='".count($sop_questions)."' />";
                
                if(count($sop_questions) > 0)
                {
                    for($i = 0; $i < count($sop_questions); $i++)
                    {
                        echo "<p id='sop_q_p_$i' >Question ".($i+1).": </p><input type='text' size='60' name='sop_q_$i' value='$sop_questions[$i]' id='sop_q_$i'/><br/>";  
                    }
                }
                else
                {
                    echo "<p id='sop_q_p_0'>Question 1: </p><input type='text' size='60' name='sop_q_0' id='sop_q_0'/><br/>";  
                }
                
                ?>
                
                
                
            </div>
            </form>
            
            <button id="add_q_btn" onclick="add_fields()">Add Another Question</button>
            <button id="remove_q_btn" onclick="window.confirm('Are you sure you want to remove this question?'); remove_field()">Remove Last Question</button>
            
        </div>
<footer class="footer">
    <div class="container">
        <br>
        <p>In case of any problems with the portal, or any bugs, please <a href="helpmail.php">Click here</a></p>
    </div>

    </body>
</html>
