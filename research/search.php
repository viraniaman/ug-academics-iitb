<?php
require_once('input.php');
$dbhost='10.105.177.5';
$dbname = 'ugacademics';	
$dbuser = 'ugacademics';
$dbpasswd = 'ugacads';
document.writeElementById('')
$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());

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
		if($dept=='any')
			$query1="SELECT* FROM profs WHERE name LIKE '$arr_str[$i]'";
		else 
			$query1="SELECT* FROM profs WHERE name LIKE '$arr_str[$i]' AND dept='$dept'";			
		$query2="SELECT* FROM interests WHERE interest LIKE '$arr_str[$i]'";
		$result1=mysql_query($query1);
		$result2=mysql_query($query2);
		echo "Results containing: $arr_str[$i] <br>";
		while($row=mysql_fetch_assoc($result1))
		{
			$pid=$row['pid'];
			echo "Prof. Name: ";
			echo $row['name'];
			echo "<br> Webpage Link: ";
			echo $row['webpage'];
			echo "<br>Interests: ";
			$other_ints=mysql_query("SELECT * FROM interests WHERE pid='$pid'");
			while($int=mysql_fetch_assoc($other_ints))
			{
				echo $int['interest'];
				echo ", ";
			}
			echo "<br>";
		}
		
		while($row=mysql_fetch_assoc($result2))
		{
			$pid=$row['pid'];
			$prof=mysql_query("SELECT * FROM profs WHERE pid='$pid'");
			$row2=mysql_fetch_assoc($prof);
			echo "Prof. Name: ".$row2['name'];
			echo "<br> Webpage Link: ";
			echo "<a href='".$row2['webpage']."'>";
			echo $row2['webpage']."</a>";
			echo "<br> Interests: ";
			$other_ints=mysql_query("SELECT * FROM interests WHERE pid='$pid'");
			while($int=mysql_fetch_assoc($other_ints))
			{
				echo $int['interest'];
				echo ", ";
			}
			echo "<br>";		
		}	
			echo "<br>";
	}
	
?>