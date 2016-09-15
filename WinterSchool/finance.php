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
			  <li class="active"><a href="finance.php">Finance Boot Camp</a></li>
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
   			<h1>Finance Boot Camp</h1>
	  		<div>
				Career Cell, career guidance wing of the Academic Council is proud to present you an 8 day boot camp on finance. The boot camps will be taken by a combination of IITB Alumnus and Professors of IIT Bombay. The follow up sessions will happen in next semester, which will cover the topics covered in boot camp in much more detail.<hr>

				Session 1<br>
				1. What is Finance and What are the various segments in finance?<br>
				2. Introduction to Financial Assets: Stocks, Bonds,Options and Futures.<br>
				 Date & Time: 24th December, 5:30 - 7 PM<hr>

				Session 2<br>
				1. Concepts of Financial Models<br>
				2. Basics of Stock Market: Options Pricing Theory, Market Volatility etc.<br>
				Date & Time: 25th December, 5:30 - 7 PM<hr>

				Session 3<br>
				1.How does Trading happens at various Exchanges like NYSE or BSE?<br>
				2.What are the basic strategies involved in Trading?<br>
				Date & Time: 26th December, 5:30 - 7 PM<hr>

				Session 4<br>
				A glimpse of Indian Banking System<br>
				Date & Time: 27th December, 5:30 - 7 PM<hr>

				Session 5<br>
				What is the concept behind the pricing of a Financial Asset?<br>
				Date & Time: 28th December, 5:30 - 7 PM<hr>

				Session 6<br>
				What is Investment Bank?What are the various operations of Investment Bank?<br>
				Date & Time: 29th December, 5:30 - 7 PM<hr>

				Session 7<br>
				A brief introduction to Corporate Finance<br>
				Date & Time: 30th December, 5:30 - 7 PM<hr>

				Session 8<br>
				A brief introduction to Investment Analysis and various functions involved<br>
				Date & Time: 31st December, 5:30 - 7 PM<hr>
				Seat limit: 40<br><br>

				Fees: Rs. 1000 (Refundable)<br><br>
				For any queries regarding regarding Finance boot camp you can contact:<br>
				Rahul Shenoy (08879005413) <br> Ramandeep Singh (09167462903)<br><br>
				Register: 
	  			<iframe src="https://docs.google.com/forms/d/1Tmvamo55rPxWW0iv8gculMAHWAwxvyNUOQ9JAw0WKjM/viewform?embedded=true" width="100%" height="1000" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>

	  		</div>
	  	<div class="col-md-1">
		</div>
	</div>
</body>
</html>
