<?php
require_once('../functions.php');
$s_loggedin = false;
$t_loggedin = false;
$admin = false;
$error=false;
include 'admin_auth.php';
session_start();
if(isset($_GET['logout'])) {
  session_destroy();
  header('Location: index.php');
}
if (isset($_SESSION['ldap'])) {
  $s_loggedin=true;
  $username=$_SESSION['ldap'];
  $info = ldap_find_all('uid',$_SESSION['ldap']);
  if(in_array($username, $authorised))  $admin=true; 
    //print_r($info);
    $fullname = $info[0]["cn"][0];
}
elseif (isset($_SESSION['t_ldap'])) {
  $t_loggedin=true;
  $username=$_SESSION['t_ldap'];
  $info = ldap_find_all('uid',$_SESSION['t_ldap']);
    //print_r($info);
    $fullname = $info[0]["cn"][0];
}
if(isset($_POST['s_login'])) {
  include 'connect.php';
  $username = mysqli_real_escape_string($link, $_POST['ldap']);
  $password = mysqli_real_escape_string($link, $_POST['pass']);
  mysqli_close($link);
  if(ldap_auth($username,$password))
  {
    session_start();
    $_SESSION['ldap']=$username;
    $_SESSION['passwd']=$password;
    $s_loggedin=true;
    if(in_array($username, $authorised)) $admin=true;
    $info = ldap_find_all('uid',$_SESSION['ldap']);
    //print_r($info);
    $fullname = $info[0]["cn"][0];
  } else $error = true;
  header("Location:profile.php");
}
elseif(isset($_POST['t_login'])){
  include 'connect.php';
  $username = mysqli_real_escape_string($link, $_POST['ldap']);
  $password = mysqli_real_escape_string($link, $_POST['pass']);
  mysqli_close($link);
  if(ldap_auth($username,$password))
  {
    if ($username=='aastha') {
      session_start();
      $_SESSION['t_ldap']=$username;
      $_SESSION['passwd']=$password;
      $t_loggedin=true;
      $info = ldap_find_all('uid',$_SESSION['t_ldap']);
    //print_r($info);
    $fullname = $info[0]["cn"][0];
    } else $error=true;
  } else $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<ma charset="utf-8">
    <teta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>TSC || Student Support Services</title>
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

<div class="container-fluid">
  <div class="col-sm-2"></div>
  
  <?php if(($s_loggedin==false) && ($t_loggedin==false)) { 
      include 'login.php';
    }  elseif (($s_loggedin) || ($t_loggedin))  { ?>
    <div class="col-sm-5"  style="padding-top: 10%;">
    <div class="row">
      <div class="col-xs-12">
        <h1 style="font-family:helvetica light;">Tutorial Service Centre</h1>
        <h3>Successfully logged in!</h3>
        <!--<h4 style="color: blue;"> Hello <?php echo $fullname; ?></h4>-->
      </div>
    </div></div>
    <!--<div class="col-sm-5"  style="padding-top: 20%;">
      <div class="row">
        <div class="col-xs-6">
        <h3><div id="rotate" class="rotate"> 
        <div>Text1</div> 
        <div>Text2</div> 
        <div>Text3</div> 
        <div>Text4</div> </div></h3>
      </div></div>
      
    </div>-->
 <?php } ?>
  
</div><!--/container-fluid-->
<div class="copy">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-xs-12">
        <div style="margin-left:5%; margin-right:5%;">
          <h1 style="text-align:center">About</h1>
          <div class="panel-body">The Tutorial Services Centre (TSC) helps the students cope up with courses by providing additional help sessions apart from regular lectures and tutorials. This centre aims at doubt and concept clarification to help have a smooth transit throughout their academics. Some of these tutorial sessions are also conducted in vernacular languages to help students having difficulty in English understand the concepts taught in the class and help them with their academic needs.<br>These help sessions are conducted throughout the year with additional focus given close to Quizzes, Midsem and Endsem.</div>
      </div>
    </div>
  </div>
      
      <!--<h2>Features of portal</h2>
      <div class="panel panel-default col-sm-3" style="margin-right:10px; padding:0px;">
          <div class="panel-heading">Title</div>
          <div class="panel-body">Content here..</div>
        </div> 
        <div class="panel panel-default col-sm-3" style="margin-right:10px; padding:0px;">
          <div class="panel-heading">Title</div>
          <div class="panel-body">Content here..</div>
        </div> -->
         </div>    </div>
<div class="about">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-xs-12">
        <div style="margin-left:5%; margin-right:5%;">
          <h1 style="text-align:center">About</h1>
          <div class="panel-body">The Tutorial Services Centre (TSC) helps the students cope up with courses by providing additional help sessions apart from regular lectures and tutorials. This centre aims at doubt and concept clarification to help have a smooth transit throughout their academics. Some of these tutorial sessions are also conducted in vernacular languages to help students having difficulty in English understand the concepts taught in the class and help them with their academic needs.<br>These help sessions are conducted throughout the year with additional focus given close to Quizzes, Midsem and Endsem.</div>
      </div>
    </div>
     </div> 
         
         <?php include 'footer.php'; ?>
	<!-- script references -->
		<script src='js/jquery.min.js'></script>

        <script src="js/index.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>
</html>
