<?php
session_start();
ob_start();
if(!isset($_SESSION['ldap']))
header('location: index.php');
$path = "homepages/" . $_SESSION['ldap'];
unlink($path . '/index.html');
unlink($path . '/style.css');
unlink($path . '/body_bg.jpg');
unlink($path . '/page_bg.png');
unlink($path . '/divider.png');
unlink($path . '/' . $_SESSION['pic_name']);
unlink($path . '/' . $_SESSION['resume']);
rmdir ($path);
session_destroy();
header ("Location:index.php");
?>
