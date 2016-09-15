<?php 
include 'session.php';
require_once('../functions.php'); 
if(isset($_POST['submit'])) {
  require_once('contactmail.php');
}
?>
<html lang="en">
	<head>
		<ma charset="utf-8">
    <teta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>TSC Portal || Students Support Service</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min2.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<?php include 'header.php'; ?>
  <div class="containerx">
  <!--center-->
  <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    <div class="col-xs-12">
    <h2 style="font-family:helvetica light;">Contact Us</h2>
    <form style="margin:auto" action="contact.php" method="post">
      <table>
        <tr><td><label for="subject">Subject: </label></td>
          <td width="80%"><textarea name="subject" rows="2" style="width: 100%; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;"></textarea></td></tr>
  		  <tr class="form-field">
  			 <td><label for="course">Query: </label></td>
  			 <td width="80%"><textarea name="query" rows="4" style="width: 100%; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;"></textarea></td></tr>
  		  
        <tr class="form-field">
        <td colspan="2"><button class="btn btn-default" name="submit">Submit</button></td>
        </tr>
  	  </table>
  	</form>
    <?php
    if(isset($_GET['id'])) {
    echo '<p><font color="blue">Your query has been mailed to the SSS team.</font></p>';
}
    ?>
  </div>
</div></div>
<div style="margin:auto;">
            <div class="col-sm-12">
                <div class="col-lg-12 text-center">
                    
                    <h3 class="section-subheading" style="font-family:helvetica light;">Student Support Services(SSS) Team</h3>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-lg-12 text-center">
                    <h3 class="section-subheading text-muted" style="font-family:helvetica light;">Institute Secretary Academic Affairs</h3>
                </div>
            </div>
            
            <div class="row" style="margin-bottom: 20px;">

                    <div class="team" style="text-align: center;margin:auto">
                        <img src="image/team/22.jpg" alt="" style="">
                        <div class="text">
                            
                            <p class="text-muted">Abhishek Khadiya<br><a href="mailto:abhishekkhadiya@gmail.com">abhishekkhadiya@gmail.com</a>
                                <br><a>+91-750-612-2588</a>
                            </p>
                        </div>
                        
                        <!--<ul class="list-inline social-buttons">
                            <li><a target="_blank" href="https://twitter.com/Chirag_Gandhi7"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a target="_blank" href="https://www.facebook.com/Chirag.Gandhi07"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a target="_blank" href="https://www.linkedin.com/profile/view?id=311944013"><i class="fa fa-linkedin"></i></a>
                            </ul>-->
                    </div>
                
            </div>
            <div class="col-sm-12">
                <div class="col-lg-12 text-center">
                    <h3 class="section-subheading text-muted" style="font-family:helvetica light;margin:auto">Coordiantors</h3>
                </div>
            </div>
            <div class="row" style="text-align: center">
                
               <div class="coordinator">
                    <div class="team" style="text-align: center">
                        <img src="image/team/11.jpg" alt="" style="margin:auto">
                        <div class="text">
                        
                        <p class="text-muted">Gaurav Jain<br><a href="mailto:gauravjn9511@gmail.com">gauravjn9511@gmail.com</a>
                        <br><a>+91-961-959-0360</a></p></div>
                        <!--<ul class="list-inline social-buttons">
                            
                            <li><a target="_blank" href="https://www.facebook.com/aman.virani.71"><i class="fa fa-facebook"></i></a>
                            </li>
                            
                        </ul>-->
                    </div></div>
                    <div class="coordinator">
                    <div class="team" style="text-align: center">
                        <img src="image/team/44.jpg" alt="" style="margin:auto">
                        <div class="text">
                        
                        <p class="text-muted">Shivani Chavan<br><a href="mailto:shivanidchavan@gmail.com">shivanidchavan@gmail.com</a>
                      <br><a>+91-916-782-0456</a></p></div>
                        <!--<ul class="list-inline social-buttons">
                            
                            <li><a target="_blank" href="https://www.facebook.com/profile.php?id=100000399235548"><i class="fa fa-facebook"></i></a>
                            </li>
                            
                        </ul>-->
                    </div>
                </div>
                
                <div class="coordinator">
                    <div class="team" style="text-align: center">
                        <img src="image/team/33.jpg" alt="" style="margin:auto">
                        <div class="text">
                        
                        <p class="text-muted">Aditya Kalra<br><a href="mailto:adityakalra2102@gmail.com">adityakalra2102@gmail.com</a>
                      <br><a>+91-773-874-4849</a></p></div>
                        <!--<ul class="list-inline social-buttons">
                            
                            <li><a target="_blank" href="https://www.facebook.com/jagesh.golwala.3"><i class="fa fa-facebook"></i></a>
                            </li>
                            
                        </ul>-->
                    </div></div>
                    <div class="coordinator">
                    <div class="team" style="text-align: center">
                        <img src="image/team/55.jpg" alt="" style="margin:auto">
                        <div class="text">
                        
                        <p class="text-muted">Karan Mehta<br><a href="mailto:knmehta12@gmail.com">knmehta12@gmail.com</a>
                      <br><a>+91-828-611-4879</a></p></div>
                        <!--<ul class="list-inline social-buttons">
                            
                            <li><a target="_blank" href="https://www.facebook.com/profile.php?id=100005270417676"><i class="fa fa-facebook"></i></a>
                            </li>
                            
                        </ul>-->
                    </div>
                </div>
            </div>
        </div>
<!--/center-->
  </div>
<?php include 'footer.php'; ?>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>