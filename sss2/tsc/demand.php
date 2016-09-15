<?php 
include 'session.php'; 
include 'connect.php';
include 'getcourses.php';
require_once('../functions.php');
if(isset($_POST['submit'])) {
  require_once('mail.php');
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
    <div class="row"><div class="col-xs-12">
    <h2 style="font-family:helvetica light;">Demand Tutorial</h2>
    <form style="margin:auto" action="demand.php" method="post">
      <table>
  		<tr class="form-field">
  			<td><label for="course">Course Code</label></td>
  			<td><select name="course">
          <?php while($rowc = mysqli_fetch_assoc($resultc)) { ?>
  				<option><?php echo $rowc['code']; ?></option>
  				<?php } ?>
  			</select></td>
  		</tr>
  		<tr class="form-field">
  			<td><label for="topic">Topic</label></td>
  			<td><input type="text" name="topic" style="width:100%" required></td>
  		</tr>
      <tr class="form-field">
        <td><label for="roll">Roll no. of interested students</label></td>
        <td><textarea name="roll" placeholder="write roll no. separated by comma" cols="30"></textarea></td>
      </tr>
      <tr class="form-field">
        <td><label for="message">Comments</label></td>
        <td><textarea name="message" rows="4" cols="30"></textarea></td>
      </tr>
  		<tr class="form-field">
  			<td colspan="2"><button class="btn btn-default" name="submit">Submit</button></td>
  		</tr></table>
  	</form>
    <?php
    if(isset($_GET['id'])) {
    echo '<p><font color="blue">A mail has been sent regarding it.</font></p>';
}
    ?>
  </div></div></div><!--/center-->
  </div>
<?php include 'footer.php'; ?>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>