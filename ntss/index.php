<?php
require_once("functions.php");
$loggedin = false;
session_start();
if (isset($_SESSION['ldap'])) {
	$loggedin=true;
	$username=$_SESSION['ldap'];
}
if (isset($_GET['id'])) {
	if ($_GET['id']=='logout') {
		session_destroy();
		header('location: index.php');
		} }
if (isset($_POST['sub'])){
	include 'connect.php';
	$username = mysqli_real_escape_string($link, $_POST['ldap']);
	$password = mysqli_real_escape_string($link, $_POST['passwd']);
	mysqli_close($link);
	if(ldap_auth($username,$password))
	{
		session_start();
		$_SESSION['ldap']=$username;
		$loggedin=true;
	}
}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title >Non Tech Summer School</title>
 <link rel="stylesheet" href="style_apply.css">
<!-- Template start -->
<link href="./template/style.css" rel="stylesheet" type="text/css">
<link href="./template/content.css" rel="stylesheet" type="text/css">
<script async="" src="./template/analytics.js"></script>
<script type="text/javascript" src="./template/jquery.min.js"></script>
<script type="text/javascript" src="./template/ga.js"></script>
<script type="text/javascript" src="./template/common.js"></script>
<link rel="stylesheet" type="text/css" href="./template/slick.css">
<script type="text/javascript" src="./template/slick.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {	
$('.accordian > li:last-child').append('<samp></samp>');
$('.accordian > li:last-child samp').height($('.accordian li:last-child > div').outerHeight()+50);
	
$('.accordian h5').click(function(){

if($(this).next('.accordianCont').is(':hidden') == true){
$('.accordian h5 span').removeClass('accordianActive');
$('.accordian .accordianCont').slideUp();
}
$(this).next('.accordianCont').slideToggle();
$(this).find('span').toggleClass('accordianActive');
});


$('.column3 dd:last-child').css('margin-right','0');

});
</script>

<!-- Template to be continued-->

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="styles.css" rel="stylesheet" media="screen">
</head>

<body background='inback.jpg' style="font-family:'Marcellus',serif;">

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
			<tr><td>Please login for further course details<br> &amp; registration</td><td align="right"><input class="btn btn-success" style="font-size:17px" type="submit" name="sub" value="Login"/></td></tr>
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
<section class="oppertunity-top"></section>
<ul class="accordian">  
<li>
	<h2><table class="course"><tr><th>Course Name</th><th>Department</th><th>Duration</th><?php if($loggedin) echo'<th class="schedule">Detailed Schedule</th><th>Fee</th>'; ?></tr></table></h2>
<h5><span class=""></span><table class="course">
<tr><td>German Language*</td><td>Literary Club</td><td>Starts from 31st May </td><?php if($loggedin) echo'<td class="schedule">Tuesdays and Fridays<br>Time: 3:30 PM to 5:30 PM<br>10 Classes<br>Demo Session: 23 May, 4:30PM-5:30PM </td><td>1500<br>&lpar;Non refundable&rpar;</td>'; ?></tr></table></h5>
<div class="accordianCont" style="display: none;">
<p><table class="describe"><tr><td><strong>Course Description: </strong></td><td> Learning albhabests,pronounciations,greetings,vocabulary on various topics: Food, Family, profession, colours, Months, days of week, Airport etc.Introducing yourself and others.Definite and indefinite articles.Nouns and Adjectives. Plural formation of the same
Possessive pronouns.Conjugation for Ser, Estar, Hay, Tener Verbs.Sentence formation , describing photos, Forming Questions.Conjugation for regular verbs.Reading and understanding small dialogues and texts.Listening Activity (Dialogues and songs)</td></tr>

<tr><td>Prerequisites:</td> <td>None</td></tr>
<tr><td>Fee:</td><td> INR 1500</td></tr>
<tr><td>No. of Classes:</td><td> 10</td></tr>
<tr><td>About the Instructor:</td>
<td><strong>Name:</strong> Pallavi Paliwal
<strong>Details:</strong> She is a Freelance instructor and translator for Spanish and German languages; working independently and with corporates and educational institutions.
Venue: LC 002</td></tr>


</td></tr></table></p>

<div class="clear"></div>
</div>
</li>



<li>
<h5><span class=""></span><table class="course">
<tr><td>French Language*</td><td>Literary Club</td><td>Starts from 27th May</td><?php if($loggedin) echo'<td class="schedule">Mondays,Wednesday and Fridays <br>Time :10 AM to 12 PM<br>10 Classes,<br>Demo Class: 22 May, 11AM-12PM , LC002</td><td>1250<br>&lpar;Non refundable&rpar;</td>'; ?></tr></table></h5>
<div class="accordianCont" style="display: none;">
<p><table class="describe"><tr><td><strong>Course Description: </strong></td><td>Basics of french vocabulary,reading , writing and speaking skills.</td></tr>

<tr><td>Prerequisites1:</td> <td>None</td></tr>
<tr><td>Fee:</td><td> INR 1250</td></tr>
<tr><td>No. of Classes:</td><td> 10</td></tr>
<tr><td>About the Instructor:</td>
<td><strong>Name:</strong> Shweta Patil
<strong>Details:</strong> She has an MBA and a BMM and expertise in three foreign languages French, German and Spanish. She is a freelance translator and instructor with a teaching experience of 5 years and has a special interest in knowing different cultures and gaining knowledge about the same. <br>
Venue: LC 002</td></tr>


</td></tr>
</table></p>

<div class="clear"></div>
</div>
</li><!--#####-->



<li>
<h5><span class=""></span><table class="course">
<tr><td>Spanish Language*</td><td>Literary Club</td><td>Starts from 31st May</td><?php if($loggedin) echo'<td class="schedule">Tuesdays and Fridays<br>Time: 6PM to 8 PM<br>10 Classes<br>Demo Class: 23 May, 5:30PM-6:30PM , LC102 <br></td><td>1250<br>&lpar;Non refundable&rpar;</td>'; ?></tr></table></h5>
<div class="accordianCont" style="display: none;">
<p><table class="describe"><tr><td><strong>Course Description: </strong></td><td> Learning albhabests,pronounciations,greetings,vocabulary on various topics: Food, Family, profession, colours, Months, days of week, Airport etc.Introducing yourself and others.Definite and indefinite articles.Nouns and Adjectives. Plural formation of the same
Possessive pronouns.Conjugation for Ser, Estar, Hay, Tener Verbs.Sentence formation , describing photos, Forming Questions.Conjugation for regular verbs.Reading and understanding small dialogues and texts.Listening Activity (Dialogues and songs)</td></tr>

<tr><td>Prerequisites:</td> <td>None</td></tr>
<tr><td>Fee:</td><td> INR 1250</td></tr>
<tr><td>No. of Classes:</td><td> 10</td></tr>
<tr><td>About the Instructor:</td>
<td><strong>Name:</strong> Pallavi Paliwal
<strong>Details:</strong> She is a Freelance instructor and translator for Spanish and German languages; working independently and with corporates and educational institutions.
Venue: LC 002</td></tr>


</td></tr></table></p>

<div class="clear"></div>
</div>
</li><!--#####-->



<li>
<h5><span class=""></span><table class="course">
<tr><td>Marathi Language*</td><td>Literary Club</td><td>Starts from 26th May</td><?php if($loggedin) echo'<td class="schedule">Alternate days <br>Demo Session:22 May, LC 002 <br>Time: 2 PM to 4 PM<br>15 Classes</td><td>1250<br>&lpar;Non refundable&rpar;</td>'; ?></tr></table></h5>
<div class="accordianCont" style="display: none;">
<p><table class="describe"><tr><td><strong>Course Description: </strong></td><td> Alphabets, pronouns, verbs, adjectives, adverbs<br>Based on practically used phrases in speaking students will learn the construction of sentence formation<br>
Other relevant topics for elementary level of reading and writing. <br></p>


<bold>Prerequisites</bold>: None </br>
<bold>About the Instructor:</bold></br>
<em>Name:</em> Rama Vaishampayan
<em>Details:</em> A native Marathi speaker, Mr. Vaishampayan has over 15 years of experience in tutoring students in Marathi (at all levels). He heads a Marathi Language Coaching centre, Vision Educare.</br>
Venue: LC 002
<bold>Class Days:</bold> Tuesday,Thursday,Saturday



</td></tr></table></p>

<div class="clear"></div>
</div>
</li><!--#####-->



<li>
<h5><span class=""></span><table class="course">
<tr><td>Entrepreneurship Bootcamp</td><td>ECell</td><td>25th May to 3rd June</td><?php if($loggedin) echo'<td class="schedule">Timeline<br>
"Timeline        
May 25: Basics of entrepreneurship   
May 26: Idea Generation and Validation        
May 28: Tools for Start-up    
May 30: Product Managment and resources      
May 31: Marketing for startups        
June 2: Finance     
June 3: Pitching       "</td><td>500<br>&lpar;Refundable subject to 80% attendance&rpar;</td>'; ?></tr></table></h5>
<div class="accordianCont" style="display: none;">
<p><table class="describe"><tr><td><strong>Course Description: </strong></td><td> Tools for Start-up and entrepreneurship<br>
Idea Generation and B-Model Canvas making<br>
Product development and service sector start-ups<br>
Marketing<br>
Pitching and Finance.</td></tr></table></p>

<div class="clear"></div>
</div>
</li><!--#####-->



<li>
<h5><span class=""></span><table class="course">
<tr><td>Finance Bootcamp</td><td>Finance Club</td><td>24 May to 1 June</td><?php if($loggedin) echo'<td class="schedule">""TIMELINE:,br>24th May: Personal & Corporate Finance (9pm-11pm) <br> 25th May: Financial Instruments, Macroeconomics (2.30pm-4pm)<br> 26th May: Central Banking, Debt and Equity(2.30pm-4pm) <br>27th May: Fiscal Deficit,Credit Rating(2:30pm-4:00pm) <br>28th May:Venture Capital (1:15pm-2:45pm) <br>29th May: Derivates, Workshop on 2008 Financial Crisis (5:30pm-7:30pm) <br>31st May:Workshop on Individual Investing (2:30pm-4:00pm) <br>1st June: Small Quiz on Material covered in full bootcamp (2:30pm-4:00pm)""</td><td>200<br>&lpar;Refundable subject to 80% attendance&rpar;</td>'; ?></tr></table></h5>
<div class="accordianCont" style="display: none;">
<p><table class="describe"><tr><td><strong>Course Description: </strong></td><td>

Personal finance - evaluating a loan<br>
Corporate Finance - What is it?, Time value of money, NPV IRR, Effects of leverage, Investing - Difference in investing and trading
 Impact of Repo Rate Changes on : Stock Market, Bond Market - Yields & Price, Currency

NPA issues in Indian Banking
Venture Capital
Derivatives - Definition, Forwards (story), Options, Option greeks, Technical analysis
Workshop on 2008 Financial Crisis
Workshop on Individual Investing</td></tr></table></p>

<div class="clear"></div>
</div>
</li><!--#####-->



<li>
<h5><span class=""></span><table class="course">
<tr><td>Android App Development</td><td>IITB DC</td><td>21st May to 30th June</td><?php if($loggedin) echo'<td class="schedule">
2.5- 3 hrs during evenings on Tue, Thur and during afternoon on Sat, Sun. &rpar;</td><td>200<br>&lpar;Refundable subject to 80% attendance &rpar;</td>'; ?></tr></table></h5>
<div class="accordianCont" style="display: none;">
<p><table class="describe"><tr><td><strong>Course Description: </strong></td><td> Basic Installation<br>
Understanding the project structure and basics<br>
Building a sample application to get an understanding of the following concepts: Making network requests Debugging Coding standards to follow to write maintainable code, Animations and transitions<br>

</td></tr></table></p>

<div class="clear"></div>
</div>
</li><!--#####-->


<li>
<h5><span class=""></span><table class="course">
<tr><td>Analytics Bootcamp</td><td>Analytics Club</td><td>1st Week to 3rd Week of June</td><?php if($loggedin) echo'<td class="schedule">Anyday during the week after 7:30 pm</td><td>200<br>&lpar;Refundable subject to 80% attendance &rpar;</td>'; ?></tr></table></h5>
<div class="accordianCont" style="display: none;">
<p><table class="describe"><tr><td><strong>Course Description: </strong></td><td> Statistical computing using R<br>
R is a programming language and software environment for statistical computing and graphics,<br> used mainly for solving problems in machine learning.<br>
We will study R and its libraries implement a wide variety of statistical and graphical techniques, <br>including linear and nonlinear modeling, classical statistical tests, time-series analysis, classification, clustering, and others.<br>
For more details, join the <a href="https://www.facebook.com/groups/645270438864408/">facebook group</a>
</td></tr></table></p>

<div class="clear"></div>
</div>
</li><!--#####-->
<li>
<h5><span class=""></span><table class="course">
<tr><td>Consulting Bootcamp</td><td>Consult Club</td><td>10June -14 June, Daily</td><?php if($loggedin) echo'<td class="schedule">Sessions would be held daily from 10th June to 14th June<br>
Time: 6.00 to 7.30pm</td><td>200<br>&lpar;Refundable subject to 80% attendance&rpar;</td>'; ?></tr></table></h5>
<div class="accordianCont" style="display: none;">
<p><table class="describe"><tr><td><strong>Course Description: </strong></td><td> Consulting<br>
Introduction to Case study, Guesstimate <br>
Profitability Cases<br>
Market Entry<br>
Supply Chain <br>
Mergers and Acquisitions"</td></tr></table></p>

<div class="clear"></div>
</div>
</li><!--#####-->
<li>
<h5><span class=""></span><table class="course">
<tr><td>First Impression</td><td>HSS</td><td>11th June to 12th June</td><?php if($loggedin) echo'<td class="schedule">Time: 10:00AM to 11:30AM<br>2 classes</td><td>200<br>&lpar;Non-refundable&rpar;</td>'; ?></tr></table></h5>
<div class="accordianCont" style="display: none;">
<p><table class="describe"><tr><td><strong>Course Description: </strong></td><td>Philosophical Study of Consciousness<br> 
Way of presenting oneself, soft skills, personality development and much more </td></tr></table>  </p>

<div class="clear"></div>
</div>
</li><!--#####-->
<li>
<h5><span class=""></span><table class="course">
<tr><td>Web Development</td><td>IITB DC</td><td>1st June -20 June</td><?php if($loggedin) echo'<td class="schedule">
2.5- 3 hrs during evenings on Tue, Thur and during afternoon on Sat, Sun. &rpar;</td><td>200<br>&lpar;Refundable subject to 80% attendance &rpar;</td>'; ?></tr></table></h5>
<div class="accordianCont" style="display: none;">
<p><table class="describe"><tr><td><strong>Course Description: </strong></td><td> Web Frontend :Basics of HTML, CSS and JS Polymer ,Web Framework <br>-Web Backend: Introduction to SQL and databases (PostgreSQL ), Designing web APIs with Flask </td></tr></table>  </p>

<div class="clear"></div>
</div>
</li><!--#####-->
<li>
<h5><span class=""></span><table class="course">
<tr><td>General Management</td><td>SJMSOM</td><td>1st week of June </td><?php if($loggedin) echo'<td class="schedule">Sessions would be held   in first week of June<br>
</td><td>200<br>&lpar;Refundable subject to 80% attendance&rpar;</td>'; ?></tr></table></h5>
<div class="accordianCont" style="display: none;">
<p><table class="describe"><tr><td><strong>Course Description: </strong></td><td> General Management<br>
Organizational Behavior<br>
Human Resources and Personality<br>
Communication<br>
Project Management</td></tr></table></p>

<div class="clear"></div>
</div>
</li><!--#####-->

</ul><!-- accordian -->

<p style="margin-left: 50px; margin-right: 50px;">* Language courses in Collaboration with Cultural Council and registrations will be taken after demo class with SSOC registrations and fee would also be collected by Cultural Council
	</div>
</div>

</body>
</html>
