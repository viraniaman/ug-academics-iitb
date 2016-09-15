<?php
session_start();
if(!isset($_SESSION['ldap']))
header('location: index.php');
ob_start();
include '../ispa/connect.php';
$db = mysql_connect($dbhost, $dbuser, $dbpasswd);
mysql_select_db($dbname);
if (isset($_POST['id'])){
	$id = $_POST['id'];
	$username=$_SESSION['ldap'];
        $result = mysql_query("select ldap_id from summer_data where ldap_id='$username' and course_id='$id'");
        $entries = mysql_num_rows($result);
        if($entries>=1){
                echo "<script>alert('You have already selected it.');</script>";
        }
	else {
		$result = mysql_query("select ldap_id from summer_data where ldap_id='$username'");
		$entries = mysql_num_rows($result);
		if($entries>=4){
			echo "<script>alert('You can select only 4 courses.');</script>";
		}
		else {
			mysql_query("INSERT INTO summer_data (ldap_id, course_id) VALUES ('$username', '$id')");
			mysql_query("UPDATE summer_courses set count=count+1 where id='$id'") or die (mysql_error());		
		}
	}
}
if (isset($_POST['continue'])){
	$other1=$_POST['other1'];
	$other2=$_POST['other2'];
	$other3=$_POST['other3'];

	$username=$_SESSION['ldap'];
		mysql_query("INSERT INTO summer_feedback (ldap_id, other1, other2, other3) VALUES ('$username', '$other1', '$other2', '$other3')");
}
?>
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title>Summer Courses Info</title>
<meta http-equiv = "cache-control" content="no-cache">
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href="dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="dist/css/bootstrap.css" rel="stylesheet" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<style type="text/css">
a {
	color: white;
	text-decoration: none;
}
</style>
<script type="text/javascript">
    $(document).ready(function(){
		$(".btn").click(function(){
			$("this").hide();
		});	
</script>

</head>

<body style="font-family:'Marcellus',serif;">
<div style="width:100%;margin-top:28px;background-color:#696969;color:white;">
	<center>
		<table cellpadding="10">
		<tr>
		<td>	<img src='iitb_logo.png' style="height:90px"> </td>
		<td>	<p style="color:white;font-size:45px;font-variant:small-caps;">Summer Courses Info</p> </td>
		</tr>
		</table>
	</center>
</div>
<center>
<div style="width:1100px;margin-top:40px;margin-bottom:40px;padding:20px;font-size:17px;border-radius:10px;	">
	<button onclick="location.href='http://gymkhana.iitb.ac.in/~ugacademics/summer/logout.php';" style="color:black;font-size:17px" class="btn">Logout</button>
Note: You can choose less than or equal to 4 courses only.Once filled can't be changed later. Only those students should fill up this 
form,
 who are staying back in the institute during the specified time. 
	<br>
just click on "yes" in the row of the course  (It will directly update the database).<table class="table 
table-striped">
	<thead><tr><th>Course Name</th><th>Professor</th><th>Number of backlogs</th><th>Are you going to take it?</th></tr></thead>
	<?php
		$query="select* from summer_courses where id>1 order by course";
		$results= mysql_query($query);
		while($row=mysql_fetch_array($results,MYSQL_ASSOC)){
			$td="<td>";
			$td2="</td>";
			echo "<tr>";
			echo $td.$row['course'].$td2.$td.$row['prof'].$td2.$td.$row['backlogs'].$td2;
			echo $td."<form action='info_form.php' method='POST' enctype='multipart/form-data'>";
			echo "<input style='display:none' type='text' value='".$row['id']."' name='id'></input>";
			//$hid="this.style.visibility='hidden';";
			echo "<button type='submit' class='btn'>Yes</button></form>".$td2;		
			echo "</tr>";
		}
  	?>
  	</table>
  	<hr>
  	<h2>Some Questions</h2>
  	<form  method="post" submit="info_form.php">
	Please mention any other course which should be run too, (if there is a possibility of many FR's in that course running in the present semester)  	
	<br>
	<textarea name="other1" class="form-control" rows="3" columns="0" ></textarea>
	<br>
	Any other course suggestions<br>
	<textarea name="other2" class="form-control" rows="4" columns="0" ></textarea><br>
	Give suggestions for instructor, if you have talked to anyone in relation to running summer course/who could possibly take those
	<br><textarea name="other3" class="form-control" rows="3" columns="0"></textarea> <br> 
  Click it only if you want to submit your feedback(Answer to above 3 questions). <input type='submit' class="btn btn-primary btn-large" 
name='continue' value='Submit'>
   </form>
   <br>
</div>
</center>
</body>
</html>
