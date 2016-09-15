<table border="1">
<tr><td>Ldap</td><td>Roll Number</td><td>Name</td><td>Year</td><td>Department</td><td>Course ID</td></tr>
<?php
	include '../ispa/connect.php';
	$db = mysql_connect($dbhost, $dbuser, $dbpasswd);
	mysql_select_db($dbname);
	$results = mysql_query("select * from backlogs order by dept");
	while($row = mysql_fetch_assoc($results)){
		echo "<tr><td>".$row['ldap']."</td><td>".$row['rno']."</td><td>".$row['name']."</td><td>".$row['year']."</td><td>".$row['dept']."</td><td>".$row['course']."</td></tr>";
	}

?>
</table>