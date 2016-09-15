<?php
include 'session.php';
require_once('../functions.php');
include 'connect.php';
include 'getcourses.php';
if(isset($_POST['course'])) {
	$value = $_POST['course'];
  $query1 = "SELECT * FROM tsc_registered_emails WHERE username='$username' AND course_id='$value'";
  $result1=mysqli_query($link,$query1) or die(mysqli_error($link));
  $row=mysqli_fetch_assoc($result1);
  if(empty($row)) $query="INSERT INTO tsc_registered_emails (username,course_id) VALUES ('$username','$value')";
  else $query="DELETE FROM tsc_registered_emails WHERE username='$username' AND course_id='$value'";
	mysqli_query($link,$query) or die(mysqli_error($link));
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
<?php
    if($s_loggedin) {
  ?>
  <!--left-->
  <div class="col-sm-6">
    <div class="row"><div class="col-xs-12">
      <h2 style="font-family:helvetica light;">Running courses</h2>
  	<table>
      <?php 
      while($rowc=mysqli_fetch_assoc($resultc)) { 
        $courseid = $rowc['id'];
        $query1 = "SELECT * FROM tsc_registered_emails WHERE username='$username' AND course_id='$courseid'";
        $result1=mysqli_query($link,$query1) or die(mysqli_error($link));
        $row1=mysqli_fetch_assoc($result1);
        ?>
      <tr>
        <td><b><?php echo $rowc['code']; ?></b></td>
        <td><?php echo $rowc['name']; ?></td>
        <td><form action="register.php" method="post">
          <?php if(empty($row1)) echo'<button type="submit" class="btn btn-default" name="course" value="'. $courseid .'">Register</button>'; 
          else echo '<button type="submit" class="btn btn-default" name="course" value="'. $courseid .'">Deregister</button>'; ?>
        </form></td>
      </tr>
      <tr><td colspan="3" style="text-align: left;">
        <?php 
        $query3 = "SELECT * FROM tsc_ta WHERE course_id='$courseid'";
      $result3=mysqli_query($link,$query3) or die(mysqli_error($link));
      while($row3=mysqli_fetch_assoc($result3)) {
        $info = ldap_find_all('uid',$row3['username']);
        $fullname = $info[0]["cn"][0];
        echo "TA: ".$fullname."<br>";
      }
        ?>
      </td></tr><tr><td colspan="3"><hr></td></tr> <?php } ?>
  		
  		<!--<tr>
  			<td><b>MA 105</b></td>
  			<td>Calculus</td>
  			<td><form action="register.php" method="post">
  				<?php
  				/**if(mysqli_num_rows($result1)!= 0) {
  					if($row['ma105']!=0) echo '<button type="submit" class="btn btn-default" name="ma105" value="0">Deregister</button>';
  					else echo '<button type="submit" class="btn btn-default" name="ma105" value="1">Register</button>';
  				} else echo '<button type="submit" class="btn btn-default" name="ma105" value="1">Register</button>';**/?>
  			</form></td>
  		</tr>-->
  	</table></div></div>
  </div><!--/left-->

  <!-- right --><div class="col-sm-6">
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
        <li><a href="forum.php?id=<?php echo $courseid; ?>"><?php echo $rowc['code'].'-' .$rowc['name'];?></a></li>
      <br>
        <?php 
        $query3 = "SELECT * FROM tsc_ta WHERE course_id='$courseid'";
      $result3=mysqli_query($link,$query3) or die(mysqli_error($link));
      while($row3=mysqli_fetch_assoc($result3)) {
        $info = ldap_find_all('uid',$row3['username']);
        $fullname = $info[0]["cn"][0];
        echo "TA: ".$fullname."<br>";
      }
        ?>
      <hr>
      <?php } ?>
    </ul>
    </div></div>
  </div> <!--/right-->
  <?php } elseif ($t_loggedin) {
    ?>
    <!--center-->
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    <div class="row"><div class="col-xs-12">
    <h2 style="font-family:helvetica light;">Course Forum 2015</h2>
    <ul>
      <?php 
      include 'getcourses.php';
      while($rowc = mysqli_fetch_assoc($resultc)) {
        $courseid=$rowc['id'];
        ?>
        <li><a href="forum.php?id=<?php echo $courseid; ?>"><?php echo $rowc['code'].'-' .$rowc['name'];?></a></li>
      <br>
        <?php 
        /**$query3 = "SELECT * FROM tsc_ta WHERE course_id='$courseid'";
      $result3=mysqli_query($link,$query3) or die(mysqli_error($link));
      while($row3=mysqli_fetch_assoc($result3)) {
        $info = ldap_find_all('uid',$row3['username']);
        $fullname = $info[0]["cn"][0];
        echo "TA: ".$fullname."<br>";
      }**/
        ?>
      <hr>
      <?php } ?>
    </ul>
    
  </div></div></div><!--/center--> <?php } ?>
</div>
<?php include 'footer.php';
mysqli_close($link);
 ?>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>