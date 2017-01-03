<?php
$con=mysqli_connect("10.105.177.5","ugacademics","ug_acads");

if(!$con){
	die("Not connected!!!".mysqli_error());
}
mysqli_select_db($con,"ugacademics");

$result=mysqli_query($con,"SELECT * FROM book ");

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Title</title>



<link href="2/ninja-slider.css" rel="stylesheet" type="text/css" />
    <!--ninjaVideoPlugin.js is required only when the slider contains videos, and its link should be placed before the ninja-slider.js link.-->
    <script src="2/ninjaVideoPlugin.js" type="text/javascript"></script>
    <script src="2/ninja-slider.js" type="text/javascript"></script>
	<script src="jquery-1.11.2.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">


  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js">

 
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').dataTable();
        });
    </script>


<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/animations.css">

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header" class="animatedParent animateOnce" data-sequence='700' style="background-color:grey">

					<!-- Inner -->
						<div class="inner">
							<header>
								<h1><a class="animated fadeIn slower" data-id='1'>Title Of Page</a></h1>
								<hr />
							</header>
						</div>


						<div id='ninja-slider' class="animated fadeIn slowest" data-id='2'>
           			 		<ul>
                			<li><div data-image="images/images1/li1.jpg"></div></li>
                			<li><div data-image="images/images1/li2.jpg"></div></li>
                			<li><div data-image="images/images1/li3.jpg"></div></li>
                			<li><div data-image="images/images1/li4.jpg"></div></li>

                
            				</ul>
   					     </div>



					<!-- Nav -->
						<nav id="nav" style="
    background-color: grey; opacity:0.9; " >
							<ul>
							<li><a href="index.php">Home</a></li>
								<li><a href="#">Team</a></li>
								<li>
									<a  >Career Cell</a>
									<ul>
										<li><a href="#">Finance Club</a></li>
										<li><a href="#">Analytics Club</a></li>
										<li>
											<a href="#">Consult Club</a>
											
										</li>
										

										
									</ul>
								</li>
								
								



								</li>
								<li><a  href="#">UG Academics</a>
								</li>
								<li><a href="#" target="_blank">Other Link</a></li>
								</ul>
								</nav>
				</div>

			<!-- Banner -->
				<section id="banner">
					<header>
						
						<p>
New-product development shapes the company’s future. Improved or
replacement products and services can maintain or build sales; new-to-the-world products and
services can transform industries and companies and change lives. But the low success rate of new
products and services points to the many challenges they face. Companies are doing more than just
talking about innovation. They are challenging industry norms and past conventions to develop new
products and services that delight and engage consumers. Nintendo’s Wii is a prime example.1						</p>
					</header>
				</section>

			<!-- Carousel -->
				<section class="carousel">
					<div class="reel">

						<article>
							<a   class="image featured"><img src="images/lit-images/rdc.jpg" alt="" /></a>
							<header>
								<h4><a  >Heading !</a></h4>

							</header>
							<p>Subheading !</p>
						</article>
						
						<article>
							<a   class="image featured"><img src="images/lit-images/rdc.jpg" alt="" /></a>
							<header>
								<h4><a  >Heading !</a></h4>

							</header>
							<p>Subheading !</p>
						</article>
						<article>
							<a   class="image featured"><img src="images/lit-images/rdc.jpg" alt="" /></a>
							<header>
								<h4><a  >Heading !</a></h4>

							</header>
							<p>Subheading !</p>
						</article>
						<article>
							<a   class="image featured"><img src="images/lit-images/rdc.jpg" alt="" /></a>
							<header>
								<h4><a  >Heading !</a></h4>

							</header>
							<p>Subheading !</p>
						</article>
						<article>
							<a   class="image featured"><img src="images/lit-images/rdc.jpg" alt="" /></a>
							<header>
								<h4><a  >Heading !</a></h4>

							</header>
							<p>Subheading !</p>
						</article>
						<article>
							<a   class="image featured"><img src="images/lit-images/rdc.jpg" alt="" /></a>
							<header>
								<h4><a  >Heading !</a></h4>

							</header>
							<p>Subheading !</p>
						</article>
					</div>
				</section>


				<div style="margin: 10px 20px" id="library">
				<header style="text-align: center;"> 
				<h2 style="padding: 15px ;">Library </h2>
				</header>
					<table id="datatable" style="text-align: center; background-color:blue;" class="display" width="100%" text-align="center"> 
						<thead style="color: #FFF; text-align: center;">
							<tr>
								<th>S. No.</th>
								<th>Name</th>
								<th>Genre</th>
								<th>Author</th>
								<th>Currently With</th>
								<th>from</th>
								
							</tr>
						</thead>
						<tbody align="center">
						<?php
						while ($row=mysqli_fetch_array($result)) {
							?>
						<tr>
							<td><?=$row['id'] ?></td>
							<td><?=$row['name'] ?></td>
							<td><?=$row['genre'] ?></td>
							<td><?=$row['author'] ?></td>
							<td><?=$row['currently_with'] ?></td>
							<td><?=$row['from'] ?></td>
							
						</tr>

							<?php
						}
						?>
						

						
							
						</tbody>
					</table>

<br/>
<!-- <a class="btn" onclick="Materialize.toast('login with Admin account', 4000)">Create</a>
<a class="btn" onclick="Materialize.toast('login with Admin account', 4000)">Update</a>


<a class="btn" onclick="Materialize.toast('login with admin account', 4000)">Delete</a>

<a class="waves-effect waves-light btn" href="http://localhost/phpmyadmin/sql.php?server=1&db=login&table=books&pos=0&token=8fc01da890b16b80e4888cf28ff131f8"><i class="material-icons left">Admin</i>Access</a> -->


				</div>

			<section id="footer">
				<div id="contact">
				<div class="footerleft"  style="padding-top: 6%;padding-left: 10%;padding-left: 10%">
				<bold>For furthur Assistance,Please Contact:</bold><br/>
				<a href="https://www.facebook.com/abhay.vikram4?fref=ts">Raghav Daga</a></br>
				 <pre>   Institute Secretary Academic Affairs
   IIT Bombay</br>
   091-656-654-8787
				  </pre>
				<br>
		
				</div>
				
				<div class="footerright" style="padding-top: 5%;padding-right: 10%;">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.366961569011!2d72.91156931442542!3d19.1354077550761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b809d298ff7f%3A0xc4da22ddb88589bf!2sStudent+Activity+Center!5e0!3m2!1sen!2sin!4v1459245857561" width="300" height="7.5%" frameborder="0" style="border:0" allowfullscreen></iframe></br>
				</br>

				
				<a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube fa-lg"></i></a>
				<a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook fa-lg " ></i></a></br>
				</br>
				Developed and maintained by<br>
				<a href="#" ">Web team, IIT Bombay UG Academics </a>
				
				</div>
				</div>
				</section>  



        <!--end-->
 
        <!--start-->
        



		<!-- Scripts -->
		<script type="text/javascript">$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 2000);
        return false;
      }
    }
  });
});</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js">

 
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').dataTable();
        });
    </script>

<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable( {
        
       
       
    } );
} );
</script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.onvisible.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src='assets/js/css3-animate-it.js'></script>




			



		
			

				

	</body>
</html>