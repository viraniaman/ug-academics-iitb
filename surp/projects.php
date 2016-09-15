<?php
session_start();
require_once("functions1.php");
require_once("connect.php");
$page = $_REQUEST['page']; // get the requested page
$limit = $_REQUEST['rows']; // get how many rows we want to have into the grid
$sidx = $_REQUEST['sidx']; // get index row - i.e. user click to sort
$sord = $_REQUEST['sord']; // get the direction
$department = $_REQUEST['department'];
if(!$sidx) $sidx =1;

$totalrows = isset($_REQUEST['totalrows']) ? $_REQUEST['totalrows']: false;
if($totalrows) {
	$limit = $totalrows;
}


// connect to the database
//$db = mysql_connect("localhost", "$dbuser", "$dbpasswd") or die("Connection Error: " . mysql_error());

//mysql_select_db("$dbname") or die("Error conecting to db.");
//populateDBRandom();
$result = mysqli_query($link,"SELECT COUNT(*) AS count FROM projects_2015 WHERE department=$department AND outside_purview=0 ");
$row = mysqli_fetch_array($result);
$count = $row['count'];

if( $count >0 ) {
	$total_pages = ceil($count/$limit);
} else {
	$total_pages = 0;
}
if ($page > $total_pages) $page=$total_pages;
if ($limit<0) $limit = 0;
$start = $limit*$page - $limit; // do not put $limit*($page - 1)
if ($start<0) $start = 0;
$SQL = "SELECT id, prof_name, project_title,project_description,eligibility FROM projects_2015 WHERE department='$department' AND outside_purview='0' ORDER BY 'id' ";
$result = mysqli_query( $link,$SQL ) or die("Couldnt execute query.".mysqli_error());
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
	$preference_1=0;
	$preference_2=0;
	$preference_3=0;
	$preference_4=0;
if(is_registered($_SESSION['ldap_id'])){
	$username =$_SESSION['ldap_id'];
$SQL = "SELECT * FROM surp_member WHERE ldap_id='$username'";
$results = mysqli_query( $link,$SQL ) or die("Couldnt execute query.".mysqli_error());
while($srow = mysqli_fetch_array($results)) {
	$preference_1=$srow['preference1'];
	$preference_2=$srow['preference2'];
	$preference_3=$srow['preference3'];
	$preference_4=$srow['preference4'];
	
}	
}
while($row = mysqli_fetch_array($result)) {
	$responce->rows[$i]['id']=$row['id'];
	if($row['id']==$preference_1){
    $responce->rows[$i]['cell']=array($row['prof_name'],$row['project_title'],$row['project_description'],$row['eligibility'],'1');
}
else if($row['id']==$preference_2){
    $responce->rows[$i]['cell']=array($row['prof_name'],$row['project_title'],$row['project_description'],$row['eligibility'],'2');
}
else if($row['id']==$preference_3){
    $responce->rows[$i]['cell']=array($row['prof_name'],$row['project_title'],$row['project_description'],$row['eligibility'],'3');
}
else if($row['id']==$preference_4){
    $responce->rows[$i]['cell']=array($row['prof_name'],$row['project_title'],$row['project_description'],$row['eligibility'],'4');
}
else{
    $responce->rows[$i]['cell']=array($row['prof_name'],$row['project_title'],$row['project_description'],$row['eligibility'],'0');
}
    $i++;
} 
echo json_encode($responce);
mysqli_close($link);
?>
