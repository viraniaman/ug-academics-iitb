<?php
require_once("functions.php");
$loggedin = false;
session_start();
if (isset($_SESSION['ldap'])) {
    $loggedin=true;
    $username=$_SESSION['ldap'];
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title >Non Tech Summer School</title>
 <link rel="stylesheet" href="style_apply.css">


<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="styles.css" rel="stylesheet" media="screen">
</head>

<body background='inback.jpg' style="font-family:'Marcellus',serif;">

<div style="width:100%;margin-top:28px;opacity:0.8; border-radius:20px;">
    <div class="navbar">
         <div class="navbar-inner"><div style="display: block; min-height: 155px;"><div style="float:left;">
            <a class="brand" href="#"> <img src="iitb_logo.jpg" style="height:90px"><p style="display:inline-block; line-height: 30px; padding: 20px; "><b style="font-size:35px">Non Tech Summer School</b><br> <d style="font-size:25px">By UG Academic Council</d></p> </a></div>
            <div style="float: right; padding:20px; padding-bottom: 0px; ">
    <?php
    if ($loggedin) {} else {
    ?>
    <form action="index.php" method="POST">
    <fieldset>
        <table style='font-size:15px'>
            <tr>
                <td>LDAP ID</td>
                <td>Password</td>
            </tr>           
            <tr>
                <td><input type="text" class="form-control" name="ldap" placeholder="Enter LDAP ID"></td>
                <td><input type="password" class="form-control" name='passwd' placeholder="Enter Password"></td>
                
            </tr>
            <tr><td>Please login to register for courses</td><td align="right"><input class="btn btn-success" style="font-size:17px" type="submit" name="sub" value="Login"/></td></tr>
        </table>
    </fieldset>
    </form> <?php } ?>
</div></div>
<div style="display: block; float: right">
<ul class="nav">
                  <li><a href="index.php" style="font-size:20px">Home</a></li>
                  <li><a href="about.php"  style="font-size:20px">About</a></li>
                  <li><a href="contacts.php" style="font-size:20px">Contacts</a></li>
                  <?php if ($loggedin) { ?><li><a href="apply.php" style="font-size:20px">Apply</a></li> <?php }?>
                  <?php if ($loggedin) { ?><li><a href="index.php?id=logout" style="font-size:20px">Logout</a></li> <?php }?>
                </ul></div>
          </div>
    </div>
</div>
<div style="width:100%;margin-top:28px;opacity:0.8; border-radius:20px; margin-bottom: 50px;">
    <div class="navbar-inner">

<section id="team" class="bg-light-gray">
				<h2 class="section-heading">Contact</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    
                    <h3 class="section-subheading text-muted">Career Cell - UG Academic Council</h3>
                </div>
            </div>
            <div class="row" >
               <div style="width: 33%; display:inline-block;" class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/cc1.jpg" class="img-responsive img-circle" alt="">
                        <h4>Anirudh Poddar</h4>
                        <p class="text-muted">Coordinator
                        <br><a href="mailto:anirudh99201@gmail.com">anirudh99201@gmail.com</a>
                        <br><a>+91-992-019-8901</a></p>
                        <!--<ul class="list-inline social-buttons">
                            
                            <li><a target="_blank" href="https://www.facebook.com/aman.virani.71"><i class="fa fa-facebook"></i></a>
                            </li>
                            



                        </ul>-->
                    </div>
                    <div class="team-member">
                        <img src="img/team/cc2.jpg" style="width: 175px height175px;" class="img-responsive img-circle" alt="">
                        <h4>Jatin Arora</h4>
                        <p class="text-muted">Coordinator
                        <br><a href="mailto:jatina29@gmail.com">jatina29@gmail.com</a>
                    	<br><a>+91-998-758-2181</a></p>
                        <!--<ul class="list-inline social-buttons">
                            
                            <li><a target="_blank" href="https://www.facebook.com/profile.php?id=100000399235548"><i class="fa fa-facebook"></i></a>
                            </li>
                            
                        </ul>-->
                    </div>
                </div>
                <div style="width: 33%; display:inline-block;" class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/1.jpg" class="img-responsive img-circle" alt="">
                        <h4>Raghav Daga</h4>
                        <p class="text-muted">Institute Secretary Academic Affairs
                        <br><a href="mailto:imraghavdaga@gmail.com">imraghavdaga@gmail.com</a>
                    	<br><a>+91-989-236-5840</a></p>
                        <!--<ul class="list-inline social-buttons">
                            <li><a target="_blank" href="https://twitter.com/Chirag_Gandhi7"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a target="_blank" href="https://www.facebook.com/Chirag.Gandhi07"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a target="_blank" href="https://www.linkedin.com/profile/view?id=311944013"><i class="fa fa-linkedin"></i></a>
                            </ul>-->
                    </div>
                </div>
                <div style="width: 33%; display:inline-block;" class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/cc3.jpg" class="img-responsive img-circle" alt="">
                        <h4>Radhika Tibrewala</h4>
                        <p class="text-muted">Coordinator
                        <br><a href="mailto:radhikatibrewala5@gmail.com">radhikatibrewala5@gmail.com</a>
                    	<br><a>+91-976-994-4782</a></p>
                        <!--<ul class="list-inline social-buttons">
                            
                            <li><a target="_blank" href="https://www.facebook.com/jagesh.golwala.3"><i class="fa fa-facebook"></i></a>
                            </li>
                            CC Coordinator  Siddhant jain   civil   150040092   8879154549  sidjain1806@gmail.com   siddhantjain@iitb.ac.in
CC Coordinator  Radhika tibrewala   MEMS    15D110022   9769944782  radhikatibrewala5@gmail.com     15D110022@iitb.ac in
                            
                        </ul>-->
                    </div>
                    <div class="team-member">
                        <img src="img/team/cc4.jpg" class="img-responsive img-circle" alt="">
                        <h4>Siddhant Jain</h4>
                        <p class="text-muted">Coordinator
                        <br><a href="mailto:sidjain1806@gmail.com">sidjain1806@gmail.com</a>
                    	<br><a>+91-887-915-4549</a></p>
                        <!--<ul class="list-inline social-buttons">
                            
                            <li><a target="_blank" href="https://www.facebook.com/profile.php?id=100005270417676"><i class="fa fa-facebook"></i></a>
                            </li>
                            
                        </ul>-->
                    </div>
                </div>
            </div>
                </div>
          
                </div>
    </section>
    </div>
</div>

</body>
</html>