<?php
require_once("functions.php");
session_start();
if (!isset($_SESSION['ldap_id'])) {
    header('location:index.php');
}

if (isset($_POST['add']) || isset($_POST['submit'])) {
    $course = $_POST['course'];
} else header('location:course.php');
$info = ldap_find_all('uid',$_SESSION['ldap_id']);
$div = 'd';
$fullname = $info[0]["cn"][0];
$roll = $info[0]["employeenumber"][0];
$dep = explode(",",$info[0]["dn"]);
$alldepartment = explode("=",$dep[2]);
$mydepartment=$alldepartment[1];
$year = explode('/',$info[0]["mailmessagestore"][0]);
$year_of_study=2015-$year[2]; 
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
$tutorial='T0';
if(count($vf) > 0){
            foreach ($vf as $key => $line)
            {
                $line1 = explode("  ", $line);
                $rollno = trim($line1[1]);
                if($rollno==$roll) {
                    $tutorial = trim($line1[3]);
                    break;
                }
            }
        }               

if(isset($_POST['submit'])) {
    include 'connect.php';
    $q1=$_POST['Q1'];
    $q2=$_POST['Q2'];
    $q3=$_POST['Q3'];
    $q4=$_POST['Q4'];
    $q5=$_POST['Q5'];
    $q6=$_POST['Q6'];
	$q7=$_POST['Q7'];
	$q8=$_POST['Q8'];
	$q9=$_POST['Q9'];
	$q10=$_POST['Q10'];
    //$course=$_POST['course'];
    $tutor=mysqli_real_escape_string($link, $_POST['tut']);
    $comments=mysqli_real_escape_string($link, $_POST['comment']);
    if(isset($_POST['prof'])) $prof = $_POST['prof'];
    else $prof='n';
    $l0 = false;
    if($course=='ma106') {
        $query = "SELECT * FROM tafeedback_2015 WHERE name='$roll' AND course='ma106'";
    $result = mysqli_query($link, $query) or die ('Error connecting to database');
    if (mysqli_num_rows($result) > 0) $l0 = true;
    } elseif($course=='ph108') {
        $query = "SELECT * FROM tafeedback_2015 WHERE name='$roll' AND course='ph108'";
        $result = mysqli_query($link, $query) or die ('Error connecting to database');
        if (mysqli_num_rows($result) > 0) $l0 = true;
    }elseif($course=='bb101_ug') {
        $query = "SELECT * FROM tafeedback_2015 WHERE name='$roll' AND course='bb101_ug'";
        $result = mysqli_query($link, $query) or die ('Error connecting to database');
        if (mysqli_num_rows($result) > 0) $l0 = true;
    }elseif($course=='bb101_pg') {
        $query = "SELECT * FROM tafeedback_2015 WHERE name='$roll' AND course='bb101_pg'";
        $result = mysqli_query($link, $query) or die ('Error connecting to database');
    if (mysqli_num_rows($result) > 0) $l0 = true;
    }elseif($course=='cs101') {
        $query = "SELECT * FROM tafeedback_2015 WHERE name='$roll' AND course='cs101'";
        $result = mysqli_query($link, $query) or die ('Error connecting to database');
    if (mysqli_num_rows($result) > 0) $l0 = true;
    }
    
    if($l0) echo '<div style="margin-left:40%; margin-top: 50px;"><h4>You have already given feedback for the course!! <br><a href="course.php">Add another response</a></h4></div><br></h4></div>';
    else {
        $query = "INSERT INTO tafeedback_2015 (name, department, division, tutorial, course, t_name, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, comments, prof) VALUES ('$roll','$mydepartment','$div', '$tutorial', '$course', '$tutor', '$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10', '$comments', '$prof')";
        $result = mysqli_query($link, $query) or die (mysqli_error());
        mysqli_close($link);
        echo '<div style="margin-left:40%; margin-top: 50px;"><h4>Your response has been recorded. <br><a href="course.php">Add another response</a></h4></div><br></h4></div>';
    }
} else {

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>TA Feedback Form</title>
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
 <span style="margin: 50px;"><strong>Division &amp; Tutorial: </strong><?php echo $div .' '.$tutorial; ?></span></h5>
    </div>
<div class="container">
<form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
    <table>

<tr>
    <td colspan="2" style="padding: 5px;">Tutor's name(optional): </td>
    <td><div class="input-group"><input type="text" name="tut"></div></td>
    <?php 
if ($course=='ph107') { ?><td><font color="blue">In case of multiple TAs, mention their names separated by comma</font></td> 
<?php } ?>
</tr>
<?php 
if ($course=='ch105') { ?><tr>
    <td colspan="2" style="padding: 5px;">Is your tutor the prof himself/herself: </td>
    <td><div class="input-group">
        <select name="prof">
            <option value="y">Yes</option>
            <option value="n">No</option>
        </select>
    </div></td>
</tr> <?php } ?>
<tr><th colspan="4">
    <div class="well well-sm"><strong><!--<span class="glyphicon glyphicon-asterisk"></span>-->Course-related questions</strong></div></th>
</tr>
<tr><td width="40px"> </td><td><div class="well well-sm">S. No.</div></td>
<td><div class="well well-sm">Question</div></td>
<td><div class="well well-sm">Response</div></td></tr>
<tr class="content"><td> </td><td>1</td>
<td>The tutorial questions tested my understanding of the lecture material *</td>
<td><div class="input-group"> <select name="Q1">
                        <option value="no_opinion">No Opinion</option>
                        <option value="strongly_agree">Strongly Agree</option>
                        <option value="agree">Agree</option>
                        <option value="neutral">Neutral</option>
                        <option value="disagree">Disagree</option>
                        <option value="strongly_disagree">Strongly Disagree</option>
                    </select>
                    </div></td></tr>
<tr class="content"><td> </td><td>2</td>
<td>The total questions were sufficient to cover all aspects of the syllabus *</td>
<td><div class="input-group"> <select name="Q2">
                        <option value="no_opinion">No Opinion</option>
                        <option value="strongly_agree">Strongly Agree</option>
                        <option value="agree">Agree</option>
                        <option value="neutral">Neutral</option>
                        <option value="disagree">Disagree</option>
                        <option value="strongly_disagree">Strongly Disagree</option>
                    </select>
                    

                    </div></td></tr>
					<tr class="content"><td> </td><td>3</td>
<td>The questions were of adequate difficulty (adequately graded between relatively) *</td>
<td><div class="input-group"> <select name="Q3">
                        <option value="no_opinion">No Opinion</option>
                        <option value="strongly_agree">Strongly Agree</option>
                        <option value="agree">Agree</option>
                        <option value="neutral">Neutral</option>
                        <option value="disagree">Disagree</option>
                        <option value="strongly_disagree">Strongly Disagree</option>
                    </select>
                    </div></td></tr>


<tr><th colspan="4">
    <div class="well well-sm"><strong><!--<span class="glyphicon glyphicon-asterisk"></span>-->Tutor-related questions</strong></div></th>
</tr>
<tr><td width="40px"> </td><td><div class="well well-sm">S. No.</div></td>
<td><div class="well well-sm">Question </div></td>
<td><div class="well well-sm">Response</div></td></tr>

<tr class="content"><td> </td><td>1</td>
<td>The tutorial instructor/s was/were punctual and conducted the allotted number of tutorials *</td>
<td><div class="input-group"> <select name="Q4">
                        <option value="no_opinion">No Opinion</option>
                        <option value="strongly_agree">Strongly Agree</option>
                        <option value="agree">Agree</option>
                        <option value="neutral">Neutral</option>
                        <option value="disagree">Disagree</option>
                        <option value="strongly_disagree">Strongly Disagree</option>
                    </select>
                    </div></td></tr>
<tr class="content"><td> </td><td>2</td>
<td>The tutorial instructor/s was/were well-prepared to solve the assigned problems *</td>
<td><div class="input-group"> <select name="Q5">
                        <option value="no_opinion">No Opinion</option>
                        <option value="strongly_agree">Strongly Agree</option>
                        <option value="agree">Agree</option>
                        <option value="neutral">Neutral</option>
                        <option value="disagree">Disagree</option>
                        <option value="strongly_disagree">Strongly Disagree</option>
                    </select>           

                    </div></td></tr>
<tr class="content"><td> </td><td>3</td>
<td>The tutorial instructor/s was/were able to adequately explain or clarify queries *</td>
<td><div class="input-group"> <select name="Q6">
                        <option value="no_opinion">No Opinion</option>
                        <option value="strongly_agree">Strongly Agree</option>
                        <option value="agree">Agree</option>
                        <option value="neutral">Neutral</option>
                        <option value="disagree">Disagree</option>
                        <option value="strongly_disagree">Strongly Disagree</option>
                    </select>           

                    </div></td></tr>
<tr class="content"><td> </td><td>4</td>
<td>The tutorial instructor/s encouraged classroom interactions *</td>
<td><div class="input-group"> <select name="Q7">
                        <option value="no_opinion">No Opinion</option>
                        <option value="strongly_agree">Strongly Agree</option>
                        <option value="agree">Agree</option>
                        <option value="neutral">Neutral</option>
                        <option value="disagree">Disagree</option>
                        <option value="strongly_disagree">Strongly Disagree</option>
                    </select>           

                    </div></td></tr>
<tr class="content"><td> </td><td>5</td>
<td>The tutorial instructor/s was/were able to explain background materials to solve *</td>
<td><div class="input-group"> <select name="Q8">
                        <option value="no_opinion">No Opinion</option>
                        <option value="strongly_agree">Strongly Agree</option>
                        <option value="agree">Agree</option>
                        <option value="neutral">Neutral</option>
                        <option value="disagree">Disagree</option>
                        <option value="strongly_disagree">Strongly Disagree</option>
                    </select>           

                    </div></td></tr>

					<tr class="content"><td> </td><td>6</td>
<td>The tutorial instructor/s was interested in students’ learning *</td>
<td><div class="input-group"> <select name="Q9">
                        <option value="no_opinion">No Opinion</option>
                        <option value="strongly_agree">Strongly Agree</option>
                        <option value="agree">Agree</option>
                        <option value="neutral">Neutral</option>
                        <option value="disagree">Disagree</option>
                        <option value="strongly_disagree">Strongly Disagree</option>
                    </select>           

                    </div></td></tr>
					<tr class="content"><td> </td><td>7</td>
<td>The tutorial instructor/s treated students with fairness and respect *</td>
<td><div class="input-group"> <select name="Q10">
                        <option value="no_opinion">No Opinion</option>
                        <option value="strongly_agree">Strongly Agree</option>
                        <option value="agree">Agree</option>
                        <option value="neutral">Neutral</option>
                        <option value="disagree">Disagree</option>
                        <option value="strongly_disagree">Strongly Disagree</option>
                    </select>           

                    </div></td></tr>
    
 <tr class="content"><td width="40px"> </td><td><strong>Comments: </strong></td>
<td><textarea name="comment" id="Inputc5" class="form-control" rows="3"></textarea>
 </td><td></td></tr>

    </table><div style ="text-align:center;"> 
    <input type="hidden" name="course" value="<?php echo $course;?>">
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">  </div>         
        </form>
    </div></div></body></html>
    <?php } ?>