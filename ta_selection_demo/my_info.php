<?php
session_start();
require_once('connection.php');
require_once ('session_details.php');

//require_once('department_assoc_array.php');

if(!isset($_SESSION['ldap_id']))
{
    die( 'hahaha clever guy first login');
}

if($_SESSION['user_type']!='student')
{
    header("location: index.php");
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
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">TA Selection Portal</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="student.php">All Courses</a></li>
                    <li><a href="my_applications.php">My Applications</a></li>
                    <li class="active"><a href="my_info.php">My Info</a></li>
                </ul>
                <a href="logout.php" class="navbar-brand pull-right">Logout</a>
            </div>
        </nav>

        <div class="container">
            <h3>All your information is here. Edit as desired</h3>
            <form action="my_info.php" method="post">
                <?php
                
                $query = "SELECT * FROM student_details WHERE ldap_id='".$_SESSION['ldap_id']."'";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result)==0)
                {
                    die("User does not exist. Please log in using your LDAP id");
                }
                else
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<table class='table'>
                                <tr>
                                <th>Name</th>
                                <td>".$row['name']."<td>"
                                . "</tr>"
                                . "<tr>"
                                . "<th>Department</th>"
                                . "<td>".$row['department']."</td>"
                                . "</tr>"
                                . "<th>LDAP ID</th>"
                                . "<td>".$row['ldap_id']."</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<th>Year of study</th>"
                                . "<td><input type='number' name='year_of_study' value='".$row['year_of_study']."' required></td>"
                                . "</tr>"
                                . "<tr>"
                                . "<th>CPI</th>"
                                . "<td><input type='text' name='cpi' value='".$row['cpi']."' required></td>"
                                . "</tr>"
                                . "<tr>"
                                . "<th>Contact number</th>"
                                . "<td><input type='text' name='contact_number' value='".$row['contact_number']."' required></td>"
                                . "</tr>"
                                . "</table>";
                    }
                }
                
                ?>
                <input type="submit" value="Update Information" style="float: right"/>
                
            </form>
                
        </div>
        <footer class="footer">
    <div class="container">
        <br>
        <p>In case of any problems with the portal, or any bugs, please <a href="helpmail.php">Click here</a></p>
    </div>

    </body>
</html>
<?php

//Script to handle the post requests to change info

if(isset($_POST['cpi'])||isset($_POST['year_of_study'])||isset($_POST['contact_number']))
{
    $query = "UPDATE student_details SET cpi='".$_POST['cpi']."', year_of_study='".$_POST['year_of_study']."', contact_number='".$_POST['contact_number']."' WHERE ldap_id='".$_SESSION['ldap_id']."'";
    if(mysqli_query($conn, $query))
    {
        header("location: my_info.php");
    }
    else
    {
        die(mysqli_error($conn));
    }
}


?>

