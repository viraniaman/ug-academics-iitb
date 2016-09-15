<?php
function cleanQuery($string)
{
  if(get_magic_quotes_gpc())  // prevents duplicate backslashes
  {
    $string = stripslashes($string);
  }
  $badWords = array("/delete/i", "/update/i","/union/i","/insert/i","/drop/i","/http/i","/--/i");
  $string = preg_replace($badWords, "", $string);
  if (phpversion() >= '4.3.0')
  {
    $string = mysql_real_escape_string($string);
  }
  else
  {
    $string = mysql_escape_string($string);
  }
  return $string;
}


function ldap_auth($ldap_id,$ldap_password){
	$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
	if($ldap_id=='') die("You have not entered any LDAP ID. Please go back and fill it up.");
	$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_id)");
	$info = ldap_get_entries($ds, $sr);
	$ldap_id = $info[0]['dn'];
	if(@ldap_bind($ds,$ldap_id,$ldap_password)){
		return true;
	}
	else{ return false;}
	
}

function already_has_project($ldap_id,$dep){
$db = mysql_connect("10.105.177.5", "root", "") or die("Connection Error: " . mysql_error());

        mysql_select_db("studentservices") or die("Error conecting to db.");

        $query = "SELECT ldap_id FROM user_data_2013 WHERE ldap_id='$ldap_id' and department='$dep'";
$result= mysql_query($query);
        $is_registered = mysql_num_rows($result);
 
        return $is_registered;

}
function is_registered($ldap_id){
	
	$db = mysql_connect("10.105.177.5", "ugacademics", "ug_acads") or die("Connection Error: " . mysql_error());

	mysql_select_db("ugacademics_gvgtc") or die("Error conecting to db.");

	$query = "SELECT username FROM registered_users_for_project WHERE username='$ldap_id'";
	$result= mysql_query($query);
	$is_registered = mysql_num_rows($result);
	
	return $is_registered;
}
function is_reregistered($ldap_id){
	
	$db = mysql_connect("10.105.177.5", "ugacademics", "ug_acads") or die("Connection Error: " . mysql_error());

	mysql_select_db("ugacademics_gvgtc") or die("Error conecting to db.");

	$query = "SELECT username FROM registered_users_for_project WHERE username='$ldap_id'";
	$result= mysql_query($query);
	$is_registered = mysql_num_rows($result);
	
	return $is_registered;
}

function ldap_find_all($attribute = 'uid', $value = '*', $baseDn = 'dc=iitb,dc=ac,dc=in') 
{  
	$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
    $r = ldap_search($ds, $baseDn, $attribute . '=' . $value); 

    if ($r) 
    { 
        //if the result contains entries with surnames, 
        //sort by surname: 
        ldap_sort($ds, $r, "sn"); 

        return ldap_get_entries($ds, $r); 
    } 
} 

function DepartmentFindAll(){
	
	$db = new PDO("mysql:dbname=ugacademics;host=10.105.177.5", "root", "" );
	
	$query = $db->prepare("SELECT value,department from ug_departments ");
	$query->execute();
	$result = $query->fetchAll();
	$db=null;
	return $result;
	
	
}

function register_user($username,$fullname,$email,$alt_email,$mobile,$var1)
{
	/*$db = new PDO("mysql:dbname=ispa;host=10.105.177.5", "root", "fedora13" );
	$created_at =date("Y-m-d H:i:s");
	$query = $db->prepare("INSERT INTO registered_users_for_project (username,fullname,department,email,alt_email,year_of_study,mobile,hostel,room) VALUES (?,?,?,?,?,?,?,?,?)");
	*/
	$db = mysql_connect("10.105.177.5", "root", "");

	mysql_select_db("studentservices");

	$query = "INSERT INTO registered_users_for_project (username,fullname,email,alt_email,mobile,ch105) VALUES ('$username','$fullname','$email','$alt_email','$mobile','$var1')";
	$result= mysql_query($query);
	
	/*$query->bindParam(':username',$username);
	$query->bindParam(':fullname',$fullname);
	$query->bindParam(':department',$department);
	$query->bindParam(':email',$email);
	$query->bindParam(':alt_email',$alt_email);
	$query->bindParam(':year_of_study',$year_of_study);
	$query->bindParam(':mobile',$mobile);
	$query->bindParam(':hostel',$hostel);
	$query->bindParam(':room',$room);*/
	//$query->execute(array($username,$fullname,$department,$email,$alt_email,$year_of_study,$mobile,$hostel,$room));
//	$db=null;
	
	
	
	
}    

function add_new_book($created_by,$name,$semester,$course,$cost,$tags){
$db = new PDO("mysql:dbname=$dbname;host=10.105.177.5", "$dbuser", "$dbpasswd" );
$query=$db->prepare("INSERT INTO books(created_by,name,semester_used,course,cost,tags) VALUES (?,?,?,?,?,?)");
$query->execute(array($created_by,$name,$semester,$course,$cost,$tags));
return true;
}

function add_new_student_application($username,$department,$preference_1,$preference_2,$preference_3){
$db = new PDO("mysql:dbname=$dbname;host=10.105.177.5", "$dbuser", "$dbpasswd" );
$query=$db->prepare("INSERT INTO user_data_2013(ldap_id,department) VALUES (?,?)");
$query->execute(array("username","department"));
return true;
}

?>
