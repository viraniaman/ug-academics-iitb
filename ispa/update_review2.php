<?php
	session_start();
	if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
		}
	require_once("connect.php");
	//require_once("functions.php");
	$ldap_id=$_SESSION['ldap_id'];
	$prof_name=$_POST['prof_name'];
	$phd_name=$_POST["phd_name"];
	$project_name=$_POST["project_name"];
	$project_department=$_POST["project_department"];
	$experience=$_POST["experience"];
	$work_related=$_POST["work_related"];
	$suggestion=$_POST["suggestion"];
	if($prof_name=="" or $project_name=="" or $project_department=="")
		{
		header("location:review2.php");
		}
		else
	{
		$db=mysql_connect("localhost","$dbuser","$dbpasswd");
	    mysql_select_db("$dbname");
		$query="SELECT * FROM registered_users_for_project WHERE username='$ldap_id'";
		$results=mysql_query($query);
		if (mysql_num_rows($results)==0)
		{

		   	print '<script>';
			print 'alert("You are not registered for any project!")';
			print '</script>';
		}
		else
		{
		while($row = mysql_fetch_array($results,MYSQL_ASSOC)){
		$id = $row['id'];
		$student_department = $row['student_department'];
		$year = $row['year_of_study'];
		$mobile = $row['mobile'];
		$alt_email = $row['alt_email'];
		$fullname = $row['fullname'];
		$results2=mysql_query("SELECT * FROM review_form WHERE username='$ldap_id'");/*----------*/
		if(mysql_num_rows($results2)!=0)
		{
			$update=mysql_query("UPDATE review_form SET id='$id',username='$ldap_id',fullname='$fullname',did_project='yes',prof_name='$prof_name',phd_name='$phd_name',project_name='$project_name',project_department='$project_department',experience='$experience',work_related='$work_related',suggestion='$suggestion',student_department='$student_department',year_of_study='$year',mobile='$mobile',alt_email='$alt_email' WHERE username='$ldap_id'");
			}
		else
		$add=mysql_query("INSERT INTO review_form (id,username,fullname,did_project,prof_name,phd_name,project_name,project_department,experience,work_related,suggestion,student_department,year_of_study,alt_email,mobile) VALUES ('$id','$ldap_id','$fullname','yes','$prof_name','$phd_name','$project_name','$project_department','$experience','$work_related','$suggestion','$student_department','$year','$alt_email','$mobile')") or die(mysql_error());

			die("Your review has been recorded!");
		header("location:index.php");

		}
		}
	}
		
?>