<?php

session_start();
$userid=$_SESSION['id'];

include("connect.php");


if(!$_POST['event']=='' && !$_POST['mydate']=='' && !$_POST['month']=='' && !$_POST['year']=='' && !$_POST['hours']=='' && !$_POST['minutes']=='' && !$_POST['durhours']=='' && !$_POST['durminutes']=='' && !$_POST['room']=='') 
{
	$ev=$_POST['event'];
	$des=$_POST['description'];
	$dt=$_POST['mydate'];
	$mnth=$_POST['month'];
	$yr=$_POST['year'];
	$hr=$_POST['hours'];
	$min=$_POST['minutes'];
	$dhr=$_POST['durhours'];
	$dmin=$_POST['durminutes'];
	$room=$_POST['room'];
	
	$dateid=($yr*10000)+($mnth*100)+$dt;
	//echo $dateid;
	$timeid=($hr*100)+$min;
	$durid=($dhr*100)+$dmin;
	$itu=$timeid;
	$ftu=$timeid+$durid;
//	echo $itu." + ".$durid." = ".$ftu."</br>";
	
	$register="INSERT INTO adminbookings (mydate,time,duration,eventname,eventdes,room,userid) VALUES ('$dateid','$timeid','$durid','$ev','$des','$room','$userid')";
	
	//echo "dateid : ".$dateid;
	$datecheck="SELECT * FROM adminbookings where mydate='$dateid' ";
	
	$result=mysql_query($datecheck);
	$num=mysql_num_rows($result);
//	$result1=mysql_fetch_array($result);
	
	if($num>0) {
//		   echo "alert1";
			$redflag=0;
/*			for($i=0;$i<$num;$i+=1) {
				if(strcmp($result1['room'],$room)==0) {echo "alert1.5";
					$redflag=$redflag+1;}
				 }
*/			
      
while($result1=mysql_fetch_array($result)) {

				if(strcmp($result1['room'],$room)==0) {
/*					$redflag=$redflag+1;}	
	
	}
			if($redflag>0) {
				echo "</br>alert3</br>";					
				for($j=0;$j<$redflag;$j+=1) 
while($result1=mysql_fetch_array($result)){
              echo "</br>I'm in ! ";  
*/
					$itd=$result1['time'];
					$ftd=$result1['duration']+$itd;
/*               echo "</br>itd = ".$itd."</br>";
               echo $itd." + ".$durid." = ".$ftd."</br>";
*/                
					if($itu <= $itd && $itd <= $ftu) {
//					                  echo "<div style=\"margin-left:auto; margin-right:auto; text-align:center;\"></br></br>Time slot already taken ! </br></br><a href=\"welcome.php\">Back</a></div>";
//					                  break;
					   $_SESSION['popup']="</br><span style=\"color:red;\"><i>Time slot already taken</i></span></br>";
                  header("location: welcome.php");}
					else if($itu <= $ftd && $ftd <= $ftu) {
//					                  echo "<div style=\"margin-left:auto; margin-right:auto; text-align:center;\"></br></br>Time slot already taken ! </br></br><a href=\"welcome.php\">Back</a></div>";
//					                  break;
					   $_SESSION['popup']="</br><span style=\"color:red;\"><i>Time slot already taken</i></span></br>";
                  header("location: welcome.php");}
					else if($itd <= $itu && $itu <= $ftd) {
//					                  echo "<div style=\"margin-left:auto; margin-right:auto; text-align:center;\"></br></br>Time slot already taken ! </br></br><a href=\"welcome.php\">Back</a></div>";
//					                  break;
					   $_SESSION['popup']="</br><span style=\"color:red;\"><i>Time slot already taken</i></span></br>";
                  header("location: welcome.php");}
					else if($itd <= $ftu && $ftu <= $ftd) {
//					                  echo "<div style=\"margin-left:auto; margin-right:auto; text-align:center;\"></br></br>Time slot already taken ! </br></br><a href=\"welcome.php\">Back</a></div>";
//					                  break;
					   $_SESSION['popup']="</br><span style=\"color:red;\"><i>Time slot already taken</i></span></br>";
                  header("location: welcome.php");}
					
}					
					else{	
						mysql_query($register) or die("Failed to register, Please try again.</br>Sorry for inconvinience.");
                  $_SESSION['popup']="</br><span style=\"color:#FFFFFF;\"><i>Succeffully Registered</i></span></br>";
                  header("location: welcome.php");						
						break;}
					}
//			else {mysql_query($register) or die("Failed to register, Please try again.</br>Sorry for inconvinience.");
//			echo "<script type='text/Javascript'>alert('Succeffully Registered !')</script>";}	 
		
		}
	else {mysql_query($register) or die("Failed to register, Please try again.</br>Sorry for inconvinience.");
                  $_SESSION['popup']="</br><span style=\"color:#FFFFFF;\"><i>Succeffully Registered</i></span></br>";
                  header("location: welcome.php");	}
}
else {
					   $_SESSION['popup']="</br><span style=\"color:red;\"><i>Please fill all the necessary fields</i></span></br>";
                  header("location: welcome.php");	
	}

?>