<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edit Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style type="text/css">
    body {
  background: #fafafa url(http://jackrugile.com/images/misc/noise-diagonal.png);
  color: #444;
  font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;
  
}

strong {
  font-weight: bold; 
}

em {
  font-style: italic; 
}

table {
  background: #f5f5f5;
  border-collapse: separate;
  
  font-size: 12px;
  line-height: 24px;
  margin: 30px auto;
  text-align: left;
  width: 800px;
} 

th {
  background: url(http://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
  border-left: 1px solid #555;
  border-right: 1px solid #777;
  border-top: 1px solid #555;
  border-bottom: 1px solid #333;
  
  color: #fff;
  font-weight: bold;
  padding: 10px 15px;
  position: relative;
    
}

th:after {
  background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
  content: '';
  display: block;
  height: 25%;
  left: 0;
  margin: 1px 0 0 0;
  position: absolute;
  top: 25%;
  width: 100%;
}

th:first-child {
  border-left: 1px solid #777;  
  
}

th:last-child {
  
}

td {
  border-right: 1px solid #fff;
  border-left: 1px solid #e8e8e8;
  border-top: 1px solid #fff;
  border-bottom: 1px solid #e8e8e8;
  padding: 10px 15px;
  position: relative;
  transition: all 300ms;
}

td:first-child {
  
} 

td:last-child {
  border-right: 1px solid #e8e8e8;
  
} 

tr {
  background: url(http://jackrugile.com/images/misc/noise-diagonal.png);  
}

tr:nth-child(odd) td {
  background: #f1f1f1 url(http://jackrugile.com/images/misc/noise-diagonal.png);  
}

tr:last-of-type td {
  
}

tr:last-of-type td:first-child {
  
} 

tr:last-of-type td:last-child {
  
}     </style>
  </head>
<body>
  <h2 align="center">SURP </h2>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Department</th>
      <th>Professor</th>
      <th>Title</th>
      <th>Description</th>
      <th>Eligibility</th>
      <th>Duration</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  include ('../connect.php');
  $query = "SELECT * FROM projects_2015";
  $result = mysqli_query($link, $query) or die ('Error connecting to database');
  while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $department =$row['department'] ;
    $prof = $row['prof_name'];
    $title =$row['project_title'];
    $description=$row['project_description'];
    $eligibility=$row['eligibility'];
    $duration = $row['duration'];
    echo '<tr>
      <td><strong>'.$department.'</strong></td>
      <td>'.$id.'</td>
      <td>'.$prof.'</td>
      <td>'.$title.'</td>
      <td>'.$description.'</td>
      <td>'.$eligibility.'</td>
      <td>'.$duration.'</td>
      <td><a href="ProjectEdit.php?id='.$row['id'].'">Edit</a></td>
      <td><a href="ProjectDelete.php?id='.$row['id'].'">Delete</a></td>
    </tr>';
  }

  ?>
  
    
    
  </tbody>
  <p style = "text-align:center;">  Add new project
           <a href = "index.php"> here </a> </p>
</table>

</body> </html>
