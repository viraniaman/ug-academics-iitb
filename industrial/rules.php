<?php
	session_start();
	if(!(isset($_SESSION['ldap_id']))){
		session_destroy();
		header("location: index.php");
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Industrial Projects</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

</head>
<body>
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">INDUSTRial PROJECTS</a></h1>
			
		</div>
		<div id="menu">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="projects.php">Projects</a></li>
				<li><a href="apply.php">Apply</a></li>
				<li><a href="contacts.php">Contact</a></li>
				<li  class="current_page_item"><a href="rules.php">Rules</a></li>
				<li><a href="logout.php">Logout</li>
			</ul>
		</div>
	</div>
	
<div id="wrapper">
	
	<div id="page" class="container">
		<div id="content">
				<h2 class="title"><a href="#">heading1 </a></h2>
				<div class="entry">
					We are about developing new HTML website template. We are also doing WordPress templates and Joomla Templates. You could download it very soon. This will be including a connecting page for costumers or register users. We do our best to propose innovating functionality and give you largest choice of templates. We want to offers most of different website templates to be clause to you.
				</div>
				<h2 class="title"><a href="#">heading1 </a></h2>
				<div class="entry">
					We are about developing new HTML website template. We are also doing WordPress templates and Joomla Templates. You could download it very soon. This will be including a connecting page for costumers or register users. We do our best to propose innovating functionality and give you largest choice of templates. We want to offers most of different website templates to be clause to you.
				</div>
			</div>
		<!-- end #content --
		<div id="sidebar">
			<div>
				<h2>Recommended Links</h2>
				<ul class="list-style1">
					<li class="first"><a href="#">Aliquam libero</a></li>
					<li><a href="#">Consectetuer adipiscing elit</a></li>
					<li><a href="#">Metus aliquam pellentesque</a></li>
					<li><a href="#">Suspendisse iaculis mauris</a></li>
					<li><a href="#">Urnanet non molestie semper</a></li>
					<li><a href="#">Proin gravida orci porttitor</a></li>
				</ul>
			</div>
		</div>
		- end #sidebar -->
	</div>
	<!-- end #page --> 
</div>

<div id="footer">
	<p>&#169; Undergraduate Academic Council, IIT Bombay</p>
</div>
<!-- end #footer -->
</body>
</html>
