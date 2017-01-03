<?php

DEFINE('DB_HOST', "10.105.177.5");
define('DB_NAME', "ugacademics");
define('DB_USER', "ugacademics");
define('DB_PWD', "ug_acads");

$dbc= @mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME)
OR die('Unable to connect to database'.mysqli_connect_error());

//echo "Connected".'<br>';

?>