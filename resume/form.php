<?php
	session_start();
	if(!isset($_SESSION["ldap"]))
		header("location: ./index.php?error=login first");
	$ldap = $_SESSION["ldap"];
?>
<html>
<head>
	<title>Resume Generator</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-markdown.min.css">

	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap-markdown.js"></script>
	<script type="text/javascript" src="./js/local.js"></script>
	<script type="text/javascript">
		var active = "scholastic";
		var ldap = '<?=$ldap?>';
	</script>
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
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=$ldap;?><span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
<!-- 	            <li><a href="#">Action</a></li>
 -->	            <li class="divider"></li>
	            <li><a href="./logout.php">Logout</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<div class="row">
			<button class="col-lg-1 col-lg-offset-9 btn btn-info" onclick="postJson();">Preview</button>
			<button class="col-lg-1 btn btn-success">Download</button>
		</div>
		<div class="row">
			<div class="sideBar col-lg-3">
				<div class="list-group">
				  <a href="#" id="Apersonal" class="list-group-item">Personal Information<span onclick="reorder(this);" class="glyphicon glyphicon-chevron-up pull-right"></span></a>
				  <a href="#" id="Ascholastic" class="list-group-item">Scholastic Achievements<span onclick="reorder(this);" class="glyphicon glyphicon-chevron-up pull-right"></span></a>
				  <a href="#" id="Ainternship" class="list-group-item">Internships<span onclick="reorder(this);" class="glyphicon glyphicon-chevron-up pull-right"></span></a>
				  <a href="#" id="Aproject" class="list-group-item">Key Academic Projects<span onclick="reorder(this);" class="glyphicon glyphicon-chevron-up pull-right"></span></a>
				  <a href="#" id="Apor" class="list-group-item">Positions Of Responsibility<span onclick="reorder(this);" class="glyphicon glyphicon-chevron-up pull-right"></span></a>
				  <a href="#" id="Aextra" class="list-group-item">Extra Curricular Activities<span onclick="reorder(this);" class="glyphicon glyphicon-chevron-up pull-right"></span></a>	 
				  <a href="#" id="Askill" class="list-group-item">Skills<span onclick="reorder(this);" class="glyphicon glyphicon-chevron-up pull-right"></span></a>	 
				  <a href="#" id="Acourse" class="list-group-item">Courses Undertaken<span onclick="reorder(this);" class="glyphicon glyphicon-chevron-up pull-right"></span></a>	 
				</div>
			</div>
			<div class="col-lg-8">
				<div class="data" id="personal">
					<div id="scholasticData">
						<table class="table">							
						</table>						
						<div>							
		    			    <button class="btn btn-default" onclick="addPersonalData(this);" type="button">Add Personal Info</button>
						</div>	
					</div>
				</div>			
				<div class="data" id="scholastic">
					<div id="scholasticData">
						<table class="table">							
						</table>						
						<div>
		    			    <button class="btn btn-default" onclick="addSubData(this);" type="button">Add Item</button>
						</div>	
					</div>
				</div>
				<div class="data" id="internship">
					<div id="internshipData">
					</div>
					<div><br>
	    			    <button class="btn btn-default" onclick="addProject('internshipData');" type="button">Add New Internship</button>
					</div>					
				</div>
				<div class="data" id="project">
					<div id="projectData">
					</div>
					<div><br>
	    			    <button class="btn btn-default" onclick="addProject('projectData');" type="button">Add New Project</button>
					</div>					
				</div>

<!-- Pors-->			
				<div class="data" id="por">
					<div id="porData">
					</div>
					<div><br>
	    			    <button class="btn btn-default" onclick="addProject('porData');" type="button">Add New Por</button>
					</div>					
				</div>	

<!-- Extra Currics-->			
				<div class="data" id="extra">
					<div id="extraData">	
						<table class="table">							
						</table>					
						<div>
		    			    <button class="btn btn-default" onclick="addSubData(this);" type="button">Add Item</button>
						</div>	
					</div>				
				</div>

				<div class="data" id="skill">
					<div id="extraData">	
						<table class="table">							
						</table>					
						<div>
		    			    <button class="btn btn-default" onclick="addSkillsData(this);" type="button">Add Item</button>
						</div>	
					</div>				
				</div>

				<div class="data" id="course">
					<div id="extraData">	
						<table class="table">							
						</table>					
						<div>
		    			    <button class="btn btn-default" onclick="addCoursesData(this);" type="button">Add Item</button>
						</div>	
					</div>				
				</div>
			</div>	
			<div class="col-lg-1"></div>
		</div>
	</div>
</body>
</html>