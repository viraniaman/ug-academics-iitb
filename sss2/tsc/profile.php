<?php
include 'session.php';
include 'connect.php';
require_once('../functions.php');
$image_check = false;
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
$query1 = "SELECT * FROM tsc_registered_emails WHERE username='$username'";
$result1=mysqli_query($link,$query1) or die(mysqli_error($link));
$row=mysqli_fetch_array($result1);
$email = $row['email'] ;

if(isset($_POST['esubmit'])) {
  $email = mysqli_real_escape_string($link,$_POST['email']);
  $query1 = "UPDATE tsc_registered_emails SET email='$email' WHERE username='$username'";
  $result1=mysqli_query($link,$query1) or die(mysqli_error($link));
}
if(isset($_POST['submit'])) {
  $image = $_FILES['image']['name'];
  $temp = explode(".", $_FILES['image']['name']);
  $newfilename = $username.'.'.end($temp);
  if ((!empty($image)) && ($_FILES['image']['size'] <= 2000000)) {
  if ($_FILES["image"]["type"] == "image/jpg") {
  if(file_exists($file)) {
    chmod($file,0755); //Change the file permissions if allowed
    unlink($file); //remove the file
  }
  $upload = move_uploaded_file($_FILES['image']['tmp_name'], './profile_pics/' . $newfilename);
  if ($upload) {} else $image_check = true;
}
  else {$image_check = true;}} else {$image_check = true;}}

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
	<body <?php if(isset($_POST['submit'])) {if ($image_check) { ?> onload="alert('Upload unsuccessful')" 
    <?php } else { ?> onload="alert('Successfully uploaded')" <?php }}?>>
<?php include 'header.php'; ?>  
<div class="containerx">
  <div class="col-sm-3"></div>
  <!-- centre -->
  <div class="col-sm-6">
    <div class="row"><div class="col-xs-12">
      <form style="margin:auto" action="profile.php" method="post" enctype="multipart/form-data">
      <h2 style="font-family:helvetica light;text-align:center">Your Details</h2>
      <table>
        <tr>
          <?php if ($photo) { 
                    echo '<td rowspan="6"><img src="'.$file.'" style="height:200px;"></td>';
                  }  ?> 
          <td><b>NAME</b> </td>
          <td colspan="2"><?php echo $fullname;?></td>
        </tr>
        <tr>
          <td><b>ROLL NO.</b></td>
          <td colspan="2"><?php echo $roll;?></td>
        </tr>
        <tr>
          <td><b>DEPARTMENT</b></td>
          <td colspan="2"><?php echo $mydepartment;?></td>
        </tr> 
        <tr class="form-field">
          <td><label for="image">User Picture: </label></td>
          <td><input type="file" name="image" id="image">
          </td>
          <td><button class="btn btn-default" name="submit">Add/Update</button></td>
        </tr>
          <tr class="form-field">
          <td><label for="email">Email Id (other than iitb): </label></td>
          <td><input type="email" name="email" id="email" value="<?php echo $email; ?>"></td>
          <td><button class="btn btn-default" name="esubmit">Add/Update</button></td>
        </tr>
        <tr>
          <td colspan="3">
            <b>Note: </b>Upload file of type <b>jpg</b> only and with size <b>not</b> more than 2MB
          </td>
        </tr>         
      </table></form>
    </div>
  </div></div>
  <!--/centre-->
</div>
<?php include 'footer.php';  mysqli_close($link); ?>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>