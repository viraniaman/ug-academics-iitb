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
					<td><img style="height:100px;margin-left:30px;" src="EnPower_logo.png"></img></td>
				</tr>
			</table>
			<ul class="nav">
			  <li><a href="camps.php">Home</a></li>
			  <li><a href="android.php">Android Workshop</a></li>
			  <li><a href="ecell.php">Entrepreneurship Boot Camp</a></li>
			  <li><a href="finance.php">Finance Boot Camp</a></li>
			  <li class="active"><a href="software.php">Software Workshops</a></li>
			  <li><a href="logout.php">Logout</a></li>
			  <li>
			  </li>
			</ul>
	  </div>
</div>

 	<div class="col-md-12">
		<div class="col-md-1">
		</div>
  		<div id="content" style="margin:20px" class="col-md-10">
   			<h1>Software Workshops</h1>
	  		<div>
				Open: For all students<br>

				Fees: Nil + Security Deposit: Rs200 for each software<br><br>





				<b>Phase 1:</b><br>

				<b>1.      SolidWorks:</b> SolidWorks offers complete 3D software tools that let you create, simulate, publish, and manage your data. It's a 3D mechanical CAD program.<br>

				Duration: 16th December - 18th December<br>
				Time: 11:00 AM - 1:00 PM<br><br>

				<b>2.      Ansys:</b> It's a simulation software enables organizations to confidently predict how their products will operate in the real world.<br>

				Duration: 16th December - 18th December<br>

				Time: 2:00 PM - 4:00 PM<br>

				Inter-Linking of the two software for a project will also be covered on the last day, and thus its recommended to the students to take both of them.<hr>





				<b>Phase 2:</b><br>

				<b>1.      COMSOL</b> - COMSOL is a finite element analysis, solver and Simulation software package for various engineering applications. COMSOL also offers an extensive interface to MATLAB and its toolboxes for a large variety of programming, preprocessing and postprocessing possibilities.<br><br>

				<b>2.      MATLAB</b> - MATLAB (matrix laboratory) is a numerical computing environment and fourth-generation programming language. MATLAB allows matrix manipulations, plotting of functions and data, implementation of algorithms, creation of user interfaces, and interfacing with programs written in other languages, including C, C++, Java, and Fortran.<br><br>

				<b>3.      PYTHON</b> - Python is a widely used general-purpose, high-level programming language. Its design philosophy emphasizes code readability, and its syntax allows programmers to express concepts in fewer lines of code than would be possible in languages such as C<br><br>

				<b>4.      EAGLE</b> - EAGLE is a flexible, expandable and scriptable EDA application with schematic capture editor, PCB layout editor, auto-router and CAM and BOM tools<br><br>

				Along with these, a basic workshop on usage of LINUX operating system will be covered for all.<br>

				<br>Duration: 24th December - 2nd Januray<br>

				Timings: 1:00 PM - 3:00 PM, 8:30 PM - 10:30 PM<hr>



				For any doubts contact:<br><br>



				Keshav Kumar Gupta<br>

				Institute Secretary of Academic Affairs <br>
				<span class="glyphicon glyphicon-earphone"></span> +91-9004332865<br>
				<span class="glyphicon glyphicon-envelope"></span> isaa.enpower@gmail.com<hr>

				Register: 
	  			<iframe src="https://docs.google.com/forms/d/1QxMJMsWePFlo_QL8RW8nlFC6bNA21kZbfVC_n9X4qGI/viewform?embedded=true" width="100%" height="1000" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>

	  		</div>
	  	<div class="col-md-1">
		</div>
	</div>
</body>
</html>
