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
			  <li class="active"><a href="camps.php">Home</a></li>
			  <li><a href="android.php">Android Workshop</a></li>
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
   			<h1>About</h1>
	  			<div>
					Utilize your Winter for learning something useful. Undergraduate Academic Council brings to you "Winter School". Just go through the above tabs 
					to choose what you want to learn. Then fill up the google form given on that page to register. 
					<br>For any queries contact:<br><br>
					Rahul Shenoy<br>
					Career Cell (ISAA)<br>
					<span class="glyphicon glyphicon-earphone"></span> 08879005413<br>
					<span class="glyphicon glyphicon-envelope"></span> careercell.iitb@gmail.com<hr>
					Keshav Kumar Gupta<br>
					EnPower(ISAA)<br>
					<span class="glyphicon glyphicon-earphone"></span> 09004332865<br>
					<span class="glyphicon glyphicon-envelope"></span> isaa.enpower@gmail.com<hr>
	  		</div>
	  	<div class="col-md-1">
		</div>
	</div>
</body>
</html>
