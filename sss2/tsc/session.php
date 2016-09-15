<?php
$s_loggedin = false;
$t_loggedin = false;
$admin = false;
include 'admin_auth.php';
session_start();
if (isset($_SESSION['ldap'])) {
  $s_loggedin=true;
  $username=$_SESSION['ldap'];
  if($username==in_array($username, $authorised)) $admin=true;
}
elseif (isset($_SESSION['t_ldap'])) {
  $t_loggedin=true;
  $username=$_SESSION['t_ldap'];
} else {
	header('location: index.php?loggedin=no');
}
?>