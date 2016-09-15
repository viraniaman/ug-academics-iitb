<?php
session_start();
ob_start();
if(!isset($_SESSION['dept']))
{
	session_destroy();
	header("location: index.php");
}
if(!isset($_SESSION['ldap_id']))
{
	session_destroy();
	header("location: index.php");
}
?>
<html>
<title>Research </title>
<head> <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
</head>
<style>
body
{
	background-image:url("../back1.png");
	background-fixed=true;
	background-size: 100%;
}
</style>
<body>
<div class="page-header" style="background-color:white;opacity:0.9;margin-left:100px;margin-right:100px; border:5px;border-radius:15px">
  <h1 style="font-family:'Times New Roman'"><img src="../glass.png" style="height:50px; margin-top:10px; margin-left:10px"></img>Research Portal<small>	UG Academic Council</small></h1>
</div>

<div class="container">
<div class="span11" style="background:white;border:2px;border-radius:25px; opacity:0.9" >
<button style="margin-top:10px; margin-left:30px"  class="btn btn-success"  onclick="location.href='logout.php'">Logout</button>
<form action='update.php' style="margin-left:30px; margin-top:40px;" method="POST">
	Department : <?php echo $_SESSION['dept']?> <br>
	Prof. name:    <input type="text" placeholder="prof. name" class="input-xlarge" style="width:390px;height:35px"name="name"></input><br>
	Research Interests: <input type="text" placeholder="Research Interests of prof (copy paste all interests of profs in this line)" class="input-xlarge" style="width:700px;height:35px"name="interest"></input><br>
	Homepage:   <input type="text" placeholder="homepage address of prof.(if not then provide email id)" class="input-xlarge" style="width:400px;height:35px"name="link"></input>
	<button style="margin-left:100px" type="submit" name='submit' class="btn btn-success">Submit</button><br>
</form>
</div>
</div>
<br><br><br>
</body>
</html>