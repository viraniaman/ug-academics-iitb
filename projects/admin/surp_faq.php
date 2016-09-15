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
    <h1>FAQ | PPA <small>Project Allocation Portal</small></h1>
</div>
<h4><a href="index.php">Go back</a><h4>
<?php
include ('../connect.php');
$query = "SELECT * FROM project_faq";
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
      <th>Name</th>
      <th>Question</th>
      <th>Email</th>
      
    </tr>
  </thead>
  <tbody>';
   while($row = mysqli_fetch_array($result)){
    $name = $row['name'];
    
    $question=$row['question'];
    $email=$row['email'];
    
    echo '<tr>
      <td width= "15%"><strong>'.$name.'</strong></td>
      
      <td width= "55%">'.$question.'</td>
     
      <td width= "20%">'.$email.'</td>
    </tr>';
}
echo '</tbody></table>';
mysqli_close($link);
?>
