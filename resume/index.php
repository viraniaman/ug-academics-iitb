<?php
	session_start();
	function authenticate($ldap, $passwd){
		return true;
	}
	if(isset($_SESSION["ldap"]))
		header("location: ./form.php");
	if(isset($_POST["submit"])){
		$ldap = $_POST["ldap"];
		$passwd = $_POST["passwd"];
		if(authenticate($ldap, $passwd)){
			$_SESSION["ldap"] = $ldap;
			header("location: ./form.php");
		}
		else header("location: ./index.php?error=loginFailed");
	}
?>
<head>
	<title>Resume Generator</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-markdown.min.css">

	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap-markdown.js"></script>
	<script type="text/javascript" src="./js/local.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Resume Generator</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Link</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
	          </ul>
	        </li>
	      </ul>
	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="./help.html">Help</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<div class="col-md-5 col-md-offset-3">
			<form  class="input-group" method="POST" action="">
				<input  class="input-group"  type="text" name="ldap"> 
				<input  class="input-group"  name="passwd">
				<input  class="input-group" name="submit" type="submit">
			</form>
		</div>
	</div>
</body>
</html>