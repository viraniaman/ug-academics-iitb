<?php
require_once("./connect.php");
echo "connected";

$doubleq='"';
$query="$load data infile './ee.csv' INTO TABLE profs fields terminated by ',' optionally enclosed by '$doubleq' lines terminated by '\n'";
echo $query;
$result=mysql_query($query);
echo $result;
?>