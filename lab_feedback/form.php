<?php
require_once("functions.php");
session_start();
if (!isset($_SESSION['ldap_id'])) {
    header('location:index.php');
}
if (isset($_POST['add'])) {
    if (isset($_POST['me113'])) {
        $course = 'ME113';
        $instructor = $_POST['me113'];
    }
    if (isset($_POST['me119'])) {
        $course = 'ME119';
        $instructor = $_POST['me119'];
    }
    if (isset($_POST['ch117'])) {
        $course = 'CH117';
        $instructor = $_POST['ch117'];
    }
    if (isset($_POST['ph117'])) {
        $course = 'PH117';
        $instructor = $_POST['ph117'];
    }
} else header('location:course.php');
$info = ldap_find_all('uid',$_SESSION['ldap_id']);
$user = sha1($_SESSION['ldap_id']);
$div = 'd1';
$fullname = $info[0]["cn"][0];
$roll = $info[0]["employeenumber"][0];
$dep = explode(",",$info[0]["dn"]);
$alldepartment = explode("=",$dep[2]);
$mydepartment=$alldepartment[1];
$year = explode('/',$info[0]["mailmessagestore"][0]);
$year_of_study=2015-$year[2]; 
if ((strpos($roll,'14002')===0) || (strpos($roll,'14005')===0)) $div= 'd1';
if ((strpos($roll,'14001')===0) || (strpos($roll,'14011')===0) || (strpos($roll,'14D11')===0) || (strpos($roll,'14D17')===0)) $div= 'd2';
if ((strpos($roll,'14010')===0) || (strpos($roll,'14026')===0) || (strpos($roll,'14B03')===0) || (strpos($roll,'14D10')===0) || (strpos($roll,'14D26')===0)) $div= 'd3';
if ((strpos($roll,'14004')===0) || (strpos($roll,'14007')===0) || (strpos($roll,'14D07')===0)) $div= 'd4';
if(isset($_POST['submit'])) {
	include 'connect.php';
    $q1=$_POST['Q1'];
    $q2=$_POST['Q2'];
    $q3=$_POST['Q3'];
    $q4=$_POST['Q4'];
    $q5=$_POST['Q5'];
    $q6=$_POST['Q6'];
    $c1=mysqli_real_escape_string($link, $_POST['c1']);
    $c2=mysqli_real_escape_string($link, $_POST['c2']);
    $c3=mysqli_real_escape_string($link, $_POST['c3']);
    $cr3=$_POST['cr3'];
    $c4=mysqli_real_escape_string($link, $_POST['c4']);
    $cr4=$_POST['cr4'];
    $c5=mysqli_real_escape_string($link, $_POST['c5']);
    if ($_POST['course']=='ME113') {
        $query = "INSERT INTO labfeedback_me113_2015 (name, department, division, q1, q2, q3, q4, q5, q6, c1, c2, c3, cr3, c4, c5, cr4)" .
        " VALUES ('$user','$mydepartment','$div','$q1','$q2','$q3','$q4','$q5','$q6','$c1','$c2','$c3','$cr3','$c4','$c5','$cr4')";
    }
    elseif ($_POST['course']=='ME119') {
        $query = "INSERT INTO labfeedback_me119_2015 (name, department, division, q1, q2, q3, q4, q5, q6, c1, c2, c3, cr3, c4, c5, cr4)".
        " VALUES ('$user','$mydepartment','$div','$q1','$q2','$q3','$q4','$q5','$q6','$c1','$c2','$c3','$cr3','$c4','$c5','$cr4')";
    }
    elseif ($_POST['course']=='CH117') {
        $query = "INSERT INTO labfeedback_ch117_2015 (name, department, division, q1, q2, q3, q4, q5, q6, c1, c2, c3, cr3, c4, c5, cr4)".
        " VALUES ('$user','$mydepartment','$div','$q1','$q2','$q3','$q4','$q5','$q6','$c1','$c2','$c3','$cr3','$c4','$c5','$cr4')";
    }
    elseif ($_POST['course']=='PH117') {
        $query = "INSERT INTO labfeedback_ph117_2015 (name, department, division, q1, q2, q3, q4, q5, q6, c1, c2, c3, cr3, c4, c5, cr4)".
        " VALUES ('$user','$mydepartment','$div','$q1','$q2','$q3','$q4','$q5','$q6','$c1','$c2','$c3','$cr3','$c4','$c5','$cr4')";
    }
  $result = mysqli_query($link, $query) or die ('Error connecting to database');
  mysqli_close($link);
  echo '<div style="margin-left:40%; margin-top: 50px;"><h4>Your response has been recorded. <br><a href="course.php">Add another response</a></h4></div><br><a href="index.php?id=done">Done</a></h4></div>';
} else {

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Lab Feedback Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
    form {
        margin-bottom: 30px;
    }
    div.page-header {
        margin: auto;
        width: 800px;
    }
    div.container {
        margin-top: 30px;
    }
    table {
        margin: auto;
        width: 800px;
        margin-bottom: 10px;
    }
tr.content td {
    padding-bottom: 20px;
    padding-right: 20px;
}
    </style>

</head>
<body>

<div class="container">

<div class="page-header"><h1>Feedback Form</h1>
    <h4>
 II Semester 2014-15</h4><h5>
 <span><strong>Course Number: </strong> <?php echo $course;?></span>
 <span style="margin: 50px;"><strong>Course Instructor: </strong><?php echo $instructor; ?></span></h5>
    </div>
<div class="container">
<form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
    <table>


<tr><th colspan="4">
    <div class="well well-sm"><strong><!--<span class="glyphicon glyphicon-asterisk"></span>-->Design of Experiments</strong></div></th>
</tr>
<tr><td width="40px"> </td><td><div class="well well-sm">S. No.</div></td>
<td><div class="well well-sm">Question</div></td>
<td><div class="well well-sm">Response</div></td></tr>
<tr class="content"><td> </td><td>1</td>
<td>To what extent did the experiments provide new insights and /or encourage you to think
creatively?</td>
<td><div class="input-group"> <select name="Q1">
                        <option value="no_opinion">No Opinion</option>
                        <option value="excellent">Excellent</option>
                        <option value="good">Good</option>
                        <option value="average">Average</option>
                        <option value="poor">Poor</option>
                        <option value="very_poor">Very Poor</option>
                    </select>
                    </div></td></tr>
<tr class="content"><td> </td><td>2</td>
<td>Were adequate background material / instructions provided for carrying out the experiments?</td>
<td><div class="input-group"> <select name="Q2">
                        <option value="no_opinion">No Opinion</option>
                        <option value="excellent">Excellent</option>
                        <option value="good">Good</option>
                        <option value="average">Average</option>
                        <option value="poor">Poor</option>
                        <option value="very_poor">Very Poor</option>
                    </select>
                    

                    </div></td></tr>


<tr><th colspan="4">
    <div class="well well-sm"><strong><!--<span class="glyphicon glyphicon-asterisk"></span>-->Organization of Lab and conducting of Experiments</strong></div></th>
</tr>
<tr><td width="40px"> </td><td><div class="well well-sm">S. No.</div></td>
<td><div class="well well-sm">Question </div></td>
<td><div class="well well-sm">Response</div></td></tr>
<tr class="content"><td> </td><td>1</td>
<td>To what extent was systematic execution of lab work emphasized?</td>
<td><div class="input-group"> <select name="Q3">
                        <option value="no_opinion">No Opinion</option>
                        <option value="excellent">Excellent</option>
                        <option value="good">Good</option>
                        <option value="average">Average</option>
                        <option value="poor">Poor</option>
                        <option value="very_poor">Very Poor</option>
                    </select>
                    </div></td></tr>
<tr class="content"><td> </td><td>2</td>
<td>To what extent was analysis of observations/ results encouraged?</td>
<td><div class="input-group"> <select name="Q4">
                        <option value="no_opinion">No Opinion</option>
                        <option value="excellent">Excellent</option>
                        <option value="good">Good</option>
                        <option value="average">Average</option>
                        <option value="poor">Poor</option>
                        <option value="very_poor">Very Poor</option>
                    </select>
                    

                    </div></td></tr>

<tr><th colspan="4">
    <div class="well well-sm"><strong><!--<span class="glyphicon glyphicon-asterisk"></span>-->Evaluation</strong></div></th>
</tr>
<tr><td width="40px"> </td><td><div class="well well-sm">S. No.</div></td>
<td><div class="well well-sm">Question</div></td>
<td><div class="well well-sm">Response</div></td></tr>
<tr class="content"><td> </td><td>1</td>
<td>Was the feedback on your lab performance prompt?</td>
<td><div class="input-group"> <select name="Q5">
                        <option value="no_opinion">No Opinion</option>
                        <option value="strongly_agree">Strongly Agree</option>
                        <option value="agree">Agree</option>
                        <option value="neutral">Neutral</option>
                        <option value="disagree">Disagree</option>
                        <option value="strongly_disagree">Strongly Disagree</option>
                    </select>
                    </div></td></tr>
<tr class="content"><td> </td><td>2</td>
<td>Was the feedback on your laboratory work useful?</td>
<td><div class="input-group"> <select name="Q6">
                        <option value="no_opinion">No Opinion</option>
                        <option value="strongly_agree">Strongly Agree</option>
                        <option value="agree">Agree</option>
                        <option value="neutral">Neutral</option>
                        <option value="disagree">Disagree</option>
                        <option value="strongly_disagree">Strongly Disagree</option>
                    </select>
                    

                    </div></td></tr>
<tr><th colspan="4">
    <div class="well well-sm"><strong>General Comments (<span class="glyphicon glyphicon-asterisk"></span> Required Field)</strong></div></th></tr>
    <tr><td width="40px"> </td><td><strong>Question: </strong></td>
<td>What did you like most about this course?</td><td></td></tr>
 <tr  class="content"><td width="40px"> </td><td><strong>Feedback: </strong></td>
<td><textarea name="c1" id="Inputc1" class="form-control" rows="3"></textarea>
 </td><td></td></tr>
     <tr><td width="40px"> </td><td><strong>Question: </strong></td>
<td>What did you dislike the most about this course?</td><td></td></tr>
 <tr class="content"><td width="40px"> </td><td><strong>Feedback: </strong></td>
<td><textarea name="c2" id="Inputc2" class="form-control" rows="3"></textarea>
 </td><td></td></tr>
     <tr><td width="40px"> </td><td><strong>Question: </strong></td>
<td>How effective was the help provided by the teaching assistants?</td><td></td></tr>
<tr><td width="40px"> </td><td><strong>Rate: </strong></td>
    <td><select name="cr3"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select> <font color="blue"> Note: 1 is lowest &amp; 5 is highest</font></td><td></td></tr>
 <tr class="content"><td width="40px"> </td><td><strong>Feedback*: </strong></td>
<td><textarea name="c3" id="Inputc3" class="form-control" rows="3" required></textarea>
 </td><td></td></tr>
     <tr><td width="40px"> </td><td><strong>Question: </strong></td>
<td>Were the facilities/equipments adequate for the experiments?</td><td></td></tr>
<tr><td width="40px"> </td><td><strong>Rate: </strong></td>
    <td><select name="cr4"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select><font color="blue"> Note: 1 is lowest &amp; 5 is highest</font></td><td></td></tr>
 <tr class="content"><td width="40px"> </td><td><strong>Feedback*: </strong></td>
<td><textarea name="c4" id="Inputc4" class="form-control" rows="3" required></textarea>
 </td><td></td></tr>
     <tr><td width="40px"> </td><td><strong>Question: </strong></td>
<td>Any Suggestions or comments about the course</td><td></td></tr>
 <tr class="content"><td width="40px"> </td><td><strong>Feedback: </strong></td>
<td><textarea name="c5" id="Inputc5" class="form-control" rows="3"></textarea>
 </td><td></td></tr>

    </table><div style ="text-align:center;"> 
    <input type="hidden" name="course" value="<?php echo $course;?>">
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">  </div>         
        </form>
    </div></div></body></html>
    <?php } ?>