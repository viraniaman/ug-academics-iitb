<?php
    mysql_connect('localhost','ugacademics','ug_acads');
    mysql_select_db("ugacademics");
    $td="<td>";
    $td2="</td>";
    function user_details($ldap_id){
        $result=mysql_query("select* from registered_users_for_project");
        $row = mysql_fetch_array($results,MYSQL_ASSOC);
        $ans=$td.$row['username'].$td2.$row['fullname'].$td2.$td.$row['year_of_study'].$td2.$td.$row['department'].$td2.$td.$row['hostel'].$td2.$td.$row['room'].$td.$row['mobile'].$td2.$td.$row['email'].$td2.$td.$row['alt_email'].$td2.$td.$row['sop'].$td2.$td2.$td.$row['resume'].$td2;
        echo $ans;
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<title>ISPA | Home</title>
</head>
<body>
<?php
    $td="<td>";
    $td2="</td>";
        $query="select* from projects_2013";
        $projects=mysql_query($query) or die(mysql_error());
        $temp1 = "<table class='table table-striped'><thead><th> pro_id </th>
<th>  department </th><th>  prof_name</th> 
<th>  project_title</th><th>  project_description</th> 
<th>  eligibility_criteria</th><th>  duration</th>
<th>  preference</th><th>  username </th>
<th>  fullname </th><th>  year_of_study</th>
<th>  department_student</th><th>    hostel </th>
<th>  room</th><th>  mobile</th>
<th>  email </th><th>  alt_email</th>
<th>   sop </th><th>  resume </th></thead><tbody>";
        echo $temp1;

        while ($project=mysql_fetch_assoc($projects)) {
            $pro_id=$project['id'];
echo "<tr>".$td.$project['id'].$td2.$td.$project['department'].$td2.$td.$project['prof_name'].$td2.$td.$project['project_title'].$td2.$td.
$project['project_description'].$td2.$td.$project['eligibility_criteria'].$td2.$td.$project['duration'].$td2;
echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";       
            $pref1=mysql_query("select* from user_data_2013 where preference1='$pro_id'");
            while ($user=mysql_fetch_assoc($pref1)) {
                $ldap_id=$user['ldap_id'];
                echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
                $result=mysql_query("select* from registered_users_for_project where username='$ldap_id'");
                $row = mysql_fetch_array($result,MYSQL_ASSOC);
                $ans=$td."1".$td2.$td.$row['username'].$td2.$td.$row['fullname'].$td2.$td.$row['year_of_study'].$td2.$td.$row['department'].$td2.$td.$row['hostel'].$td2.$td.$row['room'].$td2.$td.$row['mobile'].$td2.$td.$row['email'].$td2.$td.$row['alt_email'].$td2.$td.$row['sop'].$td2.$td.$row['resume'].$td2;
                echo $ans;
                echo "</tr>";
            }

            $pref2=mysql_query("select* from user_data_2013 where preference2='$pro_id'");
            while ($user=mysql_fetch_assoc($pref2)) {
                $ldap_id=$user['ldap_id'];
                echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
                $result=mysql_query("select* from registered_users_for_project where username='$ldap_id'");
                $row = mysql_fetch_array($result,MYSQL_ASSOC);
                $ans=$td."2".$td2.$td.$row['username'].$td2.$td.$row['fullname'].$td2.$td.$row['year_of_study'].$td2.$td.$row['department'].$td2.$td.$row['hostel'].$td2.$td.$row['room'].$td2.$td.$row['mobile'].$td2.$td.$row['email'].$td2.$td.$row['alt_email'].$td2.$td.$row['sop'].$td2.$td.$row['resume'].$td2;
                echo $ans;
                echo "</tr>";
            }

            $pref3=mysql_query("select* from user_data_2013 where preference3='$pro_id'");
            while ($user=mysql_fetch_assoc($pref3)) {
                $ldap_id=$user['ldap_id'];
                echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
                $result=mysql_query("select* from registered_users_for_project where username='$ldap_id'");
                $row = mysql_fetch_array($result,MYSQL_ASSOC);
                $ans=$td."3".$td2.$td.$row['username'].$td2.$td.$row['fullname'].$td2.$td.$row['year_of_study'].$td2.$td.$row['department'].$td2.$td.$row['hostel'].$td2.$td.$row['room'].$td2.$td.$row['mobile'].$td2.$td.$row['email'].$td2.$td.$row['alt_email'].$td2.$td.$row['sop'].$td2.$td.$row['resume'].$td2;
                echo $ans;
                echo "</tr>";
            }

            $pref4=mysql_query("select* from user_data_2013 where preference4='$pro_id'");
            while ($user=mysql_fetch_assoc($pref4)) {
                $ldap_id=$user['ldap_id'];
                echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
                $result=mysql_query("select* from registered_users_for_project where username='$ldap_id'");
                $row = mysql_fetch_array($result,MYSQL_ASSOC);
                $ans=$td."4".$td2.$td.$row['username'].$td2.$td.$row['fullname'].$td2.$td.$row['year_of_study'].$td2.$td.$row['department'].$td2.$td.$row['hostel'].$td2.$td.$row['room'].$td2.$td.$row['mobile'].$td2.$td.$row['email'].$td2.$td.$row['alt_email'].$td2.$td.$row['sop'].$td2.$td.$row['resume'].$td2;
                echo $ans;
                echo "</tr>";
            }
        }
        echo "</tbody></table>";

?>
</body>
</html>

