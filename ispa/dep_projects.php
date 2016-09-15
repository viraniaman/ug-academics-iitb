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
url="http://gymkhana.iitb.ac.in/~ugacademics/ug_acads/ispa/dep_projects.php?dep="+department;
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

<th> Prof.Name</th><th>Project Title</th><th>Project Description</th><th>Eligibility Criteria</th>
<?php
$db=mysql_connect("localhost","$dbuser","$dbpasswd");
mysql_select_db("$dbname");
$query="SELECT * FROM projects_2013 WHERE department='$department'";
$results=mysql_query($query);
while($row = mysql_fetch_array($results,MYSQL_ASSOC)){

echo "<tr><td>".$row['prof_name']."</td><td>".$row['project_title']."</td><td>".$row['project_description']."</td><td>".$row['eligibility_criteria']."</td></tr>";


}
?>
</table>

