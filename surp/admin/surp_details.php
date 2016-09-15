<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Registration form Template | PrepBootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/table.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Preferences | SURP <small>Summer Undergraduate Research Program</small></h1>
</div>
<h4><a href="index.php">Go back</a><h4>
<?php
include ('../connect.php');
$query = "SELECT * FROM surp_member";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
/*
$list = array();
while ($row=mysqli_fetch_array($result)) {
	$array[] = $row;
	$line = array($row);
	print_r($line)
	array_push($list, $line);
}
    mysqli_close($link); 
$fp = fopen("registerlist.csv","w+");
foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);

*/
echo '<table>
  <thead>
    <tr>
    <th>id </th>
      <th>ldap_id</th>
      <th>Preference1</th>
      <th>Preference2</th>
      <th>Preference3</th>
      <th>Preference4</th>
      <th>sop Preference1</th>
      <th>sop Preference2</th>
      <th>sop Preference3</th>
      <th>sop Preference4</th>

    </tr>
  </thead>
  <tbody>';
   while($row = mysqli_fetch_array($result)){
   	$id = $row['id'];
    $name = $row['ldap_id'];
    $Preference1=$row['preference1'];
    $Preference2=$row['preference2'];
    $Preference3=$row['preference3'];
    $Preference4=$row['preference4'];
    $sopPreference1=$row['sop_preference1'];
    $sopPreference2=$row['sop_preference2'];
    $sopPreference3=$row['sop_preference3'];
    $sopPreference4=$row['sop_preference4'];
    
    echo '<tr>
<td width="1%">'.$id .'</td>
      <td width="5%"><strong>'.$name.'</strong></td>
      <td width="1%">'.$Preference1.'</td>
      <td width="1%">'.$Preference2.'</td>
      <td width="1%">'.$Preference3.'</td>
      <td width="1%">'.$Preference4.'</td>
      <td><div style="overflow: scroll; height: 200px; width: 200px; ">'.$sopPreference1.'</div></td>
      <td><div style="overflow: scroll; height: 200px; width: 200px;">'.$sopPreference2.'</div></td>
      <td><div style="overflow: scroll; height: 200px; width: 200px;">'.$sopPreference3.'<div></td>
      <td><div style="overflow: scroll; height: 200px; width: 200px;">'.$sopPreference4.'</div></td>
    </tr>';
}
echo '</tbody></table>';
mysqli_close($link);
?>
