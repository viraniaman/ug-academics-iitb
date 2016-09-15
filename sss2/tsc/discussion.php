<?php 
include 'session.php';
include 'connect.php';
require_once('../functions.php');
if ($_GET['id']=='new_c') {
  $id=$_GET['ref'];
} elseif ($_GET['id']=='new') {
  $courseid=$_GET['ref'];
  include 'getcourse.php';
$course = $rowc['code'];
}
$posted = false;
if(isset($_GET['id'])) {} 
elseif(isset($_POST['submit'])) {
	$post = mysqli_real_escape_string($link, $_POST['post']);
  $courseid = $_POST['courseid'];
  if ($s_loggedin) $posted_by = 's'; 
  elseif($t_loggedin) $posted_by = 't';
	$subject = mysqli_real_escape_string($link, $_POST['subject']);
	$query = "INSERT INTO tsc_discussion VALUES (NULL, '$username','$courseid','$subject','$post', '$posted_by', now())";
	$result = mysqli_query($link, $query) or die(mysqli_error());
  mysqli_close($link);
	$posted = true;
} elseif (isset($_POST['c_submit'])) {
  include 'connect.php';
  $comment = mysqli_real_escape_string($link, $_POST['post']);
  if ($s_loggedin) $posted_by = 's'; 
  elseif($t_loggedin) $posted_by = 't';
  $id = mysqli_real_escape_string($link, $_POST['c_submit']);
  $query = "INSERT INTO tsc_comment VALUES (NULL, '$username','$comment','$posted_by', '$id', now())";
  $result = mysqli_query($link, $query) or die(mysqli_error());
  mysqli_close($link);
  $posted = true;
} else header("Location: index.php");

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
<?php 
if((isset($_POST['c_submit'])) || ($_GET['id']=='new_c')) {
$query1 = "SELECT * FROM tsc_discussion WHERE id='$id'";
$result1 = mysqli_query($link,$query1) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result1);
$title = $row1['subject'];
$courseid = $row1['course_id'];
include 'getcourse.php';
$course = $rowc['code'];
}
include 'header.php';
?>
<div class="containerx">
   <!--center-->
   <div class="col-sm-3"></div>
  <div class="col-sm-6">
    <div class="navigation">
      <div style="display: inline-block;"><a href="register.php"> Home </a> || </div>
      <div style="display: inline-block;"><a href="forum.php?id=<?php echo $courseid;?>"><?php echo $course;?></a> ||</div>
      <?php if($_GET['id']=='new_c') {?><div style="display: inline-block;">
      <form action="viewpost.php" method="post">
          <button type="submit" name="view" style="color: #428bca; padding: 0px; border: none; background-color: transparent;" value="<?php echo $id;?>"><?php echo $title; ?></button></form>
    </div> <?php } ?>
    </div>
  	<?php if($posted) echo '<h4> Successfully posted'; else { ?>
  	<h2><?php if($_GET['id']=='new') echo 'Start discussion'; 
  	elseif ($_GET['id']=='new_c') echo 'Post Reply'; ?></h2>
  	<form action="discussion.php" method="post">
  		<?php if($_GET['id']=='new') { ?>
      <div class="form-field">
        <label for="course">Course: </label>
        <select name="courseid"><option value="<?php echo $courseid;?>"><?php echo $course; ?></option></select>
      </div>
  		<div class="form-field">
  			<label for="subject">Subject: </label>
  			<textarea name="subject" rows="2"  style="-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; width: 100%" required></textarea>
  		</div> <?php } ?>
  		<div class="form-field">
  			<label for="post">Post: </label>
  			<textarea name="post" rows="5"  style="-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; width: 100%" required></textarea>
  		</div>
  		<div class="form-field" style="text-align: right;">
  			<?php if($_GET['id']=='new') echo '<button class="btn btn-default" name="submit">Post</button>';
        elseif ($_GET['id']=='new_c') 
          echo '<button class="btn btn-default" type="submit" name="c_submit" value="'.$id.'">Post</button>'; ?>
  		</div>
  	</form> <?php } ?>
  </div><!--/center-->
</div> 
<?php include 'footer.php'; 
mysqli_close($link);?>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>