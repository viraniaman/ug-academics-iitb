<div class="headerr">
    <div id="menu-icon" class="fa fa-bars" ng-class="{ active : leftsidemenu == 1 }" ng-click="showSideMenu()"></div>
    <div class="logo" ng-click="showSideMenu()"></div>
    <div class="heading" ng-click="showSideMenu()">UG Acads</div>
    <div class="home" ui-sref="home">Home</div>
 	<div class="search" ng-click="showSearch()"></div>
 	<div class="quick_links" ng-click="showSideMenuRight()">Quick Links</div>
</div> 
<!-- 
<div class="top-search-menu top-nav-element" ng-class="{ active : search == 1 }">
		<script>
		  (function() {
		    var cx = '004989817653587739505:nxdtw-qumxu';
		    var gcse = document.createElement('script');
		    gcse.type = 'text/javascript';
		    gcse.async = true;
		    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
		        '//www.google.com/cse/cse.js?cx=' + cx;
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(gcse, s);
		  })();
</script>
<gcse:search></gcse:search>

</div>

 -->
<div class="sidenavbar" ng-class="{show : leftsidemenu == 1}">
	<div ui-sref="career" ui-sref-active="activething" class="navheader" >Career Cell</div>
	<accordion close-others="oneAtATime">
		<li>
      		<accordion-group  is-open = "isopen"  >
      			<accordion-heading>
		            About<i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
		        </accordion-heading>
  				<div class="nav_fields" ui-sref-active="activething" ui-sref="career_about_Vision">
  					Vision
				</div>
				<div class="nav_fields" ui-sref-active="activething" ui-sref="career_about_FAQs">
  					FAQs
				</div>
      		</accordion-group>
		</li>
		<li>
      		<accordion-group  is-open = "isopen"  >
      			<accordion-heading>
		            Resources<i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
		        </accordion-heading>
  				<div class="nav_fields" ui-sref-active="activething" ui-sref="career_resources_Apping">
  					Apping
				</div>
				<div class="nav_fields" ui-sref-active="activething" ui-sref="career_resources_Entrepreneurship">
  					Entrepreneurship
				</div>
				<div class="nav_fields" ui-sref-active="activething" ui-sref="career_resources_Scholarships">
  					Scholarships
				</div>
				<div class="nav_fields" ui-sref-active="activething" ui-sref="career_resources_Core">
  					Core
				</div>
				<div class="nav_fields" ui-sref-active="activething" ui-sref="career_resources_Interview">
  					Interview
				</div>
      		</accordion-group>
		</li>
		<li>
      		<accordion-group  is-open = "isopen"  >
      			<accordion-heading>
		            Genre<i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
		        </accordion-heading>
  				<div class="nav_fields" ui-sref-active="activething" ui-sref="career_genre_Career Selection">
  					Career Selection
				</div>
				<div class="nav_fields" ui-sref-active="activething" ui-sref="career_genre_Jobs">
  					Jobs
				</div>
      		</accordion-group>
		</li>		
	</accordion>

	<div ui-sref="sss" ui-sref-active="activething" class="navheader" >SSS</div>
	<accordion close-others="oneAtATime">
 
		<li class = "otherlinks" ui-sref-active="activething" ui-sref="sss_tsc_home" style="cursor:pointer;">Tutorial Service Center</li>
		<li class = "otherlinks"><a target="_blank" href="http://gymkhana.iitb.ac.in/~ugacademics/bookbay">Book Bay</a></li>
		<li class = "otherlinks"><a target="_blank" href="http://gymkhana.iitb.ac.in/~ugacademics/courserank">Course Rank</a></li>
		<li class = "otherlinks"><a target="_blank" href="http://gymkhana.iitb.ac.in/~smp">ISMP</a></li>
	</accordion>

	<div ui-sref="enpower" ui-sref-active="activething" class="navheader" >EnPoWER</div>
	<accordion close-others="oneAtATime">
      	<li >
      		<accordion-group is-open = "isopen" >
      			<accordion-heading>
		            IDP<i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
		        </accordion-heading>
  				<div class="nav_fields" ui-sref-active="activething" ui-sref="enpower_idp_Home">
  					Home
				</div>
				<div class="nav_fields" ui-sref-active="activething" ui-sref="enpower_idp_Projects">
  					Projects
				</div>
				<div class="nav_fields" ui-sref-active="activething" ui-sref="enpower_idp_Apply">
  					Apply
				</div>
      		</accordion-group>
		</li>




		<li class = "otherlinks"><a target="_blank" href="http://gymkhana.iitb.ac.in/~ilp">Industrial Learning Programme</a></li>
		<li class = "otherlinks"><a target="_blank" href="http://gymkhana.iitb.ac.in/~ugacademics/surp">SURP</a></li>
		<li class = "otherlinks"><a target="_blank" href="http://gymkhana.iitb.ac.in/~ugacademics/research">Research</a></li>
	</accordion>
	<div ui-sref="team" ui-sref-active="activething" class="navheader" >Team</div>
</div>	

<div class="datacomin" ng-class="{ left : leftsidemenu == 1 }">
	<div ui-view>
		<div>
<div style="right:-6%; top:-1%;">			
<iframe 
src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fiitb.ugacads&amp;width&amp;height=62&amp;colorscheme=light&amp;show_faces=false&amp;header=true&amp;stream=false&amp;show_border=true" 
scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:62px;" allowTransparency="true"></iframe>
</div>		
<center>
		<h1>Welcome</h1>
Welcome to IIT Bombay's UG Academics website. Here you can have a look at all the  opportunities available to you as a student of IIT 
Bombay, and guidelines for achieving success in a particular field.
</center>
		</div>
		<!--<div class="home_data" ng-repeat = "data in images">
			<div class="image">
				<img src="img/{{data.src}}">
			</div>
			<div class="about">
				{{data.title}}
			</div>
		</div> -->
	</div> 
</div>





<div class="sidenavbar_right" ng-class="{show : rightsidemenu == 1}">
	<nav>
		<ul>
			<li ng-repeat = "links in otherlinks">
				<a href="{{links.url}}" target="_blank">{{links.name}}</a>
			</li>
		</ul>
	</nav>
</div>




