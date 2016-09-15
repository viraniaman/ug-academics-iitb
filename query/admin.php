<?php

session_start();

if (!(isset($_SESSION['ldap_admin']))){
header("location: index.php");
}

require_once('database.php');

$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());

if(isset($_POST["submit".$_POST['ID']]))
{	
	$_SESSION['recipient'] = $_POST['gpoid'];
	$_SESSION['reply'] = $_POST["reply".$_POST['ID']];
	mysql_query("UPDATE mailing SET query_reply = '".$_SESSION['reply']."', replied = 'y' WHERE id='".$_POST['ID']."';");
	header("location: mail_reply.php");
}

if(isset($_POST["logout"]))
{	
	session_destroy();
	header("location: index.php");
}



?>

<html>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<head><title>Query and Grievance Portal</title>
<script type="text/javascript">
function check(j) {
	var k = "reply"+j;
	var rep = document.getElementsByName(k)[0].value;
	var flag = true;
	if (rep == "") {
		alert("Reply cannot be empty.");
		flag = false;
	};
	return flag;
}
</script>
</head>
<body>
<body id="body1">

    <div class="container-fluid">
	      <div class="page-header">
		  <h1>Q and G Portal</h1>
		  <span style="display:inline; margin-left:2%; font-size:200%;">Query and Grievance Portal</span>
		  </div>
		  <ul class="nav nav-pills">
		  <li><a href="index.php">Home</a></li>		  
		  <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/">UG Academics</a></li>
		  <li><a href="../career">Career Cell</a></li>
		  <li><a href="../ug_acads/ispa">ISPA</a></li>
		  <li><a href="http://gymkhana.iitb.ac.in/~researchbook/">Research Book</a></li>
		  <li><a href="../ug_acads/bookbay">Bookbay</a></li>
		  <li class = "active"><a href = "">Logged in</a></li>

		  </ul>


		 <div class="row-fluid"> 
         <div class="contentcontacts">
		 <form method='post' action='admin.php'>
		 <input type='submit' style="margin-left:900px" class="btn btn-primary btn-large" name='logout' value='Logout'>
		 </form>
		 <br><br>
<table align="center" cellpadding="5" border="2" width="950px">
<tr><th>LDAP ID</th><th>Department</th><th>Query</th></tr>

<?php
	$db=mysql_connect("$dbhost","$dbuser","$dbpasswd");
	mysql_select_db("$dbname");
	$query_dept="SELECT department from ldap_mailing where ldap_id='" . $_SESSION["ldap_admin"] . "'";
	$dept_results = mysql_query($query_dept);
	while ($dept_row = mysql_fetch_assoc($dept_results))
	{
		$dept_to_show = $dept_row['department'];
		$query="SELECT * FROM mailing WHERE replied='n' AND department='" . $dept_to_show . "'";
		$results1=mysql_query($query);
		
		while($row = mysql_fetch_assoc($results1)){
			$id=$row['id'];
			$name=$row['name'];
			$department=$row['department'];
			$query=$row['query'];
			$querydate=substr($row['query_date'], 8);
			$currdate = date ('d');
			$diffdays = $currdate - $querydate;
			if ($diffdays < 0) {
				$diffdays = $diffdays + 30;
			}
			$temp = "";
			if ($diffdays >= 2) {
				$temp = "background-color:#FF6347;"; 
			} 
			echo "<tr style=\"".$temp."\"><td>$name</td><td>$department</td><td>$query
				<form action='admin.php' method='POST' onsubmit=\"return check(".$id.")\">
				<input style=\"visibility:hidden;\" type='text' name='gpoid' value='".$name."'>
				<input style=\"visibility:hidden;\" type='text' name='ID' value='".$id."'>
				<textarea maxlength=\"300\" style=\"resize:none;width:600px;height:70px;\" type='text' name='reply".$id."'></textarea>
				&nbsp;&nbsp;<input name='submit".$id."' type='submit' value='Submit'></form>
				</td></tr>";
		}
	}
?>
</table>
</p>
</div>
</body>
</html>