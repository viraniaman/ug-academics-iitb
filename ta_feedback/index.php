<?php
require_once("functions.php");
$error = false;
$firstyear = false;
session_start();
if (isset($_SESSION['ldap_id'])) {
    header('location:course.php');
}
if (isset($_GET['id'])) session_destroy();
if (isset($_POST['login'])){
	include 'connect.php';
	$username = mysqli_real_escape_string($link, $_POST['username']);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	mysqli_close($link);

  if(ldap_auth($username,$password)){
	  $info = ldap_find_all('uid',$username);
$year = explode('/',$info[0]["mailmessagestore"][0]);
$roll = $info[0]["employeenumber"][0];
$year_of_study=2016-$year[2];
	  if (($year_of_study==1) || ($roll==='130110087') || ($username==='gsecaaug')) {
        session_start();
		$_SESSION['ldap_id']=$username;
		header("location: course.php");
		} else $firstyear=true;
  }
  else { $error = true;
      }
}
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login | TA Feedback</title>

  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
<div style="text-align: center;"> <h2>TA Feedback Portal</h2></div>
    <div><div style="margin: auto; max-width:500px; padding: 20px;">
	<p>Before filling the form, please note the following:</p><ol>
	<li>You are to login through your LDAP ID and Password. Only 2015-19&sol;20 batch students can fill in the forms.</li>
	<li>Full-proof measures have been taken to ensure the identity of the student remains hidden.</li>
	<li>Similar to the course feedbacks on ASC, you can fill in feedbacks for each course, but only once for a particular course.</li>
	<li>You may message or mail Shubham Goyal&lpar;General Secretary for Academic Affairs UG&rpar; any grievances or suggestions directly at this mail id- <a href="mailto:gesecaaug@iitb.ac.in">gesecaaug@iitb.ac.in</a></li></ol></div>
    <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">       
      <h2 class="form-signin-heading">LDAP Login</h2>
      <input type="text" class="form-control" name="username" placeholder="LDAP ID" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
      <font color="red" size="2px"><?php if ($error) echo 'Wrong username or password!!'; 
	  if ($firstyear) echo 'Only for 2015-19&sol;20 batch students!!<br> Your year_of_study: '.$year_of_study;?> </font>     
      <button  name="login" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
  </div>

</body>

</html>