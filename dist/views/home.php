<div class="headerr">
    <div id="menu-icon" class="fa fa-bars" ng-class="{ active : leftsidemenu == 1 }" ng-click="showSideMenu()"></div>
    <div class="logo" ng-click="showSideMenu()"></div>
    <div class="heading" ng-click="showSideMenu()">Acads</div>
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
      	<li ng-repeat="header in career">
      		<accordion-group ng-repeat="heading in header.under" is-open = "isopen"  >
      			<accordion-heading>
		            {{heading.heading}}<i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
		        </accordion-heading>
  				<div class="nav_fields" ng-repeat="tag in heading.under_under" ui-sref-active="activething" ui-sref="career_{{heading.heading}}_{{tag}}">
  					{{tag}}
				</div>
      		</accordion-group>
		</li>
	</accordion>

	<div ui-sref="sss" ui-sref-active="activething" class="navheader" >SSS</div>
	<accordion close-others="oneAtATime">
   <!--    	<li ng-repeat="header in sss" >
      		<accordion-group ng-repeat="heading in header.under" is-open = "isopen" >
      			<accordion-heading>
		            {{heading.heading}}<i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
		        </accordion-heading>
  				<div class="nav_fields" ng-repeat="tag in heading.under_under" ui-sref-active="activething" ui-sref="sss_{{heading.heading}}_{{tag}}">
  					{{tag}}
				</div>
      		</accordion-group>
		</li> -->
		<li class = "otherlinks" ui-sref-active="activething" ui-sref="sss_tsc_home" style="cursor:pointer;">Tutorial Service Center</li>
		<li class = "otherlinks"><a target="_blank" href="http://gymkhana.iitb.ac.in/~ugacademics/ug_acads/bookbay">Book Bay</a></li>
		<li class = "otherlinks"><a target="_blank" href="http://gymkhana.iitb.ac.in/~ugacademics/ug_acads/courserank">Course Rank</a></li>
		<li class = "otherlinks"><a target="_blank" href="http://gymkhana.iitb.ac.in/~smp">ISMP</a></li>
	</accordion>

	<div ui-sref="enpower" ui-sref-active="activething" class="navheader" >Enpower</div>
	<accordion close-others="oneAtATime">
      	<li ng-repeat="header in enpower" >
      		<accordion-group ng-repeat="heading in header.under" is-open = "isopen" >
      			<accordion-heading>
		            {{heading.heading}}<i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
		        </accordion-heading>
  				<div class="nav_fields" ng-repeat="tag in heading.under_under" ui-sref-active="activething" ui-sref="enpower_{{heading.heading}}_{{tag}}">
  					{{tag}}
				</div>
      		</accordion-group>
		</li>
		<li class = "otherlinks"><a target="_blank" href="http://gymkhana.iitb.ac.in/~ilp">Industrial Learning Programee</a></li>
		<li class = "otherlinks"><a target="_blank" href="http://gymkhana.iitb.ac.in/~ugacademics/ug_acads/ispa">ISPA</a></li>
		<li class = "otherlinks"><a target="_blank" href="http://gymkhana.iitb.ac.in/~ugacademics/research">Research</a></li>
	</accordion>
</div>	

<div class="datacomin" ng-class="{ left : leftsidemenu == 1 }">
	<div ui-view>
		<div class="home_data" ng-repeat = "data in images">
			<div class="image">
				<img src="img/{{data.src}}">
			</div>
			<div class="about">
				{{data.title}}
			</div>
		</div>
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




