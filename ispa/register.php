<?php
session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}
require_once("functions.php");
include "connect.php";
if (isset($_POST['register']))
{

	$err=0;
	$username= $_SESSION['ldap_id'];//$_POST['username'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$alt_email = $_POST['altemail'];
	$department = $_POST['department'];
	$year_of_study = $_POST['year'];
	$mobile = $_POST['mobile'];
	$hostel = $_POST['hostel'];
	$room = $_POST['room'];
	$sop = $_POST['sop'];
	$resume = $_POST['resume'];
	if($sop=="" || $year_of_study=="" || $fullname=="" || $email==""){
		$err=1;
		//header("location:error.php");
	}
	else if (!(is_registered($username)))
	{
		register_user($username,$fullname,$department,$email,$alt_email,$year_of_study,$mobile,$hostel,$room,$sop,$resume);
		header("location:apply.php");
	}
	else 
	{
		//echo "here";	
		$db = mysql_connect("localhost", "ugacademics", "ug_acads");
		
		mysql_select_db("ugacademics");
		mysql_query("update registered_users_for_project set fullname='$fullname', department='$department', 
		year_of_study='$year_of_study', hostel='$hostel', room='$room', mobile='$mobile', email='$email',
		alt_email='$alt_email', sop='$sop', resume='$resume' where username='$username'") or die (mysql_error());
		
		//echo "q";
		header("location:apply.php");

	}
	
}

$info = ldap_find_all('uid',$_SESSION['ldap_id']);
//print_r($info);
$fullname = $info[0]["cn"][0];
$username=$info[0]['uid'][0];
$dep = explode(",",$info[0]["dn"]);
$alldepartment = explode("=",$dep[2]);
$mydepartment=$alldepartment[1];
$alldepartments =  DepartmentFindAll();
$email=$info[0]["mail"][0];
$alternate_email=$info[0]['mailforwardingaddress'][0];
$year = explode('/',$info[0]["mailmessagestore"][0]);
$year_of_study=2014-$year[2];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<title>ISPA | Home</title>
</head>
<body id="body1">

    <div class="container-fluid">
	      <div class="page-header">
		  <h1>ISPA</h1>
		  <span style="display:inline; margin-left:2%; font-size:200%;">Institute Summer Project Allocation</span>
		  </div>
		  <ul class="nav nav-pills">
		  <li class="active"><a href="index.php">Home</a></li>
		   <li><a href="login.php">Apply</a></li>
		  <li><a href="updates.php">Updates/Results</a></li>
		  <li><a href="">FAQs</a></li>
		  <li><a href="contact.html">Contact/FAQs</a></li>
		  </ul>
		 <div class="row-fluid"> 
         <div class="contenthome1 span12">
<?php
	if($err)
             echo "<script>alert('you forgot to fill somthing mandatory');</script>";
?>
<br><br><br>
		<form method="POST" action="register.php">
			<table style="font-size:15px;margin-left:20px;">
		 <tr><td>Username *</td><td><input type="text" name="username" value='<?php echo $username;?>' disabled='true'/></td></tr>
<tr><td>Name *</td><td><input type="text" name="fullname" value='<?php echo $fullname;?>' /></td></tr>
<tr><td>Email *</td><td><input type="text" name="email" value ='<?php echo $email;?>' /></td></tr>
<tr><td>Alternate Email </td><td><input type="text" name="altemail" value ='<?php echo $alternate_email;?>' /></td></tr>
<tr><td>Year *</td><td><input type="text" name="year" value ='<?php echo $year_of_study;?>' /></td></tr>
<tr><td>Hostel </td><td><select name='hostel'>
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
<tr><td>Mobile </td><td><input type='text' name ="mobile"></td><tr>

<tr><td>Department *</td><td><select name="department">
<?php 

foreach ($alldepartments as $key=>$value){
	if ($value['value']!=$mydepartment){
		
	echo "<option value='" . $value['value']. "'>".$value['department']."</option>";
	}
	else {
		echo "<option value='" . $value['value']. "' selected='selected'>".$value['department']."</option>";}
	
		
}?>
<br>
</td></tr>
<tr><td>Statement of Purpose *<br> 
<a target="_blank" href="../type1_projects.php">Type 1 projects</a><br>
<a target="_blank" href="../type2_projects.php">Type 2 projects</a></td><td><textarea 
maxlength="1000" 
style="resize:none;width:200%;height:170px;" 
name="sop" 
placeholder="Enter your SOP here (Avoid ' and '' 
o/w it won't be saved)"></textarea></td><tr>
<tr><td>Link of Resume </td><td><textarea maxlength="100" 
style="resize:none;width:150%;height:40px;" name="resume" placeholder="If you don't have it online then upload using this: http://gymkhana.iitb.ac.in/~ugacademics/homepage"></textarea></td><tr>
<tr><td>* Compulsory </td></tr>
<tr><td></td><td><input type='submit' value='Register/Update' class="btn btn-primary btn-large" name='register'></td></tr>
</table>

</form> 
		 </div>
		 
		</div>
    
</body>
</html>

