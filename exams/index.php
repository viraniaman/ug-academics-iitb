<?php
session_start();
include 'include/header.php';
require_once("functions.php");
if (isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	if($username=="localhost" && $password=="thisisit"){
		$_SESSION['admin']="localhost";
		
		header("location: fill.php");
	}
	else 

	{
		if (ldap_auth($username,$password)){
			$_SESSION['ldap_id']=$username;
			header("location: view.php");
		}
		else {
			echo "Unable To proceed";
		}
		
	}
}
?>

<div id="content" class="bgnavcolor">
        <?php include 'include/sidebar.php'; ?>
      <div class="content_text" style="height:600px;">
<center>
<br/>
<br/>
<br/>
<form method="POST" action="index.php">
	<fieldset  style="width:240px;">
		<table>
			<tr><td>Login:</td><td><input type='text' name='username'></td></tr>
			<tr><td>Password</td><td><input type='password' name='password'></td></tr>
			<tr><td><td><input type='submit' value='Login' name='login' ></td></td></tr>
			
		</table>
	</fieldset>
</form>
</center>
</div>
</div>
<?php include 'include/footer.php'; ?>
