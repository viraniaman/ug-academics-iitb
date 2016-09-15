<!DOCTYPE html>
<!-- saved from url=(0040)http://getbootstrap.com/examples/signin/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
<!-- Libs CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css" media="screen">
		<link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css" media="screen">
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" media="screen">
		<link rel="stylesheet" href="vendor/isotope/jquery.isotope.css" media="screen">
		<link rel="stylesheet" href="vendor/mediaelement/mediaelementplayer.css" media="screen">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">
		<link rel="stylesheet" href="css/theme-animate.css">

		<!-- Responsive CSS -->
		<link rel="stylesheet" href="css/theme-responsive.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css">
    <title>Elections Portal | CIVIL, IIT Bombay</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./files/ie-emulation-modes-warning.js"></script>
  <script src="./files/ie10-viewport-bug-workaround.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>


<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
}
</style><?php
$login = false;
$entry = false;
$mems = false;
$voted = false;
require_once("./basic_functions.php");
$checkedip = checkIP();

$usrname = ifset($_REQUEST['username'], 'default');
$passwd = ifset($_REQUEST['password'], 'default');
$value = ifset($_REQUEST['value'], 'default');
$rollNo = ifset($_REQUEST['rollNo'], 'default');
$batch = ifset($_REQUEST['batch'], 'default');
$usrID = ifset($_REQUEST['usrID'], 'default');
$votes['dg'] = ifset($_REQUEST['dg'], 'default');
$votes['ceag'] = ifset($_REQUEST['ceag'], 'default');
$votes['cr3s1'] = ifset($_REQUEST['cr3s1'], 'default');
//$votes['mmajpg'] = ifset($_REQUEST['mmajpg'], 'default');
//$votes['mmajphd'] = ifset($_REQUEST['mmajphd'], 'default');
$votes['cr3s2'] = ifset($_REQUEST['cr3s2'], 'default');
$votes['cr2s1'] = ifset($_REQUEST['cr2s1'], 'default');
$votes['cr2s2'] = ifset($_REQUEST['cr2s2'], 'default');
//$votes['cr4d'] = ifset($_REQUEST['cr4d'], 'default');

//if($checkedip==true){
$bf = new BaseFunctions();
switch ($value)
{
	case 'vote':
		$validUsrName = $bf->checkLDAPUsrName($usrname, $passwd);
		
		if($validUsrName == 0){
			$info = $bf->returnInfo($usrname);
			if($info['found'] == true){
			$checkBatch = $bf->checkBatch($info);
			if ($checkBatch == true) {			
				$alreadyVoted = $bf->hasVoted($info);
				if($alreadyVoted == false){
#					$bf->makeBlankEntryInVotingFile($info);
					$batch = $bf->assignBatch($info);
					$rollNo = $info['rollNo'];
					$UID = $info['usrID'];
					$bf->echoVotingPage($batch, $rollNo, $UID);
				}else {
					$voted= true;
					$bf->echoLoginPage($login,$entry, $mems, $voted);}
			}else {$mems=true;
			$bf->echoLoginPage($login,$entry, $mems, $voted);}
			}
			else
			{$entry=true;
			$bf->echoLoginPage($login,$entry, $mems, $voted);}
		}else
		{$login=true;
		$bf->echoLoginPage($login,$entry, $mems, $voted);}
	break;
	
	case 'registerVotes':
		$bf->writeVotesToFile($votes, $rollNo, $batch, $usrID);
		$bf->echoDoneRedirect();
	break;
	
	default:
		$bf->echoLoginPage();
	break;
}
//}
//else echo "The election interface is not accessible outside the comp room, please go to the department comp room and cast your valuable vote";

function ifset(&$variable, $default = null) {
	if (isset($variable)) {
		$tmp = $variable;
	} else {
		$tmp = $default;
	}
	return $tmp;
}

?>
