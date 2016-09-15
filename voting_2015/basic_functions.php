<?php
#doc
#	classname:	BaseFunctions
#	scope:		PUBLIC
#	
#/doc
function checkIP()
{
$ipAddress = $_SERVER['REMOTE_ADDR'];
if ($ipAddress == "10.111.105.20" || $ipAddress == "10.111.105.68" || $ipAddress == "10.111.105.41" || $ipAddress == "10.111.105.24" || $ipAddress == "10.4.101.148")
	{
		$ipfilter = true;
	}
else $ipfilter = false;
return $ipfilter;	
}
class BaseFunctions
{
	function checkLDAPUsrName($username, $password) {
		  
		  $ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
	if($username=='') die("You have not entered any LDAP ID. Please go back and fill it up.");
	if($password=='') die("You have not entered any password. Please go back and fill it up.");
	$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$username)");
	$info = ldap_get_entries($ds, $sr);
	$username = $info[0]['dn'];
	if(@ldap_bind($ds,$username,$password)){
		$return_value = 0;
	}
	else{ $return_value = 1;}
		  
		  
		  return $return_value;
	}
	function returnInfo($username){
		$returnInfoResult = Array();
		$returnInfoResult['found'] = false;
		$ds=ldap_connect("ldap.iitb.ac.in");
	    	$base_dn="ou=People,dc=iitb,dc=ac,dc=in";
	      	if ($ds) {
		      $r=ldap_bind($ds);
		      $sr=ldap_search($ds,$base_dn, "uid=" . $username );
		      ldap_sort($ds, $sr, "uid");
		      $info = ldap_get_entries($ds, $sr);
		      $returnInfoResult['found'] = true;
		      $returnInfoResult['rollNo'] = $info[0]["employeenumber"][0];
		      $returnInfoResult['usrID'] = $info[0]["uid"][0];
		      $returnInfoResult['name'] = $info[0]["cn"][0];
	      	}
	      	return $returnInfoResult;
	}
	function makeBlankEntryInVotingFile($studentInfo){
		$handle = fopen('./queue115.dat', 'a+');
		if($handle){
			$w = $studentInfo['rollNo'] . ' ::: ' . $studentInfo['name'] . ' (' . $studentInfo['usrID'] . ')'; 
			if(!fwrite($handle, $w)){
				echo "Server Error. Error Code 2 {blank voting}";
			}
			fclose($handle);
		}else
			echo "Server Error. Error Code 1 {blank voting}";
	}
	
	function checkBatch($info) {
	$result = false;
	$rollno = $info['rollNo'];
	if((strpos($rollno, "140040") === 0) || (strpos($rollno, "130040") === 0) || (strpos($rollno, "120040") === 0) || (strpos($rollno, "143040") === 0) || (strpos($rollno, "12D110003") === 0) || (strpos($rollno, "121030009") === 0)|| (strpos($rollno, "120110026") === 0) || (strpos($rollno, "120110045") === 0) || (strpos($rollno, "130110087") === 0)) {
	$result = true;
	}	
	return $result;}
	
	function assignBatch($info){
		$type = "";
		$rollno = $info['rollNo'];
		//ugs
	if((strpos($rollno, "130040") === 0)|| (strpos($rollno, "130110087") === 0)) { $type="ug2";}
		return $type;
	}

	function hasVoted($info){
		$hasVotedResult = false;
		$vf = file('./queue115.dat');
		$rollNo = $info['rollNo'];
		if(count($vf) > 0){
			foreach ($vf as $key => $line)
			{
				$line1 = explode(" ", $line);
				$_roll = trim($line1[0]);
				if($_roll == $rollNo){
					$hasVotedResult = true;
				}
			}
		}
		return $hasVotedResult;
	}
	function writeVotesToFile($votes, $rollNo, $batch, $usrID){
		$info = $this->returnInfo($usrID);
		$wv = $rollNo . " ";
		$wv .= "DG-" . $votes['dg'] . " ";
		$wv .= "CEAG-" . $votes['ceag'] . " ";
		if($batch == "ug1"){
			$wv .= "CR3S1-blank ";
			$wv .= "CR3S2-blank ";
			$wv .= "CR2S1-" . $votes['cr2s1'] . " ";
			$wv .= "CR2S2-" . $votes['cr2s2'] . " ";
		}elseif($batch == "ug2"){
			$wv .= "CR3S1-" . $votes['cr3s1'] . " ";
			$wv .= "CR3S2-" . $votes['cr3s2'] . " ";
			$wv .= "CR2S1-blank ";
			$wv .= "CR2S2-blank ";
			}
		else{
			$wv .= "CR3S1-blank ";
			$wv .= "CR3S2-blank ";
			$wv .= "CR2S1-blank ";
			$wv .= "CR2S2-blank ";
			}
        $wv .= "\n";
		$_handle = fopen('queue115.dat', 'a+');
		if($_handle){
			if(!fwrite($_handle, $wv)){
				echo "Server Error. Error Code 2 {final voting}";
			}
			fclose($_handle);
		}else
			echo "Server Error. Error Code 1 {final voting}";
		
	}
	function echoLoginPage($login, $entry, $mems, $voted){
	//Calling this function displays Login Page	
	echo '<div class="container"><div class="row"><div class="col-md-12">
	<h2 align="center">Civil Department Election 2015</h2></div></div><br>
	 <form style="width: 30%; margin: 0 auto;" class="form-login" method="post" action="'. $_SERVER['PHP_SELF'] . '">
        <h3 class="form-signin-heading">Instructions -</h3><ul>
	      <li>Log in using your LDAP username and password. (the one you use at GPO)</li>
	      <li>Once you log in, click on the radio button corresponding to appropriate candidate</li>
	      <li>Hit the submit button on that page.</li>
	    </ul>
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Log in</button>
		<font color="red" size="2px">' ; if ($login) echo 'Wrong username or password!' . '<br>';
		if ($entry) echo 'Entry not found!';if ($voted) echo 'Already voted!'; if ($mems) echo 'Civil students only!'; echo '</font>
		<input type="hidden" size="20" name="value" value="vote"/></form> </div>';
		}

	function echoVotingPage($batch, $rollNo, $UID) {
		echo '<div class="container"><div class="row"><div class="col-md-12">
								<h2 align="center">Civil Department Election Portal</h2>
							</div></div>
						<form method="post" action="'. $_SERVER['PHP_SELF'] . '">
<div class="container" id="list1">
					<div class="row" >
<h4 > Dept. General Secretary</h4>
						<ul class="team-list sort-destination" data-sort-id="team">
							<li class="col-md-3 isotope-item leadership">
								<div class="team-item thumbnail">
									
										<img class="img-responsive" alt="" src="img/team/Sagar.jpg">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Sagar Mandhani</span>
											 
										</span>
										<span class="thumb-info-caption">
										
										<p><a href="docs/SagarMandhani_DGSec.pdf" target="_blank"> View Manifesto</a></p>
										
									</span>
										<span><input type="radio" name="dg" value="yes" />Yes</span><span> <input type="radio" name="dg" value="no" />No </span>
										<span><input type="radio" name="dg" value="neutral" checked="checked"/>Neutral</span>
									</div>
							</li>
							
							
						</ul>

					</div>

				</div>
				
				
				
				
				<div class="container" id="list2" >

					<div class="row">
<h4 > CEA General Secretary</h4>

						<ul class="team-list sort-destination" data-sort-id="team">
							<li class="col-md-3 isotope-item leadership">
								<div class="team-item thumbnail">
									
										<img class="img-responsive" alt="" src="img/team/Mayur.jpg">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Mayur Mistry</span>
											 
										</span>
										<span class="thumb-info-caption">
										
										<p><a href="docs/Mayur_Mistry_CEA Gsec.pdf" target="_blank"> View Manifesto</a></p>
										
									</span>
										<span><input type="radio" name="ceag" value="yes" />Yes</span><span> <input type="radio" name="ceag" value="no" />No </span>
										<span><input type="radio" name="ceag" value="neutral" checked="checked"/>Neutral</span>
									</div>
							</li>
							
							
						</ul>

					</div>

				</div>';
 
if($batch=="ug2") { 
echo '<div class="container" id="list5">

					<div class="row" >
<h4 > CR (3rd Year - S1)</h4>

						<ul class="team-list sort-destination" data-sort-id="team">
							<li class="col-md-3 isotope-item leadership">
								<div class="team-item thumbnail">
									
										<img class="img-responsive" alt="" src="img/team/Ali.jpg">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Ali Parkar</span>
											 
										</span>
										<span class="thumb-info-caption">
										
										<p><a href="docs/Ali_Parkar_3rd_Year_S1.pdf" target="_blank"> View Manifesto</a></p>
										
									</span>
										<span><input type="radio" name="cr3s1" value="yes" />Yes</span><span> <input type="radio" name="cr3s1" value="no" />No </span>
										<span><input type="radio" name="cr3s1" value="neutral" checked="checked"/>Neutral</span>
									</div>
							</li>
							
							
						</ul>

					</div>

				</div>
<hr />
<div class="container" id="list5">

					<div class="row" >
<h4 > CR (3rd Year - S2)</h4>

						<ul class="team-list sort-destination" data-sort-id="team">
							<li class="col-md-3 isotope-item leadership">
								<div class="team-item thumbnail">
									
										<img class="img-responsive" alt="" src="img/team/Vijay.jpg">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Vijay CP</span>
											 
										</span>
										<span class="thumb-info-caption">
										
										<p><a href="docs/Vijay_CP_CR_3rd_year_S2.pdf" target="_blank"> View Manifesto</a></p>
										
									</span>
										<span><input type="radio" name="cr3s2" value="yes" />Yes</span><span> <input type="radio" name="cr3s2" value="no" />No </span>
										<span><input type="radio" name="cr3s2" value="neutral" checked="checked"/>Neutral</span>
									</div>
							</li>
							
							
						</ul>

					</div>

				</div>
<hr />';
} if($batch=="ug1") {
	echo '<div class="container" id="list6">

					<div class="row" >
<h4 > CR (2nd year - S1)</h4>

						<ul class="team-list sort-destination" data-sort-id="team">
							<li class="col-md-3 isotope-item leadership">
								<div class="team-item thumbnail">
									
										<img class="img-responsive" alt="" src="img/team/Mohit.jpg">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Mohit Patel</span>
											 
										</span>
										<span class="thumb-info-caption">
										
										<p><a href="docs/Mohit_Patel_CR_2nd_ year_S1.pdf" target="_blank"> View Manifesto</a></p>
										
									</span>
										<span><input type="radio" name="cr2s1" value="yes" />Yes</span><span> <input type="radio" name="cr2s1" value="no" />No </span>
										<span><input type="radio" name="cr2s1" value="neutral" checked="checked"/>Neutral</span>
									</div>
							</li>
							
							
						</ul>

					</div>

</div>
<div class="container" id="list6">

					<div class="row" >
<h4 > CR (2nd year - S2)</h4>

						<ul class="team-list sort-destination" data-sort-id="team">
							<li class="col-md-3 isotope-item leadership">
								<div class="team-item thumbnail">
									
										<img class="img-responsive" alt="" src="img/team/sreekar.JPG">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Sreekar Reddy</span>
											 
										</span>
										<span class="thumb-info-caption">
										
										<p><a href="docs/sreekar_reddy_CR_2nd_ year_S2.pdf" target="_blank"> View Manifesto</a></p>
										
									</span>
										<span><input type="radio" name="cr2s2" value="yes" />Yes</span><span> <input type="radio" name="cr2s2" value="no" />No </span>
										<span><input type="radio" name="cr2s2" value="neutral" checked="checked"/>Neutral</span>
									</div>
							</li>
							
							
						</ul>

					</div>

</div>';} echo '<input type="hidden" name="rollNo" value="' . $rollNo . '">
	<input type="hidden" name="batch" value="' . $batch . '">
	<input type="hidden" name="usrID" value="' . $UID . '">
	<input type="hidden" name="value" value="registerVotes">
	<button style = "width:10%;" class="btn btn-lg btn-primary btn-block" type="submit" name="login">Submit</button></form></div><footer style="display:absolute; bottom:0px; padding:10px; margin-left: 10px;">
	<p style="margin-left:10px;">Created by: MEMS Web Team 2014-15</p></footer>';
		
	}

	function echoAlreadyVoted() {
		//calling this function gives error msg if person has already vited
	echo 'You have already voted. Click <a href="./index.php">here</a> to go to login page<br/>';
	}

	function echoEntryNotFound () {
		//calling this function gives error msg if the rollnumber is not found in the database
	echo 'Entry not found. Click <a href="./index.php">here</a> to go back to login page<br/>';
	}

	function echoLoginError ($error) {
		//calling this function gives login error msg
	echo 'Login Error. Code: ' . $error. '<br/>
		Click <a href="./index.php">here</a> to go back to login page<br/>';
	}

	function echoDoneRedirect () {
		//calling this function displays msg conforming the vote is cast
	echo 'Thanks for casting your vote. Click <a href="./index.php">here</a> to go back to login page<br/>';
	}
#  $xmlDoc->member[$count]->votedg = $_POST['dg'];
#  $xmlDoc->member[$count]->voteceag = $_POST['ceag'];
#  $xmlDoc->member[$count]->votecr3 = $_POST['cr3s1'];
#  $xmlDoc->member[$count]->votecr3 = $_POST['cr3s2'];
#  $xmlDoc->member[$count]->votecr2 = $_POST['cr2s1'];
#  $xmlDoc->member[$count]->votecr3 = $_POST['cr2s2'];

}
?>
