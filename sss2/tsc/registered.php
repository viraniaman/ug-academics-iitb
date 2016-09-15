<?php
include 'session.php';
include 'connect.php';
require_once('../functions.php');
if($s_loggedin) $info = ldap_find_all('uid',$_SESSION['ldap']);
elseif($t_loggedin) $info = ldap_find_all('uid',$_SESSION['t_ldap']);
    //print_r($info);
$fullname = $info[0]["cn"][0];
$roll = $info[0]["employeenumber"][0];
$dep = explode(",",$info[0]["dn"]);
$alldepartment = explode("=",$dep[2]);
$mydepartment=$alldepartment[1];
$query = "SELECT department FROM departments WHERE value='$mydepartment'";
$result=mysqli_query($link,$query) or die(mysqli_error($link));
$row=mysqli_fetch_array($result); 
$mydepartment = $row['department'];
$query1 = "SELECT * FROM registered_emails WHERE username='$username'";
$result1=mysqli_query($link,$query1) or die(mysqli_error($link));
$row=mysqli_fetch_array($result1); 

if(isset($_POST['dmail']))  {
  $value = $_POST['dmail'];
  $query1 = "UPDATE tsc_registered_emails SET mail=0 WHERE username='$username' AND course_id='$value'";
  $result1=mysqli_query($link,$query1) or die(mysqli_error($link));
} elseif(isset($_POST['email'])) {
  $value = $_POST['email'];
  $query1 = "UPDATE tsc_registered_emails SET mail=1 WHERE username='$username' AND course_id='$value'";
  $result1=mysqli_query($link,$query1) or die(mysqli_error($link));
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<ma charset="utf-8">
    <teta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>TSC Portal || Students Support Service</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min2.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<?php include 'header.php'; ?>  
<div class="containerx">
  <div class="col-sm-3"></div>
  <!-- Centre --><div class="col-sm-6">
    <div class="row"><div class="col-xs-12">
      <h2 style="font-family:helvetica light;">Registered Courses</h2>
    <ul>
      <?php 
      $query2 = "SELECT * FROM tsc_registered_emails WHERE username='$username'";
      $result2=mysqli_query($link,$query2) or die(mysqli_error($link));
      while($row2=mysqli_fetch_assoc($result2)) {
        $courseid=$row2['course_id'];
        include 'getcourse.php';
        ?>
        <li><?php echo $rowc['code'].'-' .$rowc['name'];?>
        <form action="registered.php" method="post">
          <?php
          if($row2['mail']==1) echo'<button type="submit" class="btn btn-default" name="dmail" value="'. $courseid .'">Disable Mails</button>'; 
          elseif($row2['mail']==0) echo '<button type="submit" class="btn btn-default" name="email" value="'. $courseid .'">Enable Mails</button>'; ?>
        </form>
      </li><hr>
      <?php } ?>
    </ul>
    </div></div>
  </div> <!--/Centre-->
</div>
<?php include 'footer.php'; mysqli_close($link); ?>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>