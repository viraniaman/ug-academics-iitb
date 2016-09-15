<?php
/*$username = 'ugadmin';
$password = 'adminpass';
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
  header('HTTP/1.1 401 Unauthorized');
  header('WWW-Authenticate: Basic realm="SURP"');
  exit('<h2>SURP</h2>Enter a valid username and password to access the page');
}*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>SURP | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Add Projects | SURP <small>Summer Undergraduate Research Program</small></h1>
</div>
<?php
if (isset($_POST['submit'])) {
    $department =$_POST['Department'] ;
    $prof = $_POST['InputName'];
    $title =$_POST['InputTitle'];
    $description=$_POST['Description'];
    $eligibility=$_POST['Eligibility'];
    $duration = $_POST['Duration'];
    if ($_POST['purview']==1) {$purview = $_POST['purview'];} else {$purview=0;}
    include ('../connect.php');
  $query = "INSERT INTO projects_2015 (department, prof_name, project_title, project_description, eligibility, duration, outside_purview) " .
  "VALUES ('$department', '$prof', '$title', '$description', '$eligibility', '$duration', $purview)";
  $result = mysqli_query($link, $query) or die ('Error connecting to database');
  mysqli_close($link);
  echo 'The project has been successfully added.<br>You will be redirected to list of projects in 2 seconds.';
  header("refresh:2;url=ProjectList.php");
} else {
?>
<!-- Registration form - START -->
<div class="container">
    <div class="row">
        <?php 
    require_once('projectForm.php');
?>
        <div class="col-lg-5 col-md-push-1">
            <p>  Projects already added can be seen and edited 
           <a href = "ProjectList.php"> here </a> </p>
		   <p><a href="surp_faq.php">View FAQs </a></p>
       <p><a href="surp_details.php">Surp Details </a></p>
       <p><a href="registered.php">Surp Registration Details </a></p>
        </div>
    </div>
</div>
<!-- Registration form - END -->
<?php } ?>
</div>

</body>
</html>