<?php
require_once("functions.php");
session_start();
if (!isset($_SESSION['ldap_id'])) {
    header('location:index.php');
}
$info = ldap_find_all('uid',$_SESSION['ldap_id']);
$div = 'd';
$roll = $info[0]["employeenumber"][0];
if ((strpos($roll,'15002')===0) || (strpos($roll,'15005')===0) || (strpos($roll,'130110087')===0)) {
    $div= 'd1';
    $vf = file('./tutlist/d1.txt');
}
if ((strpos($roll,'15001')===0) || (strpos($roll,'15011')===0) || (strpos($roll,'15D11')===0) || (strpos($roll,'15D17')===0)) {
    $div= 'd2';
    $vf = file('./tutlist/d2.txt');
}
if ((strpos($roll,'15010')===0) || (strpos($roll,'15026')===0) || (strpos($roll,'15B03')===0) || (strpos($roll,'15D10')===0) || (strpos($roll,'15D26')===0)) {
    $div= 'd3';
    $vf = file('./tutlist/d3.txt');
}
if ((strpos($roll,'15004')===0) || (strpos($roll,'15007')===0) || (strpos($roll,'15D07')===0)) {
    $div= 'd4';
    $vf = file('./tutlist/d4.txt');
}
$l1 = false;
$l2 = false;
$l3 = false;
$l4 = false;
$l5 = false;
include 'connect.php';
$query = "SELECT * FROM tafeedback_2015_2 WHERE name='$roll' AND course='ma106'";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
if (mysqli_num_rows($result) > 0) $l1 = true;
$query = "SELECT * FROM tafeedback_2015_2 WHERE name='$roll' AND course='ph108'";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
if (mysqli_num_rows($result) > 0) $l2 = true;
$query = "SELECT * FROM tafeedback_2015_2 WHERE name='$roll' AND course='bb101_ug'";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
if (mysqli_num_rows($result) > 0) $l3 = true;
$query = "SELECT * FROM tafeedback_2015_2 WHERE name='$roll' AND course='bb101_pg'";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
if (mysqli_num_rows($result) > 0) $l4 = true;
$query = "SELECT * FROM tafeedback_2015_2 WHERE name='$roll' AND course='cs101'";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
if (mysqli_num_rows($result) > 0) $l5 = true;
mysqli_close($link);
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Course Details | TA Feedback</title>

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
    <div style="text-align: center;"> <h2>TA Feedback Portal</h2></div>      
            <div style="text-align: center;"> <h4>Courses</h4></div>
              <div style="margin: auto; max-width:500px; padding: 20px;">
  <p>Click on the "Add feedback" button adjacent to the course name to fill feedback for respective course</p><ol>
  <li>You are supposed to fill the feedback for Organic module in case of CH105</li>
  <li>BB 101 has 1 UG TA and 1 PG TA, you are requested to provide the feedback separately</li>
  <li>PH 107, in most sections has a team of 2 student TA’s and one professor, and you are requested to provide a combined feedback for it</li>
  <li>If you are aware of name of the TA, mention it on the feedback form in the space provided (optional)</li></ol></div>
  <table>
        <tr><td><strong>Course Number</strong></td><td><strong>Course Name</strong></td><td><strong>Instructor(s)</strong></td><td></td></tr>
        <tr><td>MA106</td><td>Linear Algebra</td><td>
          <?php if ($l1) echo 'feedback submitted'; else echo '<form action="form.php" method="post">
		  <input type="hidden" name="course" value="ma106"><div style="text-align: center;"> <h4>
		  <input type="submit" name="add" value="Add Feedback" class="btn btn-info">
		  </h4></div></form>';?></td></tr>
        <tr><form action="form.php" method="post"><td>PH108</td><td>Basics of Electricity &amp; Magnetism</td><td>
        <?php if ($l2) echo 'feedback submitted'; else echo '<input type="hidden" name="course" value="ph108">
		<div style="text-align: center;"> <h4>
		<input type="submit" name="add" value="Add Feedback" class="btn btn-info"></h4></div>';?></td></form></tr>
        <?php if ($div=='d1' || $div=='d3') { ?>
        <tr><form action="form.php" method="post"><td>BB101<br>(UG TA)</td><td>Biology</td><td>
        <?php if ($l3) echo 'feedback submitted'; else echo '<input type="hidden" name="course" value="bb101_ug">
		<div style="text-align: center;"> <h4>
		<input type="submit" name="add" value="Add Feedback" class="btn btn-info"></h4></div>';?></form></td></tr>
		<tr><form action="form.php" method="post"><td>BB101<br>(PG TA)</td><td>Biology</td><td>
        <?php if ($l4) echo 'feedback submitted'; else echo '<input type="hidden" name="course" value="bb101_pg">
		<div style="text-align: center;"> <h4>
		<input type="submit" name="add" value="Add Feedback" class="btn btn-info"></h4></div>';?></form></td></tr>
    <?php } elseif ($div=='d2' || $div == 'd4') {?>
      <tr><form action="form.php" method="post"><td>CS101</td><td>Computer Programming and Utilization</td><td>
        <?php if ($l5) echo 'feedback submitted'; else echo '<input type="hidden" name="course" value="cs101">
    <div style="text-align: center;"> <h4>
    <input type="submit" name="add" value="Add Feedback" class="btn btn-info"></h4></div>';?></td></form></tr>
    <?php } ?>
  
      
      </table>
      <div style="text-align: center;"> <h4><a href="index.php?id=done">Done!</a></h4></div>

</body>

</html>