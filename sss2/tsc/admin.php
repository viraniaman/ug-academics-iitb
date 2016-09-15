<?php
$courseadmin = false;
include 'connect.php';
$query2 = "SELECT * FROM tsc_ta WHERE course_id='$courseid'";
$result2=mysqli_query($link,$query1) or die(mysqli_error($link));
while($row2=mysqli_fetch_assoc($result2)) {
	if($username==$row2['username']) $courseadmin = true;
}
mysqli_close($link);
?>