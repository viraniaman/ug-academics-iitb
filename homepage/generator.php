<?php
session_start();
ob_start();
if(!isset($_SESSION['ldap']))
header('location: index.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Homepage Generator</title>
<meta http-equiv = "cache-control" content="no-cache">
<link href="style.css" rel="stylesheet" media="screen">
</head>
<body>
<div id="nav-fixed-left">
<?php
$path = "homepages/" . $_SESSION['ldap'];
if (!file_exists ($path))
{
	mkdir ($path, 0775);
	chmod ($path, 0777);
}
$file = fopen ($path . "/index.html", 'w');
$file2 = fopen ("studentsData/".$_SESSION['ldap'].".js",'w');
chmod("studentsData/".$_SESSION['ldap'].".js", 0777);
$script = "function loadData() {";

$content = "<!DOCTYPE html><html><head><title>". $_POST['name'] . "</title><link href='style.css' rel='stylesheet' media='screen'></head><body><div id='nav-fixed-left'>";

if (!empty ($_FILES['resume']['name']))
{
	$resume_path = $path . '/';
	$resume_path = $resume_path . $_FILES['resume']['name'];
	$_SESSION['resume'] = $_FILES['resume']['name'];
	if(move_uploaded_file($_FILES['resume']['tmp_name'], $resume_path)) {
		echo "<li><a href=\"" . $resume_path . "\">Resume</a></li>";
		$content .= "<li><a href=\"" . $_FILES['resume']['name'] . "\">Resume</a></li>";
	}
}
if (isset($_POST['achieve_1']))
{
	echo "<li><a href=\"#achievements\">Achievements</a></li>";
	$content .= "<li><a href=\"#achievements\">Achievements</a></li>";
}
if (isset($_POST['intern_1']))
{
	echo "<li><a href=\"#interns\">Internships</a></li>";
	$content .= "<li><a href=\"#interns\">Internships</a></li>";
}
if (isset($_POST['proj_1']))
{
	echo "<li><a href=\"#projects\">Projects</a></li>";
	$content .= "<li><a href=\"#projects\">Projects</a></li>";
}
if (isset($_POST['sc_1'])) 
{
	echo "<li><a href=\"#skills\">Skills</a></li>";
	$content .= "<li><a href=\"#skills\">Skills</a></li>";
}
if (isset($_POST['rInterest_1']))
{
	echo "<li><a href=\"#interests\">Interests</a></li>";
	$content .= "<li><a href=\"#interests\">Interests</a></li>";
}
if (isset($_POST['eca_1']))
{
	echo "<li><a href=\"#ecas\">Extra Curriculars</a></li>";
	$content .= "<li><a href=\"#ecas\">Extra Curriculars</a></li>";
}
?>
</div>
<div id="container">
<center>
<table><tr><td>
<form action = "upload.php" method = "POST">
<input type = "submit" value = "Confirm">
</form></td><td>
<form action = "info_form.php" method = "POST">
<input type = "submit" value = "Go Back">
</form></td></tr></table>
</center>
<?php
$content .= "</div><div id = 'container'>";
$name=$_POST['name'];
$script .= "document.getElementsByName('name')[0].value=\"".$name."\";";
$dept=$_POST['dept'];
$script .= "document.getElementsByName('dept')[0].value=\"".$dept."\";";
$program=$_POST['program'];
$script .= "document.getElementsByName('program')[0].value=\"".$program."\";";
$year=$_POST['year'];
$script .= "document.getElementsByName('year')[0].value=\"".$year."\";";
$email=$_POST['email'];
$script .= "document.getElementsByName('email')[0].value=\"".$email."\";";
$username=$_SESSION['ldap'];
$target_path = $path . "/";
echo "<table cellpadding=\"0\" width=\"100%\">";
$content .= "<table cellpadding=\"0\" width=\"100%\">";
echo "<tr><td valign=\"top\"><h1>".$name."</h1>"; 
$content .= "<tr><td valign=\"top\"><h1>".$name."</h1>";
echo "<h3>".$year." ".$program."</h3>";
$content .= "<h3>".$year." ".$program."</h3>";
echo "<h3>Department of ".$dept."</h3>";
$content .= "<h3>Department of ".$dept."</h3>";
echo "<h3>IIT Bombay</h3>";
$content .= "<h3>IIT Bombay</h3>";
echo $email."</td><td align=\"right\">";
$content .= $email."</td><td align=\"right\">";

if (!empty ($_FILES['uploadedfile']['name'])) {
	$target_path = $target_path . $_FILES['uploadedfile']['name'];
	$_SESSION['pic_name'] = $_FILES['uploadedfile']['name'];
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	echo "<img src='".$target_path."' width='200px'>";
	$content .= "<img src='".$_FILES['uploadedfile']['name']."' width='200px'>";
	} else {
		echo "There was an error uploading the file, please try again!";
	}
}

echo "</td></tr></table>";
$content .= "</td></tr></table>";

// Achievements

if (isset($_POST['achieve_1'])) {
	echo "<div class=\"divider\"></div>";
	$content .= "<div class=\"divider\"></div>";
	echo "<a name=\"achievements\"></a>";
	$content .= "<a name=\"achievements\"></a>";
	echo "<h2>Achievements</h2>";
	$content .= "<h2>Achievements</h2>";
	$i=1;
	echo "<table width=\"100%\">";
	$content .= "<table width=\"100%\">";
	while (isset($_POST['achieve_'.$i])) {
		$script .= "document.getElementById('addNewAchieve').click();";
		echo "<tr>";
		$content .= "<tr>";
		echo "<td><li>".$_POST['achieve_'.$i]."</li></td>";
		$script .= "document.getElementsByName('achieve_".$i."')[0].value=\"".$_POST['achieve_'.$i]."\";";
		$content .= "<td><li>".$_POST['achieve_'.$i]."</li></td>";
		echo "<td align=\"right\">".$_POST['achieveYear_'.$i]."</td>";
		$script .= "document.getElementsByName('achieveYear_".$i."')[0].value=\"".$_POST['achieveYear_'.$i]."\";";
		$content .= "<td align=\"right\">".$_POST['achieveYear_'.$i]."</td>";
		echo "</tr>";
		$content .= "</tr>";
		$i++;
	}
	echo "</table>";
	$content .= "</table>";
}

// Internships

if (isset($_POST['intern_1'])) {
	echo "<div class=\"divider\"></div>";
	$content .= "<div class=\"divider\"></div>";
	echo "<a name=\"interns\"></a>";
	$content .= "<a name=\"interns\"></a>";
	echo "<h2>Internships</h2>";
	$content .= "<h2>Internships</h2>";
	$i=1;
	echo "<table width=\"100%\">";
	$content .= "<table width=\"100%\">";
	while (isset($_POST['intern_'.$i])) {
		$script .= "document.getElementById('addNewIntern').click();";
		echo "<tr>";
		$content .= "<tr>";
		echo "<td><b>".$_POST['intern_'.$i]."</b></td>";
		$script .= "document.getElementsByName('intern_".$i."')[0].value=\"".$_POST['intern_'.$i]."\";";
		$content .= "<td><b>".$_POST['intern_'.$i]."</b></td>";
		echo "<td align=\"right\">".$_POST['iperiod_'.$i]."</td>";
		$script .= "document.getElementsByName('iperiod_".$i."')[0].value=\"".$_POST['iperiod_'.$i]."\";";
		$content .= "<td align=\"right\">".$_POST['iperiod_'.$i]."</td>";
		echo "</tr>";
		$content .= "</tr>";
		echo "<tr>";
		$content .= "<tr>";
		echo "<td colspan=\"2\"><i>".$_POST['guide_'.$i]."</i></td>";
		$script .= "document.getElementsByName('guide_".$i."')[0].value=\"".$_POST['guide_'.$i]."\";";
		$content .= "<td colspan=\"2\"><i>".$_POST['guide_'.$i]."</i></td>";
		echo "</tr>";
		$content .= "</tr>";
		echo "<tr>";
		$content .= "<tr>";
		echo "<td colspan=\"2\">".$_POST['interndesc_'.$i]."</td>";
		$script .= "document.getElementsByName('interndesc_".$i."')[0].value=\"".$_POST['interndesc_'.$i]."\";";
		$content .= "<td colspan=\"2\">".$_POST['interndesc_'.$i]."</td>";
		echo "</tr>";
		$content .= "</tr>";
		$i++;
	}
	echo "</table>";
	$content .= "</table>";
}

// Projects

if (isset($_POST['proj_1'])) {
	echo "<div class=\"divider\"></div>";
	$content .= "<div class=\"divider\"></div>";
	echo "<a name=\"projects\"></a>";
	$content .= "<a name=\"projects\"></a>";
	echo "<h2>Projects</h2>";
	$content .= "<h2>Projects</h2>";
	$i=1;
	echo "<table width=\"100%\">";
	$content .= "<table width=\"100%\">";
	while (isset($_POST['proj_'.$i])) {
		$script .= "document.getElementById('addNewProj').click();";
		echo "<tr>";
		$content .= "<tr>";
		echo "<td><b>".$_POST['proj_'.$i]."</b></td>";
		$script .= "document.getElementsByName('proj_".$i."')[0].value=\"".$_POST['proj_'.$i]."\";";
		$content .= "<td><b>".$_POST['proj_'.$i]."</b></td>";
		echo "<td align=\"right\">".$_POST['pperiod_'.$i]."</td>";
		$script .= "document.getElementsByName('pperiod_".$i."')[0].value=\"".$_POST['pperiod_'.$i]."\";";
		$content .= "<td align=\"right\">".$_POST['pperiod_'.$i]."</td>";
		echo "</tr>";
		$content .= "</tr>";
		echo "<tr>";
		$content .= "<tr>";
		echo "<td colspan=\"2\"><i>".$_POST['prof_'.$i]."</i></td>";
		$script .= "document.getElementsByName('prof_".$i."')[0].value=\"".$_POST['prof_'.$i]."\";";
		$content .= "<td colspan=\"2\"><i>".$_POST['prof_'.$i]."</i></td>";
		echo "</tr>";
		$content .= "</tr>";
		echo "<tr>";
		$content .= "<tr>";
		echo "<td colspan=\"2\">".$_POST['projdesc_'.$i]."</td>";
		$script .= "document.getElementsByName('projdesc_".$i."')[0].value=\"".$_POST['projdesc_'.$i]."\";";
		$content .= "<td colspan=\"2\">".$_POST['projdesc_'.$i]."</td>";
		echo "</tr>";
		$content .= "</tr>";
		$i++;
	}
	echo "</table>";
	$content .= "</table>";
}

// Skills
if (isset($_POST['sc_1'])) {
	echo "<div class=\"divider\"></div>";
	$content .= "<div class=\"divider\"></div>";
	echo "<a name=\"skills\"></a>";
	$content .= "<a name=\"skills\"></a>";
	echo "<h2>Skills</h2>";
	$content .= "<h2>Skills</h2>";
	$i=1;
	echo "<table>";
	$content .= "<table>";
	while (isset($_POST['sc_'.$i])) {
		$script .= "document.getElementById('addNewSkill').click();";
		echo "<tr>";
		$content .= "<tr>";
		echo "<td><li>".$_POST['sc_'.$i]."</li></td>";
		$script .= "document.getElementsByName('sc_".$i."')[0].value=\"".$_POST['sc_'.$i]."\";";
		$content .= "<td><li>".$_POST['sc_'.$i]."</li></td>";
		echo "<td>:</td>";
		$content .= "<td>:</td>";
		echo "<td>".$_POST['skill_'.$i]."</td>";
		$script .= "document.getElementsByName('skill_".$i."')[0].value=\"".$_POST['skill_'.$i]."\";";
		$content .= "<td>".$_POST['skill_'.$i]."</td>";
		echo "</tr>";
		$content .= "</tr>";
		$i++;
	}
	echo "</table>";
	$content .= "</table>";
}

// Research Interests

if (isset($_POST['rInterest_1'])) {
	echo "<div class=\"divider\"></div>";
	$content .= "<div class=\"divider\"></div>";
	echo "<a name=\"interests\"></a>";
	$content .= "<a name=\"interests\"></a>";
	echo "<h2>Research Interests</h2>";
	$content .= "<h2>Research Interests</h2>";
	$i=1;
	while (isset($_POST['rInterest_'.$i])) {
		$script .= "document.getElementById('addNewrInterest').click();";
		echo "<li>".$_POST['rInterest_'.$i]."</li>";
		$script .= "document.getElementsByName('rInterest_".$i."')[0].value=\"".$_POST['rInterest_'.$i]."\";";
		$content .= "<li>".$_POST['rInterest_'.$i]."</li>";
		$i++;
	}
}

// POR 
if (isset($_POST['p_new_1'])) {
	echo "<div class=\"divider\"></div>";
	$content .= "<div class=\"divider\"></div>";
	echo "<a name=\"por\"></a>";
	$content .= "<a name=\"por\"></a>";
	echo "<h2>Positions of Responsibility</h2>";
	$content .= "<h2>Positions of Responsibility</h2>";
	$i=1;
	echo "<table width=\"100%\">";
	$content .= "<table width=\"100%\">";
	while (isset($_POST['p_new_'.$i])) {
		$script .= "document.getElementById('addNewPor').click();";
		echo "<tr>";
		$content .= "<tr>";
		echo "<td><b>".$_POST['p_new_'.$i]."</b></td>";
		$script .= "document.getElementsByName('p_new_".$i."')[0].value=\"".$_POST['p_new_'.$i]."\";";
		$content .= "<td><b>".$_POST['p_new_'.$i]."</b></td>";
		echo "<td align=\"right\">".$_POST['t_new_'.$i]."</td>";
		$script .= "document.getElementsByName('t_new_".$i."')[0].value=\"".$_POST['t_new_'.$i]."\";";
		$content .= "<td align=\"right\">".$_POST['t_new_'.$i]."</td>";
		echo "</tr>";
		$content .= "</tr>";
		echo "<tr>";
		$content .= "<tr>";
		echo "<td colspan=\"2\">".$_POST['d_new_'.$i]."</td>";
		$script .= "document.getElementsByName('d_new_".$i."')[0].value=\"".$_POST['d_new_'.$i]."\";";
		$content .= "<td colspan=\"2\">".$_POST['d_new_'.$i]."</td>";
		echo "</tr>";
		$content .= "</tr>";
		$i++;
	}
	echo "</table>";
	$content .= "</table>";
}

// ECAs

if (isset($_POST['eca_1'])) {
	echo "<div class=\"divider\"></div>";
	$content .= "<div class=\"divider\"></div>";
	echo "<a name=\"ecas\"></a>";
	$content .= "<a name=\"ecas\"></a>";
	echo "<h2>Extra Curricular Activities</h2>";
	$content .= "<h2>Extra Curricular Activities</h2>";
	$i=1;
	while (isset($_POST['eca_'.$i])) {
		$script .= "document.getElementById('addNewEca').click();";
		echo "<li>".$_POST['eca_'.$i]."</li>";
		$script .= "document.getElementsByName('eca_".$i."')[0].value=\"".$_POST['eca_'.$i]."\";";
		$content .= "<li>".$_POST['eca_'.$i]."</li>";
		$i++;
	}
}
$script .= "}";
$content .= "</div></body></html>";
fwrite ($file, $content);
fwrite ($file2, $script);
copy ('style.css', $path . '/style.css');
copy ('body_bg.jpg', $path . '/body_bg.jpg');
copy ('page_bg.png', $path . '/page_bg.png');
copy ('divider.png', $path . '/divider.png');

?>
</div>
</body>
</html>
