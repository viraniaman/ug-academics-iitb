<?php
$id = $_GET['id'];
include ('../connect.php');
    $query = "DELETE FROM projects_2015 WHERE id = '$id'";
  $result = mysqli_query($link, $query) or die ('Error connecting to database');
  mysqli_close($link); 
  echo 'The database has been successfully updated.<br>You will be redirected to list of projects in 2 seconds.';
  header("refresh:2;url=ProjectList.php");

?>