<?php
session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}
    require_once 'logininfo.php';
    require_once 'functions.php';
    $db_server=  mysql_connect($db_hostname, $db_username, $db_password);
    if (!$db_server) die("Unable to connect to MySQL:".  mysql_error());
    mysql_select_db($db_database,$db_server) or die("Unable to select database:".  mysql_error());
    if (isset($_POST['dep']) &&
	isset($_POST['code']))
            {
            $dep   = $_POST['dep'];
            $code  = $_POST['code'];
            } else header ("location:main.php");
    
    
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * 5;
$sql = "SELECT * FROM reviews WHERE Deptt='$dep' AND CourseNumber=$code ORDER BY id DESC";
$rs_result = mysql_query ($sql) or die("Error connecting to database");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="main.css">
<link rel="icon" type="image/png" href="src/favicon.png">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Course Rank | Get information/reviews of different courses to plan your semester better.</title>

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
 
  <input type="text" class="input-small" placeholder="3 digit code" name="code">
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
            <?php
            /*$nrows=  mysql_num_rows($rs_result);
            echo $nrows;*/
                        while ($row = mysql_fetch_assoc($rs_result)) {
							
                            /*if ($nrows==0)
                            {
                                echo<<<_END
                Sorry,no reivews have been added for any of $dep courses.
                    <br>
                    Add one <a href="addreview.php">here</a>.
_END;
                            }
                            else{*/
                ?>
              <div id="separation" class="span8"></div>

            <div class="span8" id="posts">
                <dl id="postitem" class="dl-horizontal">

                <table class="table table-striped">
                    <tr><td>Department</td><td><?php echo $row['Deptt']; ?></td></tr>
                    <tr><td>Course Code</td><td><?php echo 
$row["CourseNumber"]; ?></td></tr>
                    <tr><td>Course Name</td><td><?php echo 
$row["CourseName"]; ?></td></tr>
		    <tr><td>Instructor</td><td><?php echo 
$row["Instructor"]; ?></td></tr>
                    <tr><td>Year</td><td><?php echo $row['year']; 
?></td></tr>
                    <tr><td>Semester</td><td><?php echo $row["sem"]; 
?></td></tr>
                    <tr><td>Prerequisites</td><td><?php echo 
$row["preq"]; ?></td></tr>


                 
                    <tr><td>Course Description</td><td><?php echo 
$row["d1"]; ?></td></tr>
                 
                    <tr><td>Course load (Load = No of Quizzes, 
Assigments, etc.)</td><td><?php echo $row["d2"]; ?></td></tr>
                    
                 
                    <tr><td>Difficulty(1-Easy 
,5-Difficult)</td><td><?php echo $row["d4"]; ?></td></tr>
                    <tr><td>Attendance</td><td><?php echo 
$row["attd"]; ?></td></tr>
                    <tr><td>Quality of lectures(1-Poor, 
5-Good)</td><td><?php echo $row["quality"]; ?></td></tr>
                    <tr><td>No. of hours/week</td><td><?php echo 
$row["hour"]; ?></td></tr>
                    <tr><td>Orientation of course</td><td><?php echo 
$row["orientation"]; ?></td></tr>
                    <tr><td>Long term benefits</td><td><?php echo 
$row["long_term"]; ?></td></tr>
                    <tr><td>Tag</td><td><?php echo $row["tag"]; 
?></td></tr>
                    <tr><td>References</td><td><?php echo 
$row["reference"]; ?></td></tr>
                    <tr><td>Past Grading</td><td><?php echo 
$row["past_grading"]; ?></td></tr>

                 
                    <tr><td>Review written by</td><td><?php echo 
$row["Author"]; ?></td></tr>
                    <tr><td>Date of review</td><td><?php echo 
$row["date"]; ?></td></tr>

                    <?php
                        $rse=$row["id"];
                ?> 
              </table>

                </dl>
            </div>

            <div id="separation" class="span8"></div>
            <?php
                         //   }
                        };
                ?> 
            <div id="separation" class="span8"></div>
            
                
                <?php
       
                $sql1 = "SELECT COUNT(ID) FROM reviews WHERE Deptt='$dep' AND CourseNumber=$code";
$rs_result1 = mysql_query ($sql1);
                $row = mysql_fetch_row($rs_result1);
$total_records = $row[0];
$total_pages = ceil($total_records / 5);
  if (mysql_num_rows($rs_result)==0){
      echo<<<_END
       <div class="span8" id="posts">
                Sorry, no reivews have been added till now for $dep $code for any semester.
                    <br>
                    Add one <a href="addreview.php">here</a>.
                    </div>
_END;
  }
  
  
   
/*for ($i=1; $i<=$total_pages; $i++) {
            echo "<a href='searchresult.php?page=".$i."'>".$i."</a> ";
};*/
?>
               
            
       
    </div>
 
</div>
    <div id="footer2">
        <span id="f10"> <a href="disclaimer.php">Discaimer</a> | <a href="contact.php">Contact Us</a>  <span id="f11"> Copyright © 2012 Web Team <a href="http://gymkhana.iitb.ac.in/~ugacademics/">UG Academic Affairs</a> 
                <a href="http://www.iitb.ac.in">IIT Bombay</a>
         </span>  
 </div>
</body>
</html>

