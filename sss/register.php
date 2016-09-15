<?php
session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: login.php");
}
require_once("functions.php");
if (isset($_POST['register']))
{

	$username= $_SESSION['ldap_id'];//$_POST['firstname'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$alt_email = $_POST['altemail'];
	$hobb[0]= $_POST['ch105'];
  $hobb[1]= $_POST['ee'];
  $hobb[2]= $_POST['ma105'];
  $hobb[3]= $_POST['ma106'];
  $hobb[4]= $_POST['ma108'];
  $hobb[5]= $_POST['ph103'];
  $hobb[6]= $_POST['ph105'];
  $hobb[7]= $_POST['cs101'];
  $hobb[8]= $_POST['bb101'];
  $hobb[9]= $_POST['ed'];
  $hobb[10]= $_POST['ma105t'];
  $hobb[11]= $_POST['cs101t'];
  

  
      if (!(is_registered($username)))
  {
    $query = "INSERT INTO registered_users_for_project (username,fullname,email,alt_email,ch105,ee101,ma105,ma106,ma108,ph103,ph105,cs101,bb101,ed,ma105t,cs101t) VALUES ('$username','$fullname','$email','$alt_email','$hobb[0]','$hobb[1]','$hobb[2]','$hobb[3]','$hobb[4]','$hobb[5]','$hobb[6]','$hobb[7]','$hobb[8]','$hobb[9]','$hobb[10]','$hobb[11]')";
  $result= mysql_query($query);
              header("location: thnxx.php");
  }else{
   
   $con=mysqli_connect("10.105.177.5","ugacademics","ug_acads","ugacademics_gvgtc");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if (mysqli_query($con,"UPDATE registered_users_for_project SET fullname='$fullname', email='$email' ,alt_email = '$alt_email' ,ch105='$hobb[0]' ,ee101='$hobb[1]' ,ma105='$hobb[2]' ,ma106='$hobb[3]' ,ma108='$hobb[4]' ,ph103='$hobb[5]' ,ph105='$hobb[6]' ,cs101='$hobb[7]' ,bb101='$hobb[8]' ,ed='$hobb[9]' , ma105t='$hobb[10]' , cs101t ='$hobb[11]'
WHERE username='$username'")) {
	mysqli_close($con);
	header("location: thnxxagain.php"); }
else die(mysqli_error());
  }
  
}
else{
$info = ldap_find_all('uid',$_SESSION['ldap_id']);
//print_r($info);
$fullname = $info[0]["cn"][0];
$username=$info[0]['uid'][0];

$email=$info[0]["mail"][0];
$alternate_email=$info[0]['mailforwardingaddress'][0];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
 <link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.18.custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.multiselect.css" />
 	<!--<link rel="stylesheet" type="text/css" media="screen" href="js/jquery-ui.css" />-->
    <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<style type="text/css">

</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
<script> 
$(document).ready(function(){
  $(".rr1").mouseover(function(){
  
    $("#apDiv15").hide();
      $("#apDiv16").hide();
       $("#apDiv10").fadeIn(10);
    $("#apDiv10").animate({
      left:'18%',
      opacity:'0.8',
      height:'150px',
      width:'150px'
    });
     });
$(".rr1").mouseleave(function(){
    
     $("#apDiv10").fadeOut(10); 
$("#apDiv10").animate({
  left:'15%',
     opacity:'1',
     height: '100px',
     width:'100px'
    });
   $("#apDiv10").fadeOut(100);
   
  });
 
});
</script> 



<title>S^3 / REG</title>



</head>
<body>
<div class="rrr"><a href="home.php">
 <img src="images/sensual.png" alt="HTML tutorial" ></a>
<button onclick="myFunction()">Try it</button>


</div>

<div id="kkk">
<p>your time is over</p>
</div>





<div id="bodyy">
          
          <div id="apDiv15">
            <img style="display:block; margin:auto; width:100%;height:100%; "src="images/left.jpg"></div>
          <div id="apDiv16">
            <img style="display:block; margin:auto; width:100%;height:100%; "src="images/right.jpg"></div>

          
<center>
  <p style="font-size:18px;color:#289737;position:absolute;top:160px;left:30%;" >HOVER on the links to find this weeks session details.</p>
		 <div class="reg"> 

		<form method="POST" action="register.php">
			<table style="font-size:15px;">            
		 <tr><td>Username </td><td><input type="text" name="firstname" value='<?php echo $username;?>'/></td></tr>
<tr><td>Name </td><td><input type="text" name="fullname" value='<?php echo $fullname;?>' /></td></tr>
<tr><td>Email</td><td><input type="text" name="email" value ='<?php echo $email;?>' /></td></tr>
<tr><td>Alternate Email </td><td><input type="text" name="altemail" value ='<?php echo $alternate_email;?>' /></td></tr>
<tr><td></td><td><input type='submit' value='Register' class="btn btn-primary btn-large" name='register'></td></tr>
</table>
		 </div></center>

		
    
<div id="apDiv1"><a class="rr1" style="float:right;font-size:20px;" href="">CH105</a>
  
   <input class="bo" type="checkbox" name="ch105" value="yes"></div>


<div id="apDiv2"><a class="rr2" style="float:right;font-size:20px;" href="">EE101<br>EE111</a>
	
   <input class="bo" type="checkbox" name="ee" value="yes"></div>


<div id="apDiv3"><a class="rr3" style="float:right;font-size:20px;" href="">MA105<br><input  type="radio" name="ma105t" value="sixth"> <br><input type="radio" name="ma105t" value="ninth"> </a>
  
   <input class="bo" type="checkbox" name="ma105" value="yes"></div>

<div id="apDiv4"><a class="rr4" style="float:right;font-size:20px;" href="">MA106</a>
  
   <input class="bo" type="checkbox" name="ma106" value="yes"></div>


<div id="apDiv5"><a class="rr5" style="float:right;font-size:20px;" href="">MA108</a>
  
   <input class="bo" type="checkbox" name="ma108" value="yes"></div>

<div id="apDiv6"><a class="rr6" style="float:right;font-size:20px;" href="">PH107</a>
  
   <input class="bo" type="checkbox" name="ph103" value="yes"></div>

<div id="apDiv7"><a class="rr7" style="float:right;font-size:20px;" href="">PHf105</a>
  
   <input class="bo" type="checkbox" name="ph105" value="yes"></div>

<div id="apDiv8"><a class="rr8" style="float:right;font-size:20px;" href="">CS101<br><input  type="radio" name="cs101t" value="tenth"> <br><input type="radio" name="cs101t" value="eleventh"> </a>
  
   <input class="bo" type="checkbox" name="cs101" value="yes"></div>


<div id="apDiv9"><a class="rr9" style="float:right;font-size:20px;" href="">BB101</a>
  
   <input class="bo" type="checkbox" name="bb101" value="yes"></div>

<div id="apDiv99"><a class="rr10" style="float:right;font-size:20px;" href="">ED</a>
  
   <input class="bo" type="checkbox" name="ed" value="yes"></div>


</form>
<div id="apDiv10"><p>Date:16th August wednesday <br>Venue:MB 7B<br>Timings:10-11:30 p.m.<br>Tutor: Vishnu Nair</p></div>
<div id="apDiv11"></div>
<div id="apDiv12"><p>Date:15th August wednesday <br>Venue:MB 7B<br>Timings:10-11:30 p.m.<br>Tutor: r</p></div>
<div id="apDiv13"><p>session details Not available</p></div>
<div id="apDiv14"><p>session details Not available</p></div>

<div id="apDiv100"><p>Date:14th August wednesday <br>Venue:MB 7B<br>Timings:10-11:30 p.m.<br>Tutor: </p></div>
<div id="apDiv110"><p>session details Not available</p></div>
<div id="apDiv130"><p>session details Not available</p></div>
<div id="apDiv120"><p></p></div>
<div id="apDiv140"><p></p></div>




</div></div>

 <div id="footer">                                                                     
&nbsp;
<p style="float:right;padding-right:50px;"><a href="https://www.facebook.com/shubham.bhartiya">Designed & Developed by SHUBHAM BHARTIYA</a></p> 


    
    </div>




<script> 
$(document).ready(function(){
  $(".rr2 ").mouseover(function(){
  
   $("#apDiv15").hide();
      $("#apDiv16").hide();
       $("#apDiv11").fadeIn(10);
    $("#apDiv11").animate({
      left:'18%',
      opacity:'0.8',
      height:'150px',
      width:'150px'
    });
     });
$(".rr2").mouseleave(function(){
    
     $("#apDiv11").fadeOut(10); 
$("#apDiv11").animate({
  left:'15%',
     opacity:'1',
     height: '100px',
     width:'100px'
    });
  
   
  });
 
});
</script> 

<script> 
$(document).ready(function(){
  $(".rr3").mouseover(function(){
  
   $("#apDiv15").hide();
      $("#apDiv16").hide();
       $("#apDiv12").fadeIn(10);
    $("#apDiv12").animate({
      left:'18%',
      opacity:'0.8',
      height:'150px',
      width:'150px'
    });
     });
$(".rr3").mouseleave(function(){
    
     $("#apDiv12").fadeOut(10); 
$("#apDiv12").animate({
  left:'15%',
     opacity:'1',
     height: '100px',
     width:'100px'
    });
  
   
  });
 
});
</script>
<script> 
$(document).ready(function(){
  $(".rr4").mouseover(function(){
  
   $("#apDiv15").hide();
      $("#apDiv16").hide();
       $("#apDiv13").fadeIn(10);
    $("#apDiv13").animate({
      left:'18%',
      opacity:'0.8',
      height:'150px',
      width:'150px'
    });
     });
$(".rr4").mouseleave(function(){
    
     $("#apDiv13").fadeOut(10); 
$("#apDiv13").animate({
  left:'15%',
     opacity:'1',
     height: '100px',
     width:'100px'
    });
  
   
  });
 
});
</script>
<script> 
$(document).ready(function(){
  $(".rr5").mouseover(function(){
  
   $("#apDiv15").hide();
      $("#apDiv16").hide();
       $("#apDiv14").fadeIn(10);
    $("#apDiv14").animate({
      left:'18%',
      opacity:'0.8',
      height:'150px',
      width:'150px'
    });
     });
$(".rr5").mouseleave(function(){
    
     $("#apDiv14").fadeOut(10); 
$("#apDiv14").animate({
  left:'15%',
     opacity:'1',
     height: '100px',
     width:'100px'
    });
  
   
  });
 
});
</script>
<script> 
$(document).ready(function(){
  $(".rr6").mouseover(function(){
  
   $("#apDiv15").hide();
      $("#apDiv16").hide();
       $("#apDiv100").fadeIn(10);
    $("#apDiv100").animate({
      right:'18%',
      opacity:'0.8',
      height:'150px',
      width:'150px'
    });
     });
$(".rr6").mouseleave(function(){
    
     $("#apDiv100").fadeOut(10); 
$("#apDiv100").animate({
  right:'15%',
     opacity:'1',
     height: '100px',
     width:'100px'
    });
  
   
  });
 
});
</script>
<script> 
$(document).ready(function(){
  $(".rr7").mouseover(function(){
  
   $("#apDiv15").hide();
      $("#apDiv16").hide();
       $("#apDiv110").fadeIn(10);
    $("#apDiv110").animate({
      right:'18%',
      opacity:'0.8',
      height:'150px',
      width:'150px'
    });
     });
$(".rr7").mouseleave(function(){
    
     $("#apDiv110").fadeOut(10); 
$("#apDiv110").animate({
  right:'15%',
     opacity:'1',
     height: '100px',
     width:'100px'
    });
  
   
  });
 
});
</script>
<script> 
$(document).ready(function(){
  $(".rr8").mouseover(function(){
  
   $("#apDiv15").hide();
      $("#apDiv16").hide();
       $("#apDiv120").fadeIn(10);
    $("#apDiv120").animate({
      right:'18%',
      opacity:'0.8',
      height:'150px',
      width:'150px'
    });
     });
$(".rr8").mouseleave(function(){
    
     $("#apDiv120").fadeOut(10); 
$("#apDiv120").animate({
  right:'15%',

     opacity:'1',
     height: '100px',
     width:'100px'
    });
  
   
  });
 
});


  </script>
  <script>
$(document).ready(function(){
  $(".rr9").mouseover(function(){
  
   $("#apDiv15").hide();
      $("#apDiv16").hide();
       $("#apDiv130").fadeIn(10);
    $("#apDiv130").animate({
      right:'18%',
      opacity:'0.8',
      height:'150px',
      width:'150px'
    });
     });
$(".rr9").mouseleave(function(){
    
     $("#apDiv130").fadeOut(10); 
$("#apDiv130").animate({
  right:'15%',
     opacity:'1',
     height: '100px',
     width:'100px'
    });
  
   
  });
 
});
</script>
<script> 
$(document).ready(function(){
  $(".rr10").mouseover(function(){
  
   $("#apDiv15").hide();
      $("#apDiv16").hide();
       $("#apDiv140").fadeIn(10);
    $("#apDiv140").animate({
      right:'18%',
      opacity:'0.8',
      height:'150px',
      width:'150px'
    });
     });
$(".rr10").mouseleave(function(){
    
     $("#apDiv140").fadeOut(10); 
$("#apDiv140").animate({
  right:'15%',
     opacity:'1',
     height: '100px',
     width:'100px'
    });
  
   
  });
 
});
</script>
div id="footer">                                                                     
&nbsp;
<p style="float:right;padding-right:50px;"><a href="https://www.facebook.com/shubham.bhartiya">Designed & Developed by SHUBHAM BHARTIYA</p> 


    
    </div>
</body>
</html>

