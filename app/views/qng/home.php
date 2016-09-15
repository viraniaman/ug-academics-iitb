<div class="sidenavbar">
	<!-- <nav>
		<ul>
			<li ui-sref="career" ui-sref-active="activething" class="navheader">Career Cell</li>

			<li ui-sref-active="activething" ui-sref="career_{{header}}" ng-repeat="header in career">
				<div class="nav_images">
					<img src="img/{{header}}.png" alt="{{header}}">
				</div>
				<div class="nav_fields">
					{{header}}
				</div>
			</li>
		</ul>
	</nav> -->
	<nav class="{{active}}" >
		<ul>
			<li ui-sref="career" ui-sref-active="activething" class="navheader">career Cell</li>
		</ul>
	</nav>
	<accordion close-others="oneAtATime">
      	<li ng-repeat="header in sidenav" >
      		<accordion-group ng-repeat="heading in header.under" is-open = "true"  >
      			<accordion-heading>
		            {{heading.heading}}<i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
		        </accordion-heading>
  				<div class="nav_fields" ng-repeat="tag in heading.under_under" ui-sref-active="activething" ui-sref="career_{{heading.heading}}_{{tag}}">
  					{{tag}}
				</div>
      		</accordion-group>
		</li>
	</accordion>
</div>


<div class="datacomin">
	<div ui-view >
		<div class="status">Home</div>		            
		<div class="insidecontainerheader">Career cell</div>
		ज्ञानं परमम् शक्तिही -- jñānaṃ paramam śaktihī -- Knowledge is ultimate power Career Cell aims to be IIT-B’s forum to provide us students with every bit of critical information about the plethora of career options, the myriad choices ahead of us . It also aims to help us overcome our apprehensions,clear our doubts regarding how to take that very important first step in the professional world after IIT experience thereby help us make a wise and informed career decision.
		Career Cell aims to be IIT-B’s platform to provide our students with every bit of critical information about the plethora of career options , the myriad choices ahead of us and help us make a wise and informed career decision. As they commonly say "jñānaṃ paramam śaktihī -- Knowledge is ultimate power"

		The three things that career cell stands by are - informed students, wise choice, and bright careers. 

		Career Cell aims at equipping the students with all the required information and insights into every single career opportunity coming our way.

		We are here to provide an impartial, fair account of every possible detail about various careers and job profiles.
		Have you ever thought ….. 
		“What am I gonna do next - App or Job ? “
		“Which career do I take up ?”
		“Should I continue in Core or explore out finance ? “
		“How is it gonna be if I take up my passion for photography as a profession ?” 
		“What’s going to make me happy at the end of the day?”
		“Will I be happy with little money and a better work satisfaction...or is money more important?!” 

		These questions seem quite familiar and simple, don’t they ? But the answers to these are the least trivial and ironically of the utmost significance for our future, and that is where Career Cell comes into picture.
	</div>
</div>

<div class="sidenavbar_right">
	bitch
</div>
