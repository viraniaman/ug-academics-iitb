<?php
$queryc = "SELECT * FROM tsc_courses WHERE year='2015'";
$resultc=mysqli_query($link,$queryc) or die(mysqli_error($link));
//$rowc = mysqli_fetch_assoc($resultc);
?>