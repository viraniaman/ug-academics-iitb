<?php
require_once("functions.php");
session_start();
if (!isset($_SESSION['ldap_id'])) {
    header('location:index.php');
}
$l1 = false;
$l2 = false;
$l3 = false;
$l4 = false;
$user = sha1($_SESSION['ldap_id']);
include 'connect.php';
$query = "SELECT * FROM labfeedback_me113_2015 WHERE name='$user'";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
if (mysqli_num_rows($result) == 1) $l1 = true;
$query = "SELECT * FROM labfeedback_me119_2015 WHERE name='$user'";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
if (mysqli_num_rows($result) == 1) $l2 = true;
$query = "SELECT * FROM labfeedback_ch117_2015 WHERE name='$user'";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
if (mysqli_num_rows($result) == 1) $l3 = true;
$query = "SELECT * FROM labfeedback_ph117_2015 WHERE name='$user'";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
if (mysqli_num_rows($result) == 1) $l4 = true;
mysqli_close($link);
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Course Details | Lab Feedback</title>

  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

    <link rel="stylesheet" href="css/style.css">
<style type="text/css">
table {
  max-width: 800px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.1);
}
td {
  padding: 10px;
}
</style>
</head>

<body>
<div style="text-align: center;"> <h2>Lab Feedback Portal</h2></div>
    <div class="wrapper">       
            <table><div style="text-align: center;"> <h4>Lab Courses</h4><h5> Select YOUR instructor for the corresponding course <br>and click on the "Add feedback" button adjacent to it. </h5></div>
        <tr><td><strong>Course Number</strong></td><td><strong>Course Name</strong></td><td><strong>Instructor(s)</strong></td><td></td></tr>
        <tr><td>ME113</td><td>Workshop Practice</td><td>De Amitava</td><td>
          <?php if ($l1) echo 'feedback submitted'; else echo '<form action="form.php" method="post">
		  <input type="hidden" name="me113" value="De Amitava"><div style="text-align: center;"> <h4>
		  <input type="submit" name="add" value="Add Feedback" class="btn btn-info">
		  </h4></div></form>';?></td></tr>
        <tr><form action="form.php" method="post"><td>ME119</td><td>Engineering Graphics & Drawing</td><td>
                        <input type="radio" name="me119" value="Rane Milind" checked="checked"> Rane Milind<br>
						<input type="radio" name="me119" value="Karunakaran K.P"> Karunakaran K.P<br>
                        <input type="radio" name="me119" value="Upendra Bhandarkar & Krishna Jonnalagadda"> Upendra Bhandarkar &amp;<br>&nbsp;&nbsp;&nbsp; Krishna Jonnalagadda</td><td>
        <?php if ($l2) echo 'feedback submitted'; else echo '<div style="text-align: center;"> <h4>
		<input type="submit" name="add" value="Add Feedback" class="btn btn-info"></h4></div>';?></td></form></tr>
        <tr><form action="form.php" method="post"><td>CH117</td><td>Chemistry Lab</td><td>
		<input type="radio" name="ch117" value="C.P. Rao" checked="checked"> C.P. Rao<br>
		<input type="radio" name="ch117" value="Pradeep Kumar P.I"> Pradeep Kumar P.I</td><td>
        <?php if ($l3) echo 'feedback submitted'; else echo '<div style="text-align: center;"> <h4>
		<input type="submit" name="add" value="Add Feedback" class="btn btn-info"></h4></div>';?></form></td></tr>
        <tr><form action="form.php" method="post"><td>PH117</td><td>Physics Lab</td><td>
		<input type="radio" name="ph117" value="Mahajan Avinash V." checked="checked"> Mahajan Avinash V.<br>
		<input type="radio" name="ph117" value="S. Dhar"> S. Dhar
		</td><td>
        <?php if ($l4) echo 'feedback submitted'; else echo '<div style="text-align: center;"> <h4>
		<input type="submit" name="add" value="Add Feedback" class="btn btn-info"></h4></div>';?></form></td></tr>
      
      </table>
      <div style="text-align: center;"> <h4><a href="index.php?id=done">Done!</a></h4></div>
  </div>

</body>

</html>