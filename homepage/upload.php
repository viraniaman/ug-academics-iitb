<?php

session_start();
ob_start();
if(!isset($_SESSION['ldap']))
header('location: index.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title >Homepage Generator</title>
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href="dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="dist/css/bootstrap.css" rel="stylesheet" media="screen">
</head>

<body background='body-bg.jpg' style='font-size:18px;font-family:Marcellus;'>

<div style="width:100%;margin-top:28px;background-color:#696969;color:white;">
	<center>
		<table cellpadding="10">
		<tr>
		<td>	<img src='iitb_logo.png' style="height:90px"> </td>
		<td>	<p style="color:white;font-size:45px;font-variant:small-caps;">Homepage Generator</p> </td>
		</tr>
		</table>
	</center>
</div>
<div style="margin-left:20px;">
<?php
// FTP upload

//$ftp_server = "bighome.iitb.ac.in";
$conn_id = ftp_connect ($ftp_server);
$login_result = ftp_login ($conn_id, $_SESSION['ldap'], $_SESSION['ldap_pass']);
$path = "homepages/" . $_SESSION['ldap'];
//ftp_mkdir ($conn_id, 'public_html');
//ftp_delete ($conn_id, 'public_html/index.php'); // If there is an index.php
/**if (ftp_put ($conn_id, 'public_html/index.html', $path . "/index.html", FTP_ASCII))
{
	if (ftp_put ($conn_id, 'public_html/style.css', $path . '/style.css', FTP_ASCII))
	{
		if (ftp_put ($conn_id, 'public_html/body_bg.jpg', $path . '/body_bg.jpg', FTP_ASCII))
		{
			if (ftp_put ($conn_id, 'public_html/page_bg.png', $path . '/page_bg.png', FTP_ASCII))
			{
				if (ftp_put ($conn_id, 'public_html/divider.png', $path . '/divider.png', FTP_ASCII))
				{
					ftp_put ($conn_id, 'public_html/' . $_SESSION['pic_name'], $path . '/' . $_SESSION['pic_name'], FTP_ASCII);
					ftp_put ($conn_id, 'public_html/' . $_SESSION['resume'], $path . '/' . $_SESSION['resume'], FTP_ASCII);
					?>
					<br><br>
					<center>Homepage updated!!</center>
					Please visit <a href = "http://home.iitb.ac.in/~<?php echo $_SESSION['ldap'];?>">http://home.iitb.ac.in/~<?php echo $_SESSION['ldap'];?></a> to see your new homepage! 
					<br> Good luck!
					<?php
				}
				else
				{
					?>
					<br><br>
					<center>Error in upload</center><br>
					Server might be down. Please try after some time (after 2-3 hours)<br>
					<center>If problem persists please contact the <a href="http://gymkhana.iitb.ac.in/~ugacademics/homepage">Web Team</a> by filling feedback form with error code #5</center>
					<?php
				}
			}
			else
			{
				?>
				<br><br>
				<center>Error in upload</center><br>
				Server might be down. Please try after some time (after 2-3 hours)<br>
				<center>If problem persists please contact the <a href="http://gymkhana.iitb.ac.in/~ugacademics/homepage">Web Team</a> by filling feedback form with error code #4</center>
				<?php
			}
		}
		else
		{
			?>
			<br><br>
			<center>Error in upload</center><br>
			Server might be down. Please try after some time (after 2-3 hours)<br>
			<center>If problem persists please contact the <a href="http://gymkhana.iitb.ac.in/~ugacademics/homepage">Web Team</a> by filling feedback form with error code #3</center>
			<?php
		}
	}
	else
	{
		?>
		<br><br>
		<center>Error in upload</center><br>
		Server might be down. Please try after some time (after 2-3 hours)<br>
		<center>If problem persists please contact the <a href="http://gymkhana.iitb.ac.in/~ugacademics/homepage">Web Team</a> by filling feedback form with error code #2</center>
		<?php
	}
}
else
{
	?>
	<br><br>
	<center>Error in upload</center>
	<center>Some files haven't uploaded<br>
	Server might be down. Please try after some time (after 2-3 hours)<br>
	<center>If problem persists please contact the <a href="http://gymkhana.iitb.ac.in/~ugacademics/homepage">Web Team</a> by filling feedback form with error code #1</center>
	<?php
}
**/
echo 'Download following files, login <a href="https://bighome.iitb.ac.in/" target="_blank">here</a> through your ldap details and upload the files in the public_html folder.<br>';
echo '<a href="'. $path . '/index.html" download>index.html</a>, ';
echo '<a href="'. $path . '/style.css" download>style.css</a>, ';
echo '<a href="'. $path . '/body_bg.jpg" download>body_bg.jpg</a>, ';
echo '<a href="'. $path . '/page_bg.png" download>page_bg.png</a>, ';
echo '<a href="'. $path . '/divider.png" download>divider.png</a>, ';
echo '<a href="'. $path . '/' . $_SESSION['pic_name'].'" download>'.$_SESSION['pic_name'].'</a>, ';
echo '<a href="'. $path . '/' . $_SESSION['resume'].'" download>'.$_SESSION['resume'].'</a><br>';
echo 'Note: <br>
1)If you do not find a public_html folder, create one by clicking on "New" and then "Folder". Name it "public_html"<br>
2) After public_html folder is created, click on public_html folder, and upload the files using upload button beside "New"<br>';

?><center><br>After successfully uploading all the files, please visit 
<a href = "http://home.iitb.ac.in/~<?php echo $_SESSION['ldap'];?>" target="_blank">http://home.iitb.ac.in/~<?php echo $_SESSION['ldap'];?></a> 
to see your new homepage! <br> Good luck!'<br>
After you're done, please don't forget to logout.<form action = "logout.php" method = "POST">
<input type = "submit" value = "Logout">
</form></center>
</div>
</body>
</html>