<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$page = $_REQUEST['page']; // get the requested page
$limit = $_REQUEST['rows']; // get how many rows we want to have into the grid
$sidx = $_REQUEST['sidx']; // get index row - i.e. user click to sort
$sord = $_REQUEST['sord']; // get the direction
if(!$sidx) $sidx =1;

$totalrows = isset($_REQUEST['totalrows']) ? $_REQUEST['totalrows']: false;
if($totalrows) {
	$limit = $totalrows;
}


// connect to the database
$db = mysql_connect("10.105.177.5", "ugacademics", "ug_acads") or die("Connection Error: " . mysql_error());

mysql_select_db("ugacademics") or die("Error conecting to db.");
//populateDBRandom();
$username=$_SESSION['ldap_id'];
$result = mysql_query("SELECT COUNT(*) AS count FROM books");
$row = mysql_fetch_array($result,MYSQL_ASSOC);

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
$SQL = "SELECT * FROM books order by dateOfAdding desc";
$result = mysql_query( $SQL ) or die("Couldnt execute query.".mysql_error());
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	$responce->rows[$i]['id']=$row['id'];
    $responce->rows[$i]['cell']=array($row['name'],$row['semester_used'],$row['course'],$row['cost'],$row['tags'],'');
    $i++;
} 
echo json_encode($responce);
mysql_close($db);
?>
