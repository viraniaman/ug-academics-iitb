<?php
	session_start();
	if(!isset($_SESSION["ldap"]))
		header("location: ./index.php?error=login first");
	$ldap = $_SESSION['ldap'];
	$file = "./JSONS/".$ldap.".json";
	$handle = fopen($file, 'w+');
	$json = file_get_contents('php://input'); 
	$json = $_GET["json"];
	$obj = json_decode($json);
	file_put_contents($file, $obj);
	chmod($file, 0777);
	$pwd = exec("pwd");
	$py = "/usr/bin/python2.7";
	if(strlen($pwd)>=17 && substr($pwd, 0, 17)=="/home/ugacademics")
		$py = "/usr/local/bin/python2.7";
	$cmd = $py." ".$pwd."/Template1/generateTex.py ".$ldap." 2>&1";
	//echo $cmd;
	//$cmd = "/usr/local/bin/python2.7 /home/ugacademics/public_html/resume/temp.py 2>&1";
	$output = exec($cmd);
	//chmod("./JSONS/".$ldap."tex", 777);
	//Now running pdflatex
	$cmd = "/usr/bin/pdflatex ".$pwd."/JSONS/".$ldap.".tex 2>&1";
	//print $cmd."\n";
	chdir($pwd."/JSONS");
	$output = $output.exec($cmd);
	if ($output == "Transcript written on ".$ldap.".log.")
		echo "{}";
	else echo $output;
?>
