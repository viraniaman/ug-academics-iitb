<!-- <div class=" sidenavbar lefty">
	<nav id="sidenavbar">
		<ul >
			<li ui-sref="career" ui-sref-active="activething" class="navheader">Career Cell</li>
			<li ui-sref="career_events" ui-sref-active="activething" class="navheadersecond"><div class="nav_fields">Events</div></li>

			<li ui-sref="career_events_{{header}}"  ui-sref-active="activething" ng-repeat="header in events"  >
				<!-- <div class="nav_images">
				<img src="img/{{header}}.png" alt="{{header}}">
				</div> -->
				<!-- <div class="nav_fields">{{header}}</div>
			</li>
		</ul>
	</nav>
</div> --> 
<div ui-view>
	<div class="status">Events</div>
	<div class="insidecontainerheader">Events</div>

</div>
</div>


