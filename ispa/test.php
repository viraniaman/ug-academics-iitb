<?php
session_start();
require_once("functions.php");
if (!(isset($_SESSION['ldap_id']))){
	//header("location: index.php");
}
if (isset($_GET['logout'])){
session_destroy();
header("location : index.php");
}
if(!already_has_project($_SESSION['ldap_id'])){
	//header("location : apply.php");	
}	
show_project(1,51);
function show_project($pref, $pro_id){
echo "deep";	
require_once("connect.php");
$db = mysql_connect("localhost", "ugacademics", "ug_acads") or die("Connection Error: " . mysql_error());

mysql_select_db("ugacademics") or die("Error conecting to db.");

		$temp1 = "<table class='table 
table-striped'><tbody><tr><td>".$pref."</td>";
		//echo $temp1;
		$td="<td>";
		$td2="</td>";
		if($pro_id>=1000){
			$query = "select* from projects_custom_2014 
where id='$pro_id'";
echo $query;
			$results=mysql_query($query);
			$row = mysql_fetch_array($results,MYSQL_ASSOC);
			
$temp1=$temp1.$td.$row['department'].$td2.$td.$row['prof_name'].$td2.$td.$row['interests'].$td2.$td.$row['eligibility_criteria'].$td2.$td.$row['duration'].$td2."</tr></tbody></table>";
			echo $temp1;
		}
		else {
			$query = "select* from projects_2013 where id='$pro_id'";
echo $query;
			$results=mysql_query($query);

while ($row = mysql_fetch_array($results, MYSQL_ASSOC)) {
    print_r($row);
}

		}
	}
?>
