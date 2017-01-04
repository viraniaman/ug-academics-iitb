<html>
<head>
	<title>LOG IN</title>
	<link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/preview.min.css" rel="stylesheet">
</head>
<body>
	<?php
		//echo "chkpt 1".'<br>';
		if(isset($_POST['login'])){

			if(!empty($_POST['l_uname'])){
				$uname=trim($_POST['l_uname']);
				$uname_ok=true;
				if(!preg_match('/^[_a-zA-Z0-9.]+$/',$uname)){
					echo "Username: Please Use only English Alphabets,Numbers, . or _".'<br>';
					$uname_ok=false;
				}
				if(preg_match('/^[_0-9.]+$/',$uname)){
					echo "Username Must contain at least 1 alphabet".'<br>';
					$uname_ok=false;
				}
				//echo $uname.'<br>';
				if(strlen($uname)>20){
					echo "Username must not be more than 20 characters".'<br>';
					$uname_ok=false;
				}
				if(strlen($uname)<4){
					echo "Username must be at least 4 characters".'<br>';
					$uname_ok=false;
				}
				if(!$uname_ok){
					die("Please Enter a Valid Username");
				}
			}else{
				die("Please Enter Username");
			}

			if(!empty($_POST['l_pwd'])){
				$pwd=$_POST['l_pwd'];
				$pwd_ok=true;
				if(!preg_match('/^[-_ !@#$%^&*a-zA-Z0-9.]+$/',$pwd)){
					echo "Password: Please Use only following characters: !@#$%^&*_- (a-z) (A-Z) (0-9) ".'<br>';
					$pwd_ok=false;
				}
				echo $uname.'<br>';
				if(strlen($pwd)>20){
					echo "Password must not be more than 20 characters".'<br>';
					$pwd_ok=false;
				}
				if(strlen($pwd)<8){
					echo "Password must be at least 8 characters".'<br>';
					$pwd_ok=false;
				}
				if(!$pwd_ok){
					die("Please Enter Valid Password");
				}
			}else{
				die("Please Enter Password");
			}


			require_once('connect_database.php');
			$uname_query= "SELECT * FROM data WHERE username LIKE '".$uname."'";
			$uname_response=mysqli_query($dbc,$uname_query);
			
			//echo mysqli_num_rows($uname_response);

			if(mysqli_num_rows($uname_response)==0){
				die("Username doesnt exist!".'<br>');
			}else{
				if(mysqli_num_rows($uname_response)>1){
					die("Multiple Usernames Exist! Database Error!".'<br>');
				}else{
					$row=mysqli_fetch_array($uname_response);
					$link_address="/task/literary.php";
					if($row['password']==$pwd){
						session_start();
						$_SESSION['is_open']=true;
						if (isset($_SESSION['login_user'])) {
  				  
      				  header("location: admin.php");
   						} else {
    					    header("location: index.php");
   						 		}
						
						$_SESSION['login_user']=$uname;
						//echo '<button action="log_out.php" name="logout" class='btn'>Log Out</button>'.'<br>';
					}else{
						echo "Username and Password do not match".'<br>';
					}
				}
			}

		}else{
			if($_SESSION['is_open']){
				//echo "User: ".$_SESSION['login_user']." is logged in.".'<br>';
				//echo '<button action="log_out.php" name="logout" class='btn'>Log Out</button>'.'<br>';
			}else{
				die('Please goto Homepage');
			}
		}
	?>
</body>
</html>