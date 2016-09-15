<?php
session_start();
ob_start();
if(!isset($_SESSION["ldap"])){
	session_destroy();
	header("location: index.php");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title >Winter School</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="dist/css/bootstrap.min.css">

<link href="styles.css" rel="stylesheet" media="screen">
</head>

<body background='winter.jpg'>

<div class="navbar">
	 <div class="navbar-inner">
			<table>
	 	<tr><td>
		<a class="brand" href="#"> <img src="iitb_logo.jpg" style="height:90px"></img> <b style="font-size:35px">IIT Bombay Winter School</b> <d style="font-size:25px">By UG Academic Council</d></a>
			 		</td><td><img style="height:70px" src="career_logo.png"></img></td>
					<td><img style="height:100px; margin-left:30px;" src="EnPower_logo.png"></img></td>
				</tr>
			</table>
			<ul class="nav">
			  <li><a href="camps.php">Home</a></li>
			  <li class="active"><a href="android.php">Android Workshop</a></li>
			  <li><a href="ecell.php">Entrepreneurship Boot Camp</a></li>
			  <li><a href="finance.php">Finance Boot Camp</a></li>
			  <li><a href="software.php">Software Workshops</a></li>
			  <li><a href="logout.php">Logout</a></li>
			  <li>
			</ul>
	  </div>
</div>

 	<div class="col-md-12">
		<div class="col-md-1">
		</div>
  		<div id="content" style="margin:20px" class="col-md-10">
   			<h1>Android Workshop</h1>
	  			<div>
						This Boot Camp is held under the guidance of Google Developers Group.It is a 7-day long intensive program through which the participants can shape their ideas into Android Apps!
					Technical mentoring & help in idea generation would be provided.
					It will be run on similar lines of "MIT-AITI India Program -
					<a href="http://aiti.mit.edu/program/india-summer-2012/">http://aiti.mit.edu/program/india-summer-2012/</a>.
					<hr>
					NOTE :<br>
					- Participation can be individually or in groups of 2.<br>
					- Attendance is mandatory on all 7 days<br>
					- Prior technical knowledge of Android is not necessary<br>
					- Prior knowledge of object orientated programming is useful but not necessary<br>
					- Fully functional laptops
					<hr>
					Duration : 24th Dec to 31st Dec 2013<br>
					Time : Morning 10 - 12<br>
					Open : For all  Students<br>
					Fees : 1000 (Refundable)<br><br>

					Limited Number of seats available.<br>
					So, hurry & make the most of this opportunity!<br><br>
					Register :
	  			</p>
	  				<iframe src="https://docs.google.com/forms/d/1jAlMyRR16YChzbsVXFAWYdXtf5QZL1AIHV5RD3_DTl0/viewform?embedded=true" width="100%" height="1000" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
	  		</div>
	  	<div class="col-md-1">
		</div>
	</div>
</body>
</html>
