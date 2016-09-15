<?php

    session_start();
    require_once('connection.php');
    
    //require_once('department_assoc_array.php');
    
    /*if(!isset($_SESSION['ldap_id']))
    {
        echo 'hahaha clever guy first login';
    }*/
    
    //=====================   TEMP CODE HERE   ===================
    $_SESSION['ldap_id'] = '140070009';
    
    //=====================   END OF TEMP CODE HERE   ===================
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Section</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">TA Selection Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="student.php">All Courses</a></li>
      <li><a href="my_applications.php">My Applications</a></li>
      <li><a href="my_info.php">My Info</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
    <h3>List of all courses you can apply to:</h3> <br>
  
    <h4>Department: </h4><?php

    $query = "SELECT DISTINCT department FROM course_info";
    $result = mysqli_query($conn, $query);
    echo "<form action='student.php' method='post' ><select name='department_list'>";
    echo "<option value='all'>All</option>";
    if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $res = $row['department'];
            //$res = preg_replace('/\s+/', '', $string);
            echo "<option value='".$res."'>".$row['department']."</option>";
        }
    }
    echo "</select><input type='submit' value='Submit'/></form>";
       
    ?> <br>
  
  <table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
      <tr>
        <th>Course Code</th>
        <th>Course Name</th>
        <th>Professor's Name</th>
        <th>Department</th>
        <th>Course Details</th>
        <th>Prerequisites</th>
        <th>Last Date<br>Of Application</th>
        <th>Extra Notes</th>
        <th>Apply</th>
      </tr>
    </thead>
    <tbody>
    <?php
    
    $sql = NULL;
    if(isset($_POST['department_list']))
    {
        if($_POST['department_list'] == 'all')
        {
            $sql = "SELECT * FROM course_info";
        }
        else
        {
            $sql = "SELECT * FROM course_info WHERE department='".$_POST['department_list']."'";
        }
    }
    else
    {
        $sql = "SELECT * FROM course_info";
    }
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>".$row['course_code']."</td>
                <td>".$row['course_name']."</td>
                <td>".$row['prof_name']."</td>
                <td>".$row['department']."</td>
                <td>".$row['course_details']."</td>
                <td>".$row['eligibility_criteria']."</td>
                <td>".$row['deadline']."</td>
                <td>".$row['extra_notes']."</td>
                <td><form action='apply.php' method='post'><input class='btn mini blue-stripe' type='submit' name='".$row['course_code']."' onclick='return window.confirm(\"Are you sure you want to apply for this course?\");' value='Apply'></input></form></td>
           </tr>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    ?>        
      </tr>
    </tbody>
  </table>
  
</div>

</body>
</html>

