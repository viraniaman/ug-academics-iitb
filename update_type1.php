<?php
include_once './ispa/connect.php';

if (isset($_POST['continue'])){
$db = mysql_connect($dbhost, $dbuser, $dbpasswd);
mysql_select_db($dbname);
$prof_name=$_POST['prof_name'];
$department = $_POST['department'];
$project_title=$_POST['project_title'];
$project_description=$_POST['project_description'];
$duration=$_POST['duration'];
$eligibility_criteria=$_POST['eligibility_criteria'];
mysql_query("INSERT INTO projects_2013(department,prof_name,project_title,project_description, eligibility_criteria, duration) VALUES('$department','$prof_name','$project_title','$project_description', '$eligibility_criteria', '$duration')") or die (mysql_error());

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="./ispa/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="./ispa/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="./ispa/bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="./ispa/bootstrap/css/bootstrap-responsive.min.css" />
<title></title>
</head>
<body id="body1">

    <div class="container-fluid">
		 <div class="row-fluid"> 
         <div class="contentcontacts">
		 <p>type1. This page is for projects with predefined work. 
	<br>For filling type2 projects in database click here: <a href="./update_type2.php">fill type2</a>
	<br>For type1 table click here: <a href="./type1.php">type1</a>
	<br>For type2 table click here: <a href="./type2.php">type2</a>		 

			<form action="update_type1.php" 
style="font-size:20px;color:#0088cc; margin-left:25px" method="POST" >
			   Prof Name 
			   <br>
			   <input type="text" name="prof_name" aria-required="true">
			   <br><br>
			   Department  
			   <br>
<select name="department" id="choose-dep"><option value="AERO">Aerospace Engineering</option><option value="BioSchool">Bio 
Engineering</option><option value="CESE">Centre for Environmental Science and Engineering</option><option value="CSE" 
selected="selected">Computer Science and Engineering</option><option value="CHEM">Chemistry</option><option value="CHE">Chemical 
Engineering</option><option value="CIVIL">Civil Engineering</option><option value="COR">Corrosion Science and Engineering</option><option 
value="CSRE">CSRE (Inter-Departmental)</option><option value="EE">Electrical Engineering</option><option value="ESE ">Environmental 
Science and Engineering</option><option value="HSS">Humanities and Social Sciences</option><option value="GEOS">Earth 
Sciences</option><option value="IDC">IDC (Inter-Departmental)</option><option value="MATH">Mathematics</option><option 
value="ME">Mechanical Engineering</option><option value="MET">Metallurgical Engineering and Material Sciences</option><option 
value="PHY">Engineering Physics</option><option value="ESE">Energy Sciences and Engineering </option><option 
value="treelabs">Treelabs(Inter-Departmental)</option></select>
			  <br>
			  Project Title:<br>
				<textarea name="project_title" rows="3" columns="0" style="width:750px"></textarea>
				<br>
			  Project Description:<br>
				<textarea name="project_description" rows="7" columns="0" style="width:750px"></textarea>
			  <br>
			  Eligibility Criteria:<br>
				<textarea name="eligibility_criteria" rows="4" columns="0" style="width:750px"></textarea>
			  <br><br>
			  Duration(may leave blank):<br>
				<textarea name="duration" rows="1" columns="0" style="width:750px"></textarea>
			   <input type='submit' class="btn btn-primary btn-large" name='continue' value='Continue'>
			</form>
		 </p>
		 </div>
		</div>
    
</body>
</html>

