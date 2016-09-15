<?php

$conn = mysql_connect('10.105.177.5', 'ugacademics', 'ug_acads') or die(mysql_error());
mysql_select_db('ugacademics_gvgtc', $conn) or die(mysql_error($conn));

/*
 * execute sql query
 */

$query = sprintf("SELECT username,fullname,email,alt_email,ma106 FROM registered_users_for_project WHERE ma106='yes'");
$result = mysql_query($query, $conn) or die(mysql_error($conn));

/*
 * send response headers to the browser
 * following headers instruct the browser to treat the data as a csv file called export.csv
 */

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=ma106.csv');

/*
 * output header row (if atleast one row exists)
 */

$row = mysql_fetch_assoc($result);
if ($row) {
    echocsv(array_keys($row));
}

/*
 * output data rows (if atleast one row exists)
 */

while ($row) {
    echocsv($row);
    $row = mysql_fetch_assoc($result);
}

/*
 * echo the input array as csv data maintaining consistency with most CSV implementations
 * - uses double-quotes as enclosure when necessary
 * - uses double double-quotes to escape double-quotes 
 * - uses CRLF as a line separator
 */

function echocsv($fields)
{
    $separator = '';
    foreach ($fields as $field) {
        if (preg_match('/\\r|\\n|,|"/', $field)) {
            $field = '"' . str_replace('"', '""', $field) . '"';
        }
        echo $separator . $field;
        $separator = ',';
    }
    echo "\r\n";
}
?>
