<?php
//FACULTY PAGE
session_start();
require_once 'connection.php';
require_once 'sendmail.php';

//$_SESSION['ldap_id'] = 'sample_ldap';

if(!isset($_SESSION['ldap_id']))
{
    die("Please login first!");
}

if($_SESSION['user_type']!='faculty')
{
    header("location: index.php");
}

$content = NULL;

if(isset($_POST['submit-btn']))
{
    $to = array();
    $from = $_SESSION['ldap_id'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    foreach($_POST as $key => $value)
    {
        if(preg_match("/^ldap_id_/", $key))
        {
            array_push($to, $value."@iitb.ac.in");
        }
    }
    if(send_mail($to, $from, $subject, $message))
    {
        $content = "Successfully sent mail!";
    }
    else
    {
        $content = "Couldn't send mail!";
    }
}
else 
{
    $content = "<form action='mail_all_students.php' method='post' id='mail-content'>
                <br/><input type='text' name='subject' size='61' placeholder='Enter subject here'/> <br/><br/>
                <textarea rows='10' cols='60' name='message' placeholder='Enter message here'></textarea><br/><br/>
                <input type='submit' name='submit-btn' value='Send Mail' />
            </form>";
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Email Students</title>
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
                    <a class="navbar-brand" href="#">Project Allocation Portal</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="faculty.php">View & Edit Student Applications</a></li>
                    <li><a href="edit_project_info.php">Edit Project Information</a></li>
                </ul>
                <a href="logout.php" class="navbar-brand pull-right">Logout</a>
            </div>
        </nav>

        <div class="container">
            
            <?php 
            
            echo $content;
            
            foreach($_POST as $key => $value)
            {
                if(preg_match("/^ldap_id_/", $key))
                {
                    echo "<input name='$key' value='$value' type='hidden' form='mail-content' />";
                }
            }
            
            ?>
            
            
            
        </div>
<footer class="footer">
    <div class="container">
        <br>
        <p>In case of any problems with the portal, or any bugs, please <a href="helpmail.php">Click here</a></p>
    </div>

    </body>
</html>

