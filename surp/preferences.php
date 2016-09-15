<?php
//echo "a";
session_start();
require_once("functions1.php");
if (!(isset($_SESSION['ldap_id']))){
	header("location: apply.php");
}
if (isset($_POST['delete'])){
include ('connect.php');
$user = $_SESSION['ldap_id'];
$query = "UPDATE surp_member SET preference1='1', preference2='1', preference3='1', sop_preference1=NULL, sop_preference2=NULL, sop_preference3=NULL WHERE ldap_id = '$user'"; 
$result = mysqli_query($link, $query) or die ('Error connecting to database');
mysqli_close($link);
}
if (isset($_GET['logout'])){
session_destroy();
header("location : index.php");
}
$sopupdate = false;
$sopadd = true;
if (isset($_POST['submit'])) {
	$user = $_SESSION['ldap_id'];
	$pref = $_POST['pref'];
	include ('connect.php');
	$sop = mysqli_real_escape_string($link,$_POST['sop']);

	
	if ($pref == 1) {
		
		$query = "UPDATE surp_member SET sop_preference1='$sop' WHERE ldap_id = '$user'"; 
		$result = mysqli_query($link, $query) or die ('Error connecting to database');
    	mysqli_close($link);
    	$sopupdate=true;

	}
	if ($pref == 2) {
		$query = "UPDATE surp_member SET sop_preference2='$sop' WHERE ldap_id = '$user'"; 
		$result = mysqli_query($link, $query) or die ('Error connecting to database');
   	 	mysqli_close($link); 
   	 	$sopupdate=true;
	}
	if ($pref == 3) {
		$query = "UPDATE surp_member SET sop_preference3='$sop' WHERE ldap_id = '$user'"; 
		$result = mysqli_query($link, $query) or die ('Error connecting to database');
    	mysqli_close($link); 
    	$sopupdate=true;
	}
	if ($pref == 4) {
		$query = "UPDATE surp_member SET sop_preference4='$sop' WHERE ldap_id = '$user'";
		$result = mysqli_query($link, $query) or die ('Error connecting to database');
    	mysqli_close($link); 
    	$sopupdate=true; 
	}

}
/* if(!already_has_project($_SESSION['ldap_id'])){
	header("location : choice.php");	
}	*/
//show_project(51);
function show_project($pref, $pro_id){
	require_once("connect1.php");
	$db=mysql_connect("localhost","ugacademics","ug_acads");
	mysql_select_db("ugacademics");
	if (($pro_id==1) || ($pro_id==NULL)) return 0;
		$temp1 = "<table class='table table-striped'><tbody><tr><td>".$pref."</td>";
		//echo $temp1;
		$td="<td>";
		//echo $pro_id;
		$td2="</td>";
		$td3='<form action="'.$_SERVER['PHP_SELF'].'" method="post"><textarea name="sop" id="sop" rows="1" style="resize:none;height:170px;" required placeholder="Enter your SOP here *">';
		$user = $_SESSION['ldap_id'];
		$query1 = "SELECT* FROM surp_member WHERE ldap_id='$user'";
			$results1=mysql_query($query1);
			$row1 = mysql_fetch_array($results1,MYSQL_ASSOC);
		if ($pref==1) $td4= $row1['sop_preference1'];
		if ($pref==2) $td4= $row1['sop_preference2'];
		if ($pref==3) $td4= $row1['sop_preference3'];
		if ($pref==4) $td4= $row1['sop_preference4'];
		$td5 = '</textarea><input name="pref" type="hidden" value="'.$pref.'"><br><button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit/Update SOP</button></form>';
			$query = "SELECT* FROM projects_2015 WHERE id='$pro_id'";
			$results=mysql_query($query);
			$row = mysql_fetch_array($results,MYSQL_ASSOC);
		
			//echo $row['department'];	
$temp1=$temp1.$td.$row['department'].$td2.$td.$row['prof_name'].$td2.$td.$row['project_title'].$td2.$td.$row['project_description'].$td2.$td.$row['eligibility'].$td2.$td.$row['duration'].$td2.$td.$td3.$td4.$td5.$td2."</tr></tbody></table>";
			echo $temp1;

		
	}
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">

  <title>Apply | SURP</title>

  <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

    <link rel="stylesheet" href="css/style_apply.css">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">SURP</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
         <div style="width: 95%; margin: auto; margin-top: 40px; padding: 30px;" class="wrapper row-fluid"> 
			<button class="btn btn-primary btn-large" onclick="window.location='./choice.php';">Back</button>
			 <a  href="apply.php?logout=true" class="btn btn-primary btn-large">Logout</a>
			 
   			<?php
   			
   				require_once("functions1.php");
				if(!already_has_project($_SESSION['ldap_id'])){
					echo "<script type='text/javascript'>alert('You haven't filled your preferences. First fill them.);</script><br>";
					
//header("location:./apply.php");
				}
				else {
					require_once("connect1.php");
					$username = $_SESSION['ldap_id'];
					echo "<br><h4>Your Info</h4>";
                                        $query = "select* from surp_registered where username='$username'";
					$results=mysql_query($query) or die (mysql_error());
			                $temp1 = "<table class='table table-striped'><tbody><tr><td>".$pref."</td>";
                			$td="<td>";
                			$td2="</td>";
		                        $row = mysql_fetch_array($results,MYSQL_ASSOC);
$temp1=$temp1.$td.$row['fullname'].$td2.$td.$row['year_of_study'].$td2.$td.$row['department'].$td2.$td.$row['sop'].$td2.$td.$row['resume'].$td2;
                        echo $temp1."</tr></tbody></table>";
echo "<h5>These are your preferences which are currently saved in the 
database. If you are okay with it (no need to worry) then you may 
logout. For 
changing preferences go back and fill all the preferences again 
and verify after coming back here.<br><br> <strong>Note: SOPs are to submitted separately for each project. Clicking the 'Add/Update SOP' button will record only the sop above it.</strong> </h3>";
			
					echo '<h4><hr>Your preferences <form action="'.$_SERVER['PHP_SELF'].'" method="post"><button type="submit" name="delete" value="Clear All" class="btn btn-primary btn-large">Clear All</button></form></h4><br>';
					$query = "select* from surp_member where ldap_id='$username'";
					$results = mysql_query($query);
					$row = mysql_fetch_array($results,MYSQL_ASSOC);
					if ($sopupdate) echo '<strong><font color="blue">SOP for preference'.$pref.' was successfully added/updated.</font></strong>';
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
