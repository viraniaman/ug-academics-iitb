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
<h4><a href="index.php">Go back</a></h4>
<?php
include ('../connect.php');
$query = "SELECT * FROM surp_registered";
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
echo '<table style="margin-left:0px;">
  <thead>
    <tr>
      <th>ldap_id</th>
      <th>roll</th>
      <th>fullname</th>
      <th>year_of_study</th>
      <th>department</th>
      <th>Hostel/Room</th>
      <th>email</th>
      <th>alt_email</th>
      <th>first year experience</th>
      <th>cpi</th>

    </tr>
  </thead>
  <tbody>';
   while($row = mysqli_fetch_array($result)){
   	//$id = $row['id'];
    $name = $row['username'];
    $Preference1=$row['roll'];
    $Preference2=$row['fullname'];
    $Preference3=$row['year_of_study'];
    $Preference4=$row['department'];
    $sopPreference1=$row['room'];
    $sopPreference2=$row['email'];
    $sopPreference3=$row['alt_email'];
    $sopPreference4=$row['first_year_exp'];
    $cpi = $row['cpi'];
    
    echo '<tr>
      <td><strong>'.$name.'</strong></td>
      <td width="1%">'.$Preference1.'</td>
      <td width="1%">'.$Preference2.'</td>
      <td width="1%">'.$Preference3.'</td>
      <td width="1%">'.$Preference4.'</td>
      <td><div>'.$sopPreference1.'</div></td>
      <td><div>'.$sopPreference2.'</div></td>
      <td><div>'.$sopPreference3.'<div></td>
      <td><div style="overflow: scroll; height: 200px; width: 200px;">'.$sopPreference4.'</div></td>
      <td><div">'.$cpi.'</div></td>
    </tr>';
}
echo '</tbody></table>';
mysqli_close($link);
?>
</div>
</body>
</html>
