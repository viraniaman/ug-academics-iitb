<?php
class BaseFunctions {
	function checkLDAPUsrName($username, $password) {
		  $return_value = 0;
		  
		  if(strpos($username, "meta_admin") === false) {
		    $user_dn = "";
		    $ds=ldap_connect("ldap.iitb.ac.in");
		    $r=ldap_bind($ds);
		    $searchfor = "uid=" . $username;
		    $sr=ldap_search($ds ,"dc=iitb,dc=ac,dc=in", $searchfor);
		    if(ldap_count_entries($ds, $sr) != 1) {
		      ldap_close($ds);
		      $return_value  = 1;
		    }
		    else {
		      $info = ldap_get_entries($ds, $sr);
		      $user_dn = $info[0]["dn"];
		      ldap_close($ds);
		      
		      if(stristr($user_dn, "ou=MET") !== false || stristr($user_dn, "ou=cor") !== false) {
			$ds1=ldap_connect("ldap.iitb.ac.in");
			$r1=ldap_bind($ds1, $user_dn, $password);
			if($r1) {    
			  		$return_value = 0;
					//echo "LDAP Login successful\n";
					//echo $user_dn;
			}
			else {
			  $return_value = 2;
			}
			ldap_close($ds1);
		      }
		      else {
			$return_value = 4;
		      }
		    }
		  }
		  else {
		    if($password == "meta") {
		      $return_value = -3;
		    }
		    else {
		      $return_value = 2;
		    }
		  }
		  
		  return $return_value;
	}
function echoProjectTable($department) {
	echo '<table>
  <thead>
    <tr>
      <th>Professor</th>
      <th>Title</th>
      <th>Description</th>
      <th>Eligibility</th>
      <th>Duration</th>
    </tr>
  </thead>
  <tbody>';
  include ('connect.php');
  $query = "SELECT * FROM projects_2015 WHERE department='$department'";
  $result = mysqli_query($link, $query) or die ('Error connecting to database');
  while($row = mysqli_fetch_array($result)){
    $prof = $row['prof_name'];
    $title =$row['project_title'];
    $description=$row['project_description'];
    $eligibility=$row['eligibility'];
    $duration = $row['duration'];
    echo '<tr>
      <td><strong>'.$prof.'</strong></td>
      <td>'.$title.'</td>
      <td width= "35%">'.$description.'</td>
      <td width= "25%">'.$eligibility.'</td>
      <td width= "10%">'.$duration.'</td>
    </tr>';
}
echo '</tbody></table>';}
}
?>