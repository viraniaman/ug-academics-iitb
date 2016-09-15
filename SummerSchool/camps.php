
<?php
session_start();
ob_start();
//echo $_SESSION["ldap"];
require "../connect.php";
if(!isset($_SESSION["ldap"])){
	session_destroy();
	header("location: index.php");
}
$ldap=$_SESSION["ldap"];
$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());
$query="select* from registered_students_for_summer where ldap_id='$ldap'";
$results=mysql_query($query);
$registered=mysql_num_rows($results);
$registered_now=false;
if(isset($_POST["register"]) && (!$registered)){
	$err_registration=0;
	$name = $_POST['fullname'];
	$email = $_POST['email'];
	$roll =$_POST['roll'];
	$department = $_POST['department'];
	$year_of_study = $_POST['year'];
	$mobile = $_POST['mobile'];
	$hostel = $_POST['hostel'];
	$room = $_POST['room'];
	$hr=$hostel." ".$room;
	if($name=="" or $roll=="" or $year_of_study=="" or $mobile=="" or $email==""){
		$err_registration=1;
	}
	else {
		mysql_query("insert into registered_students_for_summer (ldap_id, name, roll, department, hostelroom, year, phone, email) 
VALUES ('$ldap','$name', '$roll', '$department','$hr','$year_of_study','$mobile','$email')")or die(mysql_error());
		$registered=1;
	}
}
if(isset($_POST['deregister'])){
	$course=$_POST['course'];
	mysql_query("delete from nonTechData where ldap='$ldap' and course='$course'")or die(mysql_error());	
}

if(isset($_POST["register_course"])){
	if(!$registered){
	}
	else {
		$course=$_POST['course'];
		$course_result=mysql_query("select* from nonTechData where ldap='$ldap' and course='$course'");
		$registered_this_course=mysql_num_rows($course_result);
		if(!$registered_this_course){
			mysql_query("insert into nonTechData (ldap, course) values ('$ldap', '$course')");
			$registered_now=true;
		}	
	}
}
//echo $registered;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title >Non Tech Summer School</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="dist/css/bootstrap.min.css">

<link href="styles.css" rel="stylesheet" media="screen">
<script src="js/jquery.js"></script>
<script src="js/my.js"></script>
<script type="text/javascript">
	<?php
		if($err_registration){
			echo "alert('Please fill the compulsory fields in form');";
			$err_registration=0;
		}
		if($registered_now){
			echo "alert('Please click on -My Registration- tab to see your registered courses.');";
			$registered_now=false;
		}
	?>
	function myHide(x){
		$("#p"+x).show();
		$(".nav li").removeClass("active");
		$("#"+x).addClass("active");
		for(var i=0; i<8; i++){
			if(i!=x){
				$("#p"+i).hide();
			}
		}
	}
	$(document).ready(function(){
		myHide(0);
		$("li").click(function(){
			myHide(this.id);
		});
		$("table").addClass("table-bordered");
		$('#register').click(function() {
			//alert ("cl");
		    var empty = $(this).parent().find("input").filter(function() {
		            return this.value === "";
		        });
		        if(empty.length) {
		            //At least one input is empty
		            alert("Fill all the fields!");
		        }
		});
		<?php
			if($registered)
				echo "$('#register_form').hide();";
		?>
	});
</script>
</head>

<body>

	<div class="navbar">
		 <div class="navbar-inner">
			<a class="brand" href="#"> <img src="iitb_logo.jpg" style="height:90px"> <b style="font-size:35px">Non Tech Summer School</b> <d style="font-size:25px">By UG Academic Council</d></a>
				<ul class="nav">
				  <li class="active" id="0"><a href="#" style="font-size:25px">Home</a></li>
				  <li id="6"><a href="#" >About</a></li>
				  <li id="1"><a href="#" >IDC</a></li>
				  <li id="2"><a href="#" >SJMSOM</a></li>
				  <li id="7"><a href="#" >Entrepreneurship</a></li>
				  <li id="3"><a href="#" >HSS</a></li>
				  <li id="4"><a href="#" >Languages</a></li>
				  <li id="5"><a href="#" >My Registration</a></li>
				  <li><a href="logout.php">Logout</a></li>
				  <li>
				</ul>
		  </div>
	</div>

  		<div id="p0" style="margin:20px" class="col-md-12 content">
   			<h1>Home</h1>
	  		<div>
				Utilize your Summer for learning something useful. Undergraduate Academic Council brings to you "Non Tech Summer School".<br> Just go through the above tabs 
				to choose what you want to learn. You can register for any course only after registering yourself in "My Registration" tab.
				<strong><br>Note: Room retention can't be availed on the basis of your participation in this program.</strong>			
				<div class="row">
					<div class="col-md-3">
					  <img src="Non Tech Poster1 copy.jpg">
					</div>
					<div class="col-md-3">
						<br>For any queries contact:<br>
						- Anand Lalwani<br>
						Student Support Services (ISAA)<br>
						<span class="glyphicon glyphicon-earphone"></span> 9970002031<br>
						<span class="glyphicon glyphicon-envelope"></span> lalwanianand1018@gmail.com<br>
						<hr> - Shubham Goyal<br>
						Career Cell(ISAA)<br>
						<span class="glyphicon glyphicon-earphone"></span> 9930601106<br>
						<span class="glyphicon glyphicon-envelope"></span> shubhamgoyal293@gmail.com<br>
	  				</div>
	  				<div class="col-md-6">
					<h3>Query/Discussion Forum</h3>    
					<div id="disqus_thread"></div>
					    <script type="text/javascript">
					        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
					        var disqus_shortname = 'gymkhanaiitbacinugacademicscampsphp'; // required: replace example with your forum shortname

					        /* * * DON'T EDIT BELOW THIS LINE * * */
					        (function() {
					            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
					            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
					            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
					        })();
					    </script>
					    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
					    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
					    
	  				</div>
	  			</div>
	  		</div>
		</div>
		<div id="p6" style="margin:20px" class="col-md-12 content">
			<h1>Institute Non-Technical Summer School</h1>
			<div style="text-align:left; margin:20px;">
			IITB Academic Council is proud to present before you The Non-Technical Summer School. It's the perfect opportunity you have been waiting for where you can not only hone your skills in various languages but also get yourself acquainted with the various other non-technical departments which are an integral part of our institute.
			<br><br>
			<strong>In case the requirement of minimum number students is not met for a particular course, it may 
be cancelled and the fee/ deposit will be returned back to you.</strong><br>
			We are offering a number of courses from the departments HSS, SOM and IDC as well as foreign language courses especially designed for first time learners. These are short courses not spanning more than a few sessions.
			<br>Our motive is to give you an exposure to the non-technical departments and help you find your interests .Freshmen can also use this as an opportunity to make an informed choice for their minor in the subsequent semester.
			This program is open to all students of the institute.
			<br>This portal also has a blog where you can put any of your queries which will be addressed from the concerned people
			<br>
			Certificates will be awarded on successful completion of the course.
			<br>
			Some courses involve the payment of nominal refundable deposit (to be refunded only after more than 80% attendance in the course) while others involve the payment of a fee (non refundable) and is clearly mentioned next to the details of the course.
			<br><br>Money will be collected in different slots.<br>
May 10(Saturday), May 11(Sunday)<br>
			Timings: 6pm - 8pm<br>
			Venue: Yoga Room (in SAC)

			</div>
		</div>
  		<div id="p1" style="margin:20px" class="col-md-12 content">
   			<h1>IDC</h1>
	  		<div>
	  		<table class="table table-striped">
                <tbody><tr><td class="highlight">Course Name</td><td class="highlight">Art in the times of technology</td></tr>
	  					<tr><td>Update</td><td>Course started</td></tr>
	  		</table><br><hr>

	  		<table class="table table-striped">
                <tbody><tr><td class="highlight">Course Name</td><td class="highlight">Sound and Music Design</td></tr>
                <tr><td>Instructor</td><td>C.P. Narayan</td></tr>
                <tr><td>Dates</td><td>19 May onwards alternate day (10 sessions)</td></tr>
	    		<tr><td>Timings</td><td>11-12:30 P.M.</td></tr>
                <tr><td>Course Description</td><td>This course seeks to introduce concepts and develop skillsets towards sound and music coupled with a study of sound recording technology.  This exposure could provide a unique sensitivity and perception to the student of engineering and technology.

					Course Content:<br> 
					Elements of Music<br> 
					Concepts of Anhad, Naad, Shadj, Raaga Theory, Chords, Harmonies, Orchestra<br>

					Representing sound in optical, magnetic, electrical and digital domains<br>

					Acoustic principles & Architecture in acoustics - sound in space, reflection and absorption, response of material to sound, sound traps and barricading<br>

					Defining music in sound - language and syntax; Sound for the visual<br>

					Music programming, sampling, MIDI, processing - equalization, compression, reverberation;<br>

					 Recording softwares<br>

					 Introduction to the Sound Studio</td></tr>
                <tr><td>Upper Cap</td><td>No Upper Cap</td></tr>
                <tr><td>Refundable Deposits</td><td>Rs.200</td></tr>
                <tr><td>Venue</td><td><strong>IDC Auditorium, 2nd floor IDC Department.</strong></td></tr> 
	  		</table><br>

	  		</div>
		</div>
  		<div id="p2" style="margin:20px" class="col-md-12 content">
   			<h1>SJMSOM</h1>
	  		<div>
		  		<table class="table table-striped">
	                <tbody><tr><td class="highlight">Course Name</td><td class="highlight">Journey to Self</td></tr>
	                <tr><td>Instructor</td><td>Ashish Pandey</td></tr>
	                <tr><td>Dates</td><td>1st June - 30th June <br>
			<tr><td>Timings</td><td>Mondays and Fridays Afternoon 3pm to 6pm</td></tr>
	                <tr><td>Duration</td> <td>7 sessions of 3 hours each</td></tr>
	                <tr><td>Course Description</td><td>
						1  Role of Self Reflection for Business Leadership<br>
						2  Emotions and Emotional intelligence <br>
						3  Intellectual Realm of Self<br>
						4  Managing Energy<br>
						5  Managing Relationship<br>
						6  Creativity and Innovative Thinking<br>
						7  Team working<br>
						8  Assignment and project<br>
						For more info go through this <a target="_blank" href="./Journey_to_Self_Course_Objectives_and_Outline Summer Course_14.pdf">document</a>
						</td></tr>
	                <tr><td>Upper Cap</td><td>None</td></tr>
	                <tr><td>Fees</td><td>Rs.200 Refundable
	                </td></tr>
	                <tr><td>Venue</td><td>Not yet decided</td></tr> 
	                <?php if($registered){
	                ?>
	               		<tr><td><form method="post" 
						action="camps.php"><input style="visibility:hidden;" name="course" 
						value="sjmsom_journey_to_self"><input type="submit" class="btn 
						btn-success" name="register_course" value="Register for this 
						course"></form></td><td>All the students applying for the 
						course must also submit statement of purpose on why they wish to 
						take this course and how they are going to use the
						same in their life and career. You must email your sop to 
						lalwanianand@ymail.com (Keep subject of the email "Journey to Self
						")</td></tr>
	  				<?php 
	  					}
	  				else {?>
	               		<tr><td>To register for this course, first register yourself under "My Registration" tab</td></tr>
	               	<?php
	               	}?>
		  		</table>
	  		</div>

	  		<div>
		  		<table class="table table-striped">
	                <tbody><tr><td class="highlight">Course Name</td><td class="highlight">Summer School in Fundamentals of Management</td></tr>
	                <tr><td>Instructor</td><td>Prof. Varadraj Bapat</td></tr>
	                <tr><td>Dates</td><td>22nd June to 29th June, 2014<br>
					<tr><td>Timings</td><td>
						<table><tr><th>Day</th><th>Timing</th><th>Hours of Instructions</th></tr>
						<tr><td>Sun</td><td>03:00 PM to 06:00 PM</td><td>03</td></tr>
						<tr><td>Mon</td><td>08:00 AM to 10:00 AM</td><td>02</td></tr>
						<tr><td>Tue</td><td>08:00 AM to 10:00 AM</td><td>02</td></tr>
						<tr><td>Wed</td><td>04:00 PM to 05:30 PM</td><td>01.50</td></tr>
						<tr><td>Fri</td><td>05:00 PM to 06:00 PM</td><td>01</td></tr>
						<tr><td>Sun</td><td>10:00 AM to 12:00 AM</td><td>02</td></tr>
						</table>
					<br></td></tr>
	                <tr><td>Duration</td> <td>Total - 11.30 Hours</td></tr>
	                <tr><td>Course Description</td><td>
						1  Finance<br>
						2  Marketing<br>
						3  Human Resource management<br>
						4  Operations Management<br>
						5  Leadership<br>
						6  Indian Ethos in Management<br>
						7  Communication<br>
						For more info go through this <a target="_blank" href="./Summer School in Management Fundamentals 5.5.2014.pdf">document</a>
						</td></tr>
	                <tr><td>Fees</td><td>Rs.1000 Refundable
	                </td></tr>
	                <tr><td>Venue</td><td>Not decided yet</td></tr> 
	                <?php if($registered){
	                ?>
	               		<tr><td><form method="post" 
						action="camps.php"><input style="visibility:hidden;" name="course" 
						value="sjmsom_Summer_School_in_Fundamentals_of_Management"><input type="submit" class="btn 
						btn-success" name="register_course" value="Register for this 
						course"></form></td><td></td></tr>
	  				<?php 
	  					}
	  				else {?>
	               		<tr><td>To register for this course, first register yourself under "My Registration" tab</td></tr>
	               	<?php
	               	}?>
		  		</table>
	  		</div>
		</div>

  		<div id="p7" style="margin:20px" class="col-md-12 content">
   			<h1>Entrepreneurship (In association with E-Cell)</h1>
	  		<div>
	  		<table class="table table-striped">
                    <tbody><tr><td class="highlight">Course Name</td><td class="highlight">Basics of Entrepreneurship</td></tr>
                    <tr><td>Instructor</td><td>Various high profile corporates</td></tr>
                    <tr><td>Dates</td><td>24 May-30 May, 7 days, 4 lectures of one hour each, 3 fun workshops of one and half hour each</td></tr>
                    <tr><td>Timings</td><td>5 - 6 P.M. for 1 hour sessions <br> 5 - 6.30 P.M. for 1.5 hour sessions</td></tr>
			<tr><td>Course Description</td><td>
                    <table>
					 <tr><td>Session</td><td>Duration(In Hours)</td><td>Topics covered</td></tr>
					 <tr><td>1.</td><td>1</td><td>lecture on what is whole idea behind entrepreneurship and what does it take to be an entrepreneur</td></tr>
					 <tr><td>2.</td><td>1</td><td>speaker session on Ideation - creating and developing a business idea</td></tr>
					 <tr><td>3.</td><td>1.5</td><td>workshop - "What an idea Sirji!". Teams will be judged on the basis of performance</td></tr>
					 <tr><td>4.</td><td>1</td><td>speaker session on Marketing</td></tr>
					 <tr><td>5.</td><td>1.5</td><td>workshop- " Sell me this pen!". Teams will be judged on the basis of performance</td></tr>
					 <tr><td>6.</td><td>1</td><td>speaker session on Funding and Pitching</td></tr>
					 <tr><td>7.</td><td>1.5</td><td>workshop - "Pitch Please!". Teams will be judged on basis of performance</td></tr></table>
                    <tr><td>Upper Cap</td><td>90 (first come first serve)</td></tr>
                    <tr><td>Refundable Deposits</td><td>Rs.500 </td></tr>
			<tr><td>Venue </td><td> LCC 01</td></tr>
	  		</table>
	  		</div>
		</div>


  		<div id="p3" style="margin:20px" class="col-md-12 content">
   			<h1>HSS</h1>

                        <div>
                        <table class="table table-striped">
                    <tbody><tr><td class="highlight">Course Name</td><td class="highlight">Modern Economics</td></tr>
                    <tr><td>Instructor</td><td>Tara Shankar Shaw</td></tr>
                    <tr><td>Dates</td><td>9th June- Lecture on liberalisation<br>
10th- Corporate governance reading discussion<br>
11th- Holiday<br>
12th- Lecture on Food Security<br>
13th- Discussion on a reading</td></tr>
                                <tr><td>Timings</td><td>5:30-8:00 pm</td></tr>
                    <tr><td>Course Description</td><td><bold>Section I:</bold><br>
                                                Food Security: PDS in India, Challenges to PDS after liberalization,
                                                Coping mechanisms of government, Food security is a doal or a right?<br>
                                                <bold>Section II:</bold><br>
                                                Corporate Governance: What it is? Why do we need it? Different models eastern and western countries
                                                (Anglo-Saxian, and Japan), India's reforms, Institutional policies and reforms.<br>
<strong>NOTE: </strong>All students must go through the reading material without fail for the discussions and should also do some self preparation on the topics of lectures. The professor is expecting very healthy class participation from the students.<br></td></tr>
                    <tr><td>Upper Cap</td><td>30</td></tr>
			<tr><td>Venue: </td><td>LCT02</td></tr>
                    <tr><td>Refundable Deposits</td><td>As the response for the course is overwhelming, we have planned to collect a Refundable deposit of Rs 50 You can make the payment on 29th May, 9-10:30 pm, Conference room SAC</td></tr>
                    <?php if($registered){
                    ?>
                                <tr><td><form method="post" action="camps.php"><input style="visibility:hidden;" name="course" value="hss_modern_economics"><input type="submit" class="btn btn-success" name="register_course" value="Register for this course"></form></td></tr>
                                        <?php
                                                }
                                        else {?>
                                <tr><td>To register for this course, first register yourself under "My Registration" tab</td></tr>
                        <?php
                        }?>
                        </table>
                        </div>


	  		<div>
	  		<table class="table table-striped">
                    <tbody><tr><td class="highlight">Course Name</td><td class="highlight">Introduction to Psychology [Completed]</td></tr>
                    <tr><td>Instructor</td><td>Mrinmoyi Kulkarni</td></tr>
                    <tr><td>Dates</td><td>23rd, 26th, 27th, 28h and 29th May</td></tr>
		    		<tr><td>Timings</td><td>4-5 P.M</td></tr>
                    <tr><td>Course Description</td><td>This psychology course will introduce you to the discipline of psychology, when and how the discipline came into being.  The scope of the discipline will be discussed and then some of the major areas in psychology will be described such as the brain, developmental psychology, cognitive psychology, social and clinical psychology.</td></tr>
                   <tr><td>Venue </td><td>LCC22</td></tr>
	  		</table>
	  		</div>

		    </div>

  		<div id="p4" style="margin:20px" class="col-md-12 content">
   			<h1>Languages</h1>
	  		<div>
	  		In collaboration with Summer School of Cult<br> 
	  		<image src="cult.jpg" style="height:120px"></image><br><br>
	  		<table class="table table-striped">
                <tbody><tr><td class="highlight">Course Name</td><td class="highlight">Basic German Training (for first time learners)</td></tr>
                <tr><td>Instructor</td><td>Shweta</td></tr>
                <tr><td>Dates</td><td>19 May-13 June, 5 days a week 20 sessions, 30 hours</td></tr>
	    		<tr><td>Timings</td><td><strong>Batch 1 - 3:30-5 P.M. (New)</strong><br>Batch 2 - 3:30-5 P.M.</td></tr>
                <tr><td>Course Description</td><td>Session  Duration(In Hours) Topics covered<br>
					1  1.5Hr   Alphabets, Self Introduction & Important Expressions<br>
					2  1.5Hr   Start auf Deutsch-"Wh" Questions & Paragraph Writing <br>
					3  1.5Hr   Ch 1: Dialog Writing & Verbs<br>
					4  1.5Hr   Numbers: Exercises in Verbs & Numbers<br>
					5  1.5Hr   Vocabulary & Vocabulary Exercises<br>
					6  1.5Hr   Ch 2: Exercises on Articles<br>
					7  1.5Hr   Exercises on Singular, Plural, Vocabulary<br>
					8  1.5Hr   Negative Sentences & Exercises<br>
					9  1.5Hr   Biography Writing<br>
					10  1.5Hr   Ch 3: Directions<br>
					11  1.5Hr   Past Tense & Exercises on Past Tense<br>
					12  1.5Hr   Postcard Writing<br>
					13  1.5Hr   Ch 4: Possessive Articles<br>
					14  1.5Hr   Dialog Writing & Role Play<br>
					15  1.5Hr   Essay Writing<br>
					16  1.5Hr   Letter Writing<br>
					17  1.5Hr   Exercises on Possessive Articles & Forming Sentences<br>
					18  1.5Hr   Speaking Practice<br>
					19  1.5Hr   Test on Grammar & Vocabulary<br>
					20  1.5Hr   Final Exam<br>
					</td></tr>
		<tr><td>Venue</td><td><strong>Batch 1 : MB2(Main building) <br> Batch2 : To be decided [New]</strong</td></tr>
                <tr><td>Caps</td><td>Batch 1: Upper Cap 30 <br>Batch 2:  Minimum 25 registrations required to run the course.</td></tr>
                <tr><td>Fees</td><td>Rs.1200 + 50(for textbook) non 
refundable</td></tr>
                <?php if(false){
                ?>
               		<tr><td><form method="post" action="camps.php"><input style="visibility:hidden;" name="course" value="language_german"><input type="submit" class="btn btn-success" name="register_course" value="Register for this course"></form></td></tr>
  				<?php 
  					}
  				else {?>
               		<tr style="background-color: rgba(221, 42, 214, 0.59);"><td>Registration Details</td><td>Pay fee in new yoga 
room, sac 16,17 may 6-10 pm [No need for online registration for this course]<!--To register for 
this 
course, first 
register 
yourself under "My Registration" tab --></td></tr>
               	<?php
               	}?>
	  		</table>
	  		</div>

	  		<div>
	  		<table class="table table-striped">
                <tbody><tr><td class="highlight">Course Name</td><td class="highlight">Japanese Language Classes (for first time learners)</td></tr>
                <tr><td>Instructor</td><td>Minakshi Soni</td></tr>
                <tr><td>Dates</td><td>26th May onwards, 40 hrs, 20 sessions, 5 days a week</td></tr>

	    		<tr><td>Timings</td><td>5 - 7 P.M</td></tr>
                <tr><td>Course Description</td><td>scripts covered 
					hiragana<br>
					katakana<br>
					kanji 100<br>
					JAPANESE GREETINGS 100 generally including businesses and everyday etiquettes<br>
					Japaenese numbers ,year,month,day,date,time,currency,weather<br>
					Japaenese grammar-Counters,particles,Nouns,pronouns,adjectives,verbs<br>
					Japenese listenig skills<br>
					Teaching techniques-Class presentations ,Japenese videos and audio clips<br>
					Course wrap up:recap of courese learnig's followed by written test(objective type question sets)<br> 
					</td></tr>
                <tr><td>Upper Cap</td><td>30  (First come first serve)</td></tr>
                <tr><td>Venue</td><td><strong>MB2(Main building) [New]</strong</td></tr>
                <tr><td>Fees</td><td>Rs.2000 (including textbook) non refundable</td></tr>
                <?php if(false){
                ?>
               		<tr><td><form method="post" action="camps.php"><input style="visibility:hidden;" name="course" value="language_japanese"><input type="submit" class="btn btn-success" name="register_course" value="Register for this course"></form></td></tr>
  				<?php 
  					}
  				else {?>
               		<tr style="background-color: rgba(221, 42, 214, 0.59);"><td>Registration Details</td><td>Pay fee in new yoga 
room, sac 16,17 may 6-10 pm [No need for online registration for this course] <!--To register for 
this course, first register 
yourself under "My Registration" 
tab--></td></tr>
               	<?php
               	}?>
	  		</table>
	  		</div>
	  		For more details contact Tanmay Srivastava (Institute Literary Arts Secretary)(9967046916) or <br>Shubham 
Goyal Career Cell(ISAA) (9930601106)<br><br>
		</div>


  		<div id="p5" style="margin:20px" class="col-md-12 content">
   			<h1>Registration</h1>
					<?php
						if($registered){
							echo "You are already registered. Check your courses below.<br>
							<strong>
							Payment of
							deposit/fee for the course can be done on May 18 (Sunday)<br>
							Timings: 5 pm - 
								7 pm <br> Venue: Yoga Room (in SAC) <br>
							</strong>"; 
							$results=mysql_query("select* from nonTechData where ldap='$ldap'");
							echo '<table class="table table-striped">';
							while($row=mysql_fetch_assoc($results)){
								echo "<tr><td>".$row['course']."</td><td><form method ='post' action='camps.php'><input style='visibility:hidden' name='course' value='".$row['course']."'><input class='btn btn-danger' value='Deregister' type='submit' name='deregister'></form></td></tr>";
							}
							echo "</table>";
						}
					?> 
					<center>
					<div id="register_form">
					<form method="post" action="camps.php">
						<table style="font-size:15px;margin-left:20px;">
		 				<tr><td>Username *</td><td><input type="text" name="username" value='<?php echo $ldap;?>' disabled='true'/></td></tr>
						<tr><td>Name *</td><td><input type="text" name="fullname"></td></tr>
						<tr><td>Roll no *</td><td><input type="text" name="roll"></td></tr>
						<tr><td>Email *</td><td><input type="text" name="email"></td></tr>
						<tr><td>Year of study*</td><td><input type="text" name="year"></td></tr>
						<tr><td>Hostel </td><td>
						<select name='hostel'>
							<option value='H1'>H1</option>
							<option value='H2'>H2</option>
							<option value='H3'>H3</option>
							<option value='H4'>H4</option>
							<option value='H5'>H5</option>
							<option value='H6'>H6</option>
							<option value='H7'>H7</option>
							<option value='H8'>H8</option>
							<option value='H9'>H9</option>
							<option value='H10'>H10</option>
							<option value='H11'>H11</option>
							<option value='H12'>H12</option>
							<option value='H13'>H13</option>
							<option value='H14'>H14</option>
							<option value='H15'>H15</option>
							<option value='Tansa'>Tansa</option>
						</select></td></tr>
						<tr><td>Room </td><td><input type='text' name='room'/></td></tr>
						<tr><td>Mobile *</td><td><input type='text' name ="mobile"></td></tr>
						<tr><td>Department *</td><td><select name="department" id="choose-dep"><option value="AERO">Aerospace Engineering</option><option value="BioSchool">Bio 
							Engineering</option><option value="CESE">Centre for Environmental Science and Engineering</option><option value="CSE" selected="selected">Computer Science and Engineering</option><option value="CHEM">Chemistry</option><option value="CHE">Chemical 
							Engineering</option><option value="CIVIL">Civil Engineering</option><option value="COR">Corrosion Science and Engineering</option><option value="CSRE">CSRE (Inter-Departmental)</option><option value="EE">Electrical Engineering</option><option value="ESE ">Environmental 
							Science and Engineering</option><option value="HSS">Humanities and Social Sciences</option><option value="GEOS">Earth 
							Sciences</option><option value="IDC">IDC (Inter-Departmental)</option><option value="MATH">Mathematics</option><option value="ME">Mechanical Engineering</option><option value="MET">Metallurgical Engineering and Material Sciences</option><option value="PHY">Engineering Physics</option><option value="ESE">Energy Sciences and Engineering </option><option value="treelabs">Treelabs(Inter-Departmental)</option></select>	
						</td></tr>
						<tr><td></td><td><input id="register" type='submit' value='register' class="btn btn-primary btn-large" name='register'></td></tr>
						</table>
					</form>
					</div>
					</center>
	  		</div>
</body>
</html>
