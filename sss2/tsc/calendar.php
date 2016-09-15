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
  
  
  
  <!--left-->
  <div class="col-sm-8">
    <div class="col-xs-12">
     <iframe src="https://www.google.com/calendar/embed?src=jgkhsma7j9h8osc7ncf03rir9c%40group.calendar.google.com&ctz=Asia/Calcutta" style="border: 0" width="700" height="600" frameborder="0" scrolling="no"></iframe>
  </div></div><!--/left-->

  <!--right-->
  <div class="col-sm-4">
    <h2 style="font-family:helvetica light;">Coming Tutorials</h2>
     <?php 
  include 'connect.php';
  $query = "SELECT * FROM tsc_tutorial WHERE mailed='y' ORDER BY date DESC";
        $result = mysqli_query($link,$query) or die(mysqli_error($link));
  while($row=mysqli_fetch_assoc($result)) {
  		$courseid=$row['course_id'];
  		include 'getcourse.php';
        ?>
    <div class="row">
      <div class="col-xs-12">
        <h4><?php echo strtoupper($rowc['code']) . " - " . $row['date'];?></h4>
        <p>Topics: <?php echo $row['topics']; ?><br> Tutor: <?php echo $row['tutor']; ?><br>Time: <?php echo $row['time']; ?><br>Venue: <?php echo $row['venue'];?></p>
      </div>
    </div>
    <hr>
    <?php } mysqli_close($link); ?>
  </div><!--/right-->
  </div>
<?php include 'footer.php'; ?>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
