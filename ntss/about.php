<?php
require_once("functions.php");
$loggedin = false;
session_start();
if (isset($_SESSION['ldap'])) {
	$loggedin=true;
	$username=$_SESSION['ldap'];
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title >Non Tech Summer School</title>
 <link rel="stylesheet" href="style_apply.css">


<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="styles.css" rel="stylesheet" media="screen">
</head>

<body background='inback.jpg' style="font-family:'Marcellus',serif;">
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div style="width:100%;margin-top:28px;opacity:0.8; border-radius:20px;">
	<div class="navbar">
		 <div class="navbar-inner"><div style="display: block; min-height: 155px;"><div style="float:left;">
			<a class="brand" href="#"> <img src="iitb_logo.jpg" style="height:90px"><p style="display:inline-block; line-height: 30px; padding: 20px; "><b style="font-size:35px">Non Tech Summer School</b><br> <d style="font-size:25px">By UG Academic Council</d></p> </a></div>
			<div style="float: right; padding:20px; padding-bottom: 0px; ">
	<?php
	if ($loggedin) {} else {
	?>
	<form action="index.php" method="POST">
	<fieldset>
		<table style='font-size:15px'>
			<tr>
				<td>LDAP ID</td>
				<td>Password</td>
			</tr>			
			<tr>
				<td><input type="text" class="form-control" name="ldap" placeholder="Enter LDAP ID"></td>
				<td><input type="password" class="form-control" name='passwd' placeholder="Enter Password"></td>
				
			</tr>
			<tr><td>Please login to register for courses</td><td align="right"><input class="btn btn-success" style="font-size:17px" type="submit" name="sub" value="Login"/></td></tr>
		</table>
  	</fieldset>
	</form> <?php } ?>
</div></div>
<div style="display: block; float: right">
<ul class="nav">
				  <li><a href="index.php" style="font-size:20px">Home</a></li>
				  <li><a href="about.php"  style="font-size:20px">About</a></li>
				  <li><a href="contacts.php" style="font-size:20px">Contacts</a></li>
				  <?php if ($loggedin) { ?><li><a href="apply.php" style="font-size:20px">Apply</a></li> <?php }?>
				  <?php if ($loggedin) { ?><li><a href="index.php?id=logout" style="font-size:20px">Logout</a></li> <?php }?>
				</ul></div>
		  </div>
	</div>
</div>
<div style="width:100%;margin-top:28px;opacity:0.8; border-radius:20px; margin-bottom: 50px;">
	<div class="navbar-inner">


<h2>Institute Non-Technical Summer School</h2>
<div style="width: 290px; float:right; display: inline-block; padding: 20px;">
<div class="fb-page" data-href="https://www.facebook.com/careercell.iitb"
  data-width="380" data-hide-cover="false" data-show-facepile="false" 
  data-show-posts="false"></div></div>
			<div style="text-align:left; margin:20px;">
			IITB Academic Council is proud to present before you The Non-Technical Summer School. It's the perfect opportunity you have been waiting for where you can not only hone your skills in various languages but also get yourself acquainted with the various other non-technical departments which are an integral part of our institute.
			<br><br>
			<strong>In case the requirement of minimum number students is not met for a particular course, it may be cancelled and the fee/ deposit will be returned back to you.</strong><br>
			We are offering courses from the departments HSS, SOM and Bootcamps in Entrepreneurship, Finance, Analytics, Android App Making as well as foreign language courses especially designed for first time learners. These are short courses not spanning more than a few sessions.
			<br>Our motive is to give you an exposure to the non-technical departments and help you find your interests. You can make efficient use of your time while staying back in summers by learning stuff from varied backgrounds. This program is open to all students of the institute.
			<br>
			Certificates will be awarded on successful completion of the course. 
			<br>
			Some courses involve the payment of nominal refundable deposit (to be refunded only after more than 80% attendance in the course) while others involve the payment of a fee (non refundable) and is clearly mentioned next to the details of the course.
			<br><br>Money will be collected in different slots.<br>
			May 21th(Saturday), May 22th(Sunday)<br>
			Timings: 6pm - 10pm<br>
			Venue: Yoga Room (in SAC)

			</div>
			</div>
</div>

</body>
</html>