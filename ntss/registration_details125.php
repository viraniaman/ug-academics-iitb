<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title >Non Tech Summer School</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<style type="text/css">
table {
	margin: auto;
}
td,th {
	padding: 5px 10px;
}
</style>
</head>
<body>
<h2>Registration Status</h2>
<table>
<tr><th>id</th><th>username</th><th>roll no.</th><th>Full Name</th><th>department</th><th>email</th><th>Alternate Email</th><th>Year of Study</th><th>mobile</th><th>Course Choice</th></tr>
<?php include 'connect.php';
$query = "SELECT * FROM ntss_registered";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
while($row=mysqli_fetch_array($result)) {
	echo '<tr><td>'.$row['id'].'</td>';
	echo '<td>'.$row['username'].'</td>';
	echo '<td>'.$row['roll'].'</td>';
	echo '<td>'.$row['fullname'].'</td>';
	echo '<td>'.$row['department'].'</td>';
	echo '<td>'.$row['email'].'</td>';
	echo '<td>'.$row['alt_email'].'</td>';
	echo '<td>'.$row['year_of_study'].'</td>';
	echo '<td>'.$row['mobile'].'</td>';
	if ($row['course_id']==1) echo '<td>German Language</td>';
	elseif ($row['course_id']==2) echo '<td>French Language</td>';
	elseif ($row['course_id']==3) echo '<td>Spanish Language</td>';
	elseif ($row['course_id']==4) echo '<td>Marathi Language</td>';
	elseif ($row['course_id']==5) echo '<td>Entrenuership Bootcamp</td>';
	elseif ($row['course_id']==6) echo '<td>Finance Bootcamp</td>';
	elseif ($row['course_id']==7) echo '<td>Android App Development</td>';
	elseif ($row['course_id']==8) echo '<td>Analytics Bootcamp</td>';
	elseif ($row['course_id']==9) echo '<td>Consulting Bootcamp</td>';
	elseif ($row['course_id']==10) echo '<td>First Impression</td>';
	elseif ($row['course_id']==11) echo '<td>Web Development</td>';
	elseif ($row['course_id']==12) echo '<td>General Management</td>'

	echo '</tr>';
}
?>
</table>
</body></html>
