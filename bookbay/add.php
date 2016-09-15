<?php
session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}
require_once("functions.php");
if (isset($_POST['add'])){
	$created_by = $_SESSION['ldap_id'];
	$name = $_POST['name'];
	$semester = $_POST['semester'];
	$course_no= $_POST['course'];
	$cost = $_POST['cost'];
	$tags = $_POST['tags'];

	$name = str_replace('"', '', $name);
$semester = str_replace('"', '', $semester);
$course_no = str_replace('"', '', $course_no);
$course_no = str_replace(' ', '', $course_no);
$cost = str_replace('"', '', $cost);

$tags = str_replace('"', '', $tags);

	
	add_new_book($created_by,$name,$semester,$course_no,$cost,$tags);
	//echo $created_by. $name.$semester.$course_no.$cost.$tags;
	$message = "Successfully Added Book";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="img/icon.png"/>

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">

<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<title>bookBay</title>
<style>





#comment{
color:#666666;
display:block;
font-size:14px;
font-weight:normal;
text-align:right;
width:200px;
}
#label{
	display:block;
	text-align:right;
	float:left;
line-height:.8em;
}
#main input{
float:left;
font-size:24px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:100%;
margin:2px 0 20px 10px;
height:47px;
}
#addbutton{
height:50px;
font-size:20px;
}
</style>

  <script type="text/javascript">
	  //form validation
            function validatename(field){
				if (field =="") 
				{return "No Name entered. \n";}
				else{return "";}
			}
			function validatesemester(field){
				if (field =="") {return "No Semester entered. \n";}
				else if(isNaN(field)) {
				return "Semester should be a number";
			}
			else {
				return "";
			}
			}
			function validatecourse(field){
				if (field =="") {return "No Course entered. \n";
			}
			else{
				return "";
			}
					
			}
			function validatecost(field){
				if (field ==""){ return "No Cost entered. \n";}
				else if(isNaN(field)) {
				return "Cost should be a number";
			}
				else{
					return "";}
					
			}
			
			
			//form validation main program
            function validate(form)
            {
				
				fail=validatename(form.name.value);
				fail+=validatesemester(form.semester.value);
				fail+=validatecourse(form.course.value);
				fail+=validatecost(form.cost.value);
				
				if (fail == "") return true
				else { alert(fail); return false }
			}
	  
	  
	  
            
        </script>
</head>

<body>
<?php include_once("analytics.php");?>
<div class="container-fluid">
<div class="row-fluid" id="topbar">
    <div class="span11" id="outer">
    <a href="#" id="logo"><img src="img/title1.png" /></a>
    <a href="http://gymkhana.iitb.ac.in/~ugacademics/" style="margin-right:20px;text-decoration:none;float:right;"><img src="img/logo.png" width="80"></a>
    <h3>Buy and sell your old books online with bookBay. </h3>
    </div>
  </div>

	<aside class="sidebar big-sidebar right-sidebar navigationbar">
	  <ul>  
	    <li class="color-bg">
	      <ul class="blocklist">
	        <li><a href="view.php">Search</a></li>
	        <li class="active"><a href="add.php">Add Book</a>
	        <li><a href="delete.php">Delete Book</a></li>
	        <li><a href="index.php?logout=true">Logout</a></li> 
	    </li>
	  </ul>
	</aside>
<div id="main1" class="row-fluid">
<div id="main" class="span10">


<form method="POST" action="add.php" name="form2" class="formed"><table>
<span id="main2">
<?php
	if(isset($message)){
		echo $message;
	}
?>
<tr><td><span id ="label">Book name<span id="comment"> (Eg. "Introduction to Economics - Samuelson")</span></span></td><td> <input type="text" name="name" /></td></tr>
<tr><td><span id="label">Semester<span id="comment">Eg. "1"</span></span></td><td><input type="text" name="semester" /></td></tr>
<tr><td><span id="label">Course<span id="comment">Eg. "HS101"</span></span></td><td><input type="text" name="course" /></td></tr>
<tr><td><span id="label">Cost<span id="comment">Eg. "50"; Enter "0" for donating the book</span></span></td><td><input type="text" name="cost" /></td></tr>

<tr><td><span id="label">Tags<span id="comment">Eg. "Economics","Samuelson"</span></span></td><td><input type="text" name="tags" /></td></tr>
</span>
<tr><td><input type="submit" class="btn btn-success" name='add' value="Add" onClick="return validate(form2)" id="addbutton"/></td><tr></table>
</form>
</div>

      

	</div>


	</body>




</html>
