<?php
include_once './ispa/connect.php';

if (isset($_POST['continue'])){
$db = mysql_connect($dbhost, $dbuser, $dbpasswd);
mysql_select_db($dbname);
$prof=$_POST['prof'];
$course=$_POST['course'];
$backlogs=$_POST['backlogs'];
//echo $prof.$course.$backlogs;
mysql_query("INSERT INTO summer_courses(prof,course,backlogs) VALUES('$prof','$course','$backlogs')") or die (mysql_error());

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
	      <div class="page-header">
		  <h1>summer </h1>
		  <span style="display:inline; margin-left:2%; font-size:200%;">Summer Course info</span>
		  </div>

		 <div class="row-fluid"> 
         <div class="contentcontacts">
		 <p style="font-size:30px; color:#0088cc ;line-height:24px; padding:14px; margin-left:250px">
		 <u><b>Summer</b></u>
			</p>
		 <p>
			<form action="ups.php" 
style="font-size:20px;color:#0088cc; margin-left:25px" method="POST" >
			   <p style="font-size:15px;color:red">*required<br><br>
			   </p>
			   Prof Name *
			   <br><br>
			   <input type="text" name="prof" aria-required="true">
			   <br><br>
			   Course Name/no * 
			   <br><br>
			  <input type="text" name="course"><br>
			  No. of Backlogs<br><br>
			  <input type="text" name="backlogs">
			   <input type='submit' class="btn btn-primary btn-large" name='continue' value='Continue'>
			</form>
		 </p>
		 </div>
		</div>
    
</body>
</html>

