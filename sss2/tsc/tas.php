<?php 
include 'session.php'; 
require_once('../functions.php');
?>
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
  <!--center-->
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
     <?php 
  include 'connect.php';
  $query = "SELECT * FROM tsc_ta";
        $result = mysqli_query($link,$query) or die(mysqli_error($link));
  while($row=mysqli_fetch_assoc($result)) {
    $courseid=$row['course_id'];
    include 'getcourse.php';
    $info = ldap_find_all('uid',$row['username']);
    $roll = $info[0]["employeenumber"][0];
    $fullname = $info[0]["cn"][0];
    $taphoto = "./profile_pics/".$row['username'].".jpg";
    if (file_exists($taphoto)) {    } else $taphoto = "image/noprofile.png"
        ?>
    <div class="row"><div class="col-xs-12">
    <img src="<?php echo $taphoto;?>" align="right" style="display: inline-block; height:150px;">
    <h3><?php echo $fullname; ?></h3>    <p>Roll no.: <?php echo $roll; ?><br>Email-id: <?php echo $row['email_id']; ?><br> Contact No.: <?php echo $row['contact']; ?><br>Course: <?php echo $rowc['code']; ?></p>
  </div></div>
<hr> <?php } mysqli_close($link); ?>
</div><!--/center-->
  </div>
<?php include 'footer.php'; ?>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
