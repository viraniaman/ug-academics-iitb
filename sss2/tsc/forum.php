<?php
include 'session.php';
include 'connect.php';
require_once('../functions.php');
if (isset($_GET['id'])) {
	$cid=$_GET['id'];
	//if ($row['cid']==0) header('Location: register.php');
} else header('Location: register.php');

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
  <!--center-->
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    <div class="navigation">
      <a href="register.php"> Home </a>
    </div>
          <a href="discussion.php?id=new&ref=<?php echo $cid;?>" class="pull-right">Start a new discussion here -&gt; </a>
        <?php
        $query = "SELECT * FROM tsc_discussion WHERE course_id='$cid' ORDER BY time DESC";
        $result = mysqli_query($link,$query) or die(mysqli_error($link));
        if (mysqli_num_rows($result)==0) { 
     ?>
        <!-- discussion forum -->
        <div class="row">
      <div class="col-xs-12">
        <h4>No discussion started yet...</h4>  </div></div>      
      <?php }  else { 
        while($row=mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $query1 = "SELECT COUNT(id) as count FROM tsc_comment WHERE d_id='$id'";
          $result1 = mysqli_query($link,$query);
          $row1 = mysqli_fetch_assoc($result1);
        ?>
    <div class="row">
      <div class="col-xs-12">
        <h2><?php echo $row['subject'];?></h2>
        <p><?php echo $row['post']; ?></p>
        <p class="lead"><form action="viewpost.php" method="post">
          <button type="submit" name="view" class="btn btn-default" value="<?php echo $id;?>">Read More</button></form></p>
        <p class="pull-right"><span class="label label-default"><?php echo $row['username']; ?></span> <span class="label label-default"><?php if($row['posted_by']=='s') echo 'student'; elseif($row['posted_by']=='t') echo 'tutor';?></span> 
          <span class="label label-default"><?php echo $row['time']; ?></span></p>
        <ul class="list-inline"><li><a href="#"></a></li><li> 
          <?php if($row['count']>0) echo $row1['count'] . ' replies'; ?></li><!--<li><a href="#"><i class="glyphicon glyphicon-share"></i> 14 Shares</a></li>--></ul>
      </div>
    </div>
    <hr>
    <?php }} mysqli_close($link); ?>
  </div><!--/center-->
</div>
<?php include 'footer.php'; ?>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>