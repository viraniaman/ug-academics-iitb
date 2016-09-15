<?php 
include 'session.php'; 
require_once('../functions.php');
if(isset($_POST['view'])) $id = $_POST['view'];
else header('Location: index.php');
if(isset($_POST['cdelete'])) {
  $delete=$_POST['cdelete'];
  include 'connect.php';
  $query = "DELETE FROM tsc_comment WHERE id='$delete'";
  $result=mysqli_query($link,$query) or die(mysqli_error($link));
  mysqli_close($link);
} elseif(isset($_POST['delete'])) {
  $delete=$_POST['delete'];
  $courseid=$_POST['course'];
  include 'connect.php';
  $query = "DELETE FROM tsc_discussion WHERE id='$delete'";
  $result=mysqli_query($link,$query) or die(mysqli_error($link));
  mysqli_close($link);
  header("Location:forum.php?id=<?php echo $courseid; ?>");
}
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
    <?php include 'connect.php';
    $query = "SELECT * FROM tsc_comment WHERE d_id='$id'";
    $query1 = "SELECT * FROM tsc_discussion WHERE id='$id'";
    $result = mysqli_query($link,$query) or die(mysqli_error());
    $result1 = mysqli_query($link,$query1) or die(mysqli_error());
    $row1 = mysqli_fetch_assoc($result1);
    $courseid = $row1['course_id'];
    include 'getcourse.php';
    $course = $rowc['code'];
    include 'admin.php';
     ?>
     <div class="navigation">
      <a href="register.php"> Home</a> || 
      <a href="forum.php?id=<?php echo $courseid;?>"><?php echo $course;?></a>
      </div>
    <!-- discussion forum -->
    <div class="row">
      <div class="col-xs-12">
        <h2><?php echo $row1['subject'];?></h2>
        <p><?php echo $row1['post']; ?></p>
        <?php if(($courseadmin) || ($admin)) {?>
        <p class="lead"><form action="viewpost.php" method="post">
        <button type="submit" name="delete" class="btn btn-default" value="<?php echo $row1['id'];?>">Delete</button>
        <input type="hidden" name="view" value="<?php echo $id;?>">
        </form></p> <?php } ?>
        <p class="pull-right"><span class="label label-default"><?php echo $row1['username']; ?></span> <span class="label label-default"><?php if($row1['posted_by']=='s') echo 'student'; elseif($row1['posted_by']=='t') echo 'tutor';?></span> 
          <span class="label label-default"><?php echo $row1['time']; ?></span></p>
          <ul class="list-inline"><li><a href="#"></a></li>
            <li><a href="discussion.php?id=new_c&ref=<?php echo $id; ?>">Reply</a>
            </li></ul>
      </div>
    </div>
    <hr>
    <div class="row">
    <?php while($row=mysqli_fetch_assoc($result)) { ?>
    <div class="col-xs-12 pull-right" style="width: 80%;">
    	<p><?php echo $row['comment']; ?></p>
      <?php if(($courseadmin) || ($admin)) {?>
        <p class="lead"><form action="viewpost.php" method="post">
        <button type="submit" name="cdelete" class="btn btn-default" value="<?php echo $row['id'];?>">Delete</button>
        <input type="hidden" name="view" value="<?php echo $id;?>">
        <input type="hidden" name="course" value="<?php echo $courseid; ?>">
        </form></p> <?php } ?>
    	<p class="pull-right"><span class="label label-default"><?php echo $row['username']; ?></span>
      <span class="label label-default">
        <?php if($row['posted_by']=='s') echo 'student'; elseif($row['posted_by']=='t') echo 'tutor';?></span> 
        <span class="label label-default"><?php echo $row['time']; ?></span></p><hr>
    </div>    
    <?php } mysqli_close($link); ?></div>
  </div><!--/center-->
	</div>
<?php include 'footer.php'; ?>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>