<?php

    session_start();
    require_once('connection.php');
    
    //require_once('department_assoc_array.php');
//    
    $_SESSION['ldap_id'] = 'stu_ldap_1';
    $_SESSION['user_type']='student';
   /* 
    if(!isset($_SESSION['ldap_id']))
    {
        die( 'Please login first');
    }
    if($_SESSION['user_type']!='student')
    {
        header("location: index.php");
    }
    
*/    
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
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"> Project Allocation Portal</a>
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
    <h3>List of all projects you can apply to:</h3> <br>
  
    <h4>Department: </h4><?php

    $query = "SELECT DISTINCT department FROM project_info";
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
        
        <th>Project Title</th>
        <th>Professor's Name</th>
        <th>Department</th>
        <th>Prerequisites</th>
        <th>Last Date<br>Of Application</th>
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
            $sql = "SELECT * FROM project_info";
        }
        else
        {
            $sql = "SELECT * FROM project_info WHERE department='".$_POST['department_list']."'";
        }
    }
    else
    {
        $sql = "SELECT * FROM project_info";
    }
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
               
                <td>".$row['project_name']."</td>
                <td>".$row['prof_name']."</td>
                <td>".$row['department']."</td>
                <td>".$row['eligibility_criteria']."</td>
                <td>".$row['deadline']."</td>
                <td><form action='apply.php' method='post'>
                <input class='btn mini blue-stripe' type='submit' name='".$row['project_name']."' value='Go to projects page'></input>
                    <input type='hidden' name='deadline' value='".$row['deadline']."'/></form></td>
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

<footer class="footer">
    <div class="container">
        <br>
        <p>In case of any problems with the portal, or any bugs, please <a href="helpmail.php">Click here</a></p>
    </div>
    
</body>
</html>

