<?php
	session_start();
	if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<title>ISPA | Review</title>
</head>
<body id="body1">

    <div class="container-fluid">
	      <div class="page-header">
		  <h1>ISPA</h1>
		  <span style="display:inline; margin-left:2%; font-size:200%;">Institute Summer Project Allocation</span>
		  </div>
		  <ul class="nav nav-pills">
		  <li><a href="index.php">Home</a></li>
		   <li><a href="login.php">Apply</a></li>
		  <li><a href="#">Updates/Results</a></li>
		  <li><a href="ISPA_2013.pdf">Rule Book</a></li>
		  <li class="active"><a href="login_review.php">Reviews</a></li>
		  <li><a href="">Contact</a></li>
		  </ul>
		 <div class="row-fluid"> 
         <div class="contentcontacts"">
		 <p style="font-size:30px; color:#0088cc ;line-height:24px; padding:14px; margin-left:250px">
		 <u><b>ISPA Certificate / Review Form</b></u>
			</p>
		 <p>
			<form action="update_review2.php" style="font-size:20px;color:#0088cc; margin-left:25px" method="POST" >
			   <p style="font-size:15px;color:red">* required<br>
			   </p>
			   Name of the professor you worked under for the project? *
			   <br><br>
			   <input type="text" name="prof_name" aria-required="true">
			   <br><br>
			   Name of the Ph.D. student you worked with? 
			   <br><br>
			   <input type="text" name="phd_name">
			   <br><br>
			   Name of the project? *
			   <br><br>
			   <input type="text" name="project_name">
			   <br><br>
			   Department to which the project belonged to? *
			   <br><br>
			   <input type="text" name="project_department">
				<br><br>
				How was the experience working in a research project?
				<p style="font-size:15px">Any difficulty faced etc.</p>
			   <textarea name="experience" class="required" rows="5" columns="0" style="width:750px"></textarea>
			   <br><br>
			   How much was the work related to what you had studied?
				<br>
			   <textarea name="work_related" class="required" rows="5" columns="0" style="width:750px">
			   </textarea>
			   <br><br>
			   Any Suggestions/Grievances
				<br>
			   <textarea name="suggestion" class="required" rows="5" columns="0" style="width:750px">
			   </textarea>
			   <br>
			  <input type='submit' class="btn btn-primary btn-large" name='submit' value='Submit'>
			</form>
		 </p>
		 </div>
		</div>
    
</body>
</html>

