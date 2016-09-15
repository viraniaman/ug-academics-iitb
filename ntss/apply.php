 <?php
 require_once("functions.php");
$loggedin = false;
session_start();
if (isset($_SESSION['ldap'])) {
    $loggedin=true;
    $username=$_SESSION['ldap'];
} else header('location:index.php');

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title >Non Tech Summer School</title>
 <link rel="stylesheet" href="style_apply.css">


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
      <tr><td>Please login to register for courses</td><td align="right"><input class="btn btn-success" style="font-size:17px" type="submit" name="sub" value="Login"/></td></tr>
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



        <div class="wrapper">
<?php
$s1 = false;
$s2 = false;
$s3 = false;
$s4 = false;
$s5 = false;
$s6 = false;
$s7 = false;
$s8 = false;
$s9 = false;
$s10 = false;
$s11= false;
$s12 = false;
  $done=false;
include 'connect.php';
$query = "SELECT * FROM ntss_registered WHERE username='$username'";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
while($row=mysqli_fetch_array($result)) {
  if ($row['course_id']==1) $s1 = true;
  if ($row['course_id']==2) $s2 = true;
  if ($row['course_id']==3) $s3 = true;
  if ($row['course_id']==4) $s4 = true;
  if ($row['course_id']==5) $s5 = true;
  if ($row['course_id']==6) $s6 = true;
  if ($row['course_id']==7) $s7 = true;
  if ($row['course_id']==8) $s8 = true;
  if ($row['course_id']==9) $s9 = true;
  if ($row['course_id']==10) $s10 = true;
  if ($row['course_id']==11) $s11 = true;
  if ($row['course_id']==12) $s12 = true;
}

if(isset($_POST['apply'])) {
  $err = true;

  if (($_POST['entrepreneurship'] == 'yes') || ($_POST['finance'] == 'yes') || ($_POST['app'] == 'yes') || ($_POST['consulting'] == 'yes') ||($_POST['analytical'] == 'yes') || ($_POST['human_mind'] == 'yes') || ($_POST['web'] == 'yes') || ($s1) || ($s2) || ($s3) || ($s4) || ($s5) || ($s6) || ($s7)) {
    $err=false;
  
  $username= $_SESSION['ldap'];//$_POST['username'];
  $fullname = $_POST['fullname'];
  $roll = $_POST['roll'];
  $email = $_POST['email'];
  $alt_email = $_POST['altemail'];
  $department = $_POST['department'];
  $year_of_study = $_POST['year'];
  $mobile = $_POST['mobile'];
  $room = $_POST['room'];
	
		$db = mysql_connect("10.105.177.5", "ugacademics", "ug_acads");
    
    mysql_select_db("ugacademics");
     if ($s1==false) {
      if ($_POST['german'] == 'yes') {
      $query = "INSERT INTO ntss_registered (username,roll,fullname,department,email,alt_email,year_of_study,mobile,course_id) VALUES ('$username','$roll','$fullname','$department','$email','$alt_email','$year_of_study','$mobile',1)";
    mysql_query($query) or die (mysql_error());
    $s1=true;
    }} else {
      if($_POST['german'] != 'yes') {
        $query = "DELETE FROM ntss_registered where username='$username' AND course_id=1";
    mysql_query($query) or die (mysql_error());
    $s1=false;
      }
    }
     if ($s2==false) {
      if ($_POST['french'] == 'yes') {
      $query = "INSERT INTO ntss_registered (username,roll,fullname,department,email,alt_email,year_of_study,mobile,course_id) VALUES ('$username','$roll','$fullname','$department','$email','$alt_email','$year_of_study','$mobile',2)";
    mysql_query($query) or die (mysql_error());
    $s1=true;
    }} else {
      if($_POST['french'] != 'yes') {
        $query = "DELETE FROM ntss_registered where username='$username' AND course_id=2";
    mysql_query($query) or die (mysql_error());
    $s2=false;
      }
    }
     if ($s3==false) {
      if ($_POST['spanish'] == 'yes') {
      $query = "INSERT INTO ntss_registered (username,roll,fullname,department,email,alt_email,year_of_study,mobile,course_id) VALUES ('$username','$roll','$fullname','$department','$email','$alt_email','$year_of_study','$mobile',3)";
    mysql_query($query) or die (mysql_error());
    $s3=true;
    }} else {
      if($_POST['spanish'] != 'yes') {
        $query = "DELETE FROM ntss_registered where username='$username' AND course_id=3";
    mysql_query($query) or die (mysql_error());
    $s3=false;
      }
    }
     if ($s4==false) {
      if ($_POST['marathi'] == 'yes') {
      $query = "INSERT INTO ntss_registered (username,roll,fullname,department,email,alt_email,year_of_study,mobile,course_id) VALUES ('$username','$roll','$fullname','$department','$email','$alt_email','$year_of_study','$mobile',4)";
    mysql_query($query) or die (mysql_error());
    $s4=true;
    }} else {
      if($_POST['marathi'] != 'yes') {
        $query = "DELETE FROM ntss_registered where username='$username' AND course_id=4";
    mysql_query($query) or die (mysql_error());
    $s4=false;
      }
    }
     if ($s5==false) {
      if ($_POST['entrepreneurship'] == 'yes') {
      $query = "INSERT INTO ntss_registered (username,roll,fullname,department,email,alt_email,year_of_study,mobile,course_id) VALUES ('$username','$roll','$fullname','$department','$email','$alt_email','$year_of_study','$mobile',5)";
    mysql_query($query) or die (mysql_error());
    $s5=true;
    }} else {
      if($_POST['entrepreneurship'] != 'yes') {
        $query = "DELETE FROM ntss_registered where username='$username' AND course_id=5";
    mysql_query($query) or die (mysql_error());
    $s5=false;
      }
    }
     if ($s6==false) {
      if ($_POST['finance'] == 'yes') {
      $query = "INSERT INTO ntss_registered (username,roll,fullname,department,email,alt_email,year_of_study,mobile,course_id) VALUES ('$username','$roll','$fullname','$department','$email','$alt_email','$year_of_study','$mobile',6)";
    mysql_query($query) or die (mysql_error());
    $s6=true;
    }} else {
      if($_POST['finance'] != 'yes') {
        $query = "DELETE FROM ntss_registered where username='$username' AND course_id=6";
    mysql_query($query) or die (mysql_error());
    $s6=false;
      }
    }
     if ($s7==false) {
      if ($_POST['app'] == 'yes') {
      $query = "INSERT INTO ntss_registered (username,roll,fullname,department,email,alt_email,year_of_study,mobile,course_id) VALUES ('$username','$roll','$fullname','$department','$email','$alt_email','$year_of_study','$mobile',7)";
    mysql_query($query) or die (mysql_error());
    $s7=true;
    }} else {
      if($_POST['app'] != 'yes') {
        $query = "DELETE FROM ntss_registered where username='$username' AND course_id=7";
    mysql_query($query) or die (mysql_error());
    $s7=false;
      }
    }
     if ($s8==false) {
      if ($_POST['analytical'] == 'yes') {
      $query = "INSERT INTO ntss_registered (username,roll,fullname,department,email,alt_email,year_of_study,mobile,course_id) VALUES ('$username','$roll','$fullname','$department','$email','$alt_email','$year_of_study','$mobile',8)";
    mysql_query($query) or die (mysql_error());
    $s8=true;
    }} else {
      if($_POST['analytical'] != 'yes') {
        $query = "DELETE FROM ntss_registered where username='$username' AND course_id=8";
    mysql_query($query) or die (mysql_error());
    $s8=false;
      }
    }
     if ($s9==false) {
      if ($_POST['consulting'] == 'yes') {
      $query = "INSERT INTO ntss_registered (username,roll,fullname,department,email,alt_email,year_of_study,mobile,course_id) VALUES ('$username','$roll','$fullname','$department','$email','$alt_email','$year_of_study','$mobile',9)";
    mysql_query($query) or die (mysql_error());
    $s9=true;
    }} else {
      if($_POST['consulting'] != 'yes') {
        $query = "DELETE FROM ntss_registered where username='$username' AND course_id=9";
    mysql_query($query) or die (mysql_error());
    $s9=false;
      }
    }
     if ($s10==false) {
      if ($_POST['human_mind'] == 'yes') {
      $query = "INSERT INTO ntss_registered (username,roll,fullname,department,email,alt_email,year_of_study,mobile,course_id) VALUES ('$username','$roll','$fullname','$department','$email','$alt_email','$year_of_study','$mobile',10)";
    mysql_query($query) or die (mysql_error());
    $s10=true;
    }} else {
      if($_POST['human_mind'] != 'yes') {
        $query = "DELETE FROM ntss_registered where username='$username' AND course_id=10";
    mysql_query($query) or die (mysql_error());
    $s10=false;
      }
    }
     if ($s11==false) {
      if ($_POST['web'] == 'yes') {
      $query = "INSERT INTO ntss_registered (username,roll,fullname,department,email,alt_email,year_of_study,mobile,course_id) VALUES ('$username','$roll','$fullname','$department','$email','$alt_email','$year_of_study','$mobile',11)";
    mysql_query($query) or die (mysql_error());
    $s11=true;
    }} else {
      if($_POST['web'] != 'yes') {
        $query = "DELETE FROM ntss_registered where username='$username' AND course_id=11";
    mysql_query($query) or die (mysql_error());
    $s11=false;
      }
    }
     if ($s12==false) {
      if ($_POST['management'] == 'yes') {
      $query = "INSERT INTO ntss_registered (username,roll,fullname,department,email,alt_email,year_of_study,mobile,course_id) VALUES ('$username','$roll','$fullname','$department','$email','$alt_email','$year_of_study','$mobile',12)";
    mysql_query($query) or die (mysql_error());
    $s12=true;
    }} else {
      if($_POST['management'] != 'yes') {
        $query = "DELETE FROM ntss_registered where username='$username' AND course_id=12";
    mysql_query($query) or die (mysql_error());
    $s12=false;
      }
    }
    $done = true;
    mysqli_close($link);
  }}

$info = ldap_find_all('uid',$_SESSION['ldap']);
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
$year_of_study=2015-$year[2];


?>

    <form class="form-register" action="apply.php" method="post">       
      <h2 class="form-signin-heading">Register</h2>
      <?php if (isset($err)) { if($err) echo '<font color="red">Choose atleast one course</font>';} if ($done) echo '<font color="blue">You have successfully registered/updated</font>'; ?>
      <div class="table-row"><div class="cell"><lable class="form-control">Full Name *</lable></div><div class="cell"><input type="text" class="form-control" name="fullname" placeholder="Full Name *" required=""  value='<?php echo $fullname;?>' /></div></div>
      <div class="table-row"><div class="cell"><lable class="form-control">Roll No. *</lable></div><div class="cell"><input type="text" class="form-control" name="roll" placeholder="Roll No *" required=""  value='<?php echo $roll;?>' /></div></div>
      <div class="table-row"><div class="cell"><lable class="form-control">Email *</lable></div><div class="cell"><input type="text" class="form-control" name="email" placeholder="Email *" required=""  value ='<?php echo $email;?>' /></div></div>
      <div class="table-row"><div class="cell"><lable class="form-control">Alternate Email *</lable></div><div class="cell"><input type="text" class="form-control" name="altemail" placeholder="Alternate Email"  value ='<?php echo $alternate_email;?>' /></div></div>
      <div class="table-row"><div class="cell"><lable class="form-control">Year *</lable></div><div class="cell"><input type="text" class="form-control" name="year" placeholder="Year *" required=""  value ='<?php echo $year_of_study;?>' /></div></div>
       <div class="table-row"><div class="cell"><lable class="form-control">Mobile *</lable></div><div class="cell"><input type="text" class="form-control" name="mobile" placeholder="Mobile *" required=""  /></div></div>
       <div class="table-row"><div class="cell"><lable class="form-control">Department *</lable></div><div class="cell"><select name="department" class="form-control">
<?php 

foreach ($alldepartments as $key=>$value){
if ($value['value']!=$mydepartment) echo "<option value='" . $value['value']. "'>".$value['department']."</option>";
else  echo "<option value='" . $value['value']. "' selected='selected'>".$value['department']."</option>";  
}
?>

      </select></div></div>
      <div class="table-row"><div class="cell"><lable class="form-control">Programmes</lable></div><div class="cell">
      <div class="table-row"><div class="cell"></div><div class="cell">
      <input type="checkbox" name="german" value="yes" <?php if($s1) echo'checked'; ?>> German Language</div></div>
      <div class="table-row"><div class="cell"></div><div class="cell">
      <input type="checkbox" name="french" value="yes" <?php if($s2) echo'checked'; ?>> French Language</div></div>
      <div class="table-row"><div class="cell"></div><div class="cell">
      <input type="checkbox" name="spanish" value="yes" <?php if($s3) echo'checked'; ?>> Spanish Language</div></div>
      <div class="table-row"><div class="cell"></div><div class="cell">
      <input type="checkbox" name="marathi" value="yes" <?php if($s4) echo'checked'; ?>> Marathi Language</div></div>
      <div class="table-row"><div class="cell"></div><div class="cell">
      <input type="checkbox" name="entrepreneurship" value="yes" <?php if($s5) echo'checked'; ?>> Entrepreneurship Bootcamp</div></div>
      <div class="table-row"><div class="cell"></div><div class="cell">
      <input type="checkbox" name="finance" value="yes" <?php if($s6) echo'checked'; ?>> Finance Bootcamp</div></div>
      <div class="table-row"><div class="cell"></div><div class="cell">
      <input type="checkbox" name="app" value="yes" <?php if($s7) echo'checked'; ?>> Android App Development</div></div>
      <div class="table-row"><div class="cell"></div><div class="cell">
      <input type="checkbox" name="analytical" value="yes" <?php if($s8) echo'checked'; ?>> Analytics Bootcamp</div></div>
      <div class="table-row"><div class="cell"></div><div class="cell">
      <input type="checkbox" name="consulting" value="yes" <?php if($s9) echo'checked'; ?>>Consulting Bootcamp</div></div>
      <div class="table-row"><div class="cell"></div><div class="cell">
      <input type="checkbox" name="human_mind" value="yes" <?php if($s10) echo'checked'; ?>>First Impression</div></div>
      <div class="table-row"><div class="cell"></div><div class="cell">
      <input type="checkbox" name="web" value="yes" <?php if($s11) echo'checked'; ?>> Web development</div></div>
      <div class="table-row"><div class="cell"></div><div class="cell">
      <input type="checkbox" name="management" value="yes" <?php if($s6) echo'checked'; ?>> General Management</div></div>
      <div class="table-row">
      <div class="cell"><input type="checkbox" name="purview" value="1" required> I agree to terms and conditions mentioned in the About page*</div><div class="cell">
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="apply">Register/Update</button>  </div></div>
      
    </form>
		 </div>

     </div>
</div>

</body>
</html>
