<?php
    $department =$_POST['Department'] ;
    $prof = $_POST['InputName'];
    $title =$_POST['InputTitle'];
    $description=$_POST['Description'];
    $eligibility=$_POST['Eligibility'];
    $duration = $_POST['Duration'];
    if (isset($_POST['id'])) {
      $id = $_POST['id'];
    include ('../connect.php');
    $query = "UPDATE projects_2015 SET department='$department', prof_name= '$prof', project_title='$title', project_description='$description', eligibility='$eligibility', duration='$duration' WHERE id = '$id'";
  $result = mysqli_query($link, $query) or die ('Error connecting to database');
  mysqli_close($link); 
} else {
  include ('../connect.php');
  $query = "INSERT INTO projects_2015 (department, prof_name, project_title, project_description, eligibility, duration) " .
  "VALUES ('$department', '$prof', '$title', '$description', '$eligibility', '$duration')";
  $result = mysqli_query($link, $query) or die ('Error connecting to database');
  mysqli_close($link);
}
  echo 'The database has been successfully updated.<br>You will be redirected to list of projects in 2 seconds.';
  header("refresh:2;url=ProjectList.php");

?>