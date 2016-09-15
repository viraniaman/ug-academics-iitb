<?php
session_start();
ob_start();/*
if(!isset($_SESSION['ldap_id']))
{
	session_destroy();
	header('location: index.php');
	}*/

$dbhost='10.105.177.5';
$dbname = 'ugacademics';	
$dbuser = 'ugacademics';
$dbpasswd = 'ug_acads';
$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());
?>
<html>
<title>Research </title>
<meta name="author" content="Deependra Patel">
<head> <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link rel="shortcut icon" href="favicon.ico">
<<<<<<< HEAD
<link rel="shortcut icon" href="images/favi.ico">
=======
>>>>>>> 869843b8078458e56f5668b9e79f3d11b46d3777
</head>
<style>
body
{
	background-image:url("back1.png");
	background-attachment:fixed;
	background-size: 100% 100%;
}
.one{
	width:20%;
	text-align:left;
}
.last{
	width:20%;
	text-align:right;
}
</style>
<body>
<div class="page-header" style="background-color:white;opacity:0.9;margin-left:100px;margin-right:100px; border:5px;border-radius:15px">
  <h1 style="font-family:'Times New Roman'"><img src="glass.png" style="height:50px; margin-top:10px; margin-left:10px"></img>Research Portal<small>	UG Academic Council</small></h1>
</div>

<div class="container">
<div class="navbar" style="background:slate;opacity:0.8;">
  <div class="navbar-inner" style="background:slate;">
    <a class="brand" href="#"></a>
    <ul class="nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/ug_acads/bookbay"  target="_blank">Bookbay</a></li>	  
      <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/homepage" target="_blank">Homepage Generator</a></li>
      <li><a href="http://library.iitb.ac.in" target="_blank">Library</a></li>
      <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/query" target="_blank">Q & G Portal</a></li>
      <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/wiki" target="_blank">UG Academics Wiki</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</div>

<div class="span11" style="background:white;border:2px;border-radius:25px; opacity:0.9" >
<form action='input.php' style="margin-left:30px; margin-top:40px;" method="POST">
	<input type="text" placeholder="Enter name of prof. or interests (leave empty for all results)" class="input-xxlarge" style="width:390px;height:35px"name="input"></input>
	<br>Department: <select class="selectpicker" name='dept'>
	<option value='any'>Any </option>
    <option value='cs'>Computer Science and Engg</option>
    <option value='elec'>Electrical Engg</option>
    <option value='mech'>Mechanical Engg</option>
    <option value='meta'>Metallurgical Engg & Materials Science</option>
    <option value='civil'>Civil Engineering</option>
    <option value='chemical'>Chemical Eng</option>
	<option value='chemistry'>Chemistry</option>
    <option value='ep'>Engineering Physics</option>
    <option value='aero'>Aerospace Engg</option>
    <option value='energy'>Energy Science and Engineering</option>
	</select>
	<button style="margin-left:100px" type="submit" name='submit' class="btn btn-success">Submit</button><br>
</form>
</div>
<br><br><br>
<div class="span11" id="search" style="margin-top:20px; margin-left:20px; background:white;border:2px;border-radius:25px; opacity:0.9;">
<div style='margin-left:50px'>
<?php
	if(isset($_POST['submit'])){
	$input=strtolower($_POST['input']);
	$dept=$_POST['dept'];
	$arr_str=array();
	$temp='';
	$index=0;
	for($i=0;$i<strlen($input);$i++)
	{
		if($input[$i]==' ')
		{
			$arr_str[$index]=$temp;
			$index++;
			$temp='';
		}
		else $temp=$temp.$input[$i];
	}
	if($index==0)
	$arr_str[$index]=$temp;
	
	else 
	{
		$arr_str[$index]=$temp;
		$index++;
		$arr_str[$index]=$input;
	}
	
	
	for($i=$index;$i>=0;$i--)
	{
		echo '<hr>';
		if($dept=='any')
			$query1="SELECT* FROM profs WHERE name LIKE '%$arr_str[$i]%' OR interests LIKE '%$arr_str[$i]%'";
		else 
			$query1="SELECT* FROM profs WHERE (name LIKE '%$arr_str[$i]%' OR interests LIKE '%$arr_str[$i]%') AND dept='$dept'";	
		$result1=mysql_query($query1);
		echo "Results containing: $arr_str[$i] <br><br>";
		if(mysql_num_rows($result1)==0)
		echo "No Results Found <br>";
		else
		while($row=mysql_fetch_assoc($result1))
		{
		echo "<table width='90%'>";
			$pid=$row['pid'];
			echo "<tr> <td class='one'>Prof. Name:</td><td><b>".$row['name']."</b></td><td class='last'>Department: <b>".$row['dept']."</b></td></tr>";
			echo "<tr><td class='one'>Webpage Link: </td>";
			echo "<td><a href=".$row['webpage']." target='_blank'>";
			echo $row['webpage']."</a></td></tr>";
			echo "<tr><td class='one'>Interests: </td><td>";
			echo $row['interests'];
			echo "</td></tr>";
			echo "</table><br>";
		}
	}}
	
?>
</div>
</div>
</div>
</body>
</html>
