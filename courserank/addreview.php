<?php 
session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
} 
$edit = false;
    require_once 'logininfo.php';
    require_once 'functions.php';
    if (isset($_POST['Deptt']) &&
        isset($_POST['CourseNumber']) &&
        isset($_POST['CourseName']) &&
        isset($_POST['Instructor']) &&
          isset($_POST['sem']) &&
        isset($_POST['year']) &&
        isset($_POST['preq']) &&
        isset($_POST['attd']) &&
        isset($_POST['evaluation']) &&
          isset($_POST['difficulty']) &&
        isset($_POST['quality']) &&
        isset($_POST['hour']) &&
        isset($_POST['orientation']) &&
          isset($_POST['long_term']) &&
        isset($_POST['tag']) &&
        isset($_POST['references']) &&
          isset($_POST['past_grading'])
        )
          {
            $deptt   = $_POST['Deptt'];//
            $cno    = $_POST['CourseNumber'];//
            $cna = $_POST['CourseName'];//
            $inst     = $_POST['Instructor'];//
            if(isset($_POST['addAnonymously']))
                {
                  $author = 'Anonymous User';
                }
            else
                {
                  $author = $_SESSION['ldap_id'];//
                }
            $cde = $_POST['cde'];//
            $evaluation=$_POST['evaluation'];//
            $difficulty=$_POST['difficulty'];//

            $sem     = $_POST['sem'];
            $year    = $_POST['year'];
            $preq=$_POST['preq'];
            $attd=$_POST['attd'];
            $quality=$_POST['quality'];
            $hour=$_POST['hour'];
            $orientation=$_POST['orientation'];
            $long_term=$_POST['long_term'];
            $tag=$_POST['tag'];
            $references=$_POST['references'];
            $past_grading=$_POST['past_grading'];
            
             
             
            $deptt = str_replace('"', '', $deptt);
            $cno = str_replace('"', '', $cno);
            $cna = str_replace('"', '', $cna);
            $inst = str_replace('"', '', $inst);
            $author = str_replace('"', '', $author);
            $preq = str_replace('"', '', $preq);
            $attd = str_replace('"', '', $attd);
            $evaluation = str_replace('"', '', $evaluation);
            $difficulty = str_replace('"', '', $difficulty);
            $quality = str_replace('"', '', $quality);
            $hour = str_replace('"', '', $hour);
            $orientation = str_replace('"', '', $orientation);
            $tag = str_replace('"', '', $tag);
            $references = str_replace('"', '', $references);
            $past_grading = str_replace('"', '', 
$past_grading);


            $db_server=  mysql_connect($db_hostname, 
$db_username, $db_password);
            if (!$db_server) die("Unable to connect to MySQL:".  
mysql_error());
            mysql_select_db($db_database,$db_server) or 
die("Unable to select database:".  mysql_error());  
if (isset($_POST['edited'])) {
	$idisi = $_POST['edited'];
	$query= "UPDATE reviews SET Deptt='$deptt', CourseNumber='$cno', CourseName='cna', Instructor='$inst', Author='$author', d1='$cde', d2='$evaluation', d4='$difficulty', sem='$sem', year='$year', preq='$preq', attd='$attd', quality='$quality', hour='$hour', orientation='$orientaion', long_term='$long_term', tag='$tag', reference='$references', past_grading='$past_grading' WHERE ID='$idisi'";
	if (!mysql_query($query, $db_server)){
              echo "Review could not be edited.<br />" 
.
              mysql_error() . "<br /><br />";
            }
			mysql_close($db_hostname);
} else {	

            $query = "INSERT INTO reviews 
VALUES"."(NULL,'$deptt', '$cno', '$cna', '$inst', '$author', 
'$cde', '$evaluation','$difficulty',CURDATE(),'$sem', '$year', 
'$preq','$attd','$quality','$hour', '$orientation', 
'$long_term','$tag','$references','$past_grading')";

            if (!mysql_query($query, $db_server)){
              echo "Review could not be added.<br />" 
.
              mysql_error() . "<br /><br />";
            }
            mysql_close($db_hostname);
          }}
		  elseif((isset($_POST['edit'])) && 
(isset($_POST['idis']))) {
	$edit=true;
	$idisi=  $_POST['idis']; 
	$db_server=  mysql_connect($db_hostname, 
$db_username, $db_password);
            if (!$db_server) die("Unable to connect to MySQL:".  
mysql_error());
            mysql_select_db($db_database,$db_server) or 
die("Unable to select database:".  mysql_error());
$query = "SELECT * FROM reviews WHERE id='$idisi'";
$result = mysql_query($query) or die (mysql_error());
$row = mysql_fetch_assoc($result);
mysql_close($db_hostname);
}
		  

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="main.css">
<link rel="icon" type="image/png" href="src/favicon.png">
<link rel="image_src" href="src/logo.png">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Course Rank | Get information/reviews of different courses to plan your semester better.</title>

<script type="text/javascript">
	  //form validation
            function validatename(field){
				if (field =="") 
				{
					return "No value entered. \n";}
				else{return "";}
			}
			
			function validateInstructor(field){
				if (field =="") {return "No Instructor Name entered. \n";
			}
			else{
				return "";
			}
					
			}
			function validatecode(field){
				if (field ==""){ return "No Course Number entered. \n";}
				else if(isNaN(field)) {
				return "Course Number should be a number.";
			} 
				else{
					return "";}
					
			}
			
			
			//form validation main program
            function validate(form)
            {
				
				fail=validatename(form.CourseName.value);
				fail+=validatecode(form.CourseNumber.value);
				fail+=validateInstructor(form.Instructor.value);
				fail+=validatename(form.d1.value);
                                fail+=validatename(form.d2.value);
                           
                               fail+=validatename(form.d4.value);
				
				if (fail == "") return true
				else { alert(fail); return false }
			}
	  
	  
	 
	  
            
        </script>





</head>
<body>
<div class="container-fluid" id="container">
    <div class="row-fluid" id="top">
        <!--Rainbow band-->
    </div> 
    <div class="row-fluid" id="main">
        <div class="spanhalf" id="sidebar">
        <ul class="nav nav-pills">
   <li class="active" ><a href="depreviews.php?dept=AE" rel="tooltip" title="Aerospace Engineering (AE) Courses' Reviews">AE</a></li><br>
    <li class="active"><a href="depreviews.php?dept=AN" id="sideitem" rel="tooltip" title="Animation (AN) Courses' Reviews ">AN</a></li><br>
 <li class="active" id="sideitem"><a href="depreviews.php?dept=BS" rel="tooltip" title="Biosciences & Bioengineering (BS) Courses' Reviews">BS</a></li><br>
 
    <li class="active" id="sideitem"><a href="depreviews.php?dept=BM" rel="tooltip" title="Bio-Medical Engineering (BM) Courses' Reviews">BM</a></li><br>
 <li class="active" id="sideitem"><a href="depreviews.php?dept=BT" rel="tooltip" title="Bio-Technology (BT) Courses' Reviews ">BT</a></li><br>
 <li class="active" id="sideitem"><a href="depreviews.php?dept=CE" rel="tooltip" title="Civil Engineering (CE) Courses' Reviews ">CE</a></li><br>
 <li class="active" id="sideitem"><a href="depreviews.php?dept=CH" rel="tooltip" title="Chemistry (CH) Courses' Reviews">CH</a></li><br>
<li class="active" id="sideitem"><a href="depreviews.php?dept=CL" rel="tooltip" title="Chemical Engineering (CL) Courses' Reviews">CL</a></li><br>
<li class="active" id="sideitem"><a href="depreviews.php?dept=CM" rel="tooltip" title="Climate Studies (CM) Courses' Reviews">CM</a></li><br>
 <li class="active" id="sideitem"><a href="depreviews.php?dept=CR" rel="tooltip" title="Corrosion Science & Engineering (CR) Courses' Reviews">CR</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=CS" rel="tooltip" title="Computer Science & Engineering (CS) Courses' Reviews">CS</a></li><br>
  <li class="active" id="sideitem"><a href="depreviews.php?dept=EE" rel="tooltip" title="Electrical Engineering (EE) Courses' Reviews">EE</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=EN" rel="tooltip" title="Energy Science and Engineering (EN) Courses' Reviews">EN</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=ENT" rel="tooltip" title="Entrepreneurship (EN) Courses' Reviews">ENT</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=EP" rel="tooltip" title="Engineering Physics (EP) Courses' Reviews">EP</a></li><br>
 <li class="active" id="sideitem"><a href="depreviews.php?dept=ES" rel="tooltip" title="Centre for Environmental Science & Engineering (ES) Courses' Reviews ">ES</a></li><br>
  <li class="active" id="sideitem"><a href="depreviews.php?dept=ET" rel="tooltip" title="Educational Technology (ET) Courses' Reviews">ET</a></li><br>
<li class="active" id="sideitem"><a href="depreviews.php?dept=GE" rel="tooltip" title="General (GE) Courses' Reviews">GE</a></li><br>
 <li class="active" id="sideitem"><a href="depreviews.php?dept=GP" rel="tooltip" title="Applied Geophysics (GP) Courses' Reviews ">GP</a></li><br>
  <li class="active" id="sideitem"><a href="depreviews.php?dept=GS" rel="tooltip" title="Earth Sciences (GS) Courses' Reviews">GS</a></li><br>
   


   
  <li class="active" id="sideitem"><a href="depreviews.php?dept=GNR" rel="tooltip" title="Centre of Studies in Resources Engineering (GNR) Courses' Reviews">GNR</a></li><br>
    
        </ul>
        </div>
        <div class="span3" id="content">
               <a href="main.php" title="Home"><div id="logo"></div></a>
            
                 <div id="fmenu">
                   
                <ul>
                   <li><a href="main.php"><img src="src/1.png"></a></li><br>
                    <li><a href="addreview.php"><img src="src/2.png"></a></li><br>
                    <li><a href="delete.php"><img src="src/5.png"></a></li><br>
                    <li><a href="index.php?logout=true"><img src="src/3.png"></a></li><br>
                    <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/"><img src="src/4.png"></a></li><br>
                </ul>
                     <form class="well form-inline" id="fixsearch" name="search" action="searchresult.php" method="post">
                         <select id="selec" name="dep">  
               <option>AE</option>  
                <option>AN</option>  
   <option>BM</option>  
                <option>BS</option>  
                <option>BT</option> 
   <option>CL</option>  
                <option>CH</option>  
                <option>CE</option>  
                <option>CM</option>  
                <option>CS</option> 
                <option>CR</option> 
 <option>EE</option> 
 <option>EN</option>
 <option>ENT</option> 
                <option>EP</option>  
 <option>ES</option> 

                 <option>ET</option> 
<option>GE</option>  
<option>GNR</option>  
                <option>GP</option> 
 
  <option>GS</option> 
 <option>HS</option>   
 <option>ID</option>  
                <option>IE</option> 
                <option>IM</option>
                <option>IN</option>
 <option>IT</option>
 
                <option>MA</option>
  <option>MD</option>
                <option>ME</option>
<option>MG</option>
                <option>MM</option>
<option>MMM</option>
                <option>MS</option>
              


 <option>NT</option> 
  <option>SC</option>
                <option>SI</option>  
		  
              
               

               
              
                <option>TD</option>  
               <option>PH</option>
                <option>RE</option>
              
              
  
                
               
               
               
               
               
                
              
                <option>VC</option>
              </select> 
 
  <input type="text" class="input-small" placeholder="3 digit code" name="code" required>
  <button type="submit" onClick="return validate2(search)">Search course</button>  
</form>
                </div>
        </div>
        <div class="span8" id="postarea">
            
          <div class="spanhalf" id="rsidebar">
        <ul class="nav nav-pills">
   <li class="active" id="sideitem"><a href="depreviews.php?dept=HS" rel="tooltip" title="Humanities & Social Sciences (HS) Courses' Reviews">HS</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=ID" rel="tooltip" title="Industrial Design Centre (ID) Courses' Reviews">ID</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=IE" rel="tooltip" title="Industrial Engineering & Operations Research (IE) Courses' Reviews">IE</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=IM" rel="tooltip" title="Industrial Management (IM) Courses' Reviews">IM</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=IN" rel="tooltip" title="Interaction Design (IN) Courses' Reviews">IN</a></li><br>
 <li class="active" id="sideitem"><a href="depreviews.php?dept=IT" rel="tooltip" title="School of Information Technology (IT)  Courses' Reviews">IT</a></li><br>
<li class="active" id="sideitem"><a href="depreviews.php?dept=MA" rel="tooltip" title="Mathematics (MA) Courses' Reviews">MA</a></li><br>
<li class="active" id="sideitem"><a href="depreviews.php?dept=ME" rel="tooltip" title="Mechanical Engineering (ME) Courses' Reviews">ME</a></li><br>
   <li class="active" id="sideitem"><a href="depreviews.php?dept=MD" rel="tooltip" title="Mobility & Vehicle Design (MD) Courses' Reviews">MD</a></li><br>
 <li class="active" id="sideitem"><a href="depreviews.php?dept=MG" rel="tooltip" title="SJM School of Management (MG) Courses' Reviews">MG</a></li><br>

    <li class="active" id="sideitem"><a href="depreviews.php?dept=MM" rel="tooltip" title="Metallurgical Engineering & Materials Science (MM) Courses' Reviews">MM</a></li><br>
<li class="active" id="sideitem"><a href="depreviews.php?dept=MMM" rel="tooltip" title="Materials, Manufacturing and Modelling (MMM) Courses' Reviews">MMM</a></li><br>
 <li class="active" id="sideitem"><a href="depreviews.php?dept=MS" rel="tooltip" title="Materials Science (MS) Courses' Reviews">MS</a></li><br>
 <li class="active" id="sideitem"><a href="depreviews.php?dept=NT" rel="tooltip" title="Centre for Research in Nano Technology and Sciences (NT) Courses' Reviews">NT</a></li><br>
  <li class="active" id="sideitem"><a href="depreviews.php?dept=PH" rel="tooltip" title="Physics (PH) Courses' Reviews">PH</a></li><br>
 <li class="active" id="sideitem"><a href="depreviews.php?dept=RE" rel="tooltip" title="Reliability Engineering (RE) Courses' Reviews">RE</a></li><br>
<li class="active" id="sideitem"><a href="depreviews.php?dept=SC" rel="tooltip" title="Systems & Control Engineering (SC) Courses' Reviews">SC</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=SI" rel="tooltip" title="Applied Statistics and Informatics (SI) Courses' Reviews">SI</a></li><br>
   
    
    
 
  
   
   
 <li class="active" id="sideitem"><a href="depreviews.php?dept=TD" rel="tooltip" title="CTARA (TD) Courses' Reviews ">TD</a></li><br>
   
    
    <li class="active" id="sideitem"><a href="depreviews.php?dept=VC" rel="tooltip" title="Visual Communication (VC) Courses' Reviews">VC</a></li><br>
  
    
        </ul>
        </div>
          
            <div id="separation" class="span8"></div>
            <div class="span8" id="add">
               
                <form class="form-horizontal" name="addco" action="addreview.php" method="post">  
        <fieldset>  
          <legend> <?php if($edit) echo 'Edit your Course Review for '. $idisi .$row['Deptt'] .$row['CourseNumber']; else echo'Add your Course Reviews';?></legend>  
          
         
          <div class="control-group">  
            <label class="control-label" for="select01" 
>Department</label>  
            <div class="controls">  
              <select id="select01" name="Deptt">  
                 <option>AE</option>  
                <option>AN</option>  
   <option>BM</option>  
                <option>BS</option>  
                <option>BT</option> 
   <option>CL</option>  
                <option>CH</option>  
                <option>CE</option>  
                <option>CM</option>  
                <option>CS</option> 
                <option>CR</option> 
 <option>EE</option> 
 <option>EN</option> 
 <option>ENT</option>
                <option>EP</option>  
 <option>ES</option> 

                 <option>ET</option> 
<option>GE</option>  
<option>GNR</option>  
                <option>GP</option> 
 
  <option>GS</option> 
 <option>HS</option>   
 <option>ID</option>  
                <option>IE</option> 
                <option>IM</option>
                <option>IN</option>
 <option>IT</option>
 
                <option>MA</option>
  <option>MD</option>
                <option>ME</option>
<option>MG</option>
                <option>MM</option>
<option>MMM</option>
                <option>MS</option>
              


 <option>NT</option> 
  <option>SC</option>
                <option>SI</option>  
                <option>TD</option>  
               <option>PH</option>
                <option>RE</option>
                <option>VC</option>
              </select> 
                <p class="help-block">Eg."CS" for CS101 
course.</p>
            </div>  
          </div>  
          <div class="control-group">  
            <label class="control-label" for="input01" >Three 
digit Course Code</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" 
id="input01" name="CourseNumber" value="<?php if($edit) echo $row['CourseNumber'];?>" required>  
              <p class="help-block">Eg. "101" for CS101 
course.</p>  
            </div>  
          </div>  
           <div class="control-group">  
            <label class="control-label" for="input01">Course 
Name</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" 
id="input01"  name="CourseName" value="<?php if($edit) echo $row['CourseName'];?>" required>  
              <p class="help-block">Eg."Computer Programming 
and Utilization" for CS101.</p>  
            </div>  
          </div> 
           <div class="control-group">  
            <label class="control-label" for="input01">Course 
Instructor</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" 
id="input01"  name="Instructor" value="<?php if($edit) echo $row['Instructor'];?>" required>  
            </div>  
          </div> 

          <div class="control-group">  
            <label class="control-label" for="textarea" >Course 
Description</label>  
            <div class="controls">  
              <textarea class="input-xlarge" id="textarea" 
rows="3" name="cde"><?php if($edit) echo $row['d1'];?></textarea>  
            </div>  
          </div>

          <div class="control-group">  
            <label class="control-label" for="select01" 
>Semester of Running</label>  
            <div class="controls">  
              <select id="select01" name="sem">  
			  <option>--</option>
                <option>Autumn</option>  
                <option>Spring</option>  
              </select> 
            </div> 
          </div>

          <div class="control-group">  
            <label class="control-label" for="select01" 
>Year</label>  
            <div class="controls">  
              <select id="select01" name="year"> 
				<option>--</option>
                <option>2009</option> 
                <option>2010</option> 
                <option>2011</option> 
                <option>2012</option> 
                <option>2013</option> 
                <option>2014</option> 
              </select> 
            </div> 
          </div>

           <div class="control-group">  
            <label class="control-label" 
for="input01">Prerequisites</label>  
            <div class="controls"> 
				<textarea class="input-xlarge" 
id="textarea"  name="preq" rows="3"><?php if($edit) echo $row['preq'];?> </textarea>
            </div>  
          </div> 

           <div class="control-group">  
            <label class="control-label" 
for="input01">Attendance policy of the instructor</label>  
            <div class="controls">  
              <textarea rows="2" class="input-xlarge" 
id="textarea"  name="attd">  <?php if($edit) echo $row['attd'];?></textarea>
            </div>  
          </div> 

           <div class="control-group">  
            <label class="control-label" for="textarea" 
>Evaluation Scheme<br>(Quizzes, Lectures, Assignments etc..with 
weightage)</label>  
            <div class="controls">  
              <textarea class="input-xlarge" id="textarea" 
rows="3" name="evaluation" ><?php if($edit) echo $row['d2'];?></textarea>  
            </div>  
          </div>  


          <div class="control-group">  
            <label class="control-label" for="select01" 
>Difficulty Level<br>(1-Easy and 5-Difficult)</label>  
            <div class="controls">  
              <select id="select01" name="difficulty">
				<option>--</option>
                <option>1</option> 
                <option>2</option> 
                <option>3</option> 
                <option>4</option> 
                <option>5</option> 
              </select> 
            </div> 
          </div>

          <div class="control-group">  
            <label class="control-label" for="select01" 
>Quality of Lectures <br>(1-Poor and 5-Good)</label>  
            <div class="controls">  
              <select id="select01" name="quality"> 
				<option>--</option>
                <option>1</option> 
                <option>2</option> 
                <option>3</option> 
                <option>4</option> 
                <option>5</option> 
              </select> 
            </div> 
          </div>

          <div class="control-group">  
            <label class="control-label" 
for="input01">Hour/week to be spent</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" 
id="input01"  name="hour" value="<?php if($edit) echo $row['hour'];?>" >  
            </div>  
          </div> 

          <div class="control-group">  
            <label class="control-label" for="select01" >Course 
Orientation</label>  
            <div class="controls">  
              <select id="select01" name="orientation">  
                <option>Application</option>  
                <option>Theoretical</option>  
                <option>Both (Theoretical and Application) </option>  
              </select> 
            </div>  
          </div>  

          <div class="control-group">  
            <label class="control-label" for="textarea" > Long 
term benefits<br>( Like in research, placements, tests 
etc.)</label>  
            <div class="controls">  
              <textarea class="input-xlarge" id="textarea" 
rows="3" name="long_term"><?php if($edit) echo $row['long_term'];?></textarea>  
            </div>  
          </div>

          <div class="control-group">  
            <label class="control-label" for="textarea" 
>Tagging restrictions</label>  
            <div class="controls">  
              <textarea class="input-xlarge" id="textarea" 
rows="3" name="tag" ><?php if($edit) echo $row['tag'];?></textarea>  
            </div>  
          </div> 

           <div class="control-group">  
            <label class="control-label" for="textarea" 
>References(Textbooks and Articles)</label>  
            <div class="controls">  
              <textarea class="input-xlarge" id="textarea" 
rows="3" name="references"><?php if($edit) echo $row['reference'];?></textarea>  
            </div>  
          </div>  
          
           <div class="control-group">  
            <label class="control-label" for="textarea" >Past 
grading stats</label>  
            <div class="controls">  
              <textarea class="input-xlarge" id="textarea" 
rows="3" name="past_grading"><?php if($edit) echo $row['past_grading'];?></textarea>  
            </div>  
          </div> 
		  <?php if($edit) { ?>
		  <input type="hidden" name="edited" value="<?php echo $idisi; ?>"> 
		  <?php } ?>

          <div class="form-actions">
            <input type="checkbox" name="addAnonymously" value="Add Anonymous Review"> Add Anonymous Review (Note : This review may be moderated)  
           <br><br> <button type="submit" class="btn btn-primary" 
onClick="return validate(addco)">Save changes</button>  
            <button class="btn">Cancel</button>  <hr><br>
            <?php if (count($_POST)>2) echo<<<_END
                <META HTTP-EQUIV=Refresh CONTENT="0; 
URL='posts.php'">
_END;
            ?>
           

          </div>  
        </fieldset>  

</form>  
                
            </div>
        </div>
    </div>
  <div id="footer2">
        <span id="f10"> <a href="disclaimer.php">Discaimer</a> | <a href="contact.php">Contact Us</a>  <span id="f11"> Copyright &copy; 
2014 
Web Team <a href="http://gymkhana.iitb.ac.in/~ugacademics/">UG Academic Affairs</a> 
                 <a href="http://www.iitb.ac.in">IIT Bombay</a>
         </span>  
 </div>
</div>
</body>
</html>
