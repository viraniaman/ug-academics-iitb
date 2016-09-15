<?php
session_start();
require_once("functions1.php");
require_once("connect1.php");
if (!(isset($_SESSION['ldap_id']))){
	header ("location: index.php");
}

$username = $_SESSION['ldap_id'];
$department = "cse";
$preference_1= $_POST['preference_1'];
$preference_2= $_POST['preference_2'];
$preference_3= $_POST['preference_3'];
$preference_4= $_POST['preference_4'];

$pref_1 = explode("-",$preference_1);
$preference_1 = $pref_1[1];

$pref_2 = explode("-",$preference_2);
$preference_2 = $pref_2[1];

$pref_3 = explode("-",$preference_3);
$preference_3 = $pref_3[1];

$pref_4 = explode("-",$preference_4);
$preference_4 = $pref_4[1];

if ($preference_4=='-1'){
$preference_4='1';
}
if ($preference_3=='-1'){
$preference_3='1';
}
if ($preference_2=='-1'){
$preference_2='1';
}
if (!(already_has_project($username,$department))){
//add_new_student_application($username,$department,$preference_1,$preference_2,$preference_3);
	$db = mysql_connect("localhost", "ugacademics", "ug_acads");

mysql_select_db("ugacademics");

mysql_query("INSERT INTO surp_member(ldap_id,preference1,preference2,preference3, preference4) VALUES('$username','$preference_1','$preference_2','$preference_3', '$preference_4')") or die (mysql_error());
echo "Your preferences have been saved";
mysql_close($db);
	}
else {
	$db = mysql_connect("localhost", "ugacademics", "ug_acads");

mysql_select_db("ugacademics");

mysql_query("UPDATE surp_member SET preference1='$preference_1',preference2='$preference_2',preference3='$preference_3', preference4='$preference_4' WHERE ldap_id='$username'");

echo "Your preferences have been updated";


}
//echo $username.$department.$preference_1.$preference_2.$preference_3;
?>
