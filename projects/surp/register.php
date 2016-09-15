<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">

  <title>Apply | SURP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="admin/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="admin/font-awesome/css/font-awesome.min.css" />
    <script type="text/javascript" src="admin/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="admin/bootstrap/js/bootstrap.min.js"></script>

  <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

    <link rel="stylesheet" href="css/style_apply.css">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="container">
  <div class="page-header">
    <h1>Register | <a href="index.php">SURP</a><small> Summer Undergraduate Research Program</small></h1>
</div></div>
    <div class="wrapper">
<?php
session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: apply.php");
}
require_once("functions1.php");
include "connect1.php";
if (isset($_POST['register']))
{

  $err=0;
  $username= $_SESSION['ldap_id'];//$_POST['username'];
  $fullname = $_POST['fullname'];
  $roll = $_POST['roll'];
  $email = $_POST['email'];
  $alt_email = $_POST['altemail'];
  $department = $_POST['department'];
  $year_of_study = $_POST['year'];
  $mobile = $_POST['mobile'];
  $room = $_POST['room'];
  $cpi = $_POST['cpi'];
  if ($year_of_study==1) {   $experience = mysql_real_escape_string($_POST['experience']);} else {
    $experience = ''; }
	if (!(is_registered($username)))
	{
		register_user($username,$fullname,$roll,$department,$email,$alt_email,$year_of_study,$mobile,$room,$cpi,$experience);
    header("location:choice.php");
	}
	else 
	{
		//echo "here";  
    $db = mysql_connect("localhost", "ugacademics", "ug_acads");
    
    mysql_select_db("ugacademics");
    mysql_query("update surp_registered set fullname='$fullname', roll='$roll', department='$department', 
    year_of_study='$year_of_study', room='$room', mobile='$mobile', email='$email',
    alt_email='$alt_email', cpi='$cpi', first_year_exp='$experience' where username='$username'") or die (mysql_error());
    
    //echo "q";
    header("location:choice.php");


	}
	
}

$info = ldap_find_all('uid',$_SESSION['ldap_id']);
//print_r($info);
$fullname = $info[0]["cn"][0];
$username=$info[0]['uid'][0];
$roll = $info[0]["employeenumber"][0];
$dep = explode(",",$info[0]["dn"]);
$alldepartment = explode("=",$dep[2]);
$mydepartment=$alldepartment[1];
$alldepartments =  DepartmentFindAll();
$email=$info[0]["mail"][0];
$alternate_email=$info[0]['mailforwardingaddress'][0];
$year = explode('/',$info[0]["mailmessagestore"][0]);
$year_of_study=2016-$year[2];


?>

    <form class="form-register" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">       
      <h2 class="form-signin-heading">Register</h2>
      <input type="text" class="form-control" name="fullname" placeholder="Full Name *" required="" autofocus="" value='<?php echo $fullname;?>' />
      <input type="text" class="form-control" name="roll" placeholder="Roll No *" required="" autofocus="" value='<?php echo $roll;?>' />
      <input type="text" class="form-control" name="email" placeholder="Email *" required="" autofocus="" value ='<?php echo $email;?>' />
      <input type="text" class="form-control" name="altemail" placeholder="Alternate Email" autofocus="" value ='<?php echo $alternate_email;?>' />
      <?php if ($year_of_study != 1) { ?> <input type="text" class="form-control" name="year" placeholder="Year *" required="" autofocus="" value ='<?php echo $year_of_study;?>' />
<?php } else { ?> <input type="hidden" name="year" value = '1'> <?php }?>
       <input type="text" class="form-control" name="room" placeholder="Hostel/Room No." autofocus="" />
       <input type="text" class="form-control" name="mobile" placeholder="Mobile *" required="" autofocus="" />
       <lable class="form-control">Department *</lable><select name="department" class="form-control">
<?php 

foreach ($alldepartments as $key=>$value){
  if ($value['value']!=$mydepartment){
    
  echo "<option value='" . $value['value']. "'>".$value['department']."</option>";
  }
  else {
    echo "<option value='" . $value['value']. "' selected='selected'>".$value['department']."</option>";}   
}?>
<input type="text" class="form-control" name="cpi" placeholder="CPI" required="" autofocus="" />
<?php
if ($year_of_study == 1) { echo '
<textarea class="form-control" maxlength="1000" style="resize:none;height:170px;" name="experience" placeholder="Notable first-year experience"></textarea>';}
?>

      
      <input type="checkbox" name="purview" value="1" required> I have read the SURP rule book and agree to terms and conditions mentioned*<br>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register/Update</button>   
    </form>
		 </div>
		
</body>
</html>

