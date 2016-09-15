<?php
	require("connect.php");
    $db_server=  mysql_connect($dbhost, $dbuser, $dbpasswd);
    if (!$db_server) die("Unable to connect to MySQL:".  mysql_error());
    mysql_select_db($dbname,$db_server) or die("Unable to select database:".  mysql_error());
	$rs_result = mysql_query("select * from student;");
	while ($row = mysql_fetch_assoc($rs_result)){
		echo $row['name'];
	}
?>