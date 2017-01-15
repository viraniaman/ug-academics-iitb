


<?php

session_start();
require_once('connection.php');
$ldap_id = $_SESSION['ldap_id'];

if(isset($_POST['sop1']))
{
    echo "sop1 => ".$_POST['sop1'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<!--  <title>My Applications</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  <style>
  td, th {
      text-align: center;
      vertical-align: middle;
  }
  </style>-->
</head>
<body>

<!--<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">TA Selection Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="student.php">All Courses</a></li>
      <li class="active"><a href="my_applications.php">My Applications</a></li>
      <li><a href="my_info.php">My Info</a></li>
    </ul>
  </div>
</nav>-->
    
<container class='container'>
    <form action='textarea_test.php' method='post'>
        <textarea name='sop1' ></textarea>
        <input type='submit' name='submit-btn' value='Submit' />
    </form>
</container>
    
</body>

</html>
    
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

