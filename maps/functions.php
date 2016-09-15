<?php
	include_once("../connecti.php");
	function getConn(){
		global $dbhost, $username, $passwd, $db;
		$mysqli = new mysqli($dbhost, $username, $passwd, $db);
		if($mysqli->connect_errno > 0){
			die("Unable to connect to database.".$mysqli->connect_error);
		}
		return $mysqli;		
	}
	function student_details($ldap){
		$mysqli = getConn();
		$ldap = $mysqli->real_escape_string($ldap);
		$query = "SELECT * FROM `pstudents`  INNER JOIN `pstudents_interests` WHERE `ldap` = '$ldap'";
		if($results = $mysqli->query($query)){
			return $results;
		}
		mysqli_close($mysqli);
	}
	function search_projects($words){
		$mysqli = getConn();
		$words = $mysqli->real_escape_string($words);
		$query = "SELECT * FROM `pstudents` INNER JOIN  `pprojects` on pstudents.sid = pprojects.sid INNER JOIN `pprojects_tags` on pprojects.ptid=pprojects_tags.ptid WHERE `tag` = 'automata'";
		print_r($query);
		if($results = $mysqli->query($query)){
			//print_r($results);
			return $results;
		}
		mysqli_close($mysqli);
	}
	function search_students($words){
		$mysqli = getConn();
		$words = $mysqli->real_escape_string($words);
		$query = "SELECT * FROM `pstudents`  INNER JOIN `pstudents_interests` WHERE `interest` = '$words'";
		//print_r($query);
		if($results = $mysqli->query($query)){
			//print_r($results);
			return $results;
		}
		mysqli_close($mysqli);
	}
	function search_profs($words){
		$mysqli = getConn();
		$words = $mysqli->real_escape_string($words);
		$query = "SELECT * FROM `pprofs`  INNER JOIN `pprofs_interests` WHERE `interest` = '$words'";
		//print_r($query);
		if($results = $mysqli->query($query)){
			//print_r($results);
			return $results;
		}
		mysqli_close($mysqli);
	}

	$results = student_details('deependra');
	//$results = search_profs('automata');
	while($row = $results->fetch_assoc()){
		echo "<pre>";
		print_r($row);
		echo $row['name'];
	}
	echo "hello";
?>
