<!DOCTYPE html>
<html>

<?php 
session_start();
require_once("functions1.php"); 
if (isset($_GET['logout'])){
session_destroy();
}
?>
<head>

  <meta charset="UTF-8">

  <title>Apply | SURP</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="admin/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="admin/font-awesome/css/font-awesome.min.css" />
    <script type="text/javascript" src="admin/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="admin/bootstrap/js/bootstrap.min.js"></script>

  <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

    <link rel="stylesheet" href="css/style_apply.css">
     

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="container">
  <div class="page-header">
    <h1>Login | <a href="index.php">SURP</a><small> Summer Undergraduate Research Program</small></h1>
</div></div>
    <div class="wrapper">
      <?php
      $error = false;
      if (isset($_POST['login'])){
  include 'connect.php';
  $username = $_POST['username'];
  $password = mysqli_real_escape_string($link, $_POST['password']);

  if(ldap_auth($username,$password)){
        session_start();
  $_SESSION['ldap_id']=$username; 
    if (!(is_registered($username))){
      header("location: register.php");
       }
    else{
      header("location: choice.php");
    }
  }
  else { $error = true;
      }
} 

mysqli_close($link);

      ?>

    <form class="form-signin" action="apply.php" method="post">       
      <h2 class="form-signin-heading">Login</h2>
      
      <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      <font color="red" size="2px"><?php
 if ($error) { echo 'Wrong username or password!!'; }?> </font>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>  
    </form>


   
  </div>

</body>

</html>