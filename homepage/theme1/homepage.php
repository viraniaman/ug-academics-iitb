<?php
session_start();
ob_start();
$ldap=$_SESSION['ldap'];
$name=$_POST['name'];
$dept=$_POST['dept'];
$about=$_POST['about'];
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <title> <?php echo $name; ?> | Home Page </title>
  <link rel="stylesheet" type="text/css" href="index.css">
  <link href="css" rel="stylesheet" type="text/css">
  <style type="text/css">
    #myImage
    {
       position:absolute;
       height:340px;
       left:900px;
       top:130px;
    }
  </style>
</head>

<body>

  <h1><hr color="black">Welcome!<hr color="black"></h1>
  <img id="myImage" src="" alt="My Picture">

  <div id="info">
	<?php echo $about;?>
  </div>

  <ul>
    <li> <a class="links" href="http://home.iitb.ac.in/~<?php echo $ldap;?>/homepage.htm">Home</a> </li>
    <li> <a class="links" href="http://home.iitb.ac.in/~<?php echo $ldap;?>/academics.html">Academics</a> </li>
    <li> <a class="links" href="http://home.iitb.ac.in/~<?php echo $ldap;?>/resume.html">Resume</a> </li>
    <li> <a class="links" href="http://home.iitb.ac.in/~<?php echo $ldap;?>/projects.html">Projects</a> </li>
    <li> <a class="links" href="http://home.iitb.ac.in/~<?php echo $ldap;?>/por.html">PORS</a> </li>
    <li> <a class="links" href="http://home.iitb.ac.in/~<?php echo $ldap;?>/contact.html">Contact Me</a> </li>
  </ul>
</body></html>