<?php

try
{
    require_once 'connection.php';
} catch (Exception $ex) {
    die($ex);
};
require_once 'department_assoc_array.php';

if (isset($_SESSION['ldap_id'])) {
    if ($_SESSION['user_type'] == 'student' && $_SESSION['ldap_id']!='sunnysoni' ) {
        header("location: student.php");
    } else {
        header("location: faculty.php");
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Project Allocation Portal</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <style>
        th, td {
            padding: 15px;
            text-align: left;
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
                    <a class="navbar-brand" href="#">Project Allocation Portal </a>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            
            <?php
            
            if(isset($_GET['failed']))
            {
                if($_GET['failed']=='true')
                {
                    echo "<center>Please enter correct LDAP details!";
                }
            }
            
            ?>
            
            
        <form method="POST" action="index.php">		
            <center>
            <h3>For Faculty</h3>
            <table class="table-bordered">
                    <tr><td>LDAP ID:</td> <td><input type='text' name='username1'></td></tr>
                    <tr><td>Password: </td> <td><input type='password' name='password1'></td></tr>
                    <tr><td><td><input type='submit'  name='login1' class='btn btn-success' value='Submit'></td></td></tr>
                </table>
            </center>
        </form>

        <form method="POST" action="index.php">
            <center>
            <h3>For Students</h3>
            <table class="table-bordered">
                <tr><td>LDAP ID:</td> <td><input type='text' name='username2'></td></tr>
                <tr><td>Password: </td> <td><input type='password' name='password2'></td></tr>
                <tr><td><td><input type='submit'  name='login2' class='btn btn-success' value='Submit'></td></td></tr>
            </table>
            </center>
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

function ldap_auth($ldap_id, $ldap_password) {
    $ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
    if ($ldap_id == '')
        die("You have not entered any LDAP ID. Please go back and fill it up.");
    $sr = ldap_search($ds, "dc=iitb,dc=ac,dc=in", "(uid=$ldap_id)");
    $info = ldap_get_entries($ds, $sr);
    $ldap_id = $info[0]['dn'];
    if (@ldap_bind($ds, $ldap_id, $ldap_password)) {
        $_SESSION['ldap_id'] = $ldap_id;
        $_SESSION['passwd'] = $ldap_password;
        return true;
    } else {
        return false;
    }
}

function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}

function is_faculty($ldap_id) {
    $ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
    $sr = ldap_search($ds, "dc=iitb,dc=ac,dc=in", "(uid=$ldap_id)");
    $info = ldap_get_entries($ds, $sr);
    $l_id = $info[0]['dn'];
    $l_id_arr = explode(",", $l_id);
    $user_is_faculty = endsWith($l_id_arr[1], "FAC");
    return $user_is_faculty;
}

if (isset($_POST['login1'])) {
    $username = $_POST['username1'];
    $password = $_POST['password1'];
    if (ldap_auth($username, $password)) {

        if (is_faculty($username)) {
            $_SESSION['ldap_id'] = $username;
            $_SESSION['user_type'] = 'faculty';

            $ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
            $sr = ldap_search($ds, "dc=iitb,dc=ac,dc=in", "(uid=$username)");
            $info = ldap_get_entries($ds, $sr);

            $_SESSION['prof_name'] = $info[0]['cn'][0];
            $str = explode(",", $info[0]['dn'])[2];
            $_SESSION['department'] = $department_to_very_short[substr($str, (strrpos($str, "=")) + 1)];

            header("location: faculty.php");
        } else {
            die('Please enter your LDAP ID in the correct field');
        }
    } else {
        echo 'ldap not authenticated :(';
        header("location: index.php?failed=true");
    }
} else if (isset($_POST['login2'])) {
    $username = $_POST['username2'];
    $password = $_POST['password2'];
    if (ldap_auth($username, $password)) {

        if (!is_faculty($username)) {
            $_SESSION['ldap_id'] = $username;
            $_SESSION['user_type'] = 'student';
            $next_page = "location: student.php";

            //Add entry to student details database if doesnt already exist

            $check_query = "SELECT ldap_id FROM student_project_details WHERE ldap_id='" . $username . "'";
            $result = mysqli_query($conn, $check_query);
            if (mysqli_num_rows($result) == 0) {
                //Getting Name and department from ldap database

                $ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
                $sr = ldap_search($ds, "dc=iitb,dc=ac,dc=in", "(uid=$username)");
                $info = ldap_get_entries($ds, $sr);
                $name = $info[0]['cn'][0]; //This is the name
                $department = NULL;

                foreach ($department_to_very_short as $short => $long) {
                    $dep = explode(",", $info[0]['dn'])[2];
                    if (("ou=" . $short) == $dep) {
                        $department = $long;
                        break;
                    } else {
                        $department = "Enter Full Name of department here";
                    }
                }

                $insert_query = "INSERT INTO student_project_details (ldap_id, name, department) VALUES ('" . $username . "', '" . $name . "', '" . $department . "')";
                if (mysqli_query($conn, $insert_query)) {
                    $next_page = "location: my_info.php";
                } else {
                    echo mysqli_error($conn);
                    die();
                }
            }
            header($next_page);
        } else {
            die('Please enter your LDAP ID in the correct field');
        }
    } else {
        echo 'ldap not authenticated :(';
        header("location: index.php?failed=true");
    }
    mysqli_close($conn);
}
?>

