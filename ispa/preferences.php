<?php
//echo "a";
session_start();
require_once("functions.php");
if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}
if (isset($_GET['logout'])){
session_destroy();
header("location : index.php");
}
if(!already_has_project($_SESSION['ldap_id'])){
	header("location : apply.php");	
}	
//show_project(51);
function show_project($pref, $pro_id){
	require_once("connect.php");
	$db=mysql_connect("localhost","ugacademics","ug_acads");
	mysql_select_db("ugacademics");
		$temp1 = "<table class='table table-striped'><tbody><tr><td>".$pref."</td>";
		//echo $temp1;
		$td="<td>";
		//echo $pro_id;
		$td2="</td>";
		if($pro_id>=1000){
			$query = "select* from projects_custom_2014 where id='$pro_id'";
			$results=mysql_query($query);
			$row = mysql_fetch_array($results,MYSQL_ASSOC);
			//echo $row['department'];
			$temp1=$temp1.$td.$row['department'].$td2.$td.$row['prof_name'].$td2.$td.$row['interests'].$td2.$td.$row['eligibility_criteria'].$td2.$td.$row['duration'].$td2."</tr></tbody></table>";
			echo $temp1;
		}
		else { 
			$query = "SELECT* FROM projects_2013 WHERE id='$pro_id'";
			$results=mysql_query($query);
			$row = mysql_fetch_array($results,MYSQL_ASSOC);
		
			//echo $row['department'];	
$temp1=$temp1.$td.$row['department'].$td2.$td.$row['prof_name'].$td2.$td.$row['project_title'].$td2.$td.$row['project_description'].$td2.$td.$row['eligibility_criteria'].$td2.$td.$row['duration'].$td2."</tr></tbody></table>";
			echo $temp1;
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<title>ISPA | Home</title>
</head>
<body id="body1">

    <div class="container-fluid">
	      <div class="page-header">
		  <h1>ISPA</h1>
		  <span style="display:inline; margin-left:2%; font-size:200%;">Institute Summer Project Allocation</span>
		  </div>
		  <ul class="nav nav-pills">
		  <li><a href="index.php">Home</a></li>
		   <li class="active"><a href="login.php">Apply</a></li>
		  <li><a href="#">Updates/Results</a></li>
		  <li><a href="ISPA_2014.pdf">Rule Book</a></li>
		  <li><a href="login_review.php">Reviews</a></li>
		  <li><a href="contacts.php">Contact/FAQs</a></li>
		  </ul>

         <div class="row-fluid"> 
			<button class="btn btn-primary btn-large" onclick="window.location='./apply.php';">Back</button>
			 <a  href="login.php?logout=true" class="btn btn-primary btn-large">Logout</a>
   			<?php
   				require_once("functions.php");
				if(!already_has_project($_SESSION['ldap_id'])){
					echo "<script type='text/javascript'>alert('You haven't filled your preferences. First fill them.);</script><br>";
					
//header("location:./apply.php");
				}
				else {
					require_once("connect.php");
					$username = $_SESSION['ldap_id'];
					echo "<br>Your Info";
                                        $query = "select* from registered_users_for_project where username='$username'";
					$results=mysql_query($query) or die (mysql_error());
			                $temp1 = "<table class='table table-striped'><tbody><tr><td>".$pref."</td>";
                			$td="<td>";
                			$td2="</td>";
		                        $row = mysql_fetch_array($results,MYSQL_ASSOC);
$temp1=$temp1.$td.$row['fullname'].$td2.$td.$row['year_of_study'].$td2.$td.$row['department'].$td2.$td.$row['sop'].$td2.$td.$row['resume'].$td2;
                        echo $temp1."</tr></tbody></table>";
echo "<h3>These are your preferences which are currently saved in the 
database. If you are okay with it (no need to worry) then you may 
logout. For 
changing preferences go back and fill all the preferences again 
and verify after coming back here.</h3>";
			
					echo "<hr>Your preferences<br>";
					$query = "select* from user_data_2013 where ldap_id='$username'";
					$results = mysql_query($query);
					$row = mysql_fetch_array($results,MYSQL_ASSOC);
					show_project(1,$row['preference1']);
					show_project(2,$row['preference2']);
					show_project(3,$row['preference3']);
					show_project(4,$row['preference4']);
				}
   			?>
	</div>
	</div>
</body>
</html>
