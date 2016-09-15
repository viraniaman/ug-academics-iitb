<?php
	session_start();
	if(!(isset($_SESSION['ldap_id']))){
		session_destroy();
		header("location: index.html");
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Industrial Projects</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

</head>
<body>
	<div id="header" class="container">
		<div id="logo">
			<image src="EnPower.png" style="height:70px; margin-top:10px"></image>
			<a style="color:white; font-size:20px">Industry Defined Projects</a>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li class="current_page_item"><a href="#">Projects</a></li>
				<li><a href="apply.php">Apply</a></li>
				<li><a href="contacts.php">Contact</a></li>
				<li><a href="logout.php">Logout</li>
			</ul>
		</div>
	</div>
	
<div id="wrapper">
	
	<div id="page" class="container">
		<div id="content">
				<h2 class="title"><a href="#"></a></h2>
				<p style="font-size:20px">
"Here are the First two Projects that are being offered this week. The details of each Project are mentioned below.
Apply if interested!"-</p>
				<div class="headmy">Company: Saven Technologies Pvt ltd<br></div>
				<p style="font-size:20px">
				Project ID: STCS1101<br>

				Project Name: Responsive web design for nopCommerce using CSS3 and 

				HTML5<br>

				Background:<br>&nbsp;&nbsp;

				nopCommerce is an open source e-Commerce application which can be 

				extended easily. It is developed using ASP.NET MVC, and the user interface 

				is developed using HTML 5, JavaScript/Jquery and CSS. nopCommerce has 

				mobile optimized version of website. The htmls and CSS developed for 

				Desktop version and mobile version are different.<br>

				Challenge:<br>&nbsp;&nbsp;

				Develop a single CSS and Html (theme) which works for both mobile and 

				desktop versions.The content should get adjusted to the size of any kind of 

				devices (PC and mobile devices) used.<br>

				Additional Details :<br>

				• Download latest version of nopCommerce here -<br>

				<a href="http://www.nopcommerce.com/default.aspx">o http://www.nopcommerce.com/default.aspx</a><br>

				• Designer's guide for nopCommerce will be useful -<br>

				<a href="http://www.nopcommerce.com/docs/72/designers-guide.aspx">o http://www.nopcommerce.com/docs/72/designers-guide.aspx</a><br>

				• Use WebMatrix tool to work on the HTML 5 / CSS 3 and Jquery code. 

				nopCommerce code can be opened and edited from WebMatrix (a free 

				web development tool from Microsoft)<br>

				Evaluation Criteria:<br>

				• Code should be compliant with W3C coding standards for HTML/CSS.<br>

				• Navigation is simple and intuitive.<br>

				• Design will be appealing, colors used for backgrounds and fonts should 

				be harmonious and logically related.<br>

				• Overall layout should be balanced in terms of content and colors.<br>

				• The content should get adjusted to the size of the device (pc and mobile) 

				used.<br>

				• The fonts used should be readable and degradable gracefully. Should<br> 

				look OK on various screen resolutions.<br>

				Deadline: 31st October<br>

				Reward Money for best entry across all IITs – Rs10,000<br>

				Requirements: Complete code </p>
				<hr>
				<div class="headmy">Company: Bravo Lucy</div>
				<p style="font-size:20px">

				Project ID: STCS1102<br>

				Project Name: Analyze surveillance video for people traffic<br>

				Background:<br>&nbsp;&nbsp;

				Bravo Lucy creates decision products that use machine learning and 

				econometrics practices, which help businesses, make informed decisions.

				One area of interest is providing additional analytics for surveillance videos. 

				Video monitoring is common due to security, safety, operational efficiency and 

				business intelligence reasons. The video streams can be analyzed to provide 

				additional insight that is relevant to the business. Post event videos are also 

				analyzed where it is difficult for a human operator to review the large amount 

				of data.<br>

				Challenge:<br>&nbsp;

				Develop a script to count people traffic by analyzing a video (.mp4) file.

				The video will show a number of people passing in and out of an entrance.<br>

				The script should provide the following:<br>

				• Count number of people entered and exited, keeping a record of it<br>

				• Keep record of time of entry and exit.<br>

				Evaluation Criteria:

				To qualify,<br>

				• Minimum 95% of Entries/Exits should be recognized<br>

				• Of these, 95% should be accurately classified between Entries/Exits<br>

				• False positives not more than 10%.<br>

				• Final Evaluation will be done on video different from a sample video <br>

				given<br>

				Additional Considerations:<br>&nbsp;

				• Programmers can use freely available libraries and software, provided 

				they give clear references to all<br>

				• Length of video may vary between 10 min to 14 hours. A typical 1-hour 

				video will be around 1GB in size with 3 frames per seconds.<br>

				• Programmer is provided a sample video to test their program. (File size 

				is 170MB) (Download Video)<br>

				• The traffic from Channel 4 in the video stream is to be analyzed.<br>

				Deadline: 31st October<br>

				Reward Money for best entry across all IITs – Rs10,000<br>

				Requirements: Complete code

				</p>
				<br><br>
			</div>
	</div>
	<!-- end #page --> 
</div>

<div id="footer">
	<p>&#169; Undergraduate Academic Council, IIT Bombay</p>
</div>
<!-- end #footer -->
</body>
</html>
