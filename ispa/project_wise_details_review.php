<?php
require_once("connect.php");
//require_once("functions.php");
?>
<html>
<head><title>Details</title>
</head>
<body>
<table border="1">
<tr><th width="50px">Project ID</th><th>LDAP ID</th><th>Full Name</th><th>Did Project</th><th>Professor</th><th>Ph.D. student you worked with</th><th>Project Name</th>
			<th>Project Department</th><th>Experience</th><th>Work related to what you had studied</th><th>Suggestions/Grievances</th><th>Student's Department</th><th>Year</th><th>Mobile</th><th>Alternate email</th></tr>
<?php
	$db=mysql_connect("localhost","$dbuser","$dbpasswd");
	mysql_select_db("$dbname");
	$query="SELECT * FROM review_form";
	$results=mysql_query($query);
	while($row = mysql_fetch_assoc($results)){
	//$ldap= $row['ldap_id'];
	$id = $row['id'];
	$ldap_id = $row['username'];
	$fullname = $row['fullname'];
	$did_project=$row['did_project'];
	$prof_name=$row['prof_name'];
	$phd_name=$row['phd_name'];
	$project_name = $row['project_name'];
	$project_department = $row['project_department'];
	$experience=$row['experience'];
	$work_related=$row['work_related'];
	$suggestion=$row['suggestion'];
	$student_department = $row['student_department'];
	$year = $row['year_of_study'];
	$alt_email = $row['alt_email'];
	$mobile = $row['mobile'];

	echo "<tr><td>$id</td><td>$ldap_id</td><td>$fullname</td><td>$did_project</td><td>$prof_name</td><td>$phd_name</td><td>$project_name</td><td>$project_department</td><td>$experience</td>
		<td>$work_related</td><td>$suggestion</td><td>$student_department</td><td>$year</td><td>$mobile</td><td>$alt_email</td></tr>";
}
?>
</table>
</body></html>
