<?php
include './ispa/connect.php';
$db = mysql_connect($dbhost, $dbuser, $dbpasswd);
mysql_select_db($dbname);
?>
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title>Type 1</title>
<meta http-equiv = "cache-control" content="no-cache">
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href="./courserank/bootstrap.css" rel="stylesheet" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

</head>

<body style="font-family:'Marcellus',serif;">
<div style="width:100%;margin-top:28px;background-color:#696969;color:white;">
	<center>
		<table cellpadding="10">
		<tr>
		<td>	<p style="color:white;font-size:45px;font-variant:small-caps;">Type 1(with fixed things) Projects Info </p> </td>
		</tr>
		</table>
	</center>
</div>
<center>
<div>
	<br>For type2 table click here: <a href="./type2_projects.php">type2</a>
	<table border="1" class="table table-striped">
	<thead><tr><th>ID</th><th>Department</th><th>Prof.Name</th><th>Project Title</th><th>Project Description</th><th>Eligibility criterial</th><th>Duration</th></tr></thead>
	<?php
		$query="select* from projects_2013 where id>1 order by department";
		$results= mysql_query($query);
		while($row=mysql_fetch_array($results,MYSQL_ASSOC)){
			$td="<td>";
			$td2="</td>";
			echo "<tr>";
			echo $td.$row['id'].$td2.$td.$row['department'].$td2.$td.$row['prof_name'].$td2;
			echo $td.$row['project_title'].$td2.$td.$row['project_description'].$td2;
			echo $td.$row['eligibility_criteria'].$td2.$td.$row['duration'].$td2;
			echo "</tr>";
		}
  	?>
  	</table>
   <br>
</div>
</center>
</body>
</html>
