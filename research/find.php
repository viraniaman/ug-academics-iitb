<?php
/*//session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}*/
require_once("functions.php");
if (isset($_POST['ask']))
{

	$username= $_SESSION['ldap_id'];//$_POST['firstname'];
	$nything = $_POST['nything'];
	$inter = $_POST['inter'];
	$dept = $_POST['dept'];
	  
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>





</head>
<body>

          


		<form method="POST" action="find.php">
			<table style="font-size:15px;">            
		 <tr><td>Anything </td><td><input type="text" name="nything" /></td></tr>
<tr><td>Interest </td><td><input type="text" name="inter" /></td></tr>
<select name="dept" data-required="true" class="dob parsley-validated">
<option>Jan</option>
<option>Feb</option>
<option>Mar</option>
<option>Apr</option>
<option>May</option>
<option>Jun</option>
<option>Jul</option>
<option>Aug</option>
<option>Sep</option>
<option>Oct</option>
<option>Nov</option>
<option>Dec</option>
</select><tr><td></td><td><input type='submit' value='ASK'  name='ask'></td></tr>
</table>

</form>
		


 



</body>
</html>

