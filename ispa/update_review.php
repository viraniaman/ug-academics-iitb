<?php
	session_start();
	 if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
	}
	$ldap_id=$_SESSION['ldap_id'];
	require_once("connect.php");
	require_once("functions.php");
	session_start();
	$name=$_POST['name'];
	$department=$_POST["department"];
	$did_project=$_POST["did_project"];
	$suggestion=$_POST["suggestion"];
	if($name=="" or $department=="")
		{
		header("location:review.php");
		}
	else
	if($did_project=="yes")
		{
		header("location:review2.php");
		}
	else
		{
		$db=mysql_connect("localhost","$dbuser","$dbpasswd");
	    mysql_select_db("$dbname");
		$results2=mysql_query("SELECT * FROM review_form WHERE username='$ldap_id'");
		if(mysql_num_rows($results2)!=0)
		{
			$update=mysql_query("UPDATE review_form SET id='',username='$ldap_id',fullname='$name',did_project='no',prof_name='',phd_name='',project_name='',project_department='',experience='',work_related='',suggestion='$suggestion',student_department='',year_of_study='',mobile='',alt_email='' WHERE username='$ldap_id'");
			}
		else
		$update=mysql_query("INSERT INTO review_form (id,username,fullname,did_project,prof_name,phd_name,project_name,project_department,experience,work_related,suggestion,student_department,year_of_study,alt_email,mobile) VALUES ('','$ldap_id','$name','$did_project','','','','','','','$suggestion','','','','')") or die(mysql_error());
		die("Your review has been recorded!");
		header("location:index.php");
		}
?>