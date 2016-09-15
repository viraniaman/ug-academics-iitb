<?php
require_once("connect.php");
require_once("functions.php");
?>
<html>
<head><title>Details</title>
</head>
<body>
<table border="1">
<tr><th width="50px">Project ID</th><th>Project Department</th><th>Professor</th><th>Project Title</th><th>LDAP ID</th><th>Full Name</th><th>Student's Department</th><th>Year</th><th>Mobile</th><th>Alternate email</th><th>Preference</th></tr>
<?php
$db=mysql_connect("localhost","$dbuser","$dbpasswd");
mysql_select_db("$dbname");
$query="select projects_2013.id, projects_2013.department as proj_dept,prof_name,project_title, user_data_2013.ldap_id, fullname, registered_users_for_project.department as student_dept, year_of_study, mobile, alt_email from projects_2013 join user_data_2013 on projects_2013.id = user_data_2013.preference1 or projects_2013.id = user_data_2013.preference2 or projects_2013.id = user_data_2013.preference3 join registered_users_for_project on registered_users_for_project.username = user_data_2013.ldap_id where project_title <>'NONE' and (projects_2013.department in ('open','treelabs','studentbodies') or projects_2013.department=registered_users_for_project.department) order by projects_2013.department, projects_2013.project_title,year_of_study desc;";
$results=mysql_query($query);
while($row = mysql_fetch_array($results,MYSQL_ASSOC)){
//$ldap= $row['ldap_id'];
$id = $row['id'];
$proj_dept = $row['proj_dept'];
$prof = $row['prof_name'];
$title = $row['project_title'];
$ldap_id = $row['ldap_id'];
$student_dept = $row['student_dept'];
$year = $row['year_of_study'];
$mobile = $row['mobile'];
$alt_email = $row['alt_email'];
$fullname = $row['fullname'];
$pref_query = "select preference1,preference2,preference3 from user_data_2013 where ldap_id = '$ldap_id'";
$pref_results = mysql_query ($pref_query);
$pref_row = mysql_fetch_array ($pref_results, MYSQL_ASSOC);
$proj_preference = 0;
$pref1 = $pref_row['preference1'];
$pref2 = $pref_row['preference2'];
$pref3 = $pref_row['preference3'];
//echo mysql_num_rows ($pref1_results) . " " . $ldap_id . "<br />";
if ($pref1 == $id) {$proj_preference = 1;}	
else if ($pref2 == $id) $proj_preference = 2;
else if ($pref3 == $id) $proj_preference = 3;

echo "<tr><td>$id</td><td>$proj_dept</td><td>$prof</td><td>$title</td><td>$ldap_id</td><td>$fullname</td><td>$student_dept</td><td>$year</td><td>$mobile</td><td>$alt_email</td><td>$proj_preference</td></tr>";
}
?>
</table>
</body></html>
