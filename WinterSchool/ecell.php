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
			  <li><a href="android.php">Android Workshop</a></li>
			  <li class="active"><a href="ecell.php">Entrepreneurship Boot Camp</a></li>
			  <li><a href="finance.php">Finance Boot Camp</a></li>
			  <li><a href="software.php">Software Workshops</a></li>
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
   			<h1>Entrepreneurship Boot Camp</h1>
	  		<div>
				The Entrepreneurship Cell (EnB Club) and UG Academic Council is proud to present to you a eight-days bootcamp on Entrepreneurship which will cover all the aspects of Entrepreneurship ranging from Ideas. 
				<br>Boot Camp Schedule:<hr>

				Session 1: Basics of Entrepreneurship by Mr. Samarjeet Singh<br>
				What is Entrepreneurship and what it means for you?<br>
				What characterisitcs are required, for you to be an entrepreneur? Are you an Entrepreneur?<br>

				Date & Time: 24th December, 3:00pm - 5:00pm<hr>

				Session 2: Idea Generation<br>
				How to come up with ideas and, more importantly choose among the plethora of ideas that come up in your minds every other morning?<br>

				Date & Time: 25th December, 3:00pm - 5:00pm<hr>

				Session 3: Lean Methodology<br>
				A 2 hour session on the latest trend in the entrpreneruship ecosysystem. "Lean Startup" is the new "in" thing in entrepreneurship these days. Know about Minimum Viable Product and Product Market Fit; and how is this methodology beneficial to your idea?<br>

				Date & Time: 26th December, 3:00 - 5:00pm<hr>

				Session 4: Finance by Mr. Amol Manjrekar<br>
				An entrepreneur needs to play a lot of roles while working on his startup, a major part of it is managing the financials. Get to know about the working knowledge of Finance required for an entrepreneur.<br>

				Date & Time: 28th December, 3:00 - 5:00pm<hr>

				Session 5: Marketing by Hareesh Tibrewala<br>
				Know about Social Media Marketing, and how Social Media can exponentially help your idea reach out to the masses and bring you a step closer to success. <br>

				Date & Time: 29th December, 3:00 - 5:00pm<hr>

				Session 6: Legal & IP by Nishith Desai Associates<br>
				Get to know about the technicalities of incorporating your startup into a company and the legal procedures that need to be followed for the same.<br>
				Which type of company incorporation is best suited for your startup? <br>

				Date & Time: 30nd December, 3:00 - 5:00pm<hr>

				Session 7: Funding & Pitching<br>
				Get to know about how VC and Angel funding works in India.<br>
				How to get about raising capital for your startup? What do investors look for in a startup?<br>
				Also, get to know - What should be the ideal pitch and an ideal pitch deck?<br>

				Date & Time: 31st December, 3:00 - 5:00pm<hr>

				Session 8: Social Entrepreneurship by Nilima Achwal<br>
				What is social entrepreneurship and how to go about pursuing your dream of bringing a change in society and the status quo?<br>

				Date & Time:2nd January, 3:00 - 5:00pm<hr>
				Register:<a href="http://ecell.in/enbclub/events/bootcamp.html">http://ecell.in/enbclub/events/bootcamp.html</a><br>

				Seat Limit: 100<br>
				Fees: Rs. 1000 (Refundable)
	  		</div>
	  	<div class="col-md-1">
		</div>
	</div>
</body>
</html>
