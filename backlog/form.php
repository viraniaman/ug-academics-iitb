<?php
session_start();
if(!isset($_SESSION['ldap']))
header('location: index.php');
ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title>Backlog Courses Feedback</title>
<meta http-equiv = "cache-control" content="no-cache">
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href="dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="dist/css/bootstrap.css" rel="stylesheet" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<style type="text/css">
a {
	color: white;
	text-decoration: none;
}
.btn{
	padding: 10px;
}
</style>


</head>

<body style="font-family:'Marcellus',serif;font-size:20px;background-color:rgba(173, 160, 173, 0.12);">
<div style="width:100%;background-color:#696969;color:white;">
	<center>
		<table cellpadding="10">
		<tr>
		<td>	<img src='iitb_logo.png' style="height:90px"> </td>
		<td>	<p style="color:white;font-size:45px;font-variant:small-caps;">BackLog Courses Feedback</p> </td>
		</tr>
		</table>
	</center>
</div>
	<center>
	Note: This form is for students who have backlog in a course. It will help to schedule courses in next sem.<br>

	<div style="width:50%;">
		<form method="post" action="./submit.php">
			<table class="table">
		       <tr>
		       	<td>Roll No *</td>
		       	<td><input class="form-control"  maxlength="255" name="rno" placeholder="Roll Number" required="required" type="text"></td>		      
		       </tr>
		       <tr>
		       	<td>Name *</td>
		       	<td><input class="form-control"  maxlength="255" name="name" placeholder="Name" required="required" type="text"></td>		      
		       </tr>
		       <tr>
		       	<td>Department *</td>
		       	<td>
		           <select class="form-control select2-offscreen" name="dept" placeholder="Department" required="required" style="width:100%" tabindex="-1">
					<option value="Computer Science and Engineering">Computer Science and Engineering</option>
					<option value="Electrical Engineering">Electrical Engineering</option>
					<option value="Aerospace engineering">Aerospace engineering</option>
					<option value="Biosciences and Bioengineering">Biosciences and Bioengineering</option>
					<option value="Chemical Engineering">Chemical Engineering</option>
					<option value="Chemistry">Chemistry</option>
					<option value="Earth sciences">Earth sciences</option>
					<option value="Energy sciences">Energy sciences</option>
					<option value="Humanities and social science">Humanities and social science</option>
					<option value="Industrial Design center">Industrial Design center</option>
					<option value="Physics">Physics</option>
					<option value="Metallurigical engineering">Metallurigical engineering</option>
					<option value="Mechanical engineering">Mechanical engineering</option>
					<option value="Civil Engineering">Civil Engineering</option>
					<option value="Other">Other</option>
					</select>
				</td>
		       </tr>
		       <tr>
		       	<td>Year of Study *</td>
		       	<td>
		           <select class="form-control select2-offscreen" name="year" placeholder="year" required="required" style="width:100%" tabindex="-1">
		       		<option value="1">1st</option>
		       		<option value="2">2nd</option>
		       		<option value="3">3rd</option>
		       		<option value="4">4th</option>
		       		<option value="5">5th</option>
		       	</td>
		       </tr>
		       <tr>
		       		<td>
		      		BackLog
		       		</td>
		       		<td>Courses
		       		</td>
		       </tr>		       
		       <tr>
		       		<td>Course Code 1 *</td>
		       		<td><input class="form-control"  maxlength="255" name="code1" placeholder="Course Code 1 eg.CS101" required="required" type="text"></td>
		       </tr>
		       <tr>
		       		<td>Course Code 2</td>
		       		<td><input class="form-control"  maxlength="255" name="code2" placeholder="Course Code 2"  type="text"></td>
		       </tr>
		       <tr>
		       		<td>Course Code 3</td>
		       		<td><input class="form-control"  maxlength="255" name="code3" placeholder="Course Code 3" type="text"></td>
		       </tr>
		       <tr>
		       		<td>Course Code 4</td>
		       		<td><input class="form-control"  maxlength="255" name="code4" placeholder="Course Code 4" type="text"></td>
		       </tr>
		       <tr>
		       		<td>Course Code 5</td>
		       		<td><input class="form-control"  maxlength="255" name="code5" placeholder="Course Code 5" type="text"></td>
		       </tr>
		       <tr>
		       		<td><button class="btn btn-primary" onclick="location.href='./logout.php'">Logout</button>
		       		</td>
		       		<td><input type="submit" class="btn btn-success" value="Submit/Update">
		       		</td>
		       </tr>
			</table>
		</form>
	</div>
	</center>
</body>
</html>
