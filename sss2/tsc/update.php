<?php
include 'session.php';
include 'connect.php';
if (!$admin) {
  header("Location:index.php");
}
$ta_add=false;
require_once('../functions.php');
if($s_loggedin) $info = ldap_find_all('uid',$_SESSION['ldap']);
    //print_r($info);
$fullname = $info[0]["cn"][0];
$roll = $info[0]["employeenumber"][0];
$dep = explode(",",$info[0]["dn"]);
$alldepartment = explode("=",$dep[2]);
$mydepartment=$alldepartment[1];
//Add TA
if(isset($_POST['add_ta'])) {
  $username=$_POST['tutor'];
  $courseid = $_POST['courseid'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  
  $query = "INSERT INTO tsc_ta VALUES (NULL,'$username','$email','$contact','$courseid')";
  $result=mysqli_query($link,$query) or die(mysqli_error($link));
  
  $ta_add=true;
}
//Update Tutorial
if (isset($_POST['update_tut'])) {
  $courseid = $_POST['courseid'];
  $topic = $_POST['topic'];
  $tutor= $_POST['tutor'];
  $date= $_POST['date'];
  $time= $_POST['time'];
  $venue = $_POST['venue'];
  $update= $_POST['update_tut'];
  
  $query = "UPDATE tsc_tutorial SET course_id='$courseid', topics='$topic', tutor='$tutor', date='$date', time='$time', venue='$venue' WHERE id='$update'";
  $result=mysqli_query($link,$query) or die(mysqli_error($link));
  
}

//Delete TA
if (isset($_POST['ta_delete'])) {
  $delete=$_POST['ta_delete'];
  $query = "DELETE FROM tsc_ta WHERE id='$delete'";
  $result=mysqli_query($link,$query) or die(mysqli_error($link));  
}

//Delete Tutorial
if (isset($_POST['delete'])) {
  $delete=$_POST['delete'];
  
  $query = "DELETE FROM tsc_tutorial WHERE id='$delete'";
  $result=mysqli_query($link,$query) or die(mysqli_error($link));
  
}
//Add Tutorial
if (isset($_POST['add_tut'])) {
  $courseid = $_POST['courseid'];
  $topic = $_POST['topic'];
  $tutor= $_POST['tutor'];
  $date= $_POST['date'];
  $time= $_POST['time']; 
  $venue = $_POST['venue'];
  $query = "INSERT INTO tsc_tutorial VALUES (NULL,'$courseid','$topic','$tutor','$date','$time','$venue','n')";
  $result=mysqli_query($link,$query) or die(mysqli_error($link));
  
}
//Edit Tutorial
if(isset($_POST['edit'])) {
  
  $edit=$_POST['edit'];
  $query1 = "SELECT * FROM tsc_tutorial WHERE id='$edit'";
  $result1=mysqli_query($link,$query1) or die(mysqli_error($link));
  $row1=mysqli_fetch_assoc($result1);
  
}
/**$query1 = "SELECT * FROM registered_emails WHERE username='$username'";
$result1=mysqli_query($link,$query1) or die(mysqli_error($link));
$row=mysqli_fetch_array($result1); **/
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
	<body <?php if (isset($_GET['mailed'])) {?>
    onload="alert('Mailed!!')"
    <?php  } ?>>
<?php include 'header.php';?>
<div class="containerx">
  <div class="row">
  <?php

//Write Mail--------------
if (isset($_POST['mail'])) {
  $mail = $_POST['mail'];
  $query1 = "SELECT * FROM tsc_tutorial WHERE id='$mail'";
  $result1=mysqli_query($link,$query1) or die(mysqli_error($link));
  $row1=mysqli_fetch_assoc($result1);
  $courseid = $row1['course_id'];
  include 'getcourse.php';
?> 
<div class="col-sm-3"></div>
<!-- centre --><div class="col-sm-6">
    <div class="row">
      <div class="col-xs-12">
        <h2>Write Mail</h2>
        <form action="tutmail.php" method="post">
          <div class="form-field">
        <label for="subject">Subject: </label>
        <textarea name="subject" rows="2"  style="-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; width: 100%" required>Tutorial Service Centre Help sessions</textarea>
      </div> 
      <div class="form-field">
        <label for="body">Body: </label>
        <textarea name="body" rows="10"  style="-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; width: 100%" required>
Exams are approaching, its time that you give final touch ups to your preparations. And to help with it, we have scheduled the following Tutorial Service Centre help sessions for you:
Course: <?php echo strtoupper($rowc['code'])."\n" ; ?>
TA: <?php echo $row1['tutor']."\n"; ?>
Date: <?php echo $row1['date']."\n"; ?>
Time: <?php echo $row1['time']."\n"; ?>
Venue: <?php echo $row1['venue']."\n"; ?>
The sessions will focus more on <?php echo $row1['topics'];?>.
For further details or clarifications feel free to contact the undersigned
Regards,
Ritwick Chaudhry
Institute Secretary Academic Affairs
Student Support Services
Contact No: +91-900-452-7877
Email Id: ritwickchaudhry@gmail.com</textarea>
      </div>
      <input type="hidden" name="courseid" value="<?php echo $row1['course_id'];?>">
      <input type="hidden" name="id" value="<?php echo $row1['id'];?>">
          <button type="submit" name="mail" class="btn btn-default" value="<?php echo $id;?>">Mail</button>
        </form>
      </div>
    </div>    
  </div> <!--/centre-->
<?php }
//Write mail ends---------------------------
 else { ?> 

  <!-- left (Add TAs)-->
  <div class="col-sm-6">
    <div class="row"><div class="col-xs-12">
      <h2>Add TAs</h2>
      <form style="margin:auto" action="update.php" method="post">
      <table>
      <tr class="form-field">
        <td><label for="course">Course Code</label></td>
        <td><select name="courseid">
          <?php include 'getcourses.php';
          while($rowc = mysqli_fetch_assoc($resultc)) { ?>
          <option value="<?php echo $rowc['id'];?>"><?php echo $rowc['code']; ?></option>
          <?php } ?>
        </select></td>
      </tr>
      <tr class="form-field">
        <td><label for="tutor">Ldap Id</label></td>
        <td><input type="text" name="tutor" style="width:100%" required></td>
      </tr>
      <tr class="form-field">
        <td><label for="tutor">Email Id</label></td>
        <td><input type="email" name="email" style="width:100%" placeholder="Other than iitb email id"></td>
      </tr>
      <tr class="form-field">
        <td><label for="tutor">Contact No.</label></td>
        <td><input type="text" name="contact" style="width:100%" placeholder="ten digit"></td>
      </tr>
      <tr class="form-field">
        <td colspan="2"><button class="btn btn-default" name="add_ta">Add</button></td>
      </tr>
      </table>
      <?php
    if($ta_add) {
    echo '<p><font color="blue">TA successfully added.</font></p>';
}
    ?>
    </form>
      
    </div>
  </div></div>
  <!--/left-->

  <!-- Right(Add/Edit tutorials) --> 
  <div class="col-sm-6">
    <div class="row"><div class="col-xs-12">
      <h2><?php if(isset($_POST['edit'])) echo 'Edit'; else echo 'Add';?> Tutorial</h2>
  <form style="margin:auto" action="update.php" method="post">
      <table>
      <tr class="form-field">
        <td><label for="course">Course Code</label></td>
        <td><select name="courseid">
          <?php 
          include 'getcourses.php';
          while($rowc = mysqli_fetch_assoc($resultc)) { ?>
          <option value="<?php echo $rowc['id'];?>"><?php echo $rowc['code']; ?></option>
          <?php } ?>
        </select></td>
      </tr>
      <tr class="form-field">
        <td><label for="topic">Topics to be covered</label></td>
        <td><textarea name="topic" cols="30" placeholder="separated by comma (optional)"><?php if(isset($_POST['edit'])) echo $row1['topics']; else echo '';?></textarea></td>
      </tr>
      <tr class="form-field">
        <td><label for="tutor">Tutor</label></td>
        <td><input type="text" name="tutor" style="width:100%" required 
          value="<?php if(isset($_POST['edit'])) echo $row1['tutor']; else echo $row1['topics'];?>"></td>
      </tr>
      <tr class="form-field">
        <td><label for="date">Date</label></td>
        <td><input type="date" name="date" required
          value="<?php if(isset($_POST['edit'])) echo $row1['date']; else echo $row1['date'];?>"></td>
      </tr>
      <tr class="form-field">
        <td><label for="time">Time</label></td>
        <td><input type="time" name="time"
          value="<?php if(isset($_POST['edit'])) echo $row1['time']; else echo $row1['time'];?>"></td>
      </tr>
      <tr class="form-field">
        <td><label for="venue">Venue</label></td>
        <td><input type="text" name="venue"
          value="<?php if(isset($_POST['edit'])) echo $row1['venue']; else echo $row1['time'];?>"></td>
      </tr>
      <?php if(isset($_POST['edit'])) {?>
      <tr class="form-field">
        <td colspan="2"><button class="btn btn-default" name="update_tut" value="<?php echo $edit; ?>">Submit</button></td>
      </tr>
      <?php } else { ?>
      <tr class="form-field">
        <td colspan="2"><button class="btn btn-default" name="add_tut"><?php if(isset($_POST['edit'])) echo 'Edit'; else echo 'Add';?></button></td>
      </tr> <?php } ?>

    </table>

    </form>
    </div></div>
    </div>
  <!--/right-->

  
</div>
<div class="row">
  <!-- left -->
<div class="col-sm-6">
    <h2>TAs' List</h2>
  <?php 
  
  $query = "SELECT * FROM tsc_ta";
        $result = mysqli_query($link,$query) or die(mysqli_error($link));
  while($row=mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $courseid = $row['course_id'];
          include 'getcourse.php';
          $info = ldap_find_all('uid',$row['username']);
          $roll = $info[0]["employeenumber"][0];
          $fullname = $info[0]["cn"][0];
        ?>
    <div class="row">
      <div class="col-xs-12">
        <h3><?php echo $fullname; ?></h3>    <p>Roll no.: <?php echo $roll; ?><br>Email-id: <?php echo $row['email_id']; ?><br> Contact No.: <?php echo $row['contact']; ?><br>Course: <?php echo $rowc['code']; ?></p>
        <p class="lead"><form action="update.php" method="post">
          <button type="submit" name="ta_delete" class="btn btn-default" value="<?php echo $id;?>">Delete</button>
        </form></p>
      </div>
    </div>
    <hr>
    <?php }  ?>
    
  </div> <!-- /left -->

  <!-- right -->
  <div class="col-sm-6">
    <h2>Tutorials' List</h2>
  <?php 
  
  $query = "SELECT * FROM tsc_tutorial ORDER BY date DESC";
        $result = mysqli_query($link,$query) or die(mysqli_error($link));
  while($row=mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $courseid = $row['course_id'];
          include 'getcourse.php';
        ?>
    <div class="row">
      <div class="col-xs-12">
        <h4><?php echo $rowc['code'] . " - " . $row['date'];?></h4>
        <p>Topics: <?php echo $row['topics']; ?><br> Tutor: <?php echo $row['tutor']; ?><br>Time: <?php echo $row['time']; ?><br>Venue: <?php echo $row['venue'];?></p>
        <p class="lead"><form action="update.php" method="post">
          <button type="submit" name="edit" class="btn btn-default" value="<?php echo $id;?>">Edit</button>
          <button type="submit" name="delete" class="btn btn-default" value="<?php echo $id;?>">Delete</button>
          <button type="submit" name="mail" class="btn btn-default" value="<?php echo $id;?>" 
            <?php if($row['mailed']=='y') echo 'disabled'; ?> >
            <?php if($row['mailed']=='y') echo 'Mailed'; else echo 'Write Mail'; ?></button>
        </form></p>
      </div>
    </div>
    <hr>
    <?php }  ?>
    
  </div>
  
  <!--/right-->
</div>
</div>

<?php } include 'footer.php'; 
mysqli_close($link);?>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>