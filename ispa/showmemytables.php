<?php
require_once("connect.php");
require_once("functions.php");
$alldepartments =  DepartmentFindAll();
$department = $_GET['dep'];
?>
<html>
<head><title>Results</title>
<script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#choose-dep").change(function(){
department=$(this).val();
url="http://gymkhana.iitb.ac.in/~ugacademics/ug_acads/ispa/showmemytables.php?dep="+department;
window.location=url;
});
});
</script>
</head>
<body>
<?php
 echo "<select name='department' id='choose-dep'>";
         foreach ($alldepartments as $key=>$value){
	
		
	echo "<option value='" . $value['value']. "'>".$value['department']."</option>";
	}
echo "</select>";


?>
<table border="1">
<th>Username</th><th>FullName</th><th>Mobile</th><th>Gmail id</th><th>Preference1 Prof.Name</th><th>Preference1 Title</th>
<th>Preference2 Prof.Name</th><th>Preference2 Title</th><th>Preference3 Prof.Name</th><th>Preference3 Title</th>
<?php
$db=mysql_connect("localhost","$dbuser","$dbpasswd");
mysql_select_db("$dbname");
$query="SELECT * FROM user_data WHERE department='$department'";
$results=mysql_query($query);
while($row = mysql_fetch_array($results,MYSQL_ASSOC)){
$ldap= $row['ldap_id'];

$p1 = $row['preference1'];
$p2 = $row['preference2'];
$p3 = $row['preference3'];

$nm = mysql_query("SELECT username,fullname,mobile,alt_email FROM registered_users_for_project WHERE username='$ldap'");
$pref1=mysql_query("SELECT prof_name,project_title FROM projects WHERE id='$p1'");
$pref2=mysql_query("SELECT prof_name,project_title FROM projects WHERE id='$p2'");
$pref3=mysql_query("SELECT prof_name,project_title FROM projects WHERE id='$p3'");
$name=mysql_fetch_row($nm);

$re1=mysql_fetch_row($pref1);
$re2=mysql_fetch_row($pref2);
$re3=mysql_fetch_row($pref3);

echo "<tr><td>$name[0]</td><td>$name[1]</td><td>$name[2]</td><td>$name[3]</td><td>$re1[0]</td><td>$re1[1]</td><td>$re2[0]</td><td>$re2[1]</td><td>$re3[0]</td><td>$re3[1]</td></tr>";


}
?>
</table>

