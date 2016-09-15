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
  $hobb[1]= $_POST['ch107'];
  $hobb[2]= $_POST['ma105'];
  $hobb[3]= $_POST['ma106'];
  $hobb[4]= $_POST['ma108'];
  $hobb[5]= $_POST['ph103'];
  $hobb[6]= $_POST['ph105'];
  $hobb[7]= $_POST['cs101'];
  $hobb[8]= $_POST['bb101'];
  $hobb[9]= $_POST['ed'];
  
  UPDATE ugacademics_gvgtc
SET fullname='$_POST['fullname']', email='$_POST['email']' ,alt_email = '$_POST['altemail']',ch105='$_POST['ch105']',ch107='$_POST['ch107']',ma105='$_POST['ma105']',ma106='$_POST['ma106']',ma108='$_POST['ma108']',ph103='$_POST['ph103']',ph105='$_POST['ph105']',cs101='$_POST['cs101']',bb101='$_POST['bb101']',ed='$_POST['ed']'
 
WHERE username='$_SESSION['ldap_id']';

              header("location: thnxx.php");

     
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
<title>S^3 / REREG</title>



</head>
<body>
<div class="rrr">
 <a href="register.php"><img src="images/header4.png" alt="HTML tutorial" ></a>

</div>
<div class="bodyy">
          
          <div id="apDiv15">
            <img style="display:block; margin:auto; width:100%;height:100%; "src="images/hover.png"></div>
          <div id="apDiv16">
            <img style="display:block; margin:auto; width:100%;height:100%; "src="images/hover1.png"></div>

          

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

		
    
<div id="apDiv1">
<a href=""><a class="rr1" style="float:right;" href="">ch105</a>
  
   <input class="bo" type="checkbox" name="ch107" value="yes"></div>



<div id="apDiv2"><a class="rr2" style="float:right;" href="">ch107</a>
  
   <input class="bo" type="checkbox" name="ch107" value="yes"></div>


<div id="apDiv3"><a class="rr3" style="float:right;" href="">ma105</a>
  
   <input class="bo" type="checkbox" name="ch107" value="yes"></div>

<div id="apDiv4"><a class="rr4" style="float:right;" href="">ma106</a>
  
   <input class="bo" type="checkbox" name="ch107" value="yes"></div>


<div id="apDiv5"><a class="rr5" style="float:right;" href="">ma108</a>
  
   <input class="bo" type="checkbox" name="ch107" value="yes"></div>

<div id="apDiv6"><a class="rr6" style="float:right;" href="">ph103</a>
  
   <input class="bo" type="checkbox" name="ch107" value="yes"></div>

<div id="apDiv7"><a class="rr7" style="float:right;" href="">ph105</a>
  
   <input class="bo" type="checkbox" name="ch107" value="yes"></div>

<div id="apDiv8"><a class="rr8" style="float:right;" href="">cs101</a>
  
   <input class="bo" type="checkbox" name="ch107" value="yes"></div>


<div id="apDiv9"><a class="rr9" style="float:right;" href="">bb101</a>
  
   <input class="bo" type="checkbox" name="ch107" value="yes"></div>

<div id="apDiv99"><a class="rr10" style="float:right;" href="">ed</a>
  
   <input class="bo" type="checkbox" name="ch107" value="yes"></div>



</form>
<div id="apDiv10"><p>written in boustrophedon (alternating directions). Over time, text direction (left to right) became standardized, and word dividers and terminal punctuation became common. The first way to divide sentences into groups was the original paragraphos, similar to an underscore at the beginning of the new group.[3] The Greek paragraphos evolved into the pilcrow (¶), which in English manuscripts in the Middle Ages can be seen inserted inline between sentences. The hedera leaf (e.g. ☙) has also been used in the same way.
In ancient manuscripts, another means to divide sentences in into paragraphs was a line break (newline) followed by an initial at</p></div>
<div id="apDiv11"><p>written in boustrophedon (alternating directions). Over time, text direction (left to right) became standardized, and word dividers and terminal punctuation became common. The first way to divide sentences into groups was the original paragraphos, similar to an underscore at the beginning of the new group.[3] The Greek paragraphos evolved into the pilcrow (¶), which in English manuscripts in the Middle Ages can be seen inserted inline between sentences. The hedera leaf (e.g. ☙) has also been used in the same way.
In ancient manuscripts, another means to divide sentences in into paragraphs was a line break (newline) followed by an initial at</p></div>
<div id="apDiv12"><p>written in boustrophedon (alternating directions). Over time, text direction (left to right) became standardized, and word dividers and terminal punctuation became common. The first way to divide sentences into groups was the original paragraphos, similar to an underscore at the beginning of the new group.[3] The Greek paragraphos evolved into the pilcrow (¶), which in English manuscripts in the Middle Ages can be seen inserted inline between sentences. The hedera leaf (e.g. ☙) has also been used in the same way.
In ancient manuscripts, another means to divide sentences in into paragraphs was a line break (newline) followed by an initial at</p></div>
<div id="apDiv13"><p>written in boustrophedon (alternating directions). Over time, text direction (left to right) became standardized, and word dividers and terminal punctuation became common. The first way to divide sentences into groups was the original paragraphos, similar to an underscore at the beginning of the new group.[3] The Greek paragraphos evolved into the pilcrow (¶), which in English manuscripts in the Middle Ages can be seen inserted inline between sentences. The hedera leaf (e.g. ☙) has also been used in the same way.
In ancient manuscripts, another means to divide sentences in into paragraphs was a line break (newline) followed by an initial at</p></div>
<div id="apDiv14"><p>written in boustrophedon (alternating directions). Over time, text direction (left to right) became standardized, and word dividers and terminal punctuation became common. The first way to divide sentences into groups was the original paragraphos, similar to an underscore at the beginning of the new group.[3] The Greek paragraphos evolved into the pilcrow (¶), which in English manuscripts in the Middle Ages can be seen inserted inline between sentences. The hedera leaf (e.g. ☙) has also been used in the same way.
In ancient manuscripts, another means to divide sentences in into paragraphs was a line break (newline) followed by an initial at</p></div>

<div id="apDiv100"><p>written in boustrophedon (alternating directions). Over time, text direction (left to right) became standardized, and word dividers and terminal punctuation became common. The first way to divide sentences into groups was the original paragraphos, similar to an underscore at the beginning of the new group.[3] The Greek paragraphos evolved into the pilcrow (¶), which in English manuscripts in the Middle Ages can be seen inserted inline between sentences. The hedera leaf (e.g. ☙) has also been used in the same way.
In ancient manuscripts, another means to divide sentences in into paragraphs was a line break (newline) followed by an initial at</p></div>
<div id="apDiv110"><p>written in boustrophedon (alternating directions). Over time, text direction (left to right) became standardized, and word dividers and terminal punctuation became common. The first way to divide sentences into groups was the original paragraphos, similar to an underscore at the beginning of the new group.[3] The Greek paragraphos evolved into the pilcrow (¶), which in English manuscripts in the Middle Ages can be seen inserted inline between sentences. The hedera leaf (e.g. ☙) has also been used in the same way.
In ancient manuscripts, another means to divide sentences in into paragraphs was a line break (newline) followed by an initial at</p></div>
<div id="apDiv120"><p>written in boustrophedon (alternating directions). Over time, text direction (left to right) became standardized, and word dividers and terminal punctuation became common. The first way to divide sentences into groups was the original paragraphos, similar to an underscore at the beginning of the new group.[3] The Greek paragraphos evolved into the pilcrow (¶), which in English manuscripts in the Middle Ages can be seen inserted inline between sentences. The hedera leaf (e.g. ☙) has also been used in the same way.
In ancient manuscripts, another means to divide sentences in into paragraphs was a line break (newline) followed by an initial at</p></div>
<div id="apDiv130"><p>written in boustrophedon (alternating directions). Over time, text direction (left to right) became standardized, and word dividers and terminal punctuation became common. The first way to divide sentences into groups was the original paragraphos, similar to an underscore at the beginning of the new group.[3] The Greek paragraphos evolved into the pilcrow (¶), which in English manuscripts in the Middle Ages can be seen inserted inline between sentences. The hedera leaf (e.g. ☙) has also been used in the same way.
In ancient manuscripts, another means to divide sentences in into paragraphs was a line break (newline) followed by an initial at</p></div>
<div id="apDiv140"><p>written in boustrophedon (alternating directions). Over time, text direction (left to right) became standardized, and word dividers and terminal punctuation became common. The first way to divide sentences into groups was the original paragraphos, similar to an underscore at the beginning of the new group.[3] The Greek paragraphos evolved into the pilcrow (¶), which in English manuscripts in the Middle Ages can be seen inserted inline between sentences. The hedera leaf (e.g. ☙) has also been used in the same way.
In ancient manuscripts, another means to divide sentences in into paragraphs was a line break (newline) followed by an initial at</p></div>




</div></div>





<script> 
$(document).ready(function(){
  $(".rr2").mouseover(function(){
  
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
</body>
</html>

