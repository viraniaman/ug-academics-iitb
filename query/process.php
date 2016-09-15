<?php
echo "Your query has been posted. The appropriate person will contact you in 48 hours. Redirecting ...";
session_destroy();
header("refresh:2; url='index.php'");
?>