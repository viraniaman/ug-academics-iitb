<?php
session_start();
if(!isset($_SESSION['ldap']))
header('location: index.php');
ob_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title>Homepage Generator</title>
<meta http-equiv = "cache-control" content="no-cache">
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href="dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="dist/css/bootstrap.css" rel="stylesheet" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<style type="text/css">
a {
	color: white;
	text-decoration: none;
}
</style>
		

<?php
	if(file_exists('studentsData/'.$_SESSION['ldap'].'.js')) {
		echo "<script type=\"text/javascript\" src=\"studentsData/".$_SESSION['ldap'].".js?".time()."\"></script>";
	}
	else {
		echo "<script type=\"text/javascript\">function loadData(){}</script>";
	}
?>

<script type="text/javascript">
$(function() {
		
	// ECA
	var diveca = $('#eca');
	var o = $('#eca #ecaentry').size() + 1;
	// Add ECA
	$('#addNewEca').live('click', function() {
		$('<div id="ecaentry"><input type="text" style="width:500px" id="new_eca" name="eca_' + o +'" value="" placeholder="Activity" />&nbsp;<button class="btn" style="color:black;" id="remeca">Remove</button><br></div>').appendTo(diveca);
		o++;
		return false;
	});
	// Remove ECA
	$('#remeca').live('click', function() {
		if( o >= 1 ) {
			$(this).parents('#ecaentry').remove();
			o--;
		}
		return false;
	});




	// Skills
	var divSkills = $('#skills');
	var n = $('#skills #skillentry').size() + 1;
	// Add skills
	$('#addNewSkill').live('click', function() {
		$('<div id="skillentry"><input type="text"  style="width:200px" id="skillcategory" name="sc_' + n +'" value="" placeholder="Category" />  <input type="text"  id="skill" style="width:400px" name="skill_' + n +'" value="" placeholder="Skills" />&nbsp;<button class="btn" style="color:black;" id="remSkill">Remove</button><br></div>').appendTo(divSkills);
		n++;
		return false;
	});
	// Remove skills
	$('#remSkill').live('click', function() {
		if( n >= 1 ) {
			$(this).parents('#skillentry').remove();
			n--;
		}
		return false;
	});

	// Achievements
	var divAchievements = $('#achieve');
	var m = $('#achieve #achieveentry').size() + 1;
	// Add Achievement
	$('#addNewAchieve').live('click', function() {
		$('<div id="achieveentry"><input type="text"  style="width:500px" id="achievement" name="achieve_' + m +'" value="" placeholder="Achievement" />   <input type="text" style="width:100px" id="achieveYear" name="achieveYear_' + m +'" value="" placeholder="Year" />&nbsp;<button class="btn" style="color:black;" id="remAchieve">Remove</button><br></div>').appendTo(divAchievements);
		m++;
		return false;
	});
	// Remove Achievement
	$('#remAchieve').live('click', function() {
		if( m >= 1 ) {
			$(this).parents('#achieveentry').remove();
			m--;
		}
		return false;
	});

	// Research Interest
	var divrInterest = $('#rInterest');
	var l = $('#rInterest #rInterestentry').size() + 1;
	// Add Research Interest
	$('#addNewrInterest').live('click', function() {
		$('<div id="rInterestentry"><input type="text" style="width:300px" id="researchinterest" name="rInterest_' + l +'" value="" placeholder="Research Interest" />&nbsp;<button class="btn" style="color:black;" id="remrInterest">Remove</button><br></div>').appendTo(divrInterest);
		l++;
		return false;
	});
	// Remove Research Interest
	$('#remrInterest').live('click', function() {
		if( l >= 1 ) {
			$(this).parents('#rInterestentry').remove();
			l--;
		}
		return false;
	});

	// Internships
	var divIntern = $('#intern');
	var k = $('#intern #internentry').size() + 1;
	// Add Intern
	$('#addNewIntern').live('click', function() {
		$('<div id="internentry"><input type="text" id="internship" style="width:500px" name="intern_' + k +'" value="" placeholder="Internship" />  <br> <input type="text" style="width:247px" id="iperiod" name="iperiod_' + k +'" value="" placeholder="Project Period" />  <input type="text"  style="width:247px" id="guide" name="guide_' + k + '" value="" placeholder="Project Guide/ Mentor" /><br><textarea style="width:500px" rows="5" id="interndesc" name="interndesc_' + k +'" value="" placeholder="Internship Description"></textarea> &nbsp;<button class="btn" style="color:black;" id="remIntern">Remove</button><br></div>').appendTo(divIntern);
		k++;
		return false;
	});
	// Remove Project
	$('#remIntern').live('click', function() {
		if( k >= 1 ) {
			$(this).parents('#internentry').remove();
			k--;
		}
		return false;
	});

	// Projects
	var divProj = $('#project');
	var j = $('#project #projentry').size() + 1;
	// Add Project
	$('#addNewProj').live('click', function() {
		$('<div id="projentry"><input type="text" style="width:500px" id="proj" name="proj_' + j +'" value="" placeholder="Project" /> <br> <input type="text" style="width:247px" id="pperiod" name="pperiod_' + j +'" value="" placeholder="Project Period" /> <input type="text" style="width:247px" id="prof" name="prof_' + j + '" value="" placeholder="Project Guide" /><br><textarea style="width:500px" rows="5" id="projdesc"  name="projdesc_' + j +'" value="" placeholder="Project Description"></textarea>&nbsp;<button class="btn" style="color:black;" id="remProj">Remove</button><br></div>').appendTo(divProj);
		j++;
		return false;
	});
	// Remove Project
	$('#remProj').live('click', function() {
		if( j >= 1 ) {
			$(this).parents('#projentry').remove();
			j--;
		}
		return false;
	});

	// POR
	var divPor = $('#por');
	var i = $('#por #porentry').size() + 1;
	// Add POR
	$('#addNewPor').live('click', function() {
		$('<div id="porentry"><input type="text" style="width:300px" id="p_new" name="p_new_' + i +'" value="" placeholder="POR" />  <input type="text"  style="width:194px;" id="t_new" name="t_new_' + i +'" value="" placeholder="Tenure" /><textarea  rows="5" style="width:500px;" id="d_new" name="d_new_' + i +'" value="" placeholder="Duties"></textarea>&nbsp;<button class="btn" style="color:black;" id="remPor">Remove</button><br></div>').appendTo(divPor);
		i++;
		return false;
	});
	// Remove POR
	$('#remPor').live('click', function() {
		if( i >= 1 ) {
			$(this).parents('#porentry').remove();
			i--;
		}
		return false;
	});
}); 
</script>
</head>

<body style="background-image:url('body-bg.jpg');background-repeat:repeat-x;background-color:#D3E5F1;font-family:'Marcellus',serif;" onload="loadData();">
<div style="width:100%;margin-top:28px;background-color:#696969;color:white;">
	<center>
		<table cellpadding="10">
		<tr>
		<td>	<img src='iitb_logo.png' style="height:90px"> </td>
		<td>	<p style="color:white;font-size:45px;font-variant:small-caps;">Homepage Generator</p> </td>
		</tr>
		</table>
	</center>
</div>
<center>
<div id="detailsForm" style="width:1100px;margin-top:40px;margin-bottom:40px;padding:20px;background-color:#696969;font-size:17px;border-radius:10px;box-shadow:8px 8px 8px;">

	<form action='generator.php' method='POST' enctype='multipart/form-data'>
	<fieldset>
		<legend><p style='color:white;font-size:23px'>Details</p></legend>

	<table style="color:white;" width="1000px" cellpadding="10">
		<tr>	<td>Name</td><td>:</td>	<td><input type='text' style='width:300px' placeholder="Name" name='name' required></td>
				</tr>
		<tr>	<td>Department</td>	<td>:</td>	<td>
		<input type='text' style='width:300px'  placeholder="Department" name='dept' required></input>&nbsp;&nbsp;&nbsp;
		Program&nbsp;&nbsp;<select  name="program"><option value="Undergraduate Student">B. Tech.</option>
		<option value="Dual Degree Student">Dual Degree</option><option value="Post Graduate Student">M. Tech.</option>
		<option value="Ph. D. Student">Ph. D.</option>
		<option value="M. Sc. Student">M. Sc.</option>
		<option value="M. Des. Student">M. Des.</option>
		<option value="M. Phil. Student">M. Phil.</option></select>
		&nbsp;&nbsp;&nbsp;Year&nbsp;&nbsp;<select  name="year" style='width:100px'>
		<option value="First year">1st</option>
		<option value="Second year">2nd</option>
		<option value="Third year">3rd</option>
		<option value="Fourth year">4th</option>
		<option value="Fifth year">5th</option></select></td>	</tr>
		<tr>	<td>Picture</td><td>:</td>
				<td><input name="uploadedfile" type="file"/></td>
		</tr>
		<tr>	<td>Resume</td><td>:</td>
				<td><input name="resume" type="file" /></td>
		</tr>
		<tr>	<td>Email ID</td><td>:</td>
				<td><input style='width:300px' placeholder="Email ID" name="email" type="text"/></td>
		</tr>
		<tr style="border-top:1px solid white;">	<td>Achievements</td>		<td>:</td>
			<td>
				<div id="achieve">
					<button class="btn" style="color:black;" id="addNewAchieve" >Add</button>
				</div>
			</td>
		</tr>
		<tr style="border-top:1px solid white;">	<td>Internships</td>		<td>:</td>
			<td>
				<div id="intern">
					<button class="btn" style="color:black;" id="addNewIntern">Add</button>
				</div>
			</td>
		</tr>
		<tr style="border-top:1px solid white;">	<td>Projects</td>		<td>:</td>
			<td>
				<div id="project">
					<button class="btn" style="color:black;" id="addNewProj" >Add</button>
				</div>
			</td>
		</tr>
		<tr style="border-top:1px solid white;">	<td>Skills</td>		<td>:</td>
			<td>
				<div id="skills">
					<button class="btn" style="color:black;" id="addNewSkill" >Add</button>
				</div>
			</td>
		</tr>
		<tr style="border-top:1px solid white;">	<td>Research Interests</td>		<td>:</td>
			<td>
				<div id="rInterest">
					<button class="btn" style="color:black;" id="addNewrInterest" >Add</button>
				</div>
			</td>
		</tr>
		<tr style="border-top:1px solid white;">	<td>Positions of Responsibility</td>		<td>:</td>
			<td>
				<div id="por">
					<button class="btn" style="color:black;" id="addNewPor" >Add</button>
				</div>
			</td>
		</tr>
		<tr style="border-top:1px solid white;">	<td>Extra Curricular</td>		<td>:</td>
			<td>
				<div id="eca">
					<button class="btn" style="color:black;" id="addNewEca" >Add</button>
				</div>
			</td>
		</tr>
		<tr><td colspan="3" style="padding:10px;"> ** Make sure you have uploaded your photo and resume, in case you want to.<br>
		 ** You can login next time and edit your details again (they are stored). Photo and resume aren't stored.<br>
		 ** Clicking the Submit button below overwrites your stored data with the above ones.</td></tr>
		<tr><td style="padding:10px;"align="center" colspan="3"><button type="submit" style="color:black;font-size:17px" class="btn">Submit</button></td></tr>
	</table>
  	</fieldset>
	</form>
</div>
</center>
</body>
</html>