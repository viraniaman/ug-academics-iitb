<?php
echo "Your reply has been sent to the concerned student. Redirecting ...";
if($_SESSION['ldap_admin'=='gsecaaug'])
header("refresh:2; url='super_admin.php'");
else
header("refresh:2; url='admin.php'");
?>